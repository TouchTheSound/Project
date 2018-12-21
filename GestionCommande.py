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
                os.system(self.patch)

os.system("puredata -nogui -audioindev 3 &")


while True :
	try :
		with open('StartPureData/commande.txt') :
			
			my_file=open('StartPureData/commande.txt')
			thread=Starter(my_file.read())
						
			
			status, output = commands.getstatusoutput ("pidof pd")
			status, output = commands.getstatusoutput ("kill "+str(output))
			os.system("sudo pd -nogui Fichier/wiringPi-help.pd &")
			thread.start()

			
			my_file.close()
			os.remove('StartPureData/commande.txt')
			
	
	except IOError :
		time.sleep(1)
