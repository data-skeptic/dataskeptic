import json
from twython import Twython
import ConfigParser
import pandas as pd
import time

propertiesFile = "my.properties"
cp = ConfigParser.ConfigParser()
cp.readfp(open(propertiesFile))

APP_KEY            = cp.get('Params', 'app_key')
APP_SECRET         = cp.get('Params', 'app_secret')
OAUTH_TOKEN        = cp.get('Params', 'oauth_token')
OAUTH_TOKEN_SECRET = cp.get('Params', 'oauth_token_secret')

twitter = Twython(APP_KEY, APP_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET)

name='dataskeptic'
next_cursor = -1

followers = []

while(next_cursor):
	search = twitter.get_followers_list(screen_name=name,count=200,cursor=next_cursor)
	for result in search['users']:
		followers.append(result["name"].encode('utf-8'))
	next_cursor = search["next_cursor"]
	time.sleep(1)

followers = pd.Series(followers)
followers.sort(inplace=True)

dt = time.strftime("%Y-%m-%d")
fname = str(dt) + '_followers.txt'
f = open(fname, 'w')
for follower in followers:
	f.write(follower)
	f.write('\n')

f.close()

