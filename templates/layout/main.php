<!DOCTYPE html>
<html>

<head>
  <?php View::getPartial('head') ?>
</head>

<body>
  
  <div id="wrapper">
    <?php View::getPartial('header') ?>

    <div id="page-<?= $pageId ?>" class="page">
      <?php View::getPage($pageId) ?>
    </div>    
  </div>

<!--   <script type="text/javascript">
    var YTS = window.YTS = {}:
    // YTS.viewModel = JSON.parse('<?= json_encode($viewModel) ?>');
  </script> -->
</body>
</html>