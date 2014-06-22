import os
import sys
import json
import matplotlib
import matplotlib.pyplot as plt
import matplotlib.dates as mdates
import numpy
from datetime import datetime

dir = str(sys.argv[1])

files = os.listdir(dir)
recent = []

files.sort()

for file in files:
  if file.endswith('.json'):
    dtstr = file.replace('basis-data-', '').replace('.json', '')
    dt = datetime.strptime(dtstr, '%Y-%m-%d')
    age = (datetime.now() - dt).days
    if age < 90:
      f = open(dir + '/' + file, 'r')
      jdata = json.load(f)
      f.close()
      recent.append(jdata)

dts = []
ts = []

metric = 'heartrate'
for data in recent:
  daily_ts = data['metrics'][metric]['values']
  daily_ts = [m for m in daily_ts if m is not None]  
  if len(daily_ts) > 0:
    avg = numpy.median(daily_ts)
    dts.append(datetime.fromtimestamp(data['starttime']))
    ts.append(avg)

plt.clf()
fig, ax = plt.subplots(1)
ax.plot(dts, ts)
fig.autofmt_xdate()
ax.fmt_xdata = mdates.DateFormatter('%m-%d')
plt.title('My median daily heartrate')
fig.set_size_inches(6,2.5)
plt.savefig(metric + '.png', dpi=72)

#TODO: sleep data is more interesting, but you need to do some post processing first

#for data in recent:
#  dur = 0
#  activities = data['bodystates']
#  for activity in activities:
#    if activity[2]=='sleep':
#      dur += activity[1] - activity[0]
#  hours = 1.0 * dur / (24*60*60*1000);
#  print hours

#save as png
#/home/ubuntu/git/dataskeptic/tweeting-agent/

