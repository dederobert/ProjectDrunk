$(".heart").click(function(event){
	event.preventDefault();
	var img = $(this);
	var nom = $(this).attr("name");
	if (img.hasClass("heart_empty")) {		
		$.ajax(base_url + "/users/favorite/"+nom).done(function(){
				img.removeClass("heart_empty");
				img.addClass("heart_full");
				img.attr("src",base_url+"www/imgs/full_heart.png");
				Materialize.toast("Cocktail ajouté aux favoris", 4000);
				img.parent().attr("data-tooltip", "Retirer des favories");
			});
	}else if(img.hasClass("heart_full")) {		
		$.ajax(base_url + "/users/unfavorite/"+nom).done(function(){
				img.attr("src",base_url+"www/imgs/empty_heart.png");
				img.removeClass("heart_full");
				img.addClass("heart_empty");
				Materialize.toast("Cocktail retiré des favories", 4000);
				img.parent().attr("data-tooltip", "Ajouter aux favoris");
			});
	}
});