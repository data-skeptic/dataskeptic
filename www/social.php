<? include("header.php"); ?>

<?
  $data = file_get_contents('tweets.json');
  $json = json_decode($data, true);
?>

<div id="bbody">

<h1>Interesting links found on twitter</h1>
<table cellpadding=5>
  <tr>
    <td>Posted by</td>
    <td>Link</td>
  </tr>
<?
  foreach ($json as $link) {
    echo("<tr>");
    echo("<td valign=top><a href='http://twitter.com/" . $link['acnt'] . "'>@" . $link['acnt'] . "</a></td>");
    echo("<td valign=top><a href='" . $link['url'] . "'>" . $link['anchor'] . "</a></td>");
    echo("</tr>");
  }
?>
</table>

</div>

<? include("footer.php"); ?>

