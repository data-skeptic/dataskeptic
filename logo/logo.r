x = seq(-4,4,length=200)
par(mar=c(4,5,1,1))
plot(x, dnorm(x), type='l', ylab="Pr(x)", xlab=expression(sigma), cex.lab=2, lwd=3, axes=FALSE)
axis(1)
axis(2)
text(0, .3, "data", cex=3)
text(0, .2, "skeptic", cex=3)
text(0, .1, "podcast", cex=3)

