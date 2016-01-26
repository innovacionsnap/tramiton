var handleDashboardGritterNotification = function() {
        // var bandera = true;

        if (banderaNotificacion){   
            $(window).load(function() {
                setTimeout(function() {
                    $.gritter.add({
                        position: '',
                        class_name: 'my-sticky-class', //gritter-light
                        fade_in_speed: 'medium', // how fast notifications fade in
                        fade_out_speed: 1000, // how fast the notices fade out
                        time: '4000', // hang on the screen for...

                        title: titulo,
                        text: texto,
                        // image: '../themes/tramiton/assets/img/users/hombre.png',
                        sticky: false
                    });
                }, 1000);
            });

        }
        
    };

var Notificaciones = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDashboardGritterNotification();
        }
    };
}();