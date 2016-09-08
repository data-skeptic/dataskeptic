**INTRO VOICE-OVER**: Data Skeptic features interviews with experts on topics related to data science, alal through the eye of scientific skepticism. 

**HOST**: [Marco Tulio Riberio](http://homes.cs.washington.edu/~marcotcr/) is a Ph.D. student at the University of Washington. He has a Bachelors and Masters Degree in Computer Science and is currently researching methods for making [machine learning more interpretable and trustworthy](http://arxiv.org/abs/1602.04938). To this end, he created LIME, or [locally interpretable model-agnostic explanations](https://github.com/marcotcr/lime). It is this project that I invited him here to discuss today; Marco welcome to Data Skeptic.

**MARCO**: Well thank you. I'm glad to be here.

**HOST**: So I thought maybe it would be useful to start out our discussion from some first principles. Perhaps you could tell me what a black box is and what are some of the negative perceptions of [the idea of a black box](http://machinelearningmastery.com/the-seductive-trap-of-black-box-machine-learning/)?

**MARCO**: So a black box is basically, as I understand it, is a system that does something for you, gives you predictions or perform some behavior, but you don't know how it works. The internals of it are completely hidden from you. In machine learning specifically, we call a lot of models black box even though we could inspect them when inspecting them would take so much time that it basically isn't feasible. 

So if you have really have a deep neural-network, making predictions, in theory, you could go and look at each individual neuron and activations, etc., but it's so large that it's functionally a black box, for humans. 

**HOST**: So I guess if I'm interacting with a black box, maybe it's too complex for me to understand. I've opened up a couple of small appliances at home and looked at the circuit boards a said, "Oh, wow this is beyond what I was taught, but I can at least turn on that device and say well I can see it's working." I can test it and maybe check its accuracy. So is accuracy enough? Should I just trust that the model has had good performance on some training set?

**MARCO**: That's a great question. First of all, of course, everyone who does machine learning knows that just looking at error on a training set is a terrible idea because you can quickly overfit and learn patterns on the training set that would not happen even on test set or the real world. 

So, it can be really good at one specific data set but usually we want machine learning methods to work on other data sets,not the ones we use to train. But even if you do the ‘right thing' in codes, if you do cross validation or have held out test set or something like that, there's a lot that still could go wrong. 

There's a lot of problems that can creep in [where you overestimate your accuracy](http://www.datasynctech.com/data-analytics-vs-reporting), and this is very common. There has been some research that shows that people consistently overestimate their accuracy. In fact, anyone who has tried to do a machine learning algorithm and has put into production knows that this is the case; you typically overestimate your accuracy.

**HOST**: How does LIME help us deal with situations where we might have overestimated the accuracy of our models? 

**MARCO**: So the thing is humans have a lot of intuitions about things. If I'm training a model (one of the examples we have in the paper). We trained a model to distinguish between atheism or Christianity emails. I, as a human, have some knowledge about what atheism and Christianity are so I know what the model should be using and what it shouldn't be using. 

So if I see an example where the model is predicting that emails are atheism or Christianity using words that are completely irrelevant to atheism or Christianity for example: stop words or something in email headers, I know that something is wrong. Similarly, humans have a lot of intuitions about a lot of things. If I'm training a vision system, I know where things are in the image, and I know what the model should be picking up on.

 So LIME opens the black box as it were, it explains individual predictions and from there humans can use their intuitions to have insights, figure out what is wrong and potentially fix it. 

**HOST**: So would say LIME is an algorithm or is it a family of algorithms? What's its sort of formal definition?  

**MARCO**: I think the way we said it in the papers, we set up as a framework for generating explanations. We did some particular explanations, in particular, linear models, but LIME is basically an equation that tries to balance interpretability with faithfulness. So I'll say it's a framework you can derive many different kinds of explanations with the LIME framework; we have been working on many different ones in the paper we have a couple of them for images and text. 

**HOST**: Very cool.  I want to get into some of those specifically but let's maybe take a moment and chat a bit more about that newsgroup example. So if I read it correctly you've pulled some post from atheist newsgroup and from a Christian newsgroup and then we're going to try and build a classifier that looks at a post it's never seen and decide which group it came from, is that right?

**MARCO**: That's right. This is an old dataset; I didn't put up, but this is a famous data set that is a benchmark in a lot of machine learning throughout the years.

**HOST**: Yeah, because of course, these groups have very significant difference on one thing, but they'll frequently talk about it in the same way. So an atheist, while they might not believe in God, they would use word God in the discussion of atheism. So, I can see the interesting challenges of this problem-

**MARCO**: Exactly:

**HOST**:  -and I've seen people report highly accurate predictions on it. What are some of the problems that you've noticed in looking at other solutions where people try to predict where in new posts should go? 

**MARCO**: Usually when people talk about this data set, they present it as if they're learning the topics. I'm learning how to distinguish between how people talk about Christianity, talk about atheism and there are other newsgroups as well. That's how they think; that's what they want their models to do. 

This particular data set is not very big and it has lots of extra information like it has the email headers for example. The newsgroups are collected, I think 1997 or something but I think some newsgroups have posters and some particular users that post there a lot. So for example in the atheism newsgroup there's a user's name, Keith, his name is present in 12% of all atheism emails. 

So that becomes very informative, if you see Keith you know about atheism and by some coincidence, there is no person name Keith posting on the Christianity newsgroup. So right there you have a perfect predictor, if you see the word, Keith, it's always atheism in this particular data set. 

Likewise, there are a lot of email addresses or institutions where it just happens that this data set are very predictive, but of course, you wouldn't expect them to help at all in the real world.

**HOST**: Yeah that's a great example the ‘Keith case'. It just happens that there were no Christian posters named Keith. So how would I learn that in the traditional way if I were to inspect a model, what would take for me to uncover this sort of ‘Keith anomaly'? 

**MARCO**: Well, if you use a model that isn't interpretable right away, for example if you use a linear model, you may be able to look at the individual ways however, the vocabulary is very big. I learned a lot of times even if you have patterns like this there are other patterns that are may be valid. 

So, for example, the most classifiers will learn that the word Christianity is a good indicator for Christianity, so that makes sense. So it's easy to miss this sort of pattern even if you have an Interpretable model. If you have a neural-network, or a gradient boosted decision tree or something like that, like a random forest, it's really hard to know that the model's picking it up. What you could do is do some exploratory data analysis, to find the most abhorrent examples. So maybe you'd find out about Keith, but there are subtle examples as well both in these ways and others ways that you'd definitely miss, and I would argue it's much easier to see these patterns instead of the models using it. Instead of using it without no model. If you have a model that's using it connected from the model, it's much easier.

**HOST**: I've noticed a trend towards more complex approaches especially in text, things like word encoding have gotten very popular which makes it much more difficult to inspect a model. How can we use LIME to get use some insight as to what the classifiers are relying on?

**MARCO**: So that's right. More and more people are using features that are themselves completely opaque to humans, and I think one of the key ideas that we had in LIME is separating what the model is using from what the human understands. So we have what is called an interpretable representation that is what we provide the explanations, so even if the model is using let's saying word embeddings or something, the explanations or still in terms of words. 

Now, of course, there's going to be some loss there we can't perfectly explain what a model is doing unless you have the model itself and the features themselves but at times, you can have a pretty good approximation, especially if it's one individual example. So even if the classifier is using word embeddings, I'll explain it still using regular words.

**HOST**: How do you manage to do that? Let's talk a little bit about the specific use cases then. Let's say I have a big corpus out of ten particular posts that I'm interested in, what are the steps that LIME goes through to give me insight and hopefully build my trust in the classifier? 

**MARCO**: It's really simple. The idea is that I'm going to learn another model on top of your model. So we have an example let's call *x* if you want to explain what we do is we perturb *x* in different ways generating a bunch of new data, fake data as it were perturbed data and then we got predictions for that data. 

So for example, it's a text example; like it's an email in the newsgroup, we remove a bunch of different words every time and then will make predictions. With those predictions, we create a data set, so we have a data set of perturbed examples and predictions, and we learn a simple model on top of the model set in such a way that care more about perturbed examples that are close the original on. 

So if I completely remove every word I don't care if my explanation captures that case very much because no one likes the original example that it's too far but if I only remove one word, I want the explanation to get that right. Meaning if the explanation I say that word is important it really is important to the underlying model. 

So just summarizing, the main idea is we perturbed the example in different ways get the prediction of learning a simple model and the reason why we would be able to do that is because even really complicated models are not that complicated in a fixed neighborhood like around a point they made it simple.

**HOST**: Makes sense. Could you tell me a little bit more of the advantages you see in the perturbation case? So I could see two approaches may be if I wanted to train this model on top of the model, I could grab a hundred posts a random and retrain a classifier or I could train them by this sort of distance metric you guys are using. What advantage does that local choice give me? 

**MARCO**: One advantage right away is that no need access to training data or anything like that, I only need instance and a classifier and I can generate an explanation. For example, I explained explanations from Google's Inception I didn't even look at their training data or anything. 

Another thing is that when your data has certain regularities for example in the twenty newsgroups case if you sample from that data, you still get that kind of regularity even if you don't want it. So you may not notice certain patterns if you just use the original data so that you could do a mix of the two but I think perturbing is really useful to get data that you otherwise wouldn't to avoid biases in the data set for example.

**HOST**: I love the idea of helping users develop trust in a model, which was what really drew me to the paper initially. So I was thinking about this newsgroups case it makes total sense that even if the predictions is correct if it says we determine that this is an atheist post because it was by Keith, I'm going to be very skeptical of that. Do you have any examples in the other direction of things that would give me confidence that the model has correctly classified between the atheist and the Christian newsgroup?

**MARCO**: If you noticed that it's picking up. I've noticed when that classifier still learns useful patterns for example if you have God with lower case ‘g' that tends to happen more in atheism newsgroups than in Christian newsgroups and models pick up on that.

**HOST**: Now that one's interesting. I also see that Christians might talk about scripture or mention Paul on the road to Damascus while atheist would talk about Dan **[???]** or Christopher Hitchins.

**MARCO**: Make sense, yeah. 

**HOST**: Yeah, those are-

**MARCO**: Exactly.

**HOST**: Convince me that it makes up the intuition, I guess.

**MARCO**: But that's part of the idea. We as humans have the intuition we know what a good explanation looks like in a lot of cases and if we see if the model is acting in sensible ways we tend to trust it more.

**HOST**: Yeah absolutely. So I've deployed a number of models in my career, and sometimes there's a struggle when you're replacing a function that a person used that a model is going to be better at, and the person is a little bit resistant. 

But I've also had the opposite problem where I deployed a model, and I had supporters who were too confident in the results and maybe assigning it to strong AI properties that they found a tricky example that the classifier indeed got correctly, but didn't necessarily give it correct for the most convincing reasons. How might LIME have helped me in that situation? 

**MARCO**: I don't know if you've heard about the tank example, it's a very common example that machine learning professors always use in their lectures.

**HOST**: Let's go into it. 

**MARCO**: The story goes - I don't know how true it is but - that someone was developing some contract for the Defense Department or something, but they were trying to identify camouflage tanks. The model had perfect accuracy, even on validation data, it was perfectly able to identify when tanks were camouflaged or when it was just trees. 

As the story goes, when they tried the new role it completely failed, and the reason was that they gathered the data was such that either their tanks were only present during the day or at night, (I don't remember which). But basically, if photos were taken one time of the day, there were always tanks present, and if they were taken another time, there were no tanks. 

Now I'm sure if the story was true I'm sure that the developers who first developed the system invented all kinds of explanations for it like they were like “Oh yeah it's probably detecting the tank or something like that.” It's easy to assign reasons like that when you want your model to work. 

If you had something like LIME, you'd just see it's looking at the background, and we try to replicate this experiment in our paper. We don't use tanks, but we do to differentiate between dogs and wolves, which are supposedly similar. We ask people why they the the neural-network is doing this. Low and behold, they come up with all sort of reasons, “Oh because it's something in the wolf's eyes or the husky's nose,” when in fact, we train the neural-network to detect snow in the background.

**HOST**:  Yeah makes sense. So in that respect are we really taking about a system for double checking for overfitting or that's just one special case that LIME can help with? 

**MARCO**: I think that that's one special case, overfitting a problem, data leaking is another problem, maybe your feature engineering is not capturing what it's to capture, but LIME could help you perceive that. So overfitting is one of the problems that can appear but even if you were saying systems that work, I use the doctor example. 

If you tell a doctor look, I have to have a surgery, probability 90%, no doctor's going to do anything based on that, but if you say look I have to do surgery look at this symptom, look at the similar case, then it's much more likely that the human decision would do something about it. So it's not only for when things aren't working, but it's also, for when things are working.

**HOST**: So I know a common problem in machine learning is when you have a class imbalance. Let's maybe pick a classic example of fraud detection, most of the transactions are good, law abiding people but just a few minority bad apple are in there that you're trying to detect. 

So, if I were to randomly sample a bunch of transactions and show someone the outcomes, and also use LIME to show them some supporting details of why we think the model arrived at its conclusion. It may be that we sort of deceive ourselves into thinking the model's good because it's covering these average cases but not covering the minority cases. Is there a way you can pick the most interesting examples that might highlight the rough edges of the model? 

**MARCO**: It's a very good point, and that's something I'm working on. We did have an initial solution in our paper, we had a system that chooses which examples are going to be shown to the user instead of just doing it randomly, and that's already a start but for the situation you're mentioning right now where you have big imbalances or there is another case where you have different costs for making mistakes.

 Like if you're a police officer, and you're going to arrest someone based on the machine learning system you'd better be right, so you really care about not getting that wrong or spam detection is another case. I have seen where I haven't done the work myself on instances in that particular kind of case where you have a high imbalance or different costs, but it's certainly a very important problem that needs to be addressed.

**HOST**: So I really liked some of the visuals you have in the paper around the newsgroup example, like where we keep going back to because the reason we picked this is because the most prevalent word feature is 'Keith', that gives me some skepticism, but if it picked it for any other reason, I might grow in trust of the model. So it seems like this is something very nice for text. How can this work in other settings, like in the images you were describing? 

**MARCO**: So for images, what we did in the paper was we highlight the area the system is using the most to make a prediction, and we made everything else gray. The images are very easy to interpret because we just look at them and it makes sense. There are other representations that were working on that would give us more apart **[??]**. For example, if the system is looking at the tone of the system looking to see if it's grayscale, this representation that we chose would not work as explanations, it would not explain this kind of behavior. 

So it's always a tricky thing trying to figure out what the representation is, you want it to interpretable but at the same time we want it to be powerful enough to show things even in the text case between the newsgroups for example. If we just show a sequence of bars like a bar plot it's hard to pick up things like sequence, things like that. So we are developing visualizations and things like that are powerful but still interpretable.

**HOST**: Make sense. I found the graying out approach you guys developed to be effective; in fact, you have a great example in the paper of what I would consider an image that is meant to be deliberately misleading. Could you describe that image and how LIME ended up breaking down?

**MARCO**: Yeah, so we have a person, I mean we have a dog playing guitar and it's a person's body. It's really funny YouTube video of this dog on human clothes, and there's this human playing the guitar, and it looks like the dog's playing it. 

Of course, [the neural-network gets very confused](https://www.techopedia.com/definition/5967/artificial-neural-network-ann) by that, and it's a mistake actually an acoustic guitar, and it predicts that it's an electric guitar, but it also has a high probability for an acoustic guitar in Labrador, the particular dog is Labrador. And at first, I was a bit puzzled as to why it would think it's an electric guitar but when you see, the explanation there is a part of the acoustic guitar that looks exactly the electric guitar. 

So the classifier could have got it right, but I'm not that surprised that it got it wrong. It's not like an egregious mistake, I understand. The acoustic guitar explanation is also pretty good it shows that a part of the acoustic guitar and the Labrador example picks up on the dog's face. So obviously this is a confusing example but even though the model made a mistake, I still trust it because I still see it doing sensible things.

**HOST**: Let's say I was a user of a particularly complicated model maybe I'm a doctor looking at some very complex thing like depression and I say it's complex in the sense that if get a cut on my hand you'd stitch it up, or you don't, it's pretty straight forward what happens. I think depression has numerous causes and sometimes it's chemical vs. psychological, so it's like to need a personalized diagnosis. If I were a doctor and I had access to a model, and I was going to use LIME to help me with that diagnosis, what would that user experience be like in a perfect world? 

**MARCO**: In a perfect world we would have the doctor see the prediction, like this patient, has depression for example, and the system would give it all the evidence, in terms of this patient has depression because look at this particular exam that you did. 

It wouldn't go as far as saying look we'd have certainty if you did this other exam. It would even mention previous data like I think this patient has depression because of this exam, look at other patients who have a similar result on this exam. It would be more causal even and that's something we are far from achieving.

**HOST**: Sure, I think everyone in general is.

**MARCO**: Yeah. 

**HOST**: So I was very excited about your work and I was thinking what would be the contrary position. The first potential for criticism that crossed my mind was to say that every local model you build might essentially overfit to that local fidelity area, and it's more like you have this amalgamation of all these local models, which is a lot of degrees of freedom. Could you talk about how you balance between picking those local fidelity models that are faithful to the global classifier, yet particular to the local instances? It seems as if there's a trade-off there.

**MARCO**: There is a trade-off, and it's a very clear one. If you want something that's interpretable globally, you are restricted to using a simple model. There will always be some approximation error, even when doing this kind of explanation.

The next thing I think about LIME is that you can choose what that trade-off is going to be. So if you care about being really precise, then you got to put in the time to look at a really long explanation. Also, we can measure how good or how bad the approximation is even in the local region, so you can imagine if you're using LIME in the real world. Sometimes it's saying something like, 'Look, I have this explanation, but I know that it's not a 100%.' You can't really trust even this explanation, so you're going to have to do something else. 

So it's kind of like letting you know when I'm failing gracefully, and I think that's helpful but yeah it is the case that we are explaining the global model by a bunch of little interpretative models. The nice thing about that though is intuitively that make sense, some examples only need a little bit of evidence. Like, let's say I'm trying to predict atheism and Christianity again. If you say a post that has a hundred references to Christianity, a lot of bible verses in it, etc., it's very easy. So you can't find a linear model that approximates it. Well if you see a post that's hard to tell, like if you see some debate going on then, it does make sense that approximation can be a little less faithful if the model needs to be a little bit more complex.

**HOST**: Interesting. So perhaps the fact that a post comes from Rev. Smith the fact that they have that title is all one needs, but yeah if they are debating the ontological argument for God that it's a little more of a gray area or something like that.

**MARCO**: Exactly. 

**HOST**: Interesting.

**MARCO**: Usually in machine learning, we do not want models that are always super complicated because those models tend to be really fickle, like if the explanation needs every single word like if you change a little thing the explanation will be completely different. That means that the model is a little too jumpy and we usually don't want that in machine learning anyway, so I think it's a fair assumption.

**HOST**: Yeah. 

**MARCO**: There are areas when it breaks but is a fair assumption, I think. 

**HOST**: That's an excellent point. So trust which is kind of, what I think this really comes back to the value that I hope to derive from exploring LIME in my own work. Trust is a concept that's a bit fuzzy for machine learning at least to me, you can't calculate it as easy as you can accuracy or F1 score - or at least I don't know how to. Is it measurable at all? 

**MARCO**: That's a good question, and I don't know the answer to that. I think there is a sense when you are assigning a binary measure to it every time you put a model into production. If you put the model into production you trust it to be better than what you had there before, so in that sense, you did trust the model whether you should have or not is a different question.

**HOST**: Oh, I absolutely agree, I actually meant it more from the perspective of a user. So I could show a user two models and ask them after interacting with both, which one do you trust? 

**MARCO**: Well we do an experiment, we don't measure trust by itself. I don't know actually, if the users will be willing to pay for something, which would be a way of measuring if they really trust it. In the paper, what we do is we have scenarios where we know you can't trust a model we try to see if the users can perceive that. 

It's much more complicated though if you want people actually to trust it. If you have a model that's trustworthy, and you want people to trust it, I don't know how I would measure that except by having them use it or have pay for it somehow. It's easy to measure when you can't trust it - 

**HOST**: Sure.

**MARCO**: - which is what we did in the paper. 

**HOST**: Yeah. 

**MARCO**: We set up models that we know are untrustworthy and saw if people could figure it out. 

**HOST**: From my point of view, trust is the compliment of untrustworthy, I suppose. Could we talk a little bit more about those results and what you measured with your users?

**MARCO**: For sure, yeah. We have three experiments with users, two of them are with non-expert users; they are people from Amazon mechanical Turk. So we took that classifier that we train from twenty newsgroups, the one we've been talking about, that is an untrustworthy classifier. We collected a new data set, a religion data set that does not have the problem that newsgroup has, we collected web pages, we wanted to use the model's from twenty newsgroups to predict Christianity in web pages, and we tell users that. 

We can measure the accuracy of the original classifier, and it's really low, it's like 57%. What we do then is we train a clean version of the classifier, so we clean up twenty newsgroup, clean the headers, remove names like Keith, etc. and we measure the accuracy of that one under a different set, and it's higher, it's like 69%. 

We then show users prediction from classifies side-by-side saying look these are the predictions and these are the reasons and most times the predictions is that same, they are both predicting the same thing but for different reasons.

So the users see a few explanations and chooses which one they think is going to generalize better. And this is trying to seem like the scenario we have very often when you want to model into prediction you have much of competitors, they may have different accuracies, and they may have similar accuracies, but you don't know which one to trust, and this is an additional thing you could do look at the explanations. In our experiments, even non-expert users were able to pick the right one 89% of the time which is pretty impressive.

**HOST**: Yeah. 

**MARCO**: If you just look at accuracy, you'd pick the wrong one every time because using these kinds of untrustworthy features increasing your accuracy on the validation set. This is the first experiment choosing between classifiers.

On the second experiment, we had users actually interact with the explanation. So when they saw an explanation, they could click on words they thought shouldn't be used. So the users see a prediction for atheism and the explanation you have ‘Keith'. You can click and that and say the model should not be using this, and we do this several times. The interesting thing is even users who are not experts; do not know about the hidden dataset. They only have knowledge of Christianity and atheism, and I don't even know how much knowledge they have of that. 

Clicking on words, clicking a few words, I think the average time it took was ten minutes; they could significantly improve a model. The model on average started with 57% accuracy on the hidden set and in the end, it was 72% or something. The most perhaps interesting are when I did my round of cleaning with no LIME I was using a regular expression and stuff, I got a lower accuracy that the mechanical triggers that are using LIME. So I guess that says something, either about me, or about-about LIME, I hope about LIME.

**HOST**: Yeah, I think that's a fascinating use case. I've done some experimenting with active learning where I try and pick good examples to have the user label to help me build up the training set. But we are talking about something a little deeper here where you show a choice model made, and you are soliciting feedback about the innards, if you will, of the model. Is that right way to look at it?

**MARCO**: That is, it is, and the way that we did was very rudimentary, the only thing we're doing is removing features. Going forward I'm very interested in developing more expressive forms of feedback, it still not requiring the user to be an expert in machine learning. 

**HOST**: Would you consider that sort of a form of regularization that you are showing users some of the detail and asking them to penalize some of the features? 

**MARCO**: You can think of it as regularization but it's not trying to avoid until it overfits, you're trying to train the model to do things that are sensible. 

This stems from the fact that most of the time in machine learning we cannot really train or measure what we really care about. We measure accuracy maybe but what we care about in the end is user satisfaction for example and we can't really write that down. But humans have a lot of intuitions they can know when something is wrong when they see it. So if you could steer a model to what you want that'll be very helpful.

**HOST**: So I could see where LIME could apply in pretty much any machine learning deployment. I was curious if there are any specific areas or industries that you are most interested in?

MARCO: Not in particular. I'm interested in obviously in the paper we did more stuff related to NLP in vision. Those I think are pretty interesting because it's situations where humans have intuition.

 I don't know how useful it would be or some crazy genome data, I don't know how much intuition would be in that, I'm not a biologist but in some scenarios where humans do not have intuition then I don't know how helpful it would be.

**HOST**: Sure.

**MARCO**: So mainly for cases where humans have a lot of intuition and texts and images are two examples where this is really the case. 

**HOST**: Yeah two of my favorites that you've mentioned are the medical one where doctor doing the diagnosis and the police one as well. 

**MARCO**: For sure.

**HOST**:  It would be very concerning to me if police blindly acted on some models prediction but if there's an auxiliary system giving them some support for why it made a choice then I think that can have a lot of benefit to society.

**MARCO**: So that's a great example of what I was mentioning when I was taking about the miss match. For example, we do not want our models to be racist if you are using them in policing but how do you find racism?

It's hard to define for him, how do write that down for a model? However, you know it when you see it. So if a model is telling you to arrest a suspect because he's African American you know that that's wrong, that's a blatant case but humans are able to detect even more subtle cases.

**HOST**: For me, LIME is a tool that's going to help us get some trust that the model is basing its choices on intuitively correct features. In the absence of it, we can have cases where operators, people who consume outputs of models maybe have too much trust in their model or too little trust and we can help close that gap. What do you think could be worst case scenarios if we didn't have LIME and people had either too much or too little trust? 

**MARCO**: Well if you have too much trust you get problems like thinking your model's going to work really well and it doesn't and the consequences could be catastrophic if we are talking about medicine. 

There is a great example by a guy called Rich Kariwana from Microsoft Research where he was developing a system to detect if a patient was going to, I think, die from pneumonia. And the idea was you'd have this system, you'd predict if the patient is high risk, you'd admit them to the hospital but if low risk you send them home and give them chicken soup, which is the best thing for low risk patients apparently.

And he had a system that was based on the neural-network. In the end he didn't deploy it because a friend of his was using an interpretative model, which is rules, and it learned a very intriguing rule. It said that when people have asthma their risk from dying of pneumonia lowers and humans know that doesn't make any sense, asthma increases your risk. 

When they dug into it was because patients who were admitted with asthma got treated more aggressively. In the way, that they gathered the data those patients ended up having lower risk because there was an intervention, but if they put their system into production that intervention would not happen, they would be sending people home and people would die. 

So it's a really tricky situation to detect and if you don't detect the consequences could be catastrophic. In the end, they deployed a model that could inspect really, so they could avoid this kind of thing.

**HOST**: That's an excellent example I think. So tell me more about the open source components of that project.

**MARCO**: I'm always trying to keep the code open source. I'm also trying to get this project going where the idea is you'll add more and more tools to debug machine learning or interact machine learning. 

Right now what we have there is LIME but I'm working on a few more components for understanding machine learning and it's really easy to use it's in Python. You can get explanation for most models with a line of code like maybe two lines of code. It works, it's very general, and it works reall well with scikit learn.

**HOST**:  Of course, the people working on Python data science stack should be very familiar. Is the best place to learn more and try it, **to visit the GitHub page**? 

**MARCO**: That's right the GitHub page and I'm sure you have link when you release this show or something. 

**HOST**:  Yep and people can find that link  in the show notes and I'll probably tweet it out as well, so people can go take  a look at that and even send a poll request if they really want to get involved.

**MARCO**: Yes sounds great: I've had poll requests and I hope to get more. 

**HOST**: Awesome and so your paper is up on the archive and I'll link to that as well. Is it going to be presented anywhere else in the near future? 

**MARCO**: Yes next week I'm going to KDD in San Francisco and I'm going to be presenting the paper there.

**HOST**: Very cool, very cool and what's next for you guys in your research in development of LIME?

**MARCO**: We are working on multiple fronts, in particular one that we are working as going beyond classification to things like structure prediction where models are even more opaque because the output itself is hard to understand sometimes because it's big and the output space is really big. So, that's one future direction going to structure prediction. 

We are trying to develop the vision part a little more to go beyond just hiding parts of the image. Also, one area that I think is really important is figuring out which kinds of explanations are more useful than others depending on the target audience. So there's some HCI (Human Computer Interaction) work that goes into that we are developing different kinds of explanation instead of just linear models. It's really hard but we'd like to measure how each kind of explanation impacts different tasks.

So for example, if you want to detect overfitting, is it better to have a linear model or have a different kind of explanation? So, that's another line of work that we are going. 

In the future, I hope to tackle the feedback problem as well. So, I noticed that something is wrong, I want the model to do something about it but I don't want to have to be a machine learning expert, I want to develop that more in the future as well.

**HOST**: Very cool. What's the best place for people to follow your work? 

**MARCO**: I guess [my personal web page](http://homes.cs.washington.edu/~marcotcr/). I can send you a link as well; I'm always going to be posting stuff there. [I do have a blog](http://homes.cs.washington.edu/~marcotcr/blog/) that I don't post that frequently in, and I hope I'll be able to put everything on the **GitHub** project as well. So I hope that by the end of my Ph. D. I have a set of tools that people can use to interact with their models all open source.

**HOST**: All link to your site in the show notes people can follow up there.  Marco, thank you much for coming on this show to share the story of LIME and your work. I think this is really interesting and I'm glad to be a part of this machine learning conversation.

**MARCO**: Thank you so much for inviting me, it's great. 

** EXIT VOICE-OVER**: For more on this episode, visit [dataskeptic.com](http://www.dataskeptic.com). If you enjoyed the show, please give us a review on [iTunes](https://itunes.apple.com/us/podcast/data-skeptic/id890348705?mt=2) or **[Stitcher].**
