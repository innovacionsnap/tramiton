<script>
    function yHandler() {
        var wrap = document.getElementById('wrap');
        var contentHeight = wrap.offsetHeight;
        var yOffset = window.pageYOffset;
        var y = yOffset + window.innerHeight;
        
        if (y >= contentHeight) {
            // Ajax call to get more dynamic data goes here
            /*$.ajax({
                url: "timeline",
                type: "POST",
                success: function (datos) {
                    $("#wrap").html(datos)
                }

            });*/
            wrap.innerHTML += '<li>hola</li>';

        }
        //var status = document.getElementById('status');
        //status.innerHTML = contentHeight + " | " + y;
    }
    window.onscroll = yHandler;
</script>

<div id="content" class="content col-md-8">
    <ul id="wrap">
        <?php
        foreach ($datosSolucion as $datoSolucion):
            echo '<li>' . $datoSolucion['sol_descripcion'] . '</li>';
        endforeach;
        ?>
    </ul>
</div>
