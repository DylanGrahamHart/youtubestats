<?php

class UrlRouter {

  static function init() {
    self::dispatchController();
  }

  private static function dispatchController() {
    $routePath = explode('?', $_SERVER['REQUEST_URI'])[0];

    foreach (FileUtil::getConfigJson('routes') as $route) {
      if ($routePath === $route['path']) {
        $controller = $route['controller'];
        $method = $route['method'];

        $controller::$method();
        return;
      }
    }

    self::redirectHome();
  }
  
  private static function redirectHome() {
    header('Location: /');
  }

}
