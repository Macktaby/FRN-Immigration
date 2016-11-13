<?php require_once("includes/header.php");
require_once("includes/class/config.php");
require_once("includes/class/product.php");
require_once("includes/class/product-image.php");

	$Obj = new Product();
	
	if(isset($_POST["Confirm_Delete"]) and $_POST['Delete_Confirm'] == "delete"){
		$id = $_POST['DeleteID'];
		$result_Del = $Obj->Delete($id);
		if(isset($result_Del)){
			$ObjImages = new ProductImages();
			$resultImages = $ObjImages->SelectByProductId($ProductID);
			$num_rowsImages = mysql_num_rows($resultImages);
			if($num_rowsImages >0){
				while($rowImages = mysql_fetch_assoc($result)){
					$filename = $rowImages['image'];
					$ImageID = $rowImages['image_id'];
				    if (file_exists($filename)) {
					  unlink($filename);
				    } else {
					  $Msg = 'Could not delete '.$filename.', file does not exist';
				    }
				    if($ObjImages->Delete($ProductID,$ImageID)){
						$Msg ="Delete image is Done";
				    }
				}
			}
			
			$Msg_Succefully = '<div class="msg msg-ok"> <p class="td-col">Deleting is done!</p></div>';
		}
	}
	
	$result = $Obj->SelectAll();
	$num_rows = mysql_num_rows($result);
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"><h3><a href="product-view.php">Products</a><small></small></h3>
              </div>

              <div class="title_right"><br/><br/></div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="product-view.php">Products</a><small></small></h2>
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
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <p>Add new <a href="product-add.php"><code>Product</code></a></p>
					<p style="text-align:center;"><? if(isset($Msg_Succefully)){ echo $Msg_Succefully; }?></p>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Quantity </th>
                            <th class="column-title">Price </th>
                            <th class="column-title">Rating </th>
                            <th class="column-title">Is Day </th>
                            <th class="column-title">Brand</th>
                            <th class="column-title">Showroom</th>
                            <th class="column-title">Category</th>
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
										echo ' <td class=" ">'.$row['name'].'</td>';
										echo ' <td class=" ">'.$row['quantity'].'</td>';
										echo ' <td class=" ">'.$row['price'].'</td>';
										if($row['n_ratings'] >0 ){
											echo ' <td class=" ">'.$row['rating'].'</td>';
										}else{
											echo ' <td class=" ">0</td>';
										}
										echo ' <td class=" ">'.$row['is_day_prod'].'</td>';
										echo ' <td class=" "><a href="brand-edit.php?id='.$row['brand_id'].'">'.$row['brand_name'].'</a></td>';
										echo ' <td class=" "><a href="showroom-edit.php?id='.$row['showroom_id'].'" >'.$row['showroom_name'].'</a></td>';
										echo ' <td class=" "><a href="category-edit.php?id='.$row['category_id'].'">'.$row['category_name'].'</a></td>';
										echo '<td class=" last"><a href="javascript:void(0);" onclick="Press('.$row['product_id'].');" data-toggle="modal" data-target="#myModal">Delete</a>';
										echo ' - ';
										echo '<a href="product-edit.php?id='.$row['product_id'].'">Edit</a>';
										echo ' - ';
										echo '<a href="product-details-view.php?id='.$row['product_id'].'">view</a>';
										echo ' - ';
										echo '<a href="product-image-view.php?id='.$row['product_id'].'">Images</a>';
										echo '</td>';							
										$i++;
									}
								}
						?>
						<script>
						function Press(val){
							document.getElementById("DeleteID").value=val;
						}
						</script>
                        </tbody>
                      </table>
					  
					  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<div class="modal-dialog">
						<form  method='post' action='<?php echo $_SERVER['PHP_SELF'];?>' id="form1">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel2">Delete Message</h4>
								</div>
								<div class="modal-body">
									<p>Are you sure to delete this row ?</p>
									<input type="hidden" name="DeleteID" id="DeleteID" />
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
		  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php require_once("includes/footer.php"); ?>