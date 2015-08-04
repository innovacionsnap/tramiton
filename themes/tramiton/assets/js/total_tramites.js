$(document).ready(function () {
    var res1 = {
        loader: $('<div />', {class: 'loader'}),
        container: $('#total_tramites')
        
    };
    var res2 = {
        loader: $('<div />', {class: 'loader'}),
        container: $('#ranking_tramites')
    };
    var res3 = {
        loader: $('<div />', {class: 'loader'}),
        container: $('#visita_soluciones')
    };
    var res4 = {
        loader: $('<div />', {class: 'loader'}),
        container: $('#votos_solucion')
    };

    $.ajax({
        url: 'totaltramite',
        beforeSend: function () {
            res1.container.append(res1.loader);
        },
        success: function (data) {
            res1.container.html(data);
            res1.container.find(res1.loader).remove();
        }
    });
    $.ajax({
        url: 'ranktramite',
        beforeSend: function () {
            res2.container.append(res2.loader);
        },
        success: function (data) {
            res2.container.html(data);
            res2.container.find(res2.loader).remove();
        }
    });

    $.ajax({
        url: 'visitasolucion',
        beforeSend: function () {
            res3.container.append(res3.loader);
        },
        success: function (data) {
            res3.container.html(data);
            res3.container.find(res3.loader).remove();
        }
    });
    
    $.ajax({
        url: 'votossolucion',
        beforeSend: function () {
            res4.container.append(res4.loader);
        },
        success: function (data) {
            res4.container.html(data);
            res4.container.find(res4.loader).remove();
        }
    });
    
});