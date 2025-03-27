<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;

class SystemLanguageStyleController extends Controller
{
    public function showLanguageStyleSettings()
    {
        // Valores por defecto
        $defaults = [
            'language' => 'es',
            'style' => 'light',
        ];

        return view('system.language_style', $defaults);
    }

    public function updateLanguageStyleSettings(Request $request)
    {
        // Validación de los datos de idioma y estilo
        $validated = $request->validate([
            'language' => 'required|string|in:es,en',
            'style' => 'required|string|in:light,dark',
        ]);

        // Combinamos los valores validados con los valores por defecto
        $settings = array_merge([
            'language' => 'es',
            'style' => 'light',
        ], $validated);

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

        // Configuración de idioma y estilo
        $ssh->exec("uci set system.language={$settings['language']}");
        $ssh->exec("uci set system.style={$settings['style']}");

        // Confirmar y aplicar los cambios
        $ssh->exec('uci commit system');
        $ssh->exec('/etc/init.d/system reload');

        return back()->with('success', 'Configuración de idioma y estilo actualizada correctamente.');
    }
}
