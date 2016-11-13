<?php require_once("includes/header.php"); require_once("includes/class/config.php"); 
require_once("includes/class/brand.php");?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Brands</h3>
              </div>

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
                    <h2><a href="brand-view.php">Brands </a><small>edit brand info</small></h2>
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
					$Obj = new Brand();
					
					if(($_POST["BrandEdit"]) and $_POST['Update'] == "EditRow"){
						
						$Name = strip_tags($_POST['name']);
						$Description = strip_tags($_POST['Description']);
						$Image = $row['image'];
						
						$newfilename = "";
						$uploaddir = '../images/brand/';
						$filename=$_FILES['image']['name'];
						$file=$_FILES['image']['tmp_name'];
						$ext=strtolower(end(explode(".",$filename)));
						if ($ext=="jpg" or $ext=="png" or $ext=="gif" ){
								$newfilename= $Obj->getUniqueCode(10).".".$ext;
								copy ($file,$uploaddir.$newfilename);
								$Image = "images/brand/".$newfilename;
						}					
						
						$result= $Obj->Update($gid,$Name,$Description,$Image);
						if(isset($result)){
							echo "<p style='color:#5cb85c !important; text-align:center;'>saveing edit information data</a>";
						}
					}
					
					$row = $Obj->SelectById($gid);
					?>
                    <form enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF']."?id=".$row['brand_id'];?>' method='post' class="form-horizontal form-label-left">
					 <p>you can edit info brand by using this from, and can you see all  <a href="form.html">Brands</a></p>
                      <span class="section">Brand Info</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="both name(s) e.g brand name " value='<?php echo $row['name'];?>' type="text">
                        </div>
                      </div>                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Description" name="Description" class="form-control col-md-7 col-xs-12"><?php echo $row['desc'];?></textarea>
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img src="../<?php echo $row['image'];?>" style="width:200px; margin-bottom:4px;" />
						  <input type="file" name="image" />
						  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input type="submit" name="BrandEdit" value="Save editing" class="btn btn-success"/>
							<input type="hidden" name="Update" value="EditRow" />
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
<?php require_once("includes/footer.php"); ?>