#Data Skeptic: Multiple Comparisons and Conversion Optimization
**INTRO VOICE-OVER:** Data Skeptic features interviews with experts on topics related to data science, all through the eye of scientific skepticism.

**HOST:** Chris Stucchio is a former high-frequency trader, physicist, startup founder and bodyguard. He's currently a gambler and the director of data science at Wingify. He's a strong believer in automated reasoning, formal methods and the power of computers to liberate us from the tyranny of humans making decisions. You might like his blog at [chrisstucchio.com](www.chrisstuccio.com).

Chris, welcome to Data Skeptic.

**STUCCHIO:** Hey, how's it going?

**HOST:** Very good, happy to have you here. I caught your talk, "Multiple Comparisons," which has the subtitle I like the most: "Make Your Boss Happy With False Positives, Guaranteed." I thought it would be really interesting to explore some of the topics you covered there, about how people can abuse their data.

But before we get into that, it might be good to start off with the discussion of the proper ways of doing these sorts of things. Could you give us a definition of what conversion rate optimization is to you?

**STUCCHIO:** Conversion rate optimization is typically done on the Web. So, you're running a website, let's say selling beer on the internet. Say twenty-thousand people visit your site. You want each of these people to purchase beer, but not everyone will actually purchase beer on your website. Some of them get bored, some of them don't trust you, some of them just can't figure out your checkout.

There are various reasons why people are not buying beer on your site. Some do, however. The number of people who buy beer divided by the number of people who visit your site is your conversion rate. It's basically the fraction of visitors who actually purchase.

**HOST:** Somewhere between zero and one-hundred, I presume?

**STUCCHIO:** One would hope. The conversion rate optimization is [the process of making changes to your site](https://moz.com/blog/the-definitive-howto-for-conversion-rate-optimization) to increase this number. Typically, it'll be things like making the user experience better, coming up with a compelling product image, that kind of thing.

**HOST:** How do you know the breadth of options you might want to test for? I can think of anything from colors to font sizes to page layout Ö it seems endless.

**STUCCHIO:** Generally speaking, the best way to do this is to actually do some user research. For instance, you may want to do things like ask customers or a focus group what they think of your site. Then, if they say something like, "it's hard to use," that'll give you different ideas on what to change. You can do the research, you can watch visitor behavior.

A lot of the time, people aren't going to say something mean, like ƒyour site is really hard to use." But if you watch them go through the checkout form, you might observe it takes them seven minutes to enter a credit card number. For instance, at Wingify, one of our products is visitor recording, so you can watch people out in the wild and watch what they do, which will sometimes surprise you. They'll just not be going through the flow you wanted them to or you expected.

Here's a concrete example: we see people hunting around a page clicking everywhere and trying really hard to purchase your product, but they're just not finding that checkout button. That gives you the hint that you should make that checkout button big, red, point arrows at it, even make it flash. Whereas people are jumping away really fast, maybe they don't trust you much or your product isn't offering them anything compelling, so that's the thing you need to change.

**HOST:** I'm personally frustrated when I'm at a site trying to give them money, and they're making that difficult for some reason. Can you tell me about some of the products and services Wingify has that can help people do site optimization of this nature?

**STUCCHIO:** Our primary product is the A/B Testing product. Once you have an idea, you can use our product to run an A/B test, which is you show half of your visitors the new modified version, and the other half of the visitors the old version. Then we'll measure the conversion rate on each version of the page and tell you which one has the higher rate.

**HOST:** You were mentioning setting up a proper control and test group. I've also seen people who have just rolled out a blanket of changes. Say we want to color a button, so we try five different colors all at once. How important is it to keep that control group that original example to compare against?

**STUCCHIO:** Ultimately, in principle, it's not important. What's important is that of the things you're actively considering choosing, you include them. If you're 100% certain you're not going to run the control, then exclude it. Whereas, if you have a site that's working for you, and you want to know, "should I make this change to an already good site," then the question is, "are my changes better than what I already have?"

There's some websites that are just broken and a disaster, and you know for certain you have to get rid of them. If that's the case, don't include it in the control, since you know it's gone anyway.

**HOST:** Good point. So when it comes to the A/B test you're going to conduct, I've seen some A/B tests where there's an obvious winner, where its $50 better and went from broken to fixed. A lot of times, these changes are subtle, where it might be a fraction-of-a-percent improvement. Then, he has to do a statistics test. Generally, I see people using this alpha-value of 0.05. Can you share your perspective on what that is and how a non-statistician should interpret that value?

**STUCCHIO:** That's a tricky question. For the most part, I have not successfully explained that number to non-statisticians. The number means the following: imagine you weren't running an A/B test, but an A/A test, which means you have two groups: Red-A and Green-A, where the webpages are the same. You've just run an A/B test with 5,000 samples for the control and 5,000 samples for the variation.

What the P-value tells you is: imagine you ran the A/A test where the webpages are identical. The P-value tells you the probability of seeing a result at least as extreme at what you just saw. If you observe that B was 2.5% better than A with a 5% P-value in the A/A test, the odds of seeing a result like this are more extreme, like six or seven percent would've been only five percent. It's a mouthful and actually backwards from what you want.

**HOST:** You were right earlier in saying it's hard to non-statisticians. I had someone once tell me by the time they finished explaining it, the person is a qualified statistician.

**STUCCHIO:** It's tricky because what people actually want is the probability that B is better than A. Unfortunately, the P-value is only indirectly related to that. It's certainly the case that a smaller P-value means it's more likely to be true, but nevertheless, a 5% P-value doesn't mean a 95% chance of that thing being true.

**HOST:** There's a famous quote I think everyone knows by a man named William Edward Hickson: "If at first you don't succeed, try, try again." Perhaps if I was doing the A/B test of the Red-A and Green-A, and I didn't find any effect except the null hypothesis, maybe I wasn't looking at the right group.

Maybe I should segment that by age, gender, income or any other variables I have. We've got really fast computers that can slice and dice this whole data set. Why not test every possible segment I can conceive of?

**STUCCHIO:** Here's where it gets difficult. Had you been running a classical A/A test, there was a 5% chance of seeing something this crazy. This is 5% of that result. Now, suppose you [slice and dice your data](http://www.market-bridge.com/2014/03/19/get-better-reporting-put-intelligence-back-bi-solution/). Now its sliced two ways. If you run that same test, you'll have 5% chance of an error in group A and another 5% chance of error in group B. Now, the odds of your finding something interesting in one of these groups is 10%. Then, if you want to slice and dice further, it'll go up fifteen, twenty, twenty-five percent, depending on how many ways you slice it.

The issue with slicing is that each time you run the test, there's a chance you're making an error, and if you do it too many times, that chance goes up.

**HOST:** Seems like eventually I would certainly find something. I know common techniques to deal with that situation might be to adjust that P-value with something like a Bonferroni or Sidak Correction. What's your perspective on using techniques like that?

**STUCCHIO:**  Let me explain what Bonferroni is. Say you have a P-value cut-off of 5% and were running ten tests. You now have a 50% chance of seeing a false positive in at least one of these tests.

What Bonferroni says is let's start with a lower P-value cut-off. Instead of a 5% cut-off, lets have a .5% cut-off. Then, if you add this .5% error chance across ten tests, it adds up to 5%. Now, the odds of having a false positive in the tests is 5%, with individual tests only .5%. The problem with this is: to have a .5% chance of having a false positive, you then needed to use a lot more samples per variation. Say you took 5,000 samples per variation to run a two-way test. Now, if you wanted to run five two-way tests, instead of needing 10,000 samples, you need 30,000 samples. With the sharper P-value cut-off of .5%, you now need a lot more samples per variation. Instead of six times 5,000 samples, you now need six times 8,000.

If you're Google, I highly recommend you do this kind of thing. But other people don't have quite that scale of traffic, where 48,000 people is something you can throw away on a whim. You've got to be a little smarter about it.

**HOST:** In the case where I'm testing the color of a button, I might need to accept the null hypothesis, and I know not to go in there and segment my data until I've found something. What about declaring the button color a failure and conducting a new analysis on a new dataset that tests fonts or size or spacing? Do you think I'm still running into the possibility of too many comparisons even when I generate an entirely new experiment?

**STUCCHIO:** You're always running into that possibility. Every time you run a test, assuming the null hypothesis was true, there's a 5% chance of an error. This is an important thing to recognize for all testing programs. The goal is not to make the right decision every time. The goal is, in a sequence of twenty or thirty decisions, to choose the right one most of the time. There's the false positive rate. Half were false positives, half were true positives, and you deployed all these variations. That would be a perfectly acceptable outcome. The false positives aren't costing you money, and the true positives are making you money.

The goal is less to avoid false positives, which isn't possible. The goal is to come up with a decision-making procedure that gets the right answer most of the time and increases your money in the long run.

**HOST:** I have been thinking a lot about network effect, meaning how much the people in a system value it. The Airbnb site doesn't have a good conversion rate because the visitors won't be interested in the one offering they have. At some point, they hit a critical mass where most of the time you might find what you're looking for, and they get ramped up. The more available places to stay, the better the site became, and the conversion rate was rising.

If a site like that was doing an A/B test while they were growing, how do they remain careful that they're measuring an actual improvement by the size of that button, not measuring a rising tide that lifts all ships.

**STUCCHIO:** To set up a good experiment, you have to have stronger assumptions and hope that the project manager who's coming up with these assumptions is correct and not deluding himself and not P-hacking. A rising tide in general is going to be okay. This rising tide of having more selection in the market should affect A and B equally in principle.

What'll actually happen if you do this is -- say you've made a change that causes this rising tide -- you're going to undercut the effects of it in a test like this. You make a change that causes listings to go up, listings will go up in both version A and version B. Because they've gone up on both sides, A sees an increase because of B -- therefore, the difference between A and B is going to be a lot smaller than it otherwise would've been, had these two systems been isolated. It makes the effects you see in the tests an underestimate of the true effect.

**HOST:** Makes sense. You've mentioned a key term that I hope you can define. What is P-hacking?

**STUCCHIO:** [P-hacking is the problem that arises](http://journals.plos.org/plosbiology/article?id=10.1371/journal.pbio.1002106) when humans get money from having a P-value of .05 -- therefore, they play games until they get one. Here's an example:

Scientists studying the effect of one policy on a medical treatment. They may look at twenty outcomes, at whether the medicine reduces heart palpitations, reduces cardiac stress. Two of them have a positive result. What they report is a study saying, "We tested this medicine against these two effects, and it had positive effects on both of them." They don't report that they ran the same test on eighteen other categories and got nothing.

This is P-hacking: setting up the methodology of a test in a way that gives an advantage to the version you want to win. It's a big issue that was prevalent in the CRO industry, and still is. A fun fact about this conversion rate optimization industry is you have agencies, experts in conversion rate optimization. Say I'm running a website and I'm good at making chairs. I run a site to sell my chairs, and don't know a lot about conversion rate optimization, so I hire an agency. The agencies claim to be good at this. They'll typically have models where, if they get me x-lift, I pay them y-money. This means, when the agency reports to me later with P-value of .05, I have to pay them certain amount of money. It's in the agency's best interest to P-hack and do whatever they can to get me that number with that 5% P-value.

**HOST:** I would be afraid myself if I hired such a consultant, because it's tough for someone to come back and say, "Well, I didn't make any improvement, so pay me a big invoice for all the time I spent." It seems like there's a certain amount of pressure to deliver results, and that people are susceptible to P-hacking.

From my feedback about the podcast, I know a lot of my listeners want to have technical and smart data scientists. I also have a lot of listeners that aren't necessarily technical, but they're business consumers that leverage data scientists and might be hiring a consultant like that. How can someone in that position be appropriately skeptical of results, or ask the right questions to determine if the consultant is P-hacking?

**STUCCHIO:** You have to be really careful and understand the basics of statistical methodology. When your consultant starts setting up a test for you, ask when they're going to end it and why. If they come to you halfway through with, "Look, it's winning, declare a winner now," you want to deploy that because it looks great, but you have to say "no." Run it to the end.

If the thing they gave you didn't win, they might say, "Look, it won for left-handed people on the west coast," you should say, "You should've told me early on." If you want to do segmentation, do it before you start the test -- not at the end.

**HOST:** Good advice. I will link to, in the show notes, the video to your talk at [Crunch Conference 2015](http://www.ustream.tv/recorded/76610817), which I really enjoyed. It's a good complement to this interview.

One technique you showed there that I do a lot, and appreciate it being included in your presentation, is to generate a random data set and see how your methods work on it, because if you generate it randomly, there should be no pattern. Was that for demonstrative purposes, or is it a typical practice in your workflow?

**STUCCHIO:** That's for demonstrative purposes. We have some CRO agency who doesn't follow the stats. They consider them informative, but apply their own human layers on top of that. Generating random data is a great way to test methodology, whether automated or involves humans. You show these humans randomly generated graphs and see if their methodology works. If you show them random generated data with no difference, and they declare a difference and a winner, you know they're not accurate.

**HOST:** I know you've done a lot of work in high-frequency trading. So far we've talked about A/B tests in this simple way, but I can see where these sorts of tests are much more complicated in the stock field, because you're looking for certain stocks that correlate and how one predicts the other. I could do an exhaustive search on all possible pairs of stocks and look for correlation, which would be wrong. How do I decide when to draw a line for what's an appropriate comparison?

**STUCCHIO:** The shares market is more complicated than conversion rate optimization. In CRO, in most cases, you get the ingredients to do a statistical test, and what I do will not affect what you do when looking at a website. You can see where that's broken with Airbnb, but it's generally true.

In the stock market, you don't have that. If I'm purchasing Google, I've affected the share price of FPY, which is involved in 500 other securities. What I've done affects the market via other people purchasing those other securities. It's a cascade effect. This is why there's a correlation between almost all securities. The entire market goes up and down. You've given up independent identical distribution. In the stock market, you have to have a real opinion about what's going on.

**HOST:** I'll give you another tricky question. When it comes to [time series analysis](http://home.ubalt.edu/ntsbarsh/business-stat/stat-data/forecast.htm), how do you separate out a test and training set? It seems like you want to make some prediction, but that involves something sequential, which is different from a conversion optimization.

**STUCCHIO:** The simple way to do it is to take all the data up to a year ago, then run paper-trading on that history, and fit the model to that history. You extract model parameters. After this, you now have a thing you think works, and can run it on future paper-trading. If it makes money over the next month, they'll employ this to production and will allocate a small amount of capital to it. Then, see if it works for real money for a couple of months, slowly ramping up the amount of money in the strategy.

The other thing to do is run stress tests against simulated data, so you'll consider various things that are plausible. These are guesses. You'll want to see if the 2018 recession will destroy your model. The third thing is called the Lucas Critique. Let's say you have a macro-model, which should be derivable from a micro-model. You want to determine if there's a reason these two graphs should fit together. Then, ask if this reason is true. The model should be valid. What are the circumstances where this reason will stop being true?

**HOST:** That's really insightful. I want to bring it back to the conversion rate optimization topic. How do you deal with a circumstances where there may be multiple things changing on a site all at once? By design, or out of the control of the person [managing the A/B test](https://www.quicksprout.com/the-definitive-guide-to-conversion-optimization/).

**STUCCHIO:** These are all a judgment call. If you're running two simultaneous tests, you could have reasons to believe they won't interact with each other. The value of the test is only as good as the value of that judgment. Delay them if you're not sure. Better to have solid results than weak results quickly. Things outside of your control can tweak things, and in some cases, you just have to throw it away and start over if it's a big thing, because it's not representative of your site traffic.

**HOST:** It seems like time can play an important role in this. In an eCommerce site, I expect weekend purchases are different from weekday purchases. How do you balance those effects?

**STUCCHIO:** You should always run your tests for an integer number of weeks. You start a test on Friday, you should end it exactly seven days later. If you don't have enough visitors in that time, run it for another week, even if you get enough visitors the next day. You need to have the same number of Fridays in the test.

**HOST:** I wanted to ask about [hierarchical models](http://www.fas.harvard.edu/~stats/survey-soft/hierarchical.html) and how they can be applied in conversion rate optimization.

**STUCCHIO:** Hierarchical models are a fairly advanced technique. Most people shouldn't do them unless you 
know what you're doing. It says, "I have a major effect, it could be variation A or B. I also have sub-effects caused by segment categories." The effect variation A or B has on one of these groups is driven by a general factor specific only to A and B, and a special factor specific to that group.

Most of the special factors are zero or close to it. Most of the time, it'll say these groups don't matter, all there is is the general effect. Unless, otherwise, with strong evidence, it may show this special effect actually dominates. Hierarchical models are a way of saying to segment, but we'll correct for the multiple comparison issue. We'll only accept that a segment has a real effect if there's strong evidence for it.

**HOST:** It seems to me conversion rate optimization is an important critical step in any business, one that needs a lot of precision. I appreciate your insight on common mistakes people make and how to avoid them. I think doing proper CRO requires a suite of tools. Would you go over any tools Wingify has that we didn't go over that would help a person looking to get involved in CRO?

**STUCCHIO:** Here's a very important fact. Let's say I ran an experiment ten times and I had one success. The empirical conversion rate is a 10% conversion rate. Now I run the experiment a million more times. Are you certain that, out of the next million, I'm going to get 100,000 successes? The answer is of course not, that would be crazy. It could easily be 120,000.

I'm distinguishing between the empirical conversion rate of what happened during the test and the true conversion rate of what will happen if I run a million more experiments. The answer you want from a test is the true conversion rate, not the empirical one. The empirical is evidence that the true one is a certain number, but it's just evidence. It's vital your tools should report this uncertainty.

This is an opinionated idea, but in our tools, in every place you expect to see a number -- B was 10% better than A -- we're giving you credible intervals, where B is between .5% and 27% better than A. This has pissed off several of our agency customers, because their clients don't want to see uncertainty, they want to see an exact number, and it makes it harder for them to P-hack. Reporting uncertainty is the most important thing to do in statistics.

**HOST:** Where can people follow you online? We mentioned your blog. Is there anywhere else people can keep up with you?

**STUCCHIO:** I'm on [Twitter](https://twitter.com/stucchio), mostly tweeting when I write a blog post. Mainly just my blog.

**HOST:** If you wouldn't mind, give us the URL and what people will find in your posts.

**STUCCHIO:** It's [www.chrisstucchio.com](www.chrisstucchio.com). It's a mix of programming, mathematics and whatever else I happen to find interesting at the time.

**HOST:** Excellent. I'm a frequent reader and really enjoy it. Thanks for coming on the show.

**STUCCHIO:** Thanks for having me.

**HOST:** Until next time, I want to remind everyone to keep skeptical of, and with, data.

**EXIT VOICE-OVER:** For more on this episode, visit [www.dataskeptic.com.](www.dataskeptic.com) if you enjoyed the show, please give us your view on iTunes.
