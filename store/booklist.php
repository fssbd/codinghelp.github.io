<?php include "inc/header.php"; ?>

    <div class="container-fluid text-center">    
      <h3>CATEGORY WISE BOOK LIST</h3>
      <br>
      <div class="row">
        <div class="col-sm-2 books">
          <a href="#"  data-toggle="modal" data-target="#product_view"><img src="images/books/biye.jpg" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Biye</p>
          <p>TK. 200</p>
          <p>Author Name</p>
        </div>
        <div class="col-sm-2 books"> 
          <a href="#"  data-toggle="modal" data-target="#product_view"><img src="images/books/deyal.jpg" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Deyal</p>
          <p>TK. 200</p>
          <p>Author Name</p>
        </div>
        <div class="col-sm-2 books"> 
          <a href="#"  data-toggle="modal" data-target="#product_view"><img src="images/books/mosad.jpg" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Mosad</p>
          <p>TK. 200</p>
          <p>Author Name</p>
        </div>
        <div class="col-sm-2 books"> 
          <a href="#"  data-toggle="modal" data-target="#product_view"><img src="images/books/onko-vaiaa.jpg" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Onko Vaiaa</p>
          <p>TK. 200</p>
          <p>Author Name</p>
        </div>
        <div class="col-sm-2 books">
          <a href="#"  data-toggle="modal" data-target="#product_view"><img src="images/books/biye.jpg" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Biye</p>
          <p>TK. 200</p>
          <p>Author Name</p>
        </div>
        <div class="col-sm-2 books"> 
          <a href="#"  data-toggle="modal" data-target="#product_view"><img src="images/books/onko-vaiaa.jpg" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Onko Vaiaa</p>
          <p>TK. 200</p>
          <p>Author Name</p>
        </div> 
      </div>
      <hr>
    </div>
    
    
    
    <!--Quick View Action-->
    
	<div class="modal fade product_view" id="product_view">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
					<h3 class="modal-title">Product Details</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 product_img">
							<img src="images/books/deyal.jpg" class="img-responsive">
						</div>
						<div class="col-md-6 product_content">
							<h4>Product Name: <span>Deyal</span></h4>
							<h4>Author Name: <span>ABC</span></h4>
							<h4>Status: <span>Available</span></h4>
							<h4>Price: <span>200</span></h4>
							<h4>Branch: <span>GEC</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include "inc/footer.php"; ?>
