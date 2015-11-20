function viewElements(){
    // console.log("viewElements");
    $wid = $(window).width();
    console.log("wid " + $wid );

    if($wid <=767){
       $("#navbar-toggle").show();
       $(".menu-central").css("border","none");
       $(".menu-central-dashboard").css("border","none");
       $("#dashboard-navbar").removeClass("navbar-right");

        if( $wid >= 679){
            $(".col-ecu-logo").show();
            $("#col-snap-logo").removeClass("col-xs-5").addClass("col-xs-4");
            $("#col-socials-networks").removeClass("col-xs-7").addClass("col-xs-4");
        }

        else{
            $(".col-ecu-logo").hide();
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

           if( $wid >=383 ){
            // $("#col-snap-logo").css("padding-top","30px"); 
           }
           else{
            // $("#col-snap-logo").css("padding-top","45px");
           }
        }
    }
    else{
        $("#navbar-toggle").hide();
        $(".menu-central").css("border-right","2px solid #707478");
        $(".menu-central-dashboard").css("border-right","2px solid #707478");
        $("#dashboard-navbar").addClass("navbar-right");
    }
}