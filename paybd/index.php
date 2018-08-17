<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>







<?php

	$db = new Database();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>PRIHUTA BookStore</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="assets/bootstrap/css/style.css">
	  <link href="assets/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
	  <script src="assets/bootstrap/js/jquery-3.3.1.min.js"></script>
	  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- navbar -->
	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php">
          	<img class="img-responsive" src="assets/images/logo.png" style="width:30%;" alt="Logo" >
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Category-1</a></li>
                  <li><a href="#">Category-2</a></li>
                  <li><a href="#">Category-3</a></li>
                </ul>
            </li>-->
            <li><a href="#">Exchange</a></li>
			<li><a href="#testimonials">Testimonials</a></li>
			<li><a href="#affiliate">Affiliate</a></li> 
			<li><a href="#contact">Contact</a></li> 
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
          <div class="col-sm-3 col-md-3">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="name" required="required">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="box">
					<form id="bit_exchange_form">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-3 hidden-xs hidden-sm">
									<div style="margin-top:50px;">
										<img src="assets/images/icons/Bitcoin.png" id="bit_image_send" width="72px" height="72px" class="img-circle img-bordered">
									</div>
								</div>
								<div class="col-md-9">
									<h3><i class="fa fa-arrow-down"></i> Send</h3>
									<div class="form-group">
										<select class="form-control form_style_1 input-lg" id="bit_gateway_send" name="bit_gateway_send" onchange="bit_refresh('1');">
											<option value="7" >Skrill. USD</option><option value="8" >Neteller. USD</option><option value="9" >Perfect Money. USD</option><option value="10" >Payeer. USD</option><option value="11" >Bkash Agent BDT</option><option value="14" selected>bKash Personal BDT</option><option value="15" >Rocket Personal BDT</option><option value="23" >Coinbase BTC USD</option><option value="24" >Coinbase ETH USD</option><option value="25" >Coinbase LTC USD</option><option value="26" >Coinbase BCH USD</option>												</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control form_style_1 input-lg" id="bit_amount_send" name="bit_amount_send" value="0" onkeyup="bit_calculator();" onkeydown="bit_calculator();">
									</div>
									<div class="text text-muted pull-right" style="padding-bottom:10px;font-weight:bold;">Exchange rate: <span id="bit_exchange_rate">-</span></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-9">
									<h3><i class="fa fa-arrow-up"></i> Receive</h3>
									<div class="form-group">
										<select class="form-control form_style_1 input-lg" id="bit_gateway_receive" name="bit_gateway_receive"  onchange="bit_refresh('2');">
											<option value="7" >Skrill. USD</option><option value="8" >Neteller. USD</option><option value="9" selected>Perfect Money. USD</option><option value="10" >Payeer. USD</option><option value="14" >bKash Personal BDT</option><option value="15" >Rocket Personal BDT</option><option value="20" >Payza. USD</option><option value="21" >WebMoney. USD</option><option value="22" >PayPal. USD</option><option value="23" >Coinbase BTC USD</option><option value="27" >Payoneer. USD</option>												</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control form_style_1 input-lg" id="bit_amount_receive" name="bit_amount_receive" disabled value="0">
									</div>
									<div class="text text-muted" style="padding-bottom:10px;font-weight:bold;">Reserve: <span id="bit_reserve">-</span></div>
								</div>
								<div class="col-md-3 hidden-xs hidden-sm">
									<div style="margin-top:50px;">
										<img src="assets/images/icons/Skrill.png" id="bit_image_receive" width="72px" height="72px" class="img-circle img-bordered">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<input type="hidden" name="bit_amount_receive" id="bit_amount_receive2">
							<input type="hidden" name="bit_rate_from" id="bit_rate_from">
							<input type="hidden" name="bit_rate_to" id="bit_rate_to">
							<input type="hidden" name="bit_currency_from" id="bit_currency_from">
							<input type="hidden" name="bit_currency_to" id="bit_currency_to">
							<input type="hidden" id="bit_login_to_exchange" name="bit_login_to_exchange" value="1">
							<input type="hidden" id="bit_ses_uid" name="bit_ses_uid" value="0">
							<center>
								<button type="button" class="btn btn-primary btn-lg"  onclick="bit_exchange_step_1();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i> Exchange&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</center>
						</div>
					</form>	
				</div>
				<div class="clear">
					
				</div>
				<div class="box">
					<div class="col-md-9">
						<h2>What our customers say</h2>
					</div>
					<div class="col-md-9">
					  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
						  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						  <li data-target="#myCarousel" data-slide-to="1"></li>
						  <li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
						  <div class="item active">
							<h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
						  </div>
						  <div class="item">
							<h4>"100% ট্রাস্টেড সাইট। তবে রেট একটু কমালে ভাল হয়। আর ফোন নাম্বার এর ইউজ না থাকলে ভাল হয়, শুধু ইমেলই যথেষ্ট বলে আমার ধারণা।"<br><span>John Doe, Salesman, Rep Inc</span></h4>
						  </div>
						  <div class="item">
							<h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
						  </div>
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						  <span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						  <span class="sr-only">Next</span>
						</a>
					  </div>
				</div>
				</div>
				
				
			</div>
			<div class="col-md-3">
				<div class="box">
					Hello
				</div>
			</div>
		</div>
	</div>


		<footer class="container-fluid text-center">
		  <p>Developed By: <a href="http://www.codinghelpbd.com">CodingHelpBD.com</a></p>
		</footer>

	</body>
</html>