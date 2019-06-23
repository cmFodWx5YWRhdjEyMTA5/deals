function baseUrl(){var href=window.location.href.split('/');return href[0]+'//'+href[2]+'/';}
var SITE_URL=baseUrl();$('document').ready(function()
{
    $('#register-form-personal').on('submit',function(e){
        //$("#register_button").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Processing...');
        $(this).prop("disabled",true);
        personalRegisterFormSubmit();
    });
    $('#register-form-business').on('submit',function(e){businessRegisterFormSubmit();});
    function personalRegisterFormSubmit(){
        var data=$('#register-form-personal').serialize();
        console.log(data);
        var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var username=$("#user_name").val();
        var email=$("#register_user_email").val();
        var phone_number = '';
        var division = '';
        var divisions = '';
        var address = '';
        var enterprise_name = '';
        var register_type  = $('input[name="rgroup"]:checked').val();
        var license_number = '';
        if(register_type == 'individual'){
            phone_number=$("#phone_number_personal").val();
            address=$('input[name="address_personal"]').val();
            enterprise_name = 'not_needed';
        } else if(register_type == 'business'){
            phone_number=$("#phone_number_business").val();
            address=$('input[name="address_business"]').val();
            license_number=$('input[name="license_number"]').val();
            enterprise_name = $('input[name="enterprise_name_business"]').val();
            enterprise_category = $('select[name="business_category_id"]').val();
        } else if(register_type == 'store'){
            phone_number=$("#phone_number_estore").val();
            address=$('input[name="address_estore"]').val();
        }

        var password=$("#register_user_password").val();
        var user_token=$("#user_token").val();
        var return_url=$("#return_url").val();
        if(username=="")
        {$(".register_status").html('<div class="info">Please enter your  Username to proceed !</div>');}
        else if(register_type == 'business' && license_number ==""){
            $(".register_status").html('<div class="info">Please enter your License Number to proceed !</div>');
        } else if(register_type == 'business' && enterprise_category == '0'){
            $(".register_status").html('<div class="info">Please select your ISP category to proceed !</div>');
        }
        else if(email=="")
        {$(".register_status").html('<div class="info">Please enter your Email address to proceed !</div>');}
        else if(reg.test(email)==false)
        {$(".register_status").html('<div class="info">Please enter a valid Email address to proceed !</div>');}
        else if(phone_number=="")
        {$(".register_status").html('<div class="info">Please enter your Phone Number to go !</div>');}
        else if(address=="")
        {$(".register_status").html('<div class="info">Please enter your Address to go !</div>');}
        else if(password=="")
        {$(".register_status").html('<div class="info">Please enter your Password to go !</div>');}
        else{
            $.ajax({
                type:'POST',
                async:false,
                url:SITE_URL+"site/RegisterNewUser",
                data:data,cache:false,
                dataType:"json",
            beforeSend:function(){
                $("#register_button").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Processing...');
            },
            success:function(data){
                setTimeout(function(){
                        if(data.status==='success'){
                    $('#register-form-personal').each(function(){
                        this.reset();});
                    //var user_token=collectUserData(email);
                    $("#register_status").hide().fadeIn('slow').html(data.message);
                    window.location=SITE_URL+'my-profile/dashboard';
                    //window.location=SITE_URL+'my-profile/dashboard';
                    window.setTimeout(redirect,4000);
                    }
                    else if(data.status==='duplicate'){
                        $(".register_status").show().html(data.message);
                        $("#register_button").html(data.button_text);
                    }else if(data.status==='precondition_fail'){
                            $(".register_status").show().html(data.message);
                            $("#register_button").html(data.button_text);
                    }
                    },5000);
            },
            error:function(){
                alert('Error!')
            }
            });
            return false;
        }
    }
    function businessRegisterFormSubmit(){
        alert("business called");
        var data=$('#register-form-business').serialize();
        var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var username=$("#business_user_name").val();
        var email=$("#business_email").val();
        var enterprise_name=$("#enterprise_name").val();
        var business_category=$("#business_category").val();
        var phone_number=$("#business_phone_number").val();
        var division=$("#countrySelectBusiness").val();
        var divisions = division.trim();
        var address=$("#business_address").val();
        var password=$("#register_business_password").val();
        var return_url=$("#return_url").val();
        var user_token=$("#user_token").val();if(username=="")
        {$("#register_status_business").html('<div class="info-business">Please enter your  Full Name</div>');$("#business_user_name").focus();}
        else if(email=="")
        {$("#register_status_business").html('<div class="info-business">Please enter your Email address</div>');$("#business_email").focus();}
        else if(reg.test(email)==false)
        {$("#register_status_business").html('<div class="info-business">Please enter a valid Email address</div>');$("#enterprise_name").focus();}
        else if(enterprise_name=="")
        {$("#register_status_business").html('<div class="info-business">Please enter your Enterprise Name</div>');$("#enterprise_name").focus();}
        else if(business_category=="Choose Your Business Category")
        {$("#register_status_business").html('<div class="info-business">Please Select your Business Category</div>');$("#business_category").focus();}
        else if(phone_number=="")
        {$("#register_status_business").html('<div class="info-business">Please enter your Phone Number</div>');$("#business_phone_number").focus();}
        else if(divisions == "Select Your Division")
        {$("#register_status_business").html('<div class="info">Please Select your Division</div>');}
        else if(address=="")
        {$("#register_status_business").html('<div class="info-business">Please enter your Address</div>');$("#business_address").focus();}
        else if(password=="")
        {$("#register_status_business").html('<div class="info-business">Please enter your Password to go !</div>');$("#register_business_password").focus();}
        else{$.ajax({type:'POST',async:false,url:SITE_URL+"site/RegisterNewUser",data:data,cache:false,dataType:"json",beforeSend:function()
        {$("#register_form_business").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Registration Ongoing...');},success:function(data)
        {setTimeout(function(){if(data.status==='success'){
            $('#register-form-business').each(function(){this.reset();});var user_token=collectUserData(email);$("#register_status_business").hide().fadeIn('slow').html(data.message);function redirect(){window.location=SITE_URL+'userProfile?uid='+user_token;}
            window.setTimeout(redirect,4000);}
        else if(data.status==='duplicate'){
            $("#register_status_business").show().html(data.message).delay(5000).fadeOut();
            $("#register_form_business").html(data.button_text);
        }},5000);

        },error:function(){console.log('Error in Ajax Submission');}});return false;}}


    function loginFormPersonal() {
        var data;
        var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var user_email_phone=$("#user_email_phone").val();
        var password=$("#password_personal").val();
        var value=reg.test(user_email_phone);
        var input_value='';
        var return_url=$("#return_url").val();
        if(value){input_value='email';
            data={email:user_email_phone,password:password};
        }else
        {
            input_value='phone_number';
            data={phone_number:user_email_phone,password:password};
        }
        if(user_email_phone=="")
        {
            $("#signup_status_personal").html('<div class="info">Please enter your  Email to proceed !</div>');
            $("#user_email_personal").focus();
        }
        else if(password=="")
        {
            $("#signup_status_personal").html('<div class="info">Please enter your Password to go !</div>');
            $("#password").focus();
        }
        else{
            $.ajax({type:'POST',url:SITE_URL+"site/UserLogin",
                data:data,cache:false,dataType:"json",beforeSend:function(){
                    $("#error_personal").fadeOut();
                    $(':input[type="submit"]').prop('disabled', true);
                },
                success:function(response){
                    if(response.status=="ok"){
                        $("#signup_status_personal").html('<div class="info"><img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Signing In..... !</div>');
                        function redirect(){
                            if(return_url){
                                window.location=return_url;
                            }else{
                                window.location=SITE_URL + 'my-profile/dashboard';
                            }
                        }

                        window.setTimeout(redirect,4000);

                    }
                    else{$("#error_personal").fadeIn(1000,function(){
                        $(':input[type="submit"]').removeProp("disabled");
                        $("#error_personal").html('<div class="alert alert-danger"> <span class="alert-danger"> &nbsp; '+response.status+' </span>!</div>');$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');});}}});}
        return false;}



    $('#login-form-personal').on('submit',function(e){loginFormPersonal();});function collectUserData(email){var value="";$.ajax({type:'POST',async:false,url:SITE_URL+"site/GetProfileData",data:{email:email},cache:false,dataType:"json",success:function(response){if(response.status==="true"){value=response.value;}
else if(response.status==="false"){console.log('Ajax Error');}}});return value;}
    function RegisterNameUpdate(){var data=$('#register-name-update').serialize();var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;var username=$("#user_name").val();var address=$("#address").val();if(username=="")
    {$("#update_name_status").html('<div class="info">Please enter your  Username to proceed !</div>');$("#username").focus();}
    else if(address=="")
    {$("#update_name_status").html('<div class="info">Please enter your  Address to proceed !</div>');$("#address").focus();}
    else{$.ajax({type:'POST',async:false,url:SITE_URL+"site/RegisterUserUpdate",data:data,cache:false,dataType:"json",beforeSend:function()
    {$("#update_name_status").html('<br clear="all"><div style="padding-left:100px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="" align="absmiddle" title="Loading...."/></div><br clear="all">');},success:function(data)
    {if(data.status==='success'){$("#update_name_status").hide().fadeIn('slow').html(data.message);}},error:function(){alert('Error!')}});return false;}}
    $('#register-name-update').on('submit',function(e){RegisterNameUpdate();});function RegisterNumberUpdate(){var data=$('#register-number-update').serialize();var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;var phone_number=$("#phone_number").val();if(phone_number=="")
{$("#update_number_status").html('<div class="info">Please enter your Phone Number to proceed !</div>');$("#phone_number").focus();}
else{$.ajax({type:'POST',async:false,url:SITE_URL+"site/RegisterUserUpdate",data:data,cache:false,dataType:"json",beforeSend:function()
{$("#update_number_status").html('<br clear="all"><div style="padding-left:100px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="" align="absmiddle" title="Loading...."/></div><br clear="all">');},success:function(data)
{if(data.status==='success'){$("#update_number_status").hide().fadeIn('slow').html(data.message);}},error:function(){alert('Error!')}});return false;}}
    $('#register-number-update').on('submit',function(e){RegisterNumberUpdate();});function RegisterEmailUpdate(){var data=$('#register-email-update').serialize();var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;var email=$("#email").val();if(email=="")
{$("#update_email_status").html('<div class="info">Please enter your Phone Number to proceed !</div>');$("#email").focus();}
else{$.ajax({type:'POST',async:false,url:SITE_URL+"site/RegisterUserUpdate",data:data,cache:false,dataType:"json",beforeSend:function()
{$("#update_email_status").html('<br clear="all"><div style="padding-left:100px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="" align="absmiddle" title="Loading...."/></div><br clear="all">');},success:function(data)
{if(data.status==='success'){$("#update_email_status").hide().fadeIn('slow').html(data.message);}},error:function(){alert('Error!')}});return false;}}
    $('#register-email-update').on('submit',function(e){RegisterEmailUpdate();});function RegisterChangePassword(){var data=$('#change-password-form').serialize();var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;var change_password=$("#new_password").val();if(change_password=="")
{$("#change_password_status").html('<div class="info">Password does not match!</div>');$("#new_password").focus();}
else{$.ajax({type:'POST',async:false,url:SITE_URL+"site/ChangePassword",data:data,cache:false,dataType:"json",beforeSend:function()
{$("#change_password_status").html('<br clear="all"><div style="padding-left:100px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please wait</font> <img src="images/loadings.gif" alt="" align="absmiddle" title="Loading...."/></div><br clear="all">');},success:function(data)
{if(data.status==='success'){$("#change_password_status").hide().fadeIn('slow').html(data.message);}
else if(data.status==='incorrect'){$("#change_password_status").hide().fadeIn('slow').html(data.message);}else if(data.status==='error'){$("#change_password_status").hide().fadeIn('slow').html(data.message);}},error:function(){alert('Error!')}});return false;}}
    $('#change-password-form').on('submit',function(e){RegisterChangePassword();});function adPostInsert(){ tinyMCE.triggerSave(); var data=$('#ad-form').serialize(); var ad_title=$("#ad_title").val();var ad_description=$("#ad_description").val();var ad_condoition=$(".ad_condition").val();var ad_price=$("#ad_price").val();if(ad_title=="")
{$("#ad_status").html('<div class="info">Please enter your  Ads Title to proceed !</div>');$("#ad_title").focus();}
else if(ad_description=="")
{$("#ad_status").html('<div class="info">Please enter your Ads Description to go !</div>');$("#ad_description").focus();}
else if(ad_condoition=="")
{$("#ad_status").html('<div class="info">Please enter your Ads Condition to go !</div>');$("#ad_description").focus();}
else if(ad_price=="")
{$("#ad_status").html('<div class="info">Please enter your Ads Price to go !</div>');$("#ad_price").focus();}
else{$.ajax({type:'POST',url:SITE_URL+"site/SaveAd",data:data,cache:false,dataType:"json",beforeSend:function(){$("#ad_status").fadeOut();$("#ad_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#ad_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');function redirect(){window.location=SITE_URL+'success?ad_id='+response.ad_id;}
    window.setTimeout(redirect,4000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    return false;}
    $('#ad-form').on('submit',function(e){ adPostInsert();});$('.salary_type').on('change',function(){if($(this).val()=='1'){$('#salary_start').prop('placeholder','Salary');$('#salary_end').css('display','none');}else if($(this).val()=='2'){$('#salary_start').prop('placeholder','Salary Start Range');$('#salary_end').css('display','block');}else if($(this).val()=='3'){$('#salary_end').css('display','none');$('#salary_start').prop('placeholder','n/a');$('#salary_start').prop('readonly','true');}});
    function adPostUpdate(){ 
        tinyMCE.triggerSave(); 
        var category_id = $('#category_id').val();
        var data=$('#update-form').serialize();
        var ad_title=$("#ad_title").val();
        var ad_description=$("#ad_description").val();
        var ad_price=$("#ad_price").val();if(ad_title=="")
{
    $("#ad_status").html('<div class="info">Please enter your  Ads Title to proceed !</div>');$("#ad_title").focus();}
else if(ad_description=="")
{$("#ad_status").html('<div class="info">Please enter your Ads Description to go !</div>');$("#ad_description").focus();}
else if(ad_price=="")
{$("#ad_status").html('<div class="info">Please enter your Ads Price to go !</div>');$("#ad_price").focus();}
else{$.ajax({type:'POST',url:SITE_URL+"site/UpdateAd",data:data,cache:false,dataType:"json",beforeSend:function(){$("#ad_status").fadeOut();$("#ad_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#ad_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');function redirect(){window.location=SITE_URL+'update-success?ad_id='+response.ad_id;}
    window.setTimeout(redirect,4000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    return false;
}
    $('#update-form').on('submit',function(e){files_to_delete=$('#delete_image_file').val();$.ajax({type:'POST',url:SITE_URL+"site/DeleteMultiImageFromS3",cache:false,data:{file:files_to_delete}});adPostUpdate();});function jobPostInsert(){var data=$('#job-form').serialize();var ad_title=$("#ads_title").val();var ad_description=$("#ads_description").val();var job_salary=$("#salary_start").val();var deadline=$("#application_deadline").val();if(ad_title=="")
{$("#ad_status").html('<div class="info">Please enter your  Job Title to proceed !</div>');$("#ad_title").focus();}
else if(ad_description==""){$("#ad_status").html('<div class="info">Please enter your Job Description to go !</div>');$("#ad_description").focus();}
else if(job_salary=="")
{$("#ad_status").html('<div class="info">Please enter your Job Salary/Range to go !</div>');$("#salary_start").focus();}
else{$.ajax({type:'POST',url:SITE_URL+"site/SaveJob",data:data,cache:false,dataType:"json",beforeSend:function(){$("#ad_status").fadeOut();$("#job_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#job_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');function redirect(){window.location=SITE_URL+'job-post-success?job_id='+response.ad_id;}
    window.setTimeout(redirect,4000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    return false;}
    $('#job-form').on('submit',function(e){jobPostInsert();});$('#estore-create').on('submit',function(e){adEstore();});function adEstore(){var data=$('#estore-create').serialize();$.ajax({type:'POST',url:SITE_URL+"estore/CreateEstore",data:data,cache:false,dataType:"json",beforeSend:function(){$("#ad_status").fadeOut();$("#estore_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#estore_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');function redirect(){var url=SITE_URL+'my-profile/dashboard';window.open(url,"_self");}
    window.setTimeout(redirect,4000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    $('.estimation_submit').on('click',function(){$('#offer-form').submit();});$('#offer-form').on('submit',function(){var offered_price=$('#offer_price').val();var data=$('#offer-form').serialize();if(offered_price=="")
{$("#offer_status").html('<div class="error">Please enter correct offer !</div>');$("#offer_price").focus();return;}
    $.ajax({type:'POST',url:baseUrl()+'site/addOfferPrice',cache:false,data:data,dataType:'json',success:function(response){if(response.status=='success'){$("#offer_status").html('<div class="info">Your offer submitted successfully !</div>');$('#offer_price').val('');}else{$("#offer_status").html('<div class="error">Error! your offer not submitted!</div>');}}});});

    function businessAdsInsert(){tinyMCE.triggerSave(); var data=$('#ad-form-business').serialize();var ad_title=$("#ad_title_business").val();var ad_description=$("#ad_description_business").val();var ad_condoition=$(".ads_condition_business").val();var ad_price=$("#ad_price_business").val();if(ad_title=="")
{$("#ad_status_business").html('<div class="info">Please enter your  Ads Title to proceed !</div>');$("#ad_title_business").focus();}
else if(ad_description=="")
{$("#ad_status_business").html('<div class="info">Please enter your Ads Description to go !</div>');$("#ad_description_business").focus();}
else if(ad_condoition=="")
{$("#ad_status_business").html('<div class="info">Please enter your Ads Description to go !</div>');$("#ads_condition_business").focus();}
else if(ad_price=="")
{$("#ad_status_business").html('<div class="info">Please enter your Ads Price to go !</div>');$("#ad_price_business").focus();}
else{$.ajax({type:'POST',url:SITE_URL+"site/SaveAd",data:data,cache:false,dataType:"json",beforeSend:function(){$("#ad_status").fadeOut();$("#ad_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#ad_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');function redirect(){window.location=SITE_URL+'success?ad_id='+response.ad_id;}
    window.setTimeout(redirect,4000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    return false;}

    function businessAdsUpdate(){
        tinyMCE.triggerSave(); 
        var data=$('#update-form-business').serialize();
        var ad_title=$("#ad_title_business").val();
        var ad_description=$("#ad_description_business").val();
        var ad_condoition=$(".ads_condition_business").val();
        var ad_price=$("#ad_price_business").val();if(ad_title=="")
{$("#ad_status_business").html('<div class="info">Please enter your  Ads Title to proceed !</div>');$("#ad_title_business").focus();}
else if(ad_description=="")
{$("#ad_status_business").html('<div class="info">Please enter your Ads Description to go !</div>');$("#ad_description_business").focus();}
else if(ad_condoition=="")
{$("#ad_status_business").html('<div class="info">Please enter your Ads Description to go !</div>');$("#ads_condition_business").focus();}
else if(ad_price=="")
{$("#ad_status_business").html('<div class="info">Please enter your Ads Price to go !</div>');$("#ad_price_business").focus();}
else{$.ajax({type:'POST',url:SITE_URL+"site/UpdateISPPackage",data:data,cache:false,dataType:"json",beforeSend:function(){$("#ad_status").fadeOut();$("#ad_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#ad_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');function redirect(){window.location=SITE_URL+'my-profile/my-packages';}
    window.setTimeout(redirect,4000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    return false;}

    $('#ad-form-business').on('submit',function(e){businessAdsInsert();});
$('#update-form-business').on('submit',function(e){businessAdsUpdate();});
    $(".number_input").keydown(function(e){if($.inArray(e.keyCode,[46,8,9,27,13,110,190])!==-1||(e.keyCode===65&&(e.ctrlKey===true||e.metaKey===true))||(e.keyCode>=35&&e.keyCode<=40)){return;}
    if((e.shiftKey||(e.keyCode<48||e.keyCode>57))&&(e.keyCode<96||e.keyCode>105)){e.preventDefault();}});
    function hotAdsRequest(){var data=$('#hot_ads_submit').serialize();var start_date=$("#start_date").val();var end_date=$("#end_date").val();if(start_date=="")
{$("#hot_ads_status").html('<div class="info">Please enter your start date to proceed !</div>');$("#start_date").focus();}
else if(end_date=="")
{$("#hot_ads_status").html('<div class="info">Please enter your end date to go !</div>');$("#start_date").focus();}
else{$.ajax({type:'POST',url:SITE_URL+"site/HotAdsRequest",data:data,cache:false,dataType:"json",beforeSend:function(){$("#hot_ads_status").fadeOut();$("#hot_ads_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},success:function(response){if(response.status=="success"){$("#hot_ads_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');window.setTimeout(function(){$("#myModal").modal("hide");},2000);}else if(response.status=="false"){$("#error_personal").fadeIn(1000,function(){$("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');});}}});}
    return false;}
    $('#hot_ads_submit').on('submit',function(e){hotAdsRequest();});$('.quickview-link').on('click',function(){ad_id=$(this).attr('data-item');$.ajax({type:'POST',url:SITE_URL+"profile/getAdDetailsForProfile",data:{ad_id:ad_id},cache:false,dataType:"json",success:function(response){if(response.status=="success"){$('.carousel-inner').html(response.ad_image);$('.ad_title').html(response.ad_title);$('.ad_price').html(response.ad_price);$('.short-info').html(response.ad_short_details);$('.description').html(response.ad_details);$("#ad_preview_modal").modal("show");}}});});});