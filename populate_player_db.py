import requests
import mysql.connector

def parse_player_info(player_hash):
  return dict(first_name = player_hash['first_name'], last_name = player_hash['last_name'], position = player_hash['position'])

url = 'https://api.collegefootballdata.com/roster'
headers = {
  'Authorization': 'Bearer REPLACEWITHYOURACCESSTOKEN'
}
res = requests.get(url, headers=headers)
player_info_map = map(parse_player_info, res.json())

mydb = mysql.connector.connect(
  host="localhost",
  user="YOUR_USER",
  password="YOUR_PASSWORD",
  database="cf_players"
)

mycursor = mydb.cursor()

for entry in player_info_map:
  if entry['first_name']:
    sql = "INSERT INTO first_names(name) VALUES (%s)"
    val = (entry['first_name'],)
    mycursor.execute(sql, val)
  
  if entry['last_name']:
    sql = "INSERT INTO last_names(name) VALUES (%s)"
    val = (entry['last_name'],)
    mycursor.execute(sql, val)
  
  if entry['position'] and entry['position'] != '?':
    sql = "INSERT INTO positions(name) VALUES (%s)"
    val = (entry['position'],)
    mycursor.execute(sql, val)

mydb.commit()
