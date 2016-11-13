function BrandAll(){
	var content= "";
	var Lst = JSON.parse(sessionStorage.getItem('Lst_Brands'));
	if(Lst == null){
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getBrands",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.brands;
				if (Obj != null) {
					var LstStore = JSON.stringify(Obj);
					sessionStorage.setItem('Lst_Brands', LstStore);
					var len = Obj.length;
					
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +='<div class="col-sm-4">';
							content +='<div class="product-image-wrapper">';
							content +='<div class="single-products">';
							content +='<div class="productinfo text-center">';
							content +='<a href="brand-details.html?id="'+Obj[i].id+'>';
							content +='<img src="images/shop/product12.jpg" alt="" />';
							content +='<p class="header_brand">'+Obj[i].name+'</p>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
						}
						document.getElementById("BrandsView").innerHTML += content;
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
	}else{
		var len = Lst.length;
		for (i = 0; i < len; i++) {
							content +='<div class="col-sm-4">';
							content +='<div class="product-image-wrapper">';
							content +='<div class="single-products">';
							content +='<div class="productinfo text-center">';
							content +='<a href="brand-details.html?id="'+Lst[i].id+'>';
							content +='<img src="images/shop/product12.jpg" alt="" />';
							content +='<p class="header_brand">'+Lst[i].name+'</p>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
						}
						document.getElementById("BrandsView").innerHTML += content;
	}
}
function BrandByID(ID){
	var Lst = JSON.parse(sessionStorage.getItem('Lst_Brands'));
	console.log(Lst);
	var len = Lst.length;
	for(var i=0;i<len;i++){		
		if(ID == Lst[i].id){
			document.getElementById("Brand_Name").innerHTML = Lst[i].name;
			document.getElementById("Brand_Image").src = Lst[i].image;
			document.getElementById("Brand_Desc").innerHTML = Lst[i].desc;
			return ;
		}
	}
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
							content += '<div class="single-products">';
							content += '<div class="productinfo text-center">';
							content += '<img src="images/home/no_product_img.jpg" alt="'+Obj[i].name+'" />';
							content += '<h2>$'+Obj[i].price+'</h2>';
							content += '<p>'+Obj[i].name+'</p>';
							content += '<a href="product-details.html?id='+Obj[i].id+'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>';
							content += '</div>';
							content += '</div>';
							content += '</div>';
							content += '</div>';
						}
						document.getElementById("BrandProductItem").innerHTML += content;
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