$(function() {

$("#sub").click( function(){

	var file = $("#myForm").attr("action");
	var data = $("#myForm :input").serializeArray();
	var output =  function(info) {

		$("#res").html(info);
		$("#myForm").trigger('reset');
	}

	$.post(file,data,output);

	// $.post( $("#myForm").attr("action"), $("#myForm :input").serializeArray(), function(info) {

	// 	$("#res").html(info);
	// 	$("#myForm").trigger('reset');
	// });

});

$("#myForm").submit( function() {

		return false;
	});
});