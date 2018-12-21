import os
import time
from threading import Thread
import subprocess
import time
import commands

class Starter(Thread):
	
	def __init__(self, patch):
		
		Thread.__init__(self)
		self.patch=patch

	def run(self):
				print("Lancement de "+self.patch.split("/")[-1])
				settext=open("Fichier/"+self.patch.split("/")[-1].replace(".pd","")+"/set.txt")
				setting=settext.read()
				setting=setting.split(";")
				open("Fichier/"+self.patch.split("/")[-1].replace(".pd","")+"/set.txt").close()
				
				reqtext=open("Fichier/"+self.patch.split("/")[-1].replace(".pd","")+"/required.txt")
				requ=reqtext.read()
				requ=requ.split(";")				
				open("Fichier/"+self.patch.split("/")[-1].replace(".pd","")+"/required.txt").close()
				
				for i in range(0,len(setting)):
					para=requ[i].split(",")
					print(para[i]+str(i)+" : "+setting[i])
					#print(requ[i])
					
				#print(setting)
				
				os.system(self.patch)
                



print("****************Initialisation****************")

os.system("puredata -nogui -audioindev 3 &")
print("Input/Output set")

print("*******************Demarage*******************")

nofile=True

while True :
	try :
		with open('StartPureData/commande.txt') :
			
			print("****************Nouveau Patch****************")
			nofile=False
			
			my_file=open('StartPureData/commande.txt')
			thread=Starter(my_file.read())			
			
			status, output = commands.getstatusoutput ("pidof pd")
			status, output = commands.getstatusoutput ("kill "+str(output))
			
			print("Lancement wiring...")
			os.system("sudo pd Fichier/wiringPi-help.pd &")
			print("Fait")
			
			print("Demarage du Thread...")
			thread.start()

			
			my_file.close()
			os.remove('StartPureData/commande.txt')
			
	
	except IOError :
		if(nofile):
			print("Attente d'une commande...")
			nofile=False
