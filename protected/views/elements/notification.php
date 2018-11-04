<?php $token = Yii::app()->session['user_token'];?>

<div align="right">
    <!--<a href="javascript:void (0);" onclick="redirectUrl()" class="btn">View Public Ads</a>-->
</div>


<ul class="uzr-quick-nav" id="notification_panel">
   
    <li>
        <a href="<?php echo Yii::app()->request->getBaseUrl(true).'/my-profile/messages' ?>" title="Message" class="notification_message">
            <i class="adicon-envelope"></i>
            <span class="bg6"></span>
        </a>
    </li>
    <li>
        <a href="<?php echo Yii::app()->request->getBaseUrl(true).'/my-profile/favourite-ads' ?>" title="Favorite" class="notification_favorite">
            <i class="adicon-heart"></i>
            <span class="bg12"></span>
        </a>
    </li>
    <li>
        <a href="<?php echo Yii::app()->request->getBaseUrl(true).'/my-profile/my-searches' ?>" title="Search" class="notification_search">
            <i class="adicon-search"></i>
            <span class="bg5"></span>
        </a>
    </li>
    <li>
        <a href="<?php echo Yii::app()->request->getBaseUrl(true).'/my-profile/notifications' ?>" title="Notifications" class="notification_alert">
            <i class="adicon-alarm"></i>
            <span class="bg7"></span>
        </a>
    </li>
</ul>
<input type="hidden" name="user_token" id="user_token" value="<?php echo Yii::app()->session['user_token'] ?>" />

<script>
    function countMessageNotification(user_token){
        $.ajax({
            type: 'POST',
            url: SITE_URL + "profile/getMessageNotification",
            data: {user_token: user_token},
            cache: false,
            dataType: "json",
            success: function (response) {
                if(response.status == 'success') {
                    if(response.notification_count == '0') {
                        $('.notification_message .bg6').css('display','none');
                    } else {
                        $('.notification_message .bg6').css('display','block');
                        $('.notification_message .bg6').html(response.notification_count);
                    }
                }
            },
            complete: function() {
                // Schedule the next request when the current one's complete
                setTimeout(function(){countMessageNotification(user_token)}, 5000);
            }
        });
    }

    function countFavoriteNotification(user_token){
        $.ajax({
            type: 'POST',
            url: SITE_URL + "profile/getFavoriteNotification",
            data: {user_token: user_token},
            cache: false,
            dataType: "json",
            success: function (response) {
                if(response.status == 'success') {
                    if(response.notification_count == '0') {
                        $('.notification_favorite .bg12').css('display','none');
                    } else {
                        $('.notification_favorite .bg12').css('display','block');
                        $('.notification_favorite .bg12').html(response.notification_count);
                    }

                }
            },
            complete: function() {
                // Schedule the next request when the current one's complete
                setTimeout(function(){countFavoriteNotification(user_token)}, 5000);
            }
        });
    }

    function countSearchNotification(user_token){
        $.ajax({
            type: 'POST',
            url: SITE_URL + "profile/getSearchNotification",
            data: {user_token: user_token},
            cache: false,
            dataType: "json",
            success: function (response) {
                if(response.status == 'success') {
                    if(response.notification_count == '0') {
                        $('.notification_search .bg5').css('display','none');
                    } else {
                        $('.notification_search .bg5').css('display','block');
                        $('.notification_search .bg5').html(response.notification_count);
                    }
                }
            },
            complete: function() {
                // Schedule the next request when the current one's complete
                setTimeout(function(){countSearchNotification(user_token)}, 5000);
            }
        });
    }

    function countAlertNotification(user_token){
        $.ajax({
            type: 'POST',
            url: SITE_URL + "profile/getAlertNotification",
            data: {user_token: user_token},
            cache: false,
            dataType: "json",
            success: function (response) {
                if(response.status == 'success') {
                    if(response.notification_count == '0') {
                        $('.notification_alert .bg7').css('display','none');
                    } else {
                        $('.notification_alert .bg7').css('display','block');
                        $('.notification_alert .bg7').html(response.notification_count);
                    }
                }
            },
            complete: function() {
                // Schedule the next request when the current one's complete
                setTimeout(function(){countAlertNotification(user_token)}, 5000);
            }
        });
    }


    $(document).ready(function(){
        var user_token = $('#user_token').val();
        countMessageNotification(user_token);
        countFavoriteNotification(user_token);
        countSearchNotification(user_token);
        countAlertNotification(user_token);
    });

    function redirectUrl(){

        var token = '<?php if(isset($token)) echo ($token); ?>';
        window.location = SITE_URL+'userProfile?uid='+token;
    }



</script>