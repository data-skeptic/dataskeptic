path="C:\\Users\\kpolich\\Downloads\\"
file="show_daily-totals_dataskeptic_2014-10-17.csv"
f = paste(path, file, sep="")
data = read.csv(f)
now = as.POSIXlt(Sys.time())
data$date = as.POSIXlt(data$date)
m2 = data$date$mon==now$mon & data$date$year==now$year
lastm = now$mon-1
lasty = now$year
if (lastm==-1) {
  lastm = 11
  lasty = now$year-1
}
m1 = data$date$mon==lastm & data$date$year==lasty
last = cumsum(data[m1, "total_downloads"])
this = cumsum(data[m2, "total_downloads"])

df = data.frame(idx=1:length(this), d=this)
fit = lm(d~idx,df)

maxday=30
p=predict(fit, data.frame(idx=maxday))
md = max(last, this, p) * 1.2

plot(last, type='l', ylim=c(0, md), xlim=c(0,31), axes=FALSE, xlab="", ylab="")
axis(1)
axis(2)
points(this, type='l', lwd=2)
abline(fit)
abline(h=p)
text(15, p, as.integer(p), pos=3)
