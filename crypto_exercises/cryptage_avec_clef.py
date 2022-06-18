from cryptography.fernet import Fernet 
import sys
message = sys.argv[1]


if len(sys.argv) < 3:
 key = Fernet.generate_key() 
 fernet = Fernet(key)
 encMessage = fernet.encrypt(message.encode())
 print("original string : ", message) 
 print("encrypted string : ", encMessage.decode()) 
 print("encryption key : " , key.decode())
  
else : 
 key = sys.argv[2]
 bytes(key,'UTF-8')
 fernet = Fernet(key) 
 decMessage = fernet.decrypt(message.encode()).decode()
 print("original string : ", message)
 print("encryption key : " , key)
 print("encrypted string : ", decMessage) 

