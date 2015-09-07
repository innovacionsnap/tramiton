velocidad = 1500;
tiempoEspera = 3000;
verificar = 1;
dif = 0;
timer = 0

function moverSlider() {
    sliderAltura = $(".bloque-slider").width();
    moduloAltura = $(".modulo-slider").width() + parseFloat($(".modulo-slider").css("padding-left")) + parseFloat($(".modulo-slider").css("padding-right"));
    sliderTop = parseFloat($(".bloque-slider").css("left"));
    dif = sliderAltura + sliderTop;

    if (verificar == 1) {
        if (dif > moduloAltura) {
            $(".bloque-slider").animate({left: "-=" + moduloAltura}, velocidad);
            timer = setTimeout('moverSlider()', tiempoEspera);
        }
        else {
            clearTimeout(timer);
            $(".bloque-slider").css({left: 0});
            timer = setTimeout('moverSlider()', 0);
        }
    }
    else {
        timer = setTimeout('moverSlider()', 1000);
    }
}
function bajarSlider() {
    if (dif >= moduloAltura * 2) {
        $(".bloque-slider").animate({left: "-=" + moduloAltura}, velocidad);
    }
    else {
        $(".bloque-slider").css({left: 0});
        $(".bloque-slider").animate({left: "-=" + moduloAltura}, velocidad);
    }
}
function subirSlider() {
    if (sliderTop <= -moduloAltura) {
        $(".bloque-slider").animate({left: "+=" + moduloAltura}, velocidad);
    }
    else {
        $(".bloque-slider").css({left: -sliderAltura + moduloAltura});
        $(".bloque-slider").animate({left: "+=" + moduloAltura}, velocidad);
    }
}