<?
  $id = uniqid();
  if (isset($unique_player)) {}
  else {
?>
<script type="text/javascript" src="/jplayer/jquery.jplayer.min.js"></script>
<link type="text/css" href="/jplayer/jplayer.pink.flag.css" rel="stylesheet" />

<div id="jquery_jplayer_<? echo($id); ?>" class="jp-jplayer"></div>
<div id="jp_container_<? echo($id); ?>" class="jp-audio" role="application" aria-label="media player">
  <div class="jp-type-single">
    <div class="jp-gui jp-interface">
      <div class="jp-volume-controls">
        <button class="jp-mute" role="button" tabindex="0">mute</button>
        <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
      </div>
      <div class="jp-controls-holder">
        <div class="jp-controls">
          <button class="jp-play" role="button" tabindex="0">play</button>
          <button class="jp-stop" role="button" tabindex="0">stop</button>
        </div>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
        <div class="jp-toggles">
          <button class="jp-repeat" role="button" tabindex="0">repeat</button>
        </div>
      </div>
    </div>
    <div class="jp-details">
      <div class="jp-title" aria-label="title">&nbsp;</div>
    </div>
    <div class="jp-no-solution">
      <span>Update Required</span>
      To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
  </div>
</div>
</div>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#jquery_jplayer_<? echo($id); ?>").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            title: "<? echo($post['title']); ?>",
            mp3: "<? echo($url); ?>"
          });
        },
        cssSelectorAncestor: "#jp_container_<? echo($id); ?>",
        swfPath: "/jplayer",
        supplied: "mp3",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });
    });
  </script>
<?
  $unique_player = 0;
  }
?>
