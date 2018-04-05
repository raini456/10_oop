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

   /*
   $myFile = new FileManager('./export/test.txt');
   $img = new ImgDimension();
   $img->setSrcFolder('./image/src');
   $img->setSrcFileNamePattern('*');
   $img->setSrcFileFilyTpes('jpg','jpeg','png');
   $img->setDestFolder('./image/dst');
   $img->setDestFilePattern(ImgDim::FILENAME_RANDOM);
   $img->setDestDimensions(ImgDim::DIMESNSION_AUTO);   
   $img->setDstCompressionLevel(100);
   $img->create();
   
    */
   // FileManager::deleteFiles('./export/','txt');
   //sinnvoll ist, Quell- und Zieldatei im Konstruktor anzugeben
   $img=new ImgDimension();
   $img->setSrcFolder('./image/src/');
//   $img->setSrcFileNamePattern('*');
//   $img->setSrcFileFilyTpes('jpg','jpeg','png');
//   $img->setDestFolder('./image/dst');
//   $img->setDestFilePattern(ImgDim::FILENAME_RANDOM);
//   $img->setDestDimensions(ImgDim::DIMESNSION_AUTO);   
//   $img->setDstCompressionLevel(100);
//   $img->create();
   ?> 

  </div>
  <pre>
<?php
//var_dump($files);
?>
  </pre>
 </body>
</html>
