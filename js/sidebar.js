function sidebarAll(){
	
	/*
	$.ajaxq("queue", {
		url: '/api/user/login',
		type: "POST",
		data: { 
			username: "username", 
			password: "password"
		},
		success: function(data) {
			document.write("Logged in...<br />");
		}
	});
	*/
}

function ShowRoomsAllSide(){
	var content= "";
	var Lst_Branches = JSON.parse(sessionStorage.getItem('Lst_Branches'));
	if(Lst_Branches != null){
		var len = Lst_Branches.length;
			content +='<div class="brands_products">';
			content +='<h2>Branches</h2>';
			content +='<div class="brands-name">';
			content +='<ul class="nav nav-pills nav-stacked">';
			if (len > 0) {
				for (i = 0; i < len; i++) {
					content +="<li><a href='product-search.html?showroom="+Lst_Branches[i].id+"'><span class='pull-right'></span>"+Lst_Branches[i].name+"</a></li>";
				}
			} 
			content +='</ul>';
			content +='</div>';
			content +='</div>';
			document.getElementById("sidebar").innerHTML += content;
	}
	
}
function CategoriesAllSide(){
	var content = "";
	var Lst_Categories = JSON.parse(sessionStorage.getItem('Lst_Categories'));
	if(Lst_Categories != null){
		var len = Lst_Categories.length;
		for (i = 0; i < len; i++) {
			content +='<div class="panel panel-default">';
			content +='<div class="panel-heading">';
			content +='<h4 class="panel-title"><a href="product-search.html?cat='+Lst_Categories[i].id+'">'+Lst_Categories[i].name+'</a></h4>';
			content +='</div>';
			content +='</div>';
		}
		document.getElementById("sidebar").innerHTML += content;
	}
}
function BrandAllSide(){
	var content= "";
	var Lst_Brands = JSON.parse(sessionStorage.getItem('Lst_Brands'));
	if(Lst_Brands != null){
		var len = Lst_Brands.length;
		content ='<div class="brands_products">';
		content +='<h2>Brands</h2>';
		content +='<div class="brands-name">';
		content +='<ul class="nav nav-pills nav-stacked" id="BrandItem">';
		if (len > 0) {
			for (i = 0; i < len; i++) {
				content +="<li><a href='product-search.html?brand="+Lst_Brands[i].id+"'><span class='pull-right'></span>"
				content +=Lst_Brands[i].name+"</a></li>";
			}
						
		} else {
			document.getElementById("Error").innerHTML = "error ";
		}
		content +='</ul>';
		content +='</div>';
		content +='</div>';
		document.getElementById("sidebar").innerHTML += content;
	}
}
function sidebar(){
		
}



$(document).ready(function () {
	var Lst_Brands = JSON.parse(sessionStorage.getItem('Lst_Brands'));
	var Lst_Branches = JSON.parse(sessionStorage.getItem('Lst_Branches'));
	var Lst_Categories = JSON.parse(sessionStorage.getItem('Lst_Categories'));
	
	//if(Lst_Brands == null && Lst_Branches == null && Lst_Categories == null){
		
	var content ="";	
    var requestCallback = new MyRequestsCompleted({
        numRequest: 3,
        singleCallback: function(){
           // alert( "I'm the callback");
        }
    });
    $.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getCategories",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				requestCallback.requestComplete(true);
				
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.categories;
				var Lst_Categories = JSON.stringify(Obj);
				sessionStorage.setItem('Lst_Categories', Lst_Categories);				
				if (Obj != null) {
					var len = Obj.length;
					
					var content = '';
					content +='<div class="brands_products">';
					content +='<h2>Category</h2>';
					content +='<div class="brands-name">';
					content +='<ul class="nav nav-pills nav-stacked">';
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +="<li><a href='product-search.html?cat="+Obj[i].id+"'><span class='pull-right'></span>"+Obj[i].name+"</a></li>";
						}
						
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
					content +='</ul>';
					content +='</div>';
					content +='</div>';
					document.getElementById("sidebar").innerHTML += content;
					
				}				
			},  
		error: function (xhr, ajaxOptions, thrownError) {
						alert(xhr.responseText + " " +thrownError);
		},cache: false
	});
	
	$.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getShowRooms",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){ 
			    requestCallback.requestComplete(true);
				var responseObj =JSON.parse(resp);		
					
				var Obj = responseObj.showrooms;
				if (Obj != null) {					
					var len = Obj.length;
					var content = '';
					content +='<div class="brands_products">';
					content +='<h2>Branches</h2>';
					content +='<div class="brands-name">';
					content +='<ul class="nav nav-pills nav-stacked">';
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +="<li><a href='product-search.html?showroom="+Obj[i].id+"'><span class='pull-right'></span>"+Obj[i].name+"</a></li>";
						}
						
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
					content +='</ul>';
					content +='</div>';
					content +='</div>';
					document.getElementById("sidebar").innerHTML += content;
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
	});
		
    $.ajax({
			type: "POST",
			url: "http://imageinterior-merged.rhcloud.com/ImageInterior/rest/getBrands",
			contentHeader: "application/x-www-form-urlencoded",
			success: function(resp){
				requestCallback.requestComplete(true);				
				console.log(resp);
				var responseObj =JSON.parse(resp);
				var Obj = responseObj.brands;
				if (Obj != null) {					
					var len = Obj.length;					
					content ='<div class="brands_products">';
					content +='<h2>Brands</h2>';
					content +='<div class="brands-name">';
					content +='<ul class="nav nav-pills nav-stacked" id="BrandItem">';
					if (len > 0) {
						for (i = 0; i < len; i++) {
							content +="<li><a href='product-search.html?brand="+Obj[i].id+"'><span class='pull-right'></span>"+Obj[i].name+"</a></li>";
						}
						
					} else {
						document.getElementById("Error").innerHTML = "error ";
					}
					content +='</ul>';
					content +='</div>';
					content +='</div>';
					document.getElementById("sidebar").innerHTML += content;
				}
				
			},  
		   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.responseText);
					alert(thrownError);
				  },cache: false
    });
	}else{
		CategoriesAllSide();
		ShowRoomsAllSide();
		BrandAllSide();
	}
});

var MyRequestsCompleted = (function() {
    var numRequestToComplete, 
        requestsCompleted, 
        callBacks, 
        singleCallBack; 

    return function(options) {
        if (!options) options = {};

        numRequestToComplete = options.numRequest || 0;
        requestsCompleted = options.requestsCompleted || 0;
        callBacks = [];
        var fireCallbacks = function () {
            alert("we're all complete");
            for (var i = 0; i < callBacks.length; i++) callBacks[i]();
        };
        if (options.singleCallback) callBacks.push(options.singleCallback);

        

        this.addCallbackToQueue = function(isComplete, callback) {
            if (isComplete) requestsCompleted++;
            if (callback) callBacks.push(callback);
            if (requestsCompleted == numRequestToComplete) fireCallbacks();
        };
        this.requestComplete = function(isComplete) {
            if (isComplete) requestsCompleted++;
            if (requestsCompleted == numRequestToComplete) fireCallbacks();
        };
        this.setCallback = function(callback) {
            callBacks.push(callBack);
        };
    };
})();