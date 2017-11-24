<?php

class ChannelService {

  const VALID_PARAMS = ['id', 'forUsername', 'maxResults', 'part'];

  const DEFAULT_PARAMS = [
    'part' => 'snippet,statistics'
  ];

  static function getApiData($inputParams = []) {
    $params = ApiService::gatherParams(self::VALID_PARAMS, self::DEFAULT_PARAMS);

    foreach ($inputParams as $key => $value) {
      $params[$key] = $value;
    }

    $apiResponse = ApiService::callApi('channels', $params);
    return ChannelTransformation::transformApiResponse($apiResponse);
  }

  static function getChannelIds($configJson) {
    $ids = '';
    $channels = FileUtil::getConfigJson($configJson);

    foreach ($channels as $i => $c) {
      if ($i === 0) {
        $ids .= $c['youtubeChannelId'];
      } else if ($i < 50) {
        $ids .= ',' . $c['youtubeChannelId'];
      }
    }

    return $ids;
  }

  // static function getChannelIdsFromUserName() {
  //   $ids = '';
  //   $channels = FileUtil::getConfigJson('top-50-by-subs');

  //   foreach ($channels as $i => $c) {
  //     $apiResponse = ApiService::callApi('channels', [
  //       'forUsername' => $c['user'],
  //       'part' => 'snippet,statistics'
  //     ]);

  //     if (count($apiResponse->items)) {
  //       $channels[$i]['id'] = $apiResponse->items[0]->id;
  //     } else {
  //       $channels[$i]['id'] = 'NOT FOUND';
  //     }
  //   }

  //   ddj($channels);

  //   return $ids;
  // }   

}
        