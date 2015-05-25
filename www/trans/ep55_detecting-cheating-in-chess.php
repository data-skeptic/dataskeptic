<? include("../header.php"); ?>

<blockquote>

<p  align=center style='text-align:center'><b style='mso-bidi-font-weight: normal'><spanmso-bidi-font-size:11.0pt;line-height: 115%'>DETECTING CHEATING IN CHESS (44:34) 
</span></b></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> So just a quick note before
we start this interview. In order for me to keep the data skeptic podcast coming out in a weekly basis, I sometimes need to record in advance especially when I know my schedule and other 
responsibility make it hectic.  Thus, this interview was record a little bit ago and I've been really eager to share with all my listener but my guess 
get a couple of references like last weekend or a week ago. So if you follow the chess world, just realize that the timing will not quite work out but for everyone else that does not change the 
narrative so please enjoy. </span></p>

<p><span
><b>Kyle:</b> Welcome to another episode of
the data skeptic podcast. I'm joining this week by Dr. Kenneth Regan from the <a href="http://www.cse.buffalo.edu/">Department of Computer Science and Engineering</a> from the University of 
Buffalo. Thanks for joining me. </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Thank you very much for
inviting me to be in the show. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> So I've been really enjoying
these past couple of weeks getting to read your contribution to the blog <a href="https://rjlipton.wordpress.com/">G&ouml;del's Lost Letter and P=NP</a> as well as your work on computation 
complexity. But the topic I want to invite you on to talk about this week is one that, as far as I can tell, you one of the world's leading experts on which is about detecting cheating in chess. 
</span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Yes that's right and I've been
very active on the past weeks more than I perhaps wanted to be. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Oh excellent, well serendipitous
then. Maybe we can start with your background on how you first got interested in chess to begin with. </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Well I was a junior player. I learned
the moves when I was 5 <span class=GramE>from  watching</span> my dad played with my uncle. And then, at the age of ten I discovered that there where such 
thing as chess tournaments. And my family very graciously took me into New York City and local chess clubs to play on them and I <span class=GramE>reaches</span> to just about master strength very 
quickly.  I was a master I think very briefly before age 13 but certainly at age 13. I was one of a number of my friends, all great people, juniors on 
the New York area chess <span>sciene</span> and elsewhere who would one point work close to the youngest masters since Bobby Fischer. I was also invited as a panelist on the National TV Broadcast 
of the Fischer vs. Spassky match in 1972 before my 13th birthday. Then I played tournaments as I got to be with junior champion in 1977. It was just absolutely a wonderful thing as a kid but I did 
not, however, intend to go chess as a career. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> What made you go into
Computer Science? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> I originally wanted to do
Mathematical Physics at Princeton. I found physics fairly tough going in an undergrad. But I got into mathematics, and then discreet mathematics which is the mathematics of computing. And then 
when I went to Oxford my advisor <a href="http://en.wikipedia.org/wiki/Dominic_Welsh">Dominic Welsh</a> got me interested into computational complexity and that pushed me toward computer science.  
</span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> So maybe we could start with defining
what it means to cheat <span class=GramE>a Chess</span>. (Time: 3:00) I assume we're not talking about it doing something nefarious like switching pieces around. </span></p>

<p><span
> </span></p>

<p><span class=GramE><span style='font-size:12.0pt;><b>Ken:</b> No, or having a rook on one's pocket.</span></span><span
> </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Right. <span>Haha</span>.
What do you mean when you say, &quot;detecting cheating&quot;? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Well it's an unfortunate
reality of the game is not only for supercomputers able to beat the world's champion as happened when <a 
href="http://fivethirtyeight.com/features/the-man-vs-the-machine-fivethirtyeight-films-signals/">Deep Blue beat Gary Kasparov</a> in the 1990's.  And in 
the middle of 20 <span>aughts</span> even the handheld computer programs and laptops were able to beat humans and that has created a temptation, unfortunately, in some cases for humans to consult 
a superior computer during what are supposed to be human only game. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> So am I getting unfair advantage
by using my computer to check a move or something? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> That's right and people are
quite checking their smart phones in bathrooms especially. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> aha, interesting. So how about
one <span class=GramE>go</span> about detecting that? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Well, there are a certain
patterns in the moves that indicate proximity to the patterns that come about from computer programs. Number one telltale is just the strength and quality but I look into other factors also that 
can distinguish computer like play. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Presumably if computers were <span
class=SpellE><spaan class=GramE>gonna</span></span> play the same way humans would, you wouldn't be able to detect it. What is it that computer are doing differently? </span></p>

<p><span
> </span></p>

<p><span
>Kenneth: Well, one of the things is
that very rarely they make a perceptible blunder (4:22) </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> <span>Hhhmm</span> </span></p>

<p><span
> </span></p>

<p><span
>Kenneth: Okay, if you manage to beat
a computer and there happen cases of that then you have found something very deep in the position that appeals to your human intuition but that is not easy to demonstrate via a moderate depth 
search. So you've found something very hidden. <span class=GramE>Whereas humans make little blunders all the time.</span> In fact, even when I'm playing I'll realized, &quot;Oh didn't see this 
idea of my opponent Luckily my position still holds together?&quot; So computers just never make large scale overt plunders. There are also some stylistic tendencies. They tend to keep a lot of 
their options open in a position whereas I've be able to demonstrate humans, if they see an attack, will try to play it and force an early crisis on the game. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Interesting, so can you say
the certainty that a move is given by a computer <span>vs</span> a human? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Not any one move, no.<span
style="mso-spacerun:yes">&nbsp; </span>Although there are some people who react, &quot;Oh this was obviously a computer moves&quot;. However in aggregates of a 100-200 moves then I can get an 
overall statistic on how computer-like to play us. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> So I'm guessing <span
class=GramE>it's</span> comparing two probability distributions? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> That's right and that's how I
originally conceive the whole problem. I was going to model it as the distance metric between the probability distributions. One representing the computer and this is very important because you 
can't just say deterministically what is the computer's move. That depends on many variables including the depth of search, the identity of the computer programs, even how much hash memory you've 
given it. There's a variation there and of course the human being is a distribution, often fallible distribution, of option.  I 
was originally going to use a metric called <a href="http://en.wikipedia.org/wiki/Trace_distance#Fidelity">Fidelity</a>, which is a distance between distributions measure the
computational physics in particular. That name was also a pun on on 
<a href="https://www.fide.com/">FIDE</a> which is the acronym of the World Chess Federation
and the idea of faith and playing in good faith. But then, one of my 
former student returning on a visit suggested a different distance measured called <a href="http://en.wikipedia.org/wiki/Jensen%E2%80%93Shannon_divergence">Jensen-Shannon divergence</a> which 
solves a problem with <a href="http://en.wikipedia.org/wiki/Kullback%E2%80%93Leibler_divergence">Kullback-Leibler Divergence</a> of being too hair triggered in the 
treatment of plunders but it lacked other properties that I needed which was a great shock. So I wound up doing something highly elementary.  <span 
style="mso-spacerun:yes">&nbsp;</span>All I do is I mapped given analysis of positions in a game and parameters denoting the strength and particulars of the human player. I mapped each chess moves 
to probabilities as if I were painting that move on the faces of <span class=GramE>many sided</span> dice and then I treat the chess position as the roll of those dice. So I say like for this 
player the 49% chance of selecting the Knight G5 move, the Queen G4 move is 27 percent and so on down the line. Once I do that I'm able to tap in to the very simple high school stats theory of 
Bernoulli distributions (7:30): rolls of dice, flips of coins, and not only project the expected mean number of agreements but also the projected variance from Bernoulli distribution theory and 
thereby project confidence intervals, and since I'm estimating the sample means, the central limit theory come into play.  So I'm dealing with the normal 
distribution and can use a Z-score framework for my statistical projection. </span>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Very interesting. Are there
certain situations that are more revealing than others? So I'm wondering <span class=SpellE>int</span> particular cases of a game configuration where one move that can make you alive and any move 
that can end a game for a particular player. </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Right! And that is actually
the main statistical principle on which the equation on my model that goes from the chess position to the probability is based. If there is a clear stand out move then not only will the computer 
find it but it's highly likely that the good human player will find it. That actually was the explanation in the incident began my involvement.  Whereas 
even if you have just 10 moves in a game where for each move there were 4 highly reasonable options which my model will assign probabilities they would be 20-25% for each. Yet if you consistently 
select the option that show as preferred in my computer task modulo that it too was a distribution and there's some variance, but less. But if you match the computer on 1 of 4 options, 10 <span 
class=GramE>moves</span> in a row. That's upward of 1 million to 1 unlikelihood. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Tell me more about the training
data you have. I presume you have a database of human game you can study and also a computer is there to give distribution. Where is that data set coming from? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> So there is two mode of chess
analysis with the computers. This multi-<span>pv</span> mode where the computer is given equal depth of search to all of the reasonable options in the position. And then, there's the single 
<span>pv</span> which is the regular playing mode of the computer where it focuses its resources on the move it think best and one/ two competing moves. A lot of the art of practical computers 
when they play against each other in championships is how quickly they can prune away the suboptimal moves.  Whereas for my model I need to know the 
values of all the reasonable moves that a player might be considering and the general landscape or shape of the position whether as you just said it is a forcing position that there is only one 
move to stay alive or when there's a lot of option and all the various grade and in between. So now for my training sets I have about 10 thousand games of the multi-<span>pv</span> data and I took 
all games where each player on the game was at one of the century points on the chess rating system.  So chess uses the <a href="http://en.wikipedia.org/wiki/Elo_rating_system">ELO</a> 
rating system which is popular. People uses that on the other sports or even Nate Silver's website 538.com is using it on the Nat'l Football League teams. But in chess the human 
players basically top out on the 2800s, 2600s is sort of the strong grand master 2400s International master, which is what I am, and 2200s master and so on and classes of 200 expert, 2000 expert, 
1800 class A in the United States, 1600 class B and so forth. So for each of the level above 2000, I basically exhaustively chose in their databases now approaching 10 million games for the entire 
recorded history of chess. From those databases I take all game where both player were within 10 or so of a century point, run those games and I get my training data for the A rated player and 
then I'm able therefore to relate my two main model parameters to strength on that ELO scale.  Then supplementing this I have a vast amount of single PV 
data.  Basically every top <span class=GramE>level  game</span> in the entire recorded history of chess over 
two hundred thousand games total which may have sound a lot out of 10 millions but a lot of the 10 million games are ones not played in the most standard chess competitions or played by lower 
players and I also routinely screen about 80 thousand games out of world's top events every year.  This is what has been codified as the screening mode. 
 So I can get a first look at the play and relate it to distributions of tens of thousands of other performances by players of all ranks to see how much 
of an apparent outlier it is. (12:39) Now, this is exactly the situation that I had this past weekends. There is an anti-cheating group on <span>facebook</span> and on Saturday I know that post 
about a surprise winner of a tournament and whispers. When I run the screening test indeed, the person was on the edge of what I've coded as 'the red zone' <span class=GramE>saying</span> 
&quot;Look at this a little bit further&quot; </span></p>

<p><span
>He defeated <span class=GramE>a grand
master almost 500 points</span> rated above him in the last round. But when I run the full test which is based on the training data using the multi PV mode, it gave a <span 
class=GramE>z-score</span> even under 1.5 let alone the minimum 2 to claim any kind of statistical significance. Meaning that basically the guy had rolled with a lot of punches and indeed he was 
dead lost against the grand master in the last round but the grand master got over hasty. So I post a feedback saying this on <span>facebook</span> and it seem to quiet the rumors for the moment. 
But it's actually one of several test cases for the viability of statistical input that I'm getting.  The thing is I confirmed to the arbiters of the 
tournament had acted correctly based on the less regular information that they saw. So they don't have scientific computing resources but they have good chess marks and were able to observe a lot 
of the things about the game the choppiness, the force situation, the fact that he was lost against the grandmaster, and reach basically the correct and same conclusion. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> That's good to hear. I would
imagine that you're never saying with certainty anyone cheated. You're just talking about the probability that this happened. And<span class=GramE>. .</span> . </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> That's right. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> To what degree do you want to
have confidence before an action should be taken? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> That's right. So I'll tell
little bit about the background and history of this. Upon until 2+ years ago<span class=GramE>,(</span>14:31) the highest Z-score that I got in cases I was involved in was about 3.5 which 
corresponds to 4300 about to 1 odds against null  hypothesis. Although very important, what it really means is that the incidence of such a deviation 
occurring naturally among non-cheating players. And every week, there are more than a thousand players taking part in tournaments around the globe, tournaments significant enough to be aggregated 
on a website called <a href="http://www.theweekinchess.com/">The Week in Chess</a>, run by <a href="https://twitter.com/marktwic">Mark <span>Crowther</span></a> in England, whose games I can get 
to test for the tournaments that published their own games on their own website. So if you have that and you get 4,000 player performances every month. So if you got 4,000 to 1 odds, if you look 
at every game for a month, you'd see that happen all the time. So you have to be aware of how your sample was selected or whether there are any other factors that brought it to your attention 
apart from people going over the games with computers in noting a high correspondence. So my role was that there had to be independent evidence. Now in one case 4 years ago, there was independent 
evidence based on text messages that had been preserved since a cellphone was used to transmit communication. The content of the messages could not be entered into a civil court case for under 
privacy reasons. But the fact is they're being there and the times could be entered an evidence. And that was an independent factor so then my input was that I had this deviation over three. There 
was another reason that had selected this performance for attention so the full significance I said came into play. Also, I was able to distinguish the moves on games when there been lots of 
transmissions from the other game to the tournament played by this player. And that was a very clear distinguisher; the quality distinction was 3200 versus 2550. So certainly, apart from the 
confidence assertion, there certainly was that distinction. </span></p>

<p><span
>But upon until January 2013, I did
not get any Z-scores above 3.5 and then suddenly ones above 5 tending closer to 6 tumbled out for a case of a Bulgarian player playing in the tournament in <span class=SpellE>Zadar</span>, 
Croatian. And that prompted me to run an <a href="http://www.chessprofessionals.org/content/open-letter-kenneth-w-regan-cheating-chess">open letter</a> and write a blog post raising this as a 
further level of problem, a really philosophical problem of what role statistics should have in adjudicating this kind of case. The player <a 
href="http://en.wikipedia.org/wiki/Borislav_Ivanov"><span>Borislav</span> <span>Ivanov</span></a> have never been totally caught although there was a wand beep on the shoe and in another 
tournament people observe briefly a wire on his chest. But he was never really apprehended. He was allowed to walk out of the tournament after being defaulted. Actually, even came back for his 
last two rounds, in one of them was undisturbed. I of my own hypothesis but it still <span class=GramE>is</span> mark that no one knows exactly how he's doing it but of course they had to phrase 
"if he's doing it". Let alone that when I combine all these tournaments, I get Z-scores over 7 and we were talking getting to above billions to one to trillions to one odds range. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Yeah, that's a higher
standard of evidence. I think you were saying when we talked earlier the Higgs Boson standard is <span class=GramE>5 sigma,</span> so... </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> That's right. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Fairly convincing from
statistical point of view </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> I mean that I was able to use
the 5 sigma standard <span class=GramE>because  my</span> unit is a thousand player performances is one week of the weekend chess. If 4.75 sigma is 1 
million is to 1 <span class=GramE>odds</span>, then I can say that is 20 years of chess tournaments at a level were likely to be most concern with. And if you use 5 sigma it's almost 3 million to 
1 that could be 60 years, meaning that you would expect to misclassified someone at 5 sigma, to make an errors once every 60 years. And then the question is: is that an acceptable rate of error? 
So then I was able to point to, that's the same as the standard that's used in Physic for scientific discovery, but watch out the Higgs Boson has now risen above 7 sigma so that looks safe but a 
video announcing a gravity wave discovery a year ago begins by knocking on the door of the cosmologist whose theory was supposedly verified and the guy says, &quot;It's 5 sigma&quot; but it 
wasn't. They made a systematic mistake in their modeling of intergalactic dust and the result is Physics Today said death <span class=GramE>knell <span 
style="mso-spacerun:yes">&nbsp;</span>for</span> their work in February.  So that went away, apparently. (19:40) </span></p>

<p><b>Kyle:</b> What sort of sigma value do you think we might achieve if we entered an actual algorithm in a tournament, and someone just read the moves directly off the computer?</p>

<p><span
><span
style="mso-spacerun:yes">&nbsp;</span><b>Ken:</b> Ah yeah! Then if the algorithm played over 200 moves I would be pretty confident of getting deviation <span class=GramE>above 5 sigma</span>. 
 Although it will be enough that wouldn't be perfect correspondence because my work does not try to forensically identify a particular algorithm. <span 
style="mso-spacerun:yes">&nbsp;</span>Instead it's testing for the general computer-like nature and the different chess programs do not agree with each other. Moreover when they played by 
themselves they tend to get themselves into positions that have a lot more options, where even at their own level in their own projections of agreement rate would be closer to 50 percent than the 
over 60 percent that one would get for the same computers playing human games so that may even make their agreement rates look lower. It's definitely a complication for my model that the computer 
programs don't agree with each other to such an extent. It imposes upper limits on the sensitivity </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Sure </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> But it does seem that I get... well
the policy of the Z-score above 2.75 in my work as a commission member on the world's chess federation and with the new regulations that was approved last year, z-score of 2.75 is enough to claims 
statistical support in a case where there is independent evidence and z-score above 4.0 is enough to open an inquiry. We don't however though have to write of judgment for 5.0. (21:30) </span></p>

<p><span
>We backed off that because a lot of
people are understandably uncomfortable with using statistic to past judgment, statistic alone. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Yes, I'm <span><span
class=GramE>gonna</span></span> link to the <a href="http://www.chessprofessionals.org/content/open-letter-kenneth-w-regan-cheating-chess">open letter on chessprofessionals.org</a>. That should 
mention and it sounds like <span class=GramE>the ah</span>... </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> It's January 2013. Yeah! Well
a lot happened since then. </span></p>

<p><span
>So what happened is there were more
incidents in the spring of 2013, including a junior player being caught with the cellphone in a loo and in a rust by his opponent who happened to be beyond a Romanian National soccer team. And the 
World Chess Federation realized that isn't just an Association of Chess Professionals matter, this affects the entire game something needs to be done. So to their great credit they put resources 
and convened commission. And one of the things we did oddly enough actually was we loosened a reaction requirement that we feel have been <span class=GramE>to</span> strict about completely 
banning cellphones from playing halls. We put other rules into to make sure so player will not be able to walk around with cellphones during the games. Or have them in their pockets where one 
player was caught getting buzzes from the cellphone on his thigh that he could decode. So you're not allowed to have the cellphone on your person during a game. But we don't want to completely 
inconvenience people by not making them able to have the cellphones with them because it might be coming from work and my not have a car that they could stow or room that they can stow the 
cellphone in. </span></p>

<p><span
>So I became active with the
committee and our committee really constitutes itself in terms of operation this year. And I'm right now writing a formal report on one case while dealing with several others which actually though 
they are furnishing more input into my new system using multiple programs and showing how consistent they are with each other.  </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Very neat. So I would guess
going back to some of the different algorithms, you know they can each have different databases that they're accessing in terms of finishing moves or slightly different pruning strategies or may 
be heuristics baked in that account of some of the differences but I was really fascinated by the point you made that they tend to play with many more opportunities open at the same time. Do you 
think that's the defining characteristic of computer vs. human play: the ability to balance so many independent strategies? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> It might be... it's certainly... in
practice gives me a 5 percent margin. I analogize that to the idea that computers play the role of Spock to our Kirk like in a star trek episode. You know McCoy and Kirk want to go in an 
intervening ride right away but Spock's caution make hold it. I think that that's actually I'd like to see that in large into a useful personality aspect of personal digital assistance in general 
that they are not there to make up our mind for us but rather that to show us the option </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Yeah </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> But yes... That is a... that
more way to see is a definite property of computer games on balance they take longer and that they don't have early crisis as quickly as human games do. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> I'm a relative to chess novice.
Let's say for some reason I decided to dedicate myself to the game and I started playing 10 hours a day, six days a week. But rather than studying by you know reading classics, looking a classic 
games and books and things, I chose to develop my craft strictly by playing against the best algorithms that are out there. Do you think I would develop a style of play that could have a false 
positive in your detection? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Well, I'm fielding exactly
this question on Facebook from someone like within the past hour. Okay, it's a common point, it is quite possible that players have become more computer-like and not might even be reflected like 
slight increase in overall quality that I'm registering within the past 10 years. But I don't think you're... I've yet to see a demonstration that someone can become really adept at the game 
solely by playing with the computer. For players under two thousand what is said to develop your skill the most is <span class=GramE>pattern <span 
style="mso-spacerun:yes">&nbsp;</span>recognition</span> of positions and their tactics which you can get by playing over famous games like you know, like the games played by the Russians in the 
50s and 60s are great for this. And I agree with the contention of a documentary, &quot;<a href="http://topdocumentaryfilms.com/my-brilliant-brain-make-me-genius/">My Brilliant Brain</a>&quot; by 
the BBC and National Geographic featuring women's world champion, <a href="https://chessdailynews.com/chess-girls/">Susan <span class=SpellE>Polgar</span></a>. That it is the face recognition, and 
pattern recognition parts of the brain that are activated most when playing chess.  So it's going over computers is going to promote this ability, but it 
comes from seeing the patterns, I think, rather than contending against the algorithm. And up to 2000 level people are saying it's more important to understand the basic tactical patterns or 
tactical quizzes. You know, flash a whole page of black to move and win and that is the best way to improve. And then, when you get over expert level then <span class=GramE>the <span 
style="mso-spacerun:yes">&nbsp;</span>deeper</span> parts of strategy fill in. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> So I would imagine it's only
really been possible to cheating in this way in perhaps the last 15 years when the algorithm got to the right level and even the ability to kind of, well, we cellphones quite the same way on the 
90's but now we have very small on our pockets.  I guess there were some situations that the players are getting a buzzing to indicate the move... 
</span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Yes, there's a meme that your <span
class=SpellE>iPad</span> now has the power of the world's top supercomputer from 1994.  </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> <span>Ahahaha</span> </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> I don't know that's quite true,
but it's a meme anyway. So yes that's the problem.  Actually 20 years ago there was perhaps what was intended as a proof of concept at the world open. A 
player was given the name John Von <span>Neuman</span>, the name of a famous computer pioneer and had a computer in his shoe and he was caught while the tournament was going on. He was able to I 
think defeat or draw against one master rated player and I can say various more things about it, but that <span class=GramE>and  another</span> case in 
the 90's are considered to be the beginning. But the real beginnings were whispers against the Bulgarian Grand master <a 
href="http://www.buffalo.edu/ubreporter/archive/2012_04_12/chess_regan">Veselin <span>Topalov</span></a> in the candidate's tournament for the world championship in 2005 allegations which my work 
does not support and then in the ensuing world championship match in 2006 against the Russian Vladimir <span class=SpellE>Kramnick</span>, <span>Topalov</span> himself with accusation of cheating 
based on the coincidence of moves with the then leading program <a href="http://en.chessbase.com/post/what-s-new-about-fritz-9-engine-">Fritz 9</a> which is manufactured by chess base. <span 
style="mso-spacerun:yes">&nbsp;</span>So <span>Topalov's</span> <span class=GramE>manager Silvio <span>Danailov</span> release</span> an accusing letter sighting coincidence statistics but not 
giving any methodology. Now I actually know that he use a flawed methodology to generate that. I tried reproducing the result independently and 4 the 5 games I didn't but on the 2nd game of that 
match where <span>Tupalov</span> was wining brilliantly but then lost his way and eventually lost the game, something which really must have upset him. I do get it on the 2nd half of the game 
reproducibly with 2 different programs, <a href="http://www.rybkachess.com/"><span class=SpellE>Rypka</span></a> and Fritz, Vladimir <span><span class=GramE>Kramnick</span></span><span 
class=GramE>  matches</span> over 90 percent which is unheard of human percentage in general, but the reason is, the explanation I found is that most of 
<span>Kramnik's</span> moves were absolutely forced: first to stay in the game and later the only way to keep his advantage. And that lead to statistical principle that I talked about earlier and 
basically all of my in <span class=GramE>depth work</span> with the training data and the <span>numerics</span> and the model development have been just quantifying this all important qualitative 
principle. </span></p>

<p><span
><b>Kyle:</b> Yeah, that's (30:00) a really
an important distinction. I'm really appreciative that's in your model.  </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> It's like with ERA. You look
at baseball pitcher's ERA and you think oh, there all the same, or whatever.  But if one pitcher is pitching in a Wrigley Field with the wind blowing out 
and the other pitcher is pitching in Atlanta on a clammy day, that makes a different in the expected number of runs. So I'm basically finding which way the wind is blowing in the chess positions 
by using a deep computer analysis in a fight fire with fire kind of way. </span></p>

<p><span
><b>Kyle:</b> So I certainly wouldn't ask
you any names if you didn't want to or to slander anyone but speaking broadly do you think there's an undetected problem of cheating or are these isolated cases? </span></p>

<p><span
>Kenneth: I still think there are
isolated cases. I mean there was <a href="http://www.telegraph.co.uk/culture/chess/11531055/Grandmaster-makes-bad-move-after-being-caught-cheating-at-chess-in-a-lavatory.html">an article daily 
telegraph two weeks ago with the British grandmaster saying that chess is really with cheating</a>. I've not seen that evidence. I mean as was voiced in this case over the weekend you know people 
say acknowledge, yeah, there is a lot of paranoia about it. It is also true I must acknowledge that if a player is disciplined enough to do what is called "smart cheating", cheating only on a few 
moves over game, my stats are not going to detect that. The point though is that the discipline is an added burden on top of cheating itself. Are there lots of smart cheaters out there? I've yet 
to see any credible anecdotal reports, any observation of something, anything beside people saying, &quot;Oh this guy has an unbelievable result, here are 10 moves that match in a row in a game." 
I mean, I do routine screening of all the tournaments and I there a lot of cases of players feeling off 10 straight matches to the computer or more but there are other patterns that do need 
further investigations and the question is you know judging the frequency is excessive or not well that's a further determination to make. </span></p>

<p><span
><b>Kyle:</b> So I'm curious to understand
a little bit more from your perspective why chess has become such as interesting and why it's called an unsolved puzzle? We've been playing it for centuries and from what I understand the skill of 
play has evolved: we're getting better and better at the game. What makes it so complex a game?  In a way it's a really simple game, children, as you 
learned, maybe not all children learn or achieve the level that you achieved, but children can learn the rules and play the games mechanically speaking. <span 
style="mso-spacerun:yes">&nbsp;</span>How is that a challenging game emerges out of these simple rules? </span></p>

<p><span
><b>Ken:</b> Well that's true; here is
where my main professional field of computational complexity theory has an input. In a generalized format where the board could be arbitrarily large and the armies could scale up too, determining 
which side has the advantage in chess in a given positions is what called a <a href="http://en.wikipedia.org/wiki/PSPACE-complete">polynomial space complete problem</a>. In fact actually if you 
remove something called the fifty-move-rule, then it will be jumps up to be an <a href="http://en.wikipedia.org/wiki/EXPTIME">exponential time complete problem</a> where we definitely know there 
is no efficient algorithm to make a fool proof determination. Polynomial space complete is a level above <a href="http://en.wikipedia.org/wiki/NP-hard">NP-hard</a>, so if you've heard about 
NP-hard and NP-complete problems, like <a href="http://math.stackexchange.com/questions/1077436/the-traveling-salesman-problem-is-np-complete-reduction">traveling sales person problem</a> or <a 
href="http://marioslapseofreason.blogspot.com/2010/11/show-that-tautology-co-np.html">tautologies in logic</a>, chess is apparently harder than that.  So 
there's a great kernel of complexity and yes the complexity comes about from a very simple specification, a universal pattern in my professional field. </span></p>

<p><span
>So the thing about what makes chess
appealing is that along with the relative simplicity of the rules and complexity that develops is <span>alot</span> beauty. You can storm the King's fortress; it's analogous to battle. The game 
could be really exhilarating to play especially when you're under attack and able to pull up a heroic defense.  Some of the most enjoyable times, even if 
you go down in flames and lose, sometimes you will enjoy the way that you were able to defend and in fact actually at a game in the European Championship in Jerusalem in February one of the most 
brilliant conception of all time happened where a player just nonchalantly moved his king and let the opponent capture a Rook with check. It even looks like he accidentally touch his king and had 
to been touched moved but it was on purpose and the other guy he took the rook and then after the other guy that tucked his king up once square, it was close enough to be affecting an attack 
against his own king and the guy just had some queens and some pawns against the other guy king, queen, and rook and yet the other guy couldn't get out and it was turned into a brilliant victory. 
So things like that in the lore of chess books make it a storied and beautiful game.  </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Very neat yeah! So I know we
may lose a few of my listeners as we get into some of the deeper topics, and sort of gradate level topics here, but I've always have a passion for <a 
href="http://homepages.cwi.nl/~paulv/kolmogorov.html">Kolmogorov Complexity</a> and I hope to actually cover a little bit detail on the show and I was curious if you could share how that relates 
to some of your work with chess. </span></p>

<p> <span><b>Ken:</b> Well it's interesting enough. This is technically separate from my cheating works. All chess programs share many common feature of the type of algorithm for board 
representations and they all use a hashing scheme for chess positions. They don't store the chess position in the form <span class=GramE>of<span>&nbsp; 
</span>knight</span> is on s3, king is on g1, pawn is on h6 etc. Instead what they do is they break a chess position down into a code of <span class=GramE>under</span> 30 bits. You first allocate 
primary code of 64 bits each for any combination of one of the 6 white to 6 black <span class=GramE>type</span> of chess pieces on the 64 squares. And then you just add up MOD 2, those vectors, 
and take 25 or so bits off the end depending on how large <span class=GramE>a hash table</span> you'll allocated. Now, that's a lot of redundancy. Different position will have the same code and 
that could confuse the program but in critical points of any given search it rarely get confused and one I'm interested in is the Kolmogorov Complexity of those bits that are use to initialize the 
hashing scheme and whether there is a demonstrable difference in behavior depending whether the 50,000 needed bits are generated truly randomly from atmospheric noise that <a 
href="https://www.random.org/">random.org</a> or <a href="https://www.fourmilab.ch/hotbits/"><span>hotbit</span> service</a> or whether they're done pseudo randomly as the programs tend to do and 
that makes a big change on their Kolmogorov Complexity. So on the <span class=SpellE>G&ouml;del's</span> Lost Letter blog I wrote a post titled <a 
href="https://rjlipton.wordpress.com/2012/05/04/digital-butterflies-and-prgs/">Digital Butterflies</a>, because I also show a digital butterfly effect, where I can reproduce a mistake that chess 
programs make owing to hash conditions. I can isolate it to the size of the hash table and other factors and the question is whether if this kind of difference can be harness in large scale to 
tell whether 50 thousand bits are random or pseudorandom. </span></p>

<p><span
><b>Kyle:</b> How Interesting... </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> You can find that by just <span
class=SpellE>googling</span> the term digital butterfly and lost letter that's an article wrote 3 years ago. It references <a 
href="http://programmingpraxis.com/2010/10/05/george-marsaglias-random-number-generators/">George <span>Marsaglia</span> who discovered flaws in the theorem of the generators</a> were used in the 
1960 showing that when their alpha was plotted in 3 dimensions, they have 2 dimensional unwanted irregularities.  </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Interesting! Yeah I'll be
sure to link to that in the show as well. So just on the chance that there's a chess cheater listening <span class=GramE>who's</span> hearing about your work for the first time... How nervous 
should they be getting? </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> Well, I wouldn't want them to
be <span class=GramE>nervous ,</span> I'd want them not to cheat. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Aha, good point. </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> I'm hoping that the idea there
are sophisticated techniques beyond what they might be thinking about will make people pause &#8211; a <span>deterence</span> effect.  </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Absolutely </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> One of the other things is
during the year 2007 - 2011 they really were no positive cheating cases. There are couples of negative one where I gave the usual explanation. And my work deepen into study of human cognition and 
<span class=GramE>decision making</span> and trying to branch out to things like studying the difficulty of test taking.  How can you judge the 
difficulty of the test? I can judge the difficulty of chess decisions and then can I transfer the distributional patterns that result?  So there's a 
large component of my work that is developing human vs. computer cognitive differences and you can try then a website of a paper from last summer's multi-disciplinary preferences workshop 
associated to AAAI 2014 in Quebec City that detail some of these [<a href="http://www.cse.buffalo.edu/~regan/papers/pdf/RBZ14aaai.pdf">Human and Computer Preferences at Chess</a>]. And even one 
result that isn't in that paper shows that if you have a lot of data, even just 200th of a pawn difference between move is enough for more humans to select the better of the two moves. Differences 
that would seem inconsequential if you're just talking about one game really do pan out <span class=GramE>over a thousands</span> of positions. </span></p>

<p><span
><b>Kyle:</b> Interesting. So before I ask
you kind of the final question that I actually want to go back to one topic. To my understanding, there was a case when you were tracking a potential threat of cheating. And it was actually a 
power outage that stood in the way of communicating so would you mind sharing that story? </span></p>

<p><span
> </span></p>

<p><span
>Kenneth: That, yes. So that was
during... what I was saying about I called <span>Topalov</span>/<span class=SpellE>Kramnik</span> match.  Before that match finished, I was all set with 
my conclusions of saying, these games were forcing, <span class=GramE>it</span> was an illusion. And I was on the server run by chess phase: I commentary privileges there. So for the last day on 
Friday, October 13, 2006, I was <span><span class=GramE>gonna</span></span> go on line and trod out my conclusions one chat line at a time and say: There was no good scientific methodology and 
there was gamesmanship, I was loaded for bear.  But, the night before was the Buffalo winter October storm, and it knocked out power.<span 
style="mso-spacerun:yes">&nbsp; </span>I was bailing basements... </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> Oh no. </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> <span class=GramE>Ours and
neighbors</span> and by the time power was restored in the next week, <span class=SpellE>Kramnick</span> won the playoff so there was no harm, no foul. And there wasn't so much in need for my 
input. So that again, I went back to quietly developing my work. </span></p>

<p><span
> </span></p>

<p><span
><b>Kyle:</b> I like to wind up my shows by
asking my guess for two recommendations. The first I called the benevolent recommendation, a nod to a book or research paper or website that you think the listeners would find interesting. The 
second being the self-serving recommendation, hopefully something that you get direct benefit out of from appearing here. </span></p>

<p><span
> </span></p>

<p><span
><b>Ken:</b> So for a book, I would
recommend any of various books that are about the public awareness of statistics. So not just public awareness of science; and I can think of Jordan <span class=SpellE>Ellenberg's</span> <a 
href="http://www.jordanellenberg.com/how-not-to-be-wrong/">How Not to Be Wrong</a> and the book <a href="http://www.amazon.com/Naked-Statistics-Stripping-Dread-Data/dp/1480590185">Naked 
Statistics</a>. </span></p>

<p><span
>And also Nate Silver's book <a
href="http://www.amazon.com/The-Signal-Noise-Predictions-Fail-but/dp/0143125087">'The Signal and the Noise'</a> which is maybe at a higher level. And if you <span class=SpellE>wanna</span> play 
chess, there's a chess book I recommend called <a 
href="http://www.amazon.com/Invitation-Chess-Irving-Chernev/dp/0671212702/ref=sr_1_1?s=books&amp;ie=UTF8&amp;qid=1432223389&amp;sr=1-1&amp;keywords=An+Invitation+to+Chess">An Invitation to 
Chess</a> by <span>Chernev</span> and <span class=SpellE>Harkness</span> &#8211; old, but good &#8211; comes in and out of print. But it's the <span class=GramE>book that most smoothly take</span> 
few from absolute beginner to appreciating some points of strategy and even a beauty. And for the self-serving recommendation of course, the blog </span><a 
href="http://rjlipton.wordpress.com">G&ouml;del's Lost Letter and P=NP</a>
</p>

<p><span>For understanding some of the
caveat of my chess work, I recommend my post on that blog titled <a href="https://rjlipton.wordpress.com/2013/09/17/littlewoods-law/"><span class=SpellE>Littlewood's</span> Law</a> and <a 
href="https://rjlipton.wordpress.com/2013/07/27/thirteen-sigma/">13 Sigma</a> from two years ago. <span>LIttlewood's</span> law being the realization that if you define a miracle as a million to 
one event, well, we have a million waking seconds every month and notice something every second so therefore everybody can say they see a miracle every month. Well, cause it says you know how's 
selected what kind of miracle. That's where things get deeper. But that's my main caveat article against reading too much into unusual occurrences that I find all the time from screening chess 
games. So the blog would be, and also my website at Buffalo, just <span>google</span> my name and Buffalo and you'll find it. </span></p>

<p><span
><b>Kyle:</b> Excellent! And I'll link to
all that in the show notes. Well lastly, if anyone wants to follow the ongoing saga of claim to cheating and the statistical analysis of such claims. Where is the best place they can kind a keep 
up on the latest and greatest? </span></p>

<p><b>Ken:</b> Well, yeah, we don't make it very public. So then, I have to say my website there's a closed facebook groups which talks about individual 
developments but... my website paper and that's actually a very good paper by David Barnes whose a known Java textbook author and Julio Fernandez Castro <a 
href='https://kar.kent.ac.uk//44719/1/1-s2.0-S0167404814001485-main.pdf'>[link]</a> in the journal of security on caveats of cheating testing, all of which, I mean my reaction is just "amen".<span 
style="mso-spacerun:yes">&nbsp; </span>They mention <span class=GramE>me and they</span> don't intend give the impression that they aare criticizing my work, it might come off that way. But my 
reaction is just "aamen". These were the reasons why I separate the screening from the full test. But it points out a lot of the caveat very well. So that's an independent source for me that's 
good to read about the general problem and they even said it on the context of cheating detection in online games which is a potential branching out application. </span></p>

<p><span
><b>Kyle:</b> Really cool. Well thank you
once again for coming in the show Dr. Regan. These have been really fun for me and I appreciate your time. </span></p>

<p><span
><b>Ken:</b> Thank you very much. </span></p>

</blockquote>

<? include("../footer.php"); ?>
