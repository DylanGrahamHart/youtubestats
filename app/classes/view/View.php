<?php

class View {

  public static $viewModel;

  static function buildView($templatePath, $viewModel) {
    self::$viewModel = $viewModel;
    self::getTemplate($templatePath);
  }  

  static function getTemplate($templatePath) {
    $viewModel = self::$viewModel; // Import viewModel into scope
    extract(self::$viewModel);
    require(TEMPLATE_PATH . "/$templatePath.php");
  }  

  static function getPartial($templatePath) {
    self::getTemplate("/partials/$templatePath");
  }

  static function getPage($templatePath) {
    self::getTemplate("/pages/$templatePath");
  }  
  
}
