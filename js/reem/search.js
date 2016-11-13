function ProductSearchKeyWord(keyword) {
	
if(keyword = 'undefined'){keyword = '';}
	
	
var isFound = false;
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
						if( Obj[i].name.indexOf(keyword) > -1  ||  
							Obj[i].catName.indexOf(keyword) > -1 ||  
							Obj[i].brandName.indexOf(keyword) > -1 ||
							Obj[i].showroomName.indexOf(keyword) > -1
						  ){
							content +='<div class="col-sm-4">';
							content +='<div class="product-image-wrapper">';
							content +='<div class="single-products">';
							content +='<div class="productinfo text-center">';
							content +='<img src="images/home/no_product_img.jpg" alt="'+Obj[i].name+'" />';
							content +='<h2>'+Obj[i].price+'</h2>';
							content +='<p>'+Obj[i].name+'</p>';
							content +='<a href="product-details?id='+Obj[i].id+'" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View details</a>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
							content +='</div>';
							isFound = true;
						  }
					}
					if(isFound == false){
						document.getElementById("ProductItem").innerHTML = "<p class='SearchItemContent'>Not Found result by keyword :- ( "+keyword+" )</p>";
					}else{
						document.getElementById("ProductItem").innerHTML ='<p class="title_search"> The Result of search </p>';
						document.getElementById("ProductItem").innerHTML += content;
					}
				} else {
					document.getElementById("ProductItem").innerHTML = "<p class='SearchItemContent'>Not Found result by keyword :- ( "+keyword+" )</p>";
				}
			}else {
					document.getElementById("ProductItem").innerHTML = "<p class='SearchItemContent'>Not Found result by keyword :- ( "+keyword+" )</p>";
			}
		},  
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.responseText);
			alert(thrownError);
		},cache: false
    });
}