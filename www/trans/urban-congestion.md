**Segment Intro**: Data Skeptic features interviews with experts on topics related to data science, all through the eye of scientific skepticism. 

**HOST**: [Lewis Lee]( http://lewislehe.com/) is a Ph.D. candidate in civil and environmental engineering with a focus on transportation engineering.
His data visualization work has helped people understand complex topics like why public transportation buses seem to arrive in clumps, and his published research spans topics such as land use planning and congestion pricing. It's the topic of [congestion pricing](http://escholarship.org/uc/item/9vz1b9rs) that I specifically invited him on to discuss.
Lewis, welcome to Data Skeptic.

**LEWIS**: Thanks for having me, Kyle.

**HOST**: Maybe to start with, could you give us a definition of what exactly is congestion?

**LEWIS**: It's kind of a cluster concept, I think. It's kind of more like you know when you see it, but I guess in the most general way it's conditions where a road is much below its free-flow speed while the cars are actually impeding each other's speed.

Within congestion, there is kind of two types of congestion, or regimes. One is light congestion — or what some engineers just call congestion — which is the density, the number of cars per, let's say, kilometer as it rises. The speed falls, of course, but the overall flow, which is what you've measured are going past you, increases as the density of cars increases. So that would be like the roads are just getting more clouded but more people are moving. And you've got another type of congestion, which is sometimes called heavy congestion, or hyper congestion, which denotes that it's more extreme where actually less cars are moving the more crowded it gets.
And hyper congestion is what you see usually in networks, like in a downtown. There are more cars on the road, but less people are getting where they are going.

**HOST**: Is there a well-understood science for a why that's the case? I feel like everyone's been in a traffic jam, and maybe we all have our pet theories [about why it's caused](http://www.cjponyparts.com/resources/worst-pileups-in-history-infographic). Is this a well-agreed-upon cause of slowdowns, well agreed upon in this scenario of active research?

**LEWIS**: There is a lot of debate, there is kind of like classical traffic flow theory, which doesn't get too far into the details of how congestion occurs. It focuses more on how it initially begins or how we go into the congested regime. It more looks like the fact of the statistical relationships that you would observe with the detectors that we have.
In addition to that, you have more exotic physics theories (aka traffic theories), but this one seems to have come from the physicists. A lot know how to deal with like-kind of analogies between cars and particle systems and things that you observe in nature, that's kind of the answers you kind of get in your classical traffic flow theory and your more particular, more fine-grained and less-established garden of physical or physics theories.

**HOST**: You'd mentioned detectors. What are some of the ways that we can take measurements of congestion?

**LEWIS**: In old times they had these kind of tubes that will go on the ground, when you drove over them they will blow air onto a system that was like over on the side of the road, and it would measure a car going over it.
Pretty much the same concept, you have inductive loops where they can detect a piece of metal over them and then they are also attached to roadside devices that you know will be linked into some kind of network.
They are reliable, but they break a lot. Those are all over California. [In California](http://pems.dot.ca.gov/), the freeway network was an instrumental network in America, but recently we've got this kind of magnet-type things that are smaller and they just can be buried in the pavement. They are more reliable and they have wireless transmission; they don't have to connect to the side of the road.

And then you've also got cameras, maybe moving forward, you've got cameras that can use computer vision to actually count cars. Something like that I believe is more going to be in the future, then, you've got cell phone data, then you've got probe vehicle data, which comes from people that have agreed to have their vehicles tracked, especially trucks or delivery vehicles that are in relationships with these companies who give them data and take it from there, like subscription services.

Then finally you've got, this is a pretty active area of research, how to just infer conditions from cell phones, which is very tricky because a lot of it has to do with just stuff that the cell phone gives off anyway, like triangulation and things like that, and I'm not an expert at that but my impression to that has been disappointing in the past in terms of its accuracy. Then you've also got people that agree to have their cell phones used to kind of turn their vehicles into probe data by transmitting GPS coordinates.

**HOST**: Have you worked specifically with any or all of those different data sets, and can you talk about some of the challenges around maybe data cleaning or how noisy they are.

**LEWIS**: I've worked with the data that comes from the system call **(PEMS)**, which is a system that comes from Caltrans, which is like in California's department of transportation. It is very extensive, but I would say there's a few problems. It's very extensive, and it's definitely better than nothing, you can get a lot of good data out of it. But the detectors often fail and, so sometimes in the middle of the week something you're interested in looking at on the detector just goes out or maybe it goes out partially, like you've got some lanes, then on other lanes you've also got the fact of where the detector is placed. They're placed a few kilometers apart. What you want to see is a queue build, you want to see how long is that queue. By queue I just mean a line of cars that are on the same traffic state, like you're in bumper-to-bumper traffic and you want to see how that queue spills back and how far it goes and such. If you only take in measurements every few kilometers or something, then you can't really see it except when it passes certain level, that's a big drawback. 

**HOST**: So if I control the city, I think one of my objectives would be to reduce congestion. Most infrastructure, I think, is pretty fixed or long-term planning in terms of building new highways, so maybe we would want to do that smarter, but it's tough. Are there other ways I could potentially gate my traffic that could have a net positive effect for my city?

**LEWIS**: You are going to be looking at two or three types of roads, and they have really different problems, so if you've got your freeway congestion, unfortunately, there's not tons that you can do as far as control on there, except you can put **ramp meters** on it. Most people in cities in America, I think they are familiar with **ramp meters**, where there is a light on the meter that tells people when they can go. And so you can do that to control your freeway congestion because freeways are going to have traffic lights, so it's not really a problem. Then you've got your arterials, like your big roads that do have traffic lights, and you've got your regular city streets.

Especially on the city streets, it's a real big area of research as far as algorithms to come up with better signals or signals to come up with better timings, like how much green time. You've got different variables that you've got, if you've got two roads coming into different variables, like how much green time you've given to each direction, how long is the cycle. What I've worked on is the offsets between cycles, like if you've got a series of traffic signals in a row. Have you ever been on a road and you see a light and it turns green, and you get a bunch of green lights in a row, well, those are forward offsets designed to let you go fast.

To answer your question, if you control the city, probably the most fine-grained control is in these traffic signals on the city streets. It can make a really big difference.

**HOST**: I've been a fan of some of your work, and I don't know if should call it data visualizations or simulation.

**LEWIS**: We call it visual explanations a lot, because oftentimes they don't really have data in them, they are simulations.

**HOST**: Yeah, I think that's a good term. There was one in particular I was playing with, the one that kind of allows you to control some of that ramp metering, and I came in very skeptical, being Californian, thinking I'm not convinced that these meters actually benefit me or benefit the roadway. But the simulation seems to be pretty strong in suggesting that is an efficient tool. Did you know that going in there was a result that emerged out of this, building that simulation?

**LEWIS**: I knew going in because that simulation was a rebuilt, it was kind of an update of one that was made a long time ago, and Java, that was an old and not modern-looking version of it in Java. I wanted to make it for browsers. 

So I knew it was gonna work. One thing about the ramp meters and the gridlock that you see is the type of traffic you see on city streets, the overall effect is not exactly similar to what ramp meters on freeways do, but it is similar. So what it really demonstrates is mainly that if you could somehow control different signals on city streets, then you could prevent gridlock and raise the exit rate and the flow and such, I guess, even though it does look like a big freeway and ramp meters are most often on freeways.

But a big area of research now is actually applying the same principle of ramp meters to city streets. For example, if there was tons of congestion in Soma, south of market area, in San Francisco, and you knew it. If you have detectors on all those streets — which they don't — and you knew it in real time, then you could go, I mean to cut off or I'm gonna make it harder to get into Soma. I'm gonna make it, I'm gonna give less green time to the signals that go into Soma and the direction of going into Soma, and I'll allocate more green time to people going around or people leaving.

The same principle could be applied to city streets to prevent gridlock.

Usually you don't have the exact same gridlock phenomenon on freeways, and that's one of the frustrating things about freeways is that they are more susceptible to the type of bottleneck congestion you saw than city streets. But, you know, there is still a lot that you can do with the ramp meters on freeways.

**HOST**: Maybe there is a good time that you have on the show notes but you could drop it. Where is the best place for people to check out some of your simulations if they want to go and experience them for themselves?

**LEWIS**: I have a lot of links from my website, lewislehe.com, and then also they've got the older website **[Setosa.io](www.setosa.io)**, although it needs to be updated. It has visualizations from me and from my partner, 

**Victor Powell**.

**HOST**: I think the traffic wave is also there, which I found really interesting, and I found myself kind of spending a lot of time with. Could you describe what that one is?

**LEWIS**: So I said earlier that there two types of thinking about traffic, and this one is very much kind of physics theory. It's based of something called the intelligent driver model, and this would explain a kind of like formation of congestion and very small particulars of it. So that, what this one does is that you've got very dense traffic, like unsustainably dense traffic, and that kind of regime, like unstable equilibrium, like unstable state if one driver steps on the brakes because of the way that we decelerate faster than we accelerate and then we have reaction times and such, it creates a situation where each driver behind the first one has to slow down more and more until like even very small initial disturbance can create a traffic jam.

**HOST**: Yeah, yeah. So I hope I don't make it seem any less intellectually or academic valuable when Ii say it feels little bit like a game, because it's really worthwhile simulation but it's also kind of fun to play, if you will, because you can control the traffic, and I feel like I can almost get it back on track if I control the vehicles just right. But there seems to be these patterns that it slips into, like there's a strange attractor in the system or something like that. Are those studies like emergent properties that work like that, giving on its physics simulations?

**LEWIS**: To be honest, that kind of traffic flow theory isn't ... I made this theory specialization, but it's not really my wheelhouse, so these are based on car falling rules, like models of driver behavior, and this one is called the intelligent driver model. It's one, I think, it's really popular in Germany. Yeah, there is a huge literature on all that and how the wave is propagating things like that.

**HOST**: So getting back to ways  in which we might alleviate or just control congestion, another — I don't know if it's  popular but certainly worth consideration — the way we could do it is with congestion pricing could you walk me through what that is and maybe some of the common implementations.

**LEWIS**: Yes, congestion pricing is also a kind of like a umbrella term  to describe a big  family of solutions that all try to make people pay and, by that, somehow control demand for road space in such a way as to alleviate congestion and speed up traffic.

So you've got a bunch of different types of it. In California, we have the SR 91 express lanes down in Orange County, kind of the first implementation in the United States, I think it's kind of a privately financed toll road down in Orange County. That one, it's like you've got lanes next to the freeway that you can pay to go into or, if you have a high-occupancy vehicle, I think if you have three or four more people in the car, you can go in there for free. It modifies the prices over time in order to keep traffic of some target speed, so it kind of modifies. I don't know about that one, but that one, it's been replicated across the U.S. The express lane, or value lane or hot lanes concept, some of them change their prices in real time. Others have schedules, I believe, but that's a very popular approach because they build them next to regular highway lanes or they convert existing HOV lanes that are perceived as being underused. You don't have to take roads. Face away from people that are already used to having it for free.

So that is and will probably continue to be forever the most popular implementation of congestion pricing in the United States, this idea of pricing some lanes next to it.
Then you've also got this pricing, the whole thing or taking a tolled facility in existing toll facilities, such as the Bay Bridge. And in staggering the prices, like the Bay Bridge, I think it's probably always been tolled or been tolled for a long time, but then they started varying the prices, and it's a little  more expensive to drive at rush hour on the Bay Bridge than at other times.

Although whether the difference is big enough to achieve much result, I'm kind of skeptical. That prices at all facilities, there is no options, they don't really vary the prices in real time because people don't have a free option. I think they are pretty mad their only option had its price varying, that's why these are express lanes that are able to get it. A lot of this has to do with the politics, you know, backlash, avoiding backlash

You've also got, finally, downtown congestion pricing, which I called zone pricing. Other people call it area pricing. It's when you take a segment of the downtown and you charge people in some manner to go into it to use the streets of the downtown. Not particular links of the downtown, not like, "Oh, I'm gonna turn left on Market Street, so I'm gonna pay this price and I'm gonna turn right on Montgomery." It's like you pay in some way to use the downtown, and that could just be you've just paid to enter the downtown, or it could be that you pay for enough time you spent in the zone. Or it could be distance traveled in the downtown. So far, all the systems that exist charge you just to somehow drive in the downtown, typically to cross the court and going inbound or outbound. But in London actually they have cameras all over the zone itself, so you have either started or trip inside, and you drove across the zone or those kind of details.

So those are the three types of pricing. You've got the express lanes, you've got the whole facility pricing, and then you've got the downtown congestion pricing. Also there is dynamics, you can either vary the real prices in real time, you can all vary them like in London or Milan, or you can vary them according to your set schedules, like they do in Singapore.

**HOST**: So when we begin to variable pricing, I presume that's done hoping that the market will have an effect, that, you know, if the price is high at a particularly bad time, maybe to save money, I'll schedule around in some way.

**LEWIS**: Yeah.

**HOST**: But then, at the same time, I think about my own driving, and I go to work, I have to get there at a specific time, maybe I go to meet ups, those also start at a specific time. It's sort of deadline-driven for me, so I feel like my personal behavior won't change, and that could be an argument for it being ineffectual. But what is the actual data that tell us about the schemes?

**LEWIS**: The majority of people, for a good deal, they travel. They will not change their behavior in a politically feasible level of the price. However, people are very diverse, and actually the same person is very diverse during the course of their own life. Once you have kids, your willingness to pay for time goes up a lot. Let's say you are like a single mother, you're your willingness to pay for time, you would accept a very high toll or the ability to save time.

So, faced with the option between driving between the free lanes and, you know, sitting there for a long time and choosing an express lane.

At different times of your life, you will make a different decision, [16:48] has the idea called the representativeness heuristic where they think of a body of something by its most representative member or something like that. And I think that's typically what people do, and that actually does well describe the typical driver, who is very unable to change the behavior. However, there do exist drivers who can change their behavior and will change a behavior for reasonable levels of prices. It's kind of interesting and actually like in Sweden and Stockholm, for example, where the toll is not just very high relative to the other cost of driving there.

It maxes out at about six dollars, and yet still it knocked off like 15 or 20 percent of all the inflow through that area. Some of it had to do with people switching to transit, because they have good transit there, but a lot of this has to do, just like people, they are really there. I don't really feel like, then there is, you know, like 15 to 20 percent of low that's not like a representative. Those are the kind of people that are stereotypically driving into downtown Stockholm on a given day, but if those people stop driving, there is a significant improvement in condition. So even, you know, a small percentage, kind of on the fringe or in people and situations you wouldn't normally think about if they stop driving, there is still a huge improvement.

**HOST**: Much as I don't think my behavior would change too much economically these days, there was a time, I don't know, maybe 10 years ago, I was still in grad school when, in a coincidence, it got extremely expensive. We were telling one friend, I was on the south side of Chicago Museum North Burke, and I said, "Yeah, I don't know if we could be friends anymore. This has just got too much."

So with that in mind, why couldn't we use, like, simple solutions? Why not just tax fuel you are coming into, like zone pricing? We have to set up sensors and establish a pricing scheme. What advantages do we gain over something simply like just a fuel tax increase?

**LEWIS**: Well, the fuel tax is an effective way to get people to drive less, but the issue is that most people on most of their trips are not really causing congestion.
So if you raise the fuel tax, like consider it so many miles traveled between there on freeways. They are between cities, they are in the suburbs, they are just even in the downtown. You just drive around San Francisco at 9 o'clock — you are not causing anybody any problems.

To get the level of fuel tax where it would make a dent in congestion, which is a problem with peak travel primarily, you'll basically be, I wouldn't say punishing all these people, that you'll be getting people to cancel trips that really have no great social costs. They really don't hurt anybody. It would be kind of pointless to discourage the peak-hour travel by the amount that you want. Then you would have to see a pretty significant increase in fuel tax.

The trips that people quit when you raise a fuel tax will be their discretionary trips first. It might be a retired person, let's say, like there is a grocery store near the house that doesn't have as good a selection. Typically they drive across town or something, but now it's like, yeah, it's not worth, it so they go to the one near their house.

Maybe that trip didn't even go through the downtown, so what was the point of discouraging the trip. The fuel tax is, probably, it's a really good way to reduce pollution and to reduce fuel consumption, which is another big Issue. But it's definitely not politically feasible, and I don't think it would be good to raise it to the level it would alleviate urban congestion. Go to France, go to Paris, they got congestion and they have really bad air pollution and stuffs, but their fuel tax is very, very high.

**HOST**: So I initially enjoyed your paper, Distance-Dependent Congestion Pricing for Downtown Zones, and I'll put the links to the show notes as well.

One of the things that was really informative about it is the good survey of cities that have rolled out some of these zone-based pricing.

It was interesting to me just to hear some of the results of how those worked but, I also wonder about how well they generalize. I had mentioned originally a Chicagoan, and in my opinion it's a marvelously engineered city, and then it's a nice grid, partially thanks to that fire. I hope that's not too politically incorrect to be grateful for that.

But now I live in L.A., which is heavily dominated by geography, we have these things called mountains here that I did know about before, you know, maybe one and only one road to get from A to B.

What can we learn from the existing zone-based pricing systems that will generalize? If it's true, that may be every city has its own nuances.

**LEWIS**: It can be pretty good to implement your system using a technology that is flexible. The cities are so different that you learn something as you go so. That's one way that Singapore has really excelled. When they set up their system originally, it was actually just very flexible, because there's just people standing around checking to see if you had a piece of paper that you would stick in your front of car.

So they were able to modify prices and modify the boundaries of the zone a whole lot. They got data and everything, and then after like twenty years they upgraded to an electronic system. But it was an electronics systems that used these gantries, and they were able to move the gantries, which are pieces of this metal archways. So they are able to put the gantries in this place or that place, and to move the zones around as needs arise. So it is a very flexible system.

In London, by contrast, like I said earlier they had a camera-based system that specifically has cameras off the zones. There is some sort of one-charging zones, and they just decided to expand it all at once. They doubled it inside and called the western extension.

And it ended up being very unpopular and not really achieving many results, and because they have cameras everywhere, it was very expensive. They abolished it after a few years.

If you look at an evaluation of the London congestion charge, financially it's been a disappointment, but a lot of it has to do with the fact that they had a design that made it so that to expand it involved a lot of fixed costs.
It wasn't exactly a flexible choice there. And other things, like one of the reasons Singapore is so flexible is that their road network, it's not like Chicago or something whereby there is just tons of streets that intersect and there's 1 million ways to get downtown.

The city is so new that the road network relies a lot on more arterials, stuff like that, so it doesn't take that many gantries to toll like one of the world's great cities. Stockholm is an island being discussed in New York City and Manhattan, and also very few access points. San Francisco has great places with congestion pricing because so much of the traffic comes in and, you know, over the bridges so there, you've got some natural bottlenecks that you can toll off.

That's a very important consideration, the number of access points to the downtown.

The Stockholm model is essentially copied over to Gutenberg, and they tried their best, but the Gutenberg system requires lot more tolling gantries than the Stockholm, because their downtown isn't on the island and it's just a regular downtown, like you'd see in a normal city. You go from neighborhoods into downtown to the end of the gantries and residential neighborhoods to keep people from cutting off the freeways and going to the residential neighborhoods, and that made a lot of people mad.

**HOST**: One of the things that caught me by surprise that I found really interesting in that paper, and I'll quote you, say, "exemptions" — which I guess things like the carpool lane or, you know, mobile passengers can ride for free, things like that — "exemptions undermine the efficiency of a scheme if the marginal benefits of travel are lower for exempt users than for others." Why is that?

**LEWIS**: The systems that have taken place like, in my opinion, have, to which you may see exemptions, so the point is only a small fraction of the traffic winds up being tolled. So in London, the taxis are not tolled but that's a lot of traffic. In Milan, delivery vehicles and also in the Singapore system taxis are also exempt. I think that Mayor Bloomberg's proposal for New York City exempted taxes, as well the one that failed in 2008. 

There is no particular economic rationale for treating a taxi trip differently than a regular trip or a delivery trip or something like that. In fact, delivery trips can cause a lot of congestion, depending on the type.

**HOST**: Has there been any work study how the things like the tax exemption in London affected taxi usage before and after the zone pricing.

**LEWIS**: I don't know about rides, but for flows they were not. So there are number of taxes going in there. Every day went up a lot.

There is two effects there. One is that they are not tolled, so maybe some people take a cab, before they didn't, but a lot has to do with the fact that it's easier to drive around in London all of a sudden because so many of the cars, like the private cars, left, so the traffic is moving more quickly and it attracts taxes.

**HOST**: Is that considered a win in general in terms of improvements for the city?

**LEWIS**: I mean, I don't think the taxes here are right. Sharing of service is particularly like a social good. Our social bad is just another way of movement, of being moved around. This causes traffic, just like regular cars.

What the London system did, too, what was nice was that it allows London to reallocate street space to buses and to, like, special lanes and such like that, and to bike lanes and things like that without lowering their speeds.
If you look at London, now the traffic is actually not that much faster than it was when they started the scheme because over time, over the 2000s, traffic got worse. They started out with huge improvement but then it slowly got worse.

That kind of masks the fact that they took street space away from cars. So basically they had the similar speeds as they did. It's still an improvement, but it's not a massive improvement, though they did get similar speeds, lots of faster buses, a lot more people using the buses, better facilities for bikes, much safer streets. There's this new paper that came out about the number of traffic accidents and traffic casualties saved. And it's pretty significant in London.

**HOST**: Let me just ask this, an interesting question that we could optimize for safety. You've mentioned earlier maybe we could control for pollution or for travel time. I actually made a list before this, and I came up with about 15 different ideas of what we try to optimize for.

In general, what's best for a city or is there even a notion of best?

**LEWIS**: There is no notion of best. Of course, it's going to depend on what the leaders of the city want. Have you ever heard this idea, whatever you measure you are going to get good at?

I think they say that in startup community. I think it's pretty true that most of these systems, the easiest thing to measure is the number of people going into the downtown, because once you set up the system as part of charging people, you are measuring that. The intensity, that's kind of been what it gets graded on. Then also you can measure speeds on the city streets. That's probably what any system in the long run, regardless of its goals, will end up doing because that's always associated with the more ethereal goals that you might call "touchy-feely," even though getting killed by a car isn't literally a "touchy-feely" experience. The fact is — or air pollution or something like — that you don't measure those with equipment and receive daily feedback on whether or not this toll is doing its job and such. So I think over time they're all pretty much going to target speed or traffic flows. 

**HOST**: I imagine making changes is difficult. You mentioned a couple of times political reasons, or there could be other reasons of just confusion in the cost of rolling out changes. With that in mind, can we really do data-driven pricing and zone pricing and things like that, or do we have to buy into a model and trust it and roll it out, maybe make annual changes or something like that.
**LEWIS**: The highways and the express lanes will be measuring speed in real time, and they are updating based on real data because that's not that difficult to measure on a freeway at a glance, like how fast the traffic is going.

From downtown, drop congestion pricing is a bigger issue, because like you might ask yourself what does it mean for it to speed, and downtown, like what is the speed of downtown in San Francisco. Well they are Market Street, you know you got other streets, like what counts is not as apparent like a single metric that you would modify. For the downtown pricing, one of the things that you can't have is free lanes. It's not like when you drive in the downtown into lower Manhattan, you can have half of the lines are free and this half are tolled, and that's not feasible. So you probably aren't going to be able to modify in real time, because people have already started the trips. There is no real point, the whole idea is like modifying it real time on the express lanes. Is a free option, and so you try to get people if it's crowded in paid lanes. You raise the price of people going into the free lanes. With the downtown pricing, I think the promise of real time pricing, I think, is not as great.

**HOST**: I imagine rural Kansas doesn't need zone pricing or things like that. What are the criteria we can use to establish what metropolitan areas would benefit from these systems?

**LEWIS**: So it's expensive. There is a fixed cost surrounding the system. So in order for that to be socially worthwhile, you would want to have personally pretty bad congestion and a lot of people that you can spread the cost over so that the cost per person, you know, isn't very high. Another criteria would probably be a high value of time. What I mean is to save people time. 

If you are in a very poor city, perhaps saving your citizens time isn't something that you would want to use discretionary money for. Maybe you would rather invest and take your money and invest it in your citizens' health or something. Or maybe like the tolls that worked would not really even be enough to cover the cost of the system. I'm not really sure if it's feasible but you know it's a possibility.
And then also, geography is a big one. The reason the London one is so complicated is that it's just kind of in the middle of London, which has very old streets with a lot of circuitous streets and stuff, whereas it's very easy to put in San Francisco, Manhattan or Stockholm or somewhere like Singapore.

So just to summarize, I think that the geography, your value and time, and what your priorities are, are just scaling the problem.

And all of cities in America, a lot of the traffic is on freeways and among suburbs and stuff, so it might not really be a social priority for me. It's a relief specifically for downtown congestion.

**HOST**: Are there any publicly available data sets that the transportation research community thinks are useful and novel and maybe a data scientist should take a look at?

**LEWIS**: I would document PEMS, PEMS is called California Performance Measurement System. You have to request to log in, I think you have to give them a reason that you would like an account. Yeah, you have to apply for the account.

And I think you find out in 1-2 business days and there is tons of data on there and it's very interesting.

The interface is sometimes like a little bit tricky to use. It can be hard to download a lot of data at once, but if you're going to use some elbow grease, you can get a lot of really interesting data. I've seen as some, there is some [machine learning classes used PEMS](https://archive.ics.uci.edu/ml/datasets/PEMS-SF) data as their sample set.

Another popular one, I think, for machine learning classes is a DC bike share data. I did a machine learning class, and, yeah, we used the [data from DC bike shares](http://rstudio-pubs-static.s3.amazonaws.com/25024_ab1590e0d42d4443b88d30b9baf86897.html). It was very interesting.

**HOST**: Just to wind up, maybe we could get particularly speculative here. How you think self-driving cars are going do to affect our transportation systems?

**LEWIS**: My favorite thing about it is that they'll reduce accidents. I mean, I hope they reduce accidents, they are not exactly my area of expertise but that's what everybody says. My own area of expertise, which I'm interested in, is I've tried to stress the difference between like city-level congestion with those intersections, and there are lanes that meet each other and freeway congestion, which is like bottlenecks and queues of cars spilling back.

I think that they can have a big influence on freeways. I'm not sure if it will have as big an influence on city streets. That creates an interesting difference. And in places whereby, maybe you're in Houston or LA, and self-driving cars change the scope of life because you can drive on freeways with these near free-flow speeds, even with lots of people using freeways. Whereas maybe in a city like London, where the freeways are not really a big deal, maybe they won't have a bit of difference because ultimately you've got several people coming into the new section at the same time, and it's like one goes, another goes and another goes and it's like, what does the self-driving car really have to add? I'm skeptical about whether or not they'll be as game-changing for city congestion as for freeway congestion.

**HOST**: Yeah, that makes sense.

**LEWIS**: So by LA real estate, Houston real estate, right next to an exit.

**HOST**: Good advice.

**LEWIS**: From a data perspective, one of the things that I think could happen in our lifetime that's pretty important is that if you look at traffic engineering right now, it's a branch of engineering but you can't apply all the same techniques that you would apply in a factory or managing all of your servers at Amazon and such like that. 

Because you are largely ignorant of what's happening all the time. Like, they open a new road or something based on long-term demand things or sometimes occasional measurement or something like that, but you don't know what's happening everywhere all the time. Traffic signaling patterns, the cycling links and offsets and such would be based on historic data because we don't have detectors on every single city street, but maybe in the future we'll have some kind of cheap detectors that can go on every street, and maybe they'll be able to detect pedestrians and bicyclists and make a priority for them.

So the traffic signals will be able to have pretty advanced maybe even AI running them to really move a lot more people intelligently, and traffic engineering will be more like the kind of control science that you would see like in factory processes or in quantitative finance, where you can apply very complex mathematics or artificial intelligence to improve things. But the first step is you have to actually know what's going on.

I'm excited about the next 20 years, and that's mainly why. We actually finally get to become like classic engineers.

**HOST**: Yeah, it's really inspiring what the opportunities are going to be over the next decade or two, which is a lot of opportunity for [machine learning and AI coming into space](https://backchannel.com/an-exclusive-look-at-how-ai-and-machine-learning-work-at-apple-8dbfb131932b#.1me7css6g).

**LEWIS**: And then also in control theory. So it's all pretty exciting.

**HOST**: Luis, thank you so much for coming on the show, it's been really interesting for me, and I think the listeners will really enjoy it as well.

**LEWIS**: Thanks for having me.

**HOST**: I'm going to encourage everyone to go over to setosa.io and check out some new work there as well as look at the show notes and links for the rest of the stuff that we've discussed.

**EXIT VOICE-OVER:** For more on this episode, visit [dataskeptic.com](www.dataskeptic.com). If you enjoyed the show, please give us a review on [iTunes](https://itunes.apple.com/us/podcast/data-skeptic/id890348705?mt=2) or [Stitcher](http://www.stitcher.com/podcast/data-skeptic-podcast/the-data-skeptic-podcast).
