function viewElements(){
    $wid = $(window).width();
    // console.log("wid " + $wid );

    if($wid <=750){
        if( $wid >= 679){
            $("#col-ecu-logo").show();
            $("#col-snap-logo").removeClass("col-xs-5").addClass("col-xs-4");
            $("#col-socials-networks").removeClass("col-xs-7").addClass("col-xs-4");
        }

        else{
            $("#col-ecu-logo").hide();
            $("#col-snap-logo").addClass("col-xs-5").removeClass("col-xs-4");
            $("#col-socials-networks").addClass("col-xs-7").removeClass("col-xs-4");

            if($wid >= 485){
                $(".dashboard-admin-banner").addClass("col-xs-6").removeClass("col-xs-12");
                $(".col-contenido-solucion").addClass("col-xs-6").removeClass("col-xs-12");
            }
            else{

                $(".dashboard-admin-banner").addClass("col-xs-12").removeClass("col-xs-6");
                $(".col-contenido-solucion").addClass("col-xs-12").removeClass("col-xs-6");
            }

        }
    }
    else{
        if($wid<=1128){
          $(".col-contenido-solucion").addClass("col-md-4").removeClass("col-md-3");
        }
        else{
          $(".col-contenido-solucion").addClass("col-md-3").removeClass("col-md-4");
        }
    }

    // modal home
    if($wid <= 435){
        $("#col-logo-1").addClass("col-xs-12").removeClass("col-xs-6");
        $("#col-logo-2").addClass("col-xs-12").removeClass("col-xs-6");
    }
    else{
        $("#col-logo-1").addClass("col-xs-6").removeClass("col-xs-12");
        $("#col-logo-2").addClass("col-xs-6").removeClass("col-xs-12");
    }

    // if($wid <= 767){
    //   $("#header-tramiton").css("border","none").css("max-width","100%");
    //   $("#home, #que_es_tramiton, #estadisticas, #preguntas, footer .container-fluid").removeClass("borde-izq-gris").removeClass("borde-der-gris").css("max-width","100%");
    // }
    // else{
    //   $("#header-tramiton").addClass("borde-izq-blanco").addClass("borde-der-blanco").css("max-width","90%");
    //
    //   $("#home, #que_es_tramiton, #estadisticas, #preguntas, footer .container-fluid").addClass("borde-izq-gris").addClass("borde-der-gris").css("max-width","90%");
    //
    // }

}

$('#navbar-toggle-dashboard').click(function(){
    $(this).find('span').toggleClass('glyphicon-menu-down').toggleClass('glyphicon-menu-up');
});
