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
    height: 400px;
    float: left;
}
div#spacer {
  width: 5%;
  height: 400px;
  float: left;
}
div#cart {
    margin-left: 15%;
    height: 400px;
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

#ccnum {
  width:350px;
}

#cvc {
  width:75px;
}
#expm {
  width: 25px;
}
#expy {
  width: 50px;
}
</style>

<section>

<div id='items'>
<table>
  <tr>
    <td><img src='data-skeptic-sticker.jpg' alt='Data Skeptic hex sticker' width=200 height=200 /></td>
    <td valign='top'>
      <h2>Sticker</h2>
      <p>Hexagon logo sticker in the widely accepted <a href='https://github.com/terinjokes/StickerConstructorSpec'>hex format</a>.  These look great on laptops and helicopters.</p>
      <span class='price'>$1</span>
      <button id='addsticker' class='addtocart'>Add to cart</button>
    </td>
  </tr>
  <tr>
    <td><img src='data-skeptic-pin.jpg' alt='Data Skeptic punk rock style one inch pin'  width=200 height=200 /></td>
    <td valign='top'>
      <h2>Pin</h2>
      <p>Half inch pins allow you to proudly show off your Data Skeptic affiliation on your hoddie, backpack, or sombrero.</p>
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
    <td><b>Stickers:</b></td>
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
</table>

<button class='addtocart' id='reset'>Reset</button>
<button class='addtocart' id='checkout'>Checkout</button>

</div>

<br/>

</section>








<div class="overlay-bg">
	<div class="overlay-content">
		</form>
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
				<td>Card Number</td>
				<td><input id='ccnum' data-stripe="number"/></td>
			</tr>
			<tr>
				<td>CVC</td>
				<td><input id='cvc' data-stripe="cvc"/></td>
			</tr>
			<tr>
				<td>Expiration (MM/YYYY)</td>
				<td><input id='expm' data-stripe="exp-month"/> / <input id='expy' data-stripe="exp-year"/></td>
			</tr>

		</table>

		<span class="payment-errors"></span>

		<button class="addtocart" id="close">Close</button>
		<button class="addtocart" id="order">Order</button>
	</div>
</div>





<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>

var daddress = "";
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
  $("#itotal").html(itotal);
  $("#stotal").html(stotal);
  $("#gtotal").html(gtotal);
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
    $('.overlay-bg').show();
  }
});

$('#order').click(function(){
  var o = $("#name").val() + " / "
        + $("#email").val() + " / "
        + $("#address").val() + " / "
        + $("#city").val() + " / "
        + $("#state").val() + " / "
        + $("#zip").val();
  daddress = 0;
  // TODO: log this in case they abandon
  $('.overlay-bg').hide();
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


Stripe.setPublishableKey('pk_test_y5MWdr7S7Sx6dpRCUTKOWfpf');


update();

</script>

</div>

<? include("footer.php"); ?>
