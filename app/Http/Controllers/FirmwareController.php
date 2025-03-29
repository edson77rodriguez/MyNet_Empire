<?php

namespace App\Http\Controllers;

use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FirmwareController extends Controller
{
    // Método para conectar al router y ejecutar un comando
    private function sshConnect()
    {
        $ssh = new SSH2('192.168.1.1');  // Dirección IP de tu router (ajústala según tu caso)

        // Si el router requiere una clave privada para la autenticación
        if (!$ssh->login('usuario', 'contraseña')) {  // Usa tus credenciales de acceso SSH
            throw new \Exception('No se pudo conectar al router.');
        }

        return $ssh;
    }

    // Método para ejecutar un comando en el router
    private function executeCommand($command)
    {
        try {
            $ssh = $this->sshConnect();
            return $ssh->exec($command); // Ejecuta el comando en el router
        } catch (\Exception $e) {
            return 'Error al ejecutar el comando: ' . $e->getMessage();
        }
    }

    // Generar archivo de copia de seguridad
    public function generateBackup()
    {
        try {
            // Ejecutar comando para generar copia de seguridad en el router
            $output = $this->executeCommand('tar -czf /tmp/backup.tar /etc/config');  // Comando para generar el archivo .tar
            // Descargar el archivo
            $filePath = '/tmp/backup.tar';  // Ruta temporal del archivo en el router
            return response()->download($filePath, 'backup.tar');  // Descargar el archivo
        } catch (\Exception $e) {
            return back()->with('error', 'Error al generar la copia de seguridad: ' . $e->getMessage());
        }
    }

    // Restablecer configuraciones del router (ejemplo)
    public function resetToFactory()
    {
        try {
            // Conectar y ejecutar el comando de restablecimiento en el router
            $output = $this->executeCommand('firstboot && reboot');  // Comando para resetear y reiniciar (ajustar según el router)
            return back()->with('success', 'Restablecimiento de fábrica realizado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al realizar el restablecimiento: ' . $e->getMessage());
        }
    }

    // Subir firmware (ejemplo)
    public function uploadFirmwareImage(Request $request)
    {
        $request->validate([
            'firmware_image' => 'required|file|mimes:bin,img,iso', // Valida la imagen del firmware
        ]);

        try {
            $file = $request->file('firmware_image');
            $filePath = $file->storeAs('firmware', 'new_firmware.bin');  // Guarda la imagen en el almacenamiento

            // Subir la imagen al router (esto dependerá de cómo acepte el router la actualización de firmware)
            $output = $this->executeCommand('mtd -r write ' . storage_path('app/' . $filePath) . ' firmware');  // Comando de actualización (ajustar según tu router)

            return back()->with('success', 'Firmware cargado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar el firmware: ' . $e->getMessage());
        }
    }

    // Descargar Múdblock (para profesionales)
    public function saveMudblock(Request $request)
    {
        try {
            // Ejecutar comando para guardar el mudblock (ajustar según tus necesidades)
            $output = $this->executeCommand('save-mudblock-command');  // Ajusta el comando según sea necesario
            return back()->with('success', 'Múdblock guardado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al guardar el Múdblock: ' . $e->getMessage());
        }
    }

    // Subir imagen compatible con synupgrade para reemplazar el firmware
    public function uploadImageForSynupgrade(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:img,bin', // Valida la imagen del firmware compatible con synupgrade
        ]);

        try {
            $file = $request->file('image');
            $filePath = $file->storeAs('images', 'synupgrade_image.bin');  // Guarda la imagen en el almacenamiento

            // Ejecutar el comando para subir la imagen y realizar el reemplazo de firmware
            $output = $this->executeCommand('sysupgrade ' . storage_path('app/' . $filePath));  // Ajusta el comando para synupgrade

            return back()->with('success', 'Imagen cargada y firmware reemplazado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar la imagen y reemplazar el firmware: ' . $e->getMessage());
        }
    }
}
