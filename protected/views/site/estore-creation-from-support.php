<?php

$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$all_category_list = Generic::getAllCategoryData();
$user_name = isset($profile_data->user_name) ? $profile_data->user_name : '';
$email = isset($profile_data->email) ? $profile_data->email : '';

$address = isset($profile_data->address) ? $profile_data->address : '';
$password = isset($profile_data->password) ? $profile_data->password : '';
$enter_prise_name = isset($profile_data->enterprise_name) ? $profile_data->enterprise_name : '';
$url_alias = str_replace(" ","_",strtolower($enter_prise_name));
$category_id = isset($profile_data->business_category_id) ? $profile_data->business_category_id : '';
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

<div id="tabs-dashboard-01" class="uzr-panels row">
    <div class="inner" style="width: 1000px; margin: 0 auto">
        <div id="tab009" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab007">
                <span><i class="adicon-settings"></i></span>
                E-Store Creation
            </a>

            <div class="row estore_configuration">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <div class="icon-heading">
                            <!--<h4><i class="adicon-create tc4"></i> E-Store Creation</h4>-->
                        </div>
                    </div>
                </div>

                <div class="inner" style="border: 1px solid #e0e0e0;margin-bottom: 40px">
                    <div class="basic-card">
                        <header>
                            <h3 style="text-align: center;text-decoration: underline;font-family: cursive"><i class="adicon-create tc4"></i> E-Store Creation</h3>
                        </header>
                        <div class="inner">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <form action="estore/createEStoreFromSupport" id="estore-create-from-support" method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <input type="hidden" name="service_plan" id="service_plan" value="<?php echo $service_plan ?>">
                                        <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id ?>">
                                        <input type="hidden" name="additional_service" id="additional_service" value="1">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" id="company_name" name="company_name" value="<?=$enter_prise_name?>" readonly class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Company URL Alias</label>
                                            <input type="text" id="company_url_alias"  name="company_url_alias" value="<?=$url_alias?>"  class="form-control" readonly >
                                            <!--<div id="success_html"></div>
                                            <div id="suggestion_html"></div>-->
                                        </div>
                                        <div class="form-group">
                                            <label>Company Slogan</label>
                                            <input type="text" id="slogan" name="slogan" class="form-control" value="">
                                        </div>

                                        <div class="form-group">
                                            <label>Company Logo</label>
                                            <input type="file" name="files" id="filer_input9">
                                            <input type="hidden" name="logo_image" value="" id="logo_image" >
                                        </div>
                                        <div>
                                            <label>Banner Slider (Upload Three Image)</label>
                                            <input type="file" name="files[]" id="filer_input10" multiple="multiple">
                                            <input type="hidden" name="banner_image" value="" id="banner_image" >
                                        </div>
                                        <div>
                                            <label>Sub Banner (Upload Two Image)</label>
                                            <input type="file" name="files[]" id="filer_input11" multiple="multiple">
                                            <input type="hidden" name="sub_banner" value="" id="sub_banner_image" >
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
                                        <button type="submit" id="estore_submit"  class="btn btn-small btn-green">Create EStore</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--basic-card-->

                </div>
            </div>

        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

<style>

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

        var input = document.querySelector('input[name="standard"]');
        var input2 = document.querySelector('input[name="silver"]');
        var input3 = document.querySelector('input[name="platinum"]');

        function check() {
            var a = input.checked ? "02" : "01";
            var b = input.checked ? "02" : "01";
            var c = input.checked ? "02" : "01";
            var d = input.checked ? "1000" : "500";
            var e = input2.checked ? "04" : "02";
            var f = input2.checked ? "04" : "02";
            var g = input2.checked ? "04" : "02";
            var h = input2.checked ? "1500" : "900";
            var i = input3.checked ? "04" : "02";
            var j = input3.checked ? "04" : "02";
            var k = input3.checked ? "04" : "02";
            var l = input3.checked ? "2000" : "1350";
            var m = input3.checked ? "01" : "No";
            document.getElementById('feature').innerHTML = a;
            document.getElementById('premium').innerHTML = b;
            document.getElementById('top').innerHTML = c;
            document.getElementById('price-plan').innerHTML = d;
            document.getElementById('feature2').innerHTML = e;
            document.getElementById('premium2').innerHTML = f;
            document.getElementById('top2').innerHTML = g;
            document.getElementById('price-plan2').innerHTML = h;
            document.getElementById('feature3').innerHTML = i;
            document.getElementById('premium3').innerHTML = j;
            document.getElementById('top3').innerHTML = k;
            document.getElementById('price-plan3').innerHTML = l;
            document.getElementById('promotion-banner').innerHTML = m;
        }
        input.onchange = check;
        input2.onchange = check;
        input3.onchange = check;
        check();


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

    $('.plan_selection').on('click',function(){
        plan_id = $(this).attr('data-value');
        parent_element = $(this).parent().find('input[type=checkbox]');
        if(parent_element.is(':checked')) {
            plan_name = parent_element.attr('id');
            user_id = $('#user_id').val();
            $.ajax({
                type : 'POST',
                url  : SITE_URL+"profile/SendRequestAfterPlanChosen",
                data : {plan_name:plan_name,user_id:user_id},
                cache: false,
                dataType:"json",
                success : function(response){
                    if(response.status=="success"){
                        window.location = SITE_URL+'my-profile/thank-you';
                    }
                }
            });
            return;
        }
        $('#service_plan').val(plan_id);
        if(plan_id == 1) {
            if($("#standard").is(':checked')) {
                $('#additional_service').val(1);
            } else {
                $('#additional_service').val(0);
            }
        } else if(plan_id == 2) {
            if($("#silver").is(':checked')) {
                $('#additional_service').val(1);
            } else {
                $('#additional_service').val(0);
            }
        } else if(plan_id == 3) {
            if($("#platinum").is(':checked')) {
                $('#additional_service').val(1);
            } else {
                $('#additional_service').val(0);
            }
        }

        $('.pricing-section').hide('slow');
        $('.estore_configuration').show('slow');
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    $('.back_btn').on('click',function(){
        $('.pricing-section').show('slow');
        $('.estore_configuration').hide('slow');
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });


    function placeValue(suggestion_string){
        jQuery('#company_url_alias').val(suggestion_string);
    }
</script>



