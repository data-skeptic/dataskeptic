**Segment Intro**: Data Skeptic features interviews with experts on topics related to data science, all through the eye of scientific skepticism. 

**Host**: Okay, Linhda, before I get into my interview today, I was hoping you could help me with something. Is that okay? 

**Linhda**: Sure. 

**Host**: Alright. So I'm going to show you a picture, but don't comment on it. Just pretend like it's a magic show and I'm the magician showing you your card. But don't tell the audience what it is yet, okay? 

**Linhda**: Mhm

**Host**: Alright, you see the picture? 

**Linhda**: Yes. It is familiar, it's famous, and it is familiar from our friend Matt's wedding! 

**Host**: Yes. It was featured in Matt and Christine's wedding, but maybe we shouldn't mention that part because this is not a photo people generally associate with weddings, although it was fitting for the occasion. I've written three descriptions below. In a minute, I'm going to have you read them. Maybe listeners are on Twitter, and they can tweet at me if they find one of these descriptions gives away what the photo is, or if they think one is a better description than another. So Linhda, can you please read my three descriptions? 

**Linhda**: Yes. 
Option one: five flags, an elaborate belt buckle, a statue of a pigeon, some white wainscoting, two men. 
Option two: A president shaking hands with a singer. Also, a velvet-lined sports coat. Three: Richard Nixon shaking hands with Elvis Presley.

**Host**: Okay, great. So, first off, do you find all these descriptions to be accurate? 

**Linhda**: I think so, but I'm not sure that bird is a pigeon. I can't tell. 

**Host**: Okay. Maybe pigeon experts could tweet about that too. 

**Linhda**: I don't think it's a pigeon. 

**Host**: Well, okay. So then the first one was not accurate. How about the second two? 

**Linhda**: Yes. 

**Host**: So, setting the pigeon aside, do you think they're all good descriptions of the picture? 

**Linhda**: Well it depends what you're trying to get at. 

**Host**: If you saw that photo in a gallery, and each of those was the caption of it, do you think that would be appropriate captions? 

**Linhda**: No. Option three is the only one that would probably be in a gallery. 

**Host**: Alright. So what's wrong with the other descriptions? You said they're accurate.  

**Linhda**: Well, five flags, option one, that one, isn't what people remember about the photo the most. Option two, you're getting a little closer, but you mention a velvet-lined sports coat. And unless it was like some fashion museum, I don't know how that's relevant. 

**Host**: Ah, so we're talking about how maybe there's a distinction between presence and relevance? And maybe that's pretty easy for humans, but it's very difficult in computer vision. Or at least, perhaps it was until recent research in this area, that we're about to have an interview about, which is starting to change some of that. Stay tuned and everyone else can learn about that. Thanks, Linhda! 

**Linhda**: You're welcome! 

**Host**: Ishan Mishra is a Ph.D. student at the Robotics Institute of Carnegie Mellon University. His research interests include computer vision and machine learning. His recent paper, "Seeing Through the Human Reporting Bias: Visual Classifiers from Noisy, Human-Centric Labels," presents a novel way of solving a computer vision task, and it's that paper I invited him on the show to discuss today. Ishan, welcome to Data Skeptic. 

**Ishan**: Hey. Thanks for inviting me. 

**Host**: So, the abstract in your paper very eloquently summarizes the work by presenting this dichotomy of what's in an image versus what's worth saying in the image. Can you elaborate on how these two questions are different? 

**Ishan**: So, let's start by considering an image, and it's hard to show you this over podcast, but I'll try. So if I describe a scene as two kids sitting in a classroom, you can agree that it's at least a description of a scene. Let's just take a step back and see what you can imagine would be in this type of scene. You can reasonably assume that the scene contains chairs, desks, walls, bags, crayons, whatnot, but I never described them to you in my initial description. Even though these things are in the image, they aren't worth talking about. And humans decide subjectively what to talk about and what not to talk about. These are the kinds of questions we are looking at in the paper. Given an image, humans will subjectively decide to suppress certain information that is presented in the image, and only talk about certain aspects in the image.

**Host**: Yeah, it's a very interesting phenomenon. I wasn't aware of it until I read your paper, but it's very clear, and your classroom example is a good one, there's a lot of things my imagination can come up with that are just presumed by the concise description of two students in a classroom. There're a couple of other really good visuals in the paper. I would encourage anyone interested in this to at least look at the first page there, you have some of the quadrants of examples. Could you maybe describe some of those and highlight why those were especially good use cases for your paper? 

**Ishan**: Sure. It's like you mentioned from the first quadrant of the paper. You have concepts of a bicycle and yellow, and we see images that have both of these concepts present, but in their descriptions, humans subjectively will link them. And other such examples are seen in Figure 5, from right to left where concepts present in the image are limited. So this poses a very insistent learning problem, as the labels are noisy. 

So in this paper, we want to see if we can get in on this label noise and claim data models. Why should we be able to do this? Well, humans are fairly consistent when limiting parts of the scene, even though we see them. And we want to model this human thinking into the classifier, so we can distinguish what's in an image, and what's worth talking about. 

**Host**: In those examples, we see image recognition algorithms, I guess making mistakes, but not mistakes that are objectively false. You know a picture that has a bunch of bananas in it and you say it's yellow, that's not wrong. So, it seems to me that there's taxonomy of errors that are coming out here. Perhaps we could call the certain errors 'blunders,' like if a picture of bananas said it was cabbages - that's just wrong - versus having an emphasis mistake, like saying it's yellow when that's not the important feature. What are your thoughts on the right choice of vocabulary to describe these situations? 

**Ishan**: So this is actually a good question. We had a lot of debate amongst co-authors on what vocabulary to use, and even the last day we were fighting over what to use and what not to use. 

In my personal opinion, I think, errors can only be defined if you have a ground truth or gold standard of correct labels. And because the definition of these correct labels depends on your task, everything should be called an error. I don't think we should come up with different words for it.

 If we can describe how we came up with the gold standard, we can define another metric with respect to that. The issue I had with using different words like "blunder" or "error" is that it makes one thing seem more acceptable than the other in all circumstances. Like a banana may be classified as a cabbage, and it might be okay because you're sort of considering only food items, and that's fine. 

**Host**: So the paper centers around human reporting bias. Can you define "reporting bias" in the context of the paper? 

**Ishan**: So for us, "reporting bias" is when humans report or talk about only a few of the visual concepts present in an image, and suppress a lot of the visual concepts present in that particular image. So when they're reporting these concepts in an image, they have a certain bias. And we apply that bias in reporting such concepts. 

**Host**: Do you find that that bias, you call it "human reporting bias", is sort of standard amongst all humans, that invariably we human beings tend to label the same things as important? Or are there cultural or ages biases that will come up? How universal is the bias you see? 

**Ishan**: I do think there should be cultural and age biases that come up, and of course generational biases as well. Certain generations may prefer to describe certain visual aspects of the scene. 

We did a very small experiment for this, which is not in the paper, but this was the initial study. We took a Microsoft-Google dataset, which has a bunch of captions. So for each image, we have about five captions. We'd like to measure the interrelated data agreement between these captions. And we found that it was fairly high. The original authors didn't collect data on age, geographical location, and what not; but I do think there should be a fair amount of consistency with this reporting bias. 

**Host**: So I've been observing computer vision for a while. I think if we wound back 20 years we would find it was almost not present at all. There was research going on, but it was very preliminary. We've seen a lot of advancements, to the point where image recognition is doing some phenomenal things, and we're seeing a lot of really strong proof of concepts and working technologies with computer vision. We're also seeing a lot of these human bias errors come up. Do you think this is a new forefront for computer vision? Are we entering a new era where it's less about recognition and more about discernibly or proper annotation? Is that the new frontier? Or is this just a piece of the future? 

**Ishan**: I do think this is the new frontier. I think this was actually a very neglected aspect of recognition, and people did not realize that our visual data does suffer from a lot of these human reporting biases. We really need to consider this when we are, say, describing an image to a visually impaired person. We don't want to tell another human about all the million things that are present in an image, but only about the things a human cares about. This is a completely different task, where the computer vision algorithms really need to change their output space to cater to a human's needs other than just blindly saying "cat, dog, tableÖ" 

**Host**: Yeah. That's an interesting use case I hadn't considered. Some researchers who were trying to tackle this problem might claim that we should build a monolithic classifier that attempts to mimic the reporting bias. Based on your work, I would presume from an architectural perspective, you disagree. Can you tell me why?

**Ishan**: I don't strongly agree or disagree with this one. I think, for me, it's whether basically, you should optimize for your end task. In this paper, we show one thing: it's that the one type of labels, the human-centric labels, the human reporting bias label, could actually optimize for two tasks. 

We'd visually correct our machine-like predictions. And the second one, the human-like predictions. And so what we are showing in this paper is that modeling both these types of predictions helps you do a better job on both of these tasks. 

So I don't think that you should try to build classifiers only in the reporting bias, you should try to optimize for your end goal. If your end goal is that you want to mimic reporting bias, then sure. Go for it. 

**Host**: Makes sense. Yeah, I think this is a good time to get into the architecture of your system. Can you describe how your particular setup, from the inputs of all these images into your final labels, is constructed and built? 

My reading of it differs slightly from your plain vanilla, off-the-shelf machine learning approach. They're kind of two separate paths that I'd love to hear some details about, and why you settled on this approach. 

**Ishan**: Let's first clarify the setup. You have an image, and you only have these human-centric record noisy labels available. You don't have the visually clean labels available at all. In our paper, we say that the human-like output or prediction can be factored into two parts: a visual presence, whether the visual concept is present in the image, and relevance. Is it relevant enough to be mentioned? 

What we do is we actually have a convo-net we take parts of featured representations from the image, and then these features that fall into two themes of classifiers. Both these themes of classifiers don't receive direct supervision. They basically model latent states in the system. The first theme of classifier predicts the visual output. Is the concept present in the image? The second theme of classifier predicts relevance. Is the concept relevant enough to be mentioned by a human? 

Finally, we take the outputs of both these classifiers and combine them as given by a factorization equation, and we produce a human-like output. This is the output that we consider computing for the loss for our systems. Because we had only the human-like labels to begin with, it makes sense to compute loss with respect to the human-like output. And then we end up bringing the system end-to-end because all the operations that are described to you are actually differential they can be modeled into a deep neural network. 

**Host**: So the path towards recognizing presence makes a lot of sense to me, and you have the noisy labels, those seem helpful. But you don't have access to ground truth on relevance. Can you tell me more about how you end up minimizing loss for relevance? 

**Ishan**: The idea for this, when we initially looked at images which had these labels was that when we claimed the classification vanilla network, the loss would not go down. For a bunch of images, say, let's just pick one example. For, say, banana, the network would still end up predicting yellow. And so what we assumed was if we gave the model extra capacity, it would actually be able to come up with a nice latent assignment, that it could assign a high visual presence to yellow, but with no relevance to yellow. So it could actually produce a low output for yellow. And that would end up driving down the training loss. 

**Host**: (Regarding,) the concern about labeling it yellow. Is that because yellow is in many other images that there's a similarity of color? 

**Ishan**: Yes. Even for an image which has a yellow minority in part of the image in terms of pixels, the network is expected to predict yellow. But for this image, which is yellow all over, we, could say it's just a picture of a single banana zoomed in; you're expecting the network not to predict yellow. It's a very inconsistent learning problem that you actually have your network addressing. 

**Host**: Yeah. That's very interesting. We've touched on my next question a bit, but I want to go into it anyways. Can you talk about some of the specific advantages of solving for the visual presence and the relevance separately over trying to learn the whole of the convolution of the two directly? 

**Ishan**: I think not separating the two factors leads to two problems. The first is, the labels are inconsistent. Like the yellow example. In one image, you have a little yellow portion of the image, and you want the model to predict yellow. In the other one, you have lots of yellow bananas and you don't want the model to predict yellow. It just makes the learning process very, very difficult. Your model can't even mimic humans effectively because of this inconsistent learning. 

The second, more important problem is that you will never be able to learn a model that gives you visually correct predictions. At best, your model can only mimic humans. You can never get the visually correct predictions if you never separate the two factors. 

**Host**: Ah, yes. Makes sense. When I first started reading your paper, I assumed that eventually I was going to find the EM algorithm buried in it. It seemed like it was set up in that direction. Yet that doesn't seem to be the case. Can you talk a little bit about how you arrived at the approach you've taken? 

**Ishan**: I'm not sure if I would call it EM, but we do have a little bit of alternate optimization. We hold one set of variables constant, optimize the other, and alternate between these sets. But you only do this once. 

We initially claim the model that predicts only a human likelihood. This can be viewed as basically holding the relevance conditional constant, and in misplacing to identity. After an epoch of gleaning this model, we then start gleaning the relevant and visual presence parts simultaneously. We did think of alternating between gleaning presence and relevance, and an alternate optimization setting, but initial results suggested that a simple, direct optimization approach was as effective. There is actually a reference in the paper that we found when we were writing it, which suggested it also found similar results.

**Host**: Can you talk about the improvements you saw by adopting these two separate alternating optimizations in terms ofÖearlier you'd mentioned you tried to learn the bias labels directly. I assume you got an accuracy gain. Can you talk a little bit about the magnitude of that gain?

**Ishan**: On certain data sets like non-curated ones, images directly downloaded from Flickr with tags, we'd actually double the performance of the baseline classification system. So we had gains of about more than 5% in average precision over 1,000 tags. And for the curated datasets, it actually would show gains of about 3% precision across all categories, across 1,000 classes. 

**Host**: Wow, I think that's a noteworthy improvement. I also wanted to ask a little bit about data sets. Something interesting I hadn't thought of until you pointed it out here,  is that when you do image research, ideally you can work off of a large corpora of images that are really well annotated. Maybe some graduate students have carefully gone through and labeled them, but of course there in a finite set. Those tend to be in the tens or, if you're lucky, the hundreds of thousands of images. Yet the internet is positively exploding with images everywhere that have these noisy labels. Does some of your approach potentially unlock these more raw data sets for use and research? 

**Ishan**: Yes, that's definitely the case. So, one thing we had in mind when we were going with this approach is that actually we should be able to harvest these social networking images, which had human-made labels, which are freely available. 

So that's exactly why we actually show results on the [Flickr](www.flickr.com) images. A lot of my work actually is in this direction where I try to use limited supervision to improve algorithms. So, as a graduate student I did actually end up labeling about 100,000 images myself for one of my papers, and after that, I decided I didn't want to repeat this process ever again.     

**Host**: Makes perfect sense, yeah.  In looking at some of the finer details, I noticed the output of the model you guys constructed is a 12x12 grid, and we can see some examples of that in the paper. Can you help me understand a little bit about how I interpret that? Perhaps how someone might leverage that grid operationally? 

**Ishan**: So, the 12x12 grid output is actually from an existing paper by our colleagues. The interpretation of that is that it can visualize which parts of the image were useful for predicting a particular output. It will actually produce a heat map, which will show ëthis part of the image was responsible for me to say yellow.' So it's actually very interpretive, and a very simple application for this is where you want to localize the visual content. You want to ask the question, where is the car in the image, as opposed to is there a car in the image?

**Host**: That's very interesting. So I don't often find references to psychology in papers in [the machine learning literature](http://www.sas.com/en_us/insights/analytics/machine-learning.html). Or computer vision literature, for that matter. So I was pleasantly surprised to see you guys delve into that area of research. Can you discuss some of the results from [the field of psychology that relate to this line of inquiry](http://azariaa.com/content/publications/models.pdf)? 

**Ishan**: Yes. So this actually comes in part because I took a course I took in grad school and one of my cohorts who has a background during one of my quarters in neuroscience and psycholinguistics. 

The part of our work that is related to this field has to do with prototypical properties of objects. In our heads, a lot of objects are actually represented in terms of their prototypical properties. Bananas are yellow, and so it's a fairly obvious property. When we are mentioning and describing these objects to other fellow human beings, we do not describe these prototypical properties. 

Yellow for bananas. Orange for pumpkins. Whenever you're writing a description, these things are never going to be mentioned. These things are just assumed to be known by everyone. You only tend to use these attributes or properties to describe objects when they're required to distinguish something from something else. You want to distinguish a yellow cup from a white cup. This is the sort of link we have to the field of psychology. 

**Host**: When we look at a lot of machine learning classifiers, we label certain things as supervised learning when we have some labeled examples, and unsupervised learning when we don't. Maybe that's an overgeneralization, but that's the basic idea. Part of my take and reading through this paper is that maybe there's room for something in the middle.

We could say that the human labels are ground truth labels, and therefore supervised learning, but there are also many things that aren't said by the human labeler, such as the crayons in the classroom and that sort of thing. Do you see the same room for ambiguity that I see here? It's technically supervised but a little unsupervised? What's your take in general on how we describe these sorts of problems? 

**Ishan**: I think the term for this would be "weakly supervised," and if you want to basically incorporate the fact that certain labels are mislabeled, you can probably just call it "noisy weakly supervised." 

**Host**: And this idea of maybe now we can use larger data sets on the Internet, do you think we'll see a trend of more types of research in this area?

**Ishan**: Oh yes. Definitely. And in fact, that has been the trend in the past three to five years. People have actually started using bigger scale data sets because they realize that staying in the confines of pristinely labeled data sets is not going to get us further. 

**Host**: So, I want to revisit an earlier question I'd asked. I made the assumption that maybe the vocabulary that we could use could describe these two types of misclassifications differently, and you disagreed. 

What if I were to come back now having talked about your architecture and make some definition regarding whether or not the relevance score or the presence score contributed more to the ultimate labeling? Do you think that would be valuable for someone to say that the proposed label was knocked out due to relevance? For instance, that's type A error, and ëknocked out due to presence' is a type B error? Or is this just really a distraction from the overall line of inquiry? 

**Ishan**: I think that's a very, very good point. We do have a figure in the paper where we do try to show how to classify for certain concepts that it knows are visually present, how the relevant score can actually vary. This is Figure 5 from my paper. I do think this is actually very important because it helps you understand what the classified has learned so you can interpret its output very easily. 

**Host**: Very cool I'll definitely have that in the show notes for everyone to go check out. I think this is a good paper for anyone, whether they're a computer vision person or not, just a little bit of ML makes it pretty accessible, and I know I enjoyed it. Just to wind up, what's on the horizon for you? What are some current projects or next lines of research? What can people look out for that you're working on next? 

**Ishan**: I had another paper in the same conference as this one, which was on multitask learning. I've been working with free sources of supervision to augment other more expensive forms of supervision and improve their performance. Recently I've started moving into unsupervised learning as well just so that I can harvest more and more data. 

**Host**: Ishan, any place that people can follow you online? Do you have a blog or go on Twitter or anything like that? 

**Ishan**: I don't blog, I just have [my website](http://www.cs.cmu.edu/~imisra/), but I update it fairly frequently.

**Host**: Cool and I'll have that in the show notes for everyone to check out. Thank you so much for coming on the show! 

**Ishan**: Thank you so much for having me.
