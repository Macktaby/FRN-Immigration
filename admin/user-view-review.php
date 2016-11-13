<?php require_once("includes/header.php");
 require_once("includes/class/config.php");
 require_once("includes/class/product-review.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left"><h3>Product Review<small></small></h3></div>
            </div>
			<?php
				$gid= intval($_GET['id']);
				$Obj = new Reviews();
				
				if(isset($_POST["Confirm_Delete"]) and $_POST['Delete_Confirm'] == "delete"){
					$user_id = $_POST['DeleteUserID'];
					$product_id = $_POST['DeleteProductID'];
					$result_Del = $Obj->Delete($user_id,$product_id);
					if(isset($result_Del)){
						$Msg_Succefully = '<div class="msg msg-ok"> <p class="td-col">Deleting is done!</p></div>';
					}
				}
				$result = $Obj->SelectByUserID($gid);
				$num_rows = mysql_num_rows($result);
			?>
            <div class="clearfix"></div>
            <div class="row">
              <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reviews for user<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                    <p><a href="user-view.php"><code>Users</code></a> / Reviews</p>
					<p style="color:#5cb85c !important; text-align:center;"><? if(isset($Msg_Succefully)){ echo $Msg_Succefully; }?></p>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Product Name </th>
                            <th class="column-title">Review </th>
                            <th class="column-title">Rrating</th>
                            <th class="column-title">Image</th>
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
										echo ' <td class=" "><a href="product-details-view.php?id='.$row['product_id'].'" >'.$row['Pname'].'</a></td>';
										echo ' <td class=" ">'.$row['PReview'].'</td>';
										echo ' <td class=" ">'.$row['PRrating'].'</td>';
										echo ' <td class=" "><img src="../'.$row['Pimage'].'" alert="'.$row['Pname'].'" style="width:40px;"/></td>';
										echo ' <td><a href="javascript:void(0);" onclick="Press('.$row['user_id'].','.$row['product_id'].');" data-toggle="modal" data-target="#myModal">Delete</a></td>';
					
										echo'</tr>';
										$i++;
									}
								}else{
									echo '<tr class="even pointer">';
									echo '<td class="a-center" colspan="7">';
									echo '<p class="p_notfound">Not found items in reservation for user</p>';
									echo '</td>';
									echo'</tr>';
								}
						?>
						<script>
						function Press(userid_val,productid_val){
							document.getElementById("DeleteUserID").value=userid_val;
							document.getElementById("DeleteProductID").value=productid_val;
						}
						</script>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>		  
        </div>
        <!-- /page content -->

<?php require_once("includes/footer.php"); ?>