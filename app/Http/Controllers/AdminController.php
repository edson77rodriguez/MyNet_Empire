<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;

class AdminController extends Controller
{
    // Mostrar formulario para cambiar la contraseña del router
    public function passwordForm()
    {
        return view('admin.password');  // Asegúrate de que la vista está en resources/views/admin/password.blade.php
    }

    // Actualizar la contraseña del router
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|max:63|confirmed',
        ]);
    
        $ipRouter = '192.168.10.1';
        $username = 'root';
        $currentPassword = 'mynet'; // Cambia según tu configuración

        try {
            // Intentar conexión SSH al router
            $ssh = new SSH2($ipRouter);
            if (!$ssh->login($username, $currentPassword)) {
                throw new \Exception('No se pudo conectar al router.');
            }

            // Comando para cambiar la contraseña en OpenWRT
            $newPassword = escapeshellarg($request->password);
            $ssh->exec("echo -e \"$currentPassword\n$newPassword\n$newPassword\" | passwd");
    
            return back()->with('success', 'Contraseña actualizada correctamente.');
        } catch (\Exception $e) {
            // Si no se puede conectar, mostrar un mensaje simulando éxito
            return back()->with('error', 'Error: ' . $e->getMessage() . ' (simulación).');
        }
    }
    
    // Mostrar el formulario de configuración de crontab con el contenido actual
    public function crontabForm()
    {
        $ipRouter = '192.168.10.1';
        $username = 'root';
        $password = 'mynet'; // Cambia según tu configuración

        try {
            // Conectar al router vía SSH
            $ssh = new SSH2($ipRouter);
            if (!$ssh->login($username, $password)) {
                throw new \Exception('No se pudo conectar al router.');
            }

            // Obtener el contenido del crontab
            $crontabContent = $ssh->exec('crontab -l');
            
            // Mostrar la vista con el contenido del crontab
            return view('admin.crontab', compact('crontabContent'));
        } catch (\Exception $e) {
            // Si no se puede conectar, mostrar un mensaje simulando el contenido
            $crontabContent = "# Simulación de contenido de crontab\n* * * * * /path/to/command";
            return view('admin.crontab', compact('crontabContent'))->with('error', 'No se pudo conectar al router (simulación).');
        }
    }

    // Guardar las nuevas tareas programadas en el crontab del router
    public function updateCrontab(Request $request)
    {
        $request->validate([
            'crontab' => 'required|string',
        ]);

        $ipRouter = '192.168.10.1';
        $username = 'root';
        $password = 'mynet'; // Cambia según tu configuración

        try {
            // Conectar al router vía SSH
            $ssh = new SSH2($ipRouter);
            if (!$ssh->login($username, $password)) {
                throw new \Exception('No se pudo conectar al router.');
            }

            // Guardar el nuevo crontab en el router
            $newCrontab = escapeshellarg($request->crontab);
            $ssh->exec("echo $newCrontab | crontab -");
    
            return back()->with('success', 'Crontab actualizado correctamente.');
        } catch (\Exception $e) {
            // Si no se puede conectar, simular actualización
            return back()->with('error', 'Error al actualizar el crontab: ' . $e->getMessage() . ' (simulación).');
        }
    }

    // Reiniciar el servicio cron en el router
    public function restartCrond()
    {
        $ipRouter = '192.168.10.1';
        $username = 'root';
        $password = 'mynet'; // Cambia según tu configuración

        try {
            // Conectar al router vía SSH
            $ssh = new SSH2($ipRouter);
            if (!$ssh->login($username, $password)) {
                throw new \Exception('No se pudo conectar al router.');
            }

            // Reiniciar el servicio cron
            $ssh->exec('/etc/init.d/cron restart');
    
            return back()->with('success', 'Servicio Crond reiniciado correctamente.');
        } catch (\Exception $e) {
            // Si no se puede conectar, simular reinicio
            return back()->with('error', 'Error al reiniciar el servicio cron: ' . $e->getMessage() . ' (simulación).');
        }
    }
}
