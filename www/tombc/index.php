<html>
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
</head>
<body>

<div id='svgcontainer'>
<?
  $svg = file_get_contents("usaLow.svg");
  $i = strpos($svg, "\n");
  $svg = substr($svg, $i, strlen($svg));
  echo($svg);
?>
</div>

<style>
#svgcontainer {
  position: relative;
}
#infobox {
  position: absolute;
  top: 20px;
  left: 600px;
  background: #aaa;
}
#map {
  width: 1200px;
  height: 800px;
}
</style>

<script>

  var data = null;
  var colMap = {};
  var rowMap = {};
  var tmpColor = {};

  var c_inactive = "#000";
  var c_hover    = "#AA0";
  var c_info     = "#eeeeee";
  var c_clicked  = "#ff0";

  var active = null;

  function hover_in(state) {
    if (state != active) {
      state.attr("fill", c_hover);
      if (active != null) {
        var row = rowMap[active.attr('title')];
        var srcPop = data[row][1];
        var arrivingPop = 0;
        for (i=5; i < data[row].length; i++) {
          arrivingPop += Math.round(data[row][i]);
        }
        var col = colMap[state.attr('title')];
        var totalPop = data[row][1];
        var moves = data[row][col];
        var p = Math.round((100 * 100 * moves) / arrivingPop) / 100;
        $("#over_name").html("of people who move to " + active.attr('title') + " come from " + state.attr('title'));
        $("#over_percent").html(p + "%");
        $("#over_name").css("visibility", "visible");
        $("#over_percent").css("visibility", "visible");
      }
    }
  }
  function hover_out(state) {
    if (state != active) {
      if (active) {
        c = tmpColor[state.attr('title')];
        state.attr("fill", c);
        $("#over_name").css("visibility", "hidden");
        $("#over_percent").css("visibility", "hidden");
      } else {
        state.attr("fill", c_inactive);
      }
    }
  }
  function get_color(state, orig, shade) {
    shade = Math.pow(shade, .5);
    var a = (Math.floor(255 * shade)).toString(16);
    a = ("0" + a).slice(-2);
    var c = orig + a;
    c = "#" + "ff" + "00" + a;
    c = "#" + a + a + a;
    tmpColor[state] = c;
    return c;
  }
  function set_active(state) {
    active = state;
    var row = data[rowMap[state.attr('title')]];
    var allInPop = 0;
    var max = 0;
    for (c=5; c < row.length-1; c++) {
      val = parseInt(row[c]);
      allInPop += val;
      if (val > max) {
        max = val;
      }
    }
    var row = rowMap[active.attr('title')];
    var srcPop = data[row][1];
    var arrivingPop = 0;
    var tmax = 0;
    var foreign = parseInt(data[row][data[row].length-1]);
    for (i=5; i < data[row].length-4; i++) {
      t = parseInt(data[row][i]);
      if (!isNaN(t)) {
        arrivingPop += t;
        if (t > tmax) {
          tmax = t;
        }
      }
    }
    $(".land").each(function(index) {
      var state = $(".land")[index];
      var stateid = state['id'];
      state = $('#' + stateid);
      var col = colMap[state.attr('title')];
      var totalPop = data[row][1];
      var moves = data[row][col];
      var p = 0.9 * moves / tmax;
      if (state != active) {
        c = get_color(state.attr('title'), c_info, p);
        state.attr("fill", c);
      }
    });
    state.attr("fill", c_clicked);
    var txt = active.attr('title') + " has a population of " + formatNumber(srcPop) + " in 2014.<br/>"
    txt += formatNumber(arrivingPop) + " relocated here in 2013.<br/>";
    txt += formatNumber(foreign) + " come from a foreign country.";
    $("#state_info").html(txt);
    $("#state_info").show();
    $("#over_name").show();
    $("#over_percent").show();
  }
  function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
  }
  function set_inactive(state) {
    active = null;
    $(".land").each(function(index) {
      var state = $(".land")[index];
      var stateid = state['id'];
      state = $('#' + stateid);
      state.attr("fill", c_inactive);
    });
    $("#state_info").hide();
    $("#over_name").hide();
    $("#over_percent").hide();
  }
  function initialize() {
    $.ajax({
      url: "s2s_migration.tsv",
      async: true,
      success: function (csvd) {
          data = $.csv2Array(csvd, {'separator': '\t', 'head': true});
          for (i=0; i < data[0].length; i++) {
            colMap[data[0][i]] = i;
          }
          for (i=0; i < data.length; i++) {
            rowMap[data[i][0]] = i;
          }
      },
      dataType: "text",
      complete: function () {
          // call a function on complete
      }
    });

    $(".land").each(function(index) {
      var state = $(".land")[index];
      var stateid = state['id'];
      state = $('#' + stateid);
      state.click(function() {
        $("#infobox").attr("top", "350px");
        if (state == active) {
          set_inactive(state);
          hover_in(state);
        }
        else {
          if (active != null) {
            active.attr("fill", c_inactive);
            set_inactive(active);
          }
          state.attr("fill", c_clicked);
          set_active(state);
        }
      });
      state.hover(
          function() {
            hover_in(state);
          }
          , function() {
            hover_out(state);
          }
      );
    });
    $("#btnGotIt").click(function() {
      $("#instructions").hide()
    });
  }

  $(document).ready(function() {
    initialize();
  });
</script>

<div id='footer'>
<hr/>
This work was inspired by a recent "The Odds Must be Crazy" segment on Skepticality found
<a href="http://www.skepticality.com/dont-mess-with-her-pumpkin-spice-lattes/">here</a>.<br/>
The state shapefiles are used under a Creative Commons Attribution-NonCommercial 4.0 License,<br/>
and the source is 
<a href="http://www.amcharts.com/svg-maps/?map=usa">amcharts.com</a>.<br/>
The migration data comes from the US Census
and the data munging to extract it can be found
<a href="http://dataskeptic.com/blog/b006_state-to-state-migration.php">here</a>.
</div>

<style>
#footer {
  font-size: 8pt;
}
#instructions {
  position: absolute;
  width: 50%;
  margin: 10 auto;
  top: 10px;
  left: 450px;
  width: 350px;
  height: 250px;
  padding: 25px;
  border: #222 solid 1px;
  background: #eee;
  font-size: 14pt;
}
#btnGotIt {
  font-size: 18pt;
}
#over_name {
  margin 0; padding:0;
  top: 90px;
  left: 720px;
  position: absolute;
  width: 300px;
  height: 100px;
  visibility: hidden;
}
#over_percent {
  margin 0; padding:0;
  font-size: 44pt;
  top: 30px;
  left: 720px;
  position: absolute;
  width: 300px;
  height: 100px;
  visibility: hidden;
}
#img {
  width: 125px;
  position: absolute;
  top: 10px;
  left: 10px;
}
#state_info {
  width: 600px;
  position: absolute;
  top:10px;
  left: 450px;
}
</style>

<div id="instructions">
<p>Click on a state to select it.</p>
<p>Other states will light up indicating where people relocate from.</p>
<p>Hover over adjacent states to get the exact value.</p>

<center><button id='btnGotIt'>Got it!</button></center>

</div>

<div id="dslogo">
<a href="http://dataskeptic.com">
<img id="img" src="http://dataskeptic.com/ds-logo.svg" />
</a>
</div>

<div id="state_info"></div>
<div id="over_name"></div>
<div id="over_percent"></div>



</body>
</html>
