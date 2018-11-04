<!DOCTYPE html>
<html lang="en">
<?php $baseUrl = Yii::app()->getBaseUrl(true);?>
<body>


<section id="main" class="clearfix page" style="background: aliceblue; margin-bottom: 0">
    <div class="container">
        <div class="global-page">
            <div class="breadcrumb-section" style="text-align: center">
                <img src="<?=$baseUrl?>/images/home2/logo_GL.gif" width="135" height="100">
                <!--<h2 class="title" align="center">Global Links</h2>-->
            </div>
            <p><h5 align="center" style="color:#688dab">You can find us globally</h5></p>
            <div class="col-xs-12 col-md-8 global">
                <div class="col-xs-12 col-md-3 global-links" style="border-right: 1px solid #dddddd">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('/us') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/usa-flag.png"> USA</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/ca') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/Canada-flag.jpg"> Canada</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/gb') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/uk_flag.png"> UK</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-3 global-links" style="border-right: 1px solid #dddddd">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('/fr') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/france-flag.jpg"> France</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/se') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/Sweden-flag.jpg"> Sweden</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/ch') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/Flag-Switzerland.jpg"> Switzerland</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-3 global-links" style="border-right: 1px solid #dddddd">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('/de') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/German_flag.jpg"> Germany</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/be') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/Belgium-flag.jpg"> Belgium</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/es') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/spain-flag.png"> Spain</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-3 global-links">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('/au') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/australia-flag.png"> Australia</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/ie') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/ireland-flag.png"> Ireland</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/nz') ?>" target="_blank"><img src="<?=$baseUrl?>/images/home2/New-Zealand-Flag.jpg"> New Zealand</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div><!-- container -->
</section>

<style>
    .global-links > ul >li {
        padding-bottom: 10px;
    }
    .global-links > ul >li >a {
        font-weight: bold;
        font-family: cursive, sans-serif;
    }
    .global{
        margin: 25px auto;
        float: none;
        border-top: 1px solid #dddddd;
        padding-top: 15px;
    }
</style>


<!-- JS -->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73239902-1', 'auto');
    ga('send', 'pageview');

</script>
</body>

</html>