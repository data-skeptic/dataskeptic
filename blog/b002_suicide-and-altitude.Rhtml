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


