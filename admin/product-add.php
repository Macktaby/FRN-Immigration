<?php require_once("includes/header.php");
require_once("includes/class/config.php");
	  require_once("includes/class/brand.php"); 
	  require_once("includes/class/category.php"); 
	  require_once("includes/class/showroom.php"); 
	  require_once("includes/class/product.php");
	  require_once("includes/class/product-image.php");		
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"><h3>Products</h3>
              </div>

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
					function getExtension($str)
					{
							 $i = strrpos($str,".");
							 if (!$i) { return ""; }
							 $l = strlen($str) - $i;
							 $ext = substr($str,$i+1,$l);
							 return $ext;
					}
					
					$Obj = new Product();				
					if(($_POST["Product"]) and $_POST['Insert'] == "InsertNew"){
						$Name = strip_tags($_POST['name']);
						$Description = strip_tags($_POST['Description']);
						$Quantity = strip_tags($_POST['Quantity']);
						$Isday = strip_tags($_POST['Isday']);
						$Price = strip_tags($_POST['Price']);
						
						$val_brand = strip_tags($_POST['brand']);
						$pieces_brand = explode(",", $val_brand);
						$brand_id = $pieces_brand[0]; 							$brand_name = $pieces_brand[1];
						
						
						$val_category = strip_tags($_POST['category']);
						$pieces_category = explode(",", $val_category);
						$category_id = $pieces_category[0];					$category_name =  $pieces_category[1];
						
						$val_showroom = strip_tags($_POST['showroom']);
						$pieces_showroom = explode(",", $val_showroom);
						$showroom_id = $pieces_showroom[0]; 				$showroom_name = $pieces_showroom[1]; // piece2
						
						$newfilename = "";
						$uploaddir = '../images/Product/';
						$filename=$_FILES['imagepic']['name'];
						$file=$_FILES['imagepic']['tmp_name'];
						$ext=strtolower(end(explode(".",$filename)));
						if ($ext=="jpg" or $ext=="png" or $ext=="gif" ){
								$newfilename= $Obj->getUniqueCode(10).".".$ext;
								copy ($file,$uploaddir.$newfilename);		// move_uploaded_file
						}
						$Image = "images/Product/".$newfilename;
						$result= $Obj->Insert($Name,$Description,$Quantity,$Price,$Isday,$brand_id,$brand_name,$category_id,
								$category_name,$showroom_id,$showroom_name,$Image);
						if(isset($result)){
							echo "<p style='color:#5cb85c !important; text-align:center;'>add new row </a>";
						}
						
						$product_id = $Obj->SelectMaxID();
						$ObjImages = new ProductImages();
						
						$path='../images/Product/';
						$valid_formats =array('jpg','png','jpeg','gif');
						$max_file_size ='11024';
						foreach ($_FILES['images']['name'] as $f => $name) {     
							if ($_FILES['images']['error'][$f] == 4) {
								continue; // Skip file if any error found
							}	       
							if ($_FILES['images']['error'][$f] == 0) {	           
								if( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
									echo "$name is not a valid format";
									continue; // Skip invalid file formats
								}
								else{ // No error found! Move uploaded files 
									if(move_uploaded_file($_FILES["images"]["tmp_name"][$f], $path.$name)) {
										$ObjImages->Insert($product_id,$path.$name);
										$count++; // Number of successfully uploaded files
									}
								}
							}
						}
						
					}
					?>
					
                    <form enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'];?>' method='post' class="form-horizontal form-label-left">

                      <p>you can add new product by using this from, and can you see all  <a href="form.html">product</a></p>
                      <span class="section">Product Info</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="both name(s) e.g Jon Doe" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Description" name="Description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Quantity <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="Quantity" name="Quantity" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Is day <span class="required">*</span>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="Price" name="Price" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Brands <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="heard" name='brand' class="form-control">
							<?php 
								$Obj = new Brand();
								$result_brand = $Obj->SelectAll();
								$num_rows_brand = mysql_num_rows($result_brand);
								if($num_rows_brand >0){
									while($row = mysql_fetch_assoc($result_brand)){
										echo '<option value="'.$row['brand_id'].','.$row['name'].'">'.$row['name'].'</option>';
									}
								}
							?>
                          </select>
						  </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select id="heard" name='category' class="form-control" required>
							<?php 
								$Obj = new Category();
								$result_category = $Obj->SelectAll();
								$num_rows_category = mysql_num_rows($result_category);
								if($num_rows_category >0 ){
									while($row = mysql_fetch_assoc($result_category)){
										echo '<option value="'.$row['category_id'].','.$row['name'].'">'.$row['name'].'</option>';
									}
								}
							?>
							</select>
						</div>
                      </div>
					
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Branches <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select id="heard" name='showroom' class="form-control">
							<?php 
								$Obj = new Showroom();
								$result_showroom = $Obj->SelectAll();
								$num_rows_showroom = mysql_num_rows($result_showroom);
								if($num_rows_showroom >0 ){
									while($row = mysql_fetch_assoc($result_showroom)){
										echo '<option value="'.$row['showroom_id'].','.$row['name'].'">'.$row['name'].'</option>';
									}
								}
							?>
							</select>
						</div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Image <span class="required">*</span></label>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<input name="imagepic" type="file" />
						</div>
						</div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Product Images <span class="required">*</span></label>
						<script>
							var i=0;
							function addImage(){
								document.getElementById("imageContain").innerHTML += "<div id='imageContain"+i+"'><input name='images"+i+"' type='file' />";							
								i++;
							}
						</script>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<input name="images[]" type="file" multiple />
						</div>
						<div id="imageContain"></div>
						<!--<span class="col-md-1 col-sm-1 col-xs-2" style=" width:40px; font-size:20px; text-align:center; color:#FFF; border-radius:5px; background-color:#169F85; padding:0px 10px;" onclick="addImage();">+</span>
						-->
					  </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input name="Product" type="submit" value="Save" class="btn btn-success"/>
							<input type="hidden" name="Insert" value="InsertNew" />
							<button type="submit" class="btn btn-primary">Cancel</button>                          
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php require_once("includes/footer.php"); ?>