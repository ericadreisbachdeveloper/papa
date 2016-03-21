<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta property="og:locale" content="en_US">
<meta property="og:title" content="<?php if(isset($page)) { echo $page . ' | '; } else { ;} ?>erica dreisbach | web designer + developer">
<meta property="og:url" content="http://www.ericadreisbach.com/">
<meta property="og:site_name" content="erica dreisbach | web desiger + developer">
<meta property="og:description" content="<?php if(isset($metadescription)) { echo $metadescription; } ?>">

<title><?php if(isset($page)) { echo $page . ' | '; } else { ;} ?>erica dreisbach | web designer + developer </title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" sizes="16x16 32x32 48x48" href="favicon.ico">

<link rel="stylesheet" type="text/css" href="css/style.css" />

<!-- 'teach' IE to create and style HTML5 semantic elements -->
<script type="text/javascript">
 document.createElement("nav");
 document.createElement("section");
</script>

<!-- for ancient browsers that don't believe in jQuery 2 -->
<script type="text/javascript">
if(document.documentElement.getAttribute('data-browser') !== null ){
    alert('hi');
}
</script>


</head>

<body>

<?php include('nav.php'); ?>
