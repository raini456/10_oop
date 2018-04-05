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

  public function setDestDimensions(int $w, int $h) {
    $this->srcW = $w;
    $this->dstH = $h;
  }

  public function setDstCompressionLevel(int $level) {
    $this->dstCompressionLevel = ($level >= 0 && $level <= 100) ? $level : 75;
  }

  public function create() {
    
  }

  public function findFiles() {
    $srcFileTypes = (is_array($this->srcFiletypes)) ? implode(',', $this->srcFiletypes) : $this->srcFiletypes;    
    $pattern = sprintf('%s%s.{%s}', $this->srcFolder, $this->srcFileNamePattern, $srcFileTypes);
    return glob($pattern, GLOB_BRACE);
  }
//  static public function staticFindFiles() {
//    $srcFileTypes = (is_array(self::srcFiletypes)) ? implode(',', self::srcFiletypes) : self::srcFiletypes;    
//    $pattern = sprintf('%s%s.{%s}', self::srcFolder, self::srcFileNamePattern, $srcFileTypes);
//    return glob($pattern, GLOB_BRACE);
//  }

}
