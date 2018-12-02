<?php
$baseUrl = Yii::app()->request->getBaseUrl(true);;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';
//$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$result = Yii::app()->db->createCommand( "SELECT categories FROM tbl_estore  WHERE user_id LIKE '$user_id'")->queryAll();
$individual_category_id = explode(',',$result[0]['categories']);
foreach($individual_category_id as $id){
    $category_name[] = Category::model()->findByPk($id);
}

$expire_date =Subscription_plan ::model()->findByAttributes(array('user_id' => $user_id));

echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));


?>
<style type="text/css">
    .select_action_buttons img {
        width: 70px;
    }
    .select_action_buttons {
        padding-top: 15px;
    }
    #nationwide_block .row{
        margin-top: 30px;
    }

</style>
<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
        <div id="ad-post" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#ad-post">
                <span><i class="adicon-alarm"></i></span>
                Update Thana

                <!-- main -->

                <div class="container">

                    <div class="breadcrumb-section">
                        <!-- breadcrumb -->
                        <ol class="breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li>Update Thana</li>
                        </ol><!-- breadcrumb -->

                    </div><!-- banner -->

                    <div class="adpost-details">
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'update-thana-form',
                                    'enableAjaxValidation'=>false,
                                    'enableClientValidation'=>false,

                                ));
                                ?>
                                <fieldset>
                                    
                                    <div id="nationwide_block" class="row">
    <?php if($isp_type == '1') { ?>
    <div class="row">
        <p style="text-align:center; color:red;font-weight:bold">Please select your service providing thana as list</p>
        <div class="col-sm-5 col-md-5">
            <label>Division List</label>
            <select class="form-control no-arrow multiple_box" name="nationwide_division" multiple id="nationwide_division" tabindex="1">
                <?php
                
                foreach ($divisions as $division) {
                    echo '<option value="' . $division->division_id . '">' . $division->division . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2 col-md-2 select_action_buttons">
            <a href="javascript:void()" id="division_select" class="green_link"><img src="<?php echo $baseUrl; ?>/images/right-arrow-select-icon1.png"></a>
            <a href="javascript:void()" id="division_remove" class="red_link"><img src="<?php echo $baseUrl; ?>/images/left-arrow-select-icon1.png"></a>
            <!-- <a href="javascript:void()" id="division_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="division_remove_all" class="red_link"><< Remove All</a>-->
        </div>
        <div class="col-sm-5 col-md-5">
            <label>Selected Division List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_nationwide_division" id="selected_nationwide_division" tabindex="2">
            </select>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-5 col-md-5">
            <label>District List</label>
            <select class="form-control no-arrow multiple_box" name="nationwide_district" multiple id="nationwide_district" tabindex="1">
                <?php if($isp_type != '1') { 
                        foreach ($districts as $single_district) {  
                    ?>
                    <option value="<?php echo $single_district->district_id ?>"><?php echo $single_district->district ?></option>
                <?php 
                    }
                } 
            ?>
            </select>
        </div>
        <div class="col-sm-2 col-md-2 select_action_buttons">
            <a href="javascript:void()" id="district_select" class="green_link"><img src="<?php echo $baseUrl; ?>/images/right-arrow-select-icon1.png"></a>
            <a href="javascript:void()" id="district_remove" class="red_link"><img src="<?php echo $baseUrl; ?>/images/left-arrow-select-icon1.png"></a>
            <!-- <a href="javascript:void()" id="district_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="district_remove_all" class="red_link"> << Remove All</a>-->
        </div>
        <div class="col-sm-5 col-md-5">
            <label>Selected District List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_nationwide_district" id="selected_nationwide_district" tabindex="2">
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-md-5">
            <label>Thana List</label>
            <select class="form-control no-arrow multiple_box" name="nationwide_thana" multiple id="nationwide_thana" tabindex="1">
            </select>
        </div>
        <div class="col-sm-2 col-md-2 select_action_buttons">
            <a href="javascript:void()" id="thana_select" class="green_link"><img src="<?php echo $baseUrl; ?>/images/right-arrow-select-icon1.png"></a>
            <a href="javascript:void()" id="thana_remove" class="red_link"><img src="<?php echo $baseUrl; ?>/images/left-arrow-select-icon1.png"></a>
            <!-- <a href="javascript:void()" id="thana_select_all" class="green_link">Select All>></a> 
            <a href="javascript:void()" id="thana_remove_all" class="red_link"> << Remove All</a>-->
        </div>
        <div class="col-sm-5 col-md-5">
            <label>Selected Thana List</label>
            <select class="form-control no-arrow multiple_box" multiple name="selected_nationwide_thana[]" id="selected_nationwide_thana" tabindex="2">
                <?php foreach ($selected_thana_list as $item) { ?>
                    <option value="<?php echo $item->id ?>"><?php echo $item->thana ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <input type="hidden" name="selected_hidden_thana" id="selected_hidden_thana" value="<?php echo $selected_thana_value; ?>">
    <input type="hidden" name="isp_type" id="isp_type" value="<?php echo $isp_type ?>">
</div>
                                    <div class="checkbox section agreement">
                                        <div align="left" id="ad_status_business"></div>
                                        <button type="submit" id="ad_submit" class="btn btn-theme" style="width: 100%">Update Coverage Area</button>
                                    </div><!-- section -->

                                </fieldset>
                                <?php $this->endWidget();?>
                                <!-- form -->
                            </div>

                        </div><!-- photos-ad -->
                    </div>
                </div><!-- container -->



        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

<style>
    .info { border: 1px solid #999; padding:0px 60px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}

    .switch {
        position: relative;
        display: block;
        vertical-align: top;
        width: 100px;
        height: 30px;
        padding: 3px;
        margin: 0 10px 10px 0;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
        border-radius: 18px;
        box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
        cursor: pointer;
    }
    .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }
    .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 10px;
        text-transform: uppercase;
        background: #eceeef;
        border-radius: inherit;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
    }
    .switch-label:before, .switch-label:after {
        position: absolute;
        top: 50%;
        margin-top: -.5em;
        line-height: 1;
        -webkit-transition: inherit;
        -moz-transition: inherit;
        -o-transition: inherit;
        transition: inherit;
    }
    .switch-label:before {
        content: attr(data-off);
        right: 11px;
        color: #aaaaaa;
        text-shadow: 0 1px rgba(255, 255, 255, 0.5);
    }
    .switch-label:after {
        content: attr(data-on);
        left: 11px;
        color: #FFFFFF;
        text-shadow: 0 1px rgba(0, 0, 0, 0.2);
        opacity: 0;
    }
    .switch-input:checked ~ .switch-label {
        background: #15831b;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    }
    .switch-input:checked ~ .switch-label:before {
        opacity: 0;
    }
    .switch-input:checked ~ .switch-label:after {
        opacity: 1;
    }
    .switch-handle {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 28px;
        height: 28px;
        background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
        background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
        border-radius: 100%;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    }
    .switch-handle:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -6px 0 0 -6px;
        width: 12px;
        height: 12px;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
        border-radius: 6px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
    }
    .switch-input:checked ~ .switch-handle {
        left: 74px;
        box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
    }

    /* Transition
    ========================== */
    .switch-label, .switch-handle {
        transition: All 0.3s ease;
        -webkit-transition: All 0.3s ease;
        -moz-transition: All 0.3s ease;
        -o-transition: All 0.3s ease;
    }


</style>

<script>
    $('input[id="special_offer_checkbox"]').on('change',function(){
        if($(this).is(':checked')){
            $('#ifRange').hide('slow');
            $('#ifYes').show('slow');
            $("#discount").select();
        } else {
            $('#ifYes').hide('slow');
        }
    });

    $('input[id="bdix_speed_connected_yes"]').on('change',function(){
        if($(this).is(':checked')){
            $("#bdix_speed_block").show('slow');
        }
    });

    $('input[id="bdix_speed_connected_no"]').on('click',function(){
        if($(this).is(':checked')){
            $("#bdix_speed_block").hide('slow');
        }
    });

    $('input[id="youtube_cache_yes"]').on('change',function(){
        if($(this).is(':checked')){
            $("#youtube_speed_block").show('slow');
        }
    });

    $('input[id="youtube_cache_no"]').on('click',function(){
        if($(this).is(':checked')){
            $("#youtube_speed_block").hide('slow');
        }
    });

    $('input[id="ftp_link_checkbox"]').on('change',function(){
        if($(this).is(':checked')){
            $("#ftp_link").show();
        } else {
            $('#ftp_link').hide();
        }
    });

    $('input[id="live_tv_link_checkbox"]').on('change',function(){
        if($(this).is(':checked')){
            $("#live_tv").show();
        } else {
            $('#live_tv').hide();
        }
    });


    $(document).ready(function(){
        customCheckbox("price_show_box");
        customCheckbox("special_offer_show_box");
        $('input[name="price_show_box"]').on('change',function(){
            if($(this).is(':checked')){
                $('#show_price_option').val('1');
            } else {
                $('#show_price_option').val('0');
            }
        });
        $('input[name="special_offer_show_box"]').on('change',function(){
            if($(this).is(':checked')){
                $('#special_offer').val('1');
            } else {
                $('#special_offer').val('0');
            }
        });
    });

    function customCheckbox(checkboxName){
        var checkBox = $('input[name="'+ checkboxName +'"]');
        $(checkBox).each(function(){
            $(this).wrap( "<span class='custom-checkbox'></span>" );
            if($(this).is(':checked')){
                $(this).parent().addClass("selected");
            }
        });
        $(checkBox).click(function(){
            $(this).parent().toggleClass("selected");
        });
    }

    function showFeaturedAdsImage(){
        $('.image-container').html('<img src="<?=$baseUrl?>/images/featured_store.png" alt="tinypic2" id="tinypic2" style="display:block;">');
    }
    function showPremiumAdsImage(){
        $('.image-container').html('<img src="<?=$baseUrl?>/images/premium_store.png" alt="tinypic2" id="tinypic2" style="display:block;">');
    }
    function showTopAdsImage(){
        $('.image-container').html('<img src="<?=$baseUrl?>/images/top_store.png" alt="tinypic2" id="tinypic2" style="display:block;">');
    }

    $("input:checkbox").on('click', function() {
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });

    $('.cboxes_featured').change(function() {
        var image = $(this).siblings(".tinybox").find("img");
        if ($(this).prop('checked')) {
            $('#is_featured').val('1');
            $('#is_premium').val('0');
            $('#is_top').val('0');
        }
        else {

            $('#is_featured').val('0');
        }
    });
    $('.cboxes_premium').change(function() {
        var image = $(this).siblings(".tinybox").find("img");
        if ($(this).prop('checked')) {
            $('#is_featured').val('0');
            $('#is_premium').val('1');
            $('#is_top').val('0');
        }
        else {

            $('#is_premium').val('0');
        }
    });
    $('.cboxes_top').change(function() {
        var image = $(this).siblings(".tinybox").find("img");
        if ($(this).prop('checked')) {
            $('#is_featured').val('0');
            $('#is_premium').val('0');
            $('#is_top').val('1');
        }
        else {

            $('#is_top').val('0');
        }
    });
    $('.cboxes_show').change(function() {
        if ($(this).prop('checked')) {


            $('#show_in_estore').val('1');
        }
        else {

            $('#show_in_estore').val('0');
        }
    });
    function showHideInputField(){
        var value = $('#category_id').val();

        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/ShowHideInputField",
            data : {category_id:value},
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){

                    $("#meta_html").html(response.html);

                }
            }


        });
    }

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })

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
                    data: {division_id: selected_division_value,no_select:1},
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
        var zone_id = $('#isp_type').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/GetThanasForNationWide",
                data: {district_id: selected_district_value,zone_id: zone_id},
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
        var isp_type = $('#isp_type').val();

        selected_thana = $("#nationwide_thana option:selected").text();
        selected_items_number = $('#nationwide_thana').val().length;
        if(selected_items_number > 1) {
            alert("You will not be able to choose more than one thana");
            return;
        }

        selected_thana_list_number = $('#selected_nationwide_thana option').length;
        if(selected_thana_list_number > 2 && (isp_type == '7' || isp_type == '8' || isp_type == '9')) {
            alert("You will not be able to choose more than 3 thana");
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
            /*$('#nationwide_thana').append($('<option/>', { 
                value: selected_thana_value,
                text : selected_thana 
            }));*/
            selected_thana_list = $('#selected_hidden_thana').val();
            modified_thana_list = selected_thana_list.replace(',' + selected_thana_value, "");
            $('#selected_hidden_thana').val(modified_thana_list);
        }
    });
</script>