function hkp(evt)
{
    _KeyCode = (window.event) ? evt.keyCode : evt.which;
    return(_KeyCode);
}

$(function () {

    $('.panel-registro').each(function (i) {
        var total = $('.panel-registro').size() - 1;

        if (i !== total) {
            next = i + 2;
            $(this).find('.botones_nav').append("<a href='#' class='next-tab' rel='panel" + next + "'>Siguiente &#187;</a>");
            $('a.next-tab').hide();

        }
        if (i != 0) {
            prev = i;
            $(this).find('.botones_nav').append("<a href='#' class='prev-tab' rel='panel" + prev + "'>&#171; Anterior</a>");

        }

    });
    $('#cedula_ciu').keyup(function () {
        var cedula = (this).value;
        var tamano = cedula.length;
        if (tamano == 10) {
            $.ajax({
                type: "POST",
                url: 'site/validacedula',
                data: {cedula: cedula},
                beforeSend: function () {
                    $("#verifica").addClass('loader');
                },
                success: function (data) {
                    $("#verifica").removeClass('loader');
                    var bandera = data.split('?');
                    if (bandera[0] == 1) {
                        $('a.next-tab').show();
                        $('#cedula_ciu_error').hide();
                        $('#gracias').html('Gracias ' + bandera[1] + ' por registrar su caso');
                        $('#bienvenida').html('Bienvenido/a ' + bandera[1]);
                        document.getElementById("id_institucion").disabled = false;
                        document.getElementById("id_tramite2").disabled = false;
                        document.getElementById("id_provincia").disabled = false;
                        document.getElementById("id_canton").disabled = false;
                        document.getElementById("unidad_prestadora").disabled = false;
                    } else {
                        $('a.next-tab').hide();
                        $('#cedula_ciu_error').html("Cédula ingresada no válida");
                        $('#cedula_ciu_error').show();
                        $('#bienvenida').html('Ingresar su documento de identificación');
                    }
                }
            });


        } else {
            $('a.next-tab').hide();
            $('#bienvenida').html('Ingresar su documento de identificación');
        }

        //alert(cedula);
        /**/
    });
    $('.next-tab').click(function () {
        var panelToShow = $(this).attr('rel');
        var litoshow = parseInt(panelToShow.slice(5, 6));
        var num_actual = parseInt(panelToShow.slice(5, 6)) - 1;
        var actual = 'campo-panel' + (num_actual.toString());
        var campo = document.getElementsByClassName(actual);
        var contador = 0;
        //Validar campos requeridos
        for (i = 0; i < campo.length; i++) {
            var idCampo = $(campo[i]).attr("id");
            var idCampoError = idCampo + "_error";
            if (campo[i].value == "") {
                campo[i].style.backgroundColor = "#f2dede";
                //obtener el id del campo

                $('#' + idCampoError).html('<div style="color:red;">Campo requerido</div>');
                $('#' + idCampoError).show();
                //campo[i].concat("<div>Campo requerido</div>");
                contador++;
            } else {
                campo[i].style.backgroundColor = "#fff";
                $('#' + idCampoError).hide();

            }

        }
        if (contador == 0) { //campos están llenos
            $('.tab-panels').find('.tabs li.active').removeClass('active');
            $('.tab-panels').find('.tabs li').eq(litoshow - 1).addClass('active');
            $('.tab-panels').find('.panel-registro.active').show(function () {
                $(this).removeClass('active');

                $('#' + panelToShow).hide(function () {
                    $(this).addClass('active');
                });
            });
        }
    });

    $('.prev-tab').click(function () {
        var panelToShow = $(this).attr('rel');
        var litoshow = parseInt(panelToShow.slice(5, 6));
        $('.tab-panels').find('.tabs li.active').removeClass('active');
        $('.tab-panels').find('.tabs li').eq(litoshow - 1).addClass('active');
        $('.tab-panels').find('.panel-registro.active').show(showNextPanel);
        function showNextPanel() {
            $(this).removeClass('active');

            $('#' + panelToShow).hide(function () {
                $(this).addClass('active');
            });
        }
    });

    $('.comment').keyup(function () {
        var nro_comment = $(this).attr('data').slice(8, 10);
        var max_chars = $(this).attr('maxlength');
        //alert(nro_comment);
        var chars = $(this).val().length;
        var diff = max_chars - chars;
        $('#contador_' + nro_comment).html(diff + ' de ' + max_chars + ' caracteres disponibles');
    });

    $('#id_institucion').change(function (event)
    {
        var id_institucion = $(this).find(':selected').val();
        $.ajax({
                type: "POST",
                url: 'tramite/gettramites',
                data: {ins_id: id_institucion},
                beforeSend: function () {
                    $("#verifica").addClass('loader');
                },
                success: function (data) {
                    $("#verifica").removeClass('loader');
                    $("#id_tramite2").html(data);
                }
            });
        
    });
    $('#id_tramite2').change(function (event)
    {
        var id_tramite = $(this).find(':selected').val();
        if (id_tramite==3752){
            document.getElementById("otro_tramite").disabled = false;
        }else{
            $('#otro_tramite').val('');
            document.getElementById("otro_tramite").disabled = true;
        }
        
        
        
    });
    
    $('#id_provincia').change(function (event)
    {
        var id_provincia = $(this).find(':selected').val();
        $.ajax({
                type: "POST",
                url: 'canton/getcantones',
                data: {pro_id: id_provincia},
                beforeSend: function () {
                    $("#verifica").addClass('loader');
                },
                success: function (data) {
                    $("#verifica").removeClass('loader');
                    $("#id_canton").html(data);
                }
            });
        
    });

});
