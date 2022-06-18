import sys
data = ""
for i in range(1, len(sys.argv)):
    data += sys.argv[i] + " "


conversion_code = { 
        
        
        'A': 'Z', 'B': 'Y', 'C': 'X', 'D': 'W', 'E': 'V', 'F': 'U', 
        'G': 'T', 'H': 'S', 'I': 'R', 'J': 'Q', 'K': 'P', 'L': 'O', 
        'M': 'N', 'N': 'M', 'O': 'L', 'P': 'K', 'Q': 'J', 'R': 'I', 
        'S': 'H', 'T': 'G', 'U': 'F', 'V': 'E', 'W': 'D', 'X': 'C', 
        'Y': 'B', 'Z': 'A', 
      
        
        'a': 'z', 'b': 'y', 'c': 'x', 'd': 'w', 'e': 'v', 'f': 'u', 
        'g': 't', 'h': 's', 'i': 'r', 'j': 'q', 'k': 'p', 'l': 'o', 
        'm': 'n', 'n': 'm', 'o': 'l', 'p': 'k', 'q': 'j', 'r': 'i', 
        's': 'h', 't': 'g', 'u': 'f', 'v': 'e', 'w': 'd', 'x': 'c', 
        'y': 'b', 'z': 'a', 'é': 'm', 'è': 'm', 'à': 'z',
    } 
      
converted_data = "" 
      
      
for i in range(0, len(data)): 
    if data[i] in conversion_code.keys(): 
        converted_data += conversion_code[data[i]] 
    else: 
        converted_data += data[i] 
print("original string : ", data)       
print("encrypted message : " , converted_data)