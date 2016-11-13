<?php require_once("includes/header.php"); require_once("includes/class/config.php"); require_once("includes/class/showroom.php");?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Braches</h3>
              </div>

              <div class="title_right"></div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="showroom-view.php">Braches</a> <small>edit information for branches</small></h2>
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
					$Obj = new Showroom();	
					$gid= intval($_GET['id']);
					if(($_POST["Showroom"]) and $_POST['Update'] == "UpdateRow"){
						$Name = strip_tags($_POST['name']);
						$Description = strip_tags($_POST['Description']);
						$Address = strip_tags($_POST['Address']);
						$location = strip_tags($_POST['location']);
						$Phone = strip_tags($_POST['Phone']);
						$Image = $row['image'];
						$newfilename = "";
						$uploaddir = '../images/Showroom/';
						$filename=$_FILES['image']['name'];
						$file=$_FILES['image']['tmp_name'];
						$ext=strtolower(end(explode(".",$filename)));
						if ($ext=="jpg" or $ext=="png" or $ext=="gif" ){
								$newfilename= $Obj->getUniqueCode(10).".".$ext;
								copy ($file,$uploaddir.$newfilename);		// move_uploaded_file
								$Image = "images/Showroom/".$newfilename;
						}
						
						
						$result= $Obj-> Update($gid,$Name,$Description,$Address,$location,$Phone,$Image);
						if(isset($result)){
							echo "<p style='color:#5cb85c !important; text-align:center;'>save editing information to branch</a>";
						}
					}
					
					$row = $Obj->SelectById($gid);
					?>
					
                    <form enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'].'?id='.$gid;?>' method='post' class="form-horizontal form-label-left" novalidate>

                      <p>you can edit information by using this from, and can you see all  <a href="form.html">Branches</a>
                      </p>
                      <span class="section">Branch? Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="both name(s) e.g brand name " required="required" value="<?php echo $row['name'];?>" type="text">
                        </div>
                      </div>
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">location <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="location" class="form-control col-md-7 col-xs-12" name="location" placeholder="enter your location " value="<?php echo $row['location'];?>" required="required" type="text">
                        </div>
                    </div>
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Phone" class="form-control col-md-7 col-xs-12" name="Phone" placeholder="enter your phone" required="required" type="text" value="<?php echo $row['phone'];?>" />
                        </div>
                    </div>
                   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Address" required="required" name="Address" class="form-control col-md-7 col-xs-12"><?php echo $row['address'];?></textarea>
                        </div>
                      </div>                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Description" required="required" name="Description" class="form-control col-md-7 col-xs-12"><?php echo $row['desc'];?></textarea>
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Image <span class="required">*</span></label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
						   <img src="../<?php echo $row['image'];?>" style="width:200px; margin-bottom:4px;" />
							<br/>
							<input type="file" id="image" name="image" required="required" class="col-md-7 col-xs-12">
						  </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input name="Showroom" type="submit" value="Save" class="btn btn-success"/>
							<input type="hidden" name="Update" value="UpdateRow" />
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