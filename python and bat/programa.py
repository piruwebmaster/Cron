import smtplib
import MySQLdb
import time
db = MySQLdb.connect("localhost","root","","proyecto")
cursor = db.cursor()
cursor.execute("SELECT correo from usuarios")
toaddrs = [];
results = cursor.fetchall()
for row in results:
      toaddrs.append(row[0])
      print row[0]
horacompleta = time.strftime("%M:%S")
hora =  time.strftime("%H")
horasiguiente=(int(hora)+1)%24;
horacompletasiguiente = str(horasiguiente)+':'+horacompleta
print horacompletasiguiente
print "  Motion detected!"
fromaddr = ''
msg = 'La pizza \n \n \n siguiente correo a las ' + horacompletasiguiente
# Datos
username = ''
password = ''
# Enviando el correo
server = smtplib.SMTP('smtp.gmail.com:587')
server.starttls()
server.login(username,password)
for destino in toaddrs:
    server.sendmail(fromaddr, destino, msg)
server.quit()
