<?php

namespace App\Http\Controllers;

use phpseclib3\Net\SSH2;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    // Método para conectar al router via SSH
    private function sshConnect()
    {
        $ssh = new SSH2('192.168.1.1');  // Dirección IP de tu router (ajústala según tu caso)

        if (!$ssh->login('usuario', 'contraseña')) {  // Usa tus credenciales de acceso SSH
            throw new \Exception('No se pudo conectar al router.');
        }

        return $ssh;
    }

    // Ejecutar comando en el router
    private function executeCommand($command)
    {
        try {
            $ssh = $this->sshConnect();
            return $ssh->exec($command); // Ejecuta el comando en el router
        } catch (\Exception $e) {
            return 'Error al ejecutar el comando: ' . $e->getMessage();
        }
    }

    // Activar script de inicio
    public function startScript($scriptName)
    {
        try {
            $command = "service {$scriptName} start";  // Comando para iniciar el script
            $output = $this->executeCommand($command);
            return back()->with('success', "El script {$scriptName} ha sido iniciado.");
        } catch (\Exception $e) {
            return back()->with('error', 'Error al iniciar el script: ' . $e->getMessage());
        }
    }

    // Reiniciar script de inicio
    public function restartScript($scriptName)
    {
        try {
            $command = "service {$scriptName} restart";  // Comando para reiniciar el script
            $output = $this->executeCommand($command);
            return back()->with('success', "El script {$scriptName} ha sido reiniciado.");
        } catch (\Exception $e) {
            return back()->with('error', 'Error al reiniciar el script: ' . $e->getMessage());
        }
    }

    // Detener script de inicio
    public function stopScript($scriptName)
    {
        try {
            $command = "service {$scriptName} stop";  // Comando para detener el script
            $output = $this->executeCommand($command);
            return back()->with('success', "El script {$scriptName} ha sido detenido.");
        } catch (\Exception $e) {
            return back()->with('error', 'Error al detener el script: ' . $e->getMessage());
        }
    }
}
