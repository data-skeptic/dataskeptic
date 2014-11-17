<? include("header.php"); ?>

<p><b>Kyle:</b>  So welcome back to another episode of the Data Skeptic podcast. I'm here today with my guest Marick Sinay. How are you Marick?

</p><p><b>Marick:</b>  Doing well, thank you.

</p><p><b>Kyle:</b>  Thanks so much for joining me. So you're currently at Zest Finance and we're going to get into a little bit about what's going on over there, but I thought we could start with a brief introduction and tell me your background, academically and professionally, and how you got interested and what you're working on today?

</p><p><b>Marick:</b>  Sure definitely. Academically a Ph.D. in Statistics, M.A. Stats, M.A. Econ.  My academic training is in data science and predictive analytics. Professionally I've been in industry over five plus years,  within the financial services industries. Stint at Bank of America, stint at Western Asset Management, and Zest found me, luckily, and it was just a perfect match. Found out what they were up to and what they were doing and it was a uh exactly up my skill set. And uh just a really fun project to be working on here.

</p><p><b>Kyle:</b>  Yeah it seems like the sectors you've been in in particular have undergone a lot of change in the time since you started.  What's your perspective on that?

</p><p><b>Marick:</b>  Yeah absolutely.  With the financial crisis, I think there is a continued resilience in data science and preventive analytics, obviously put a lot of pressure from regulators on financial industries, especially the larger institutions to invest heavily in data scientists and really high caliber quantitative talent. And so we're seeing a lot of that and I think it’s persistent to today.

</p><p><b>Kyle:</b>  Let's maybe jump in and tell me a little bit about some of the service that Zest Finance offers.

</p><p><b>Marick:</b>  Our core product is a small installment loan.  We're going after payday loans. That's our target. They've got a huge target on their back. They're really predatory. And we're here to really disrupt that payday loan space. You start drilling down on some of the, the fixed-income math behind these products. They’re really absorbent in terms of the APRs and fees that they're charging borrowers. And these borrowers are, granted they're at the lower end of the credit spectrum so they're really susceptible to these types of products. So our mantra here is to be fair and transparent and we're on the customer’s side. Our product is very upfront, we explain the math behind it, not boring the customer into details but you know explaining exactly what you know they're going to be paying, for how long, over what time period.  Everything is laid out in front for them, and we feel we see in our customer feedback and customer reviews that they're really quite happy with our product.

</p><p><b>Kyle:</b>  Very cool. So, in any situation where you're going to grant someone a loan you've got to assess credit worthiness. And that's nothing new, that's been going on for quite some time. Could you tell me a little bit about how historically people did that and what Zest Finance is differently?

</p><p><b>Marick:</b>  Yeah definitely. And you know Douglas Merrill gives the best rendition of this if you can catch one of his talks. I'm gonna lift from that one, blatantly lift from that.  I'm gonna emulate him on that. You know historically, go back 50-60 years, you would go in for a home loan.  Credit cards probably weren't even available 50-60 years ago to most people.  But you would maybe go in for some sort of a loan, a business loan, a home loan. You'd sit across the table from somebody and they would kind of assess you, and they'd obviously look at some documentation you maybe had and take you on you know face value. A lot of times this led to really unfair lending practices.

</p><p><b>Kyle:</b>  Sure.

</p><p><b>Marick:</b>  I mean, we've seen, obviously there's a whole regulatory body surrounding fair lending practices. And so that's kind of historically where where things were way back when. Obviously Fair Isaacs got in the game in the 70s and they provided a credit score. And you know it kind of leveled the playing field. But still what we're seeing now is where FICO fails is that, it now, if we kind of fast forward up to today, FICO fails in that lower end spectrum of the credit score. They have very thin file, and no hit people that they're trying to assess their credit worthiness, and to be honest with you I think they just kind of throws up their hands. Because these people are under banked, they maybe haven't had credit cards in the past, maybe haven't had the normal financial products that a lot of people that are further up the credit spectrum have had. So it makes the credit assessment problem of these people much more difficult, because they're thin file, they're no hit file. That's where Zest steps in.  We're really leveraging the machine learning techniques to better assess the credit worthiness in that lower end of the spectrum where we have no hit, where we have thin file. We developed a score that's able to, there is good risk, there is good risk down spectrum. Just because FICO throws up its arms and can't give you a credit score for these kind of under bank, doesn't mean that there isn't good risk down spectrum. It's really an exercise the chaff from the wheat. Or the current from the way, if you want.  There is good risk down there, but it's a matter of finding it and our approach here is to use ML techniques, data science techniques: the same math, the same statistics, the same algorithms behind Google Page rank, behind how Netflix knows which movie to recommend to you, Amazon, right on down the line.

</p><p><b>Kyle:</b>  So it seems to me that we look back a couple of decades as you were describing, you maybe meet with a banker, and there's a tremendous, at least I presume there was a tremendous qualitative component that the person behind the desk is making their best judgment about the person, it's not necessarily data driven. And that in part was due to the times I guess we would say, there's been so many innovations in technology and the tools available. From your perspective what are some of the most influential innovations that allow us to look at credit worthiness a bit differently?

</p><p><b>Marick:</b>  I'm gonna go to the heart of the technology surrounding what we do here. If we step out of the credit space and the particular application that we're using here, let's go back 20-30 years, if you wanted to start talking about random forest or you wanted to start talking about support vector machines, you could probably throw up a theory on the board, on a white board or a chalk board. Leo Brennan who touted with developing random forest, he could've put up the mathematics and put up the theory on the board maybe long before it was actually computationally feasible. So the biggest advent nowadays is that these techniques are now computationally feasible. That’s the biggest, the biggest advent that I see that's actually true across applications as I said, if we kind of abstract away from credit risk and underwriting. That's, that's true across the board but specifically now with being, you know we have the ability to leverage it in these various different applications.

</p><p><b>Kyle:</b>  So I read in some press release or some article that I'll quote here, "Zest Finance offers a 40 percent improvement over current best in class industry score”. Can you tell me a little bit about that metric and what's being measured?

</p><p><b>Marick:</b>  Yeah sure absolutely. So, what we're measuring there is our improvement in our score over what is a widely used industry standard score in this kind of, granted not talking for prime or super prime, but in the, in the near prime and subprime space. There's a, there's a pretty standard score that's out there that's provided by a vendor. We have benchmarked our score against that, and at our thresholding, we see a 40 percent improvement in default rates. Using our score over and above what is you know widely considered to be an off-the-shelf general solution for underwriting in kind of the subprime slash near prime space. So we're really, you know, we're really bullish on our score. We feel really confident in it, we, we love what we see in it, and our performance plays it out. I mean, end of the day, the proof is in the pudding, um you know we use gold standard techniques in terms of validation tests, uh you know test sets if you will, hold out untouched data that we validate all of our models on, and that's where that 40 percent lift is coming from.

</p><p><b>Kyle:</b>  So, when I'm thinking about issuing someone credit or granting someone a loan, it's seems to me there's, you can make type two errors where you deny someone credit who probably was credit worthy, and you have type one errors where you give someone credit who really shouldn't be getting the credit. Whether it's in terms of loan yes or no, or the amount of the loan on both sides. So from your perspective which of these two types of errors is Zest Finance best equipped to improve upon?

</p><p><b>Marick:</b>  You know what? It's both. I got to say it's actually both. We're really, you know, we're cogniscent of, obviously, I mean you have uh, the two risks there are that you're extending credit to those who shouldn't, versus forgone business. You, you missed giving somebody a loan that you know, in reality you should've given them that loan. Our techniques tackle the problem from both sides. You know really at the end of the day then it comes down to a question of your the particular business risk tolerance. What, that, that kind of comes from at a more higher level corporate decision.

</p><p><b>Kyle:</b>  Sure.

</p><p><b>Marick:</b>  What is the tolerance of the corporation for the very particular types of risks that we are facing? Do we, are you looking to grow volume? Or are you kind of more in a um you know I guess a startup phase where volume is not as big a concern but it's more proof of concept and we want to play that out. So you really have kind of those two axis that you can move on, and again that’s kind of at a, that's more of a top of the house type of decision.

</p><p><b>Kyle:</b>  Yeah. I'm gonna ask you next. What's kind of an impossible question, but maybe it'd make an interesting discussion. When I look at it from sort of an economics perspective I would say that the existing system has a certain amount of inefficiency in it, and there is money left on the table. So with improvements to that, there's uh more efficiency that can be in the marketplace, and probably there's some dollar amount attached to that that with the right scale the economy can produce a certain amount more money through higher quality investment choices. And I know it's pretty much impossible to give me a number but if you had to make a best guess or rough calculation, either what would be your guess or how would you approach coming up with such a number?

</p><p><b>Marick:</b>  Right. It's a fair question and um, Kyle I'm going blatantly balk at this but I, here's what I will say, is that, let's go out and your listeners and you and we can go out and we can look at large the the payday loan space, kind of the alternative lending space. Let's go out and take a look at what the market size is there. I think you'll, people will be astonished at how large it is, and I think that will help gage us and point us towards probably what you're driving at. Yeah, I mean, you can look around, and again, these are the people that we're, we're really going after them. We're going after them aggressively, the payday loan space, you can't drive down, I mean, I think you live here in Los Angeles and if you drive around the city on the surface streets, you can't go more than a few blocks without seeing one of these places.

</p><p><b>Kyle:</b>  Yeah definitely. So when um I think about the, you know, methodologies you're using for, we'll just call them machine learning approaches in general, one of the challenges anybody working that space has is dealing with data that could be sparse. So for some consumer segments you have a wealth of data, the features you're looking for. And in other segments for whatever reason you have a lot more sparsity. Perhaps that's a consumer who hasn't established a lot of history or someone who, uh it's hard to create referential integrity across data sources you're looking at. Do you guys face, I think you referred to it as the thin file as kind of a, a similar challenge involved here. Do you guys face these data sparcity challenges and if so how do you approach um working within the data you have available?

</p><p><b>Marick:</b>  Right. Now, it's a great question. And I mean, you know, obviously, data amputation techniques is, is a wide open research area.

</p><p><b>Kyle:</b>  Definitely.

</p><p><b>Marick:</b>  Um, both, you know, academically and also obviously, you know, in industry. And um, you know, without getting into the details, I'm not goanna speak to the details of, you know, our particular techniques and how we approached that problem. I will say that there are a lot of great R packages out there and various different statistical software packages out there that deal with imputation and, and um, and deal with these types of problems. Here our particular flavor of that and our particular implementation, that's, that's pretty, that's, we keep that pretty, pretty close to our, to our vest.

</p><p><b>Kyle:</b>  Sure. So when I think if, if I were to, in a very naive way, start approaching a new problem I'll generally want to look at historical data and throw some basic techniques at it, let's say I'll just try a generalized linear model, and see if I can extrapolate some trend across the data I'm looking at. But there's an interesting challenge that, let's say I look at history of payment, I know uh Zest is getting into the collection space as well and making some, I guess you call it advisory work, creating algorithms that help people determine what their collection risks are in their portfolio and their book of business. So if you were to, say take a company's data and look at who has been paying and how hasn't, just the historical data doesn't, I'm guessing anyway, necessarily tell the whole story because someone is paying their invoices until the day they decide to stop paying those right? You have a difficult challenge in forecasting that event that wouldn't show up in the history, at least that's my perspective do you guys see challenges like that?

</p><p><b>Marick:</b>  Yeah definitely. And I mean, the, I think, one thing is that our product is somewhat, the, the actual term and the structure of our product is somewhat safeguarded against that. If, if let's say we saw a second financial crisis hit, you know, very precipitously, but just by the nature of our product, it's not, we're not talking about a 30 year mortgage here, um where you face substantial risk both from a potential another financial crisis occurring or interest rate movements. Our, just the structure of our product is not really as susceptible to that type of phenomenon.

</p><p><b>Kyle:</b>  So would say the product is, I could see it going two ways, or maybe it's both. On one hand, maybe you're doing a more precise job assessing credit worthiness and therefore bringing opportunities to the table that other people who aren't as sophisticated passed on. Or it could be that your hedging a bet, by saying we know that an aggregate there's a certain amount of risk in a pool of people, but enough of them will, are unlikely to default that we'll see the return we're looking for in a, in an aggregate. Which of those do you think is the, is the primary innovation that allows you guys to make uh a better return on the loans you guys choose to make?

</p><p><b>Marick:</b>  Well again, if you're in the underwriting space and you're trying to tackle that problem, you're actually trying to tackle it from both sides. So your first point you're definitely trying to find the good risk within that that pool that you're, you know for us its subprime, near prime, subprime clientele. Um, we're trying to find the good risk in there. But we're also trying to tackle the problem from the other side is that, you know, we understand. We, we're not a sage, uh we're not looking into a crystal ball, we will have some customers that will have trouble paying us back.

</p><p><b>Kyle:</b>  Sure.

</p><p><b>Marick:</b>  But, you know, obviously at the end of the day, you know, we have to look at total profitability of the portfolio.

</p><p><b>Kyle:</b>  Right. You know, so when we, you'd mentioned earlier about like the financial crisis that I would say an unprecedented event, and it would be hard to look at, in any machine learning approach is trained in historical data in general, when there are no major crisis in the history it's hard to be able to forecast them. Um, so there's, anyone, you know, in any part of the economy has that same risk I guess, but do you think it hits harder or softer in the subprime spaces that you guys most focus on?

</p><p><b>Marick:</b>  So let's try to focus that a little bit. It kind of goes back to the actual product itself. And that we're not talking about like a 30 year mortgage where the, the duration risk is substantially larger um for a, for such a long term product. The other part of the component there is that we're not, while the underwriting and many of the other different aspects of our business are done through machine learning, whether it be marketing or you mentioned collections, or obviously the core product underwriting. You, you go back to the DNA of Zest we also bring a real heavy business analyst, and these guys are, you know, they've got their heads on a swivel. I mean they're looking around the entire um environment and they're saying, OK where do we want to optimize the thresholding? If they, you know, sniff out that there's going to be potential headwinds, people, people did see this stuff before the crisis. Now whether or not they were listened, people listened to them or not, that's a different story, right?

</p><p><b>Kyle:</b>  Uh-huh.

</p><p><b>Marick:</b>  But there's, there's definitely, if you keep your head on a swivel, um and our business analyst, our business, the business analyst team is extremely bright. They leverage a lot of the same analytics that we're producing um to help guide them in their decision making.

</p><p><b>Kyle:</b>  That makes a lot of sense. So I, I once heard in, and this could be a wives’ tale or superstition or whatever but someone that, I, I assume probably knew what they were talking about told me that in trad, your traditional credit score, one major feature that that goes into that calculation is whether or not you’re currently exercising more than a third of the credit available to you. So let's say I have three credit cards at a thousand dollars each. I want to have no more than a thousand dollars balanced across them, otherwise I might be penalized for not using my credit correctly. And I have no idea if that’s true, but I heard it, so I decided I was goanna act on that and you know when it gets around Christmas time or I'm taking a vacation and my balances get high, I'll go and pay my credit down early just so I don't cross this invisible line that I'm worried about. It's, so maybe that's superstitious of me or or maybe I'm really having a positive effect but, in essence by doing that I'm trying to manipulate my credit score by altering my behavior. Um do you guys see or worry about similar effects, that if someone knows one of the components that you look for that, they might find a way to try and effectively hack the algorithm to look more favorable?

</p><p><b>Marick:</b>  That would be extremely difficult. Um, just given the, the vast amounts of, the vast quantity of variables that our, that our models consume, I could envision somebody that, like you just laid out trying to move one or more of them. But that's not going to, on the margin, it's not going to be meaningful in terms of a business impact. Furthermore I'd probably come back around, I would come, I would almost kind of question the premise. It sounds to me that you have this suspicion surrounding how FICO's algorithm works?

</p><p><b>Kyle:</b>  Right.

</p><p><b>Marick:</b>  And as a consumer you make an effort to try to steer the score in one direction or another. Obviously you know a higher direction in this case, by paying down some of your outstanding balance. That's to me that's indicative of someone who is managing their credit well, and that's probably somebody that I would want to take a risk on. So I'm, I'm finding it hard pressed to, to wrap my head around how that could somehow be you know maliciously used in that setting.

</p><p><b>Kyle:</b>  Yeah that’s a good point. Um so you mentioned that uh, one of the resilient features of your approach is how many variables you look at. Can you talk a little bit about uh how many variables are involved in FICO scores versus the vector of variables you guys are looking at?

</p><p><b>Marick:</b>  Yeah, I, I mean, well, we definitely have some ideas surrounding, you know, the the quantity of, of variables that FICO and the other big three bureaus are consuming. I'm not gonna, I'm not gonna put a hard number there.

</p><p><b>Kyle:</b>  Sure.

</p><p><b>Marick:</b>  Just because it, it would be kind of speculation on my part. I don't, I don't work for them obviously, so I'm not going to speak to their modeling techniques. Um, but I do know that they're, you know, I know what we do and I know we're consuming, you know, vast amounts of, of variables that are going into the models, um and, and the ability there that machine learning brings in order to sniff through those to find the strong signal. Um and, and get rid of the noise. Granted some of them are, are, are fair enough, they're noise. Um some of them are off limits for legal reasons

</p><p><b>Kyle:</b>  Yeah.

</p><p><b>Marick:</b>  I feel, I feel extremely confident. We are consuming orders of magnitude more data and more variables than say kind of the, the larger institutions that are in this space.

</p><p><b>Kyle:</b>  Uh I read in uh some of your materials a quote that I found what really astute; it said, all data is credit data. Uh which makes a lot of sense to me. Do you have, and would you be comfortable sharing maybe an example of a surprising type of data that had an unexpected influence on financial behavior?

</p><p><b>Marick:</b>  Yeah I don't know if it's, uh I don't want to go too far into that. Um you know I, definitely we look at a lot of things. Uh I mean I kind of the one that I, I know, I know that Douglas' quote there, that all credit, you know, all data is credit data, and I love it, um I totally agree. And I think you know, the, the one he bounces around is, how much time do they spend on the website looking at the terms?

</p><p><b>Kyle:</b>  Um-hm.

</p><p><b>Marick:</b>  Um stuff like this definitely you know, we look at and we're thinking about hey, you know, is that indicative of somebody with a, with better credit worthiness or not?

</p><p><b>Kyle:</b>  Yeah, that's fascinating. Um are there any of those data points that you exclude by design? Um so for example uh perhaps ethnicity or sexual orientation, could have predictive power on future credit worthiness. I'll, I'll pick on my own demographic, I'm a white male. Maybe while males such as myself are, are much less credit worthy than most of the rest of the public. Yet there's, one could raise a moral concern about or ev, even you think it's OK that there's certainly a social backlash there about looking at particular demographic features. Is there any, do you guys have these concerns and is there anything you leave out to specifically avoid un, unintended prejudice that could arise out from the underlying data set.

</p><p><b>Marick:</b>  Yeah absolutely Kyle. I mean we, we, first of all there's regulatory legal requirements, fair lending practices that we, we abide by. And you know obviously we have to from a legal standpoint but it's also in our guts. I mean that's, that's what we founded Zest on, right? We founded Zest here, Douglas did um, in order to help people.

</p><p><b>Kyle:</b>  Yeah.

</p><p><b>Marick:</b>  So we're, we're really cognisant of that. Um obviously from a legal standpoint it's a huge no-no. Um we take pains to sniff through our data. Anything that remotely even sniffs of, hey could this be a proxy for somebody's age? Not even that, of course, never somebody's age in and of itself. Could this variable somehow be a proxy for age?

</p><p><b>Kyle:</b>  So like Zip code maybe?

</p><p><b>Marick:</b>  Potentially.

</p><p><b>Kyle:</b>  Yeah.

</p><p><b>Marick:</b>  Something along those lines. I mean, anything there that could be, you know, even, even remotely considered to be off limits from a fair lending practice. It's definitely removed from the models.

</p><p><b>Kyle:</b>  Yeah makes a lot of sense. So how could either an issuer of credit, yeah let's start there, how could an issuer of uh credit best utilize their services if they were looking to?

</p><p><b>Marick:</b>  Um to utilize Zest services? Did I-

</p><p><b>Kyle:</b>  Correct yeah, so if I rent a business and I gave out loans of some kind, uh and I was dissatisfied with the means I have of assessing credit worthiness. Is there an option that I could partner with Zest to see what you guys could do and help me assess the credit worthiness of my potential customers?

</p><p><b>Marick:</b>  It's a great question, I love, I love it. Um and it's a, I gonna, I would refer you to our business development team, it's a little, that's a little over my head.

</p><p><b>Kyle:</b>  Sure.

</p><p><b>Marick:</b>  That's gonna be more of the top of the house from the biz dev side. But definitely I'd, I would be very interested.

</p><p><b>Kyle:</b>  Yeah, just, just in case we have any listeners who meet that little demographic. Is there an email or best place to reach biz dev?

</p><p><b>Marick:</b>  I don't have, yeah I mean obviously Douglas, and Michelle Sangster is heading up  biz dev. I don't have her email right in front of me right now, but yeah, if your listeners get to you and and we can get, we can get that info along to them.

</p><p><b>Kyle:</b>  Sure. And on the consumer side if someone was in that subprime category and was having trouble getting credit issued to them and they wanted to see if perhaps Zest was more willing to consider them. What would be the best approach to go and try that out?

</p><p><b>Marick:</b>  Right I mean, you know, you can look us up, Zest cash, um Zest finance obviously, uh we have both domains. Um we encouraged listeners to, to check us out and see if our product is going to be right for them.

</p><p><b>Kyle:</b>  So I'm gonna ask you a, maybe a tricky question, feel free to be dodgy with the answer because I certainly want to respect the proprietary nature of your products but, looking at the wide spectrum of things you could be using in machine learning, everything from random force, support vector machines and all that fun stuff. What's been most powerful and most useful in, within Zest's uh, potential arsenal of techniques and tools?

</p><p><b>Marick:</b>  Yeah, I'm gonna be a little vague, but you know, obviously,

</p><p><b>Kyle:</b>  Definitely.

</p><p><b>Marick:</b>  Um, yeah, you know, you know, all the, all the stuff um you know, that comes to mind, you kind of mentioned a lot of the catchphrases there. Um I think maybe, the only one I'd maybe add there is uh various different ensembling techniques.

</p><p><b>Kyle:</b>  Are there any in particular who uh, let's say an aspiring data scientist, a grad student or whomever might benefit from looking into? Not necessarily the ones you guys are applying but ones you think are novel and less known?

</p><p><b>Marick:</b>  So here's what I'll do, if you're an aspiring grad student and you're listening to, or you are a practitioner and you're listening to this, um if you are at all interested in predictive analytics, if you are at all interested in algorithms, statistics, machine learning, I recommend you to, um they're, both these texts are freely available for download, they're elements of statistical learning, and introduction to statistical learning. The intro is a little more accessible, probably at a, like a higher end uh, upper division undergraduate level, and the elements text is probably like at a, a uh graduate level. Those are great, those are, I mean it's basically, that is the, you know, two quiencential texts. They're both freely available um online for PDF download.

</p><p><b>Kyle:</b>  Yeah great resources. So one challenge uh, I've occasionally faced in my sort of data science career and whether at Zest or elsewhere, I'm wondering if you faced this is, certain approaches are more, let's call them user friendly than others. Uh I like decision tree learning in this respect because pretty much anybody can look at that and there's an intuitive appeal to it. But at the polar opposite you have a neural network which you can kind of only trust in its cross validation or its R squared against actuals. There's, it's very hard to look and say well the weight on this neuron is trustworthy. So there can be a challenge that someone less familiar with data science and machine learning techniques to say, I don't get this so I don't believe it. Have you faced challenges like that, you know, at Zest or elsewhere? And, or if not what would be your approach?

</p><p><b>Marick:</b>  Yeah I mean, to someone like that I would, I guess I would say, do that at your own risk. Um, you know, specially depending upon the application. If you're, if you're, you know, if you're using predictive analytics in any capacity across the spectrum, you know, trying to profit in some way and you're turning a blind eye to kind of the more modern cutting edge techniques, simply because they maybe are less interpretable. Then, I would, again I'd say do that at your own risk I guess. Um may, you know, where I can see, it it really depends um Kyle um on your, your tolerance for the opaqueness which comes with a tradeoff in terms of the predictive accuracy. Um we know that the more opaque models um often times lead to more highly accurate um predictions on future outcomes and that can be back tested, um versus kind of some of the more, you know, traditional techniques, take a, take a logistic progression right? Um it's very easy, I can look at the summary and I can read off the coefficients. I can see both the directional impact of a variable and also it's magnitude by just looking at the sign and the magnitude of the estimated regression coefficient. Um those are quite interpretable, regulators love to do that, I think regulators are a little step behind. Um, in terms of their, you know, they're just, they want to see something that is, you know, um very easy to interpret, however I think those models are going to pay a price somewhat in terms of their predictive accuracy.

</p><p><b>Kyle:</b>  Yeah.

</p><p><b>Marick:</b>  Um so it's really, it's, it's, you gotta, you gotta, you gotta balance that and you gotta, you know, weigh those two competing risks and you know, choose where you, choose the modeling technique and the modeling approach that's goanna fit the particular application.

</p><p><b>Kyle:</b>  Definitely. You mentioned back testing which uh, I'm always, it's a good sign when I hear somebody talking about that, especially when it can be done as like a compliment to uh a cross validation or something like that. Would you mind giving a quick definition and maybe an example of how you guys apply that?

</p><p><b>Marick:</b>  I'll, I'll speak more broadly just kind of, you know, in terms of, you know, back testing and out of time, you know uh, validation. You know, you can obviously train up a model um, you know, through I don't know, let's just say through the end of uh December 2013. And obviously then, you know, do some um forward projections onto, you know, up to today. That, that would provide you with an out of sample, out of time back test.

</p><p><b>Kyle:</b>  Yeah it's a nice um, compliment to what I've always felt is sometimes missing in, in some approaches that any good model or theory should make verifiable predictions. So it's, really promising to hear you guys uh look at it in that way, to me.

</p><p><b>Marick:</b>  Absolutely, and then you can, you know, sky's the limit there. You can do a walk through time as you roll that window forward and continue to make, you know, more and more future predictions, so definitely agree.

</p><p><b>Kyle:</b>  Definitely. So what's next for Zest Finance?

</p><p><b>Marick:</b>  That is uh a great question. You know, we're obviously continuing to stay focused on our core product, but that's really our mainstay. In parallel to that we're pursuing a, you know, a lot other, a lot other options on the table. Um we generated just a ton of interest from you know various different verticals, various different industries, at different points in the customer lifecycle and the sales lifecycle. Um we generated a lot of interest, um just in our techniques, our approach, um our technology, our platform, and so I think a lot, a lot stuff is in play. And you know, I'm not goanna, it's not, it's not in my place to, to kind of, you know, speculate in terms of, or to share really at this point where, where, you know, what next for Zest. That's something more for, for Douglas obviously to, to say.

</p><p><b>Kyle:</b>  Lastly I like to ask all my guests to provide two references to close out the show. The first, I call the benevolent reference, which is a mention of something, could be a book, an R package, whatever, something you think is worthy of some exposure but you don't necessarily have a connection to. And the second I like to ask for what I call the self-serving reference which is something that hopefully brings you some direct benefit from exposure on the show.

</p><p><b>Marick:</b>  Right, you know what I kind of, I uh, probably the first one I probably kind of already revealed a little bit, I'd point people to uh the Hastie Tibshirani texts. Um the elements, you know, I can't loud it enough. Um and I would point people towards that. I obviously have no skin in that game but happy, happy to share that one. Uh the second one you kind of got me Kyle, uh that, that we personally might may or may not have a stake in. You know, I guess it would be to, for, if there are consumers and customers out there listening, just do your homework. Really look at the, look at the fees, look at the terms of these competitor products, and consider us, because we're, we're much more advantageous for them. Um and so I just want to put that out there, it's obviously, you know, it's it's a pitch.

</p><p><b>Kyle:</b>  Yeah. Are you a Twitter poster in case people want to follow you?

</p><p><b>Marick:</b>  I'm not on Twitter but uh yeah you can find me on LinkedIn.

</p><p><b>Kyle:</b>  Sounds good. Well thank you so much for your time; this has been a really fun conversation.

</p><p><b>Marick:</b>  Thank you Kyle, appreciate it.

</p><p><b>Kyle:</b>  Take care.</p>

<? include("../footer.php"); ?>
