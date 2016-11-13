<?php require_once("includes/header.php");
require_once("includes/class/config.php");
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
                    <h2>Brands <small>add new brand</small></h2>
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
					$Obj = new Brand();				
					if(($_POST["Brand"]) and $_POST['Insert'] == "InsertNew"){
						$Name = strip_tags($_POST['name']);
						$Description = strip_tags($_POST['Description']);
						
						$newfilename = "";
						$uploaddir = '../images/brand/';
						$filename=$_FILES['image']['name'];
						$file=$_FILES['image']['tmp_name'];
						$ext=strtolower(end(explode(".",$filename)));
						if ($ext=="jpg" or $ext=="png" or $ext=="gif" ){
								$newfilename= $Obj->getUniqueCode(10).".".$ext;
								copy ($file,$uploaddir.$newfilename);		// move_uploaded_file
						}
						
						$Image = "images/brand/".$newfilename;
						$result= $Obj->Insert($Name,$Description,$Image);
						if(isset($result)){
							echo "<p style='color:#5cb85c !important; text-align:center;'>add new row </a>";
						}
					}
					?>
                    <form enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'];?>' method='post' class="form-horizontal form-label-left">
					
                      <p>you can add new brand by using this from, and can you see all  <a href="form.html">Brands</a></p>
                      <span class="section">Brand Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="both name(s) e.g brand name " type="text">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<input type="file" id="image" name="image" class="col-md-7 col-xs-12"> -->
						  <input type="file" name="image" />
						  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input name="Brand" type="submit" value="Save" class="btn btn-success"/>
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

 <!-- footer content -->
<?php require_once("includes/footer.php"); ?>
 