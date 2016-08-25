<? include("header.php"); ?>
<?
  $skip = $_GET['skip'];
  $feed = 'feed.rss';
  $posts = processRss($feed);
?>

<script>
function OpenInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}
</script>


<div id="bbody">

<style>

.radio-custom {
    opacity: 0;
    position: absolute;
}

.radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}

.radio-custom-label {
    position: relative;
}

.radio-custom + .radio-custom-label:before {
    content: '';
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    height: 20px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 50%;
}

.radio-custom:checked + .radio-custom-label:before {
    background: #ccc;
    box-shadow: inset 0px 0px 0px 4px #fff;
}

.radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}
</style>

<h1>All Data Skeptic episodes</h1>

<?
/*
  $start = 2014;
  $end = date("Y");
  for ($y=$start; $y <= $end; $y++) {
    echo("<div><input id='radio-$y' class='radio-custom' type='checkbox' checked><label for='radio-1' class='radio-custom-label'>$y</label></div>");
  }
*/
?>

<script>
function update() {
  if ($("#radio-1").is(":checked")) {
    $(".interviewep").show();
  } else {
    $(".interviewep").hide();
  }
  if ($("#radio-2").is(":checked")) {
    $(".miniep").show();
  } else {
    $(".miniep").hide();
  }
  if ($("#radio-3").is(":checked")) {
    $(".specialep").show();
  } else {
    $(".specialep").hide();
  }
}
$("#radio-1").change(function() {
  update();
});
$("#radio-2").change(function() {
  update();
});
$("#radio-3").change(function() {
  update();
});

$(document).ready(function() {
})
</script>


<?
  $showonce=0;
  $i = count($posts);
  $max = 999999;
  foreach ($posts as $post) {
    if ($max <=0) {
      continue;
    }
    $max--;
    $posixTime = strtotime($post['pubDate']);
    $y = date('Y', $posixTime);
    if (strpos($post['title'], "[MINI]") !== false) {
      $typ = "mini";
    } else {
      $typ = "main";
    }
    echo("<div class='ep $typ $y'");
    echo(">");
    $link = $post['link'];
    $img = $post['img'];
    if ($i <= 64) {
      if ($img == 'http://static.libsyn.com/p/assets/2/9/3/8/2938570bb173ccbc/DataSkeptic-Podcast-1A.jpg') {
      }
    }
    echo("<table><tr><td valign=top><img src='" . $img . "' width=150 /></td><td valign=top>");
    if (strpos($link, '/epnotes/') !== FALSE || $i==64) {
      echo("<h2><a href='$link'>#" . $i . ": " . $post['title'] . "</a></h2>");
      $tfile = substr($link, strpos($link, '/epnotes/')+9, strlen($link));
    }
    else {
      echo("<h2>#" . $i . ": " . $post['title'] . "</h2>");
      $tfile = "";
    }
    $i -= 1;
    $url = $post['a_url'];
    echo("<b>Posted:</b> " . date('Y-m-d', $posixTime) . "<br/>");
    echo("<b>Duration:</b> " . $post['itunes:duration'] . "<br/>");
    echo("<b>Direct Download:</b> <a href='" . $url . "'>" . str_replace("http://traffic.libsyn.com/dataskeptic/", "", $url) . "</a><br/>");
    echo("<b>Open in new window:</b> <a href='#' onclick=\"OpenInNewTab('listen.php?title=" . urlencode($post['title']) . "')\">Listen</a><br/>");
    if (strpos($link, '/epnotes/') !== FALSE) {
      $ii = strpos($link, '/epnotes/');
      $transurl = "trans/" . $tfile;
//echo($_SERVER["DOCUMENT_ROOT"]);
      if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/" . $transurl) && $tfile != "") {
        echo("<b>Transcript:</b> <a href='" . $transurl . "'>here</a><br/>");
      }
    }
    echo("</td></tr></table>");
    $desc = $post['description'];
    $done = 0;
    if (strpos($link, '/epnotes/') !== FALSE) {
      $ii = strpos($desc, "<p");
      if ($ii !== false) {
        $jj = strpos($desc, "</p>", $ii);
        if ($jj !== false) {
          $kk = strpos($desc, "<p", $jj);
          if ($kk !== false) {
            $desc = substr($desc, 0, $jj + 4);
            $done = 1;
          }
        }
      }
      if ($done == 0) {
        $ii = strpos($desc, "<br>");
        if ($ii !== false) {
          $desc = substr($desc, 0, $ii);
        }
      }
	  
	  
      //echo preg_replace('/[[:^print:]]/', ' ', '%' + strip_tags($desc));
      echo(strip_tags(preg_replace('/[[:^print:]]/', ' ', $desc)));
      echo("<p><a href='$link'>read more...</a></p>");
    }
    else {
     echo preg_replace('/[[:^print:]]/', ' ', $desc);
    }
    echo("</div><br/>");
  }
?>
</div>

<? include("footer.php"); ?>

