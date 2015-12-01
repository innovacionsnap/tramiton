$(".problema-checkbox").change(function() {
	// console.log("change");

	if(countChecked(this)==0){
		$(this).parent().parent().parent().parent().find('.panel-heading').css("background-color","#FAFAFA");
	}else{
		$(this).parent().parent().parent().parent().find('.panel-heading').css("background-color","rgb(209, 231, 237)");
	}
});


function countChecked(item) {
	var n = $(item).parent().find(':checked').length;
	// console.log(n + " activado(s)");
	return n;
}