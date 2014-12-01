<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $this->helper->title()->append('Phalcon Skeleton'); ?><?php echo $this->helper->title()->get(); ?></title>
    <?php echo $this->helper->meta()->get('description'); ?>
    <?php echo $this->helper->meta()->get('keywords'); ?>
    <?php echo $this->assets->outputCss('css-header'); ?>
    <script src="/vendor/js/jquery-1.11.0.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/vendor/js/html5shiv.js"></script>
    <script src="/vendor/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php echo $this->getContent(); ?>
<?php echo $this->assets->outputJs('js-footer'); ?>
</body>
</html>