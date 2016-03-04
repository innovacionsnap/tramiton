<div id="noticias-1" class="container"></div>
<!-- begin #noticias -->
<div id="noticias" class="content has-bg twitter" data-scrollview="true">

    <?php $twitter = SiteController::getTwitter();
    ?>

    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInUp" style="height:360px; width: 100%;">
        <h4 class="content-title titulo-twitter">@TramitonEC   <i class = "fa fa-twitter"></i></h4>
        <hr class="m-t-10">
        <!-- begin carousel -->
        <div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
            <!-- begin carousel-inner -->
            <div class="carousel-inner text-center" style="height:300px;">
                <!-- begin item -->
                <?php
                $len = count($twitter);

                for ($i = 0; $i < $len; $i++) {
                    if (isset($twitter[$i]['retweeted_status'])) {
                        $texto = '@TramitonEC ha retwitteado: ' . $twitter[$i]['text'];
                        $time = date('d M', strtotime($twitter[$i]['retweeted_status']['created_at']));
                    } else {
                        $time = date('d M', strtotime($twitter[$i]['created_at']));
                        $texto = $twitter[$i]['text'];
                    }
                    if (isset($twitter[$i]['entities']['media'])) {
                        $urlImg = substr($twitter[$i]['entities']['media'][0]['media_url'], 4);
                        $imagen = '<br><br><img class="center-block" src="https' . $urlImg . '" width="280px">';
                    } else {
                        $imagen = '';
                    }

                    $html = '';
                    if ($i == 0) {
                        $html.='<div class="item active"><div style ="display:inline-flex"><blockquote>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote>';
                    } elseif ($i == 3 or $i == 6 or $i == 9) {
                        $html.='</div></div><div class="item"><div style ="display:inline-flex"><blockquote>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote>';
                    } elseif ($i == 12) {
                        $html.='<blockquote>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote></div></div>';
                    } else {
                        $html.='<blockquote>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote>';
                    }

                    echo $html;
                }
                echo '</div></div>';
                ?>

                <!--end item -->

            </div>
            <!--end carousel-inner -->
            <!--begin carousel-indicators -->
            <!-- <ol class = "carousel-indicators">
                <li data-target = "#testimonials" data-slide-to = "0" class = "active"></li>
                <li data-target = "#testimonials" data-slide-to = "1" class = ""></li>
                <li data-target = "#testimonials" data-slide-to = "2" class = ""></li>
                <li data-target = "#testimonials" data-slide-to = "3" class = ""></li>
            </ol> -->
            <!--end carousel-indicators -->


             <!-- Left and right controls -->
              <a class="right carousel-control" href="#testimonials" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="right carousel-control" href="#testimonials" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a>
             <!-- end Left and right controls -->
        </div>
        <!--end carousel -->
    </div>
    <!--end containter -->
</div>
<!--end #noticias -->