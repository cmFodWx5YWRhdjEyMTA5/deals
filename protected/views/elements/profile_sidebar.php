<?php $baseUrl = Yii::app()->getBaseUrl(true);

$image = $baseUrl."/images/img/default.jpg";
if($profile_data['image']) {
    $image = isset($profile_data['image']) ? $profile_data['image'] : '';
}
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
?>

<section id="main" class="clearfix category-page">
    <div class="container">
        <div class="profile section">
            <div class="uzr-dashboard">
                <div class="uzr-options-area clearfix">
                    <div class="uzr-sidebar">
                        <div class="dp-widget">
                            <img src="<?=$image?>" alt="user">
                        </div>
                        <div class="nt-tab-triggers">
                            <ul data-target="#tabs-dashboard-01">
                                <li class="bg1-icon-wrap <?php if($action == 'YourDashboard') { echo "active"; } ?>">
                                    <a href="<?php echo Yii::app()->createUrl('/my-profile/dashboard'); ?>">
                                        <span><i class="adicon-grid"></i></span>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="bg6-icon-wrap <?php if($action == 'Messages') { echo "active"; } ?>">
                                    <a href="<?php echo Yii::app()->createUrl('/my-profile/messages'); ?>">
                                        <span><i class="adicon-envelope"></i></span>
                                        Messages
                                    </a>
                                </li>
                                <li class="bg12-icon-wrap <?php if($action == 'ListFavouriteAds') { echo "active"; } ?>">
                                    <a href="<?php echo Yii::app()->createUrl('/my-profile/favourite-ads'); ?>">
                                        <span><i class="adicon-heart"></i></span>
                                        Favourite Ads
                                    </a>
                                </li>
                                <!-- <li class="bg5-icon-wrap <?php if($action == 'MySearches') { echo "active"; } ?>">
                                    <a href="<?php echo Yii::app()->createUrl('/my-profile/my-searches'); ?>">
                                        <span><i class="adicon-search"></i></span>
                                        My Searches
                                    </a>
                                </li> -->
                                <li class="bg8-icon-wrap <?php if($action == 'Notifications') { echo "active"; } ?>">
                                    <a href="<?php echo Yii::app()->createUrl('/my-profile/notifications'); ?>">
                                        <span><i class="adicon-alarm"></i></span>
                                        Notifications
                                    </a>
                                </li>
                                <li class="bg4-icon-wrap <?php if($action == 'settings') { echo "active"; } ?>">
                                    <a href="<?php echo Yii::app()->createUrl('/my-profile/settings'); ?>">
                                        <span><i class="adicon-settings"></i></span>
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>