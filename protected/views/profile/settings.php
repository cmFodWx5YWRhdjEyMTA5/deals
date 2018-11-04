<?php

$baseUrl = Yii::app()->getBaseUrl(true);
$token = Yii::app()->session['user_token'];
$id = isset($profile_data['id']) ? $profile_data['id'] : '';
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';

?>


<?php
$info_array = array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
);
if(isset($service)){
    $info_array['service'] = $service;
    $info_array['service_plan'] = $service_plan;
}
echo $this->renderPartial($sidebar_type,$info_array);

?>


<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
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
                       <!-- <a href="#" class="btn btn-grey danger-hover btn-fw-normal">Delete Account</a>-->
                    </div>
                </div>

            </header>
            <div class="inner">

                <!-- <div class="basic-card">
                    <header>
                        <h5>Upload Image</h5>
                    </header>
                    <div class="inner">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">

                                <form id="imageform" method="post" enctype="multipart/form-data" action="<?=$baseUrl?>/site/UpdateProfileImage">
                                    Change profile image <input type="file" name="image" id="image" />
                                    <br>
                                    <input type="hidden" name="id" id="id" value="<?=$id?>">
                                    <button type="submit"  class="btn-theme">Save</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--basic-card-->

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
                                    <button type="submit"  class="btn-theme">Save</button>

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
                                        <button type="submit" class="btn-theme">
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
                                        <button type="submit" class="btn-theme">
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

                          <!--  <div class="radio-accordion-wrap">
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

                            </div>-->

                            <div align="left" id="update_email_status"></div>
                            <button type="submit"  class="btn-theme">Save</button>
                        </form>
                    </div>
                </div><!--basic-card-->

            </div>
        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

<script>
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

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#photoimg').live('change', function()
        {
            $("#preview_image").html('');
            $("#preview_image").html('<img src="loader.gif" alt="Uploading...."/>');
            $("#imageform").ajaxForm(
                {
                    target: '#preview_image'
                }).submit();
        });
    });
</script>