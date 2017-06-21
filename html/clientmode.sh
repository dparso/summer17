#! /bin/bash
# Switch from AP mode to client mode

# write to wpa_supplicant.conf
echo "Got it!"
echo $1
echo $2

bash -c "printf 'clientmode rebooting' >> /var/www/html/log.txt"
bash -c "printf '\nnetwork={\n\tssid=\"$1\"\n\tpsk=\"$2\"\n\tkey_mgmt=WPA-PSK\n}\n' >> /etc/wpa_supplicant/wpa_supplicant.conf"
bash -c "cp /etc/rc.local.client /etc/rc.local"
#bash -c "service hostapd stop"
#bash -c "systemctl daemon-reload"
#bash -c "service networking restart"
bash -c "reboot"
