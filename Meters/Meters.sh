#!/bin/bash
BASE_FOLDER="/var/www/html/Meters/Gas/"
USER="root" 
PASS="ismart12" 
NOW=$(date +"%Y/%m/%d %H:%M")
#Schakel Leds aan
curl -k -s https://$USER:$PASS@192.168.178.105/cgi-bin/action.cgi?cmd=ir_led_on >> /dev/null echo 
#Wacht 15seconden
sleep 15
#Neem foto
curl -k -s https://$USER:$PASS@192.168.178.105/cgi-bin/currentpic.cgi > $BASE_FOLDER"Gas.png"
#Schakel leds uit
curl -k -s https://$USER:$PASS@192.168.178.105/cgi-bin/action.cgi?cmd=ir_led_off >> /dev/null
#Knip nummers uit foto test
convert /var/www/html/Meters/Gas/Gas.png -crop 80x120+125+670 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num1.png
convert /var/www/html/Meters/Gas/Gas.png -crop 100x140+225+675 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num2.png
convert /var/www/html/Meters/Gas/Gas.png -crop 100x140+360+695 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num3.png
convert /var/www/html/Meters/Gas/Gas.png -crop 100x140+510+705 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num4.png
convert /var/www/html/Meters/Gas/Gas.png -crop 100x140+685+715 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num5.png
convert /var/www/html/Meters/Gas/Gas.png -crop 100x140+865+715 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num6.png
convert /var/www/html/Meters/Gas/Gas.png -crop 90x130+1030+705 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num7.png
convert /var/www/html/Meters/Gas/Gas.png -crop 90x140+1210+675 -density 600 -set units PixelsPerInch /var/www/html/Meters/Gas/num8.png
