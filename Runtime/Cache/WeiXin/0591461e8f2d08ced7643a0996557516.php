<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height = device-height, initial-scale=1">
    <!--不进行转码-->
    <meta http-equiv="Cache-Control" content="no-transform">
    <title><?php echo ($item->title); ?></title>
</head>
<body>
<?php echo ($item->content); ?>
</body>
</html>