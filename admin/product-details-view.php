<?php require_once("includes/header.php");
	require_once("includes/class/config.php");
	  require_once("includes/class/brand.php"); 
	  require_once("includes/class/category.php"); 
	  require_once("includes/class/showroom.php"); 
	  require_once("includes/class/product.php");
	  require_once("includes/class/product-image.php");
?>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"><h3>Products</h3></div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Products <small>add new product</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php
					$gid= intval($_GET['id']);
					$Obj = new Product();
					
					$row = $Obj->SelectById($gid);
					?>
					
                   
                      <p>you can see all <a href="product-view.php">product</a></p>
                      <span class="section">Product Info</span>
					  <div class="form-horizontal form-label-left">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="both name(s) e.g Jon Doe" type="text" value="<?php echo $row['name']; ?>" disabled="disabled"  />
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Description" name="Description" class="form-control col-md-7 col-xs-12" disabled="disabled"><?php echo $row['desc']; ?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="Quantity" name="Quantity" class="form-control col-md-7 col-xs-12" value='<?php echo $row['quantity']; ?>' disabled="disabled"/>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email" disabled="disabled">Is day <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="Isday" value="male"> &nbsp; True &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="Isday" value="female"> False
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Price <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="Price" name="Price" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" disabled="disabled" value="<?php echo $row['price']; ?>" />
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Brands <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name='brand' class="form-control" disabled="disabled">
							<?php 
								$Obj = new Brand();
								$result_brand = $Obj->SelectAll();
								$num_rows_brand = mysql_num_rows($result_brand);
								if($num_rows_brand >0){
									while($rowb = mysql_fetch_assoc($result_brand)){
										if($row['brand_id'] == $rowb['brand_id']){
											echo '<option value="'.$rowb['brand_id'].','.$rowb['name'].'" selected>'.$rowb['name'].'</option>';
										}else{
											echo '<option value="'.$rowb['brand_id'].','.$rowb['name'].'">'.$rowb['name'].'</option>';
										}
									}
								}
							?>
                          </select>
						  </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Category <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select id="heard" name='category' class="form-control" disabled="disabled">
							<?php 
								$Obj = new Category();
								$result_category = $Obj->SelectAll();
								$num_rows_category = mysql_num_rows($result_category);
								if($num_rows_category >0 ){
									while($rowq = mysql_fetch_assoc($result_category)){
										if($row['category_id'] == $rowb['category_id']){
											echo '<option value="'.$rowq['category_id'].','.$rowq['name'].'" selected>'.$rowq['name'].'</option>';
										}else{
											echo '<option value="'.$rowq['category_id'].','.$rowq['name'].'">'.$rowq['name'].'</option>';
										}
									}
								}
							?>
							</select>
						</div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Branches <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select id="heard" name='showroom' class="form-control" disabled="disabled">
							<?php 
								$Obj = new Showroom();
								$result_showroom = $Obj->SelectAll();
								$num_rows_showroom = mysql_num_rows($result_showroom);
								if($num_rows_showroom >0 ){
									while($rows = mysql_fetch_assoc($result_showroom)){
										if($row['showroom_id'] == $rows['showroom_id']){
											echo '<option value="'.$rows['showroom_id'].','.$rows['name'].'" selected>'.$rows['name'].'</option>';
										}else{
											echo '<option value="'.$rows['showroom_id'].','.$rows['name'].'">'.$rows['name'].'</option>';
										}
									}
								}
							?>
							</select>
						</div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Image <span class="required">*</span></label>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<img src="../<?php echo $row['image'];?>" style="width:200px; margin-bottom:4px;" />
						</div>
					  </div>
					  </div>					  
                </div>
				 <div class="x_content">
				  <span class="section">Product Images</span>
					<div>
						<?php
							$ObjImage = new ProductImages();
							$resultImage = $ObjImage->SelectByProductId($gid);
							$num_rowsImages = mysql_num_rows($resultImage);
							if($num_rowsImages >0){
								while($row = mysql_fetch_assoc($resultImage)){
									echo '<img src="'.$row['image'].'" alt="Product Images"  style="width:150px; height:150px; margin-right:10px; border:1px solid #73879C; padding:5px; border-radius:4px; -moz-border-radius:4px; -webkit-border-radius:4px;"/>';
								}
							}
						?>
					</div>
				 </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php require_once("includes/footer.php"); ?>