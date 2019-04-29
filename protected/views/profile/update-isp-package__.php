<?php
$baseUrl = Yii::app()->request->baseUrl;
$ad_id = urldecode(base64_decode(Yii::app()->request->getParam('ad_id')));
$ad_details = Generic::getAddDetailsFromAddTable($ad_id);
$ad_details_all = Generic::getAddDetailsFromAddMetaTable($ad_details['id']);
$ad_id = urldecode(base64_decode(Yii::app()->request->getParam('ad_id')));
$category_id = $ad_details['category_id'];
$sub_category_data = Generic::getCategoryDetails($category_id);
$sub_category_slug = $sub_category_data['sub_category_slug'];
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
$column_configuration_manager = Yii::app()->params['columnsConfig'];
if(isset($column_configuration_manager[$sub_category_slug])) {
    $custom_column_number = count($column_configuration_manager[$sub_category_slug]);
} else {
    $custom_column_number = 0;
}

foreach($ad_details_all as $ad){
    $field_name = $ad['field_name'];
    $field_value = $ad['field_value'];
    $ad_details[$field_name] = $field_value;
}
$images = json_decode($ad_details['image_url']);
$image_file = ','.implode(',',$images);

$price_config = Yii::app()->params['priceSettings'];
$featured_price = $price_config['featured']['amount'];
$premium_price = $price_config['premium']['amount'];
$top_price = $price_config['top']['amount'];

echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
?>

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
                                        <div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
                                            <label class="col-sm-3 label-title">Title for your <?php if($category_id == 225) { echo "package"; } else { echo "ad"; } ?><span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="ads_title" id="ad_title_business" class="form-control"  placeholder="ex, Sony Xperia dual sim 100% brand new ">
                                            </div>
                                            <div id="message"></div>
                                        </div>
                                        <div class="row form-group add-image">
                                            <label class="col-sm-3 label-title">Photos for your <?php if($category_id == 225) { echo "package"; } else { echo "ad"; } ?> <span>(This will be your cover photo )</span> </label>
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
                                            <label class="col-sm-3 label-title"><?php if($category_id == 225) { echo "package"; } ?> Description<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="ads_description" id="ad_description_business" placeholder="Write few lines about your products" rows="8"></textarea>
                                            </div>
                                        </div>
                                        <?php if($category_id != 225){ ?>
                                        <div class="row form-group select-condition">
                                            <label class="col-sm-3">Condition<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="ads_condition" value="1" id="new" class="ads_condition_business" >
                                                <label for="new">New</label>
                                                <input type="radio" name="ads_condition" value="0" id="used" class="ads_condition_business">
                                                <label for="used">Used</label>
                                            </div>
                                        </div>
                                        <?php } ?>
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
                                            <label class="col-sm-3 label-title" style="margin-top: -7px">Special Offer</label>
                                            <div class="col-sm-3">
                                                <p><input type="checkbox" name="special_offer_show_box" id="special_offer_checkbox"/></p>
                                                <input type="hidden" id="special_offer" name="special_offer" value="0">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Package Type<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="connection_type" class="form-control" value="shared bandwidth" id="shared_bandwidth"> <label for="shared_bandwidth">Shared Bandwidth</label>
                                                <input type="radio" name="connection_type" class="form-control" value="dedicated bandwidth" id="dedicated_bandwidth"> <label for="dedicated_bandwidth">Dedicated Bandwidth</label>
                                                <input type="radio" name="connection_type" class="form-control" value="combo bandwidth" id="combo_bandwidth"> <label for="combo_bandwidth">Combo Package</label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Public IP<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="public_ip" class="form-control" value="1" id="public_ip_yes"><label for="public_ip_yes">Yes</label>
                                                <input type="radio" name="public_ip" class="form-control" value="0" id="public_ip_no"><label for="public_ip_no">No</label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Internet Speed<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="internet_speed_kbps" id="internet_speed_kbps" placeholder="ex. 2 Mbps"></input>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">GGC/Youtube Cache<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="youtube_cache" class="form-control" value="yes" id="youtube_cache_yes"><label for="youtube_cache_yes">Yes</label>
                                                <input type="radio" name="youtube_cache" class="form-control" value="no" id="youtube_cache_no"><label for="youtube_cache_no">No</label>
                                            </div>
                                        </div>

                                        <div class="row form-group" style="display:none;" id="youtube_speed_block">
                                            <label class="col-sm-3 label-title">Youtube Speed</label>
                                             <div class="col-sm-9">
                                                 <input type="text" name="youtube_speed_kbps" id="youtube_speed_kbps" placeholder="ex. 2 Mbps"></input>
                                             </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">BDIX Connected<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="bdx_speed_connection" class="form-control" value="yes" id="bdix_speed_connected_yes"><label for="bdix_speed_connected_yes">Yes</label>
                                                <input type="radio" name="bdx_speed_connection" class="form-control" value="no" id="bdix_speed_connected_no"><label for="bdix_speed_connected_no">No</label>
                                            </div>
                                        </div>


                                        <div class="row form-group" style="display:none" id="bdix_speed_block">
                                            <label class="col-sm-3 label-title">BDIX Speed<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="bdix_speed_kbps" id="bdix_speed_kbps" placeholder="ex. 2 Mbps"></input>
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">FTP Link</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" name="ftp_link_checkbox" id="ftp_link_checkbox"/>
                                                <input type="text" id="ftp_link" name="ftp_link" placeholder="FTP Link" style="display:none">
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Live TV</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" name="live_tv_link" id="live_tv_link_checkbox"/>
                                                <input type="text" id="live_tv" name="live_tv" placeholder="Live TV" style="display:none">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Facebook Link</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="facebook_link" name="facebook_link" placeholder="Facebook Page">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Website Link</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="website" name="website" placeholder="Website">
                                            </div>
                                        </div>
                                        
                                        
                                       
                                        <div id="meta_html"></div>
                                        <?php if($category_id != 225){ ?>
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
                                        <?php } ?>
                                        </div><!-- section -->
                                            <?php if($category_id != 225){ ?>
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
                                            <?php } else { ?>
                                                <input type="hidden" id="show_in_estore" name="show_in_estore" value="1">
                                            <?php } ?>
                                        <div style="clear:both"></div>

                                    </div><!-- section -->

                                    <div class="checkbox section agreement">
                                        <div align="left" id="ad_status_business"></div>
                                        <button type="submit" id="ad_submit" class="btn btn-theme" style="width: 100%">Update Your Package</button>
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


<script type="text/javascript">
    $(document).ready(function() {

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

        if(window.File && window.FileList && window.FileReader) {
            $("#upload-image-one").on("change",function(e) {
                var files = e.target.files ,
                    filesLength = files.length ;

                for (var i = 0; i < filesLength ; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<img></img>",{
                            class : "imageThumb",
                            src : e.target.result,
                            title : file.name
                        }).insertAfter("#upload-image-one");
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        }
        else {
            alert("Your browser doesn't support to File API")
        }

        $('span.icon-jfi-trash').on('click',function(){
            var confirmation = confirm("Do you want to delete this image");
            if(confirmation) {
                data_property = $(this).attr('data-icon');
                file_name = data_property.replace('http://ad-dwit-a.s3.amazonaws.com/','');
                $('#delete_image_file').val($('#delete_image_file').val()+","+file_name);
                image_file_string = $('#image_file').val();
                $('#image_file').val(image_file_string.replace(',' + data_property,''));
                $(this).parent().remove();
            }
        });

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

</script>
<script language="javascript" type="text/javascript" src="<?php Yii::app()->getBaseUrl(true)?>/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        theme : "modern",
        mode: "exact",
        elements : "ad_description",
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

<script type="text/javascript">

    /*function showFeaturedAdsImage(){
        $('.image-container').html('<img src="<?=$baseUrl?>/images/featured/individual.jpg" alt="tinypic2" id="tinypic2" style="display:block;">');
    }
    function showPremiumAdsImage(){
        $('.image-container').html('<img src="<?=$baseUrl?>/images/featured/premium.png" alt="tinypic2" id="tinypic2" style="display:block;">');
    }
    function showTopAdsImage(){
        $('.image-container').html('<img src="<?=$baseUrl?>/images/featured/top.png" alt="tinypic2" id="tinypic2" style="display:block;">');
    }*/


    $(document).ready(function() {
        function recalculate() {
            var sum = 0;

            $(".payment_option input[type=checkbox]:checked").each(function() {
                sum += parseInt($(this).attr("rel"));
            });

            $(".price-container").html('<h3>Cost of this ad: Tk.' +sum+'</h3>');
        }

        $(".payment_option input[type=checkbox]").change(function() {
            recalculate();
        });
        <?php if($ad_details['show_in_store'] != 1){?>
        $('.cboxes_paid').change(function() {
            var image = $(this).siblings(".tinybox").find("img");
            if ($(this).prop('checked')) {
                $('#is_paid').val('1');
            }
            else {

                $('#is_paid').val('0');
            }
        });
        <?php } else {?>
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
        <?php } ?>


    });



</script>

<script type="text/javascript">

    $('input[id="special_offer_checkbox"]').on('change',function(){
        if($(this).is(':checked')){
            $('#ifRange').hide('slow');
            $('#ifYes').show('slow');
            $("#discount").select();
        } else {
            $('#ifYes').hide('slow');
        }
    });

    function yesnoCheck() {
        if (document.getElementById('fixed').checked) {
            document.getElementById('ifYes').style.display = 'block';
            document.getElementById('ifRange').style.display = 'none';
        }
        else {
            document.getElementById('ifYes').style.display = 'none';
            if(document.getElementById('range').checked){
                document.getElementById('ifRange').style.display = 'block';
            }
            else {
                document.getElementById('ifYes').style.display = 'none';
            }
        }


    }

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })

</script>


