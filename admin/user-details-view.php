<?php require_once("includes/header.php"); require_once("includes/class/config.php");
	  require_once("includes/class/user.php");
	  require_once("includes/class/wishlist.php");
	  require_once("includes/class/reservation.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"><h3>Users</h3></div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="user-view.php">Users </a><small>edit information of User</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php
					$gid= intval($_GET['id']);
					$Obj = new User();
					$row = $Obj->SelectById($gid);
					?>
                    <form class="form-horizontal form-label-left">					
                      <p>you can view information User by using this from, and can you see all  <a href="user-view.php">Users</a></p>
                      <span class="section">User Info</span>
                      
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nicename">nicename <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nicename" class="form-control col-md-7 col-xs-12" name="nicename" placeholder="both nicename(s) e.g nickname " value='<?php echo $row['nicename'];?>' type="text" disabled="disabled" />
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">location <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="location" class="form-control col-md-7 col-xs-12" name="location" placeholder="both location(s) e.g location " value='<?php echo $row['location'];?>' type="text" disabled="disabled" />
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" name="email" placeholder="both email(s) e.g eng.reem.shwky@gmail.com " value='<?php echo $row['email'];?>' type="text" disabled="disabled" />
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">URL <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="url" class="form-control col-md-7 col-xs-12" name="url" placeholder="both url(s) e.g http://www.googl.com " value='<?php echo $row['url'];?>' type="text" disabled="disabled"/>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" class="form-control col-md-7 col-xs-12" name="phone" placeholder="both phone(s) e.g 00 000 000 " value='<?php echo $row['phone'];?>' type="text" disabled="disabled" />
                        </div>
                      </div>
					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="username" placeholder="both Username(s) e.g User name " value='<?php echo $row['user_name'];?>' type="text" disabled="disabled" />
                        </div>
                      </div>                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isAdmin">Is Admin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
                            <label><input type="checkbox" name='isAdmin' value="1"> check this option when user is admin</label>
                          </div>                        
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input name="User" type="submit" value="Save" class="btn btn-success"/>
							<input type="hidden" name="Update" value="UpdateNew" />
							<button type="submit" class="btn btn-primary">Cancel</button>						  
                        </div>
                      </div>
					  </form>
				</div>
					  
				<div class="x_content">
					<span class="section">Wishlist</span>					  
					  <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Product Name </th>
                            <th class="column-title">Brand </th>
                            <th class="column-title">Category </th>
                            <th class="column-title">Showroom </th>
                            <th class="column-title">Quantity</th>
                            <th class="column-title">Image</th>
                            <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>						
						<?php
						$gid= intval($_GET['id']);
						$Obj = new Wishlist();
						$result = $Obj->SelectByUserID($gid);
						$num_rows = mysql_num_rows($result);
								$i = 0;
								if($num_rows >0){
									while($row = mysql_fetch_assoc($result)){
										echo '<tr class="even pointer">';
										echo ' <td class="a-center ">'.($i+1).'</td>';
										echo ' <td class=" "><a href="product-details-view.php?id='.$row['product_id'].'" >'.$row['Pname'].'</a></td>';
										echo ' <td class=" "><a href="brand-edit.php?id='.$row['Pbrand_id'].'">'.$row['Pbrand'].'</a></td>';
										echo ' <td class=" "><a href="category-edit.php?id='.$row['Pcategory_id'].'" >'.$row['Pcatname'].'</a></td>';
										echo ' <td class=" "><a href="showroom-edit.php?id='.$row['Pshowroom_id'].'" >'.$row['Pshowroom'].'</a></td>';
										echo ' <td class=" ">'.$row['Pquantity'].'</td>';
										echo ' <td class=" "><img src="../'.$row['Pimage'].'" alert="'.$row['Pname'].'" style="width:40px;"/></td>';
										//echo '<td class="last">';
										//echo '</td>';						
										echo'</tr>';
										$i++;
									}
								}else{
									echo '<tr class="even pointer">';
									echo '<td class="a-center" colspan="7">';
									echo '<p class="p_notfound">Not found items in wishlist for user</p>';
									echo '</td>';
									echo'</tr>';
								}
						?>
						<script>
						function Press(val){
							document.getElementById("DeleteID").value=val;
						}
						</script>
                        </tbody>
                      </table>
                    </div>
                    </div>
					
					
					
					
					<div class="x_content">
					<span class="section">Reservation</span>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
                            <th class="column-title">Product Name </th>
                            <th class="column-title">User Quantity </th>
                            <th class="column-title">Product Quantity</th>
                            <th class="column-title">Image</th>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>						
						<?php
						$gid= intval($_GET['id']);
						$Obj = new Reservation();
						$result = $Obj->SelectByUserID($gid);
						$num_rows = mysql_num_rows($result);
								$i = 0;
								if($num_rows >0){
									while($row = mysql_fetch_assoc($result)){
										echo '<tr class="even pointer">';
										echo ' <td class="a-center ">'.($i+1).'</td>';
										echo ' <td class=" "><a href="product-details-view.php?id='.$row['product_id'].'" >'.$row['Pname'].'</a></td>';
										echo ' <td class=" ">'.$row['Rquantity'].'</td>';
										echo ' <td class=" ">'.$row['Pquantity'].'</td>';
										echo ' <td class=" "><img src="../'.$row['Pimage'].'" alert="'.$row['Pname'].'" style="width:40px;"/></td>';
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
                        </tbody>
                      </table>
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