<?php

class ImgDimension {
  const FILENAME_ORIGIN=1;
  const FILENAME_RANDOM = 2;
  const FILENAME_NUM = 3;
  const FILENAME_AUTO = 0;

  private $srcFolder='';
  private $srcFileNamePattern='';
  private $srcFiletypes=[];
  private $dstFolder="";  
  private $dstFileNameType=self::FILENAME_ORIGIN;//ImgDimension:: würde auch möglich sein, bzw. this->::;
  private $dstFileNamePrefix='';
  private $srcW='';
  private $dstH='';
  private $dstCompressionLevel=75;
  
  public function __construct(
          //$srcFolder, $destFolder, $imgName, $imgType
          ){}

  public function setSrcFolder(string $path) {
    $this->srcFolder=$path;
  }

  public function setSrcFileNamePattern(string $pattern='*'){
    $this->srcFileNamePattern=$pattern;
    
  }

  public function setSrcFileFilyTpes(array $filetypes) {
    $this->srcFiletypes=$filetypes;
    //glob('folder/*.{$this->srcFiletypes}.blubb, GLOB_BRACE');
  }

  public function setDestFolder(string $path) {
    $this->dstFolder=$path;
  }

  public function setDestFileName(int $type, string $prefix='') {
    $this->dstFileNameType=$type;
    $this->dstFileNamePrefix=$prefix;
  }

  public function setDestDimensions(int $w, int $h) {
   $this->srcW=$w;
   $this->dstH=$h;
  }

  public function setDstCompressionLevel(int $level) {
    $this->dstCompressionLevel=($level>=0 && $level<=100)?$level:75;
  }

  public function create() {
    
  }

}
