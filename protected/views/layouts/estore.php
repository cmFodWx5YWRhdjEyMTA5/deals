<?php

$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->request->getBaseUrl(true);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php echo $this->title ?></title>

    <script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="../../../../d36mw5gp02ykm5.cloudfront.net/yc/adrns_yc1d8.js?v=6.11.119#p=toshibaxdt01aca100_661w6ypfsxx661w6ypfsx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <?php

    $cs->registerCssFile($baseUrl."/css/estorecss/font-linearicons.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/bootstrap.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/bootstrap-theme.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/jquery.fancybox.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/jquery-ui.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/owl.carousel.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/owl.transitions.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/owl.theme.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/jquery.mCustomScrollbar.css","screen");
    $cs->registerCssFile($baseUrl."/js/estorejs/slideshow/settings.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/theme.css","screen");
    $cs->registerCssFile($baseUrl."/css/estorecss/responsive.css","screen");



    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery-1.12.0.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/bootstrap.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.fancybox.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery-ui.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/owl.carousel.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/TimeCircles.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.countdown.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.bxslider.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.mCustomScrollbar.concat.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/modernizr.custom.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.hoverdir.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/slideshow/jquery.themepunch.revolution.js", CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl."/js/estorejs/slideshow/jquery.themepunch.plugins.min.js", CClientScript::POS_END);
    $cs->registerScriptFile($baseUrl."/js/estorejs/theme.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.jcarousellite.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.elevatezoom.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/script.js", CClientScript::POS_HEAD);

   ?>


</head>
<body>
<?php echo $content; ?>


</body>


</html>