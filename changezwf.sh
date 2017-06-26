# 'changezwf'
# Changes operating frequency for Z-Wave.Me UZB Device

if [ $# -lt 2 ]
then
        echo "Usage : $0 USB_Port Country_Code"
        exit
fi

case $2 in
EU)
	echo 'Switch to European Frequency (848.4 ... 869 MHz)'
	echo -ne "\x01\x04\x00\xF2\x00\x09" > $1 ;;
RU)
	echo 'Switch to Russian Frequency (869 MHz)'
	echo -ne "\x01\x04\x00\xF2\x01\x08" > $1 ;;
IN)
	echo 'Switch to India Frequency (865.2 MHz)'
	echo -ne "\x01\x04\x00\xF2\x02\x07" > $1 ;; 
US)
	echo 'Switch to North/South American Frequency (908 MHz ... 916 MHz)'
	echo -ne "\x01\x04\x00\xF2\x03\x06" > $1 ;; 
ANZ)
	echo 'Switch to Frequency for Australia/New Zealand/Brasil/Peru (919 MHz ... 921 MHz)'
	echo -ne "\x01\x04\x00\xF2\x04\x05" > $1 ;; 
HK)
	echo 'Switch to Hongkong Frequency (919 MHz)'
	echo -ne "\x01\x04\x00\xF2\x05\x04" > $1 ;; 
CN)
	echo 'Switch to PR China Frequency (868 MHz)'
	echo -ne "\x01\x04\x00\xF2\x06\x03" > $1 ;; 
JP)
	echo 'Switch to Japanese/Taiwanese Frequency (922-926 MHz)'
	echo -ne "\x01\x04\x00\xF2\x07\x02" > $1 ;; 
KR)
	echo 'Switch to Korean Frequency (919 ... 923 MHz)'
	echo -ne "\x01\x04\x00\xF2\x08\x01" > $1 ;; 
IL)
	echo 'Switch to Israel Frequency (915 ... 917 MHz)'
	echo -ne "\x01\x04\x00\xF2\x09\x00" > $1 ;;
MY)
	echo 'Switch to Malaysia Frequency (868 MHz)'
	echo -ne "\x01\x04\x00\xF2\x0a\x03" > $1 ;; 
*) 
	echo "Country Code $2 is not valid. Try EU|RU|IN|US|ANZ|HK|CN|JP|KR|IL|MY" ;;	 

esac
