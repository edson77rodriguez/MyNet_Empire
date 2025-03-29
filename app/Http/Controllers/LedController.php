<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;

class LedController extends Controller
{
    // Mostrar la vista con la configuración actual de los LEDs
    public function index()
    {
        // Aquí se simula obtener los datos de los LEDs (esto debería ser sustituido con un modelo real o consulta a base de datos si corresponde)
        $leds = [
            ['name' => 'wlan', 'led_name' => 'greenwlan', 'status' => 'Apagado', 'trigger' => 'netdev'],
            ['name' => 'wan', 'led_name' => 'orangewan', 'status' => 'Apagado', 'trigger' => 'switch0'],
            ['name' => 'lan', 'led_name' => 'greenlan', 'status' => 'Apagado', 'trigger' => 'switch0'],
        ];

        return view('admin.leds.index', compact('leds'));
    }

    // Guardar un nuevo LED en el router
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'led_name' => 'required|string|max:255',
            'trigger' => 'required|string|max:255',
        ]);

        $ipRouter = '192.168.10.1'; // Dirección del router
        $username = 'root';
        $password = 'mynet'; // Contraseña actual del router

        try {
            // Conectar al router vía SSH
            $ssh = new SSH2($ipRouter);
            if (!$ssh->login($username, $password)) {
                throw new \Exception('No se pudo conectar al router.');
            }

            // Comando para configurar el LED (esto depende de cómo funcione el router)
            // Este es un ejemplo hipotético para modificar la configuración del LED.
            $name = escapeshellarg($request->name);
            $led_name = escapeshellarg($request->led_name);
            $trigger = escapeshellarg($request->trigger);

            // Este es solo un ejemplo, necesitarás ajustarlo según la configuración real del router
            $ssh->exec("uci set system.@led[0].name='$name'");
            $ssh->exec("uci set system.@led[0].led_name='$led_name'");
            $ssh->exec("uci set system.@led[0].trigger='$trigger'");
            $ssh->exec("uci commit system");

            return back()->with('success', 'Configuración de LED guardada correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Actualizar un LED existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'led_name' => 'required|string|max:255',
            'trigger' => 'required|string|max:255',
        ]);

        // Aquí puedes agregar la lógica para actualizar los LEDs, siguiendo el mismo proceso de SSH
        return back()->with('success', 'LED actualizado correctamente.');
    }

    // Restablecer la configuración del LED
    public function reset($id)
    {
        $ipRouter = '192.168.10.1'; // Dirección del router
        $username = 'root';
        $password = 'mynet'; // Contraseña actual del router

        try {
            // Conectar al router vía SSH
            $ssh = new SSH2($ipRouter);
            if (!$ssh->login($username, $password)) {
                throw new \Exception('No se pudo conectar al router.');
            }

            // Comando para restablecer la configuración del LED (esto depende de cómo funcione el router)
            // Este es un ejemplo hipotético para restablecer la configuración a los valores predeterminados
            $ssh->exec("uci revert system");
            $ssh->exec("uci commit system");

            return back()->with('success', 'Configuración del LED restablecida correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
