<?php

$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$all_category_list = Generic::getAllCategoryData();
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$enter_prise_name = isset($profile_data['enterprise_name']) ? $profile_data['enterprise_name'] : '';
$url_alias = str_replace(" ","_",strtolower($enter_prise_name));
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';
$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();

$ad_type = 'ads';
$user_id = $profile_data['id'];
$ads = Generic::getAdDetailsFromAddTable($user_id);
$opt = array(
    'w' =>'320',
    'h' =>'240',
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
                                <li class="bg8-icon-wrap">
                                    <a href="#tab009">
                                        <span><i class="adicon-alarm"></i></span>
                                        Create E-Store
                                    </a>
                                </li>
                                <li class="bg8-icon-wrap">
                                    <a href="#ad-post">
                                        <span><i class="adicon-alarm"></i></span>
                                        Ad Product
                                    </a>
                                </li>
                                <li class="bg7-icon-wrap">
                                    <a href="#tab002">
                                        <span><i class="adicon-document"></i></span>
                                        My Ads
                                    </a>
                                </li>

                                <li class="bg8-icon-wrap">
                                    <a href="#tab006">
                                        <span><i class="adicon-alarm"></i></span>
                                        Discount Offer
                                    </a>
                                </li>

                                <li class="bg8-icon-wrap">
                                    <a href="#tab006">
                                        <span><i class="adicon-alarm"></i></span>
                                        Special Ads
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

                                <li class="bg4-icon-wrap">
                                    <a href="#tab007">
                                        <span><i class="adicon-settings"></i></span>
                                        Settings
                                    </a>
                                </li>
                                <li class="bg8-icon-wrap">
                                    <a href="#tab006">
                                        <span><i class="adicon-alarm"></i></span>
                                        View My E-Store
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
                                            <h3>Enterprise Name : <?=$enter_prise_name?></h3>
                                            <h4>Hello, <?=$user_name?> !</h4>

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
                                                <a href="#" class="link">Learn How It Works</a> Watch a short video that shows you how bdads24.com works. <br>
                                                <a href="#" class="link">Get Help</a> View our help section and FAQs to get started on bdads24.com.
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


                                            <?php foreach($ads as $ad){ ?>

                                            <article class="item-spot">
                                                <a href="<?php echo $baseUrl."ad?ad_id=".urlencode(base64_encode($ad['id']))."&ad_type=".urlencode(base64_encode($ad_type)) ?>" class="imgAsBg">
                                                    <img src="<?php $images = json_decode($ad['image_url']); if($images != '') echo ImageHelper::cloudinary($images[0],$opt); ?>" alt="dummy data">
                                                </a>
                                                <div class="item-content">
                                                    <header>
                                                        <h6><a href="<?php echo $baseUrl."ad?ad_id=".urlencode(base64_encode($ad['id']))."&ad_type=".urlencode(base64_encode($ad_type)) ?>"><?php echo $ad['title'] ?></a></h6>
                                                        <ul class="item-info">
                                                            <li><i class="fa fa-clock-o"></i>From: 26 Oct - To: 23 Nov </li>
                                                            <li><i class="fa fa-eye"></i>BDT <?php echo $ad['price'] ?></li>

                                                        </ul>
                                                    </header>

                                                    <div class="item-admin-actions text-center">
                                                        <ul>
                                                            <li><a class="tc" href="<?php echo $baseUrl."ad?ad_id=".urlencode(base64_encode($ad['id']))."&ad_type=".urlencode(base64_encode($ad_type)) ?>"><i class="adicon-eye"></i></a></li>
                                                            <li><a class="tc6-hover" href="#"><i class="adicon-edit"></i></a></li>
                                                            <li><a href="#"><i class="adicon-activate"></i></a></li>
                                                            <li><a class="tc12-hover" href="#"><i class="adicon-recyclebin"></i></a></li>
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

                            <div id="ad-post" class="uzr-panel tab-panel">
                                <a class="tab-accordion-trigger" href="#ad-post">
                                    <span><i class="adicon-alarm"></i></span>
                                    Ad Alerts

                                    <!-- main -->

                                        <div class="container">

                                            <div class="breadcrumb-section">
                                                <!-- breadcrumb -->
                                                <ol class="breadcrumb">
                                                    <li><a href="index-2.html">Home</a></li>
                                                    <li>Ad Post</li>
                                                </ol><!-- breadcrumb -->

                                            </div><!-- banner -->

                                            <div class="adpost-details">
                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <?php
                                                        $form=$this->beginWidget('CActiveForm', array(
                                                            'id'=>'ad-form-business',
                                                            'enableAjaxValidation'=>false,
                                                            'action'=>'javascript:void(0);',
                                                            'enableClientValidation'=>false,

                                                        ));
                                                        ?>
                                                        <fieldset>
                                                            <div class="section postdetails">
                                                                <h4>Sell an Item or Service <span class="pull-right">* Mandatory Fields</span></h4>

                                                                <div id="error_ad_post"></div>

                                                                <div class="row form-group add-title" id='category_business'>
                                                                    <label class="col-sm-3 label-title">Select Category<span class="required">*</span></label>
                                                                    <div class="col-sm-9" >
                                                                        <select onchange="showHideInputField()" class="form-control"  id="category_id" name="category_id">
                                                                            <option  value="Select Category">Select Category</option>
                                                                       <?php
                                                                       foreach($result as $category){
                                                                           $category_name = $category['category_name'];
                                                                           $category_id = $category['category_id'];
                                                                           $subcategory_slug = $category['sub_category_slug'];?>
                                                                            <option  value="<?=$category_id?>"><?=$category_name?></option>
                                                                      <?php }?>
                                                                        </select>
                                                                    </div>
                                                                    <div id="message"></div>
                                                                </div>
                                                                <div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
                                                                    <label class="col-sm-3 label-title">Title for your Ad<span class="required">*</span></label>
                                                                    <div class="col-sm-9" >
                                                                        <input type="text" name="ads_title" id="ad_title_business" class="form-control"  placeholder="ex, Sony Xperia dual sim 100% brand new ">
                                                                    </div>
                                                                    <div id="message"></div>
                                                                </div>
                                                                <div class="row form-group add-image">
                                                                    <label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
                                                                    <div class="col-sm-9">
                                                                        <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload.<span>You can add multiple images (Maximum Five).</span></h5>
                                                                        <div class="upload-section">
                                                                            <input type="file" name="files[]" id="filer_input2" multiple="multiple">
                                                                            <input type="hidden" name="image_file" value="" id="image_file" >
                                                                            <!--<input type="file" id="upload-image-one" name="ads_image[]" multiple>-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group item-description" id="description" title="Keep it friendly, but have your buyers in mind, i.e. what they're looking for and what questions they may have, when writing your description. It's also important to highlight the benefits of whatever you're offering.">
                                                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" name="ads_description" id="ad_description_business" placeholder="Write few lines about your products" rows="8"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group select-condition">
                                                                    <label class="col-sm-3">Condition<span class="required">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="radio" name="ads_condition" value="1" id="new" class="ads_condition_business" >
                                                                        <label for="new">New</label>
                                                                        <input type="radio" name="ads_condition" value="0" id="used" class="ads_condition_business">
                                                                        <label for="used">Used</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group select-price"  title="Don't know what price to put? Balance out how much you want for what you're offering with how much you think users are willing to pay.">
                                                                    <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <span>BDT</span>
                                                                        <input type="text" id="ad_price_business" name="ads_price" class="form-control" >
                                                                        <br>
                                                                        <br>
                                                                        <input type="radio" name="price_type" value="1" id="fixed" checked>
                                                                        <label for="fixed">Fixed </label>
                                                                        <input type="radio" name="price_type" value="0" id="negotiable">
                                                                        <label for="negotiable">Negotiable </label>
                                                                    </div>
                                                                </div>
                                                                <div id="meta_html"></div>
                                                                <div class="row form-group">
                                                                    <label class="col-sm-3 label-title">Featured Ad?<span class="required">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <label class="switch">
                                                                            <input class="switch-input" type="checkbox" name="featured" />
                                                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <label class="col-sm-3 label-title">Ad Status?<span class="required">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <label class="switch">
                                                                            <input class="switch-input" type="checkbox" name="show_in_store" />
                                                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                                                            <span class="switch-handle"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>


                                                            </div><!-- section -->

                                                            <div class="checkbox section agreement">
                                                                <label for="send">
                                                                    <input type="checkbox" name="send" id="send">
                                                                    Send me bdads24.com Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
                                                                </label>
                                                                <br clear="all"><br clear="all">
                                                                <div align="left" id="ad_status_business"></div>
                                                                <br clear="all"><br clear="all">
                                                                <button type="submit" id="ad_submit" class="btn btn-primary">Post Your Ad</button>
                                                            </div><!-- section -->

                                                        </fieldset>
                                                        <?php $this->endWidget();?>
                                                        <!-- form -->
                                                    </div>

                                                </div><!-- photos-ad -->
                                            </div>
                                        </div><!-- container -->



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
                            <div id="tab009" class="uzr-panel tab-panel">
                                <a class="tab-accordion-trigger" href="#tab007">
                                    <span><i class="adicon-settings"></i></span>
                                    Create Your Own E-Store
                                </a>
                                <div class="row">
                                        <div class="col-xs-12 col-sm-7 col-md-8">
                                            <div class="icon-heading">
                                                <h4><i class="adicon-create tc4"></i> Create Your Own E-Store</h4>
                                            </div>
                                        </div>
                                 </div>

                                <div class="inner">
                                    <div class="basic-card">
                                        <header>
                                            <h5>Store Details</h5>
                                        </header>
                                        <div class="inner">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6">
                                                    <form action="javascript:void(0);" id="estore-create" method="post">
                                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">

                                                        <div class="form-group">
                                                            <label>Company Name</label>
                                                            <input type="text" id="company_name" name="company_name" value="<?=$enter_prise_name?>" readonly class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Company URL Alias</label>
                                                            <input type="text" id="company_url_alias"  name="company_url_alias" value="<?=$url_alias?>"  class="form-control" >
                                                            <div id="success_html"></div>
                                                            <div id="suggestion_html"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Company Slogan</label>
                                                            <input type="text" id="slogan" name="slogan" class="form-control" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Company Logo</label>
                                                            <input type="file" name="files" id="filer_input4">
                                                            <input type="hidden" name="logo_image" value="" id="logo_image" >
                                                        </div>
                                                        <div>
                                                            <label>Banner Slider (Upload Three Image)</label>
                                                            <input type="file" name="files[]" id="filer_input3" multiple="multiple">
                                                            <input type="hidden" name="banner_image" value="" id="banner_image" >
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Add Your Category</label>
                                                            <div class="show">
                                                            <div class="firsts">
                                                                <select id="firsts" multiple="true">
                                                                    <?php
                                                                    if (isset($result)){
                                                                        foreach($result as $category){
                                                                            $category_id = $category['category_id'];
                                                                            $category_name = $category['category_name'];
                                                                            ?>
                                                                            <option value="<?=$category_id?>">  <?=$category_name?> </option>
                                                                            <?php }}?>

                                                                </select>
                                                            </div>
                                                            <div class="mid" style="width: 150px;  margin-left: 25px">
                                                                <a href="javascript:void(0);" class='add_button'> Add </a><br>
                                                                <a href="javascript:void(0);" class='remove_button'> Remove </a><br>
                                                                <a href="javascript:void(0);" class='add-all'> Add All </a><br>
                                                                <a href="javascript:void(0);" class='remove-all'> Remove All </a>
                                                            </div>
                                                            <div class="ends">
                                                                <select id="second" name="categories" multiple="multiple">


                                                                </select>
                                                                <input type="hidden" name="category" value="" id="category" >
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Add Your Own Category</label>
                                                            <input type="text" id="own_category" name="own_category" >

                                                        </div>

                                                        <div class="form-group">
                                                            <label>About Us</label>

                                                            <textarea rows="20" cols="40" id="about_us" name="about_us" ></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact Us</label>
                                                            <textarea rows="20" cols="40" id="contact_us" name="contact_us" ></textarea>

                                                        </div>
                                                        <div align="left" id="update_name_status"></div>
                                                        <button type="submit" id="estore_submit"  class="btn btn-small btn-green">Save</button>

                                                    </form>
                                                </div>
                                            </div>
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

            .switch {
                position: relative;
                display: block;
                vertical-align: top;
                width: 100px;
                height: 30px;
                padding: 3px;
                margin: 0 10px 10px 0;
                background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
                background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
                border-radius: 18px;
                box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
                cursor: pointer;
            }
            .switch-input {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
            }
            .switch-label {
                position: relative;
                display: block;
                height: inherit;
                font-size: 10px;
                text-transform: uppercase;
                background: #eceeef;
                border-radius: inherit;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
            }
            .switch-label:before, .switch-label:after {
                position: absolute;
                top: 50%;
                margin-top: -.5em;
                line-height: 1;
                -webkit-transition: inherit;
                -moz-transition: inherit;
                -o-transition: inherit;
                transition: inherit;
            }
            .switch-label:before {
                content: attr(data-off);
                right: 11px;
                color: #aaaaaa;
                text-shadow: 0 1px rgba(255, 255, 255, 0.5);
            }
            .switch-label:after {
                content: attr(data-on);
                left: 11px;
                color: #FFFFFF;
                text-shadow: 0 1px rgba(0, 0, 0, 0.2);
                opacity: 0;
            }
            .switch-input:checked ~ .switch-label {
                background: #15831b;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
            }
            .switch-input:checked ~ .switch-label:before {
                opacity: 0;
            }
            .switch-input:checked ~ .switch-label:after {
                opacity: 1;
            }
            .switch-handle {
                position: absolute;
                top: 4px;
                left: 4px;
                width: 28px;
                height: 28px;
                background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
                background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
                border-radius: 100%;
                box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
            }
            .switch-handle:before {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -6px 0 0 -6px;
                width: 12px;
                height: 12px;
                background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
                background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
                border-radius: 6px;
                box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
            }
            .switch-input:checked ~ .switch-handle {
                left: 74px;
                box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
            }

            /* Transition
            ========================== */
            .switch-label, .switch-handle {
                transition: All 0.3s ease;
                -webkit-transition: All 0.3s ease;
                -moz-transition: All 0.3s ease;
                -o-transition: All 0.3s ease;
            }




            .show {
                width:900px;
                clear:both;
            }
            .firsts {
                background-color:#ffe6e6;
                width:200px;
                float:left;
            }
            .mid {
                padding-left: 30px;
                float:left;
                text-align:center;
                width:369px;

            }
            .ends {
                background-color:#ffe6e6;
                width:200px;
                float:left;
            }
            input[type="file"] {

                display:inline;
            }
            .imageThumb {
                max-height: 75px;
                border: 2px solid;
                margin: 10px 10px 0 0;
                padding: 1px;
                display: inline;
            }

        </style>

        <script>
            $(document).ready(function() {
                checkUrlAlias();
                $('#company_url_alias').on('focus',function(){
                   $("#success_html").html('');

               });
                $('#company_url_alias').on('blur',function(){
                    checkUrlAlias();
                });
                function checkUrlAlias(){
                    var company_url_alias = $('#company_url_alias').val();
                    var user_id = $('#user_id').val();
                    $.ajax({
                        type : 'POST',
                        url  : SITE_URL+"estore/CheckCompanyName",
                        data : {url_alias:company_url_alias,user_id:user_id},
                        cache: false,
                        dataType:"json",
                        success : function(response){
                            if(response.status=="success"){
                                $("#success_html").html('<div class="alert alert-danger"> <span></span> &nbsp; '+response.message+' !</div>');
                                $("#suggestion_html").html(response.suggestion);

                            }else if(response.status=="false") {
                                $("#success_html").html('<div class="alert alert-success"> <span></span> &nbsp; '+response.message+' !</div>');
                            }
                        }
                    });
                }


            });

            $('.add_button').click(function(){
                $('#firsts option:selected').appendTo('#second');
                var value =   $('#second').val();
                $("#category").val(value);

            });
            $('.remove_button').click(function(){
                $('#second option:selected').appendTo('#firsts');
            });
            $('.add-all').click(function(){
                $('#firsts option').appendTo('#second');
                $('#second option').prop('selected','selected');
                var value =   $('#second').val();
                $("#category").val(value);

            });
            $('.remove-all').click(function(){
                $('#second option').appendTo('#firsts');
            });

            function showHideInputField(){
                var value = $('#category_id').val();

                $.ajax({
                    type : 'POST',
                    url  : SITE_URL+"site/ShowHideInputField",
                    data : {category_id:value},
                    cache: false,
                    dataType:"json",
                    success : function(response){
                        if(response.status=="success"){

                            $("#meta_html").html(response.html);

                        }
                    }


                });
            }

            function placeValue(suggestion_string){
                jQuery('#company_url_alias').val(suggestion_string);
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