<?php
/**
 * Created by PhpStorm.
 * User: KHASHRUL
 * Date: 10/10/2016
 * Time: 1:01 PM
 */
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->getBaseUrl(true);

$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;

?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="eE6U1jPXrtIl8itbYSLfGs5T_iC5P2n-bcWuW914sJ8" />
    <meta name="description" content="<?=$this->description?>" />

    <title><?=$this->title?></title>
    <!-- JS -->
<!--    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->

<?php

//    $cs->registerCssFile($baseUrl."/css/sliding-msg.css","screen");

    /*if($controller == 'site' && $action == 'index'){*/

    $cs->registerCssFile($baseUrl."/css/alotheme/css/font-awesome.min.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/font-linearicons.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/bootstrap.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/bootstrap-theme.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/jquery.fancybox.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/jquery-ui.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/owl.carousel.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/owl.transitions.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/owl.theme.css","screen");
    $cs->registerCssFile($baseUrl."/css/alotheme/css/theme.css","screen");
//    $cs->registerCssFile($baseUrl."/css/alotheme/css/responsive.css","screen");
    $cs->registerCssFile($baseUrl."/css/main.css","screen");


//    $cs->registerCssFile($baseUrl."/css/style.css","screen");
//    $cs->registerCssFile($baseUrl."/css/responsiveSlides.css","screen");
//    $cs->registerCssFile($baseUrl."/css/pricing-plan.css","screen");
    $cs->registerCssFile($baseUrl."/css/fonts/jquery.filer-icons/jquery-filer.css","screen");
    $cs->registerCssFile($baseUrl."/css/jquery.filer.css","screen");
    $cs->registerCssFile($baseUrl."/css/jquery.filer-dragdropbox-theme.css","screen");

//    $cs->registerCssFile($baseUrl."/css/adspoticons.css","screen");
//    $cs->registerCssFile($baseUrl."/css/alotheme/css/global.css","screen");


    $cs->registerScriptFile($baseUrl."/js/alotheme/js/jquery-1.12.0.min.js", CClientScript:: POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/js/bootstrap.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/js/jquery.fancybox.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/js/jquery-ui.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/js/owl.carousel.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/js/TimeCircles.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/js/theme.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/script.js", CClientScript::POS_HEAD);
    //$cs->registerScriptFile($baseUrl."/js/alotheme/js/homeslider.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/custom-ui.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/jquery.filer.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/fancybox/jquery.fancybox.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/fancybox/main.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/scrollup.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/custom.js", CClientScript::POS_HEAD);      //for scroll up
    $cs->registerScriptFile($baseUrl."/js/responsiveSlides.js", CClientScript::POS_HEAD);      //for responsive slider
    $cs->registerScriptFile($baseUrl."/js/script.js", CClientScript::POS_HEAD);
//    $cs->registerScriptFile($baseUrl."/js/jquery.lazyload.js", CClientScript::POS_HEAD);


    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.mCustomScrollbar.concat.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.countdown.js", CClientScript::POS_HEAD);
    //$cs->registerScriptFile($baseUrl."/js/estorejs/jquery.bxslider.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.mCustomScrollbar.concat.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/modernizr.custom.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/alotheme/global.js", CClientScript::POS_HEAD);

    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.jcarousellite.min.js", CClientScript::POS_HEAD);
    $cs->registerScriptFile($baseUrl."/js/estorejs/jquery.elevatezoom.js", CClientScript::POS_HEAD);


    /*Floating contact*/
    $cs->registerScriptFile($baseUrl."/js/sliding-msg.js", CClientScript::POS_HEAD);

    $cs->registerScriptFile($baseUrl."/js/analytics.js", CClientScript::POS_END);

    /*Excel*/
    $cs->registerScriptFile($baseUrl."/js/excel_script.js", CClientScript::POS_HEAD);

    ?>


    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- icons -->
    <link rel="icon" href="<?=$baseUrl?>/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$baseUrl?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$baseUrl?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$baseUrl?>images/ico/apple-touch-icon-72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=$baseUrl?>images/ico/apple-touch-icon-57-precomposed.png">



</head>
<body>
<?php Generic::determineCountry(); ?>
<?php echo $this->renderPartial('../elements/_common_header'); ?>
<?php echo $content; ?>
<?php echo $this->renderPartial('../elements/_common_footer'); ?>

</body>
</html>





