<?php
require_once './classes/FileManager.php';
require_once './classes/ImgDimension.php';
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>PHP 10 OOP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="assets/css/styles.css">    
  <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/main.js" type="text/javascript"></script>
 </head>
 <body>
  <div class="container">
   <?php   
   // FileManager::deleteFiles('./export/','txt');
   //sinnvoll ist, Quell- und Zieldatei im Konstruktor anzugeben
   $img=new ImgDimension('./images/src/','./image/dst/');
   $img->setSrcFolder('./images/src/');
   $img->setDestDimensions(ImgDimension::DIMENSION_AUTO, 12);
   $img->setSrcFileNamePattern('*');
   $img->setSrcFileFileTypes(['jpg']);
   $img->setDestFolder('./images/dst');
   $img->setDestFileName(ImgDimension::FILENAME_RANDOM, 'tmb_');
   $img->setDestDimensions(ImgDimension::DIMENSION_AUTO, 5);   
   $img->setDstCompressionLevel(100);
   $img->create();
   $images=$img->findFiles();
   var_dump($images);
//   $images2= ImgDimension::staticFindFiles();
//   var_dump($images2);
   ?> 

  </div>
  <pre>
<?php
//var_dump($files);
?>
  </pre>
 </body>
</html>
