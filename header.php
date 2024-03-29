<?php global $home; global $bodyclass; ?><!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="no-js"><head>
<?php function sanitize_output($buffer) {
  // minify html
  require_once('minify/html.php');
  $buffer = Minify_HTML::minify($buffer);
  return $buffer;
}
ob_start('sanitize_output'); ?>



<!-- Analytics - conditionally hidden from PageSpeed Insights -->
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>

<!-- Google Tag Manager -->
<!-- https://tagmanager.google.com/ > Admin > Install Google Tag Manager -->
<!-- Paste this code as high in the <head> of the page as possible: -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M9NGZ3X');</script>
<!-- End Google Tag Manager -->


<!-- Google Analytics -->
<!-- https://analytics.google.com > Admin > Tracking info -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47393701-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-47393701-1');
</script>
<?php endif; ?>
<!-- END Analytics -->



<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- remove IE and Windows Phone highlight -->
<meta name="msapplication-tap-highlight" content="no">

<meta property="og:locale" content="en_US" />
<meta property="og:title" content="erica dreisbach | freelance web developer" />
<meta property="og:image" content="<?php if(isset($ogimg)) { echo $ogimg; } else { echo ' https://s3.amazonaws.com/darkblack-papa/erica-dreisbach-freelance-chicago-web-developer.jpg'; } ?>" />
<meta property="og:url" content="https://ericadreisbach.com" />
<meta property="og:site_name" content="erica dreisbach | freelance web developer" />
<meta property="og:description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php if(isset($page)) { echo $page . ' | '; } ?>erica dreisbach | freelance web developer" />
<meta name="twitter:description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>" />
<meta name="twitter:image" content="<?php if(isset($ogimg)) { echo $ogimg; } else { echo ' https://s3.amazonaws.com/darkblack-papa/erica-dreisbach-freelance-chicago-web-developer.jpg'; } ?>" />

<meta name="description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>" />


<title><?php if(isset($page)) { echo $page . ' | '; } else { ;} ?>erica dreisbach | freelance web developer </title>



<!-- favicons -->
<?php include('favicons.php'); ?>


 <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->


<?php if(isset($page)) : ?>
 <link rel="stylesheet" type="text/css" href="../css/style.css?v=1.1.3" />
<?php endif; ?>


<script>
if (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1")) { }
else { document.documentElement.className = "nosvg"; }
</script>



</head>



<body class="<?php if(isset($bodyclass)) { echo $bodyclass; }?>" <?php if (!isset($page)) { echo 'data-spy="scroll" data-target=".navbar" data-offset="50"'; } ?> style="margin: 0;">


<!-- https://tagmanager.google.com/ > Admin > Install Google Tag Manager -->
<!-- Additionally, paste this code immediately after the opening <body> tag: -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9NGZ3X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<a href="#maincontent" class="sr-only skip-nav">Skip Navigation </a>


<?php include('nav.php'); ?>
