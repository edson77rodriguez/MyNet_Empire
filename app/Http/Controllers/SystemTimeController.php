<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;

class SystemTimeController extends Controller
{
    public function showTimeSettings()
    {
        // Valores por defecto
        $defaults = [
            'enable_ntp_client' => true,
            'enable_ntp_server' => false,
            'use_dhcp_servers' => true,
            'ntp_servers' => '0.openwrt.pool.ntp.org\n1.openwrt.pool.ntp.org\n2.openwrt.pool.ntp.org\n3.openwrt.pool.ntp.org',
        ];

        return view('system.time_settings', $defaults);
    }

    public function updateTimeSettings(Request $request)
    {
        // Validación de los datos de la configuración de NTP
        $validated = $request->validate([
            'enable_ntp_client' => 'required|boolean',
            'enable_ntp_server' => 'required|boolean',
            'use_dhcp_servers' => 'required|boolean',
            'ntp_servers' => 'nullable|string',
        ]);

        // Valores por defecto en caso de que no se envíen datos
        $defaults = [
            'enable_ntp_client' => true,
            'enable_ntp_server' => false,
            'use_dhcp_servers' => true,
            'ntp_servers' => '0.openwrt.pool.ntp.org\n1.openwrt.pool.ntp.org\n2.openwrt.pool.ntp.org\n3.openwrt.pool.ntp.org',
        ];

        // Combinamos los valores validados con los valores por defecto
        $settings = array_merge($defaults, $validated);

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

        // Configuración NTP
        $ssh->exec("uci set system.ntpclient.enabled={$settings['enable_ntp_client']}");
        $ssh->exec("uci set system.ntpserver.enabled={$settings['enable_ntp_server']}");
        $ssh->exec("uci set system.use_dhcp_ntp={$settings['use_dhcp_servers']}");
        $ssh->exec("uci set system.ntpservers='{$settings['ntp_servers']}'");

        // Confirmar y aplicar los cambios
        $ssh->exec('uci commit system');
        $ssh->exec('/etc/init.d/system reload');

        return back()->with('success', 'Configuración de sincronización horaria actualizada correctamente.');
    }
}
