<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sasquatch Footprints — How big are they?</title>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.ui.core.min.js"></script>
		<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
		<script type="text/javascript" src="jquery.ui.mouse.min.js"></script>
		<script type="text/javascript" src="jquery.ui.draggable.min.js"></script>

		<!-- wColorPicker -->
		<link rel="Stylesheet" type="text/css" href="wColorPicker.css" />
		<script type="text/javascript" src="wColorPicker.js"></script>

		<!-- wPaint -->
		<link rel="Stylesheet" type="text/css" href="wPaint.css" />
		<script type="text/javascript" src="wPaint.js"></script>

		<!--  STYLE SHEETS  -->
		<link rel="stylesheet" type="text/css" href="bfStyles.css" />
	</head>
	
	<body>
		<div id="wrapper">
			<div id="content" class="cf">
				<header>
					<a href="/" alt="The Data Skeptic Podcast"><img src="DSlogo_white.png"></a>
					<h1>Crypto</h1>
				</header>

				<div id='mmain'>

					<h2>Transcript</h2>
					<span class='wbcktxt'>

http://discovertheodds.com/what-are-the-odds-of-being-struck-by-lightning/

					</span>

				</div>
			</div>
		</div>
		<footer>
			<ul>
				<li><a href="/">DataSkeptic Podcast</a></li>
				<li><a href="../episodes.php">Show Notes</a></li>
				<li><a href="../blog.php">Blog</a></li>
				<li><a href="../resources.php">Resources</a></li>
				<li><a href="../contact.php">Contact</a></li>
			</ul>
		</footer>
		<script type="text/javascript">
			function dataURItoBlob(dataURI) {
			    // convert base64/URLEncoded data component to raw binary data held in a string
			    var byteString;
			    if (dataURI.split(',')[0].indexOf('base64') >= 0)
			        byteString = atob(dataURI.split(',')[1]);
			    else
			        byteString = unescape(dataURI.split(',')[1]);

			    // separate out the mime component
			    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

			    // write the bytes of the string to a typed array
			    var ia = new Uint8Array(byteString.length);
			    for (var i = 0; i < byteString.length; i++) {
			        ia[i] = byteString.charCodeAt(i);
			    }
			    return new Blob([ia], {type:mimeString});
			}


			var wp = $("#wPaint").wPaint({
				strokeStyle: '#000000',
				drawDown: function(e, mode){ $("#canvasDown").val(this.settings.mode + ": " + e.pageX + ',' + e.pageY); },
				drawMove: function(e, mode){ $("#canvasMove").val(this.settings.mode + ": " + e.pageX + ',' + e.pageY); },
				drawUp: function(e, mode){ $("#canvasUp").val(this.settings.mode + ": " + e.pageX + ',' + e.pageY); }
			}).data('_wPaint');
				
			function saveImage() {
				var imageData = $("#wPaint").wPaint("image");
				$("#canvasImage").attr('src', imageData);
				$("#canvasImageData").val(imageData);
			}

			function clearCanvas() {
				$("#wPaint").wPaint("clear");
			}
				
			function upload_image(id) {
				var imageData = $("#" + id).wPaint("image");
				var email = $('#email').val();
				var prob = $('#prob').val();
				var blob = dataURItoBlob(imageData);
				var fd = new FormData();
				fd.append('file', blob);
				$.ajax({
					url: 'hello.py/post_img?email=' + email + "&prob=" + prob,
					type: 'POST',
					data: fd,
					async: false,
					cache: false,
					enctype: 'multipart/form-data',
					processData: false,
					contentType: false,
					success: function(data) {
						alert('Thanks for participating');
						clearCanvas();
					}
				});
			}

			$.extend($.fn.wPaint.defaults, {
			  mode:        'pencil',  // set mode
			  lineWidth:   '3',       // starting line width
			  fillStyle:   '#FFFFFF', // starting fill style
			  strokeStyle: '#000000'  // start stroke style
			});
		</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51062432-1', 'dataskeptic.com');
  ga('send', 'pageview');

</script>

	</body>
</html>
