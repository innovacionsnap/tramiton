function bodyPadding(){
	// console.log("bodyPadding");
	$navHeight = $("#nav-admin").height();
	// console.log("nav-admin " + $navHeight);
	$navHeight = $navHeight + 6;
	$("#body-admin-form-caso").css("padding-top", $navHeight + "px");
}
