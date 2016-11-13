<?php require_once("includes/header.php");
require_once("includes/class/config.php");
	require_once("includes/class/product.php");
	require_once("includes/class/product-image.php");
	
	$ProductID = intval($_GET['id']);
	
	if(isset($_POST["Confirm_Delete"]) and $_POST['Delete_Confirm'] == "delete"){
		$ObjImages = new ProductImages();
		
		  $filename = $_POST['DeleteImage'];
		  $ProductID = $_POST['DeleteProductID'];
		  $ImageID = $_POST['DeleteImageID'];
		  
		  
		  if (file_exists($filename)) {
			unlink($filename);
			//echo 'File '.$filename.' has been deleted';			
		  } else {
			$Msg = 'Could not delete '.$filename.', file does not exist';
		  }
		  
		  if($ObjImages->Delete($ProductID,$ImageID)){
				$Msg ="Delete image is Done";
		   }
	}
	
	if(($_POST["Product"]) and $_POST['Insert'] == "InsertNew"){
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
						$ObjImages->Insert($ProductID,$path.$name);
						$count++; // Number of successfully uploaded files
					}
				}
			}
		}
	}
	
	$Obj = new ProductImages();
	$result = $Obj->SelectByProductId($ProductID);
	$num_rows = mysql_num_rows($result);
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Product <small></small></h3>
              </div>

              <div class="title_right"><br/><br/></div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="product-view.php"> Products </a><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <p>Add new <a href="product-add.php"><code>images</code></a></p>
					<p><?php if(isset($Msg)) {echo $Msg;}?></p>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
								<th class="column-title">Images </th>
								<th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>						
						<?php
								$i = 0;
								if($num_rows >0){
									while($row = mysql_fetch_assoc($result)){
										echo '<tr class="even pointer">';
										echo ' <td class="a-center ">'.($i+1).'</td>';
										echo ' <td class=" "><img src="'.$row['image'].'" alt="Product Images"  style="width:100px;"/></td>';
										echo '<td class=" last"><a href="javascript:void(0);" onclick="Press('.$row['image_id'].','.$row['product_id'].',\''.$row['image'].'\');" data-toggle="modal" data-target="#myModal">Delete</a></td>';
										$i++;
									}
								}
						?>
						
                        </tbody>
                      </table>					  
					  <script>
						function Press(val,product_val,Image_val){
							document.getElementById("DeleteID").value=val;
							document.getElementById("DeleteProductID").value=product_val;
							document.getElementById("DeleteImage").value=Image_val;
						}
						</script>
                    </div>
                  </div>
                </div>
              </div>
			  
			    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<div class="modal-dialog">
						<form  method='post' action='<?php echo $_SERVER['PHP_SELF'].'?id='.$ProductID;?>' id="form1">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel2">Delete Message</h4>
								</div>
								<div class="modal-body">
									<p>Are you sure to delete this row ?</p>
									<input type="hidden" name="DeleteImage" id="DeleteImage" />
									<input type="hidden" name="DeleteImageID" id="DeleteID" />
									<input type="hidden" name="DeleteProductID" id="DeleteProductID" />
								</div>
								<div class="modal-footer">								
									<input type="submit" name="Confirm_Delete" class="btn btn-primary" form="form1" value="Delete" />
									<input type="hidden" name="Delete_Confirm" value="delete" />
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>								
								</div>					
							</div>						
						 </form>
						</div>
					  </div>
			  
			  
			  <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Images <small>add image to product</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'].'?id='.$ProductID;?>' method='post' >
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="images[]" type="file" multiple />
                        </div>
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