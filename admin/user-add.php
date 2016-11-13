<?php require_once("includes/header.php"); require_once("includes/class/config.php"); require_once("includes/class/user.php");?>
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
                    <h2><a href="user-view.php">Users </a><small>add new User</small></h2>
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
					<p>you can add new User by using this from, and can you see all  <a href="user-view.php">Users</a></p>
					<?php		  
					$Obj = new User();				
					if(($_POST["User"]) and $_POST['Insert'] == "InsertNew"){
						
						$user_name = strip_tags($_POST['username']);
						$password = strip_tags($_POST['password']);
						$nicename = strip_tags($_POST['nicename']);
						$location = strip_tags($_POST['location']);
						$email = strip_tags($_POST['email']);
						$url = strip_tags($_POST['url']);
						$phone = strip_tags($_POST['phone']);
						$status = 'Active';
						if($Obj->SelectByUsername($user_name) > 0 ){
							echo "<p style='color:#cb2027 !important; text-align:center;'> This username found before , please change it.</a>";
						}
						else if($Obj->SelectByEmail($email)> 0 ){
							echo "<p style='color:#cb2027 !important; text-align:center;'> This email found before, please change it. </a>";
						}else{
							if(!empty($_POST['isAdmin'])){
								$is_admin = strip_tags($_POST['isAdmin']);
							}else{
								$is_admin ='0';
							}						
							$result= $Obj->Insert($user_name,$password,$nicename,$location,$email,
										$url,$phone,$status,$is_admin);
										
							if(isset($result)){
								$user_name = null;
								$password = null;
								$nicename = null;
								$location = null;
								$email = null;
								$url = null;
								$phone = null;
								$status = null;
								
								echo "<p style='color:#5cb85c !important; text-align:center;'> Succffeuly add users </a>";
							}
						}
					}
					?>
                    <form enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'];?>' method='post' class="form-horizontal form-label-left">
					
                      
                      <span class="section">User Info</span>

                      
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nicename">nicename <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nicename" value='<?php if(isset($user_name)) echo $user_name; ?>' class="form-control col-md-7 col-xs-12" name="nicename" placeholder="both nicename(s) e.g nickname " type="text"/>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">location <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="location" value='<?php if(isset($location)) echo $location; ?>' class="form-control col-md-7 col-xs-12" name="location" placeholder="both location(s) e.g location " type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" value='<?php if(isset($email)) echo $email; ?>' class="form-control col-md-7 col-xs-12" name="email" placeholder="both email(s) e.g eng.reem.shwky@gmail.com " type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">URL <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="url" value='<?php if(isset($url)) echo $url; ?>' class="form-control col-md-7 col-xs-12" name="url" placeholder="both url(s) e.g http://www.googl.com " type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" value='<?php if(isset($phone)) echo $phone; ?>' class="form-control col-md-7 col-xs-12" name="phone" placeholder="both phone(s) e.g 00 000 000 " type="text">
                        </div>
                      </div>
					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" value='<?php if(isset($user_name)) echo $user_name; ?>' class="form-control col-md-7 col-xs-12" name="username" placeholder="both Username(s) e.g User name " type="text">
                        </div>
                      </div>
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" class="form-control col-md-7 col-xs-12" name="password" placeholder="write here password " type="password">
                        </div>
                     </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isAdmin">Is Admin <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="checkbox">
                            <label>
                              <input type="checkbox" name='isAdmin' value="1"> check this option when user is admin
                            </label>
                          </div>                        
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input name="User" type="submit" value="Save" class="btn btn-success"/>
							<input type="hidden" name="Insert" value="InsertNew" />
							<button type="submit" class="btn btn-primary">Cancel</button>						  
                        </div>
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