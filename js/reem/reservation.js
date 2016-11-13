function getUserReservation(){
	var ObjLoginUser = JSON.parse(sessionStorage.getItem('obj_user'));
	var UserID = ObjLoginUser.id;
	
	var waiting = '<tr>';
	waiting +='<td colspan="5" style="text-align:center; margin-left:20px;">';	
	waiting += "<img src='images/loading-ring.gif' />";
	waiting +='</td>';
	waiting +='</tr>';
	document.getElementById("reservation").innerHTML = waiting;
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getUserReservations",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"userID":UserID		
			},
			success: function(resp){
				var responseObj =JSON.parse(resp);
				console.log(responseObj);
				var Obj = responseObj.reservations;
				if (Obj != null) {	
					console.log(Obj);
					var len = Obj.length;
					var content= "";
					if (len > 0) {
						var Total =0;
						for (i = 0; i < len; i++) {							
							content +="<tr>";
							content +='<td class="cart_product">';
							content +='<a href="product-details.html?id=1"><img src="'+Obj[i].product.image+'" alt="" style="width:100px;"></a>';
							content +='</td>';
							content +='<td class="cart_description">';
							content +='<h4 style="width:50%;"><a href="product-details.html?id=1">'+Obj[i].product.name+'</a></h4>';
							content +='</td>';
							content +='<td class="cart_price">';
							content +='<p>$'+Obj[i].product.price+'</p>';
							content +='</td>';
							content +='<td class="cart_quantity">';
							content +='<p>'+Obj[i].reserved_quantity+'</p>';
							content +='</td>';
							
							content +='<td class="cart_total">';
							content +='<p>$'+Obj[i].product.price * Obj[i].reserved_quantity+'</p>';
							Total +=(Obj[i].product.price * Obj[i].reserved_quantity);
							content +='</td>';
							
							content +='<td class="cart_delete">';
							content +='<a class="cart_quantity_delete" href="javascript:void(0);" onclick="removeReservation('+Obj[i].id+');"><i class="fa fa-times"></i></a>';
							content +='</td>';
							content +='</tr>';							
						}
						document.getElementById("reservation").innerHTML = content;
						document.getElementById("TotalPrice").innerHTML +=Total;
					} else {
						document.getElementById("reservation").innerHTML ='<tr>';
						document.getElementById("reservation").innerHTML +='<td colspan="4">';
						document.getElementById("reservation").innerHTML += "<p class='found'>Not found item resveration , and you can fill it by go to <a href='product.html'> Products </a> choose it. </p>";
						document.getElementById("reservation").innerHTML +='</td>';
						document.getElementById("reservation").innerHTML +='</tr>';
					}
				}
				
			},  
		    error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText+" "+thrownError);
			},cache: false
    });
}

function removeReservation(reservationID){
	var ObjLoginUser = JSON.parse(sessionStorage.getItem('obj_user'));
	var UserID = ObjLoginUser.id;
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/cancelReservation",
			contentHeader: "application/x-www-form-urlencoded",
			data :  {
				"reservationID":reservationID
			},
			success: function(resp){  
				console.log(resp);
				var responseObj =JSON.parse(resp);
				getUserReservation();
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
}