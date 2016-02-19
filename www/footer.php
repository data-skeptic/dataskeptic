<?php
  if (strpos($_SERVER['REQUEST_URI'], "epnotes") !== FALSE || strpos($_SERVER['REQUEST_URI'], "blog") !== FALSE || strpos($_SERVER['REQUEST_URI'], "home-sales") !== FALSE) {
        ?>
        <audio src="<? echo($url); ?>" preload="auto" />
        <?
	echo("<br/><br/></div><div>");
	include("../comments.php");
  }
?>
	</div>
	<div id='footer'>
		<hr/>
		<?php if (isset($license)) { ?>
		<a href='https://creativecommons.org/licenses/<? echo($license); ?>/4.0/'><img src='/<? echo($license); ?>.png' height=25 /></a>
		<?php } else { ?>
		<a href='https://creativecommons.org/licenses/by-nc-sa/4.0/'><img src='/by-nc-sa.eu.png' height=25 alt="Data Skeptic is released under a creative commons attribution non-comercial share alike 4.0 license" /></a>
		<?php } ?>
	</div>
</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51062432-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
