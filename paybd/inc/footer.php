


		
		
		
		
		
		
		
		<div class="container-fluid footerTop">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<p>Hello</p>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<p>Hello</p>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<p>Hello</p>
				</div>
			</div>

		</div>
		<footer class="container-fluid text-center">
	  		<a href="#myPage" title="To Top">
				<span class="glyphicon glyphicon-chevron-up"></span>
			</a>
		  	<p>Developed By: <a href="http://www.codinghelpbd.com">CodingHelpBD.com</a></p>
		</footer>
		
		<script>
			$(document).ready(function(){
  				
				/*Fix Navigation*/
			
				var prevScrollpos = window.pageYOffset;
				window.onscroll = function() {
				var currentScrollPos = window.pageYOffset;
				  if (prevScrollpos > currentScrollPos) {
					document.getElementById("navFix").style.top = "0";
				  } else {
					document.getElementById("navFix").style.top = "-50px";
				  }
				  prevScrollpos = currentScrollPos;
				}

				/*Fix Navigation*/

				
				/*Scroll to Top*/
				// Add smooth scrolling to all links in navbar + footer link
				$(".navbar a, footer a[href='#myPage']").on('click', function(event) {
				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
				  // Prevent default anchor click behavior
				  event.preventDefault();
				  // Store hash
				  var hash = this.hash;

				  // Using jQuery's animate() method to add smooth page scroll
				  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				  $('html, body').animate({
					scrollTop: $(hash).offset().top
				  }, 900, function(){

					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				  });
				} // End if
				});
				/*Scroll to Top*/


				/*Scroll Animation*/
				  $(window).scroll(function() {
					$(".slideanim").each(function(){
					  var pos = $(this).offset().top;

					  var winTop = $(window).scrollTop();
						if (pos < winTop + 600) {
						  $(this).addClass("slide");
						}
					});
				  });
				/*Scroll Animation*/
			})
			
			/**/
			jQuery('.statistic-counter').counterUp({
                delay: 10,
                time: 2000
            });
			
		</script>

	</body>
</html>