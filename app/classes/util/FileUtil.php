<?php

class FileUtil {

  static function getConfigJson($path) {
    $json = file_get_contents(APP_PATH . "/config/$path.json");
    return json_decode($json, true);
  }

}
