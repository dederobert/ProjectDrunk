$(".heart").click(function(event){
	var img = $(this);
	var nom = $(this).attr("name");
	if (img.hasClass("heart_empty")) {		
		$.ajax(base_url + "/cocktails/favorite/"+nom).done(function(){
				img.removeClass("heart_empty");
				img.addClass("heart_full");
				img.attr("src",base_url+"www/imgs/full_heart.png");
			});
	}else if(img.hasClass("heart_full")) {		
		$.ajax(base_url + "/cocktails/unfavorite/"+nom).done(function(){
				img.attr("src",base_url+"www/imgs/empty_heart.png");
				img.removeClass("heart_full");
				img.addClass("heart_empty");
			});
	}
});