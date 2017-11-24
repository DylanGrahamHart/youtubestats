<?php

class ApiService {

  const API_KEY = 'DERP';
  const API_URL = "https://www.googleapis.com/youtube/v3/";

  static function callApi($type, $params) {
    $ch = curl_init();

    $requestUrl = self::buildRequestUrl($type, $params);
    curl_setopt($ch, CURLOPT_URL, $requestUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $responseBody = curl_exec($ch);
    curl_close($ch);

    return json_decode($responseBody);
  }

  static function gatherParams($validParams, $defaultParams = []) {
    $params = [];

    foreach ($validParams as $paramKey) {
      if (isset($_GET[$paramKey])) {
        $params[$paramKey] = $_GET[$paramKey];
      }
    }

    foreach ($defaultParams as $key => $value) {
      if (!isset($params[$key])) {
        $params[$key] = $value;
      }
    }

    return $params;
  }

  private static function buildRequestUrl($type, $params) {
    $requestUrl = self::API_URL . $type . '?key=' . self::API_KEY;

    foreach ($params as $key => $value) {
      $requestUrl .=  '&' . $key . '=' . $value;
    }

    return $requestUrl;
  }

}
