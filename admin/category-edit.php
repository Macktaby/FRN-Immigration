<?php require_once("includes/header.php"); require_once("includes/class/config.php"); require_once("includes/class/category.php");?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Categories</h3>
              </div>

              <div class="title_right"></div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="category-view.php">Categories</a><small>edit information of catalog</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
					$Obj = new Category();
					$gid= intval($_GET['id']);
					if(($_POST["Category"]) and $_POST['Update'] == "UpdateNew"){
						$Name = strip_tags($_POST['Name']);
						$Description = strip_tags($_POST['Description']);
						
						$result= $Obj->Update($gid,$Name,$Description);
						if(isset($result)){
							echo "<p style='color:#5cb85c !important; text-align:center;'>saveing update information </a>";
						}
					}
					$row = $Obj->SelectById($gid);
					?>
                    <form action='<?php echo $_SERVER['PHP_SELF']."?id=".$gid;?>' method='post' class="form-horizontal form-label-left">
                      <p>you can add new brand by using this from, and can you see all  <a href="category-view.php">Category</a></p>
                      <span class="section">Catalog Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Name" class="form-control col-md-7 col-xs-12" name="Name" placeholder="both Name(s) e.g category Name " required="required" value="<?php echo $row['name'];?>" type="text">
                        </div>
                      </div>   
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Description" required="required" name="Description" class="form-control col-md-7 col-xs-12"><?php echo $row['desc']; ?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
							<input name="Category" type="submit" value="Save" class="btn btn-success"/>
							<input type="hidden" name="Update" value="UpdateNew" />
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