http://ajp.psychiatryonline.org/doi/abs/10.1176/appi.ajp.2010.10020289

setwd("~/git/dataskeptic/blog")
years = 2002:2012

for (year in years) {
  file = paste("mort", year, "us.zip", sep="")
  url = paste("ftp://ftp.cdc.gov/pub/Health_Statistics/NCHS/Datasets/DVS/mortality/", file, sep="")
  if(!file.exists(file)) {
    print(url)
    download.file(url, destfile=file, cacheOK=TRUE, quiet=TRUE, mode="wb", method="wget")
  }
  unzip(file)
  uncompressed = unzip(file, list=TRUE)$Name
  data = read.csv(uncompressed)
}
data[1,]

<? include("../header.php") ?>

ftp://ftp.cdc.gov/pub/Health_Statistics/NCHS/Datasets/DVS/mortality/mort2012us.zip
ftp://ftp.cdc.gov/pub/Health_Statistics/NCHS/Datasets/DVS/mortality/mort2002us.zip

<div id="bbody">
<h1>
</h1>

<p>
</p>

<h2>Data Aquisition</h2>
http://www.cdc.gov/nchs/data_access/Vitalstatsonline.htm

Linked to from site
http://www.cdc.gov/nchs/data/dvs/Record_Layout_2012.pdf


http://mic.com/articles/104096/there-s-a-suicide-epidemic-in-utah-and-one-neuroscientist-thinks-he-knows-why
claim: utah is highest
claim: altitude has affect
gun use
http://ajp.psychiatryonline.org/doi/abs/10.1176/appi.ajp.2010.10020289
low population
sunlight exposure
mormonism
not going to comment on neurological aspects
check for Perry Renshaw on neurologica

<? include("../footer.php") ?>

residentialStatusLookup = list("Resident", "IntrastateNonResident", "InterterritoryNonResident", "ForeignResident")

educationLookup = list(
 "8th grade or less"
,"9 - 12th grade, no diploma"
,"high school graduate or GED completed"
,"some college credit, but no degree"
,"Associate degree"
,"Bachelor’s degree"
,"Master’s degree"
,"Doctorate or professional degree"
,"Unknown")

placeLookup = list(
 "Hospital, clinic or Medical Center - Inpatient"
,"Hospital, Clinic or Medical Center - Outpatient or admitted to Emergency Room"
,"Hospital, Clinic or Medical Center - Dead on Arrival"
,"Decedent’s home"
,"Hospice facility"
,"Nursing home/long term care"
,"Other"
,"Unknown"
,"Place of death unknown")

maritalStatusLookup = list(
S ... Never married, single
M ... Married
W ... Widowed
D ... Divorced
U ... Marital Status unknown

mannerLookup = list(
"Accident"
,"Suicide"
,"Homicide"
,"Pending investigation"
,"Could not determine"
,"Self-Inflicted"
,"Natural"
,"Not specified")

methodOfDispositionLookup
B ... Burial
C ... Cremation
O ... Other
U ... Unknown

activityCodeLookup
0 ... While engaged in sports activity
1 ... While engaged in leisure activity
2 ... While working for income
3 ... While engaged in other types of work
4 ... While resting, sleeping, eating (vital activities)
8 ... While engaged in other specified activities
9 ... During unspecified activity
Blank ... Not applicable

placeOfInjuryLookup
0 ... Home
1 ... Residential institution
2 ... School, other institution and public administrative area
3 ... Sports and athletics area
4 ... Street and highway
5 ... Trade and service area
6 ... Industrial and construction area
7 ... Farm
8 ... Other Specified Places
9 ... Unspecified place
Blank ... Causes other than W00-Y34, except Y06.- and Y07.-






  munged = c("occurenceStateFips", "residenceStateFips", "education", "educationType", "monthOfDeath", "gender", "age", "placeOfDeath", "maritalStatus", "dayOfWeekOfDeath", "year", "mannerOfDeath", "icdRecodeCause", "race")
  
  outfile = "output.txt"
  cat(paste(munged, collapse="\t"), file=outfile, append=FALSE)
  cat("\n", file=outfile, append=TRUE)

dir = "/Users/kylepolich/git/dataskeptic/blog/"
#dir="C:\\Users\\kpolich\\Dropbox\\"
file="vshead.txt"
absfile = paste(dir, file, sep="")
f = file(absfile)
open(f)
l = readLines(f, n=1, warn=FALSE)
while (length(l) > 0) {
  residentStatus = as.numeric(substr(l, 20, 20))
  occurenceStateFips = substr(l, 21, 22)
  occurenceCountyFips = substr(l, 23,25)
  occurenceCountyPop = substr(l, 28, 28)
  residenceStateFips = substr(l, 29, 30)
  residenceStateCountryRecode = substr(l, 33, 34)
  residenceCountyFips = substr(l, 35, 37)
  residenceCountyPop = substr(l, 51, 51)
  educationOld = as.numeric(substr(l, 61,62))
  education = as.numeric(substr(l, 63,63))
  educationType = as.numeric(substr(l,64,64))
  monthOfDeath = as.numeric(substr(l, 65,66))
  gender = substr(l, 69,69)
  ageFlag = substr(l, 70, 70)
  age = as.numeric(substr(l, 71, 73))
  if (ageFlag==2) {
    age = age / 12
  } else if (ageFlag==4) {
    age = age / 365
  } else if (ageFlag==5) {
    age = age / 365 / 24
  } else if (ageFlag==6) {
    age = age / 265 / 24 / 60
  } else {
    age = NA
  }
  placeOfDeath = substr(l, 83,83)
  maritalStatus = substr(l, 84,84)
  dayOfWeekOfDeath = substr(l, 85,85)
  year = substr(l, 102, 105)
  injuryAtWork = substr(l, 106,106)
  mannerOfDeath = mannerLookup[[as.numeric(substr(l, 107,107))]]
  methodOfDisposal = substr(l, 108, 108)
  autopsy = substr(l, 109, 109)
  activity = substr(l, 144, 144)
  placeOfInjury = substr(l, 145, 145)
  icdCause = substr(l, 146,149)
  icdRecodeCause = substr(l, 150,152)
  icdRecodeCause2 = substr(l, 154,156)
  infantRecode = substr(l, 157,159)
  nchsRecode = substr(l, 160, 161)
  # TODO: parse cause data
  mutlipleConditionsData = substr(l, 163, 443)
  # TODO: parse multiple conditions data
  race = as.numeric(substr(l, 445,446))
  raceBridgeFlag = substr(l, 447, 447)
  raceImputationFlag = substr(l, 448, 448)
  raceRecord3 = as.numeric(substr(l, 449, 449))
  raceRecord5 = as.numeric(substr(l, 450, 450))
  hispanicOrigin = as.numeric(substr(l, 484, 486))
  hispanicRecord = as.numeric(substr(l, 488, 488))
  
  munged = c(occurenceStateFips, residenceStateFips, education, educationType, monthOfDeath, gender, age, placeOfDeath, maritalStatus, dayOfWeekOfDeath, year, mannerOfDeath, icdRecodeCause, race)
  
  cat(paste(munged, collapse="\t"), file=outfile, append=TRUE)
  cat("\n", file=outfile, append=TRUE)
  l = readLines(f, n=1, warn=FALSE)
}


<? include("../header.php") ?>

<div id="bbody">
<h1>CDC Data on Suicide</h1>

<p>Many people have heard the claim that there is a relationship between suicide
rates and the holiday season.  I've heard this claim in several incompatible ways:
that suicides rise sharply BEFORE the holidays, and that rates sharply DECLINE
right before and then sharply increase AFTER the holidays.</p>

<p>Like many unsourced claims, there's a certain plausibility to this.  Despite
these two theories being contradictory, I find myself saying "oh, sure, that makes
sense, because..." to each.  So what does the data tell us?</p>

<p>I hope it goes without saying that this casual analysis is not meant to desensitize
or trivialize the tragic loss of life.  A better understanding of this data may help
us as a species provide better services and outreach to those struggling with depression
or other causes of suicide.</p>

<h2>Data Aquisition</h2>
<p>The CDC tracks and publishes a certain amount of data on mortality.  Unfortunately,
it does not appear that they share these statistics to the resolution of day of the year.
I presume this is done for privacy reasons, since, given other details like the State,
marital status, age, etc., there could be cases where the exact day might remove
anonymity.</p>

<p>The CDC reports the data by month, so that's what I can look at.  The raw data
can be found <a href="http://www.cdc.gov/nchs/data_access/Vitalstatsonline.htm">here</a>,
although, the file format can be a little challenging to work with.  You'll need the
file format layout PDF found <a href="http://www.cdc.gov/nchs/data/dvs/Record_Layout_2012.pdf">here</a>,
or consider reaching out to me directly.  My code to process the data is a bit messy,
but a good collaboration opportunity might motivate me to make it more public facing.</p>

<h2>Suicide rates by month</h2>

<!--begin.rcode
data = read.csv("cdc_postprocessed.txt", sep="\t")
f = data$mannerOfDeath=="Suicide"
a=aggregate(year ~ monthOfDeath, data[f,], FUN=length)
a$year = a$year / sum(a$year)
plot(-1, xlim=c(1,13), ylim=c(0.05, 0.1), axes=FALSE, ylab="% for year", xlab="month")
segments(a$monthOfDeath, a$year, a$monthOfDeath+1, a$year, lwd=2)
axis(1, at=1:13, labels=c(1:12, ""))
axis(2)
col="blue"
a=aggregate(year ~ monthOfDeath, data[!f,], FUN=length)
a$year = a$year / sum(a$year)
segments(a$monthOfDeath, a$year, a$monthOfDeath+1, a$year, col=col, lwd=3)
points(1:12+.5, a$year, col=col)
legend(6.5, 0.06, c("suicide", "other"), lwd=c(3,3), col=c("black", "blue"))
points(7.2,0.0557, col=col)
end.rcode-->

<p>The plot above shows the rates per month of death by suicide and all other causes.
Looking at the suicide rates (black lines) for November and December, we see an
insiginficant rise - one much less than the rise is other deaths.  This seems to
disprove the hypothesis that suicide rates increase before the holidays.</p>

<p>Consider the sequence of December, January, and February.  We do see a spike (for
this data which is 2012) from December to January, and a corresponding fall from
January to Feburary.  This data is consistent with the hypothesis of a spike following
the holidays, however, this "spike" is not outside the normal fluxtuation.  Further,
we see more dramatic jumps (note the rates in May), which suggests that <u>if</u> the
post holiday hypothesis holds some water, the magnitude of the affect is smaller
than other phenomenon and trends.</p>

<h2>Suicide by State</h2>

<h2>Suicide and Altitude</h2>
<p>The inspiration for my analysis was when my friend Brad Bode from the 
<a href="http://www.martialmoves.com/">Martial Moves Podcast</a> shared an article
claiming that 
<a href="http://mic.com/articles/104096/there-s-a-suicide-epidemic-in-utah-and-one-neuroscientist-thinks-he-knows-why">altitude may be correlated with suicide rates</a>.
This struck me as implausible, yet, a great hypothesis because it is testable, and
if true, actionable.</p>


claim: utah is highest
claim: altitude has affect
gun use
http://ajp.psychiatryonline.org/doi/abs/10.1176/appi.ajp.2010.10020289
low population
sunlight exposure
mormonism
not going to comment on neurological aspects
check for Perry Renshaw on neurologica

<h2>If you or someone you know needs help</h2>

mention where to get help

<? include("../footer.php") ?>
