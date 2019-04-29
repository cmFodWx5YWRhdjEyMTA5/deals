<?php


$baseUrl = Yii::app()->getBaseUrl(true);
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$countries = Generic::getCountries();
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$requested_country = '';
if($uri_segments[1] != '' && strlen($uri_segments[1]) == 2 && $uri_segments[1] != 'ad'){
    $requested_country_code = strtoupper($uri_segments[1]);
    $requested_country = Generic::checkValidCountryRequest($requested_country_code);

    if(!$requested_country){
        return ;
    }
}

$country_details =  Generic::checkForStoredCountry();

if($requested_country){
    $cities = States::model()->findAllByAttributes(array('country_id' => $requested_country->id));
} else {
    $cities = States::model()->findAllByAttributes(array('country_id' => $country_details->id));
}


?>
<!-- footer -->
<div id="footer">
    <div class="footer footer-home">
        <div class="container">
            <div class="footer-top">
                <div class="logo-footer">
                    <a href="#"><img src="<?=$baseUrl?>/images/logo.png" alt="" width="240" height="52"/></a>
                </div>
                <div class="menu-footer">
                    <ul>

                        <li><a href="#">Buy</a></li>
                        <li><a href="#">Sell</a></li>
                        <li><a href="#">All Promotions</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/help');?>">Help</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/contact-us');?>">Contact</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/career');?>">Career</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/global-links');?>">Global Links</a></li>
                    </ul>
                </div>
            </div>
            <div class="list-footer-box">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h2>My Account</h2>
                            <ul class="footer-menu-box">
                                <?php if (!$session){ ?>

                                    <li class="top-mobile"><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/sign-in'); ?>"> Sign in</a></li>
                                    <li class="top-mobile"><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/sign-in'); ?>"> Register</a></li>
                                <?php } ?>
                                <?php if ($session){ ?>
                                    <li class="top-account has-child">
                                        <a href="javascript:void(0);">My Account</a>
                                        <ul class="sub-menu-top">
                                            <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/my-profile/dashboard');?>"> My Profile</a></li>
                                            <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/my-profile/my-ads');?>"> My ads</a></li>
                                            <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/logout');?>"> Logout</a></li>

                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h2>Our Services</h2>
                            <ul class="footer-menu-box">
<!--                                <li><a href="--><?php //echo Yii::app()->createUrl('/all-ads');?><!--">All Ads</a></li>-->
                                <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/recently-viewed-ad');?>">Recently Viewed</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/help');?>">Help/Support</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/advertise-with-us');?>">Advertise With Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h2>Further information</h2>
                            <ul class="footer-menu-box">
                                <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/contact-us');?>">Contact Us</a></li>
                                <li><a href="#" title="Payment">Payment</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/help');?>">FAQs</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/terms-&-conditions');?>">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h2>Contact Us</h2>
                            <ul class="footer-box-contact">
                                <li><i class="fa fa-home"></i> Our business address is Tribune Tower (8th Floor) <br> 2B,KDA Avenue, Khulna, Bangladesh</li>
                                <li><i class="fa fa-mobile"></i> + 041731839 / +88 01996 304 100</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:support@bdads24.com">support@bdads24.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Footer Box -->
            <div class="social-footer-box">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="newsletter-footer">
                            <label>newsletter</label>
                            <form>
                                <input type="text"  value="Enter Your Email..." onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" />
                                <input type="submit" value="" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="social-footer social-network">
                            <label>Follow Us</label>
                            <ul>
                                <li><a target="_blank" href="https://www.facebook.com/Bdads24/"><div class="social-media-footer facebook-icon"></div></a></li>
                                <li><a target="_blank" href="https://twitter.com/bdads24"><div class="social-media-footer twitter-icon"></div></a></li>
                                <li><a target="_blank" href="https://plus.google.com/u/0/b/107011057023519830925/107011057023519830925"><div class="social-media-footer google-plus-icon"></div></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright">
                            <p>bdads24.com &copy; 2017 All Rights Reserved. Powered by <a href="http://www.dewyitbd.com" target="_blank">DEWY IT LTD.</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="payment-method">
                           <!-- <a href="#"><img src="images/home1/p1.png" alt="" /></a>-->
                            <a href="#"><img src="<?=$baseUrl?>/images/home1/p2.png" alt="" width="46" height="28" /></a>
                            <a href="#"><img src="<?=$baseUrl?>/images/home1/p3.png" alt="" width="46" height="27"/></a>
                            <a href="#"><img src="<?=$baseUrl?>/images/home1/p4.png" alt="" width="49" height="29"/></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
        </div>
    </div>
</div>
<div class="" id="dialog" title="Select Your Locations">

    <div class="col-md-8">
        <?php if($requested_country) { ?>
            <img src="<?=$baseUrl?>/images/map_<?php echo strtolower($requested_country->sortname) ?>.jpg" alt="" height="500" width="550" />
        <?php } else { ?>
            <img src="<?=$baseUrl?>/images/map_<?php echo strtolower($country_details->sortname) ?>.jpg" alt="" height="500" width="550" />
        <?php } ?>
    </div>
    <div class="col-md-4">
        <div class="dvsn">
            <div id="country" class="form-group countrySelectPersonal">
                <select class="form-control countrySelect" id="country_Select" name="country_select" size="1">
                    <?php if($requested_country) { ?>
                        <option value="<?php echo $requested_country->id ?>"><?php echo $requested_country->name ?></option>
                    <?php }else { ?>
                        <option value="<?php echo $country_details->id ?>"><?php echo $country_details->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div><br><br>
        <div class="clear"></div><br>

        <div class="row form-group add-title" id='select_states_location' style="width: 100%;margin-left: 0;">
            <div id="district" class="form-group citySelectPersonal">
                <select onchange="placeValue(this.value)" class="form-control" id="citySelect" name="district" size="1" multiple style="height: 110px;">
                    <?php foreach($cities as $city) { ?>
                        <option value="<?= $city->name ?>" <?php if($city->name == Yii::app()->session['user_location']) echo "selected" ?>><?= $city->name ?></option>
                    <?php } ?>
                </select>
        </div>

    </div>

</div>
<!-- End Footer -->
</div>
<!-- Floating contact -->
<div id="slider-feedback" style="/*right: -306px;*/ left: -463px; z-index: 9999">
    <div id="sidebar" onclick="open_panel()">
        <img src="<?=$baseUrl?>/images/floating-msg/feedback.jpg" width="31" height="116">
    </div>
    <div id="msg-body" class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-9 col-xs-9">
                    <h5><span class="glyphicon glyphicon-envelope"></span> Write your feedback !</h5>
                </div>
                <div class="col-sm-3 col-xs-3">
                    <h4 style="cursor: pointer;text-align: center;" onclick="close_panel()">&times;</h4>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div id="notification"></div>
                </div>
            </div>
            <form action="javascript:void(0);" method="post" class="form" role="form" name="feedback_form" id="feedback_form">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="feedback_name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="feedback_email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <?php if($requested_country){?>
                        <input type="text" id="feedback_phone" name="phone" class="form-control" value="+<?=$requested_country->phonecode?>" required>
                    <?php }
                    else{ ?>
                        <input type="text" id="feedback_phone" name="phone" class="form-control" value="+<?=$country_details->phonecode?>" required>
                    <?php } ?>
                </div>
                <!--
                <div class="input-group">
                    <span class="input-group-addon">+<?=$country_details->phonecode?></span>
                    <input id="feedbaack_phone" type="text" class="form-control" name="phone" placeholder="Your Phone" required>
                </div>
                -->
                <div class="form-group">
                    <textarea name="msg" class="form-control" rows="5" id="feedback_msg" placeholder="Your Message" required></textarea>
                </div>

                <div id="feedback_submission"></div>

                <button type="submit" value="submit" class="btn btn-info" id="feedback_button">Send</button>
                <button type="reset" value="reset" class="btn btn-warning">Reset</button>
                <button type="button"  onclick="close_panel()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#feedback_button").click(function(){
            var name1 = $("#feedback_name").val();
            var email1 = $("#feedback_email").val();
            var phone1 = $("#feedback_phone").val();
            var msg1 = $("#feedback_msg").val();
            var dataString = 'name='+ name1 + '&email='+ email1 + '&phone='+ phone1 + '&msg='+ msg1;
            if(name1==''||email1==''||phone1==''||msg1==''){
                $("#notification").html('<div class="alert alert-danger alert-dismissable fade in" id="error" style="padding: 2%;margin-top: -5px;"> <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-right: 20px;">&times;</a>Please Fill The Necessary Fields!</div>');
                setTimeout(function(){$('#error').fadeOut('slow');}, 2500);
            }
            else{
                $("#feedback_submission").html('<div class="alert alert-info fade in" id="submission" style="padding: 2%;margin-top: -5px;"><img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting..... !</div>');
                $.ajax({
                    type: "POST",
                    url: SITE_URL+"site/ReceiveFeedback",
                    data: dataString,
                    cache: false,
                    dataType:"json",
                    success: function(response){
                        if(response.status=="success"){
                            $("#notification").html('<div class="alert alert-success alert-dismissable fade in" id="success" style="padding: 2%;margin-top: -5px;"> <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-right: 20px;">&times;</a>'+response.message+'! </div>');
                            $("#feedback_form")[0].reset();
                            $('#submission').hide('slow');
                            setTimeout(function(){$('#success').fadeOut('slow');}, 4000);
                            setTimeout(function(){close_panel();}, 3000);
                        }
                        else if(response.status=="empty"){
                            $("#notification").html('<div class="alert alert-danger alert-dismissable fade in" id="empty" style="padding: 2%;margin-top: -5px;"> <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-right: 20px;">&times;</a>'+response.message+'</div>');
                            setTimeout(function(){$('#empty').fadeOut('slow');}, 2500);
                        }
                        else{
                            $("#notification").html('<div class="alert alert-warning alert-dismissable fade in" id="wrong" style="padding: 2%;margin-top: -5px;"> <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-right: 20px;">&times;</a>'+response.message+'</div>');
                            $("#feedback_form")[0].reset();
                            $('#submission').hide('slow');
                            setTimeout(function(){$('#wrong').fadeOut('slow');}, 2500);
                        }
                    }
                });
            }
            return false;
        });
    });
</script>
<script>
    $('a.countrySelectPersonal').on('click', function () {
        $('.citySelectPersonal').show();
    })


    var citiesByState = {
        Dhaka: ["Dhaka","Faridpur","Gazipur","Gopalganj","Jamalpur","Kishoreganj","Madaripur",
            "Manikganj","Munshiganj","Mymensingh","Narayanganj","Narsingdi","Netrakona","Rajbari",
            "Shariatpur","Sherpur","Tangail"],
        Khulna: ["Bagerhat","Chuadanga","Jessore","Jhenaidah","Khulna","Kushtia","Magura","Meherpur",
            "Narail","Satkhira"],
        Rajshahi: ["Bogra","Joypurhat","Naogaon","Natore","Nawabganj","Pabna","Rajshahi",
            "Sirajganj"],
        Chittagong: ["Bandarban","Brahmanbaria","Chandpur","Chittagong","Comilla","Cox's Bazar","Feni"
            ,"Khagrachhari","Lakshmipur","Noakhali","Rangamati"],
        Barisal: ["Barguna","Barisal","Bhola","Jhalokati","Patuakhali","Pirojpur"],
        Sylhet: ["Habiganj","Moulvibazar","Sunamganj","Sylhet"],
        Rangpur: ["Dinajpur","Gaibandha","Kurigram","Lalmonirhat","Nilphamari","Panchagarh","Rangpur",
            "Thakurgaon"]
    }
    function makeSubmenu(value) {
        if(value.length==0) document.getElementById("citySelect").innerHTML = "<option></option>";
        else {
            var citiesOptions = "";
            for(cityId in citiesByState[value]) {
                citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
                var district = document.getElementById("district");
                district.style.visibility='block';
            }

            document.getElementById("citySelect").innerHTML = citiesOptions;

        }
        elem_height  = $('.tab_content').outerHeight();
        $('.tab_content_wrapper').outerHeight(elem_height + 80);
    }

    function displaySelected() {
        var country = document.getElementById("countrySelect").value;
        var city = document.getElementById("citySelect").value;

    }

    function resetSelection() {
        alert('sdfs');
        getCountryforlocation();
        document.getElementById("citySelect").selectedIndex = 1;
    }

    $( "#dialog" ).hide();
    /*$( "#target" ).click(function() {
     $( "#dialog" ).show();
     $( "#dialog" ).dialog();
     });*/
    $('#country').on('load',function(){
        alert('fds');
        getCountryforlocation();
    });


    function placeValue(location){

        $.ajax({
            dataType: "json"
            , type: "POST"
            , url: SITE_URL + "site/PlaceLocationValue"
            , data: {location: location}
            , success: function (data) {
                if (data.status == 'success') {
                    $('#target').html('<span class="info">Your Location is <b>' + location + '</b></span>');
                    $.fancybox.close()
                }


            },
            error: function (e) {
                if (window.console && window.console.log) {
                    console.log('ajax error');
                }
            }
        });
    }

    function getCountryforlocation(){
        var value = $('#country_Select').val();
        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/getStatesFromYourLocationSelect",
            data : {country_id:value},
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $("#select_states_location").html(response.html);
                }
            }


        });
    }
</script>

