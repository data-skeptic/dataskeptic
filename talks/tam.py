import time
import json
from twython import Twython
import ConfigParser
from dateutil import parser

propertiesFile = "my.properties"
cp = ConfigParser.ConfigParser()
cp.readfp(open(propertiesFile))

APP_KEY            = cp.get('Params', 'app_key')
APP_SECRET         = cp.get('Params', 'app_secret')
OAUTH_TOKEN        = cp.get('Params', 'oauth_token')
OAUTH_TOKEN_SECRET = cp.get('Params', 'oauth_token_secret')

def indexOf(needle, haystack, start):
  try:
    idx = haystack.index(needle, start)
    return idx
  except ValueError:
    return -1

twitter = Twython(APP_KEY, APP_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET)

f = open('tam.txt', 'r')
guests = f.readlines()
f.close()

counts = {}

for i in range(0, len(guests)):
  guest = guests[i].strip()
  if len(guest)>1:
    udata = twitter.show_user(screen_name=guest)
    #followers = twitter.get_followers_ids(screen_name=guest)
    counts[guest] = udata['followers_count']
    time.sleep(1)

f = open('twitter_result.tab', 'w')
for key in counts.keys():
  f.write(key)
  f.write('\t')
  f.write(str(counts[key]))
  f.write('\n')

f.close()

