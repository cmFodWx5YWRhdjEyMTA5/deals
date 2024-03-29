<?php
$baseUrl = Yii::app()->request->baseUrl;
$ad_id = urldecode(base64_decode(Yii::app()->request->getParam('ad_id')));
$ad_details = Generic::getAddDetailsFromAddTable($ad_id);
$ad_details_all = Generic::getAddDetailsFromAddMetaTable($ad_details['id']);
$ad_id = urldecode(base64_decode(Yii::app()->request->getParam('ad_id')));
$selected_category_id = $ad_details['category_id'];
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$category_name = Yii::app()->db->createCommand( "SELECT category_id,category_name FROM tbl_category  WHERE parent_id <> 0")->queryAll();

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

?>

<!-- main -->
<section id="main" class="clearfix ad-details-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li>Update Ad</li>
            </ol><!-- breadcrumb -->

        </div><!-- banner -->

        <div class="adpost-details">
            <div class="row">
                <div class="col-md-8">

                    <?php
                    $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'update-form',
                        'enableAjaxValidation'=>false,
                        'action'=>'javascript:void(0)',
                        'enableClientValidation'=>false,

                    ));
                    ?>
                    <fieldset>
                        <div class="section postdetails">
                            <h4>Sale an item or service <span class="pull-right">* Mandatory Fields</span></h4>
                            <div id="error_ad_post"></div>
                            <div class="row form-group add-title" id='title'>
                                <label class="col-sm-3 label-title">Title for your Ad<span class="required">*</span></label>
                                <div class="col-sm-9" >
                                    <input type="text" name="ads_title" id="ad_title" value="<?=$ad_details['title']?>" class="form-control"  data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your ad title here. Example: Sony xperia dual sim brand new">
                                    <input type="hidden" name="ad_id" value="<?=$ad_details['id']?>" id="ad_id" >

                                </div>
                                <div id="message"></div>
                            </div>
                            <div class="row form-group add-title" id='category_business'>
                                <label class="col-sm-3 label-title">Select Category<span class="required">*</span></label>
                                <div class="col-sm-9" >
                                   
                                    <select class="form-control"  id="category_id" name="category_id">
                                        <option  value="Select Category">Select Category</option>
                                        <?php
                                        foreach($category_name as $category){
                                            $category_name = $category['category_name'];
                                            $category_id = $category['category_id'];
                                            ?>
                                            <option  value="<?=$category_id?>" <?php if($selected_category_id == $category_id) { echo "selected"; } ?>><?=$category_name?></option>
                                        <?php }?>
                                    </select>
                                    
                                </div>
                                <div id="message"></div>
                            </div>
                            <div class="row form-group add-image">
                                <label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
                                <div class="col-sm-9">
                                    <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload.<span>You can add multiple images (Maximum Five).</span></h5>
                                    <div class="upload-section">
                                        <input type="file" name="files[]" id="filer_input2" multiple="multiple">
                                        <input type="hidden" name="image_file" value="<?php echo $image_file ?>" id="image_file" >
                                        <input type="hidden" name="delete_image_file" id="delete_image_file" />
                                        <ul class="image_block">
                                        <?php
                                            foreach ($images as $image) {
                                                ?>
                                                <li>
                                                    <img src="<?php echo $image
                                                    ; ?>" />
                                                    <span class="icon-jfi-trash" data-icon="<?php echo $image ?>">
                                                    </span>
                                                </li>
                                        <?php
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group item-description" id="description">
                                <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="ads_description" id="ad_description" placeholder="Write few lines about your ad" rows="8" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type few lines about your ad here. It's important to highlight your ad."><?=$ad_details['description']?></textarea>
                                </div>
                            </div>
                            <div class="row form-group select-condition">
                                <label class="col-sm-3">Condition<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <?php if($ad_details['ad_condition'] == 1) {?>
                                        <input type="radio" name="ads_condition" value="1" id="new" class="ad_condition" checked>
                                    <label for="new">New</label>
                                    <input type="radio" name="ads_condition" value="0" id="used" class="ad_condition">
                                    <label for="used">Used</label>
                                    <?php } else {?>
                                    <input type="radio" name="ads_condition" value="1" id="new" class="ad_condition">
                                    <label for="new">New</label>
                                    <input type="radio" name="ads_condition" value="0" id="used" class="ad_condition" checked>
                                    <label for="used">Used</label>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row form-group select-price">
                                <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <?php
                                    $fixed = "";
                                    $negotiable = "";
                                    $range = "";
                                    $display_fixed = "none";
                                    $display_range = "none";
                                    if($ad_details['price_type'] == 1){
                                        $fixed = "checked";
                                        $display_fixed = "block";
                                    } elseif($ad_details['price_type'] == 0){
                                        $negotiable = "checked";
                                    } elseif($ad_details['price_type'] == 2) {
                                        $range = "checked";
                                        $display_range = "block";
                                    } ?>
                                    <input type="radio" onclick="javascript:yesnoCheck();" name="price_type" value="1" id="fixed" <?=$fixed?>>
                                    <label for="fixed">Fixed </label>
                                    <input type="radio" onclick="javascript:yesnoCheck();" name="price_type" value="0" id="negotiable" <?=$negotiable?>>
                                    <label for="negotiable">Negotiable </label>
                                    <input type="radio" onclick="javascript:yesnoCheck();" name="price_type" value="2" id="range" <?=$range?>>
                                    <label for="range">Range </label><br><br>
                                    <h5 class="col-sm-2" style="margin-top: 10px;">BDT</h5>
                                    <input type="text" id="ad_price" name="ads_price" class="form-control col-sm-4" value="<?=$ad_details['price']?>" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your ad price here. Estimate your price for what you're offering. Example: 100">
                                    <div id="ifYes" style="display:<?=$display_fixed?>;margin-left: -14px;">
                                        <input type='text' class="number_input form-control" id='discount' name='discount' value="<?php if(isset($ad_details['discount'])){echo round($ad_details['discount']);}?>" placeholder="Set discount offer" data-container="body" data-toggle="popover" data-trigger="focus" data-content="How much % you want to offer? Just type the number. Example: 20" style="width: 33%">
                                    </div>
                                    <div id="ifRange" style="display:<?=$display_range?>;margin-left: -14px;">
                                        <input type="text" id="ad_price_end" name="ads_price_end" class="form-control col-sm-4" id="text1" value="<?=$ad_details['price_end']?>" placeholder="Type higher limit" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type higher limit of your ad price here. Applicable only for range of price. Example: 100">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group show-price">
                                <label class="col-sm-3 label-title">Show Price</label>
                                <div class="col-sm-3">
                                    <p><input type="checkbox" name="price_show_box" <?php if($ad_details['show_price']) { echo 'checked="checked"'; } ?> /></p>
                                </div>
                                <label class="col-sm-3 label-title" style="margin-top: -7px"><img src="<?=$baseUrl?>/images/home1/pohela-boishakh.png"></label>
                                <div class="col-sm-3">
                                    <p><input type="checkbox" name="special_offer_show_box" id="special_offer_checkbox" <?php if($ad_details['special_offer'] == 1) { echo 'checked="checked"'; } ?>/></p>
                                    <input type="hidden" id="special_offer" name="special_offer" value="<?=$ad_details['special_offer']?>">
                                </div>
                            </div>

                            <?php
                            $counter = 1;
                            foreach ($ad_details_all as $column) {

                                ?>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title"><?php echo ucwords(str_replace("_"," ",$column['field_name']))?><?php if(array_key_exists('required',$column)) { ?><span class="required">*</span><?php } ?></label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="hidden" name="custom_field_<?php echo $counter; ?>" value="<?php echo str_replace(" ","_",strtolower($column['field_name'])) ?>" />
                                            <input type="text" name="<?php echo str_replace(" ","_",strtolower($column['field_name'])) ?>" class="form-control" id="<?php echo str_replace(" ","_",strtolower($column['field_name'])) ?>" value="<?php echo $column['field_value'] ?>" <?php if(array_key_exists('required',$column)) { ?> required="required" <?php } ?>>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $counter++;
                            }
                            ?>
                            <input type="hidden" id="show_price_option" name="show_price_option" value="<?php echo $ad_details['show_price'] ?>">
                            <input type="hidden" name="custom_column_number" value="<?php echo $custom_column_number; ?>" />
                        </div><!-- section -->

                        <div class="section seller-info">
                            <h4>Saler Information</h4>
                            <div class="row form-group">
                                <div class="col-sm-9">
                                    <span><?=$user_name?> </span><br>
                                    <span>Address : <?=$address?></span><br>
                                    <span>Phone Number : <?=$phone_number?></span><br>
                                    <span>Email : <?=$email?></span><br>

                                </div>
                            </div>

                        </div><!-- section -->

                        <!-- <div class="section payment_option">
                            <h4>Make your Ad Premium </h4>
                            <div class="row form-group col-sm-7">
                                <?php if ($ad_details['show_in_store'] != 1){?>
                                <div class="row col-sm-12">
                                    <label class="col-sm-3 label-title">Paid:</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <?php if($ad_details['is_paid'] == 1){?>
                                            <input class="cboxes_paid switch-input" rel="<?=$featured_price?>"  id="cbox2" type="checkbox" name="paid" checked />
                                                <input type="hidden" id="is_paid" name="is_paid" value="1">
                                            <?php } else {?>
                                                <input class="cboxes_paid switch-input" rel="<?=$featured_price?>"  id="cbox2" type="checkbox" name="paid" />
                                                <input type="hidden" id="is_paid" name="is_paid" value="">
                                            <?php } ?>
                                            <span class="switch-label" onmouseover="showFeaturedAdsImage()" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <div class="tinybox" style="">
                                                <img src="<?=$baseUrl?>/images/featured/featured.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <?php } else {
                                    $checked = 'checked';
                                    $value = 1;
                                    ?>
                                <div class="row col-sm-12">
                                    <label class="col-sm-3 label-title">Featured:</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input class="cboxes_featured switch-input" rel="<?=$featured_price?>"  id="cbox2" type="checkbox" name="ad_premium" <?php if($ad_details['is_featured'] == 1){ echo $checked;}?>/>
                                            <input type="hidden" id="is_featured" name="is_featured" value="<?php if($ad_details['is_featured'] == 1){ echo $value;}?>">

                                            <span class="switch-label" onmouseover="showFeaturedAdsImage()" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <div class="tinybox" style="">
                                                <img src="<?=$baseUrl?>/images/featured/featured.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="row col-sm-12">
                                    <label class="col-sm-3 label-title">Premium:</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input class="cboxes_premium switch-input" rel="<?=$premium_price?>" type="checkbox" name="ad_premium" <?php if($ad_details['is_premium'] == 1){ echo $checked;}?>/>
                                            <input type="hidden" id="is_premium" name="is_premium" value="<?php if($ad_details['is_premium'] == 1){ echo $value;}?>">
                                            <span class="switch-label" onmouseover="showPremiumAdsImage()" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <div class="tinybox" style="">
                                                <img src="<?=$baseUrl?>/images/featured/premium.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="row col-sm-12">
                                    <label class="col-sm-3 label-title">Top:</label>
                                    <div class="col-sm-9">
                                        <label class="switch">
                                            <input class="cboxes_top switch-input" rel="<?=$top_price?>" type="checkbox" name="ad_premium" <?php if($ad_details['is_top'] == 1){ echo $checked;}?>/>
                                            <input type="hidden" id="is_top" name="is_top" value="<?php if($ad_details['is_top'] == 1){ echo $value;}?>">
                                            <span class="switch-label" onmouseover="showTopAdsImage()"  data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <div class="tinybox" style="">
                                                <img src="<?=$baseUrl?>/images/featured/top.png" alt="tinypic2" id="tinypic2" style="display:none;">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="image-container col-sm-5"></div>
                            <div style="clear:both"></div>

                        </div> --><!-- section -->

                        <div class="checkbox section agreement">
                         <!--   <label for="send">
                                <input type="checkbox" name="send" id="send">
                                Send me bdbroadbanddeals.com Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
                            </label>-->
                           <!-- <br clear="all"><br clear="all">-->
                            <div align="left" id="ad_status"></div>
                         <!--   <br clear="all"><br clear="all">-->
                            <button type="submit" id="ad_submit" class="btn btn-theme" style="width: 100%">Update Your Ad</button>
                        </div><!-- section -->

                    </fieldset>
                    <?php $this->endWidget();?>
                    <!-- form -->
                </div>


                <!-- quick-rules -->
                <div class="col-md-4">
                    <div class="section quick-rules">
                        <h4>Quick rules</h4>
                        <p class="lead">Posting an ad on <a href="#">bdbroadbanddeals.com</a> is free! However, all ads must follow our rules:</p>

                        <ul>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                            <li>Do not put your email or phone numbers in the title or description.</li>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                        </ul>
                    </div>
                </div><!-- quick-rules -->
            </div><!-- photos-ad -->
        </div>
    </div><!-- container -->
</section><!-- main -->


<style>
    .info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}
    .jFiler {
        font-family: inherit;
    }
    input[type="file"] {

        display:block;
    }
    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
        display: inline;
    }

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


