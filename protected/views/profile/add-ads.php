<?php
$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';

//$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$result = Yii::app()->db->createCommand( "SELECT categories FROM tbl_estore  WHERE user_id LIKE '$user_id'")->queryAll();

$individual_category_id = explode(',',$result[0]['categories']);

/*foreach($individual_category_id as $id){
    $category_name[] = Category::model()->findByPk($id);
}*/

$category_criteria = new CDbCriteria();
$category_criteria->addInCondition('category_id', $individual_category_id);
$category_criteria->order ='category_name ASC';
$category_name = Category::model()->findAll($category_criteria);


$expire_date =Subscription_plan ::model()->findByAttributes(array('user_id' => $user_id));

echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
//Generic::_setTrace($plan_details_array,false);
//Generic::_setTrace('sss');

?>
<script language="javascript" type="text/javascript" src="<?php Yii::app()->getBaseUrl(true)?>/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        theme : "modern",
        mode: "exact",
        elements : "ad_description_business",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
        + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
        + "bullist,numlist,outdent,indent",
        theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
        +"undo,redo,cleanup,code,separator,sub,sup,charmap",
        theme_advanced_buttons3 : "",
        height:"350px",
        width:"auto"
    });
</script>
<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
        <div id="ad-post" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#ad-post">
                <span><i class="adicon-alarm"></i></span>
                Ad Alerts

                <!-- main -->

                <div class="container">

                    <div class="breadcrumb-section">
                        <!-- breadcrumb -->
                        <ol class="breadcrumb">
                            <li><a href="index-2.html">Home</a></li>
                            <li>Ad Post</li>
                        </ol><!-- breadcrumb -->

                    </div><!-- banner -->

                    <div class="adpost-details">
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'ad-form-business',
                                    'enableAjaxValidation'=>false,
                                    'action'=>'javascript:void(0);',
                                    'enableClientValidation'=>false,

                                ));
                                ?>
                                <fieldset>
                                    <div class="section postdetails">
                                        <h4>Sell an Item or Service <span class="pull-right">* Mandatory Fields</span></h4>

                                        <div id="error_ad_post"></div>
                                        <input type="hidden" name="ad_type" value="business">
                                        <input type="hidden" name="expire_date" value="<?=$expire_date->expiration_date?>">
                                         <?php if($category_id != 225) { ?>
                                         <div class="row form-group add-title" id='category_business'>
                                            <label class="col-sm-3 label-title">Select Category<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                               
                                                <select onchange="showHideInputField()" class="form-control"  id="category_id" name="category_id">
                                                    <option  value="Select Category">Select Category</option>
                                                    <?php
                                                    foreach($category_name as $category){
                                                        $category_name = $category->category_name;
                                                        $category_id = $category->category_id;
                                                        $subcategory_slug = $category->sub_category_slug;?>
                                                        <option  value="<?=$category_id?>"><?=$category_name?></option>
                                                    <?php }?>
                                                </select>
                                                
                                            </div>
                                            <div id="message"></div>
                                        </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="category_id" id="category_id" value="226">
                                        <?php } ?>
                                        <div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
                                            <label class="col-sm-3 label-title">Title for your Ad<span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="ads_title" id="ad_title_business" class="form-control"  placeholder="ex, Sony Xperia dual sim 100% brand new ">
                                            </div>
                                            <div id="message"></div>
                                        </div>
                                        <div class="row form-group add-image">
                                            <label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
                                            <div class="col-sm-9">
                                                <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload.<span>You can add multiple images (Maximum Five).<p>(Preferred size: 900x900 px)</p></span></h5>
                                                <div class="upload-section">
                                                    <input type="file" name="files[]" id="filer_input2" multiple="multiple">
                                                    <input type="hidden" name="image_file" value="" id="image_file" >
                                                    <!--<input type="file" id="upload-image-one" name="ads_image[]" multiple>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group item-description" id="description" title="Keep it friendly, but have your buyers in mind, i.e. what they're looking for and what questions they may have, when writing your description. It's also important to highlight the benefits of whatever you're offering.">
                                            <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="ads_description" id="ad_description_business" placeholder="Write few lines about your products" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group select-condition">
                                            <label class="col-sm-3">Condition<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="ads_condition" value="1" id="new" class="ads_condition_business" >
                                                <label for="new">New</label>
                                                <input type="radio" name="ads_condition" value="0" id="used" class="ads_condition_business">
                                                <label for="used">Used</label>
                                            </div>
                                        </div>
                                        <div class="row form-group select-price"  title="Don't know what price to put? Balance out how much you want for what you're offering with how much you think users are willing to pay.">
                                            <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <span>BDT</span>
                                                <input type="text" id="ad_price_business" name="ads_price" class="form-control" >
                                                <div id="ifYes" style="display:none;position: relative;float: right;left: -75px">
                                                    <input type='text' class="number_input form-control" id='discount' name='discount' value="" placeholder="Set discount (Optional)" data-container="body" data-toggle="popover" data-trigger="focus" data-content="How much % you want to offer? Just type the number. Example: 20">
                                                </div>
                                                <br>
                                                <br>
                                                <input type="radio" name="price_type" value="1" id="fixed" checked>
                                                <label for="fixed">Fixed </label>
                                                <input type="radio" name="price_type" value="0" id="negotiable">
                                                <label for="negotiable">Negotiable </label>
                                            </div>
                                        </div>
                                        <div class="row form-group show-price">
                                            <label class="col-sm-3 label-title">Show Price</label>
                                            <div class="col-sm-3">
                                                <p><input type="checkbox" name="price_show_box" checked="checked" /></p>
                                            </div>
                                            <label class="col-sm-3 label-title" style="margin-top: -7px"><img src="<?=$baseUrl?>/images/home1/pohela-boishakh.png"></label>
                                            <div class="col-sm-3">
                                                <p><input type="checkbox" name="special_offer_show_box" id="special_offer_checkbox"/></p>
                                                <input type="hidden" id="special_offer" name="special_offer" value="0">
                                            </div>
                                        </div>
                                        <div id="meta_html"></div>
                                        <div class="section">
                                            <h4>Make your Ad Premium </h4>
                                            <div class="row form-group col-sm-7">
                                               <?php if((isset($user_ads_array) && ($plan_details_array))) {
                                                   $class = "display:block";
                                                   $message = "";
                                                   $message_style = "display:none";
                                                   if($user_ads_array != "") {
                                                       if ($user_ads_array['user_total_featured_ad_count'] >= $plan_details_array['featured_ad_count']) {
                                                           $class = "display:none";
                                                           $message = "Exceeded Your Featured product limit.";
                                                           $message_style = "display:block;color:red";
                                                       }
                                                   }
                                               ?>
                                                   <label style="<?=$message_style?>"><?=$message?></label>
                                                   <div class="row col-sm-12" style="<?=$class?>">
                                                    <label class="col-sm-3 label-title">Featured:</label>

                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input class="cboxes_featured switch-input" rel=""  id="cbox2" type="checkbox" name="ad_premium" />
                                                            <input type="hidden" id="is_featured" name="is_featured" value="">
                                                            <span class="switch-label" onmouseover="showFeaturedAdsImage()" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                            <div class="tinybox" style="">
                                                                <img src="<?=$baseUrl?>/images/featured_store.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>

                                               <?php } ?>

                                                <?php if((isset($user_ads_array) && ($plan_details_array))) {
                                                $class = "display:block";
                                                    $message = "";
                                                    $message_style = "display:none";
                                                if($user_ads_array != "") {
                                                    if ($user_ads_array['user_total_premium_ad_count'] >= $plan_details_array['premium_ad_count']) {
                                                        $class = "display:none";
                                                        $message = "Exceeded Your Premium product limit.";
                                                        $message_style = "display:block;color:red";
                                                    }
                                                }
                                                ?>

                                                    <label style="<?=$message_style?>"><?=$message?></label>
                                                <div class="row col-sm-12" style="<?=$class?>">
                                                    <label class="col-sm-3 label-title">Premium:</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input class="cboxes_premium switch-input" rel="" type="checkbox" name="ad_premium" />
                                                            <input type="hidden" id="is_premium" name="is_premium" value="">
                                                            <span class="switch-label" onmouseover="showPremiumAdsImage()" data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                            <div class="tinybox" style="">
                                                                <img src="<?=$baseUrl?>/images/premium_store.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                                <?php if((isset($user_ads_array) && ($plan_details_array))) {
                                                $class = "display:block";
                                                    $message = "";
                                                    $message_style = "display:none";
                                                if($user_ads_array != "") {
                                                    if ($user_ads_array['user_total_top_ad_count'] >= $plan_details_array['top_ad_count']) {
                                                        $class = "display:none";
                                                        $message = "Exceeded Your Top product limit.";
                                                        $message_style = "display:block;color:red";
                                                    }
                                                }
                                                ?>
                                                    <label style="<?=$message_style?>"><?=$message?></label>
                                                <div class="row col-sm-12" style="<?=$class?>">
                                                    <label class="col-sm-3 label-title">Top:</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input class="cboxes_top switch-input" rel="" type="checkbox" name="ad_premium" />
                                                            <input type="hidden" id="is_top" name="is_top" value="">
                                                            <span class="switch-label" onmouseover="showTopAdsImage()"  data-on="On" data-off="Off"></span>
                                                            <span class="switch-handle"></span>
                                                            <div class="tinybox" style="">
                                                                <img src="<?=$baseUrl?>/images/top_store.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>

                                                <?php } ?>


                                            </div>
                                            <div class="image-container col-sm-5"></div>
                                            <div class="price-container"></div>
                                            <div style="clear:both"></div>

                                        </div><!-- section -->

                                            <label class="col-sm-3 label-title">Want to Show in eStore? ?</label>
                                            <div class="col-sm-9">
                                                <label class="switch">
                                                    <input class="cboxes_show switch-input" rel="" type="checkbox" name="show_in_estore" />
                                                    <input type="hidden" id="show_price_option" name="show_price_option" value="1">
                                                    <input type="hidden" id="show_in_estore" name="show_in_estore" value="">
                                                    <span class="switch-label"  data-on="On" data-off="Off"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                            </div>
                                        <div style="clear:both"></div>

                                    </div><!-- section -->

                                    <div class="checkbox section agreement">
                                        <div align="left" id="ad_status_business"></div>
                                        <button type="submit" id="ad_submit" class="btn btn-theme" style="width: 100%">Ad Your Product</button>
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
</script>