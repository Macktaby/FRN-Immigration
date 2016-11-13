function ProductAll() {

	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getProducts",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				console.log(responseObj);
				var Obj = responseObj.products;
				if (Obj != null) {
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

function ProductBrandID(brandId){
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/filterProducts",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"brandID":""+brandId+"",
				"catID":"0",
				"showroomID":"0"
			},
			success: function(resp){  
				//alert("Server said:\n '" + resp + "'");
				var responseObj =JSON.parse(resp);
				console.log(responseObj);
				var Obj = responseObj.products;
				if (Obj != null) {
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
						//
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}

function ProductCatID(catId){
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/filterProducts",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"brandID":"0",
				"catID":""+catId+"",
				"showroomID":"0"
			},
			success: function(resp){  
				//alert("Server said:\n '" + resp + "'");
				var responseObj =JSON.parse(resp);
				console.log(responseObj);
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
						//
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}

function ProductsShowroomID(showroomId){
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/filterProducts",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"brandID":"0",
				"catID":"0",
				"showroomID":""+showroomId+""
			},
			success: function(resp){  
				//alert("Server said:\n '" + resp + "'");
				var responseObj =JSON.parse(resp);
				console.log(responseObj);
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
						//
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}

