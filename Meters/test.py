import pytesseract
import cv2
imagepath = "/home/mike/Pictures/AImeters/Gas/Numbers/All20200207101431.jpg"

imageProc = cv2.imread(imagepath)
dig6text = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 6 -c tessedit_char_whitelist=0123456789')
dig7text = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 7 -c tessedit_char_whitelist=0123456789')
dig12text = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 12 -c tessedit_char_whitelist=0123456789')
dig13text = pytesseract.image_to_string(imageProc, lang='eng', config='--psm 13 -c tessedit_char_whitelist=0123456789')
print("13 : " + dig13text)
print("07 : " + dig7text)
print("06 : " + dig6text)
print("12 : " + dig12text)