<? include("header.php"); ?>

<div id="bbody">
<p>
Data Skeptic is a podcast that alternates between short mini episodes and longer interviews.
For the mini-episodes, Kyle and Linh Da explore basic data science concepts.
Longer interviews feature practitioners and experts on interesting topics related to data, all through the eye of scientific skepticism.
</p>

<? if (strtotime("now") < strtotime("3/12/2016")) { ?>
<div>
<h2>Live Events</h2>
<p>I'll be giving two talks in the bay area on March 10th and 11th, details below.</p>
<table>
  <tr>
    <td><i>Title:</i></td>
    <td>A Skeptic's Perspective on Artificial Intelligence</td>
  </tr>
  <tr>
    <td><i>Address:</i></td>
    <td><a href="https://www.google.com/maps/place/La+Pe%C3%B1a+Cultural+Center/@37.852834,-122.2658731,15z/data=!4m2!3m1!1s0x0:0xad75f442460279f8">La Pe&ntilde;a, 3105 Shattuck Avenue, Berkeley</a></td>
  </tr>
  <tr>
    <td><i>Datetime:</i></td>
    <td>7:30pm Thursday <b>3/10/2016</b></td>
  </tr>
  <tr>
    <td></td>
    <td>The past few decades have shown incredible progress in technology. Advancements in computer speed and storage have enabled impressive advancements like Google Search, voice recognition, facial recognition, and competitive machine players for games like Chess and Go. Today we own electronics that have certain features we appropriately call "intelligent", yet we do not (or is it not yet?) have artificial intelligence. Discussion of A.I. includes both good science and a lot of woo. This talk will explore what's likely, unlikely, possible, and science fiction. Further, this talk will comment on how a non-technical person can be appropriately skeptical without an advanced degree.</td>
  </tr>
</table>

<br/><br/>

<table>
  <tr>
    <td><i>Title:</i></td>
    <td>THIS EVENT WAS CANCELLED BY THE VENUE :( <strike>Clustering, beyond k-means</strike></td>
  </tr>
  <tr>
    <td><i>Address:</i></td>
    <td><strike>Silicon Valley Data Science - 150 West Evelyn Avenue #Suite 100, Mountain View, CA 94041</strike></td>
  </tr>
  <tr>
    <td><i>Datetime:</i></td>
    <td><strike>6:30pm Friday <b>3/11/2016</b></strike></td>
  </tr>
  <tr>
    <td></td>
    <td>
I'm so sorry for the last minute notification.  I was only notified that this event was going to be cancelled after releasing the last episode of
Data Skeptic, so I was unable to announce the cancellation on the show.  Given the short notice, I won't be able to secure an alternative venue
so I'm afraid I have to cancel thi Friday talk altogether.  Please come see my Thursday talk with the Bay Area Skeptics if you're available.
<strike>
      <br/><br/>
      <a href="https://www.eventbrite.com/e/kyle-polich-svds-clustering-beyond-k-means-registration-22583776684">Please register to get a ticket</a>.
      <br/><br/>
      K-means clustering is known to most data scientists because of it's unsupervised nature and ease of use in tackling clustering problems.  It is widely implemented in many languages, and generally painless to use.  Yet, without proper consideration for the workings of this algorithm, one can easily misunderstand it's output.  Further, there are a variety of other clustering algorithms that offer features k-means does not.  This talk is a survey of many clustering algorithms and a discussion about their proper use.
</strike>
    </td>
  </tr>
</table>
</div>
<? } ?>

<? include("mailinglist.php"); ?>

</div>

<? include("footer.php"); ?>
