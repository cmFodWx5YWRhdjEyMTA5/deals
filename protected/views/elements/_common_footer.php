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
                    <a href="/"><img src="<?=$baseUrl?>/images/logo.jpg" alt="Company Logo" width="240" height="52" /></a>
                </div>
                <div class="menu-footer">
                    <ul>

                        <li><a href="#">Online Shop</a></li>
                        <li><a href="#">Broadband Packages</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl($requested_country->sortname.'/contact-us');?>">Contact</a></li>
                        <li><a href="http://www.btrc.gov.bd/" target="_blank">BTRC Links</a></li>
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
                                <li><a href="<?php echo Yii::app()->createUrl('/terms-&-conditions');?>" target="_blank">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h2>Contact Us</h2>
                            <ul class="footer-box-contact">
                                <li><i class="fa fa-home"></i> 944 Upper Jashore Road (1st Floor),Joragate Moor,Khulna-9000,Bangladesh.</li>
                                <li><i class="fa fa-mobile"></i> 09639114455</li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:support@bdbroadbanddeals.com">support@bdbroadbanddeals.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Footer Box -->
<!--            <div class="social-footer-box">
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
                </div>
            </div>-->

            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p> All Rights Reserved &copy; <a href="http://bdbroadbanddeals.com">bdbroadbanddeals</a></p>
                        </div>
                    </div>
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="payment-method">
                            <a href="#"><img src="<?=$baseUrl?>/images/home1/p2.png" alt="" width="46" height="28" /></a>
                            <a href="#"><img src="<?=$baseUrl?>/images/home1/p3.png" alt="" width="46" height="27"/></a>
                            <a href="#"><img src="<?=$baseUrl?>/images/home1/p4.png" alt="" width="49" height="29"/></a>
                        </div>
                    </div>-->
                </div>
            </div>
            <!-- End Footer Bottom -->
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
    $(window).scroll(function(){
      var sticky = $('.header'),
          scroll = $(window).scrollTop();

      if (scroll >= 100) sticky.addClass('sticky');
      else sticky.removeClass('sticky');
    });

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


