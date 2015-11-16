$(document).ready(function () {
    viewElements();
    App.init();
    FormWizardValidation.init();
    
});

$(window).resize(function(){
    viewElements();
});

function viewElements(){
    $ancho = $(window).width();
    console.log("ancho " + $ancho );

    if($ancho <=767){
       $("#navbar-toggle").show();
       $(".menu-central").css("border","none");

        if( $ancho >= 679){
            $("#col-ecu-logo").show();
            $("#col-snap-logo").removeClass("col-xs-5").addClass("col-xs-4");
            $("#col-socials-networks").removeClass("col-xs-7").addClass("col-xs-4");
        }

        else{
            $("#col-ecu-logo").hide();
            $("#col-snap-logo").addClass("col-xs-5").removeClass("col-xs-4");
            $("#col-socials-networks").addClass("col-xs-7").removeClass("col-xs-4");

           // if( $ancho >=447 ){
           //  $("#col-snap-logo").css("padding-top","30px"); 
           // }
           // else{
           //  $("#col-snap-logo").css("padding-top","45px");
           // }
        }
    }
    else{
        $("#navbar-toggle").hide();
        $(".menu-central").css("border-right","2px solid #707478");
    }
}