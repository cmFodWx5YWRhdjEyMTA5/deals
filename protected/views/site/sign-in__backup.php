<?php
$user_token = Yii::app()->request->cookies['user_token'];
$all_category = Generic::getAllCategory();
$all_category_promotion = Generic::getAllCategoryPromotion();
$countries = Generic::getCountries();
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->request->getBaseUrl(true);
$cs->registerCssFile($baseUrl . "/css/jQueryTab.css", "screen");
$cs->registerCssFile($baseUrl . "/css/animation.css", "screen");
$cs->registerCssFile($baseUrl . "/css/multiple-select.css", "screen");
?>
<style type="text/css">
    #nationwide_block option, #nationwide_block select, #zonal_block option, #zonal_block select, #category_thana_block option, #category_thana_block select {
        padding: 2px !important;
    }
    .select_action_buttons {
        margin-top: 40px;
    }
    .red_link {
        color: #ef0303 !important;
    }
    .green_link {
        color: #348c34 !important;
    }
    #nationwide_block a, #zonal_block a, #category_thana_block a{
        margin: 4px 0 !important;
        display: block;
    }
</style>
<!-- signin-page -->
<div id="content" xmlns="http://www.w3.org/1999/html">
    <div class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
                    <h2 class="title-shop-page">My Account</h2>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-ms-12">
                            <div class="account-login">
                                <form class="form-my-account" action="javascript:void(0);" id="login-form-personal">
                                    <h2 class="title">Already Registered?</h2>
                                    <div id="error_personal"></div>
                                    <input type="hidden" name="return_url" id="return_url" value="<?= $return_url ?>">
                                        <p><input type="email" id="user_email_phone" name="user_email_phone" placeholder="Enter your email"  /></p>
                                        <p><input type="password" id="password_personal" name="password" placeholder="Password" /></p>
                                        <p>
                                            <input type="checkbox"  id="remember" /> <label for="remember">Remember me</label>
                                            <a href="<?php echo Yii::app()->createUrl('/forget-password'); ?>" style="float:right;">Lost Password?</a>
                                        </p>
                                        <div align="left" id="signup_status_personal"></div>
                                        <p>
                                            <input type="submit" class="" id="login_button" value="Login">
                                                
                                        </p>
                                        
                                </form><!-- form -->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-ms-12">
                            <div class="account-register">
                                <form class="form-my-account" action="javascript:void(0);" id="register-form-personal" method="post">
                                    <h2 class="title">Create an account</h2>

                                    <!-- Primary Information -->
                                    <fieldset id="input-common">
                                        <p><input type="text" id="user_name"  placeholder="Account Holder Name" name="user_name" /></p>
                                        <p id="registration_email_block"><input type="email" id="register_user_email"  name="email" placeholder="Email Id" /><span style="display: none">Valid Email</span></p>
                                        <p><input type="password"  placeholder="Password" id="register__password" name="password" /></p>
                                        <p><input type="password"  placeholder="Confirm Password" id="register_confirm_password" name="confirm_password"  /></p>
                                        <input type="hidden" name="email_verifier" id="email_verifier" />
                                        <p>
                                            <input id="business" type="radio" name="rgroup" value="business"  />
                                            <label for="business" class='radio lbl'></label>
                                            <label for="business" class="lbl" data-toggle="popover" data-trigger="hover" data-content="I want to have service provider account">Internet Service Provider</label>
                                        </p>
                                        <p>
                                            <input id="store" type="radio" name="rgroup" value="store" />
                                            <label for="store" class='radio lbl'></label>
                                            <label for="store" class="lbl" data-toggle="popover" data-trigger="hover" data-content="I want to promote my Store">E-Store</label>
                                        </p>
                                        <p><input id="individual" type="radio" name="rgroup" value="individual" />
                                            <label for="individual" class='radio lbl'></label>
                                            <label for="individual" class="lbl" data-toggle="popover" data-trigger="hover" data-content="I want to get a new connection">Used Product</label>
                                        </p>
                                        <div align="left" id="register_status_personal"></div>
                                        <p><input type="button" id="next-btn" class="" name="next_btn" value="Next" /></p>
                                    </fieldset>

                                    <!-- Individual Registration -->
                                    <fieldset id="input-individual" style="display: none">
                                        <div class="row add-title" id='select_states'>
                                            <div class="form-group" >
						<select class="form-control"  id="stateSelect" name="state_personal" style="width: 92%;margin-left:15px;">
                                                    <option value="0">Select District</option>
                                                    <?php
foreach ($districts as $district) {
    echo '<option value="' . $district->district_id . '">' . $district->district . '</option>';
}
?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control no-arrow multiple_box selectpicker" name="thana_multi_personal[]" id="thana_multi_persoanl" multiple="multiple" tabindex="1" style="display: none">
                                            </select>
                                        </div>    
                                        <p><input type="text" id="phone_number_personal" name="phone_number_personal" class="number_input" placeholder="Contact Number" value="" /></p>                   
                                        <p><textarea class="form-control" id="address" rows="4" placeholder="Address" name="address_personal"></textarea></p>
                                        <input type="checkbox" id="agreeIndividual" name="agree" required checked/> <label for="agreeIndividual">I agree all the <a href="<?php echo Yii::app()->createUrl('/terms-&-conditions'); ?>" target="_blank" a>Terms & Conditions</a></label>
                                        <div align="left" class="register_status"></div>
                                        <input type="button" class="btn back-btn" value="Back" />
                                    </fieldset>

                                    <!-- Business Registration -->
                                    <fieldset id="input-business" style="display:none">
                                        <p><input type="text"  placeholder="ISP Name" name="enterprise_name_business" id="enterprise_name_business" /></p>
                                        <p><input type="text"  placeholder="License Number" name="license_number" id="license_number" /></p>
                                        <div class="form-group">
                                            <select class="form-control" name="business_category_id" id="business_category">
                                                <option value="0">Choose Your ISP Category</option>
                                                <option value="1">NationWide</option>
                                                <option value="2">Central Zone</option>
                                                <option value="3">South-East Zone</option>
                                                <option value="4">North-East Zone</option>
                                                <option value="5">South-West Zone</option>
                                                <option value="6">North-West Zone</option>
                                                <option value="7">Category-A</option>
                                                <option value="8">Category-B</option>
                                                <option value="9">Category-C</option>
                                            </select>
                                        </div>

<div id="nationwide_block" class="row" style="display:none;">
    <div class="row">
        <p style="text-align:center; color:red;font-weight:bold">Please select your service providing thana as list</p>
        <div class="col-sm-4 col-md-4">
            <label>Division List</label>
            <select class="form-control no-arrow multiple_box" name="nationwide_division" multiple id="nationwide_division" tabindex="1">
                <?php
                
                foreach ($divisions as $division) {
                    echo '<option value="' . $division->division_id . '">' . $division->division . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-sm-4 col-md-4 select_action_buttons">
            <a href="javascript:void()" id="division_select" class="green_link">Select >></a>
            <a href="javascript:void()" id="division_remove" class="red_link"><< Remove</a>
            <!-- <a href="javascript:void()" id="division_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="division_remove_all" class="red_link"><< Remove All</a>-->
        </div>
        <div class="col-sm-4 col-md-4">
            <label>Selected Division List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_nationwide_division" id="selected_nationwide_division" tabindex="2">
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <label>District List</label>
            <select class="form-control no-arrow multiple_box" name="nationwide_district" multiple id="nationwide_district" tabindex="1">
            </select>
        </div>
        <div class="col-sm-4 col-md-4 select_action_buttons">
            <a href="javascript:void()" id="district_select" class="green_link">Select >></a>
            <a href="javascript:void()" id="district_remove" class="red_link"> << Remove</a>
            <!-- <a href="javascript:void()" id="district_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="district_remove_all" class="red_link"> << Remove All</a>-->
        </div>
        <div class="col-sm-4 col-md-4">
            <label>Selected District List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_nationwide_district" id="selected_nationwide_district" tabindex="2">
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <label>Thana List</label>
            <select class="form-control no-arrow multiple_box" name="nationwide_thana" multiple id="nationwide_thana" tabindex="1">
            </select>
        </div>
        <div class="col-sm-4 col-md-4 select_action_buttons">
            <a href="javascript:void()" id="thana_select" class="green_link">Select >></a>
            <a href="javascript:void()" id="thana_remove" class="red_link"> << Remove</a>
            <!-- <a href="javascript:void()" id="thana_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="thana_remove_all" class="red_link"> << Remove All</a>-->
        </div>
        <div class="col-sm-4 col-md-4">
            <label>Selected Thana List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_nationwide_thana[]" id="selected_nationwide_thana" tabindex="2">
            </select>
        </div>
    </div>
    <input type="hidden" name="selected_hidden_thana" id="selected_hidden_thana">
</div>

<div id="zonal_block" class="row" style="display:none;">
    <div class="row">
        <p style="text-align:center; color:red;font-weight:bold">Please select your service providing thana as list</p>
        <div class="col-sm-4 col-md-4">
            <label>District List</label>
            <select class="form-control no-arrow multiple_box" name="zonal_district" multiple id="zonal_district" tabindex="1">
            </select>
        </div>
        <div class="col-sm-4 col-md-4 select_action_buttons">
            <a href="javascript:void()" id="zonal_district_select" class="green_link">Select >></a>
            <a href="javascript:void()" id="zonal_district_remove" class="red_link"><< Remove</a>
            <!-- <a href="javascript:void()" id="zonal_district_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="zonal_district_remove_all" class="red_link"><< Remove All</a>-->
        </div>
        <div class="col-sm-4 col-md-4">
            <label>Selected District List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_zonal_district" id="selected_zonal_district" tabindex="2">
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <label>Thana List</label>
            <select class="form-control no-arrow multiple_box" name="zonal_thana" multiple id="zonal_thana" tabindex="1">
            </select>
        </div>
        <div class="col-sm-4 col-md-4 select_action_buttons">
            <a href="javascript:void()" id="zonal_thana_select" class="green_link">Select >></a>
            <a href="javascript:void()" id="zonal_thana_remove" class="red_link"><< Remove</a>
            <!-- <a href="javascript:void()" id="zonal_thana_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="zonal_thana_remove_all" class="red_link"><< Remove All</a> -->
        </div>
        <div class="col-sm-4 col-md-4">
            <label>Selected Thana List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_zonal_thana[]" id="selected_zonal_thana" tabindex="2">
            </select>
        </div>
    </div>
    <input type="hidden" name="selected_hidden_thana_zonal" id="selected_hidden_thana_zonal">
</div>

                                        <div class="form-group">
                                            <select class="form-control" name="division" tabindex="1" id="division_single" style="display:none">
                                                <?php
                                                echo '<option value="0">Select Division</option>';
                                                foreach ($divisions as $division) {
                                                    echo '<option value="' . $division->division_id . '">' . $division->division . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label id="district_label" style="display:none">Select District</label>
                                            <select class="form-control" name="district" tabindex="1" id="district_single" style="display:none">
                                                <?php
                                                echo '<option value="0">Select District</option>';
                                                foreach ($districts as $district) {
                                                    echo '<option value="' . $district->district_id . '">' . $district->district . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label id="thana_label" style="display:none">Select Thana/Thanas</label>
                                            <select class="form-control no-arrow multiple_box multiple_select_checkbox" name="thana_multi[]" id="thana_multi" multiple="multiple" tabindex="1" style="display:none">
<?php
foreach ($thanas as $thana) {
    echo '<option value="' . $thana->thana_id . '">' . $thana->thana . '</option>';
}
?>
                                            </select>
                                        </div> -->
                                        <div class="row" id="category_thana_block" style="display:none">
                                            <div class="col-sm-4 col-md-4">
                                                <label>Thana List</label>
                                                <select class="form-control no-arrow multiple_box multiple_select_checkbox" name="thana_multi[]" id="thana_multi" multiple="multiple" tabindex="1">
                                                    <?php
                                                    foreach ($thanas as $thana) {
                                                        echo '<option value="' . $thana->thana_id . '">' . $thana->thana . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 col-md-4 select_action_buttons">
                                                <a href="javascript:void()" id="category_thana_select" class="green_link">Select >></a>
                                                <a href="javascript:void()" id="category_thana_remove" class="red_link"> << Remove</a>
                                                <!-- <a href="javascript:void()" id="thana_select_all" class="green_link">Select All>></a> 
                                                <a href="javascript:void()" id="thana_remove_all" class="red_link"> << Remove All</a>-->
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <label>Selected Thana List</label>
                                                <select class="form-control no-arrow multiple_box" multiple name="selected_category_thana[]" id="selected_category_thana" tabindex="2">
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="selected_hidden_thana_category" id="selected_hidden_thana_category">

                                        <p><input type="text" id="phone_number_business" name="phone_number_business" class="number_input" placeholder="contact number" value=""/></p>
                                        <p><textarea class="form-control" id="address" rows="4" placeholder="Address" name="address_business"></textarea></p>
                                        <input type="checkbox" id="agreeBusiness" name="agree2" checked required/> <label for="agreeBusiness">I agree all the <a href="#" target="_blank" a>Terms & Conditions</a></label>
                                        <div align="left" class="register_status"></div>
                                        <input type="button" class="btn back-btn" value="Back" />

                                    </fieldset>

                                    <!-- Promotion Registration -->
                                    <fieldset id="input-promotion" style="display: none;">

                                        <div class="form-group"  onload="resetSelectionPromotion()">
                                            <select class="form-control divisionSelectPromotion" id="countrySelectPromotion" name="country_promotion" size="1" disabled style="background: none">
                                                <option value="<?php echo $country_details->id ?>"><?php echo $country_details->name ?></option>
                                            </select>
                                        </div>

                                        <div class="row add-title" id='select_states2'>
                                        </div>

                                        <div id="district" class="citySelectPromotion" style="display: none;">
                                        </div>
                                        <p><input type="text"  placeholder="Enterprise Name" name="enterprise_name_promotion" id="enterprise_name_promotion" /></p>
                                        <div class="form-group">

                                        </div>
                                        <p><input type="text" id="designation_promotion" name="designation_promotion"  placeholder="Your Designation" /></p>
                                        <p><input type="text" id="phone_number_promotion" name="phone_number_promotion" class="number_input" value="+<?php echo $country_details->phonecode ?>" required/></p>
                                        <input type="hidden" id="phone_number_promotion_hidden" value="+<?php echo $country_details->phonecode ?>" />
                                        <p><textarea class="form-control" id="address" rows="4" placeholder="Address" name="address_promotion"></textarea></p>
                                        <input type="checkbox" id="agreePromotion" name="agree3" checked required/> <label for="agreePromotion">I agree all the Terms & Conditions</label>
                                        <div align="left" class="register_status"></div>
                                        <input type="button" class="btn back-btn" value="Back" />
                                    </fieldset>

                                    <button type="submit" id="register_button" class="btn form-control" style="display:none">
                                        Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Page -->
</div>





<style>
    .info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
    input[type='radio'] {
        clear: both;
        /*float: left;*/
        width: 20px;
        height: 10px;
        opacity: 0;
    }
    .radio {
        border: 1px solid #e0e0e0;
        /*border-radius: 50%;*/
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 16px;
        margin: 0 10px 10px -20px;
        padding: 9px;
        position: relative;
        width: 16px;
    }
    input[type='radio']:checked + .radio {
        background-color: #fe9c00;
        border-color: #fe9c00;
        background:url("/images/grid/check.jpg") no-repeat center;
    }
    input[type='radio']:active + .radio,
    input[type='radio']:focus + .radio {
        border-color: #fe9c00;
        background:url("/images/grid/check.jpg") no-repeat center;
    }
    input[type='radio']:checked + .radio::before {
        content: "";
        position: absolute;
        color: white;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .lbl{
        float: left;
        margin: 0 2px !important;
    }

    .form-my-account img{
        margin-top: -1px;
    }

    .fb_signin {
        background: url(/images/social_icons.png) no-repeat center 87%;
        display: block;
        height: 40px;
        overflow: hidden;
        text-indent: -9999px;
        width: 100%;
        margin-bottom: 10px;
    }

    .fb_signin:hover{
        opacity: 0.7;
    }

    .gmail_signin {
        background: url(/images/social_icons.png) no-repeat center 8%;
        display: block;
        height: 40px;
        overflow: hidden;
        text-indent: -9999px;
        width: 100%;
        margin-bottom: 10px;
    }

    .gmail_signin:hover{
        opacity: 0.7;
    }

</style>

<script type="text/javascript">

    $(document).ready(function () {
        //getCountry();
        getCountryforBusiness();
        getCountryforPromotion();
    });

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'hover'
    })

    $('#business_category').on('change', function () {
        isp_category_type = $('#business_category').val();
        if (isp_category_type == '1') {
            //$('#division_multi').css('display', 'block');
            $('#division_single').css('display', 'none');
            $('#district_multi').css('display','none');
            $('#district_single').css('display','none');
            $('#thana_multi').css('display','none');
            $('#category_thana_block').hide();
            //$('#divisions_label').css('display','block');
            $('#district_label').css('display','none');
            $('#thana_label').css('display','none');
            $('#nationwide_block').css('display','block');
            $('#zonal_block').css('display','none');
            $('#selected_hidden_thana').val('');
            $('#selected_category_thana').html('');
            $('#selected_hidden_thana_category').val('');
        } else if(isp_category_type == '0') {
            $('#division_multi').css('display', 'none');
            $('#division_single').css('display', 'none');
            $('#district_multi').css('display','none');
            $('#district_single').css('display','none');
            $('#thana_multi').css('display','none');
            $('#category_thana_block').hide();
            $('#divisions_label').css('display','none');
            $('#district_label').css('display','none');
            $('#thana_label').css('display','none');
            $('#nationwide_block').css('display','none');
            $('#zonal_block').css('display','none');
            $('#selected_hidden_thana').val('');
            $('#selected_hidden_thana_zonal').val('');
            $('#selected_category_thana').html('');
            $('#selected_hidden_thana_category').val('');
        } else if(isp_category_type == 2 || isp_category_type == 3 || isp_category_type == 4 || isp_category_type == 5 || isp_category_type == 6) {
            $('#division_single').css('display', 'none');
            $('#district_multi').css('display','none');
            $('#district_single').css('display','none');
            $('#thana_multi').css('display','none');
            $('#category_thana_block').hide();
            //$('#divisions_label').css('display','block');
            $('#district_label').css('display','none');
            $('#thana_label').css('display','none');
            $('#nationwide_block').css('display','none');
            $('#zonal_block').css('display','block');
            $('#selected_hidden_thana').val('');
            $('#selected_category_thana').html('');
            $('#selected_hidden_thana_category').val('');
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetZonalDistricts",
                data: {zone_id: isp_category_type},
                cache: false,
                success: function (result) {
                    $('#zonal_district').html(result);
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
        } else {
            $('#nationwide_block').css('display','none');
            $('#zonal_block').css('display','none');
            $('#selected_hidden_thana').val('');
            $('#selected_hidden_thana_zonal').val('');
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetDistrictAndThanas",
                data: {isp_category_id: isp_category_type},
                dataType: "json",
                cache: false,
                success: function (result) {
                    $('#district_single').html(result.districts);
                    $('#thana_multi').html(result.thanas);
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
            $('#division_multi').css('display', 'none');
            $('#division_single').css('display', 'none');
            $('#district_multi').css('display','none');
            $('#district_single').css('display','block');
            $('#thana_multi').css('display','block');
            $('#category_thana_block').show();
            $('#divisions_label').css('display','none');
            $('#district_label').css('display','block');
            $('#thana_label').css('display','block');
        }
    });

    $('#division_select').on('click',function(){
        selected_division_value = $('#nationwide_division').val();
        selected_items_number = $('#nationwide_division').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one division");
            return;
        }
        if(selected_division_value != null){
            selected_division = $("#nationwide_division option:selected").text();
            $('#selected_nationwide_division').append($('<option/>', { 
                value: selected_division_value,
                text : selected_division 
            }));
            $("#nationwide_division option[value="+selected_division_value+"]").remove();
            $.ajax({
                    type: 'POST',
                    async: false,
                    url: SITE_URL + "site/GetDistricts",
                    data: {division_id: selected_division_value},
                    cache: false,
                    success: function (result) {
                        $('#nationwide_district').html(result);
                    },
                    error: function () {
                        alert('Error! Please contact with Site Administrator')
                    }
            });
        }
    });

    $('#division_remove').on('click',function(){
        selected_division_value = $('#selected_nationwide_division').val();
        selected_items_number = $('#selected_nationwide_division').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one division to remove");
            return;
        }
        if(selected_division_value != null){
            selected_division = $("#selected_nationwide_division option:selected").text();
            $("#selected_nationwide_division option[value="+selected_division_value+"]").remove();
            $('#nationwide_division').append($('<option/>', { 
                value: selected_division_value,
                text : selected_division 
            }));
        }
    });

    $('#district_select').on('click',function(){
        selected_district_value = $('#nationwide_district').val();
        selected_district = $("#nationwide_district option:selected").text();
        selected_items_number = $('#nationwide_district').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one district");
            return;
        }
        $('#selected_nationwide_district').append($('<option/>', { 
            value: selected_district_value,
            text : selected_district 
        }));
        $("#nationwide_district option[value="+selected_district_value+"]").remove();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetThanasForNationWide",
                data: {district_id: selected_district_value},
                cache: false,
                success: function (result) {
                    $('#nationwide_thana').html(result);
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
        });
    });

    $('#district_remove').on('click',function(){
        selected_district_value = $('#selected_nationwide_district').val();
        selected_items_number = $('#selected_nationwide_district').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one district to remove");
            return;
        }
        if(selected_district_value != null){
            selected_district = $("#selected_nationwide_district option:selected").text();
            $("#selected_nationwide_district option[value="+selected_district_value+"]").remove();
            $('#nationwide_district').append($('<option/>', { 
                value: selected_district_value,
                text : selected_district 
            }));
        }
    });

    $('#thana_select').on('click',function(){
        selected_thana_value = $('#nationwide_thana').val();
        selected_thana = $("#nationwide_thana option:selected").text();
        selected_items_number = $('#nationwide_thana').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana");
            return;
        }
        $('#selected_nationwide_thana').append($('<option/>', { 
            value: selected_thana_value,
            text : selected_thana 
        }));
        $("#nationwide_thana option[value="+selected_thana_value+"]").remove();
        selected_thana_list = $('#selected_hidden_thana').val();
        $('#selected_hidden_thana').val(selected_thana_list + ',' + selected_thana_value);
    });

    $('#thana_remove').on('click',function(){
        selected_thana_value = $('#selected_nationwide_thana').val();
        selected_items_number = $('#selected_nationwide_thana').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana to remove");
            return;
        }
        if(selected_thana_value != null){
            selected_thana = $("#selected_nationwide_thana option:selected").text();
            $("#selected_nationwide_thana option[value="+selected_thana_value+"]").remove();
            $('#nationwide_thana').append($('<option/>', { 
                value: selected_thana_value,
                text : selected_thana 
            }));
            selected_thana_list = $('#selected_hidden_thana').val();
            modified_thana_list = selected_thana_list.replace(',' + selected_thana_value, "");
            $('#selected_hidden_thana').val(modified_thana_list);
        }
    });

    $('#zonal_district_select').on('click',function(){
        isp_category_type = $('#business_category').val();
        selected_district_value = $('#zonal_district').val();
        selected_district = $("#zonal_district option:selected").text();
        selected_items_number = $('#zonal_district').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one district");
            return;
        }
        $('#selected_zonal_district').append($('<option/>', { 
            value: selected_district_value,
            text : selected_district 
        }));
        $("#zonal_district option[value="+selected_district_value+"]").remove();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetThanasForNationWide",
                data: {district_id: selected_district_value,zone_id: isp_category_type},
                cache: false,
                success: function (result) {
                    $('#zonal_thana').html(result);
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
        });
    });

    $('#zonal_district_remove').on('click',function(){
        selected_district_value = $('#selected_zonal_district').val();
        selected_items_number = $('#selected_zonal_district').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one district to remove");
            return;
        }
        if(selected_district_value != null){
            selected_district = $("#selected_zonal_district option:selected").text();
            $("#selected_zonal_district option[value="+selected_district_value+"]").remove();
            $('#zonal_district').append($('<option/>', { 
                value: selected_district_value,
                text : selected_district 
            }));
        }
    });

    $('#zonal_thana_select').on('click',function(){
        selected_thana_value = $('#zonal_thana').val();
        selected_thana = $("#zonal_thana option:selected").text();
        selected_items_number = $('#zonal_thana').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana");
            return;
        }
        $('#selected_zonal_thana').append($('<option/>', { 
            value: selected_thana_value,
            text : selected_thana 
        }));
        $("#zonal_thana option[value="+selected_thana_value+"]").remove();
        selected_thana_list = $('#selected_hidden_thana_zonal').val();
        $('#selected_hidden_thana_zonal').val(selected_thana_list + ',' + selected_thana_value);
    });

    $('#zonal_thana_remove').on('click',function(){
        selected_thana_value = $('#selected_zonal_thana').val();
        selected_items_number = $('#selected_zonal_thana').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana to remove");
            return;
        }
        if(selected_thana_value != null){
            selected_thana = $("#selected_zonal_thana option:selected").text();
            $("#selected_zonal_thana option[value="+selected_thana_value+"]").remove();
            $('#zonal_thana').append($('<option/>', { 
                value: selected_thana_value,
                text : selected_thana 
            }));
            selected_thana_list = $('#selected_hidden_thana_zonal').val();
            modified_thana_list = selected_thana_list.replace(',' + selected_thana_value, "");
            $('#selected_hidden_thana_zonal').val(modified_thana_list);
        }
    });

    $('#category_thana_select').on('click',function(){
        selected_thana_value = $('#thana_multi').val();
        selected_thana = $("#thana_multi option:selected").text();
        selected_items_number = $('#thana_multi').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana");
            return;
        }
        selected_thana_list_number = $('#selected_category_thana option').length;
        if(selected_thana_list_number > 2 ) {
            alert("You will not be able to choose more than 3 thana");
            return;
        }
        $('#selected_category_thana').append($('<option/>', { 
            value: selected_thana_value,
            text : selected_thana 
        }));
        $("#thana_multi option[value="+selected_thana_value+"]").remove();
        selected_thana_list = $('#selected_hidden_thana_category').val();
        $('#selected_hidden_thana_category').val(selected_thana_list + ',' + selected_thana_value);
    });

    $('#category_thana_remove').on('click',function(){
        selected_thana_value = $('#selected_category_thana').val();
        selected_items_number = $('#selected_category_thana').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana to remove");
            return;
        }
        if(selected_thana_value != null){
            selected_thana = $("#selected_category_thana option:selected").text();
            $("#selected_category_thana option[value="+selected_thana_value+"]").remove();
            $('#thana_multi').append($('<option/>', { 
                value: selected_thana_value,
                text : selected_thana 
            }));
            selected_thana_list = $('#selected_hidden_thana_category').val();
            modified_thana_list = selected_thana_list.replace(',' + selected_thana_value, "");
            $('#selected_hidden_thana_category').val(modified_thana_list);
        }
    });


    $('#division_single').on('change', function () {
        isp_category_type = $('#business_category').val();
        division_id = $('#division_single').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetDistricts",
                data: {division_id: division_id},
                cache: false,
                success: function (result) {
                    if(isp_category_type == '2') {
                        $('#district_multi').html(result);
                        $('#district_multi').css('display','block');
                        $('#district_single').css('display','none');
                    } else {
                        $('#district_single').html(result);
                        $('#district_single').css('display','block');
                        $('#district_multi').css('display','none');
                    }
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
    });
    
    $('#district_single').on('change',function(){
        district_id = $('#district_single').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetThanas",
                data: {district_id: district_id},
                cache: false,
                success: function (result) {
                    $('#thana_multi').html(result);
                    $('#selected_category_thana').html('');
                    $('#selected_hidden_thana_category').val('');
                    $('#thana_multi').css('display','block');
                    $('#category_thana_block').show();
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
    });
    
    $('#stateSelect').on('change',function(){
        district_id = $('#stateSelect').val();
        if(district_id == '0'){
            $('#thana_multi_persoanl').css('display','none');
        } else {
            getThanafromDistrict();
            $('#thana_multi_persoanl').css('display','block');
        }
    });

    $('#next-btn').on('click', function () {
        if ($('#user_name').val() == '') {
            $('#register_status_personal').html('<div class="info">Please enter your full name to proceed !</div>');
            return false;
        }

        if ($('#register_user_email').val() == '') {
            $('#register_status_personal').html('<div class="info">Please enter your email to proceed !</div>');
            return false;
        }

        if (reg.test($('#register_user_email').val()) == false) {
            $('#register_status_personal').html('<div class="info">Please enter a valid Email address to proceed !</div>');
            return false;
        }

        if ($('#register__password').val() == '') {
            $('#register_status_personal').html('<div class="info">Please enter password to proceed !</div>');
            return false;
        }

        if ($('#register_confirm_password').val() == '') {
            $('#register_status_personal').html('<div class="info">Please re-enter password to proceed !</div>');
            return false;
        }

        if ($('#register_confirm_password').val() != $('#register__password').val()) {
            $('#register_status_personal').html('<div class="info">Password should match to proceed !</div>');
            return false;
        }

        if ($('#email_verifier').val() == 'unverified') {
            $('#register_status_personal').html('<div class="info">Please enter a valid email !</div>');
            return false;
        }

        if ($('#register_user_email').val() != '') {
            var email = $('#register_user_email').val();
            var error_msg = false;
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/CheckDuplicateEmail",
                data: {email: email},
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.status === 'duplicate') {
                        error_msg = true;
                    }
                },
                error: function () {
                    alert('Error!')
                }
            });

            if (error_msg) {
                $('#register_status_personal').html('<div class="info">An User Already Registered With ' + email + '. Try with another email address.</div>');
                return false;
            }
        }


        if ($('input[name="rgroup"]:checked').length > 0) {
            var selected_value = $('input[name="rgroup"]:checked').val();
            checkbox_selected_id = '#input-' + selected_value;
            $(checkbox_selected_id).show('slow');
            $('#input-common').hide();
            $('#register_button').show();
            $('.register_status').html('');
        } else {
            alert('please select a business type');
        }
    });

    $('.back-btn').on('click', function () {
        $('#register_status_personal').html('');
        var selected_element = $(this).parent();
        var selected_element_id = '#' + $(selected_element).attr('id');
        $(selected_element_id).hide('slow');
        $('#input-common').show('slow');
        $('#register_button').hide();
    });

    $('#register_button').on('click', function () {
        $('#').submit();
    });

    $(function () {
        $('.divisionSelectBusiness').change(function () {
            $('.districtClassBusiness').show();

        });
    });

    $(function () {
        $('.countrySelectPersonal').change(function () {
            $('.citySelectPersonal').show();

        });
    });

    $(function () {
        $('.divisionSelectPromotion').change(function () {
            $('.citySelectPromotion').show();

        });
    });

    var citiesByState = {
        Dhaka: ["Dhaka", "Faridpur", "Gazipur", "Gopalganj", "Jamalpur", "Kishoreganj", "Madaripur",
            "Manikganj", "Munshiganj", "Mymensingh", "Narayanganj", "Narsingdi", "Netrakona", "Rajbari",
            "Shariatpur", "Sherpur", "Tangail"],
        Khulna: ["Bagerhat", "Chuadanga", "Jessore", "Jhenaidah", "Khulna", "Kushtia", "Magura", "Meherpur",
            "Narail", "Satkhira"],
        Rajshahi: ["Bogra", "Joypurhat", "Naogaon", "Natore", "Nawabganj", "Pabna", "Rajshahi",
            "Sirajganj"],
        Chittagong: ["Bandarban", "Brahmanbaria", "Chandpur", "Chittagong", "Comilla", "Cox's Bazar", "Feni"
                    , "Khagrachhari", "Lakshmipur", "Noakhali", "Rangamati"],
        Barisal: ["Barguna", "Barisal", "Bhola", "Jhalokati", "Patuakhali", "Pirojpur"],
        Sylhet: ["Habiganj", "Moulvibazar", "Sunamganj", "Sylhet"],
        Rangpur: ["Dinajpur", "Gaibandha", "Kurigram", "Lalmonirhat", "Nilphamari", "Panchagarh", "Rangpur",
            "Thakurgaon"]
    }
    function makeSubmenu(value) {

        if (value.length == 0) {
            document.getElementById("city").innerHTML = "<option></option>";
        } else {
            var citiesOptions = "";
            for (cityId in citiesByState[value]) {
                citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>";
                var div = document.getElementById("district");
                div.style.visibility = 'block';

            }


            document.getElementById("city").innerHTML = citiesOptions;
        }

    }
    
    function getThanafromDistrict(){

        district_id = $('#stateSelect').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetThanas",
                data: {district_id: district_id},
                cache: false,
                success: function (result) {
                    $('#thana_multi_persoanl').html(result);
                },
                error: function () {
                    alert('Error! Please contact with Site Administrator')
                }
            });
    }
    
    function makeSubmenuBusiness(value) {
        if (value.length == 0)
            document.getElementById("citySelectBusiness").innerHTML = "<option></option>";
        else {
            var citiesOptions = "";
            for (cityId in citiesByState[value]) {
                citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>";
                var div = document.getElementById("district");
                div.style.visibility = 'block';
            }

            document.getElementById("citySelectBusiness").innerHTML = citiesOptions;
        }

    }
    function makeSubmenuPromotion(value) {
        if (value.length == 0)
            document.getElementById("citySelectPromotion").innerHTML = "<option></option>";
        else {
            var citiesOptions = "";
            for (cityId in citiesByState[value]) {
                citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>";
                var div = document.getElementById("district");
                div.style.visibility = 'block';
            }

            document.getElementById("citySelectPromotion").innerHTML = citiesOptions;
        }

    }
    function displaySelected() {
        var country = document.getElementById("countrySelect").value;
        var city = document.getElementById("citySelect").value;
        alert(country + "\n" + city);
    }
    function displaySelectedBusiness() {
        var country = document.getElementById("countrySelectBusiness").value;
        var city = document.getElementById("citySelectBusiness").value;
        alert(country + "\n" + city);
    }
    function displaySelectedPromotion() {
        var country = document.getElementById("countrySelectPromotion").value;
        var city = document.getElementById("citySelectPromotion").value;
        alert(country + "\n" + city);
    }
    function resetSelection() {
        document.getElementById("countrySelect").selectedIndex = 1;
        document.getElementById("citySelect").selectedIndex = 1;
    }
    function resetSelectionBusiness() {
        document.getElementById("countrySelectBusiness").selectedIndex = 0;
        document.getElementById("citySelectBusiness").selectedIndex = 0;
    }
    function resetSelectionPromotion() {
        document.getElementById("countrySelectPromotion").selectedIndex = 0;
        document.getElementById("citySelectPromotion").selectedIndex = 0;
    }


    function getCountry() {
        var value = $('#countrySelect').val();
        var rgroup = 'individual';
        $.ajax({
            type: 'POST',
            url: SITE_URL + "site/getStatesFromSelect",
            data: {country_id: value, rgroup: rgroup},
            cache: false,
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    $("#select_states").html(response.html);
                }
            }


        });
    }

    function getCountryforBusiness() {
        var value = $('#countrySelectBusiness').val();
        var rgroup = 'business';

        $.ajax({
            type: 'POST',
            url: SITE_URL + "site/getStatesFromSelect",
            data: {country_id: value, rgroup: rgroup},
            cache: false,
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    $("#select_states1").html(response.html);
                }
            }


        });
    }

    function getCountryforPromotion() {
        var value = $('#countrySelectPromotion').val();
        var rgroup = 'promotion';

        $.ajax({
            type: 'POST',
            url: SITE_URL + "site/getStatesFromSelect",
            data: {country_id: value, rgroup: rgroup},
            cache: false,
            dataType: "json",
            success: function (response) {
                if (response.status == "success") {
                    $("#select_states2").html(response.html);
                }
            }


        });
    }


    $('#register_user_email').donetyping(function () {
        var myLength = $("#register_user_email").val().length;
        var email = $('#register_user_email').val();
        //alert(email);
        //$('#registration_email_block').addClass('valid');
        //$('#registration_email_block span').show('slow');
//        $.ajax({
//            type: 'POST',
//            async: false,
//            url: SITE_URL + "site/CheckEmailValidity",
//            data: {email: email},
//            cache: false,
//            dataType: "json",
//            success: function (response) {
//                if (response.status == 'success') {
//                    $('#registration_email_block span').html(response.msg);
//                    $('#registration_email_block span').removeClass();
//                    $('#registration_email_block span').addClass('valid');
//                    $('#registration_email_block span').show('slow');
//                    $('#email_verifier').val('verified');
//                } else {
//                    $('#registration_email_block span').html(response.msg);
//                    $('#registration_email_block span').removeClass();
//                    $('#registration_email_block span').addClass('invalid');
//                    $('#registration_email_block span').show('slow');
//                    $('#email_verifier').val('unverified');
//                }
//            }
//        });
    });

</script>