file = "open_data_cities.tab"
data = read.csv(file, sep="\t")
cities = read.csv("cities.tab", sep="\t")
statemap = read.csv("statemap.tab", sep="\t")
cities = merge(cities, statemap, all.x=TRUE)
cities = cities[, -1]

m=merge(data, cities, all.y=TRUE, by.x=c("city", "state"), by.y=c("city", "abbrev"))
o = rev(order(m$pop2013))
m=m[o,]
m = m[!is.na(m$pop2012),]

m = merge(data[, c("city", "state", "url", "cs")], cities[, c("pop2013", "cs")], all.x=TRUE)
filter = m$state==""
m = m[!filter,]

alex link

<h2>Sources:</h2>
<ul>
<li><a href="http://www.data.gov/open-gov/">http://www.data.gov/open-gov/</a></li>
<li><a href="http://factfinder2.census.gov/faces/tableservices/jsf/pages/productview.xhtml?src=bkmk">US Census American FactFinder</a></li>
</ul>

<p>According to recent news, <a href="http://www.kpbs.org/news/2014/dec/10/san-diego-making-progress-open-data-new-hire/">San Diego</a> might be the next city to join the club.</p>

