<?php

namespace App\Http\Controllers;

use phpseclib3\Net\SSH2;
use Illuminate\Http\Request;

class LocalStartupController extends Controller
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

    // Obtener el contenido de /etc/rc.local
    public function getRcLocalContent()
{
    try {
        $ssh = $this->sshConnect();
        $content = $ssh->exec('cat /etc/rc.local');  // Comando para leer el archivo rc.local
        return view('admin.arranque', ['content' => $content]);  // Pasa el contenido a la vista
    } catch (\Exception $e) {
        return back()->with('error', 'Error al obtener el archivo rc.local: ' . $e->getMessage());
    }
}


    // Guardar los cambios en /etc/rc.local
    public function saveRcLocal(Request $request)
    {
        $newContent = $request->input('rc_local_content');  // Contenido nuevo del archivo rc.local

        try {
            $ssh = $this->sshConnect();
            $command = 'echo "' . $newContent . '" > /etc/rc.local';  // Comando para sobrescribir el archivo rc.local
            $ssh->exec($command);

            return back()->with('success', 'Los cambios han sido guardados correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al guardar los cambios en rc.local: ' . $e->getMessage());
        }
    }
}
