<?php

class ImgDimension {

  const FILENAME_ORIGIN = 1;
  const FILENAME_RANDOM = 2;
  const FILENAME_NUM = 3;
  const FILENAME_AUTO = 0;
  const DIMENSION_AUTO = 1;

  private $srcFolder = '';
  private $srcFileNamePattern = '';
  private $srcFiletypes = [];
  private $dstFolder = "";
  private $dstFileNameType = self::FILENAME_ORIGIN; //ImgDimension:: würde auch möglich sein, bzw. this->::;
  private $dstFileNamePrefix = '';
  private $srcW = '';
  private $dstH = '';
  private $dstCompressionLevel = 75;

  public function __construct(string $srcFolder = '', string $dstFolder = '', string $srcFileNamePattern = '*', array $srcFileTypes = []) {
    $this->setSrcFolder($srcFolder);
    $this->setDestFolder($dstFolder);
    $this->setSrcFileNamePattern($srcFileNamePattern);
    $this->setSrcFileFileTypes($srcFileTypes);
  }

  public function setSrcFolder(string $path) {
    $this->srcFolder = $path;
  }

  public function setSrcFileNamePattern(string $pattern = '*') {
    $this->srcFileNamePattern = $pattern;
  }

  public function setSrcFileFileTypes(array $filetypes) {
    $this->srcFiletypes = $filetypes;
    //glob('folder/*.{$this->srcFiletypes}.blubb, GLOB_BRACE');
  }

  public function setDestFolder(string $path) {
    $this->dstFolder = $path;
  }

  public function setDestFileName(int $type, string $prefix = '') {
    $this->dstFileNameType = $type;
    $this->dstFileNamePrefix = $prefix;
  }
/**
 * es sollten an der Stelle nicht unbedingt Standardwerte eingegeben werden, es ist 
 * nicht unbedingt sinnvoll, hier Bilder standardmäßig zu formatieren
 **/
  public function setDestDimensions(int $w, int $h) {
    $this->srcW = $w;
    $this->dstH = $h;
  }

  public function setDstCompressionLevel(int $level) {
    $this->dstCompressionLevel = ($level >= 0 && $level <= 100) ? $level : 75;
  }

  public function execute() {
    $srcPaths=$this->findFiles();
    foreach($srcPaths as $srcPath){
      $fileType=$this->getImageFileType($srcPath);
//      printf($srcPath."<br>");
      printf($fileType."<br>");      
    }
//    Dimension neu berechnen
  function calcDimension($x1, $y1, $x2) {
    return $y1 * $x2 / $x1;
}
    //var_dump($imgs);    
  }

  public function findFiles() {
    $srcFileTypes = (is_array($this->srcFiletypes)) ? implode(',', $this->srcFiletypes) : $this->srcFiletypes;
    $pattern = sprintf('%s%s.{%s}', $this->srcFolder, $this->srcFileNamePattern, $srcFileTypes);
    return glob($pattern, GLOB_BRACE);
  }
  private function getImageFileType($path) {
    $types = ['', 'gif', 'jpeg', 'png'];
    $type = getimagesize($path)[2];
    if ($type > 0 && $type < 4) {
        return $types[$type];
    }
    return false;
  }

  /**
    Auf Dateityp prüfen
   * function getImageFileType($path) {
    $types = ['', 'gif', 'jpeg', 'png'];
    $type = getimagesize($path)[2];
    if ($type > 0 && $type < 4) {
        return $types[$type];
    }
    return false;
}
    Neue Datei erstellen
  * function createResample($srcImg, $srcW, $srcH, $dstW, $dstH, $filetype, $path, $filename) {
    $dstPath = false;
    $dstImg = imagecreatetruecolor($dstW, $dstH);
    imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);

    if ($filetype === 2) {
        $dstPath = $path . $filename . '.jpeg';
        imagejpeg($dstImg, $dstPath);
    } elseif ($filetype === 3) {
        $dstPath = $path . $filename . '.png';
        imagepng($dstImg, $dstPath);
    } else {
        return false;
    }

    return $dstPath;
}   
    Dimension neu berechnen
   * function calcDimension($x1, $y1, $x2) {
    return $y1 * $x2 / $x1;
}
    Namen generieren
   * function getRandName($prefix = '') {
    return str_replace('.', '_', uniqid($prefix, true));
}
  
    Speichern der Datei
   * function uploadFile($tmpName, $path, $dstName = false) {
    $n = ($dstName) ? $dstName : getRandName() . '.' . getImageFileType($tmpName);
    if(move_uploaded_file($tmpName, $path . $n)){
        return $path.$n;
    }
    return false;
}
   **/
  
  private function checkFiles() {
    
  }

//  static public function staticFindFiles() {
//    $srcFileTypes = (is_array(self::srcFiletypes)) ? implode(',', self::srcFiletypes) : self::srcFiletypes;    
//    $pattern = sprintf('%s%s.{%s}', self::srcFolder, self::srcFileNamePattern, $srcFileTypes);
//    return glob($pattern, GLOB_BRACE);
//  }
}
