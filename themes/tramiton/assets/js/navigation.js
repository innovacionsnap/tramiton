// $('.col-redes-sociales .fa-facebook').hover(
// 	function() {
// 		$(this).addClass("fa-facebook-square").removeClass("fa-facebook");
//   	}, function() {
//     	$(this).removeClass("fa-facebook-square").addClass("fa-facebook");
// 	}
// );

// $('.col-redes-sociales .fa-twitter').hover(
// 	function() {
// 		$(this).addClass("fa-twitter-square").removeClass("fa-twitter");
//   	}, function() {
//     	$(this).removeClass("fa-twitter-square").addClass("fa-twitter");
// 	}
// );

// $('.col-redes-sociales .fa-youtube').hover(
// 	function() {
// 		$(this).addClass("fa-youtube-square").removeClass("fa-youtube");
//   	}, function() {
//     	$(this).removeClass("fa-youtube-square").addClass("fa-youtube");
// 	}
// );


// $('#header-tramiton').css("background-image","url('themes/tramiton/assets/img/header.png')");

;


$('.col-redes-sociales i').hover(
	function() {
    	$( this ).css("color","cyan");
  	}, function() {
    	$( this ).css("color","#fff");
	}
);




$('.col-tramiton img').hover(
	function() {
    	$('#logo-home').attr("src",'themes/tramiton/images/logo_tramiton3.png');
  	}, function() {
    	$('#logo-home').attr("src",'themes/tramiton/images/logo_tramiton2.png');
	}
);



// $('#logo-home').hover(
// 	function() {
// 		alert('on');
// 		// $('#logo-home').attr("src",'$logoBlanco');
// 	}
// 	function() {
// 		// $('#logo-home').attr("src",'$logoCyan');
// 	}
// );