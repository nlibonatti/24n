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

        array("title" => "El País",
                "html" => "https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/portada", 
                "page" => "https://www.elpais.com/",
                "fav" => "https://ep00.epimg.net/iconos/v1.x/v1.0/logos/cabecera_portada.png"),
        
        array("title" => "20 Minutos",
                "html" => "https://www.20minutos.es/rss/", 
                "page" => "www.20minutos.es",
                "fav" => "www.20minutos.es/images/logo.png"),
        
        array("title" => "El mundo",
                "html" => "http://www.elmundo.es/rss/index.xml",
                "page" => "https://www.elmundo.es",
                "fav" => "https://e00-elmundo.uecdn.es/imagen/canalima144.gif"),
        
        array("title" => "La Vanguardia",
                "html" => "https://www.lavanguardia.com/rss/home.xml", 
                "page" => "https://www.lavanguardia.com", 
                "fav" => "https://www.lavanguardia.com/images/logo.png"),
        
        array("title" => "ABC",
                "html" => "https://www.abc.es/rss/2.0/ultima-hora/",
                "page" => "www.abc.es/",
                "fav" => ""),
        
        array("title" => "El Periodico de Catalunya",
                "html" => "https://www.elperiodico.com/es/rss/rss_portada.xml",
                "page" => "https://www.elperiodico.com/es/",
                "fav" => ""),
        
        array("title" => "El Correo",
                "html" => "https://www.elcorreo.com/rss/2.0/portada/",
                "page" => "https://www.elcorreo.com/",
                "fav" => ""),
        
        array("title" => "La Nueva España",
                "html" => "https://www.lne.es/rss/section/3120",
                "page" => "https://www.lne.es//",
                "fav" => "")
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

    <title>24n.today - Diarios de España - Últimas noticias</title>

</head>

<?php include ('./header.php');?>

 </nav>
  </div>

   <div class="container">
      <div class="row ml-3">
       <h1>Diarios de España</h1>
      </div>

      <br>
            <div class="row ml-3 mr-1 border-bottom">
            <h2><span class="font-weight-bold mb-0">Últimas Noticias de España - Diarios de España</span></h2>
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
      $cachefile = '/Users/nahuellibonatti/Sites/noticias_de_espana.html';
      $cached = fopen($cachefile, 'w');
      fwrite($cached, ob_get_contents());
      fclose($cached);
      ob_end_flush(); // Enviar el navegador
     ?> 

  </body>
</html>