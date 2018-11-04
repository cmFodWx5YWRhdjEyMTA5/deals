<?php


$baseUrl = Yii::app()->request->baseUrl;
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';

$ad_type = 'ads';
$user_id = $profile_data['id'];
$ads = Generic::getAdDetailsFromAddTable($user_id);

$opt = array(
    'w' =>'130',
    'h' =>'120',
    'g'=>'center',
    'r' => '0'
);

?>
<?php /*echo $this->renderPartial('../elements/_search_form'); */?>
<!-- ad-profile-page -->
<section id="main" class="clearfix category-page">
<div class="container">
<div class="profile section">
    <div class="uzr-dashboard">
        <div class="uzr-options-area clearfix">
            <div class="uzr-sidebar">
                <div class="dp-widget">
                    <img src="images/avatar5.png" alt="user">
                </div>
                <div class="nt-tab-triggers">
                    <ul data-target="#tabs-dashboard-01">
                        <li class="active">
                            <a href="#tab001">
                                <span><i class="adicon-grid"></i></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="bg7-icon-wrap">
                            <a href="#tab002">
                                <span><i class="adicon-document"></i></span>
                                My Ads
                            </a>
                        </li>
                        <li class="bg6-icon-wrap">
                            <a href="#tab003">
                                <span><i class="adicon-envelope"></i></span>
                                Messages
                            </a>
                        </li>
                        <li class="bg12-icon-wrap">
                            <a href="#tab004">
                                <span><i class="adicon-heart"></i></span>
                                Favourite Ads
                            </a>
                        </li>
                        <li class="bg5-icon-wrap">
                            <a href="#tab005">
                                <span><i class="adicon-search"></i></span>
                                My Searches
                            </a>
                        </li>
                        <li class="bg8-icon-wrap">
                            <a href="#tab006">
                                <span><i class="adicon-alarm"></i></span>
                                Ad Alerts
                            </a>
                        </li>
                        <li class="bg4-icon-wrap">
                            <a href="#tab007">
                                <span><i class="adicon-settings"></i></span>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="tabs-dashboard-01" class="uzr-panels">
                <div class="inner">

                    <div id="tab001" class="uzr-panel tab-panel active">
                        <a class="tab-accordion-trigger" href="#tab001">
                            <span><i class="adicon-grid"></i></span>
                            Dashboard
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <h4>Hello <?=$user_name?> !</h4>
                                    <span>Last account activity: 1 hour ago</span>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div align="right">
                                        <a href="javascript:void (0);" onclick="redirectUrl()" class="btn">View Public Ads</a>
                                    </div>


                                    <ul class="uzr-quick-nav">
                                        <li>
                                            <a href="#">
                                                <i class="adicon-document"></i>
                                                <span class="bg7">3</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="adicon-envelope"></i>
                                                <span class="bg6">3</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="adicon-heart"></i>
                                                <span class="bg12">3</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="adicon-search"></i>
                                                <span class="bg5">3</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </header>
                        <div class="inner">
                            <div class="text-widget">
                                <div class="inner">
                                    <p>
                                        This is your account dashboard. The place to check your ads, respond to your messages,
                                        view notifications or change any account settings or details.
                                    </p>

                                    <p>
                                        <a href="#" class="link">Learn How It Works</a> — Watch a short video that shows you how bdads24.com works. <br>
                                        <a href="#" class="link">Get Help</a> — View our help section and FAQs to get started on bdads24.com.
                                    </p>
                                </div><!--text-widget-->
                            </div>

                            <div class="cat-boxes clearfix">
                                <a href="listing.html" class="cat-box">
                                    <div class="inner">
                                        <div class="adicon-document"></div>
                                        <span>my ads</span>
                                    </div>
                                </a>
                                <a href="listing.html" class="cat-box">
                                    <div class="inner">
                                        <div class="adicon-envelope bg6"></div>
                                        <span>messages</span>
                                    </div>
                                </a>
                                <a href="listing.html" class="cat-box">
                                    <div class="inner">
                                        <div class="adicon-heart bg12"></div>
                                        <span>favorite ads</span>
                                    </div>
                                </a>
                                <a href="listing.html" class="cat-box">
                                    <div class="inner">
                                        <div class="adicon-car bg5"></div>
                                        <span>my searches</span>
                                    </div>
                                </a>
                                <a href="listing.html" class="cat-box">
                                    <div class="inner">
                                        <div class="adicon-alarm bg8"></div>
                                        <span>Ad alerts</span>
                                    </div>
                                </a>
                                <a href="listing.html" class="cat-box">
                                    <div class="inner">
                                        <div class="adicon-settings bg4"></div>
                                        <span>settings</span>
                                    </div>
                                </a>
                            </div>

                            <div class="call-to-action-2">
                                <div class="inner">
                                    <p>You don't have any active Ads. <strong>Post an ad now!</strong></p>
                                    <a href="#" class="btn btn-transparent">post an ad</a>
                                </div><!--text-widget-->
                            </div>

                        </div>
                    </div><!--panel-->

                    <div id="tab002" class="uzr-panel tab-panel">
                        <a class="tab-accordion-trigger" href="#tab002">
                            <span><i class="adicon-document"></i></span>
                            My Ads
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5 col-md-6">
                                    <div class="icon-heading">
                                        <h4><i class="adicon-heart tc7"></i> My Ads</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7 col-md-6">
                                    <div class="search-widget pull-right">
                                        <input type="text" placeholder="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>

                                </div>
                            </div>
                        </header>
                        <div class="inner">
                            <div class="items-list-md style2 pad-top-0">
                                <div class="items-list">
                                    <?php foreach($ads as $ad){
                                        $ad_id = $ad['id'];
                                        $ad_views = Generic::getTotalAdView($ad_id);
                                        $view_count = array_sum(array_column($ad_views, 'view_count'));?>

                                    <article class="item-spot">
                                        <a href="<?php echo $baseUrl."ad?ad_id=".urlencode(base64_encode($ad['id']))."&ad_type=".urlencode(base64_encode($ad_type)) ?>" class="imgBg">
                                            <img src="<?php $images = json_decode($ad['image_url']); if($images != '') echo ImageHelper::cloudinary($images[0],$opt); ?>" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="<?php echo $baseUrl."ad?ad_id=".urlencode(base64_encode($ad['id']))."&ad_type=".urlencode(base64_encode($ad_type)) ?>"><?php echo $ad['title'] ?></a></h6>
                                                <ul class="item-info">
                                                    <li><i class="fa fa-clock-o"></i>From: 26 Oct - To: 23 Nov </li>
                                                    <li><i class="fa fa-eye"></i><?=$view_count?></li>
                                                    <div class="price-tag">BDT <?php echo $ad['price'] ?></div>
                                                </ul>
                                            </header>

                                            <div class="item-admin-actions text-center">
                                                <ul>
                                                    <li><a class="tc" href="<?php echo $baseUrl."ad?ad_id=".urlencode(base64_encode($ad['id']))."&ad_type=".urlencode(base64_encode($ad_type)) ?>"><i class="adicon-eye"></i></a></li>
                                                    <li><a class="tc6-hover" href="<?php echo $baseUrl."update-ad?ad_id=".urlencode(base64_encode($ad['id'])) ?>"><i class="adicon-edit"></i></a></li>
                                                    <li><a href="#"><i class="adicon-activate"></i></a></li>
                                                    <li><a class="tc12-hover" href="javascript:void(0);" onclick="deleteItem(<?=$ad['id']?>,<?=$ad['user_id']?>)"><i class="adicon-recyclebin"></i></a></li>
                                                    <li>





                                                        <div class="custom-check">
                                                            <input id="select002" type="checkbox">
                                                            <label for="select002"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </article>
                                    <?php } ?>


                                </div>
                            </div>
                            <br>
                            <a href="#" class="btn btn-white block-element btn-md text-center">load more ads</a>
                        </div>
                    </div><!--panel-->

                    <div id="tab003" class="uzr-panel tab-panel">
                        <a class="tab-accordion-trigger" href="#tab003">
                            <span><i class="adicon-envelope"></i></span>
                            Messages
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 col-md-8">
                                    <div class="icon-heading">
                                        <h4><i class="adicon-envelope tc7"></i> Messages</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-4">
                                    <div class="search-widget">
                                        <input type="text" placeholder="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                        </header>
                        <div class="inner">

                            <div class="panel-actions">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <ul class="panel-action-list">
                                            <li><a href="#">All Messages</a></li>
                                            <li><a href="#">Read</a></li>
                                            <li><a href="#">Unread</a></li>
                                            <li><a href="#">Starred</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <ul class="text-right panel-action-list">
                                            <li><a href="#" class="danger-hover">Mark as Read</a></li>
                                            <li><a href="#" class="danger-hover">Delete</a></li>
                                            <li>
                                                <div class="selection-dropdown">
                                                    <div class="custom-check">
                                                        <input id="select001" type="checkbox">
                                                        <label for="select001"></label>
                                                    </div>
                                                    <button><i class="fa fa-caret-down"></i></button>
                                                    <ul>
                                                        <li><a href="#">All</a></li>
                                                        <li><a href="#">None</a></li>
                                                        <li><a href="#">Starred</a></li>
                                                        <li><a href="#">Unread</a></li>
                                                        <li><a href="#">Unstarred</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="msg-list">

                                <div class="msg-unit msg-unread">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/1.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select0021" type="checkbox">
                                                    <label for="select0021"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                                <div class="msg-unit msg-unread">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/2.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select00212" type="checkbox">
                                                    <label for="select00212"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                                <div class="msg-unit">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/3.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select0022" type="checkbox">
                                                    <label for="select0022"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                                <div class="msg-unit">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/3.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select00213" type="checkbox">
                                                    <label for="select00213"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                                <div class="msg-unit">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/4.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select00521" type="checkbox">
                                                    <label for="select00521"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                                <div class="msg-unit">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/5.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select00217" type="checkbox">
                                                    <label for="select00217"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                                <div class="msg-unit">
                                    <div class="msg-content">
                                        <a class="msg-open" href="#">open message</a>
                                        <figure>
                                            <img src="assets/img/users/1.jpg" alt="">
                                        </figure>
                                        <header>
                                            <strong>Jesscia Brown </strong>  |   Iphone 6 Plus Factory Unlocked 16GB
                                        </header>
                                        <div class="msg-body">
                                            <p>Hey! Do you want to sell your phone at $220? Write me back as soon</p>
                                            <div class="msg-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="msg-actions">
                                        <ul>
                                            <li><a class="tc" href="#"><i class="adicon-star"></i></a></li>
                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
                                            <li>
                                                <div class="custom-check">
                                                    <input id="select00219" type="checkbox">
                                                    <label for="select00219"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--msg-unit-->

                            </div>

                            <a href="#" class="btn btn-white block-element btn-md text-center">load more ads</a>

                        </div><!--inner-->
                    </div><!--panel-->

                    <div id="tab004" class="uzr-panel tab-panel">
                        <a class="tab-accordion-trigger" href="#tab004">
                            <span><i class="adicon-heart"></i></span>
                            Favourite Ads
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5 col-md-6">
                                    <div class="icon-heading">
                                        <h4><i class="adicon-heart tc12"></i> Favourite Ads</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-7 col-md-6">
                                    <div class="search-widget pull-left">
                                        <input type="text" placeholder="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="listing-actions pull-left" data-target="#items-listing-area">
                                        <div class="inner">
                                            <div class="layout-action">
                                                <a href="#" class="active">
                                                    <i class="fa fa-bars"></i>
                                                    <span class="tooltip">List layout</span>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-th"></i>
                                                    <span class="tooltip">Grid layout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="inner">
                            <div class="items-list-md style2 style3 pad-top-0">

                                <div id="items-listing-area" class="items-list clearfix">

                                    <article class="item-spot">
                                        <a href="#" class="imgAsBg">
                                            <img src="assets/img/items/ad1.png" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="single.html">Canon SX Powershot A Great D-SLR</a></h6>
                                                <span class="item-info-short">2:49 pm in Melbourne</span>
                                            </header>
                                            <div class="price-tag">$229.9</div>
                                            <div class="dashboard-btn-actions">
                                                <a href="#" class="btn btn-transparent">unfaourite</a>
                                                <a href="#" class="btn btn-transparent">view ad</a>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="item-spot">
                                        <a href="#" class="imgAsBg">
                                            <img src="assets/img/items/ad2.jpg" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="single.html">Canon SX Powershot A Great D-SLR</a></h6>
                                                <span class="item-info-short">2:49 pm in Melbourne</span>
                                            </header>
                                            <div class="price-tag">$229.9</div>
                                            <div class="dashboard-btn-actions">
                                                <a href="#" class="btn btn-transparent">unfaourite</a>
                                                <a href="#" class="btn btn-transparent">view ad</a>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="item-spot">
                                        <a href="#" class="imgAsBg">
                                            <img src="assets/img/items/ad3.jpg" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="single.html">Canon SX Powershot A Great D-SLR</a></h6>
                                                <span class="item-info-short">2:49 pm in Melbourne</span>
                                            </header>
                                            <div class="price-tag">$229.9</div>
                                            <div class="dashboard-btn-actions">
                                                <a href="#" class="btn btn-transparent">unfaourite</a>
                                                <a href="#" class="btn btn-transparent">view ad</a>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="item-spot">
                                        <a href="#" class="imgAsBg">
                                            <img src="assets/img/items/ad4.jpg" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="single.html">Canon SX Powershot A Great D-SLR</a></h6>
                                                <span class="item-info-short">2:49 pm in Melbourne</span>
                                            </header>
                                            <div class="price-tag">$229.9</div>
                                            <div class="dashboard-btn-actions">
                                                <a href="#" class="btn btn-transparent">unfaourite</a>
                                                <a href="#" class="btn btn-transparent">view ad</a>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="item-spot">
                                        <a href="#" class="imgAsBg">
                                            <img src="assets/img/items/ad5.jpg" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="single.html">Canon SX Powershot A Great D-SLR</a></h6>
                                                <span class="item-info-short">2:49 pm in Melbourne</span>
                                            </header>
                                            <div class="price-tag">$229.9</div>
                                            <div class="dashboard-btn-actions">
                                                <a href="#" class="btn btn-transparent">unfaourite</a>
                                                <a href="#" class="btn btn-transparent">view ad</a>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="item-spot">
                                        <a href="#" class="imgAsBg">
                                            <img src="assets/img/items/ad6.jpg" alt="dummy data">
                                        </a>
                                        <div class="item-content">
                                            <header>
                                                <h6><a href="single.html">Canon SX Powershot A Great D-SLR</a></h6>
                                                <span class="item-info-short">2:49 pm in Melbourne</span>
                                            </header>
                                            <div class="price-tag">$229.9</div>
                                            <div class="dashboard-btn-actions">
                                                <a href="#" class="btn btn-transparent">unfaourite</a>
                                                <a href="#" class="btn btn-transparent">view ad</a>
                                            </div>
                                        </div>
                                    </article>

                                </div>

                            </div>
                            <br>
                            <a href="#" class="btn btn-white block-element btn-md text-center">load more ads</a>
                        </div>
                    </div><!--panel-->

                    <div id="tab005" class="uzr-panel tab-panel">
                        <a class="tab-accordion-trigger" href="#tab005">
                            <span><i class="adicon-search"></i></span>
                            My Searches
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 col-md-8">
                                    <div class="icon-heading">
                                        <h4><i class="adicon-search tc1"></i> My Searches</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-4">
                                    <div class="search-widget">
                                        <input type="text" placeholder="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                        </header>
                        <div class="inner">

                            <div class="info-cards">
                                <div class="info-card">
                                    <div class="card-inner">
                                        <div class="card-icon">
                                            <i class="adicon-car"></i>
                                        </div>
                                        <ul class="card-track">
                                            <li><a href="#">Vehicles</a></li>
                                            <li><a href="#">Cars</a></li>
                                        </ul>
                                        <ul class="info-list">
                                            <li><i class="fa fa-map-marker"></i>Melbourne</li>
                                            <li><i class="fa fa-clock-o"></i>2:49 pm</li>
                                        </ul>
                                        <span>Only With Photos</span>
                                        <div class="card-actions">
                                            <a href="#" class="btn btn-transparent">Delete</a>
                                            <a href="#" class="btn btn-transparent">View</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <ul class="info-list no-icons">
                                                    <li>Brand:  All Brands</li>
                                                    <li>Model:  All Models</li>
                                                    <li>Price: 10,000 -  15,000</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-right">
                                                <div class="custom-checkbox square-style">
                                                    <input type="checkbox" id="select002178">
                                                    <label for="select002178">Get email notifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-card">
                                    <div class="card-inner">
                                        <div class="card-icon bg2">
                                            <i class="adicon-tablet"></i>
                                        </div>
                                        <ul class="card-track">
                                            <li><a href="#">Vehicles</a></li>
                                            <li><a href="#">Cars</a></li>
                                        </ul>
                                        <ul class="info-list">
                                            <li><i class="fa fa-map-marker"></i>Melbourne</li>
                                            <li><i class="fa fa-clock-o"></i>2:49 pm</li>
                                        </ul>
                                        <span>Only With Photos</span>
                                        <div class="card-actions">
                                            <a href="#" class="btn btn-transparent">Delete</a>
                                            <a href="#" class="btn btn-transparent">View</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <ul class="info-list no-icons">
                                                    <li>Brand:  All Brands</li>
                                                    <li>Model:  All Models</li>
                                                    <li>Price: 10,000 -  15,000</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-right">
                                                <div class="custom-checkbox square-style">
                                                    <input type="checkbox" id="select0021789">
                                                    <label for="select0021789">Get email notifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-card">
                                    <div class="card-inner">
                                        <div class="card-icon bg3">
                                            <i class="adicon-tv"></i>
                                        </div>
                                        <ul class="card-track">
                                            <li><a href="#">Vehicles</a></li>
                                            <li><a href="#">Cars</a></li>
                                        </ul>
                                        <ul class="info-list">
                                            <li><i class="fa fa-map-marker"></i>Melbourne</li>
                                            <li><i class="fa fa-clock-o"></i>2:49 pm</li>
                                        </ul>
                                        <span>Only With Photos</span>
                                        <div class="card-actions">
                                            <a href="#" class="btn btn-transparent">Delete</a>
                                            <a href="#" class="btn btn-transparent">View</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <ul class="info-list no-icons">
                                                    <li>Brand:  All Brands</li>
                                                    <li>Model:  All Models</li>
                                                    <li>Price: 10,000 -  15,000</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-right">
                                                <div class="custom-checkbox square-style">
                                                    <input type="checkbox" id="select0021788">
                                                    <label for="select0021788">Get email notifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-card">
                                    <div class="card-inner">
                                        <div class="card-icon bg4">
                                            <i class="adicon-sofa"></i>
                                        </div>
                                        <ul class="card-track">
                                            <li><a href="#">Vehicles</a></li>
                                            <li><a href="#">Cars</a></li>
                                        </ul>
                                        <ul class="info-list">
                                            <li><i class="fa fa-map-marker"></i>Melbourne</li>
                                            <li><i class="fa fa-clock-o"></i>2:49 pm</li>
                                        </ul>
                                        <span>Only With Photos</span>
                                        <div class="card-actions">
                                            <a href="#" class="btn btn-transparent">Delete</a>
                                            <a href="#" class="btn btn-transparent">View</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <ul class="info-list no-icons">
                                                    <li>Brand:  All Brands</li>
                                                    <li>Model:  All Models</li>
                                                    <li>Price: 10,000 -  15,000</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-right">
                                                <div class="custom-checkbox square-style">
                                                    <input type="checkbox" id="select0021787">
                                                    <label for="select0021787">Get email notifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-card">
                                    <div class="card-inner">
                                        <div class="card-icon bg5">
                                            <i class="adicon-briefcase"></i>
                                        </div>
                                        <ul class="card-track">
                                            <li><a href="#">Vehicles</a></li>
                                            <li><a href="#">Cars</a></li>
                                        </ul>
                                        <ul class="info-list">
                                            <li><i class="fa fa-map-marker"></i>Melbourne</li>
                                            <li><i class="fa fa-clock-o"></i>2:49 pm</li>
                                        </ul>
                                        <span>Only With Photos</span>
                                        <div class="card-actions">
                                            <a href="#" class="btn btn-transparent">Delete</a>
                                            <a href="#" class="btn btn-transparent">View</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <ul class="info-list no-icons">
                                                    <li>Brand:  All Brands</li>
                                                    <li>Model:  All Models</li>
                                                    <li>Price: 10,000 -  15,000</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-right">
                                                <div class="custom-checkbox square-style">
                                                    <input type="checkbox" id="select0021786">
                                                    <label for="select0021786">Get email notifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-card">
                                    <div class="card-inner">
                                        <div class="card-icon  bg6">
                                            <i class="adicon-buildings"></i>
                                        </div>
                                        <ul class="card-track">
                                            <li><a href="#">Vehicles</a></li>
                                            <li><a href="#">Cars</a></li>
                                        </ul>
                                        <ul class="info-list">
                                            <li><i class="fa fa-map-marker"></i>Melbourne</li>
                                            <li><i class="fa fa-clock-o"></i>2:49 pm</li>
                                        </ul>
                                        <span>Only With Photos</span>
                                        <div class="card-actions">
                                            <a href="#" class="btn btn-transparent">Delete</a>
                                            <a href="#" class="btn btn-transparent">View</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-8">
                                                <ul class="info-list no-icons">
                                                    <li>Brand:  All Brands</li>
                                                    <li>Model:  All Models</li>
                                                    <li>Price: 10,000 -  15,000</li>
                                                </ul>
                                            </div>
                                            <div class="col-xs-12 col-md-4 text-right">
                                                <div class="custom-checkbox square-style">
                                                    <input type="checkbox" id="select00217882">
                                                    <label for="select00217882">Get email notifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-white btn-md block-element text-center">Load more</a>

                        </div><!--inner-->
                    </div><!--panel-->

                    <div id="tab006" class="uzr-panel tab-panel">
                        <a class="tab-accordion-trigger" href="#tab006">
                            <span><i class="adicon-alarm"></i></span>
                            Ad Alerts
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 col-md-8">
                                    <div class="icon-heading">
                                        <h4><i class="adicon-alarm tc8"></i> My Alerts</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-4">
                                    <div class="search-widget">
                                        <input type="text" placeholder="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                        </header>
                        <div class="inner">
                            <div class="text-widget">
                                <div class="inner">
                                    <h5>What Are Ad Alerts?</h5>
                                    <p>
                                        Ad Alerts are email updates about latest ads that match your need or criteria. They can really save your time! Just tell us what you're looking for and we'll email you when matching ads are posted.
                                    </p>
                                    <h5>How Do I Set An Ad Alert?</h5>

                                    <p>We have made it very simple for you as there are two simple ways you can create an ad alert. Read the options below to create an ad alert now.</p>

                                    <ul class="caret-right-list">
                                        <li>Fill in the form below to create an ad alert.</li>
                                        <li>While searching, simply click the "Create Email Alert" link on the search results page.</li>
                                    </ul>

                                </div><!--text-widget-->
                            </div>

                            <div class="email-alerts-2">
                                <h5>Create Ad Alert</h5>
                                <form>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 field-block">
                                            <div class="labeled-input">
                                                <label>Email address</label>
                                                <input title="enter your email" type="email">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6 field-block">

                                            <div class="radio-dropdown wide">
                                                <i class="fa fa-bars"></i>
                                                <button>Frequency</button>
                                                <ul>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create0021" name="item-brand-name">
                                                        <label for="create0021">Once a day</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create0031" name="item-brand-name">
                                                        <label for="create0031">Once a week</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create0041" name="item-brand-name">
                                                        <label for="create0041">Twice a month</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create0051" name="item-brand-name">
                                                        <label for="create0051">Once a month</label>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="radio-dropdown wide field-block">
                                                <i class="fa fa-bars"></i>
                                                <button>Pick a category</button>
                                                <ul>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create002" name="item-brand-name">
                                                        <label for="create002">Vehicles</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create003" name="item-brand-name">
                                                        <label for="create003">Mobiles</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create004" name="item-brand-name">
                                                        <label for="create004">Electronics</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create005" name="item-brand-name">
                                                        <label for="create005">Furniture</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create006" name="item-brand-name">
                                                        <label for="create006">Jobs</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create008" name="item-brand-name">
                                                        <label for="create008">Real Estate</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create009" name="item-brand-name">
                                                        <label for="create009">Fashion</label>
                                                    </li>
                                                    <li class="custom-radio">
                                                        <input type="radio" id="create010" name="item-brand-name">
                                                        <label for="create010">Education</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <button class="btn block-element btn-yellow" type="submit">Create alert</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div><!--panel-->

                    <div id="tab007" class="uzr-panel tab-panel">
                        <a class="tab-accordion-trigger" href="#tab007">
                            <span><i class="adicon-settings"></i></span>
                            Settings
                        </a>
                        <header>
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 col-md-8">
                                    <div class="icon-heading">
                                        <h4><i class="adicon-alarm tc4"></i> Settings</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-4 text-right">
                                    <a href="#" class="btn btn-grey danger-hover btn-fw-normal">Delete Account</a>
                                </div>
                            </div>

                        </header>
                        <div class="inner">

                            <div class="basic-card">
                                <header>
                                    <h5>Location Details</h5>
                                </header>
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <form action="javascript:void(0);" id="register-name-update" method="post">
                                                <input type="hidden" id="user_token" class="form-control" name="user_token" value="<?=$token?>">

                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" id="user_name" name="user_name" class="form-control" value="<?=$user_name?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" id="address" name="address" class="form-control" value="<?=$address?>">
                                                    </div>

                                                <div align="left" id="update_name_status"></div>
                                                    <button type="submit"  class="btn btn-small btn-green">Save</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--basic-card-->

                            <div class="basic-card">
                                <header>
                                    <h5>Phone Number</h5>
                                </header>
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <form action="javascript:void(0);" id="register-number-update" method="post">
                                                <input type="hidden" id="user_token" class="form-control" name="user_token" value="<?=$token?>">
                                                <div class="field-block">
                                                    <div class="labeled-input">
                                                        <label>Phone number</label>
                                                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?=$phone_number?>">
                                                    </div>
                                                </div>
                                                <div class="field-block">
                                                    <div align="left" id="update_number_status"></div>
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--basic-card-->



                            <div class="basic-card">
                                <header>
                                    <h5>Change Password</h5>
                                </header>
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <form name="frmChange" method="post" action="javascript:void(0);" id="change-password-form" onSubmit="return validatePassword()">
                                                <input type="hidden" id="user_token" class="form-control" name="user_token" value="<?=$token?>">
                                                <div class="field-block">
                                                    <div class="labeled-input">
                                                        <label>Enter Current password</label>
                                                        <input name="current_password" id="current_password" type="password" class="required">
                                                    </div>
                                                </div>
                                                <div class="field-block">
                                                    <div class="labeled-input">
                                                        <label>Enter new password</label>
                                                        <input name="new_password" id="new_password" type="password" class="required">
                                                    </div>
                                                </div>
                                                <div class="field-block">
                                                    <div class="labeled-input">
                                                        <label>Confirm new password</label>
                                                        <input name="confirm_password" id="confirm_password" type="password" class="required">
                                                    </div>
                                                </div>
                                                <div class="field-block">
                                                        <div align="left" id="change_password_status"></div>
                                                        <button type="submit" class="btn btn-small btn-green">
                                                            save
                                                        </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--basic-card-->

                            <div class="basic-card">
                                <header>
                                    <h5>Email Settings</h5>
                                </header>
                                <div class="inner">
                                    <form action="javascript:void(0);" id="register-email-update" method="post">
                                        <input type="hidden" id="user_token" class="form-control" name="user_token" value="<?=$token?>">

                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <div class="field-block">
                                                    <div class="labeled-input">
                                                        <input title="title here" type="email" value="<?=$email?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="field-block">
                                                    <div class="labeled-input">
                                                        <label>Enter New Email</label>
                                                        <input type="email" id="email" name="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="radio-accordion-wrap">
                                            <div class="radio-accordion">
                                                <header>
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="select002178419">
                                                        <label for="select002178419">Get email notifications</label>
                                                    </div>
                                                </header>
                                                <div class="inner">
                                                    Every few weeks we send newsletters to all users in which we inform about changes in services, new products and our promotional campaigns. If you want to keep up with what is happening on the site subsribe to the newsletter.
                                                </div>
                                            </div>

                                            <div class="radio-accordion">
                                                <header>
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="select002178412">
                                                        <label for="select002178412">Yes I want to receive email notifications of messages.</label>
                                                    </div>
                                                </header>
                                                <div class="inner">
                                                    Every few weeks we send newsletters to all users in which we inform about changes in services, new products and our promotional campaigns. If you want to keep up with what is happening on the site subsribe to the newsletter.
                                                </div>
                                            </div>

                                            <div class="radio-accordion">
                                                <header>
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="select002178414">
                                                        <label for="select002178414">Yes I want to receive latest news and updates from adsport</label>
                                                    </div>
                                                </header>
                                                <div class="inner">
                                                    Every few weeks we send newsletters to all users in which we inform about changes in services, new products and our promotional campaigns. If you want to keep up with what is happening on the site subsribe to the newsletter.
                                                </div>
                                            </div>

                                        </div>

                                        <div align="left" id="update_email_status"></div>
                                        <button type="submit"  class="btn btn-small btn-green">Save</button>
                                    </form>
                                </div>
                            </div><!--basic-card-->

                        </div>
                    </div><!--panel-->

                </div><!--inner-->
            </div><!--panels-->

        </div>
    </div>
</div>
    </div>
<style>
    .info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}


</style>

<script>

    function deleteItem(id,user_id) {
        var del = confirm("Are you want to delete this item?");

        if (del == true) {
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/DeleteAd",
                data: {ad_id: id, user_id: user_id},
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.status === "success") {

                        $(".items-list").html();
                        $(".items-list").html(data.html);
                    }

                },
                error: function () {
                    alert('Error!')
                }
            })
        }
    }


    function redirectUrl(){

        var token = '<?php if(isset($token)) echo ($token); ?>';
        window.location = SITE_URL+'userProfile?uid='+token;
    }

    function validatePassword() {
        var current_password,new_password,confirm_password,output = true;

        current_password = document.frmChange.current_password;
        new_password = document.frmChange.new_password;
        confirm_password = document.frmChange.confirm_password;

        if(!current_password.value) {
            current_password.focus();
            document.getElementById("current_password").innerHTML = "required";
            output = false;
        }
        else if(!new_password.value) {
            new_password.focus();
            document.getElementById("new_password").innerHTML = "required";
            output = false;
        }
        else if(!confirm_password.value) {
            confirm_password.focus();
            document.getElementById("confirm_password").innerHTML = "required";
            output = false;
        }
        if(new_password.value != confirm_password.value) {
            new_password.value="";
            confirm_password.value="";
            new_password.focus();
            document.getElementById("confirm_password").innerHTML = "not same";
            output = false;
        }
        return output;
    }

</script>