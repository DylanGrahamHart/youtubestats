<?php

$dirContent = [];
getDirContents(__DIR__ . '/classes', $dirContent);

////

function getDirContents($dirPath, &$dirContent){
  $files = scandir($dirPath);

  foreach($files as $key => $value){
    $path = realpath($dirPath . DIRECTORY_SEPARATOR . $value);

    if (!is_dir($path) && strpos($path, '.php') !== false) {
      require($path);
      $dirContent[] = $path;
      continue;
    }

    if (is_dir($path) && $value != '.' && $value != '..') {
      getDirContents($path, $dirContent);
    }
  }
}
