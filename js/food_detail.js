$(document).ready(function(){
	$("strong.cooking").click(function(){
		$("#comment").hide();
		$("#cooking").show();	
	});

	$("strong.comment").click(function(){
		$("#cooking").hide();
		$("#comment").show();
	});
	
	$("span").click(function(){
		$(this).siblings(".reply").toggle();	
	});
});