<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="no-js">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta property="og:locale" content="en_US">
<meta property="og:title" content="Erica Dreisbach | Freelance Web Designer + Developer ">
<meta property="og:url" content="http://www.ericadreisbach.com">
<meta property="og:site_name" content="Erica Dreisabch">
<meta property="og:description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>">

<meta name="description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>" />


<title><?php if(isset($page)) { echo $page . ' | '; } else { ;} ?>erica dreisbach | web designer + developer </title>


<!-- Styles -->
<link rel="stylesheet" type="text/css" href="<?php if(isset($page)) : ?>../<?php endif; ?>css/style.css" />


<!-- favicons -->
<?php include('favicons.php'); ?>


 <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->


</head>



<body class="<?php if(isset($bodyclass)) { echo $bodyclass; }?>" <?php if (!isset($page)) { echo 'data-spy="scroll" data-target=".navbar" data-offset="50"'; } ?> style="margin: 0;">



<?php if(isset($page)) { include('nav.php'); } ?>
