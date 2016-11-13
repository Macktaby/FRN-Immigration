function ShowRoomsSearch(){
	var content= "";
	var Lst = JSON.parse(sessionStorage.getItem('Lst_Branches'));
	if(Lst == null){
		$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getShowRooms",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				console.log(resp);
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.showrooms;
				if (Obj != null) {
					var LstStore = JSON.stringify(Obj);
					sessionStorage.setItem('Lst_Branches', LstStore);
					
					var len = Obj.length;
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +='<li>';
							content +='<div class="checkbox">';
							content +='<label><input type="checkbox" name="ShowRoomItem" value="'+Obj[i].id+'">'+Obj[i].name+'</label>';
							content +='</div>';
							content +='</li>';
						}						
					} else {
						document.getElementById("BranchesCheckBox").innerHTML = "<p>Not Found </p> ";
					}
					document.getElementById("BranchesCheckBox").innerHTML += content;
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
		});
	}else{
		var len = Lst.length;
		if (len > 0) {
				for (i = 0; i < len; i++) {
					content +='<li>';
					content +='<div class="checkbox">';
					content +='<label><input type="checkbox" name="ShowRoomItem" value="'+Lst[i].id+'">'+Lst[i].name+'</label>';
					content +='</div>';
					content +='</li>';
				}
		}
		document.getElementById("BranchesCheckBox").innerHTML += content;
	}
	
}
function CategoriesAllSide(){
	var content= "";
	var Lst = JSON.parse(sessionStorage.getItem('Lst_Categories'));
	if(Lst == null){
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
					var LstStore = JSON.stringify(Obj);
					sessionStorage.setItem('Lst_Categories', LstStore);
					
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +='<li>';
							content +='<div class="checkbox">';
							content +='<label><input type="checkbox" name="CategoriesItem" value="'+Obj[i].id+'">'+Obj[i].name+'</label>';
							content +='</div>';		
							content +='</li>';							
						}		
					} else {
						document.getElementById("CategoriesCheckBox").innerHTML = "<p>Not Found Categories</p> ";
					}
					document.getElementById("CategoriesCheckBox").innerHTML += content;
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	}else{
		var len = Lst.length;
		if (len > 0) {
				for (i = 0; i < len; i++) {
					content +='<li>';
					content +='<div class="checkbox">';
					content +='<label><input type="checkbox" name="CategoriesItem" value="'+Lst[i].id+'">'+Lst[i].name+'</label>';
					content +='</div>';
					content +='</li>';
				}
		}
		document.getElementById("CategoriesCheckBox").innerHTML += content;
	}
}
function BrandSearch(){
	var content= "";
	var Lst = JSON.parse(sessionStorage.getItem('Lst_Brands'));
	if(Lst == null){
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getBrands",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				console.log(resp);
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.brands;
				if (Obj != null) {
					var LstStore = JSON.stringify(Obj);
					sessionStorage.setItem('Lst_Brands', LstStore);
					
					var len = Obj.length;
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +='<li>';
							content +='<div class="checkbox">';
							content +='<label><input type="checkbox" name="BrandItem" value="'+Obj[i].id+'">'+Obj[i].name+'</label>';
							content +='</div>';
							content +='</li>';
						}						
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
					document.getElementById("BrandsCheckBox").innerHTML += content;
				}				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	}else{
		var len = Lst.length;
		if (len > 0) {
			for (i = 0; i < len; i++) {
				content +='<li>';
				content +='<div class="checkbox">';
				content +='<label><input type="checkbox" name="BrandItem" value="'+Lst[i].id+'">'+Lst[i].name+'</label>';
				content +='</div>';
				content +='</li>';
			}						
		} else {
				document.getElementById("BrandsCheckBox").innerHTML = "<p>Not Found Bracnhes</p>";
		}
		document.getElementById("BrandsCheckBox").innerHTML += content;
	}
}
function GetShowRoow(){
	var checkedValue = []; 
	var inputShowRoom = document.getElementsByName('ShowRoomItem');
	var j=0;
	for(var i=0; i< inputShowRoom.length; i++){
		  if(inputShowRoom[i].checked){
			   checkedValue[j] = inputShowRoom[i].value;
			   j++;
		  }
	}
	return checkedValue;
}

function GetCategories(){
	var checkedValue = []; 
	var inputShowRoom = document.getElementsByName('CategoriesItem');
	var j=0;
	for(var i=0; i< inputShowRoom.length; i++){
		  if(inputShowRoom[i].checked){
			   checkedValue[j] = inputShowRoom[i].value;
			   j++;
		  }
	}
	return checkedValue;
}
function GetBrand(){
	var checkedValue = []; 
	var inputShowRoom = document.getElementsByName('BrandItem');
	var j=0;
	for(var i=0; i< inputShowRoom.length; i++){
		  if(inputShowRoom[i].checked){
			   checkedValue[j] = inputShowRoom[i].value;
			   j++;
		  }
	}
	return checkedValue;
}
function AdvanceSearch(){
	document.getElementById("ProductItem").innerHTML ='<img src="images/loading.gif" alt=" ... Loading image ... " class="contain_loading"/>';

	var ShowroomChecked = GetShowRoow();
	var CategoriesChedked = GetCategories();
	var BrandChecked = GetBrand();
	
	console.log(ShowroomChecked+" - "+CategoriesChedked+" - "+BrandChecked);
	
	
	
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
						
						if( ShowroomChecked.indexOf(Obj[i].showroomID.toString()) > -1  ||  
							CategoriesChedked.indexOf(Obj[i].catID.toString()) > -1 ||  
							BrandChecked.indexOf(Obj[i].brandID.toString()) > -1  
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
						document.getElementById("ProductItem").innerHTML = "<p class='SearchItemContent'>Not Found result for searching </p>";
					}else{
						document.getElementById("ProductItem").innerHTML = '<p class="title_search"> The Result of search </p>';
						document.getElementById("ProductItem").innerHTML = content;
					}
				} else {
					document.getElementById("ProductItem").innerHTML = "<p class='SearchItemContent'>Not Found result for searching </p>";
				}
			}else {
					document.getElementById("ProductItem").innerHTML = "<p class='SearchItemContent'>Not Found result for searching</p>";
			}
		},  
		error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.responseText);
			alert(thrownError);
		},cache: false
    });
	
	//alert(ShowroomChecked + '  =  '+ CategoriesChedked + '  =  '+BrandChecked);
	//alert(JSON.stringify(ShowroomChecked));
	
	/*
	var dataString ="brands=1&brands=2&brands=3&categories=1";
	$.ajax({
			type: "POST",
			url: "imageinterior-merged.rhcloud.com/ImageInterior/rest/filterProductsGroup",			
			data :  {
				"brands":"''",
				"categories":"''",
				"showrooms":"''"
			},
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){  
				console.log(resp);
				alert('get respose :- '+ resp);
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.brands;
				if (Obj != null) {
					
					var len = Obj.length;
					if (len > 0) {
						for (i = 0; i < len; i++) {
							
						}						
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
					//document.getElementById("BrandsCheckBox").innerHTML += content;
				}				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	*/
}