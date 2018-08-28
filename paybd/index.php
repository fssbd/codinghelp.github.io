





<?php include 'inc/header.php';?>
	
	<div class="container-fluid">
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
				
				<div class="clear">	</div>
				
				<div class="box">
					<div class="col-md-12 text-center">
						<h2>Testimonial</h2>
					</div>
					<div class="col-md-12">
					  <div class="carousel slide" data-ride="carousel" id="quote-carousel">
						<!-- Bottom Carousel Indicators -->
						<ol class="carousel-indicators">
						  <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
						  <li data-target="#quote-carousel" data-slide-to="1"></li>
						  <li data-target="#quote-carousel" data-slide-to="2"></li>
						</ol>

						<!-- Carousel Slides / Quotes -->
						<div class="carousel-inner">

						  <!-- Quote 1 -->
						  <div class="item active">
							<blockquote>
							  <div class="row">
								<div class="col-sm-2 text-center">
								  <img class="img-circle" src="assets/images/female.jpg" style="width: 100px;height:100px;">
								</div>
								<div class="col-sm-10">
								  <p>100% ট্রাস্টেড সাইট। তবে রেট একটু কমালে ভাল হয়। আর ফোন নাম্বার এর ইউজ না থাকলে ভাল হয়, শুধু ইমেলই যথেষ্ট বলে আমার ধারণা।</p>
								  <small>Someone famous</small>
								</div>
							  </div>
							</blockquote>
						  </div>
						  <!-- Quote 2 -->
						  <div class="item">
							<blockquote>
							  <div class="row">
								<div class="col-sm-2 text-center">
								  <img class="img-circle" src="assets/images/female.jpg" style="width: 100px;height:100px;">
								</div>
								<div class="col-sm-10">
								  <p>Could I... BE any more happy with this company?</p>
								  <small>Someone famous</small>
								</div>
							  </div>
							</blockquote>
						  </div>
						  <!-- Quote 3 -->
						  <div class="item">
							<blockquote>
							  <div class="row">
								<div class="col-sm-2 text-center">
								  <img class="img-circle" src="assets/images/female.jpg" style="width: 100px;height:100px;">
								</div>
								<div class="col-sm-10">
								  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
								  <small>Someone famous</small>
								</div>
							  </div>
							</blockquote>
						  </div>
						</div>

						<!-- Carousel Buttons Next/Prev -->
						<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
						<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
					  </div>                          
					</div>
				</div>
				<!--Testimonials End-->
				
				<div class="clear">	</div>
				
				<!--Our Coustomer Info Start-->
				<!--slideanim-->
				<div class="box ">
					<div class="col-md-12 text-center">
						<h2>Our Happy Client</h2>
					</div>
					<div class="col-md-12 counter" id="counter">
							<div class="main_counter_area">
								<div class="overlay p-y-3">
									<div class="main_counter_content text-center white-text wow fadeInUp">
										<div class="col-md-3">
											<div class="single_counter p-y-2 m-t-1">
												<i class="fa fa-heart m-b-1"></i>
												<h2 class="statistic-counter">100</h2>
												<p>Total Client</p>
											</div>
										</div>
										<div class="col-md-3">
											<div class="single_counter p-y-2 m-t-1">
												<i class="fa fa-check m-b-1"></i>
												<h2 class="statistic-counter">400</h2>
												<p>Total Send</p>
											</div>
										</div>
										<div class="col-md-3">
											<div class="single_counter p-y-2 m-t-1">
												<i class="fa fa-refresh m-b-1"></i>
												<h2 class="statistic-counter">312</h2>
												<p>Total Receive</p>
											</div>
										</div>
										<div class="col-md-3">
											<div class="single_counter p-y-2 m-t-1">
												<i class="fa fa-beer m-b-1"></i>
												<h2 class="statistic-counter">480</h2>
												<p>Total Reserve</p>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<!--Our Coustomer Info End-->
				
				
			</div>
			<div class="col-md-3">
				<div class="box">
					<div class='col-md-12 text-center'>
						<h2>Track exchange</h2>
					</div>
					<div class='col-md-12 text-center'>
						<input type="text" class="form-control form_style_1 input-lg" id="bit_amount_receive" name="bit_amount_receive" placeholder="Type hear exchange id">
					</div>
					<div class="col-md-12 text-center"></div>
					<div class='col-md-12 text-center'>
						<button type="button" class="btn btn-primary btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i> Track&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</div>
				</div>
				
				<div class="clear">	</div>
				
				<div class="box">
					<div class="row">
						<div class='col-md-12 text-center'>
						<h2>Our Reserve</h2>
						</div>
						<?php
							$i=0;
							while($i<10)
							{
						?>
						<div class="col-md-12" style="margin-bottom:10px; margin-left:10%">
							<img src="assets/images/icons/Bitcoin.png" width="42px" height="42px" class="img-circle img-bordered pull-left">
							<span class="pull-left" style="margin-left:5px;">
								<span style="font-size:15px;font-weight:bold;">Skrill. USD</span><br/>
								<span class="text text-muted">119.06 USD </span>
							</span>
						</div>
						
						<br><br>
						<?php
							$i++;
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php include 'inc/footer.php';?>