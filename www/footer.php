<?
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (startsWith($actual_link, "http://dataskeptic.com/epnotes/") || startsWith($actual_link, "http://dataskeptic.com/blog/") || startsWith($actual_link, "http://dataskeptic.com/events/")) {
?>
<div class="fb-comments" data-href="<? echo($actual_link); ?>" data-numposts="5" data-colorscheme="light"></div>
<?
}
?>
</div> <!-- inner -->
<div id="guesttweet">
<u><B>Recent tweets from guests</b></u><br/>
<? include("twitter.htm"); ?>
</div>


<div class="clear"></div>
</div> <!-- cols -->
<div class="clear"></div>

</div> <!-- main -->

<div class="clear"></div>

<div id="footer">
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51062432-1', 'dataskeptic.com');
  ga('send', 'pageview');

</script>

</BODY>
</HTML>
