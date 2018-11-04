<?php
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
?>




<?php echo $this->renderPartial('../elements/business_sidebar',array(

    'profile_data'=> $profile_data

)); ?>

<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
    </div>
</div>
</div>
</div>
</div>
</div>