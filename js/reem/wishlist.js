function getUserWishlist(){
	var UserID = 2;
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getUserWishlist",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"userID":UserID		
			},
			success: function(resp){  
				//console.log(resp);
				var responseObj =JSON.parse(resp);
				
				
				var Obj = responseObj.products;
				if (Obj != null) {
					
                var len = Obj.length;
					var content= "";
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +="<tr>";
							content +='<td class="cart_product">';
							content +='<a href=""><img src="'+Obj[i].image+'" alt="" style="width:110px;"></a>';
							content +='</td>';
							content +='<td class="" style="padding:0px; width:70% !important;">';
							content +='<h4><a href="">'+Obj[i].name+'</a></h4>';
							content +='<p style="width:80%;">Description: '+Obj[i].desc+'</p>';
							content +='</td>';
							content +='<td class="cart_price">';
							content +='<p>$'+Obj[i].price+'</p>';
							content +='</td>';							
							
							content +='<td class="cart_delete">';
							content +='<a class="cart_quantity_delete" href="javascript:void(0);" onclick="removeFavorite('+UserID+','+Obj[i].id+');"><i class="fa fa-times"></i></a>';
							content +='</td>';
							content +='</tr>';							
						}
						document.getElementById("wishlist").innerHTML += content;
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

function removeFavorite(UserID,ProductID){
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/removeFavorite",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"userID":UserID,
				"productID":ProductID
			},
			success: function(resp){  
				console.log(resp);
				var responseObj =JSON.parse(resp);
				
				
				getUserWishlist();
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}