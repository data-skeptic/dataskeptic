<? include("header.php"); ?>

<div id="bbody">

<h1>Data Skeptic Merch</h1>

<p>At this time, we can only ship to US addresses.  International listeners are encouraged to announce their displeasure
with this on social media as a means of motivating the creation of an international shipping option.</p>

<style>
section {
    width: 80%;
}
.price {
  font-size: 16pt;
  color:#ebe728;
}
div#items {
    width: 55%;
    height: 550px;
    float: left;
}
div#spacer {
  width: 5%;
  height: 550px;
  float: left;
}
div#cart {
    margin-left: 15%;
    height: 550px;
}
.addtocart {
	-webkit-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.98) 0 1px 0 0;
	background-color:#ebe728;
	border-radius:0;
	-webkit-border-radius:0;
	-moz-border-radius:0;
	border:1px solid #999;
	color:#383838;
	font-family:'Lucida Grande',Tahoma,Verdana,Arial,Sans-serif;
	font-size:11px;
	font-weight:700;
	padding:6px 10px;
}

.overlay-bg {
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	height:100%;
	width: 100%;
	cursor: pointer;
	background: #000; /* fallback */
	background: rgba(0,0,0,0.3);
}
.overlay-content td {
  color: #000;
}

	.overlay-content {
		background: #fff;
		color: #000;
		padding: 1%;
		width: 40%;
		position: relative;
		top: 15%;
		left: 50%;
		margin: 0 0 0 -20%; /* add negative left margin for half the width to center the div */
		cursor: default;
		border-radius: 4px;
		box-shadow: 0 0 5px rgba(0,0,0,0.9);
	}

#close {
  background: #aaa;
}

#name {
  width: 350px;
}

#email {
  width: 350px;
}

#address {
  width: 350px;
}

#city {
  width: 200px;
}

#state {
  width: 50px;
}

#zip {
  width: 75px;
}

.productimg {
  margin-right: 10px;
  margin-bottom: 49px;
}
#reset {
  background: #aaa;
}
#spinner {
  display: inline;
  visibility: collapse;
</style>

<section>

<div id='items'>
<table>
  <tr>
    <td><img class='productimg' src='data-skeptic-hex-sticker.jpg' alt='Data Skeptic hex sticker' width=200 height=200 /></td>
    <td valign='top'>
      <h2>Sticker</h2>
      <p>Hexagon logo sticker in the widely accepted <a href='https://github.com/terinjokes/StickerConstructorSpec'>hex format</a>.  These look great on laptops and helicopters.</p>
      <span class='price'>$1</span>
      <button id='addsticker' class='addtocart'>Add to cart</button>
    </td>
  </tr>
  <tr>
    <td><img class='productimg' src='data-skeptic-button.jpg' alt='Data Skeptic punk rock style one inch pin'  width=200 height=200 /></td>
    <td valign='top'>
      <h2>Pin</h2>
      <p>One inch pins allow you to proudly show off your Data Skeptic affiliation on your hoddie, backpack, or sombrero.</p>
      <span class='price'>$1</span>
      <button id='addpin' class='addtocart'>Add to cart</button>
    </td>
  </tr>
</table>
</div>

<div id='spacer'> </div>

<div id='cart'>
<h2>Cart</h2>

<table>
  <tr>
    <td width=200><b>Stickers:</b></td>
    <td><div id='nstickers'></div></td>
  </tr>
  <tr>
    <td><b>Pins:</b></td>
    <td><div id='npins'></div></td>
  </tr>
  <tr>
    <td><b>Item Total:</b></td>
    <td><div id='itotal'></div></td>
  </tr>
  <tr>
    <td><b>Shipping:</b></td>
    <td><div id='stotal'></div></td>
  </tr>
  <tr>
    <td><b>Grand Total:</b></td>
    <td><div id='gtotal'></div></td>
  </tr>
  <tr>
    <td colspan=2 align=right>
      <button class='addtocart' id='reset'>Reset</button>
      <button class='addtocart' id='checkout'>Checkout</button>
    </td>
  </tr>
</table>


</div>

<br/>

</section>








<div class="overlay-bg">
	<div class="overlay-content">
                <table>
			<tr>
				<td>Name:</td>
				<td><input id='name' /></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input id='email' /></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input id='address' /></td>
			</tr>
			<tr>
				<td>City, State ZIP:</td>
				<td>
					<input id='city' />
					<select id='state'>
					</select>
					<input id='zip' />
				</td>
			</tr>
			<tr>
				<td colspan=2 align=right>
					<button class="addtocart" id="close">Close</button>
					<button class="addtocart" id="order">Order (paypal)</button>
					<div id='spinner'><img src='spinner.gif' /></div>
				</td>
			</tr>
		</table>

<div id='formerror'>
</div>

<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post" id="ppform">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="kyle@dataskeptic.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" id='ppdesc' name="item_name" value="Data Skeptic merch">
<input type="hidden" id='ppval' name="amount" value="10">
</form>
	</div>
</div>

<script>

var daddress = "";
var desc = '';
var pins = 0;
var stickers = 0;

function update() {
  var itotal = pins + stickers;
  var stotal = 1;
  var gtotal = itotal + stotal;
  if (itotal == 0) {
    stotal = 0;
    gtotal = 0;
  }
  $("#npins").html(pins);
  $("#nstickers").html(stickers);
  $("#itotal").html('$' + itotal);
  $("#stotal").html('$' + stotal);
  $("#gtotal").html('$' + gtotal);
}

$("#addsticker").click(function() {
  stickers += 1;
  update();
});

$("#addpin").click(function() {
  pins += 1;
  update();
});

$("#checkout").click(function() {
  update();
  if (pins + stickers == 0) {
    alert("Your order of nothing has been instantly delivered.");
  } else {
    if (pins > 0) {
      desc += pins + ' pin'
      if (pins > 1) {
        desc += 's';
      }
    }
    if (stickers > 0) {
      if (pins > 0) {
        desc += ' and ';
      }
      desc += stickers + ' sticker';
      if (stickers > 1) {
        desc += 's';
      }
    }
    var amt = ((pins + stickers) + 1);
    $("#ppdesc").val(desc);
    $("#ppval").val(amt);
    $('.overlay-bg').show();
  }
});

$('#order').click(function(){
  var ddata = {};
  ddata['name']    = $("#name").val();
  ddata['email']   = $("#email").val();
  ddata['address'] = $("#address").val();
  ddata['city']    = $("#city").val();
  ddata['state']   = $("#state").val();
  ddata['zip']     = $("#zip").val();
  $("#spinner").css('visibility', 'collapse');
  $("#name").css('border', '1px solid black');
  $("#email").css('border', '1px solid black');
  $("#address").css('border', '1px solid black');
  $("#city").css('border', '1px solid black');
  $("#state").css('border', '1px solid black');
  $("#zip").css('border', '1px solid black');
  $("#formerror").html("");
  if (ddata['name'].trim().length == 0) {
    $("#formerror").html("Please enter your name.");
    $("#name").css('border', '3px solid red');
    $("#name").focus();
    return false;
  }
  if (ddata['email'].trim().length == 0) {
    $("#formerror").html("Please enter your email address.");
    $("#email").css('border', '3px solid red');
    $("#email").focus();
    return false;
  }
  if (ddata['address'].trim().length == 0) {
    $("#formerror").html("Please enter your mailing address.");
    $("#address").css('border', '3px solid red');
    $("#address").focus();
    return false;
  }
  if (ddata['city'].trim().length == 0) {
    $("#formerror").html("Please enter your city.");
    $("#city").css('border', '3px solid red');
    $("#city").focus();
    return false;
  }
  if (ddata['zip'].trim().length == 0) {
    $("#formerror").html("Please enter your zipcode.");
    $("#zip").css('border', '3px solid red');
    $("#zip").focus();
    return false;
  }
  console.log(JSON.stringify(ddata));
  $.ajax({
            url: 'http://dataskeptic.com/store-api.php',
            type: 'POST',
            crossDomain: true,
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                          //console.log(textStatus);
                          console.log("-" + errorThrown);
                        },
            data: JSON.stringify(ddata)
  });
  $("#spinner").css('visibility', 'visible');
  $("#ppform").submit();
});

$('#close').click(function(){
  $('.overlay-bg').hide();
});

$("#reset").click(function() {
  pins = 0;
  stickers = 0;
  update();
});

var states = ['AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO',
'MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY',
'DC','AS','GU','MP','PR','VI'];

var options = $("#state");
$.each(states, function(item) {
    options.append($("<option />").text(states[item]));
});


//Stripe.setPublishableKey('pk_test_y5MWdr7S7Sx6dpRCUTKOWfpf');


update();

</script>

</div>

<? include("footer.php"); ?>
