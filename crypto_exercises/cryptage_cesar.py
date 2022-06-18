import sys

alpha1 = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
alpha2 = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]

s = sys.argv[1]
d= sys.argv[2]
d= int(d)
code = ''
j = 0
indice = 0
      
for n in range(0,len(s)):
    j+=1
    lettre = s[n]
    if lettre.isupper(): 
        for i in range(0,26) :
            if lettre == alpha1[i] :
                indice = i + d
                if indice > 25:
                     indice = indice % 26
                code += alpha1[indice]
                break
     
    elif lettre.islower(): 
        for i in range(0,26) :
            if lettre == alpha2[i] :
                indice = i + d
                if indice > 25:
                     indice = indice % 26
                code += alpha2[indice]
                break
    elif lettre == ' ' :
        code += ' '
    
        

print("original message : ", s)
print("Encrypted message : ", code)