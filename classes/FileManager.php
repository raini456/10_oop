<?php

class FileManager {

  const READONLY = 'r';
  const WRITE = 'w';

  private $path;

  public function __construct($path) {
    $this->path = $path;
    if (!$this->exists()) {
      $this->createFile($this->path);
    }
  }

  static public function createFile($path) {
    $fh = fopen($path, FileManager::WRITE);
    fclose($fh);
  }

  static public function getFiles($folder, $ext) {
    $extString = (is_array($ext)) ? implode(',', $ext) : $ext;
    $pattern = sprintf('%s*.{%s}', $folder, $extString);
    return glob($pattern, GLOB_BRACE);
  }

  static public function deleteFiles($folder, $ext) {
    $files = FileManager::getFiles($folder, $ext);
    foreach ($files as $file) {
      unlink($file);
    }
  }

  public function openFile($mode) {
    return fopen($this->path, $mode);
  }

  public function CSV2Array($delimiter = ',', $enclosure = '"') {
    $handle = fopen($this->path, "r");
    $rows = [];
    while ($row = fgetcsv($handle, 0, $delimiter, $enclosure)) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function array2CSV(array $rows, $delimiter = ',', $enclosure = '"') {
    $fp = fopen($this->path, 'w');
    foreach ($rows as $row) {
      fputcsv($fp, $row, $delimiter, $enclosure);
    }
    fclose($fp);
  }

  public function exists() {
    return file_exists($this->path);
  }

  public function delete() {
    if (unlink($this->path)) {
      $this->path = NULL;
      return TRUE;
    }
    return FALSE;
  }

}
