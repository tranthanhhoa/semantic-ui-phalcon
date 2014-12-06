<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{ helper.title().append('Semantic UI - Phalcon Skeleton') }}{{ helper.title().get() }}</title>
    {{ helper.meta().get('description') }}
    {{ helper.meta().get('keywords') }}
    {{ assets.outputCss('css-header') }}
    <script src="/vendor/js/jquery-1.11.0.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/vendor/js/html5shiv.js"></script>
    <script src="/vendor/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
{{ content() }}
{{ assets.outputJs('js-footer') }}
</body>
</html>