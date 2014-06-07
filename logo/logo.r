png("logo.png", width=600, height=200)
x = seq(-4,4,length=200)
par(mar=c(4,5,1,1))
png(filename="logo.png")
plot(x, dnorm(x), type='l', ylab="Pr(x)", xlab=expression(sigma), cex.lab=2, lwd=3, axes=FALSE)
axis(1)
axis(2)
alpha=.2
col = rgb(0,.5,0,alpha)
text(0, .35, expression(mu), col=col, cex=4.5)
text(-.5, .27, expression(delta), col=col, cex=7)
text(.5, .23, expression(lambda), col=col, cex=9)

text(-1.1, .12, expression(alpha), col=col, cex=4)
text(1.1, .15, expression(beta), col=col, cex=4)

text(0, .13, expression(theta), col=col, cex=18)

text(-1, 0.05, expression(Sigma), col=col, cex=10)

text(1.6, 0.05, expression(phi), col=col, cex=4)
text(1, 0.05, expression(chi), col=col, cex=8)
text(-1.7, 0.03, expression(epsilon), col=col, cex=5)
text(0, 0.02, expression(Gamma), col=col, cex=5)

text(0, .3, "data", cex=3.5)
text(0, .2, "skeptic", cex=3.5)
text(0, .1, "podcast", cex=3.5)
dev.off();
