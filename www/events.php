<? include("header.php"); ?>

<div id="bbody">

<h1>Events</h1>
<p>Please come by and introduce yourself if you're at one of these events.</p>

<div id="events"></div>

<br/>
<br/>

<h1>Select Past Events</h1>
<div id="past"></div>


<!--
Event	Event Link	Title	Slideshare	Address	Date
St. Mary's College Business Analytics class	-	Presenting Data Science to non-technical Decision Makers		St. Mary's College	5/21/16
NSF Discussion					
CIO Magazine	http://www.cio.com/article/3086896/hiring/how-to-hire-for-the-right-big-data-skill-set.html				
-->

<script>
function render_event(container, event) {
  $(container).append("<h2>" + event['title'] + "</h2>")
  $(container).append("<p>On " + event['date'] + " at <a href=\"" + event['url'] + "\">" + event['title'] + "</a></p>")
  var loc = event['location']
  if (loc != "") {
    $(container).append("<a href=\"https://www.google.com/maps/search/" + encodeURIComponent(loc) + "\">" + loc + "</a>")
  }
  $(container).append("<hr/>")
}

$(document).ready(function() {
  events = [
    {
      'title':      'A Data Skeptic and the Bible Code',
      'conference': 'Conspiracy Skeptic Podcast',
      'location':   '',
      'date':       '2014-08-21',
      'url':        'http://www.yrad.com/cs/'
    },
    {
      'title':      'How to Lie with Data, and How a Skeptic Can Recognize Deception',
      'conference': 'SkeptiCamp Monterey',
      'location':   '1364 Fremont Blvd, Seaside, CA, 93955',
      'date':       '2015-01-03',
      'url':        'http://lanyrd.com/2015/skepticamp/'
    },
    {
      'title':      'Big Data Analytics Trends',
      'conference': 'Open Data meetup',
      'location':   '400 N Brand Blvd, Glendale, CA 91203',
      'date':       '2015-03-18',
      'url':        'http://www.meetup.com/RMDS_OD/events/220763867/'
    },
    {
      'title':      'Geographic Analysis of Los Angeles',
      'conference': 'DataScience Workshop',
      'location':   '200 Corporate Pointe Walk, Culver City, CA 90230',
      'date':       '2015-05-22',
      'url':        'https://www.youtube.com/watch?v=zZ0A8J74-d8'
    },
    {
      'title':      'Applications of the Apriori Algorithm on Open Data',
      'conference': 'Big Data Day LA',
      'location':   '12575 Beatrice St, Los Angeles, CA 90066',
      'date':       '2015-06-27',
      'url':        'http://bigdatadayla.org/'
    },
    {
      'title':      'Data Scientists',
      'conference': 'Career 100 Podcast',
      'location':   '',
      'date':       '2015-10-17',
      'url':        'http://www.stitcher.com/podcast/career-100-podcast-with-felicia-gopaul'
    },
    {
      'title':      'Key Strategies for Effectively Managing Data Science Teams',
      'conference': 'IBM Insights',
      'location':   '3950 S Las Vegas Blvd, Las Vegas, NV 89119',
      'date':       '2015-10-27',
      'url':        'http://www-01.ibm.com/software/events/insight/'
    },
    {
      'title':      'Data Skepticism in Personalization',
      'conference': 'Personalization Podcast',
      'location':   '',
      'date':       '2016-02-04',
      'url':        'http://personalizationpodcast.com/post/episode-4/'
    },
    {
      'title':      'A Skeptic\'s Perspective on Artificial Intelligence',
      'conference': 'Bay Area Skeptics Meetup',
      'location':   'La Peña Cultural Center, 3105 Shattuck Avenue, Berkeley',
      'date':       '2016-03-10',
      'url':        'http://www.meetup.com/skeptics-147/events/229353628/'
    },
    {
      'title':      'Data Science JumpStart Program',
      'conference': 'UCLA Career Center',
      'location':   'UCLA',
      'date':       '2016-05-16',
      'url':        'http://www.career.ucla.edu/Student/Events/The-JumpStart-Series'
    },
    {
      'title':      'The Evolving Data Science Landscape',
      'conference': 'Big Data Day LA',
      'location':   'West LA College',
      'date':       '2016-07-09',
      'url':        'http://www.bigdatadayla.com/'
    },
    {
      'title':      'Hacking Machine Learning Algorithms',
      'conference': 'The Eleventh Hope',
      'location':   'Hotel Pennsylvania, 401 7th Ave, New York, NY 10001',
      'date':       '2016-07-09',
      'url':        'https://hope.net/index.html'
    },
    {
      'title':      'Data Science and Goodhart\'s Law',
      'conference': 'Domino Data Science Popup',
      'location':   'Fullscreen HQ, 12180 Millennium Dr, Los Angeles, CA 90094',
      'date':       '2016-09-14',
      'url':        'https://www.eventbrite.com/e/domino-data-science-popup-in-los-angeles-tickets-26034900087'
    },
    {
      'title':      'A Skeptic\'s Perspective on Artificial Intelligence',
      'conference': 'meetup',
      'location':   'Harry\'s Hofbrau, 390 Saratoga Ave, San Jose, CA 95129',
      'date':       '2016-09-21',
      'url':        'http://www.meetup.com/Atheist-Community-of-San-Jose/events/233069768/'
    },
    {
      'title':      'Common Errors in Machine Learning',
      'conference': 'SoCal Data Science Conference',
      'location':   'University of Southern California RTCC Ballroom',
      'date':       '2016-09-25',
      'url':        'http://socaldatascience.org/'
    }
  ]
  $.each(events, function(i, event) {
    if (new Date(event['date'] + " 23:59") > Date.now()) {
      render_event("#events", event)
    } else {
      render_event("#past", event)
    }
  })
})
</script>

<!--
<table id="myTablez" class="tablesorter">
<tr><td><b>Event:</b></td><td><a href="http://dataskeptic.com/events/20140103_How-to-Lie-with-Data.php">"How to Lie with Data, and How a Skeptic Can Recognize Deception"</a> at 
<a href="http://lanyrd.com/2015/skepticamp/">SkeptiCamp Monterey</a></td>
<tr><td><b>Type:</b></td><td>Talk</td></tr>
<tr><td><b>Date:</b></td><td>2015-01-03</td></tr>
<tr><td><b>Location:</b></td><td><a href="http://maps.google.com/maps?q=1364+Fremont+Blvd,+Seaside,+CA,+93955">1364 Fremont Blvd, Seaside, CA, 93955</a></td></tr>
<tr><td><b>Time:</b></td><td>Between 10am and 5pm</td></tr>
<tr><td></td><td>I'll be giving a short talk covering a few fun examples of techniques that are used which appear to be data driven but actually
misrepresent the underlying thesis.  The talk will include some real world examples and some advice for how to be skeptical of dodgy data driven
arguments.</td></tr>
</table>
-->


</div>

<? include("footer.php"); ?>
