#Data Skeptic: Predictive Models on Random Data

**INTRO VOICE-OVER:** Data Skeptic features interviews with experts on topics related to data science, all through the eye of scientific skepticism. 

**HOST:** [Claudia Perlich](https://twitter.com/claudia_perlich)  has a Ph.D.in Information Systems from NYU and an MA in Computer Science from the University of Colorado. She is currently the chief scientist at Distillery, working on optimizing machine learning systems to improve display ad targeting. Claudia welcome to Data Skeptic! 

**PERLICH:** Thank you so much for having me, it's a pleasure. 

**HOST:** I'm really glad to have you here. I read a number of your papers recently, and there were two in particular that stood out to me that I thought would make a really great conversation. The first being, [*Leakage in Data Mining: Formulation, Detection, and Avoidance*](http://dstillery.com/wp-content/uploads/2014/05/Leakage-in-Data-Mining-Formulation-Detection-and-Avoidance.pdf), and the second being, [*On Cross Validation and Stacking: Building Seemingly Predictive Models on Random Data*](http://www.kdd.org/exploration_files/v12-02-4-UR-Perlich.pdf). I like these sorts of things, and I think they fit will with my audience. 

I was trying to characterize some of this to a friend, who is not really a machine learning person, and I was saying, "Well it's not really about diagnostics, it's more like maybe auditing." 

The best analogy I came up with was, buying a thermometer. It'll tell you it's precision and things like that, but then it also usually has this range of it doesn't work when it's extremely hot or extremely cold. And that was sort of the closest real world analogy I got. Do you think that's fitting, or how do you describe this collection of work?

**PERLICH:** While my job and probably my core competencies, building models that are really, really good at predicting things, I really get intrigued when things go off the cliff for all kinds of reasons. Sometimes it's the usual suspects that you have, data and so on. But every time there is kind of a discrepancy of what I expect my methods to do and what I see happening, that I feel like "Wow, I need to understand that."

And so, the two examples you picked are two of these moments where that doesn't feel right; it just doesn't sit well with me. And I really need to get to the bottom it to understand more about how these learning systems work. So, for me, it's almost this kind of tension between your intuition and what you see happening that kicks off almost a detective sense of needing to get to the bottom of stuff. That may not be a good analogy for your friend, but that's what it looks like and feels like from my perspective. 

**HOST:** Yeah, I think that's very fitting. Long time listeners of the show will know about cross validation, I talk about it a lot. But, not necessarily with the practitioners precision that is covered in your paper. So, maybe it would be good to open up a discussion of some of the ways one might cross validate.

**PERLICH:** [The whole point of cross-validation](https://www.salford-systems.com/videos/tutorials/how-to/an-introduction-to-cross-validation) goes back to the fundamentals of machine learning that you can never ever evaluate what the machine has learned on the data set that you gave it to learn from. Because in the worst case, it just memorizes everything, and tell you exactly what is on the data, and those types of models tend to be completely useless in practice because the moment you give them something new, they are clueless. 

So this is referred to technically as overfitting, and stand up practice has been, well, you really should evaluate whatever you did on a part of the data set that had never been, in any which way, involved in the decisions you made in building the model. And so usually people talk about hold out and test set, and so on. There are occasions where you don't have an awful lot of data, so you feel like you don't really want to keep any data to yourself for that test because every data point you take out from the training set means your model estimation part gets less information and less good as a result.

Cross-validation, on some level, tries to be the fix to this problem to say, "Well, how about we just do it multiple times", where you breakup your entire data set in chunks. Then you learn on just one chunk, and you can always evaluate on that other piece, and you do it multiple times for as many chunks as you have. 

So, you end up with what people consider hold-out predictions on the entire data set for your evaluation. So that's broadly, cross-validation. Typically, people feel like ëokay, ten fold is probably good enough'. And their technical paper will compare basically three fold to ten fold to a million fold, and there seems to be some consensus that ten is not a bad place to start. 

Now, let's talk about stratification. One thing that happens when you need cross-validation the most (because you have little data) is when you have very few positives meaning, your minority class has very, very few examples. So, in a classification setting, there's typically one class that's very common, and there's this exceptional thing that you want to predict; could be fraud, could be people buying things. So there's often a rare class. 

If you now just blindly do cross-validation, you will get very skewed results. From a theoretical standpoint, everybody always talks about IID. So, you have heard that your test set should be independently sampled. But, when you do cross validation, and you remove a chunk from your data set for testing, you have artificially created a negative penance, because yes, the information from your test set no longer is in your training set. 

What does it mean when you have very few positives? Let's be extreme here, right? The data set has three positives. Now, you make a cross-validation attempt where you find a sub-set, and there's one positive in the test set; that means now there are only two in the training set. Lets say you had 100 to start with, but your test set has one out of ten meaning, the positive rate in the test set is actually very different from the original three out of a hundred. The worst part is, it's exactly the opposite from the training set. So, in the training set, the base rate goes down. In the test set, the base rate goes up.

 Now, what happens if you build a model on this: models typically well calibrated, so on average, the model prediction probabilities will be equal to the base rate? If not, you have a really terrible model, so we're not even talking about it. So on this particular subset, your model will predict a lower average probability when the test set, in fact, has an average higher probability. So it looks like your model is actually off in terms of calibration. Not because it's bad, but you made that happen by just separating your training set in that way. 

So, what people do is say ëokay, in the very least, I need to maintain the base rate. So if I only have three positives, I will do three bags, one positive in each, and that way, the base rate is always the same, both in training and in testing. 

And now, your evaluation no longer comes up with a serious lack of calibration. This is an example where, because you have very positive examples, when you cross-validate, you do a stratification to ensure that there's always a comparison, so you almost get back to the ideal that you're supposed to have. Off topic- you asked about the specifics of calibration.

**HOST:** So, I recall you describing this in a really convenient way. Saying, that [cross-validation is a zero-sum setting](http://www.kdd.org/exploration_files/v12-02-4-UR-Perlich.pdf). I've never heard it said quite that way. Could you maybe share a little bit of the insight in how you came to that realization?

**PERLICH:** We can talk theoretically about stuff like IID sampling and what it means, but I think the easiest way to understand this artifact that requires a calibration is, what I refer to as, "cross validation being a zero sum game." It means that, whatever you choose not to have in the training set, will be in the test set, and vice versa. Because in total, you're still stuck with the fact that you have a small training set. That is your total sum. Your choice affects one or the other. 

**HOST:** Yeah, it's interesting. Cross-validation, I imagine it's a procedure that a responsible machine learning researchers should be using. And it's very helpful for us; we can prevent over-fitting and things like that. But, I'd never stopped to think that I would be biasing my own data set by using it. Does this problem go away as I have a less imbalanced sample, or a larger data set?

**PERLICH:** Yes, if fact, all of the artifacts that I'm describing in this paper, that actually initially spurred my research on the topic, really are not important if you have thousands of examples. Because, at that point, almost any random sample, thanks to the law of large numbers, will have on average, the same percentage of positives, and you're in a good place. So, all of that goes away when you have enough data that you actually just can use a test set and don't really need cross validation. 

So that's kind of the irony: when you need cross validation the most, that's when it can also lead you astray. So in some sense, it goes back to there's no free lunch. If you don't have enough data, you don't have enough data. There's no silver bullet to deal with it. 

**HOST:** it's an interesting dilemma, because we have these tools that we're very happy with in general (and when I say tools, I mean algorithms and methodologies and things). Just because they work at one situation or environment doesn't mean they work globally. Some of the figures you have that I thought were really helpful in making this concept clear to me were the scatter plots where you show the trained area under the curve versus the strategized cross-validation area under the curve. I know it's very difficult to talk data viz an audio podcast, but could you share a rough disruption of those, and what story they're telling us? 

**PERLICH:** In order to understand what happens when you plot AUC curve, under the area of the curves, there're different ways to then use the information from your different cross-validation samples as a total assessment of the performance. And one way is to say, ëokay, you just calculate your performance on that little test set, actors, all the little test set, and you take the average. 

But, you may also consider, ëmy tests sets aren't very big either, let's face it.' Any statistics you calculate on a small data set is probably not very reliable in the same way that bagging helps you averaging an alternative way of reducing the variant of your estimate in the test set is to actually merge all the predictions on all these different test sets to have the full out of sample prediction on everything. And then evaluate on that. 

Now we have more data, and you feel you have a more reliable sample for out of sample performance. But, what happens now, when you combine the results from different test sets that were built on training sets with different base lines, the calibration will start to effect the overall ranking in a very artificial way. You will have basically, examples form certain test sets all at the beginning, and then examples from other test sets at the end. So, their total ranking is actually no longer random across the test sets. But you will have this base line that came from the training set, carried over into these chunks. 

And that leads to a typically underestimation of your true performance. Because it creates this in adverse bias when the training set has a high base rate, it will predict a high probability. But, by definition, there are very few positives in that chunk of the test set. In that case, whenever the test set has a low prediction, you have a lot of positives. And when you have a test set a higher average prediction, you have few positives. And that obviously makes your ranking look really terrible. And you get low AUC compared to doing it on the larger sample correctly when you had the luxury of everything. So, you're underestimating your true performance.

**HOST:** I think this is a useful diagnosis that I'm going to adopt now when I work with smaller data, or rare event problems to look at the AUC plotted in this fashion. Do you think this is the ideal diagnostic for catching this, or is there more we need to look out for?

**PERLICH:** In some sense, my feeling is, we're just maybe pushing the system too hard. If the only thing you have is ten positives, maybe you should reconsider if this is really what you want to do. Maybe, instead, you should think of completely different techniques, like transfer learning, or somehow getting a better proxy that has a higher base rate to learn form. 

Ultimately, all of the things we talk about are not the result of non-optimal methodology, but you're really running up to what is at all possible if you're limited in your training set. And so you're kind of pushing the boundaries, maybe just an inch too far. The good news is when you get doing all the right things, a model that predicts worse than random, that tell you that you probably have pushed your attempt to even predict something too far. Its not that you did something wrong, its just, this problem in its current form just may not be solvable. 

**HOST:** I very much agree with that assessment. I think [transfer learning](http://www.andrewng.org/portfolio/self-taught-learning-transfer-learning-from-unlabeled-data/) is an interesting approach. Someone else might come along and say, "I'm going to fix this with regularization, or with some sort of constraint on my optimization." What are your thoughts on trying to squeeze too hard to get a little bit more juice out of the orange, so to speak? 

**PERLICH:** The point of the article is that in fact doesn't help at all. It will continue to represent that problem. It just becomes, in fact, more obvious. For instance, I could say, let's really regularize. In fact, I don't want any non-zero coefficient. Or, in the world of a tree, I don't let it split at all, its just a stump-there's nothing there. What does the model do in that case? 

It can only predict a constant, which is in fact the base rate of the training set. But, the problem is exactly the same. On the test set that you have for that base rate, you have again this inverse correlation between the number of positives. So, even if you regularize heavily, or if you make sure that there was no signal to start with, the problem actually persists that you see in cross validation getting this inverse signal. 

**HOST:** I also wanted to ask a little bit about [stacking and bagging, which are of course important themes](http://machine-learning.martinsewell.com/ensembles/stacking/) in the paper. I don't know that I've covered stacking of the show before. Would you mind giving a basic definition?

**PERLICH:** What we talked about right now with cross-validation, as a said, it's actually a good case scenario. Because, all of your evaluation tell you that your model is terrible. In fact, it may tell you that your model is worse than random. That's actually good news, in the sense that you get a very clear slap on the hand to walkaway. 
But, let's talk about a second technique, where in combination it creates a problem. You mentioned stacking here, and I've used stacking a couple of times. I'm sure you have heard of ensembles before. So the idea is that, rather than just building one model, you build multiple models. 

The simplest form of doing that is, in sense, bagging. You build many, many different models, and then you simply average the predictions. If you don't have any reason to believe that one of your models is better than the other, averaging is perfect. But if you try, say, different models (decision trees, logistic regression, all of them), there's no reason to believe that they're all equally good or bad. And maybe, you want to have a second layer of model sitting on top of it and re-weight the evidence (the predictions that it gets from these many different sub-models), and pick which one actually has more signal than the other. 

So, that's what people looked at in ensemble learning, and that's, arguably, one of the techniques that have been very, very prevalent in winning competitions and really pushing predictive performance to the extreme.

 When you think of the Netflix competition, that was basically an ensemble of sorts. And the idea is actually older than that. People have thought of this in terms of, what they called back then, "Gated experts", the idea was, maybe one model learns a specific scenario, and the second model learns a different scenario. And then there has to be that expert sitting on top that acts like a gate that figures out, "Okay, what kind of scenario am I right now looking at. So, which of those models should I listen to?"  

This term of "gated experts" was used in the artificial neural network's research back in ë95 through ë98 literature that I am aware of. So the whole point here is, you have two layers of models. The first one is the regular methodology that you know, and the second later is another model that learns to re-weigh the evidence (meaning the predictions of the first layer), to produce a final score. That's the idea of stacking. 

What happens now, if you combine cross-validation with stacking? Here's the problem with stacking: on what data set are you going to learn that stacking model on top that gated expert? And you can obviously not use any data that was given to one of the original models, because now, you're clearly over fitting. You are leaving the models below, simply because you're looking at the exact same evidence again.

 So, what you need for the second layer model is a different data set, a hold out set. Now we are back in the world of not having enough data. You cannot simply use the same data. One idea people may have, and I want to caution very strongly against that is, "Well, wouldn't that problem go away if I use cross-validation on my basic models underneath? Because now, all of their predictions are out of sample, right? All should be good, so now I can learn that stack model on top on this "out of sample predictions" being features, on the exact same data set. And this is where the original problem of that inverse correlation that gets introduced by cross-validation becomes a huge problem. Because, while we observe that the model was worse than random, as it came out from the first layer, all the second layer model has to do is flip the sign. And it can do that. So you can, in fact, build a super predictive model with that "methodology" on entirely randomly generated data. We demonstrate this with some simulation experiments. 

So, you simulate random data; you use cross-validation to build a set of models, and you then run it through a second layer model, which essentially just flips the sign and comes up with out of sample, excellent performance. Except, when you really a new data set that was never looked at, it's back to performing at random.

**HOST:** So it seems we're very much at the edge of what's sort of theoretically possible. There doesn't seem to be any new super- algorithm that will come down the pipe one day and then solve these problems for us. Certain problems need a certain degree of information before we can even think about modeling them. Is that a fair characterization?

**PERLICH:** I think it relates to that point. To me, I have filed it in mentally, as a form of matter over-fitting. Because the moment you get real new data, your performance is terrible. So, in that sense, it fits that picture that you are learning something on dataset that either isn't there or isn't there in a meaningful way. 

On your perspective, the way you phrased the question, it falls under the category of just fooling yourself when you're trying too hard. And trying to squeeze water out of a stone. And it can actually look good, despite the fact that it was really a stone and there was no water.

**HOST:** Yeah, definitely. And you'd mentioned how effective bagging has become in a lot of the data mining competitions, which is a nice transition into the leakage paper that you've also put out. You cover a lot of [different types of leakage](https://www.kaggle.com/wiki/Leakage), and I almost sort of established taxonomy of different forms of leakage, which I thought was really helpful. Could you talk a little bit about those different forms of leakage that one might want to know about?

**PERLICH:** So, let me first attempt to define leakage. And that's actually not easy. In the paper, we did struggle a lot with a somewhat "formal" definition. The informal definition is: you are learning correctly predictive information on your data set, but the reason it is predictive, is not truly reflective of the underlying data generating process you really want to learn about. But, it's an artifact of a number of steps taken in the theater assembly and pre-processing. 

In some cases, it is actually truly that you're learning basically the future, because there is information about what really should happen in the future that snuck in, because somebody prepared the data knowing about the future. Sometimes it's a form of sampling bias. 

The notion of leakage covers a multitude of different problems that typically relate to the fact that something about your data processing created artificially, a signal that you learned. And the worst part is, the test set (which you also drew from that data set you have), has the exact same problem. 

Therefore, it's not over-fitting the technical sense because you can't detect it without enough sample learning. So, just keeping a part of the data set aside will not tell you that you had a problem. I think it might be easier for a listener to relate to this on a number of examples that I have presented in the paper, so I wanted to share a few of them. 

The first time I really saw it for what it was, was on a data set in the medical domain from a data mining competition that was run by Siemens Medical. The task was to identify breast cancer from fMRI images, and they were heavily processed. So, you actually didn't really know what anything meant, all you had was 127 numeric features, and you had to build a model on top of them. 

This was a relatively straightforward task, (again, we had a low base rate, the usual problems appearing, and some feature selection). But eventually, when we were trying to understand the data better, what we observed quite accidentally was when you added the patient I.D., meaning the random number that was assigned to the patient, your model performance went up by, easily thirty percent. 

Now, usually, I'm not in the habit of adding social security numbers or names to my predictive models because they really shouldn't predict anything. They can. They could be proxies for, obviously gender, age, and race, maybe. But, in the case of hospital records, where everything is annonomyzed and all you're getting is a "random patient I.D.," maybe it correlates with time. But other than that, there's no reason to believe that breast cancer is that strongly correlated with time, so what's going on here? 

As we spent more time, what became apparent, there were really four quite distinct groups of patients. So, the patient I.D. wants really a uniform distribution, but there were, what I would call, four buckets. The lowest bucket actually had about 30 percent cancer, the highest bucket had no cancer, and the mid-section you had closer to the six percent that the overall data set, (the base rate of six percent), was showing. 

Why would having a really high patient I.D. be an indicator of you safe and for sure not having breast cancer? The reason is that in order to provide enough data for this challenge, people pulled data from different sources. The data that we had was a mixture of data collected from four different locations, which doesn't sound like a bad idea in the first place, because having more data is certainly better. But, what happened were these locations correlated with the prevalence of cancer for, say, reasons that one was a screening facility, and another one was an actual treatment facility. 

And the screening facility had very, very low cancer rates, and the treatment facility had very high cancer rates. Now, clearly, if I wanted to predict whether a person has cancer, it does matter whether I'm already treated for some cancer or not, right? So, it was in some sense, an artificial problem. And, I should have been told the fact that this is where the data came from
 What really came to show in this exercise is, the model turned out to be (even without the patient I.D.), quite predictive. 

But there is kind of a lurking fact here: that the location is implicitly encoded in these images because, every of these fMRI machines has its own calibration. So, they have different levels of gray scale. So, all the model had learned through the average gray scale is where the patient was. So in fact, the model had no clue what to do with the images, it just backed out the location, even without including the patient I.D. I'm sure the model picked up a lot of that signal. 

Meaning, it actually looked a lot better than it would be if you were to use in in say, yet a different location with a different calibration. In fact, all bets are off what the model's going to do. So this is an example where we really just learned something about the data collection process. It really depends on how you want to use your model, whether this thing that you learned vastly corrupts your model, or in fact, you should have added even more explicitly the information (like location) to your model. Then, deliberately used the model with the coding of the location in one of the four specified location. 

So, that's one of the examples that we had on leakage. There were great other published examples that we had observed from research done at Amazon, where they tried to predict, for cross-selling opportunities, who' is likely to buy jewelry. Because, hey, maybe you want to target them with jewelry. 

How do you find yourself a training set for cross-sell for jewelry? You look in the category of jewelry, (whoever bought jewelry becomes a positive, and whoever didn't buy jewelry becomes a negative), and you use purchases in all the other categories to predict whether or not you bought jewelry. Sounds good?

**HOST:** Definitely.

**PERLICH:** Okay. Here's one of the things the model found: if the sum of revenue generated across all other categories is zero, you're extremely likely to be interested in jewelry. 

**HOST:** Very true, can't argue with that!

**PERLICH:** Meaning, people who buy absolutely nothing, are really the best candidates for cross-selling. Now, why does that happen? 

Well, the only that you make it into the Amazon database, is if you buy something, right? I mean they don't have records for people who never bought anything. 

If the only thing you bought was jewelry, then there's a clear causal relationship, not because causally that you buy jewelry, but causal to be in the data set. If you bought nothing else, then you must have bought jewelry. That's the only way you could have made it into the data set. 

**HOST:** Yeah, it's like a tautological leakage. 

**PERLICH:** Exactly. And again, this model is completely useless. All you learned is an artifact of the data collection process. It all goes away if you do data collection correctly with time stamps. 

Because, you don't really want to predict who bought jewelry in the past. You really want to predict, (given everything you bought up to now), how likely are you to buy jewelry in the next week, quarter, months, whatever. And the problem goes away once you correctly frame the predictive task as moving forward in time, and you correctly create your feature set and your training set according to the time stamp.

But often when you work with second-hand data that somebody hands to you, you don't have the luxury to completely recreate everything from scratch (with time stamps and so on), but you just take what you're given. And so once data gets normalized into these CRM systems, where you have by person, the total sum of revenue by category (no longer any time stamp in sight), you lose that ability.

 The same is true in medical applications where instead of having transactional level of data of what diagnosis was done when, but you only get summary records of, ëHere's the patient, and here are all the different things that are wrong with him'. You don't know what was wrong with him in what order. And then being able to diagnose or predict likely co-occurrence of other sicknesses can easily suffer from the same problem. 

So, we have another couple of examples in the paper where we show that predicting primordial has exactly the same artifacts that, if you had nothing or else, for sure you had pneumonia. So there were a couple of artifacts where really just the model finding everything wrong with your data set, and chances are you didn't even know about it. 

**HOST:** I think those are two fantastic examples of leakage that teach important lessons about being skeptical of your models and being really introspective of what they're doing. There's some other types of leakage as well. You covered a couple cases of what I might call "cheating" in these data mining competitions, where competitors leveraged leakage. Could you share some of the stories you have there?

**PERLICH:** Here the thing about data mining competitions: usually, the rules are clearly stated, and everything that is in the data set is game - as long as you can find it. Provably many of the other competitors felt that including the patient I.D. in the model to predict breast cancer was a form of cheating. 

I agree that if I really had to build a model for Siemens to be used, I would have designed a different solution than simply adding the patient I.D. Are there particular other examples that you felt about it, because I think those were really the two prime examples that we had on medical data sets where we recreated the artifacts of the data collection, and then coded them specifically in our models to take advantage of. 

**HOST:** Yeah, there was one that you'd referenced that stuck very heavily in my mind; it was the case in the social network challenge. There were these annonomized social graph, and the team that won, or at least ranked very highly, was able to do so by identifying the source of that social network, and sort of retrofitting it to publicly available data. Essentially, de-anonymizing it.

**PERLICH:** So, I think that goes beyond what I was interested in, in terms of what can actually practically happen. That, for me, actually goes closer to cheating in terms of retrofitting. 

Social networks, or anything related to network data, really creates a lot of problems when you start sampling. There are entire sub-fields in social network modeling that talk about what is the right way of sampling. Because what happens when you remove entities, you also remove links with them.

 And so all of the sudden you end up with a lot of orphans. But, similar to the Amazon example, you know that in the beginning there were really very, very few orphans. So all the orphans are probably an artifact of samples where you removed the ëbody' that they are connected to. That, I would consider again, a problem of data processing, creating artificial information.

If you really just go out and de-anonymize things, yes. But you actually know exactly what you're doing. What I'm more fascinated with in leakage is you actually don't know that you build a completely over predictive model that will fail the test of time the moment you try to put it in production. So, I do assume that for practical applications, usually people try to do the right thing. And what I find fascinating is, even when you try to do everything right, and you walk down the wrong path, just finding additional data is a separate conversation that has probably less practical relevance. 

**HOST:** Yeah, that makes sense. And even we could say, including an I.D. is sort of a blunder, one should know not to do that. But to your point, if there's an artifact of the calibration that would be a very easy mistake for someone to make. 

**PERLICH:** looking at it differently. I think that the lesson here is not that I shouldn't have included the I.D.; the lesson is, only because I was bold enough to do so, could I prove that there was something very substantially wrong with your data, and the model was not to be used in practice. 

**HOST:** That's really interesting, yeah. 

**PERLICH:** So look at it as a form of data detective work when you identify reasons why a model is too good to be true. That's actually a skill that is incredibly important because the moment you want to use these models in the real world when our time moves forward the way it usually does, they perform terribly. 

And then, the practitioners will just walk away like, "What the hell? We paid them a lot of money to build us a model, and guess what, it's completely useless!" So I think there's a lot of skill, or importance in honing your intuition to find issues of that sort that may make things look too good to be true.

**HOST:** With that in mind, maybe we could wrap up with just sharing some of your insight on how one might detect a situation where they've gotten leakage in their model.

**PERLICH:** So, one of the hardest parts that really requires a very good combined understanding of 

A: the domain that you're currently working in (like some medical understanding if you want), alongside with statistical intuition. 

This is not about knowing how to build models and knowing all the processes, it's about having a gut feeling of how well you think you should be able to perform. There was a competition where people had to predict a stock market. And if you build a model that has an AUC of above .55, you did something wrong. Maybe not you, but something is wrong. 

We had recently in our work a model where somebody had to build a model to predict the probability that a person clicks on an add. And he found a good five percent of people that had an above ninety percent probability of clicking on an add. 

I cannot possibly imagine that you could ever predict that degree of certainty that a person will click on an add. It just doesn't sit right with my intuition. It's just not possible, period. So, things about human behavior-there are certain things that are really hard to predict. I have no idea whether I will have pizza tonight; I don't know! If I don't know, then what machine could possibly predict this? 

Yes you can do better than random, but no much better. On the other hand, people have shown that, for instance on the Facebook data set, predicting things related to for instance, sexual preferences, you can get very high occurrences on that one.

So, there is a real skill in understanding your problem well enough to form a good intuition as where the upper bound should be, given the data that you have. And this is really what guides a great data scientist's work: is that intuition that something smells weird because it's just too good to be true. You want to go back and triple check to make sure it's exactly what you want it to be.

**HOST:** Absolutely, I think that's great advice. Some more great advice I would give is that everyone go to the show notes and follow the links to both these papers. They're an excellent reading for senior and junior data scientists alike. I really appreciate you taking the time to come on the show and share your insights.

**PERLICH:** It was a lot of fun. I appreciate it.

**HOST:** Excellent. Well thanks again Claudia. Take care!

**EXIT VOICE-OVER:** For more on this episode, visit [dataskeptic.com](www.dataskeptic.com). If you enjoyed the show, please give us a review on [iTunes](https://itunes.apple.com/us/podcast/data-skeptic/id890348705?mt=2) or [Stitcher](http://www.stitcher.com/podcast/data-skeptic-podcast/the-data-skeptic-podcast).
