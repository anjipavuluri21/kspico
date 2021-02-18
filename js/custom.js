// JavaScript Document

// =============================
$(document).ready(function(){
	var $searchIcon = $('.search-icon');
	var $searchInput = $('.search-input');  
	$searchIcon.click(function(){
		$searchInput.toggleClass('open');
	});
});