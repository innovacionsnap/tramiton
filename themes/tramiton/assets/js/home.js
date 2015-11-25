$("#button-ciudadano").click(function(){
    $("#col-triangulo-ciudadano").show();
    $("#col-triangulo-organizacion").hide();
    $("#col-triangulo-servidor").hide();

    $("#row-arrows").css("border-bottom","3px solid #325972");

    $("#row-img-organizacion").hide();
    $("#row-vid-organizacion").hide();
    $("#line-organizacion").hide();

    $("#row-img-servidor").hide();
    $("#row-vid-servidor").hide();
    $("#line-servidor").hide();

    $("#row-img-ciudadano").fadeIn(1500);
    $("#row-vid-ciudadano").fadeIn(1500);
    $("#line-ciudadano").fadeIn(1000);

    // $("#col-organizacion").hide();
    // $("#col-servidor-publico").hide();

    // $("#col-otro").fadeIn(1000);
    // $("#col-ciudadano").addClass("col-sm-6").removeClass("col-sm-4");
});

$("#button-organizacion").click(function(){
    $("#col-triangulo-ciudadano").hide();
    $("#col-triangulo-organizacion").show();
    $("#col-triangulo-servidor").hide();

    $("#row-arrows").css("border-bottom","3px solid #ee9d46");

    $("#row-img-ciudadano").hide();
    $("#row-vid-ciudadano").hide();
    $("#line-ciudadano").hide();

    $("#row-img-servidor").hide();
    $("#row-vid-servidor").hide();
    $("#line-servidor").hide();

    $("#row-img-organizacion").fadeIn(1500);
    $("#row-vid-organizacion").fadeIn(1500);
    $("#line-organizacion").fadeIn(1000);

    // $("#col-ciudadano").hide();
    // $("#col-servidor-publico").hide();

    // $("#col-otro").fadeIn(1000);
    // $("#col-organizacion").addClass("col-sm-6").removeClass("col-sm-4");
});

$("#button-servidor-publico").click(function(){
    $("#col-triangulo-ciudadano").hide();
    $("#col-triangulo-organizacion").hide();
    $("#col-triangulo-servidor").show();

    $("#row-arrows").css("border-bottom","3px solid #349876");
    

    $("#row-img-ciudadano").hide();
    $("#row-vid-ciudadano").hide();
    $("#line-ciudadano").hide();

    $("#row-img-organizacion").hide();
    $("#row-vid-organizacion").hide();
    $("#line-organizacion").hide();

    $("#row-img-servidor").fadeIn(1500);
    $("#row-vid-servidor").fadeIn(1500);
    $("#line-servidor").fadeIn(1000);
    // $("#col-organizacion").hide();
    // $("#col-ciudadano").hide();

    // $("#col-otro").fadeIn(1000);
    // $("#col-servidor-publico").addClass("col-sm-6").removeClass("col-sm-4");
});

$("#button-otro").click(function(){
    // $("#col-otro").hide();

    // $("#col-ciudadano").fadeIn(1000);
    // $("#col-organizacion").fadeIn(1000);
    // $("#col-servidor-publico").fadeIn(1000);

    // $("#col-ciudadano").addClass("col-sm-4").removeClass("col-sm-6");
    // $("#col-organizacion").addClass("col-sm-4").removeClass("col-sm-6");
    // $("#col-servidor-publico").addClass("col-sm-4").removeClass("col-sm-6");
});