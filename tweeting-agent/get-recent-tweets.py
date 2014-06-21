import json
from twython import Twython

APP_KEY = '1K6safsIpde3dmH41fEt47HgT'
APP_SECRET = 'EegtRLDEmROvZHiTGIaj0EDhw2RNegRur3toLYBQUgk0re13F1'
OAUTH_TOKEN       = '2578087086-pvtK6SUyxHkIn2n6hFegDi61gmk2u8OuvTtV08n'
OAUTH_TOKEN_SECRET = 'aCVKWF1SD0jphXiDkwHPRAHSWycQvNxJmrIzj16uCzzR0'

#twitter = Twython(APP_KEY, APP_SECRET)
#auth = twitter.get_authentication_tokens()
#OAUTH_TOKEN = auth['oauth_token']
#OAUTH_TOKEN_SECRET = auth['oauth_token_secret']

twitter = Twython(APP_KEY, APP_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET)

#twitter.search(q='test')

twitter.update_status(status='test')

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
    print anchor, url
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


