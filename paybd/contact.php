





<?php include 'inc/header.php';?>
	
	<div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        Contact us <small>Feel free to contact us</small></h1>
                </div>
            </div>
        </div>
    </div>
	<div class="container">
        <div class="row slide">
            <div class="col-md-8">
                <div class="well well-sm">
                    <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                <address>
                    <strong>Best Pay BD</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Mobile">
                        P:</abbr>
                    (+88) 01829-123456
                </address>
                <address>
                    <strong>Email</strong><br>
                    <a href="mailto:#">abc@gmail.com</a>
                </address>
                </form>
            </div>
        </div>
    </div>
	
	<div class="clear">	</div>
	
	<div class="container">
		<div class="col-md-12">
      	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d93886.08557793785!2d91.907716!3d22.435305!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd91b2b41b1e1%3A0x996c92690c9c8329!2sNoapara%2C+Chittagong!5e1!3m2!1sen!2sbd!4v1535485363035" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
	</div>
	
<?php include 'inc/footer.php';?>