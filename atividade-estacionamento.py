dia = (input("Vai querer deixar o dia inteiro?\n"))

if dia == ("sim"):
    print("O preço será de R$40")
  
if dia == ("nao"):
    print("Então continue com as outras opções")
    


entrada = float(input("Digite a hora de entrada \n"))
saida = float(input("Digite a hora de saída \n"))



if entrada > saida:
    hora_final = (saida + 24) - entrada
   
else:
    hora_final = saida - entrada
    
print(f"A permanência foi de: {hora_final}  \n")


hora_final = hora_final * 60 + hora_final


if 1 <= hora_final <= 60:
    preco = 1
    print(f"O valor a ser pago será de R$ {float(preco)}")
elif 60 < hora_final <= 120:
    preco = 2
    print(f"O valor a ser pago será de R$ {float(preco)}")
elif 120 < hora_final <= 180:
    preco = 4.2
    print(f"O valor a ser pago será de R$ {float(preco)}")
elif 180 < hora_final <= 240:
    preco = 5.6
    print(f"O valor a ser pago será de R$ {float(preco)}")
elif 240 < hora_final <= 300:
    preco = 7.0
    print(f"O valor a ser pago será de R$ {float(preco)}")


    
    