<?php

class ChannelTransformation {

  static function transformApiResponse($apiResponse) {
    $channels = [];
    $items = $apiResponse->items || [];

    if (count($items)) {
      foreach ($apiResponse->items as $item) {
        $channels[] = [
          'title' => $item->snippet->title,
          'channelUrl' => "https://www.youtube.com/channel/{$item->id}",
          'imgUrl' => $item->snippet->thumbnails->high->url,
          'viewCount' => $item->statistics->viewCount,
          'videoCount' => $item->statistics->videoCount,
          'subscriberCount' => $item->statistics->subscriberCount
        ];
      }      
    } else {
      die('No items');
    }

    usort($channels, function($a, $b) {
      $sortKey = isset($_GET['sortKey']) ? $_GET['sortKey'] : 'subscriberCount';
      return $b[$sortKey] - $a[$sortKey];
    });    

    return [
      'channels' => objToArr($channels)
    ];
  }  

}
        