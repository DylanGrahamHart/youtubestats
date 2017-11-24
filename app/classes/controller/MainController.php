<?php

class MainController {

  static function home() {
    $params = [
      // 'id' => ChannelService::getChannelIds('my-subs')
      'id' => ChannelService::getChannelIds('top-50-by-subs')
    ];

    $viewModel = ChannelService::getApiData($params);
    $viewModel['pageId'] = 'home';

    View::buildView('layout/main', $viewModel);
  }

  static function derp() {

  }

  static function cron() {
    if ($_SERVER['SERVER_ADDR'] === $_SERVER['REMOTE_ADDR']) {

    }
  }



}
