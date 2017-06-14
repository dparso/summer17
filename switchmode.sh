#! /bin/bash
# Switch from AP mode to client mode

echo $1
echo $2
echo "hi"
#mkdir /home/pi/Desktop/newDir
touch test.txt
bash -c "printf '\nnetwork={\n\tssid=\"$1\"\n\tkey_mgmt=NONE\n}\n' >> /etc/wpa_supplicant/wpa_supplicant.conf"
