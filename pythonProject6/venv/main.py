# coding: UTF-8
""" Script: pythonProject6/main
Création: svolland, le 15/01/2021 
"""


# Imports
import time
import requests
import mysql.connector
# Fonctions
def get_temperature(ville):
    url="http://api.openweathermap.org/data/2.5/weather?q="+ville+",fr&units=metric&lang=fr&appid=0a73790ec47f53b9e1f2e33088a0f7d0"
    return float(requests.get(url).json()['main']['temp'])

def set_temperature_bdd(temperature, ville):
 cnx = mysql.connector.connect(user='root', password='', host='127.0.0.1', database='bdd_temperaturevilles')
 cursor = cnx.cursor()
 update_val = ("UPDATE temperaturevilles SET temperature = (%s) WHERE  ville = (%s)")
 data = (temperature, ville)
 cursor.execute(update_val, data)
 cnx.commit()
 cursor.close()




# Programme principal
def main():
    listeville = ['saint-sébastien','douvaine','lyon','grenoble']
    while True:
        for i in range(len(listeville)):
            set_temperature_bdd(get_temperature(listeville[i]),listeville[i])
        print("Mis à jour")
        time.sleep(300)



if __name__ == '__main__':
    main()
    # Fin
