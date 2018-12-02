<?php

$baseUrl = Yii::app()->getBaseUrl(true);
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
if($uri_segments[1] != '' && strlen($uri_segments[1]) == 2 && $uri_segments[1] != 'ad'){
    $requested_country_code = strtoupper($uri_segments[1]);
    $requested_country = Generic::checkValidCountryRequest($requested_country_code);

    if(!$requested_country){
        return ;
    }
}

$country_details = Generic::checkForStoredCountry();

$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$image = $baseUrl."/images/img/default.jpg";
if($profile_data['image']) {
    $image = isset($profile_data['image']) ? $profile_data['image'] : '';
}
$user_selected_location =  Yii::app()->session['user_location'];



// $category_list = Generic::getAllCategory();
// $all_category_list = Generic::getAllCategoryData();

$register_type = isset($profile_data) && !empty($profile_data)? $profile_data['register_type']:'';

$style = "";
if($register_type=="business"){
    $style = "display:none";
}

$category_id = (isset($_REQUEST['selected_category']) && $_REQUEST['selected_category'] != '') ? $_REQUEST['selected_category'] : "" ;
$category_names = 'All Categories';

if($category_id){
    $name = Generic::getCategoryNameFromParentId($category_id);
    $category_names = $name[0]['category_name'];

}
//Generic::_setTrace($category_name);
$search_keyword= (isset($_REQUEST['q'])) ? $_REQUEST['q'] : "" ;

// $fashion_featured_ads = Generic::getHeaderFeaturedAds("fashion_n_garments",$requested_country->sortname,6);
// $fashion_new_ads = Generic::getHeaderNewAds("fashion_n_garments",$requested_country->sortname,6);



// $electronic_featured_ads = Generic::getHeaderFeaturedAds("electronics_appliance",$requested_country->sortname,6);
// $electronic_new_ads = Generic::getHeaderNewAds("electronics_appliance",$requested_country->sortname,6);

// $computer_featured_ads = Generic::getHeaderFeaturedAds("computer_n_internet",$requested_country->sortname,6);
// $computer_new_ads = Generic::getHeaderNewAds("computer_n_internet",$requested_country->sortname,6);

// $mobile_featured_ads = Generic::getHeaderFeaturedAds("mobile_n_gadget",$requested_country->sortname,6);
// $mobile_new_ads = Generic::getHeaderNewAds("mobile_n_gadget",$requested_country->sortname,6);

$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
$image_helper = new ImageHelper();

// if($requested_country->sortname){
//     $fashion_garments_url = $baseUrl.'/'.$requested_country->sortname.'/ad-list?category_slug=fashion_n_garments';
//     $electronics_url = $baseUrl.'/'.$requested_country->sortname.'/ad-list?category_slug=electronics_appliance';
//     $computer_internet = $baseUrl.'/'.$requested_country->sortname.'/ad-list?category_slug=computer_n_internet';
//     $mobile_gadget = $baseUrl.'/'.$requested_country->sortname.'/ad-list?category_slug=mobile_n_gadget';

// } else {
//     $fashion_garments_url = $baseUrl.'/ad-list?category_slug=fashion_n_garments';
//     $electronics_url = $baseUrl.'/ad-list?category_slug=electronics_appliance';
//     $computer_internet = $baseUrl.'/ad-list?category_slug=computer_n_internet';
//     $mobile_gadget = $baseUrl.'/ad-list?category_slug=mobile_n_gadget';
// }

//Generic::_setTrace($uri_segments);

$active_menu = Yii::app()->controller->action->id;

?>

<link rel="stylesheet" type="text/css" href="<?=$baseUrl?>/fancybox/jquery.fancybox.css" />
<style type="text/css">
    .sticky {
        position: fixed;
        background: rgba(255,255,255,1);
        top: 0px;
        width: 100%;
        z-index: 999;
    }
    .latest_package_pointer {
        padding-top: 50px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .estore_pointer {
        padding-top: 50px;
    }
</style>

<div class="wrap">
    <div id="header">
     
       </div>
        <!-- End Top Toggle -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-7 col-xs-12">
                        <ul class="top-menu">

                            <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/recently-viewed-ad');?>">Recently Viewed</a></li>
                            <li>Your Ip Address: <?php echo $_SERVER['REMOTE_ADDR'] ?></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div id="clockbox"></div>
                    </div>

                    <div class="col-md-4 col-sm-5 col-xs-12">

                        <ul class="top-info">
                            <?php if (!$session){ ?>

                                <li class="top-mobile sign-in"><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/sign-in'); ?>" style="font-size: 13px;font-weight: bold;color: #fff"><i class="fa fa-sign-in"></i> Sign in</a></li>
                                <li class="top-mobile create-account"><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/sign-in'); ?>" style="font-size: 14px;font-weight: bold;color: #fff"><i class="fa fa-male"> Create Account</i> </a></li>
                            <?php } ?>
                            <?php if ($session){ ?>
                                <li class="top-account has-child">
                                    <img class="img-circle" src="<?=$image?>" alt="User Image" style="width:30px;height:30px";>
                                    <a href="javascript:void(0);"><?=$profile_data['user_name']?></a>
                                    <ul class="sub-menu-top">
                                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/my-profile/dashboard');?>"><i class="fa fa-user"></i> My Profile</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/my-profile/my-ads');?>"><i class="fa fa-briefcase custom"></i> My ads</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/logout');?>"><i class="fa fa-power-off custom"></i> Logout</a></li>

                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="header">
            <div class="container">
                <div class="header-main">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="logo">
                                <a class="navbar-brand" href="/<?php echo $requested_country->sortname ?>"><img src="/images/logo.jpg"></a>

                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-7">
                            <nav class="main-nav">
                                <ul>
                                    <li class="<?php if($active_menu == 'index') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="/index.php">Home</a></li>
                                    <li><a href="/index.php#super-deals">Latest Packages</a></li>
                                    <li class="<?php if($active_menu == 'store') { echo "current-menu-ancestor"; } else { echo ""; } ?>">
                                        <a href="/index.php#isp_accessories">EStore</a>
                                        <!-- <ul class="sub-menu">
                                            <li><a href="#">Home Products</a></li>
                                            <li><a href="#">ISP Products</a></li>
                                        </ul> -->
                                    </li>
                                    <li class="<?php if($active_menu == 'Career') {  echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="<?php echo Yii::app()->createUrl('career');?>">ISP Career</a></li>
                                    <li  class="<?php if($active_menu == 'help') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/help');?>">FAQs</a></li>
                                    <li  class="<?php if($active_menu == 'contact') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/contact-us');?>">Contact Us</a></li>
                                </ul>
                                <a href="#" class="toggle-mobile-menu"><span>Menu</span></a>
                            </nav>
                            <!-- End Main Navigation -->
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                            <div class="mini-cart-button">
                                <a href="javascript:void(0);" onclick="CheckLogin('<?php echo $requested_country->sortname ?>')" class="mini-cart-view">Post Your Ad</a>
                            </div>
                            <!-- End Mini Cart -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
    </div>
    <!-- End Header -->

    <script type="text/javascript">
        tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
            if(nyear<1000) nyear+=1900;
            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

            if(nhour==0){ap=" AM";nhour=12;}
            else if(nhour<12){ap=" AM";}
            else if(nhour==12){ap=" PM";}
            else if(nhour>12){ap=" PM";nhour-=12;}

            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        }

        window.onload=function(){
            GetClock();
            setInterval(GetClock,1000);
        }
    </script>

<script type="text/javascript">

    var search_keyword = '<?=$search_keyword?>';
    $("#search_value").val(search_keyword);
    var selected_locations = '<?=$category_names?>';
    $(".change-text").html(selected_locations);


    function CheckLogin(){

        $.ajax({
            type : 'POST',
            async: false,
            url  : SITE_URL+"site/CheckLoginStatus",
            cache: false,
            dataType:"json",
            success: function(data)
            {
                if (data.status==='not_login' ) {
                        window.location = SITE_URL+'sign-in';
                }
                else if(data.status==='login'){
                    if(data.register_type == 'business'){
                        window.location = SITE_URL+'my-profile/add-package';
                    } else if (data.register_type == 'store'){
                        window.location = SITE_URL+'my-profile/add-ads';
                    }else{
                        window.location = SITE_URL+'add-post-details';
                    }
                }
            },
            error: function(){
                alert('Error!');
            }
        })}

    function CheckJobLogin(){

        $.ajax({
            type : 'POST',
            async: false,
            url  : SITE_URL+"site/CheckLoginStatus",
            cache: false,
            dataType:"json",
            success: function(data)
            {
                if (data.status==='not_login' ) {
                        window.location = SITE_URL+'sign-in';
                }
                else if(data.status==='login'){
                    if(data.register_type == 'business' || data.register_type == 'store'){
                        window.location = SITE_URL+'my-profile/add-job';
                    }
                }
            },
            error: function(){
                alert('Error!');
            }
        });
    }





    $("#sizelist a").on("click", function(e){
        //e.preventDefault();
        var element = $(this).parent().attr('data-value');
        var element_value = $(this).parent().attr('data-item');
        //alert(element);
        $(".category-toggle-link span").html(element);
       // element.addClass("select").siblings().removeClass("select");
        $("#selected_category").val(element_value);

    });




    $('.js-submit-button').click(function(){
        var selected_category = $('#selected_category').val();
        var input_string = $('#search_value').val();


        url = SITE_URL;
        if((selected_category == 'All Categories') && (input_string =='')){
            alert('Please Enter Choose Category or Search Keyword');

        }else{

            if(selected_category == 'All Categories') {
                selected_category = '';
            }

            url += 'search?' + 'selected_category=' + selected_category+ '&q='+input_string ;
            window.location = url;

        }});


</script>