from midiutil.MidiFile import MIDIFile
import math
from scipy import *
import scipy.integrate

# It is puzzling that euler's constant is not as readily available.  I shall calculate it
# given the method shown by http://3chevrons.blogspot.com/2009/10/eulers-gamma.html

gamma = scipy.integrate.quad(lambda x:(-e**(-x)*log(x)), 0, inf)[0]


# let's let an arbitrary number of digits from these beautiful constants expressed in base 10
# define three melodies to be used in the theme
melody1 = [int(i) for i in str(int(floor(math.pi * 10** 4)))]
melody2 = [int(i) for i in str(int(floor(math.e  * 10**12)))]
melody3 = [int(i) for i in str(int(floor(gamma   * 10**16)))]
melody1 = melody1 + melody1 + melody1

# writing where time=0 is beat=1; easier for me to think in measures this way
rhythm1 = [1, 2, 2.5, 3, 3.5]
rhythm2 = [1.5, 2.5, 3, 4, 5, 5.5, 6.5, 8, 9.5, 10.5, 12, 12.5]
rhythm3 = [1.5, 2, 2.5, 3, 4, 5.5, 6, 6.5, 7, 8, 9.5, 10, 10.5, 11, 11.5, 12]
rhythm1 = rhythm1 + [i+4 for i in rhythm1] + [i+8 for i in rhythm1]

# merge them
song = [{"melody": melody1, "rhythm": rhythm1}, {"melody": melody2, "rhythm": rhythm2}, {"melody": melody3, "rhythm": rhythm3}]

# quick helper function
def getMajorScalePitch(n):
  octave = n / 8
  n = n - 8 * octave
  if (n==0):   p = 0
  elif (n==1): p = 0
  elif (n==2): p = 2
  elif (n==3): p = 4
  elif (n==4): p = 5
  elif (n==5): p = 7
  elif (n==6): p = 9
  elif (n==7): p = 11
  return octave * 12 + p

# now that we have the melody and rhythm, let's write them to a midi file
MyMIDI = MIDIFile(len(song))

middlec = 60

for track in range(0, len(song)):
  time = 0
  MyMIDI.addTrackName(track,time,"Track #" + str(track))
  MyMIDI.addTempo(track,time,120)
  
  channel = track
  duration = 0.5
  volume = 100
  
  for n in range(0, len(song[track]['rhythm'])):
    pitch = middlec + getMajorScalePitch(song[track]['melody'][n])
    time  = song[track]['rhythm'][n] - 1
    MyMIDI.addNote(track,channel,pitch,time,duration,volume)

# And write it to disk.
binfile = open("theme.mid", 'wb')
MyMIDI.writeFile(binfile)
binfile.close()
