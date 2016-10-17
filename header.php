<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="no-js">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta property="og:locale" content="en_US">
<meta property="og:title" content="Erica Dreisbach | Freelance Web Designer + Developer ">
<meta property="og:url" content="http://www.ericadreisbach.com">
<meta property="og:site_name" content="Erica Dreisbach">
<meta property="og:description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>">

<meta name="description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>" />


<title><?php if(isset($page)) { echo $page . ' | '; } else { ;} ?>erica dreisbach | web designer + developer </title>



<!-- favicons -->
<?php include('favicons.php'); ?>


 <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->


<?php if(isset($page)) : ?>
 <link rel="stylesheet" type="text/css" href="../css/style.css" />
 <?php endif; ?>


 <!-- detect bot -->
 <?php
 function crawlerDetect($USER_AGENT) {
   $crawlers = array(
     'Google' => 'Google',
     'MSN' => 'msnbot',
     'Rambler' => 'Rambler',
     'Yahoo' => 'Yahoo',
     'AbachoBOT' => 'AbachoBOT',
     'accoona' => 'Accoona',
     'AcoiRobot' => 'AcoiRobot',
     'ASPSeek' => 'ASPSeek',
     'CrocCrawler' => 'CrocCrawler',
     'Dumbot' => 'Dumbot',
     'FAST-WebCrawler' => 'FAST-WebCrawler',
     'GeonaBot' => 'GeonaBot',
     'Gigabot' => 'Gigabot',
     'Lycos spider' => 'Lycos',
     'MSRBOT' => 'MSRBOT',
     'Altavista robot' => 'Scooter',
     'AltaVista robot' => 'Altavista',
     'ID-Search Bot' => 'IDBot',
     'eStyle Bot' => 'eStyle',
     'Scrubby robot' => 'Scrubby',
     'Facebook' => 'facebookexternalhit',
   );

   $crawlers_agents = implode('|',$crawlers);

   if (strpos($crawlers_agents, $USER_AGENT) === false) {
     echo "<script>console.log('not a user agent')</script>";
   }
   else {
     echo "<script>console.log('YES a user agent!!')</script>";
   }
 }
 ?>

</head>

<script type="text/javascript">
if (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1")) { }
else { document.documentElement.className = "nosvg"; }
</script>


<body class="<?php if(isset($bodyclass)) { echo $bodyclass; }?>" <?php if (!isset($page)) { echo 'data-spy="scroll" data-target=".navbar" data-offset="50"'; } ?> style="margin: 0;" >


<?php if(isset($page)) { include('nav.php'); } ?>
