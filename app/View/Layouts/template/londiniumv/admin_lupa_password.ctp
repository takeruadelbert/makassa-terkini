<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shorcut icon" type="image/x-icon" href="<?= Router::url("/icons/favicon.ico") ?>"/>
        <title>Lupa Password</title>
        <link rel="stylesheet" href="<?= Router::url("/template/londiniumv/login/css/bootstrap.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/template/londiniumv/login/css/bootstrap-material-design.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/template/londiniumv/login/css/ripples.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/template/londiniumv/login/css/download/font-awesome.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/template/londiniumv/login/css/download/build.css", true) ?>">
        <link rel="stylesheet" href="<?= Router::url("/template/londiniumv/login/css/custom/login.css", true) ?>">
        <script src="<?= Router::url("/template/londiniumv/login/js/jquery-2.1.4.js", true) ?>"></script>
    </head>
    <body>
        <?php
        echo $this->fetch("content");
        ?>
        <script src="<?= Router::url("/template/londiniumv/login/js/bootstrap.js", true) ?>"></script>
        <script src="<?= Router::url("/template/londiniumv/login/js/material.js", true) ?>"></script>
        <script src="<?= Router::url("/template/londiniumv/login/js/ripples.js", true) ?>"></script>
        <script>
            $(document).ready(function () {
                $.material.init();     
            });
        </script>
    </body>    

</html>