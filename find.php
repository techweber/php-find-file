<?php

function scanAllDir($dir) {
  $result = [];
  foreach(scandir($dir) as $filename) {
    if ($filename[0] === '.') continue;
    $filePath = $dir . '/' . $filename;
    if (is_dir($filePath)) {
      foreach (scanAllDir($filePath) as $childFilename) {
        $result[] = $filename . '/' . $childFilename;
      }
    } else {
      $result[] = $filename;
    }
  }
  return $result;
}

$files = scanAllDir($argv[1]);

$searchFile = $argv[2]; 

foreach($files as $file){

	if(basename($file) == $searchFile){
		echo "File Found " . $file . "\n\n";
	}
}
