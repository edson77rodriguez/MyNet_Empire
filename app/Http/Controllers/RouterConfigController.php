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

    public function updateSystemConfig(Request $request)
    {
        $request->validate([
            'hostname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'timezone' => 'required|string',
        ]);
    
        $ipRouter = '192.168.10.1';
        $username = 'root';
        $password = 'mynet'; 
    
        $ssh = new SSH2($ipRouter);
    
        if (!$ssh->login($username, $password)) {
            return back()->with('error', 'No se pudo conectar al router.');
        }
    
        // Eliminar configuraciones anteriores si no se cambian
        $ssh->exec("uci del system.cfg01e48a.timezone");  // Eliminar zona horaria anterior
        $ssh->exec("uci del system.ntp.enabled");         // Eliminar sincronización NTP
        $ssh->exec("uci del system.ntp.enable_server");   // Eliminar servidor NTP
    
        // Establecer valores por defecto si no se envían nuevos valores
        $timezone = $request->timezone ?: 'UTC';  // Valor por defecto si no se especifica
        $hostname = $request->hostname; // El nombre del host enviado desde el formulario
    
        // Actualizar configuraciones
        $ssh->exec("uci set system.cfg01e48a.log_proto='udp'");
        $ssh->exec("uci set system.cfg01e48a.zonename='{$timezone}'"); // Establecer la zona horaria
        $ssh->exec("uci set system.cfg01e48a.conloglevel='8'");
        $ssh->exec("uci set system.cfg01e48a.cronloglevel='5'");
    
        // Actualizar el nombre del host y la zona horaria si es necesario
        $ssh->exec("uci set system.@system[0].hostname='{$hostname}'");
    
        // Confirmar y aplicar los cambios
        $ssh->exec("uci commit system");
        $ssh->exec('/etc/init.d/system reload');
    
        return back()->with('success', 'Configuración del sistema actualizada correctamente.');
    }

    public function updateLogConfig(Request $request)
    {
        // Validación de los datos para la configuración de registro
        $request->validate([
            'buffer_size' => 'required|integer',
            'log_server' => 'required|ip',
            'log_port' => 'required|integer',
            'log_protocol' => 'required|string',
            'log_file' => 'required|string',
            'log_level' => 'required|string',
            'cron_log_level' => 'required|string',
        ]);

        // Datos para la conexión SSH
        $ipRouter = '192.168.10.1';
        $username = 'root';
        $password = 'mynet'; 

        // Establecer conexión SSH usando phpseclib
        $ssh = new SSH2($ipRouter);

        // Verificar si la conexión es exitosa
        if (!$ssh->login($username, $password)) {
            return back()->with('error', 'No se pudo conectar al router.');
        }

        // Ejecutar comandos para actualizar la configuración de registro
        $ssh->exec("uci set system.cfg01e48a.buffer_size={$request->buffer_size}");
        $ssh->exec("uci set system.cfg01e48a.log_server='{$request->log_server}'");
        $ssh->exec("uci set system.cfg01e48a.log_port={$request->log_port}");
        $ssh->exec("uci set system.cfg01e48a.log_protocol='{$request->log_protocol}'");
        $ssh->exec("uci set system.cfg01e48a.log_file='{$request->log_file}'");
        $ssh->exec("uci set system.cfg01e48a.log_level='{$request->log_level}'");
        $ssh->exec("uci set system.cfg01e48a.cron_log_level='{$request->cron_log_level}'");

        // Confirmar y aplicar los cambios
        $ssh->exec('uci commit system');
        $ssh->exec('/etc/init.d/system reload');

        return back()->with('success', 'Configuración de registro actualizada correctamente.');
    }
}
