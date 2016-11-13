function ProductDetails(){
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getProductImages",
			data :  {
				"productID":"1"
			},
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.images;
				//console.log(Obj);
				if (Obj != null) {
					
					var len = Obj.length;
					var content= "";
					
					content +='<div class="view-product">';
					content +='<img src="'+Obj[0]+'" alt="" />';								
					content +='</div>';
					content +='<div id="similar-product" class="carousel slide" data-ride="carousel">';
					content +='<div class="carousel-inner">';
					if (len > 0) {
						content +='<div class="item active" style="text-align:center;">';
						var i=0;
						while(i < len){
							if((i%3) == 0 && (i!=0)){
								content +='</div>';
								content +='<div class="item">';
							}
							content +='<a href=""><img src="'+Obj[i]+'" alt="" width="65" style="border:1px solid #eee; padding:2px; text-align:center;"></a>';
							i++;
						}
						content +='</div>';
						content +='</div>';
						content +=' <a class="left item-control" href="#similar-product" data-slide="prev">';
						content +='<i class="fa fa-angle-left"></i>';
						content +='</a>';
						content +='<a class="right item-control" href="#similar-product" data-slide="next">';
						content +='<i class="fa fa-angle-right"></i>';
						content +='</a>';
						content +='</div>';
						
						document.getElementById("ProductImages").innerHTML += content;
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
				}
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}

function addProductReview(){
	var review = document.getElementById("review").value;
	var Rating = document.getElementById("Rating").value;
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/addProductReview",
			data :  {
				"userID":"6",
				"productID":"1",
				"review":"'"+review+"'",
				"rating":Rating
			},
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				//console.log(responseObj);				
				if(responseObj.state == "false"){
					document.getElementById("MessageReview").innerHTML = "Sorry you are make review in this product";
				}else{
					document.getElementById("MessageReview").innerHTML = "Thanks for you .. to make review :)";					
				}
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	
}

function reserveProduct(){
	var quantity = document.getElementById("quantity").value;
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/reserveProduct",
			data :  {				
				"productID":"1",
				"userID":"6",
				"quantity":quantity,
				"userName":"reem",
				"productName":"Infinix X557 Hot 4 Pro - 5.5' Dual SIM Mobile Phone - Sandst"
			},
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				//alert(responseObj);
				console.log(responseObj);				
				if(responseObj.state == "false"){
					document.getElementById("MessageProduct").innerHTML = "This item added before in shopping cart   ";
				}else{
					document.getElementById("MessageProduct").innerHTML = "Thanks for you .. to add this product to shopping cart :)";					
				}
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	
}

function addFavorite(){
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/addFavorite",
			data :  {
				"userID":"6",
				"productID":"2"				
			},
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				//alert(responseObj);
				console.log(responseObj);				
				if(responseObj.state == "false"){
					document.getElementById("MessageProduct").innerHTML = "This item added before in Wishlist ";
				}else{
					document.getElementById("MessageProduct").innerHTML = "Thanks for you .. to add this product to Wishlist :)";					
				}
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });	
}

function CategoriesAll(){
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getCategories",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				console.log(resp);
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.categories;
				if (Obj != null) {
					
                var len = Obj.length;
					var content= "";
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +='<div class="panel panel-default">';
							content +='<div class="panel-heading">';
							content +='<h4 class="panel-title"><a href="#">'+Obj[i].name+'</a></h4>';
							content +='</div>';
							content +='</div>';
							
						}
						document.getElementById("accordian").innerHTML += content;
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}
function BrandAll(){
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getBrands",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				console.log(resp);
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.brands;
				if (Obj != null) {
					
                var len = Obj.length;
					var content= "";
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +="<li><a href=''><span class='pull-right'></span>"+Obj[i].name+"</a></li>";
						}
						document.getElementById("BrandItem").innerHTML += content;
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}
function ProductAll() {

	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getProducts",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				//alert("Server said:\n '" + resp + "'");
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.products;
				if (Obj != null) {
                //document.getElementById("Waiting").style.display = "none";
                var len = Obj.length;
					var content= "";
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content += '<div class="col-sm-4">'; 
							content += '<div class="product-image-wrapper">'; 
							content +='<div class="single-products">';
							content +='<div class="productinfo text-center">';
							content +='<img src="images/home/no_product_img.jpg" alt="'+Obj[i].name+'" />';
							content +='<h2>$'+Obj[i].price+'</h2>';
							content +='<p>'+Obj[i].name+'</p>';
							content +='<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>';
							content +='</div>';
							content +='<div class="product-overlay">';
							content +='<div class="overlay-content">';
							content +='<h2>$'+Obj[i].price+'</h2>';
							content +='<p>'+Obj[i].name+'</p>';
							content +='<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>More Details</a>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
						}
						document.getElementById("ProductItem").innerHTML += content;
					} else {
						//document.getElementById("Error").innerHTML = "???? ?? ???? ????? ??? ?? ???? ????? ?????? ??? ??? ?????? ?? ???? ???";
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	
}