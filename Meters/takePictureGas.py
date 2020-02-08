#Imports
import requests
import time
from datetime import datetime
import cv2
import pytesseract
from PIL import Image
import os
import glob
#Vaste variable
BaseFolder = "/var/www/html/Meters/Gas/"
User = "root"
Password = "ismart12"
IPadres = "192.168.178.105"
now = datetime.now()
DateTime = now.strftime("%Y%m%d%H%M%S")
#Get request sturen om de leds aan te schakelen
requestLightOn = requests.get("http://192.168.178.168/cm?cmnd=Power%20On", verify=False)
if requestLightOn.status_code == 200:
    #Wacht 15seconden om beeld te laten stabiliseren
    time.sleep(5)
    #Neem de foto en sla deze op
    requestTakePhoto = requests.get("https://"+User+":"+Password+"@"+IPadres+"/cgi-bin/currentpic.cgi", verify=False)
    if requestTakePhoto.status_code == 200:
        with open(BaseFolder+"FullImage/"+DateTime+".jpg", 'wb') as f:
            f.write(requestTakePhoto.content)
        f.close
        #Open de foto met openCV
        originalImage = cv2.imread(BaseFolder+"FullImage/"+DateTime+".jpg")
        #Zet foto om naar grijswaarden
        grayImage = cv2.cvtColor(originalImage, cv2.COLOR_BGR2GRAY)
        cv2.imwrite(BaseFolder+"FullImage/"+DateTime+"G.jpg", grayImage)
        #Hoogte en breedte van aparte digit's
        w = 80
        h = 110
        #Functie om digits uit te knippen
        def cutDigit(position, x, y):
            digCrop = grayImage[y:y+h, x:x+w]
            (thresh, digBW) = cv2.threshold(digCrop, 128, 255, cv2.THRESH_BINARY | cv2.THRESH_OTSU)
            cv2.imwrite(BaseFolder+"Numbers/"+DateTime+"Dig"+str(position)+".jpg", digBW)
        cutDigit(2,390,550)
        cutDigit(3,500,545)
        cutDigit(4,625,555)
        cutDigit(5,745,555)
        cutDigit(6,880,555)
        cutDigit(7,1000,545)
        #De geknipte afbeeldingen samen voegen
        images = [Image.open(x) for x in [BaseFolder+"Numbers/"+DateTime+"Dig2.jpg",BaseFolder+"Numbers/"+DateTime+"Dig3.jpg",BaseFolder+"Numbers/"+DateTime+"Dig4.jpg",BaseFolder+"Numbers/"+DateTime+"Dig5.jpg",BaseFolder+"Numbers/"+DateTime+"Dig6.jpg",BaseFolder+"Numbers/"+DateTime+"Dig7.jpg"]]
        widths, heights = zip(*(i.size for i in images))
        total_width = sum(widths)
        max_height = max(heights)
        new_im = Image.new('RGB', (total_width, max_height))
        x_offset = 0
        for im in images:
            new_im.paste(im, (x_offset,0))
            x_offset += im.size[0]
        new_im.save(BaseFolder+"Numbers/All"+DateTime+".jpg")
        #Lees samen gevoegde afb + zet om naar tekst
        imageProc = cv2.imread(BaseFolder+"Numbers/All"+DateTime+".jpg")
        digTOtext1 = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 13 -c tessedit_char_whitelist=0123456789')
        digTOtext2 = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 12 -c tessedit_char_whitelist=0123456789')
        digTOtext3 = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 7 -c tessedit_char_whitelist=0123456789')
        digTOtext4 = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 6 -c tessedit_char_whitelist=0123456789')
        #Alleen wanneer 3methodes gelijk zijn
        if (len(digTOtext1) == 6):
            requestSendData = requests.get("http://192.168.178.207/sendMeter.php?dateti="+DateTime+"&type=gas&value="+digTOtext1, verify=False)
        elif (len(digTOtext3) == 6):
            requestSendData = requests.get("http://192.168.178.207/sendMeter.php?dateti="+DateTime+"&type=gas&value="+digTOtext3, verify=False)
        elif (len(digTOtext4) == 6):
            requestSendData = requests.get("http://192.168.178.207/sendMeter.php?dateti="+DateTime+"&type=gas&value="+digTOtext4, verify=False)
        elif (len(digTOtext2) == 6):
            requestSendData = requests.get("http://192.168.178.207/sendMeter.php?dateti="+DateTime+"&type=gas&value="+digTOtext2, verify=False)
        #Sluit OpenCV
        cv2.waitKey(0)
        #Bestanden terug verwijderen die niet nodig zijn
        for fl in glob.glob(BaseFolder+"FullImage/"+DateTime+"*.jpg"):
            os.remove(fl)
        for fl2 in glob.glob(BaseFolder+"Numbers/"+DateTime+"*.jpg"):
            os.remove(fl2)
    requestTakePhoto.close()
requestLightOn.close()
#Schakel lamp terug uit
requestLightOff = requests.get("http://192.168.178.168/cm?cmnd=Power%20Off", verify=False)
requestLightOff.close()