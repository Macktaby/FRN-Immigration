function ShoowRoomsAll(){
	var content= "";
	var Lst = JSON.parse(sessionStorage.getItem('Lst_Branches'));
	if(Lst == null){
		
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getShowRooms",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.showrooms;
				if (Obj != null) {
					var Lst_Branches = JSON.stringify(Obj);
					sessionStorage.setItem('Lst_Branches', Lst_Branches);
					var len = Obj.length;
					var content= "";
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +='<div class="single-blog-post">';
							content +='<h3>Girls Pink T Shirt arrived in store</h3>';
							content +='<div class="post-meta">';
							content +='<ul>';
							content +='<li><i class="fa fa-map-marker"></i>'+Obj[i].address +'</li>';
							content +='<li><i class="fa fa-phone"></i>'+Obj[i].phone+'</li>';
							content +='</ul>';
							content +='</div>';
							content +='<a href="branches-details.html?id='+Obj[i].id+'">';
							content +='<img src="'+Obj[i].image+'" alt="">';
							content +='</a>';
							content +='<p>'+Obj[i].desc+'</p>';
							content +='<a  class="btn btn-primary" href="branches-details.html?id='+Obj[i].id+'">Read More</a>';
							content +='</div>';
							content +='';
							content +='';
						
						}
						document.getElementById("BranchesItem").innerHTML += content;
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
			content +='<div class="single-blog-post">';
			content +='<h3>Girls Pink T Shirt arrived in store</h3>';
			content +='<div class="post-meta">';
			content +='<ul>';
			content +='<li><i class="fa fa-map-marker"></i>'+Lst[i].address +'</li>';
			content +='<li><i class="fa fa-phone"></i>'+Lst[i].phone+'</li>';
			content +='</ul>';
			content +='</div>';
			content +='<a href="branches-details.html?id='+Lst[i].id+'">';
			content +='<img src="'+Lst[i].image+'" alt="">';
			content +='</a>';
			content +='<p>'+Lst[i].desc+'</p>';
			content +='<a  class="btn btn-primary" href="branches-details.html?id='+Lst[i].id+'">Read More</a>';
			content +='</div>';
						
		}
						document.getElementById("BranchesItem").innerHTML += content;
	}
}
function ShoowRoomByID(ID){
	console.log(sessionStorage.getItem('Lst_Branches'));
	var Lst_Branches = JSON.parse(sessionStorage.getItem('Lst_Branches'));
	console.log(Lst_Branches);
	var len = Lst_Branches.length;
	for(var i=0;i<len;i++){		
		if(ID == Lst_Branches[i].id){
			document.getElementById("Branch_Name").innerHTML = Lst_Branches[i].name;
			document.getElementById("Branch_Image").src = Lst_Branches[i].image;
			document.getElementById("Branch_Desc").innerHTML = Lst_Branches[i].desc;
			return ;
		}
	}
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
						document.getElementById("BranchesProductItem").innerHTML += content;
					} else {
						document.getElementById("BranchesProductItem").innerHTML += "<p>Sorry not found item related with branch</p>";
					}
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}