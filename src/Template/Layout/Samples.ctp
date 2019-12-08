<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=0.5,user-scalable=yes,initial-scale=1.0" />
  <title><?= h($title) ?></title>
</head>
<body>
  <h1><?= h($title) ?>ssss</h1>

  <p style="color: red; font-size: 2em"><?= $title ?></p>

  <?= $this->fetch('content') ?>

  <div>
    <small>&copy; 2019</small>
  </div>
</body>
</html>