<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;
class SystemLogController extends Controller
{
    public function showLogSettings()
    {
        // Valores por defecto
        $defaults = [
            'buffer_size' => 64,
            'log_server' => '0.0.0.0',
            'log_port' => 514,
            'log_protocol' => 'UDP',
            'log_file' => '/tmp/system.log',
            'log_level' => 'Debug',
            'cron_log_level' => 'Debug',
        ];
    
        return view('system.log_settings', $defaults);
    }
    
    public function updateLogConfig(Request $request)
    {
        // Valores por defecto en caso de que no se envíen datos
        $defaults = [
            'buffer_size' => 64,
            'log_server' => '0.0.0.0',
            'log_port' => 514,
            'log_protocol' => 'UDP',
            'log_file' => '/tmp/system.log',
            'log_level' => 'Debug',
            'cron_log_level' => 'Debug',
        ];
    
        // Validación de los datos para la configuración de registro
        $validated = $request->validate([
            'buffer_size' => 'nullable|integer|min:1',
            'log_server' => 'nullable|ip',
            'log_port' => 'nullable|integer|min:1',
            'log_protocol' => 'nullable|string',
            'log_file' => 'nullable|string',
            'log_level' => 'nullable|string',
            'cron_log_level' => 'nullable|string',
        ]);
    
        // Combinamos los valores validados con los valores por defecto
        $validated = array_merge($defaults, $validated);
    
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
        $ssh->exec("uci set system.cfg01e48a.buffer_size={$validated['buffer_size']}");
        $ssh->exec("uci set system.cfg01e48a.log_server='{$validated['log_server']}'");
        $ssh->exec("uci set system.cfg01e48a.log_port={$validated['log_port']}");
        $ssh->exec("uci set system.cfg01e48a.log_protocol='{$validated['log_protocol']}'");
        $ssh->exec("uci set system.cfg01e48a.log_file='{$validated['log_file']}'");
        $ssh->exec("uci set system.cfg01e48a.log_level='{$validated['log_level']}'");
        $ssh->exec("uci set system.cfg01e48a.cron_log_level='{$validated['cron_log_level']}'");
    
        // Confirmar y aplicar los cambios
        $ssh->exec('uci commit system');
        $ssh->exec('/etc/init.d/system reload');
    
        return back()->with('success', 'Configuración de registro actualizada correctamente.');
    }
    
}
