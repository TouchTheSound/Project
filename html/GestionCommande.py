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
                print(type(self.patch))
		#os.system("puredata -audioindev 3")
		#os.system("pd Fichier/wiringPi-help.pd")
                os.system(self.patch)
                print("on est rentre avec" + self.patch)



#print("Initialisation...")
#os.system("puredata -audioindev 3 &")
#print("Audio Set")
#os.system("pd Fichier/wiringPi-help.pd &")
#print("Start")

os.system("puredata -nogui -audioindev 3 &")

while True :
	try :
		with open('StartPureData/commande.txt') :
			
			my_file=open('StartPureData/commande.txt')
			#audios=Starter("puredata -audioindev 3")
			#wiring=Starter("pd Fichier/wiringPi-help.pd")
			#print("le contenue de commande : ")
			#print(my_file.read())
			thread=Starter(my_file.read())
			
			
			
			status, output = commands.getstatusoutput ("pidof pd")
			status, output = commands.getstatusoutput ("kill "+str(output))
			os.system("pd -nogui Fichier/wiringPi-help.pd &")
			thread.start()

			
			my_file.close()
			os.remove('StartPureData/commande.txt')
	
	except IOError :
		print("Pas de Fichier...")
		time.sleep(1)
		
		
		
		
#""" Probablement a jeter


#class Killer(Thread):

#	def __init__(self,patch):
#
#		Thread.__init__(self)
#		self.patch=patch
#
#	def run(self):
#		pid=os.system('pidof pd')
#		os.system('kill '+str(pid))
#		print('on a kill : '+str(pid))


                #pid=os.system('pidof pd')
		#os.system('kill '+str(pid))
                #print("info ")
                #print(str(self.patch))
                #print("est de type")
                
                #pid=os.system('pidof pd')
			#print('facile')
			#os.system('python GestionCommande.py')
			#os.system("kill "+str(pid))
			#print('pass')


#print('On a :'+str(pid))


			#killer=Killer(my_file.read())
			#killer.start()
			#print("le pidof : "+str(subprocess.check_output('pidof pd',shell=True)))
			
			
			
			#time.sleep(2)
			
			
			
			#print("print l'output : "+str(output))
			
			
			
			
			
			#call(my_file.read())			
			#subprocess.call(['pd -nogui -inchannels 0 Fichier/Sol_392.pd'])
