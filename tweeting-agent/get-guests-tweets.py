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

out = open('twitter.htm', 'w')
out.write('<table>')

f = open('guests.lst', 'r')

guests = f.readlines()
f.close()
guests.reverse()
alltweets = []
for guest in guests:
  guest = guest.strip()
  if len(guest)>0:
    data = twitter.show_user(screen_name=guest)
    tweets = twitter.get_user_timeline(screen_name=guest)
    img = data['profile_image_url_https']
    name = data['name']
    #tweets.reverse()
    tweets = tweets[0:min(3, len(tweets))]
    alltweets.extend(tweets)

alltweets.sort(key=lambda x: x['created_at'])
if len(alltweets)>10:
  alltweets = alltweets[0:10]

for tweet in alltweets:
  htm = twitter.html_for_tweet(tweet)
  guest = tweet['user']['screen_name'].encode('utf-8')
  img = twitter.show_user(screen_name=guest)['profile_image_url_https']
  out.write('<tr><td valign=top><img src=\'' + img + '\' /></td>')
  out.write('<td valign=top><a href="http://twitter.com/' + guest[1:len(guest)] + '">' + guest + '</a><br/>' + htm.encode('ascii', 'xmlcharrefreplace') + '</td></tr>')

out.flush()
out.close()
