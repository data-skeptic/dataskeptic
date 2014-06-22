import json
from twython import Twython
import ConfigParser

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

links = []
feed = twitter.get_home_timeline()
for item in feed:
  text = item['text']
  pos1 = indexOf('http', text, 0)
  if pos1 != -1:
    pos2 = indexOf(' ', text, pos1)
    if (pos2 == -1):
      pos2 = len(text)
    url = text[pos1:pos2]
    anchor = text[0:pos1]
    if len(anchor)>0 and len(url)>0:
      link = {}
      link['url'] = url
      link['anchor'] = anchor
      link['acnt'] = item['user']['screen_name']
      links.append(link)

if len(links) > 0:
  jdata = json.dumps(links)
  f = open('tweets.json', 'w')
  f.write(jdata)
  f.close()


