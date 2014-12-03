<? include("../header.php") ?>

<div id="bbody">
<h1>
</h1>

dir = "/Users/kylepolich/Downloads/"
file = "FLAT_CMPL.txt"
data = read.csv(paste(dir, file, sep=""), sep="\t")







<p>
library("maps")
library("mapproj")




setwd("/Users/kylepolich/git/dataskeptic/blog/bike_accidents")

distinct <- function(x) {length(unique(x))}

file1 = "LAPD_Crime_and_Collision_Raw_Data_-_2014.csv"
data = read.csv(file1, stringsAsFactors=FALSE)

# This is frustratingly slow, but everything else I tried was equally slow :(
data$lat = NA
data$lon = NA
latlonlist = strsplit(gsub(" ", "", gsub("\\(", "", gsub("\\)", "", data$Location.1))), ",")
r=1
for (ll in latlonlist) {
  if (length(ll)==2) {
    data[r, c("lat", "lon")] = ll
  }
  r=r+1
}
data$lon = as.numeric(data$lon)
data$lat = as.numeric(data$lat)
f=!is.na(data$lat)

margin = 0.003
xl=c(min(data$lon[f]) * (1 + margin), max(data$lon[f])*(1-margin))
yl=c(min(data$lat[f]) * (1 - margin), max(data$lat[f])*(1 + margin))
cols = rgb(seq(0, .6, length=10), seq(0, .6, length=10), seq(.2, 1, length=10))

480 bike stolen
485 attempt bike theft

unique(data[,c("Crm.Cd", "Crm.Cd.Desc")])
unique(data$Crm.Cd)
mf = data$Crm.Cd=="480"
sum(mf)
map("county", "california", xlim=xl, ylim=yl)
points(data$lon[mf], data$lat[mf], col="red", cex=.5)







data[1,]

extract car model
compare to sales volume
likelihood ratio






data[1,]

max(data$Date.Rptd) >= "03/09/2014"
bins = seq(0,24,by=1)
f = data$Date.Rptd >= "03/09/2014" & data$Date.Rptd < "11/02/2014"
h = hist(data$TIME.OCC[f]/100, breaks=bins, plot=FALSE)
par(mar=c(4,4,1,1))
plot(h$density, type='l')
h = hist(data$TIME.OCC[!f]/100, breaks=bins, plot=FALSE)
points(h$density, type='l')



daylight savings and crime


</p>

 <script type="text/javascript"
        src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
    </script>
    <script type="text/javascript">MathJax.Hub.Config({tex2jax: {processEscapes: true,
        processEnvironments: false, inlineMath: [ ['$','$'] ],
        displayMath: [ ['$$','$$'] ] },
        asciimath2jax: {delimiters: [ ['$','$'] ] },
        "HTML-CSS": {minScaleAdjust: 125 } });
    </script>

<? include("../footer.php") ?>
