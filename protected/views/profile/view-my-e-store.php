<?php


$baseUrl = Yii::app()->getBaseUrl(true);
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);

?>


<?php echo $this->renderPartial('../elements/business_sidebar',array(
    'profile_data' => $profile_data

)); ?>

<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
    </div>
</div>
</div>
</div>
</div>
</div>
