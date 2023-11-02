<?php
date_default_timezone_set ('America/Argentina/Buenos_Aires');
ob_start(); // Crear buffer de salida
// Include SimplePie
// Located in the parent directory
include_once ('./autoloader.php');
date_default_timezone_set ('America/Argentina/Buenos_Aires');
$diahoy = date('d').'-'.date('m').'-'.date('Y');

$feed = new SimplePie();
$feed->handle_content_type();

$url = array(

        array("title" => "El Tiempo",
                "html" => "https://www.eltiempo.com/rss/colombia.xml",
                "page" => "https://www.eltiempo.com/",
                "fav" => "./img/colombia/col_el_tiempo.ico"),
        
        array("title" => "Occidente",
                "html" => "https://occidente.co/feed/",
                "page" => "https://occidente.co/",
                "fav" => "./img/colombia/col_occidente.png"),
                
        array("title" => "Minuto 30",
                "html" => "https://www.minuto30.com/feed/",
                "page" => "https://www.minuto30.com/",
                "fav" => "./img/colombia/col_minuto30.png"),
        
        array("title" => "Kienyke",
                "html" => "https://www.kienyke.com/feed", 
                "page" => "https://www.kienyke.com/",
                "fav" => "./img/colombia/col_kienyke.ico"),
        
        array("title" => "Vivir en el Poblado",
                "html" => "https://vivirenelpoblado.com/feed/", 
                "page" => "https://vivirenelpoblado.com/",
                "fav" => "./img/colombia/col_vivirenelpoblado.png"),
        
        array("title" => "Diario del Huila",
                "html" => "https://diariodelhuila.com/feed/", 
                "page" => "https://diariodelhuila.com/", 
                "fav" => "./img/colombia/col_diariodelhuila.png"),
        
        array("title" => "Diario del Llano",
                "html" => "https://eldiariodelllano.com/feed/", 
                "page" => "https://eldiariodelllano.com/", 
                "fav" => "./img/colombia/col_diariodelllano.ico"),
        
        array("title" => "El Diario",
                "html" => "https://www.eldiario.com.co/feed/", 
                "page" => "https://www.eldiario.com.co/", 
                "fav" => "./img/colombia/col_eldiario.png"),
        
        array("title" => "El País Vallenato",
                "html" => "https://www.elpaisvallenato.com/feed/", 
                "page" => "https://www.elpaisvallenato.com/", 
                "fav" => "./img/colombia/col_elpaisvallenato.png"),
        
        array("title" => "Diario del Norte",
                "html" => "https://www.diariodelnorte.net/feed/", 
                "page" => "https://www.diariodelnorte.net/", 
                "fav" => "./img/colombia/col_diariodelnorte.png"),
        
        array("title" => "El Informador",
                "html" => "https://www.elinformador.com.co/index.php?format=feed&type=rss", 
                "page" => "https://www.elinformador.com.co/", 
                "fav" => "./img/colombia/col_elinformador.png"),

        array ("title" => "Bogota Post",
                "html" => "https://thebogotapost.com/feed/", 
                "page" => "https://thebogotapost.com/", 
                "fav" => "./img/colombia/col_bogota_post.png")
        );
        
  ?>

<!doctype html>
<html lang="sp">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-store">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Diarios Argentinos - Últinas noticias Argentinas - Diarios de Argentina. Noticias Argentinas. Periódicos de Argentina.">
    <link rel='icon' href='../favicon.ico' type='image/x-icon'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">

    <title>24n.today - Diarios de Colombia - Últimas noticias</title>

</head>

<?php include ('./header.php');?>

 </nav>
  </div>

   <div class="container">
      <div class="row ml-3">
       <h1>Diarios de Colombia</h1>
      </div>

      <br>
            <div class="row ml-3 mr-1 border-bottom">
            <h2><span class="font-weight-bold mb-0">Últimas Noticias de Colombia - Diarios de Colombia</span></h2>
            </div>
      <br>

    <div class="row ml-1 mr-1">
			<?php 
                        foreach ($url as $name):
                        echo '<div class="col-md-6">';
                        $feed->set_feed_url($name["html"]);
                        $feed->enable_cache(false);
			$feed->init();
                        $title = $name["title"];
                        $img = $name["fav"];
                        $link = $name["page"];
                        $title = "<h3><a href='$link' title='$title' class='btn btn-light font-weight-bold' target='_blank' rel='nofollow'><img src='$img' width='16' height='16'> $title</a></h3>"; 
                        echo $title;
					    ?>

        <ul class="list-group list-group-flush">

	<?php foreach($feed->get_items(0,6) as $item): ?>  

            <?php if ($item->get_permalink()) echo '<li class="list-group-item"><a href="' . $item->get_permalink() . '" class="text-body" target="_blank" rel="nofollow">'; echo $item->get_title(); echo '.<small></a>'; ?>&nbsp;<span class="text-info"><?php echo $item->get_date('j M Y') . '<a data-toggle="collapse" href="#collapseExample" class="text-dark" role="button" aria-expanded="false" aria-controls="collapseExample" rel=“nofollow"> <i class="fas fa-angle-double-down text-success"></i></a></small>' ; ?>&nbsp;</span>
                        <div class="collapse" id="collapseExample">
                        <?php $str = ""; echo '<small><p class="text-muted">' . substr(strip_tags($item->get_description($str) ?? ''),0,400) . '</p></small>'; ?>
                        </div>
			<?php endforeach; ?>
                        </li>
                      <br>    
                    </div>
		  <?php endforeach; ?>
                </ul>

            </div>

            <?php include ('./footer.php');?>

        </div> 

	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" async src="//l.getsitecontrol.com/d7oz88zw.js"></script>

    <?php 
      $cachefile = '/Users/nahuellibonatti/Sites/noticias_de_colombia.html';
      $cached = fopen($cachefile, 'w');
      fwrite($cached, ob_get_contents());
      fclose($cached);
      ob_end_flush(); // Enviar el navegador
     ?> 

  </body>
</html>