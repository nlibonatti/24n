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

        array("title" => "Folha de Sao Paulo",
                "html" => "https://feeds.folha.uol.com.br/cotidiano/rss091.xml", 
                "page" => "https://www.folha.uol.com.br/",
                "fav" => "./img/brasil/folha.png"),
        
        array("title" => "EstadaoMT",
                "html" => "https://estadaomt.com.br/feed/1/geral/", 
                "page" => "https://estadaomt.com.br/",
                "fav" => "./img/brasil/estadaomt.jpeg"),
        
        array("title" => "Mercopress",
                "html" => "https://en.mercopress.com/rss/brazil/",
                "page" => "https://en.mercopress.com/brazil/",
                "fav" => "./img/brasil/mercopress.gif"),
        
        array("title" => "Reddit",
                "html" => "https://www.reddit.com/r/brazil/top/.rss", 
                "page" => "https://www.reddit.com/r/brazil/top/", 
                "fav" => "./img/brasil/reddit.gif"),
        
        array("title" => "Brazilian Times",
                "html" => "https://www.youtube.com/feeds/videos.xml?channel_id=UCj6PcyLvpnIRT_2W_mwa9Aw",
                "page" => "https://braziliantimes.com/",
                "fav" => "./img/brasil/btimes.gif"),
        
        array("title" => "Brazil 24/7",
                "html" => "https://www.brasil247.com/feed.rss",
                "page" => "https://brasil247.com/",
                "fav" => "./img/brasil/tv247.png"),
        
        array("title" => "The Rio Times",
                "html" => "https://www.riotimesonline.com/feed/",
                "page" => "https://www.riotimesonline.com/",
                "fav" => "./img/brasil/riotimes.gif"),
        
        array("title" => "The Brazilian Report",
                "html" => "https://www.youtube.com/feeds/videos.xml?channel_id=UCY-AtMOgGlD-VObTbnyLMTA",
                "page" => "https://brazilian.report/",
                "fav" => "./img/brasil/tbr-dark-h.gif")
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

    <title>24n.today - Diarios de Brasil - Últimas noticias</title>

</head>

<?php include ('./header.php');?>

 </nav>
  </div>

   <div class="container">
      <div class="row ml-3">
       <h1>Diarios de Brasil</h1>
      </div>

      <br>
            <div class="row ml-3 mr-1 border-bottom">
            <h2><span class="font-weight-bold mb-0">Últimas Noticias de Brasil - Diarios de Brasil</span></h2>
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
      $cachefile = '/Users/nahuellibonatti/Sites/noticias_de_brasil.html';
      $cached = fopen($cachefile, 'w');
      fwrite($cached, ob_get_contents());
      fclose($cached);
      ob_end_flush(); // Enviar el navegador
     ?> 

  </body>
</html>