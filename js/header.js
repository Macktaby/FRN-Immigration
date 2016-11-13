var pervoius_url = "index.html";

window.onload = function ()
    {
        var header = document.getElementById('header');
        var footer = document.getElementById('footer');
		
		var h = '<div class="header_top">';
		h +='<div class="container">';
		h +='<div class="row">';
		h +='<div class="col-sm-6 ">';
		h +='<div class="contactinfo">';
		h +='<ul class="nav nav-pills">';
		h +='<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>';
		h +='<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>';
		h +='</ul>';
		h +='</div>';
		h +='</div>';
		h +='<div class="col-sm-6">';
		h +='<div class="social-icons pull-right">';
		h +='<ul class="nav navbar-nav">';
		h +='<li><a href=""><i class="fa fa-facebook"></i></a></li>';
		h +='<li><a href=""><i class="fa fa-twitter"></i></a></li>';
		h +='<li><a href=""><i class="fa fa-linkedin"></i></a></li>';
		h +='<li><a href=""><i class="fa fa-dribbble"></i></a></li>';
		h +='<li><a href=""><i class="fa fa-google-plus"></i></a></li>';
		h +='</ul>';
		h +='</div>';
		h +='</div>';
		h +='</div>';
		h +='</div>';
		h +='</div>';
		h+='<div class="header-middle">';
		h+='<div class="container">';
		h+='<div class="row">';
		h+='<div class="col-sm-4">';
		h+='<div class="logo pull-left">';
		h+='<a href="index.html"><img src="images/home/logo.png" alt="" /></a>';
		h+='</div>';
		h+='</div>';
		h+='<div class="col-sm-8">';
		h+='<div class="shop-menu pull-right">';
		h+='<ul class="nav navbar-nav">';
		var ObjLoginUser = JSON.parse(sessionStorage.getItem('obj_user'));
		if (ObjLoginUser == null) {
			h+='<li><a href="login.html"><i class="fa fa-user"></i> Account</a></li>';
		}else{
			h+='<li><a href="profile.html"><i class="fa fa-user"></i> Profile</a></li>';
		}
		h+='<li><a href="wishlist.html"><i class="fa fa-star"></i> Wishlist</a></li>';
		h+='<li><a href="reservation.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>';
		
		
		if (ObjLoginUser == null) {
			h+='<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>';
		}else{
			h+='<li><a href="javascript:void(0);" onclick="Logout();"><i class="fa fa-lock"></i><span class="err"> Logout</span></a></li>';
		}
		
		
		h+='</ul>';
		h+='</div>';
		h+='</div>';
		h+='</div>';
		h+='</div>';
		h+='</div>';
		
		h+='<div class="header-bottom">';
		h+='<div class="container">';
		h+='<div class="row">';
		h+='<div class="col-sm-9">';
		h+='<div class="navbar-header">';
		h+='<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">';
		h+='<span class="sr-only">Toggle navigation</span>';
		h+='<span class="icon-bar"></span>';
		h+='<span class="icon-bar"></span>';
		h+='<span class="icon-bar"></span>';
		h+='</button>';
		h+='</div>';
		h+='<div class="mainmenu pull-left">';
		h+='<ul class="nav navbar-nav collapse navbar-collapse">';
		h+='<li><a href="index.html">Home</a></li>';
		h+='<li class="dropdown"><a href="product.html" class="active">Shop<i class="fa fa-angle-down"></i></a>';
		h+=' <ul role="menu" class="sub-menu">';
		h+='<li><a href="product.html" class="active">Products</a></li>';
		h+='<li><a href="checkout.html">Wishlist</a></li>';
		h+='<li><a href="cart.html">Cart</a></li> ';
		h+='</ul>';
		h+='</li> ';
		h+='<li><a href="branches.html">Branches</a></li>';
		h+='<li><a href="brands.html">Brands</a></li>';
		//h+='<li><a href="contact-us.html">Contact</a></li>';
		h+='</ul>';
		h+='</div>';
		h+='</div>';
		h+='<div class="col-sm-3">';
		h+='<div class="search_box pull-right">';
		h+='<input id="searchword" type="text" placeholder="Search" onkeypress="return searchKeyPress(event);"/>';
		h+='<input type="button" class="search_input_new" id="btnSearch" Value="GO" onclick="doSearching();" />';
		h+='</div>';
		h+='</div>';
		h+='</div>';
		h+='</div>';
		h+='</div>'; 
		
        header.innerHTML = h;
		
		var f = '<div class="footer-widget">';
		f += '<div class="container">';
		f += '<div class="row">';
		f += '<div class="col-sm-2">';
		f += '<div class="single-widget">';
		f += '<h2>Products</h2>';
		f += '<ul class="nav nav-pills nav-stacked">';
		f += '<li><a href="product.html">Products</a></li>';
		f += '<li><a href="wishlist.html">Wishlist<a></li>';
		f += '<li><a href="reservation.html">Reservation</a></li>';
		f += '</ul>';
		f += '</div>';
		f += '</div>';
		f += '<div class="col-sm-2">';
		f += '<div class="single-widget">';
		f += '<h2>Shop</h2>';
		f += '<ul class="nav nav-pills nav-stacked">';
		f += '<li><a href="branches.html">Branches</a></li>';
		f += '<li><a href="brands.html">Brands</a></li>';
		f += '<li><a href="">Womens</a></li>';
		f += '</ul>';
		f += '</div>';
		f += '</div>';
		f += '<div class="col-sm-2">';
		f += '<div class="single-widget">';
		f += '<h2>Policies</h2>';
		f += '<ul class="nav nav-pills nav-stacked">';
		f += '<li><a href="">Terms of Use</a></li>';
		f += '<li><a href="">Privecy Policy</a></li>';
		f += '<li><a href="">Refund Policy</a></li>';
		f += '</ul>';
		f += '</div>';
		f += '</div>';
		f += '<div class="col-sm-2">';
		f += '<div class="single-widget">';
		f += '<h2>Account</h2>';
		f += '<ul class="nav nav-pills nav-stacked">';
		f += '<li><a href="login.html">login</a></li>';
		f += '<li><a href="login.html">Register</a></li>';
		f += '<li><a href="profile.html">Change Password</a></li>';
		f += '</ul>';	
		f += '</div>';	
		f += '</div>';	
		f += '<div class="col-sm-3 col-sm-offset-1">';	
		f += '<div class="single-widget">';	
		f += '<h2>About Shopper</h2>';	
		f += '<form action="#" class="searchform">';	
		f += '<input type="text" placeholder="Your email address" />';	
		f += '<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>';	
		f += '<p>Get the most recent updates from <br />our site and be updated your self...</p>';	
		f += '</form>';	
		f += '</div>';	
		f += '</div>';	
		f += '</div>';	
		f += '</div>';	
		f += '</div>';	
		f += '<div class="footer-bottom">';	
		f += '<div class="container">';	
		f += '<div class="row">';	
		f += '<p class="pull-left">Copyright © 2013 My Company. All rights reserved.</p>';
		f += '<p class="pull-right">Developer by <span><a target="_blank" href="http://eng.reem.shwky@gmail.com">Reem Shwky</a></span></p>';
		f += '</div>';
		f += '</div>';
		f += '</div>';
		
			
        footer.innerHTML = f;
}
function searchKeyPress(e)
{
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {
        document.getElementById('btnSearch').click();
        return false;
    }
    return true;
}
function doSearching(){
	location.href="search.html?search=" + document.getElementById('searchword').value;
}