<?
  if (strpos($_SERVER['REQUEST_URI'], "epnotes") !== FALSE) {
        ?>
        <audio src="<? echo($url); ?>" preload="auto" />
        <?
  }
?>
	</div>
	<div id='footer'>
		<hr/>
		(c) 2015
	</div>
</div>
</body>
</html>
