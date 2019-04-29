<?php

$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->request->getBaseUrl(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    <!-- Latest IE rendering engine & Chrome Frame Meta Tags -->
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <title>The Hobs</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <?php
    $cs->registerCssFile($baseUrl."/service/plugins/contact-form-7/includes/css/styles.css","all");
    $cs->registerCssFile($baseUrl."/service/js/settings.css","all");
    $cs->registerCssFile($baseUrl."/service/plugins/custom/css/js_composer.min.css","all");
    $cs->registerCssFile($baseUrl."/service/css/prettyPhoto.css","all");
    $cs->registerCssFile($baseUrl."/service/css/font-awesome.min.css","all");
    $cs->registerCssFile($baseUrl."/service/css/iconspack.css","all");
    $cs->registerCssFile($baseUrl."/service/css/animate.css","all");
    $cs->registerCssFile($baseUrl."/service/css/owl.carousel.css","all");
    $cs->registerCssFile($baseUrl."/service/css/bootstrap.min.css","all");
    $cs->registerCssFile($baseUrl."/service/css/rateit.css","all");
    $cs->registerCssFile($baseUrl."/service/css/style.css","all");
    $cs->registerCssFile($baseUrl."/service/css/color-schemes/red.css","all");
    $cs->registerCssFile($baseUrl."/service/css/theme_25.css","all");
    $cs->registerCssFile($baseUrl."/service/css/shortcodes.css","all");
    $cs->registerCssFile($baseUrl."/service/plugins/custom/lib/prettyphoto/css/prettyPhoto.min.css","all");
    $cs->registerCssFile($baseUrl."/service/plugins/custom/lib/owl-carousel2-dist/owl.min.css","all");
    $cs->registerCssFile($baseUrl."/service/plugins/custom/lib/bower/animate-css/animate.min.css","all");

    ?>
    <style id='rs-plugin-settings-inline-css' type='text/css'>
        #rs-demo-id {
        }
    </style>
    <link rel='stylesheet' id='google-fonts-zozo_options-css'
          href='http://fonts.googleapis.com/css?family=Roboto%3A100%2C300%2C400%2C500%2C700%2C900%2C100italic%2C300italic%2C400italic%2C500italic%2C700italic%2C900italic'
          type='text/css' media='all'/>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var layer_zozo_js_vars = {
            "zozo_template_uri": "http:\/\/themes.zozothemes.com\/layer\/university\/wp-content\/themes\/layer",
            "isRTL": "false",
            "isOriginLeft": "true",
            "zozo_sticky_height": "70px",
            "zozo_sticky_height_alt": "60px",
            "zozo_ajax_url": "http:\/\/themes.zozothemes.com\/layer\/university\/wp-admin\/admin-ajax.php",
            "zozo_back_menu": "Back",
            "zozo_CounterYears": "Years",
            "zozo_CounterMonths": "Months",
            "zozo_CounterWeeks": "Weeks",
            "zozo_CounterDays": "Days",
            "zozo_CounterHours": "Hours",
            "zozo_CounterMins": "Mins",
            "zozo_CounterSecs": "Secs",
            "zozo_CounterYear": "Year",
            "zozo_CounterMonth": "Month",
            "zozo_CounterWeek": "Week",
            "zozo_CounterDay": "Day",
            "zozo_CounterHour": "Hour",
            "zozo_CounterMin": "Min",
            "zozo_CounterSec": "Sec"
        };
        /* ]]> */
    </script>
    <?php
        $cs->registerScriptFile($baseUrl."/service/js/jquery/jquery.js", CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl."/service/js/jquery/jquery-migrate.min.js", CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl."/service/js/jquery.themepunch.revolution.min.js", CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl."/service/js/jquery.themepunch.tools.min.js", CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl."/service/js/theme-init.min.js", CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl."/service/plugins/contact-form-7/includes/js/jquery.form.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/contact-form-7/includes/js/scripts.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/js/theme-min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/js/wp-embed.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/js/skrollr.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/custom/js/dist/js_composer_front.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/js/jquery.countdown-plugin.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/js/jquery.countdown.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/custom/lib/prettyphoto/js/jquery.prettyPhoto.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/custom/lib/owl-carousel2-dist/owl.carousel.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/custom/lib/bower/imagesloaded/imagesloaded.pkgd.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/js/underscore.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/custom/lib/waypoints/waypoints.min.js", CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl."/service/plugins/custom/js/dist/vc_grid.min.js", CClientScript::POS_END);
    ?>

    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css"
          href="<?php echo $baseUrl.'/service/' ?>plugins/custom/css/vc_lte_ie9.min.css"
          media="screen"><![endif]--><!--[if IE  8]>
    <link rel="stylesheet" type="text/css"
          href="<?php echo $baseUrl.'/service/' ?>plugins/custom/css/vc-ie8.min.css"
          media="screen"><![endif]-->
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .vc_custom_1478071401093 {
            background-image: url(<?php echo $baseUrl.'/service/' ?>images/chairman.jpg) !important;
            background-position: center 20% !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1478004170604 {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        .vc_custom_1478071432277 {
            padding-top: 40px !important;
            padding-bottom: 55px !important;
        }

        .vc_custom_1477999753376 {
            padding-top: 70px !important;
        }

        .vc_custom_1478062441293 {
            margin-bottom: 30px !important;
        }

        .vc_custom_1478062507972 {
            margin-bottom: 30px !important;
        }

        .vc_custom_1478085438376 {
            margin-bottom: 60px !important;
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085386232 {
            margin-bottom: 60px !important;
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085326855 {
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085419713 {
            margin-bottom: 60px !important;
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085367072 {
            margin-bottom: 60px !important;
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085310517 {
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085401229 {
            margin-bottom: 60px !important;
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085347251 {
            margin-bottom: 60px !important;
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }

        .vc_custom_1478085296954 {
            border-top-width: 1px !important;
            border-right-width: 1px !important;
            border-bottom-width: 1px !important;
            border-left-width: 1px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-left-color: #e8e8e8 !important;
            border-left-style: solid !important;
            border-right-color: #e8e8e8 !important;
            border-right-style: solid !important;
            border-top-color: #e8e8e8 !important;
            border-top-style: solid !important;
            border-bottom-color: #e8e8e8 !important;
            border-bottom-style: solid !important;
        }</style>
    <style>
        .notice{
            width:80% !important;
            height:250px;
            display:none;
        }
    </style>

    <link rel='stylesheet' id='vc_google_fonts_abril_fatfaceregular-css'
          href='http://fonts.googleapis.com/css?family=Abril+Fatface%3Aregular' type='text/css' media='all'/>

    <script type='text/javascript'>
        /* <![CDATA[ */
        var _wpcf7 = {
            "loaderUrl": "images\/ajax-loader.gif",
            "recaptcha": {"messages": {"empty": "Please verify that you are not a robot."}},
            "sending": "Sending ...",
            "cached": "1"
        };
        /* ]]> */
    </script>

</head>


<?php echo $content; ?>


</html>