<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;  // Asegúrate de importar SSH2 desde phpseclib3

class RouterConfigController extends Controller
{
    public function show()
    {
        return view('router-config');
    }

    public function update(Request $request)
    {
        // Validación de datos
        $request->validate([
            'ssid' => 'required|string|max:32',
            'password' => 'required|string|min:8|max:63',
        ]);

        // Datos para la conexión SSH
        $ipRouter = '192.168.10.1';
        $username = 'root';
        $password = 'mynet'; // Cambia según la configuración

        // Establecer conexión SSH usando phpseclib
        $ssh = new SSH2($ipRouter);

        // Verificar si la conexión es exitosa
        if (!$ssh->login($username, $password)) {
            return back()->with('error', 'No se pudo conectar al router.');
        }

        // Ejecutar comandos para actualizar la configuración del router
        $command = "uci set wireless.@wifi-iface[0].ssid={$request->ssid}";
        $ssh->exec($command);
        $command = "uci set wireless.@wifi-iface[0].key={$request->password}";
        $ssh->exec($command);
        $ssh->exec('uci commit');
        $ssh->exec('/etc/init.d/network restart');

        return back()->with('success', 'Configuración actualizada correctamente.');
    }
}
