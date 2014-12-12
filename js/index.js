$(document).ready(function(){
	$(".list").mouseenter(function(){
		$(this).find("ul").fadeTo(200,0.9);
	});

	$(".list").mouseleave(function(){
		$(this).find("ul").fadeTo(200,0);
	});
});