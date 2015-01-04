<!doctype html>
<html lang="<?= isset($language) ? $language : 'en' ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= isset($title) ? $title.' - ' : '' ?><?= isset($site_title) ? $site_title : ''?></title>

<?php if (isset($favicon)) : ?>
<link rel="shortcut icon" href="<?= $favicon ?>" />
<?php endif;
?>
<?php if (isset($fonts)) : foreach ($fonts as $value) : ?>
<link rel="stylesheet" href="<?= $value ?>" type="text/css" />
<?php endforeach;
endif;
?>

<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php /*
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
*/ ?>


<?php if (isset($css)) : foreach ($css as $value) : ?>
<link rel="stylesheet" href="<?= is_array($value) ? $value['href'] : $value ?>" type="text/css" media="<?= is_array($value) && array_key_exists('media', $value) ? $value['media'] : 'all' ?>" />
<?php endforeach;
endif;
?>

<?php if (isset($js)) : foreach ($js as $value) : ?>
<script type="text/javascript" src="<?= $value ?>"></script>
<?php endforeach;
endif;
?>

<!--[if lt IE 9]>
    <style>
        header
        {
            margin: 0 auto 20px auto;
        }
        #four_columns .img-item figure span.thumb-screen
        {
            display:none;
        }  
    </style>
<![endif]-->

<script>
$(function() {
  $('.slider_image').slidesjs({	
    height: 235,
    navigation: true,
    pagination: true,
    effect: {
      fade: {
        speed: 400
      }
    },
    callback: {
        start: function(number)
        {			
            $(".slider_content").fadeOut(500);
        },
        complete: function(number)
        {			
            $(".slider_content:eq("+(number - 1)+")" ).delay(500).fadeIn(1000);
            console.log(number);
        }		
    },
    play: {
        active: false,
        auto: true,
        interval: 6000,
        pauseOnHover: false
    }
  });
});
</script>

</head>
<body>
<header>
<?php if (isset($site_title) || isset($header_title)) : ?>
<h1 class="hidden"><a href="/"><?= isset($header_title) ? $header_title : $site_title ?></a></h1>
<?php endif; ?>
<?php if (isset($header_navigation)) : ?>
<?= $header_navigation ?>
<?php endif; ?>
<?php if (isset($header_logo)) : ?>
<p><a href="/"><img src="<?= $path ?><?= $header_logo ?>"></a></p>
<?php endif; ?>
</header>

<div id ="navigation">
<?php if (isset($navigation)) :?>
<?= $navigation ?>
<?php endif; ?>
</div>

<div id="content">
<?php if (isset($content)) : ?>
<?= $content ?>
<?php endif; ?>
</div>

<footer>
    <h2 class="hidden">Our footer</h2>
    <section id="copyright">
        <h3 class="hidden">Copyright notice</h3>
        <div class="wrapper">
            <div class="social">
                <a href="javascript:void(0)"><img src="img/Social-Networks-Bebo-icon.png" alt="Some alt text" width="25"/></a>
                <a href="javascript:void(0)"><img src="img/Social-Networks-Google-plus-icon.png" alt="Some alt text" width="25"/></a>
                <a href="javascript:void(0)"><img src="img/Logos-Tumblr-icon.png" alt="Some alt text" width="25"/></a>
                <a href="javascript:void(0)"><img src="img/Logos-Youtube-icon.png" alt="Some alt text" width="25"/></a>
                <a href="javascript:void(0)"><img src="img/Social-Networks-Xing-icon.png" alt="Some alt text" width="25"/></a>
            </div>
            &copy; Copyright 2012 by <a href="http://www.example.com">Example</a>. All Rights Reserved.
        </div>
    </section>
</footer>
</body>
</html>
