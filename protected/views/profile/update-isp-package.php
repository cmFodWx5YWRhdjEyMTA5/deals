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
foreach($individual_category_id as $id){
    $category_name[] = Category::model()->findByPk($id);
}


echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
$images = json_decode($ad_details['image_url']);
$image_file = ','.implode(',',$images);

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
                                    'id'=>'update-form-business',
                                    'enableAjaxValidation'=>false,
                                    'action'=>'javascript:void(0);',
                                    'enableClientValidation'=>false,

                                ));
                                ?>
                                <fieldset>
                                    <div class="section postdetails">
                                        <h4>Sell an Item or Service <span class="pull-right">* Mandatory Fields</span></h4>

                                        <div id="error_ad_post"></div>
                                        <div class="row form-group add-title" id='title' title="Keep it short but catchy and no pirce or phone number, Example: iPhone 6 Plus 64GB Black Unlocked">
                                            <label class="col-sm-3 label-title">Title for your <?php if($category_id == 225) { echo "package"; } else { echo "ad"; } ?><span class="required">*</span></label>
                                            <div class="col-sm-9" >
                                                <input type="text" name="ads_title" id="ad_title_business" class="form-control"  placeholder="ex, Sony Xperia dual sim 100% brand new " value="<?php echo $ad_details->title ?>">
                                            </div>
                                            <div id="message"></div>
                                        </div>
                                        <div class="row form-group add-image">
                                            <label class="col-sm-3 label-title">Photos for your <?php if($category_id == 225) { echo "package"; } else { echo "ad"; } ?> <span>(This will be your cover photo )</span> </label>
                                            <div class="col-sm-9">
                                                <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload.<span>You can add multiple images (Maximum Five).<p>(Preferred size: 900x900 px)</p></span></h5>
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
                                        <div class="row form-group item-description" id="description" title="Keep it friendly, but have your buyers in mind, i.e. what they're looking for and what questions they may have, when writing your description. It's also important to highlight the benefits of whatever you're offering.">
                                            <label class="col-sm-3 label-title"><?php if($category_id == 225) { echo "package"; } ?> Description<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="ads_description" id="ad_description_business" placeholder="Write few lines about your products" rows="8"><?php echo $ad_details->description; ?></textarea>
                                            </div>
                                        </div>
                                       
                                        <div class="row form-group select-price"  title="Don't know what price to put? Balance out how much you want for what you're offering with how much you think users are willing to pay.">
                                            <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <span>BDT</span>
                                                <input type="text" id="ad_price_business" name="ads_price" class="form-control" value="<?php echo $ad_details->price ?>" >
                                                <div id="ifYes" style="display:none;position: relative;float: right;left: -75px">
                                                    <input type='text' class="number_input form-control" id='discount' name='discount' value="<?php echo $ad_details->discount ?>" placeholder="Set discount (Optional)" data-container="body" data-toggle="popover" data-trigger="focus" data-content="How much % you want to offer? Just type the number. Example: 20">
                                                </div>
                                                <br>
                                                <br>
                                                <input type="radio" name="price_type" value="1" id="fixed" <?php if(!$ad_details->price_type) { echo "checked"; } ?>>
                                                <label for="fixed">Fixed </label>
                                                <input type="radio" name="price_type" value="0" id="negotiable" <?php if($ad_details->price_type) { echo "checked"; } ?>>
                                                <label for="negotiable">Negotiable </label>
                                            </div>
                                        </div>
                                        <div class="row form-group show-price">
                                            <label class="col-sm-3 label-title">Show Price</label>
                                            <div class="col-sm-3">
                                                <p><input type="checkbox" name="price_show_box" <?php if($ad_details->show_price) { echo "checked"; } ?> /></p>
                                            </div>
                                            <label class="col-sm-3 label-title" style="margin-top: -7px">Special Offer</label>
                                            <div class="col-sm-3">
                                                <p><input type="checkbox" name="special_offer_show_box" id="special_offer_checkbox" /></p>
                                                <input type="hidden" id="special_offer" name="special_offer" value="0">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Package Type<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="connection_type" class="form-control" value="shared bandwidth" id="shared_bandwidth" <?php if($ad_details->package_type == 'shared bandwidth'){ echo 'checked';} ?>> <label for="shared_bandwidth">Shared Bandwidth</label>
                                                <input type="radio" name="connection_type" class="form-control" value="dedicated bandwidth" id="dedicated_bandwidth" <?php if($ad_details->package_type == 'dedicated bandwidth'){ echo 'checked';} ?>> <label for="dedicated_bandwidth">Dedicated Bandwidth</label>
                                                <input type="radio" name="connection_type" class="form-control" value="combo bandwidth" id="combo_bandwidth" <?php if($ad_details->package_type == 'combo bandwidth'){ echo 'checked';} ?>> <label for="combo_bandwidth">Combo Package</label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Public IP<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="public_ip" class="form-control" value="1" id="public_ip_yes" <?php if($ad_details->public_ip == '1'){ echo 'checked';} ?>><label for="public_ip_yes">Yes</label>
                                                <input type="radio" name="public_ip" class="form-control" value="0" id="public_ip_no" <?php if(!$ad_details->public_ip){ echo 'checked';} ?>><label for="public_ip_no">No</label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Internet Speed<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="internet_speed_kbps" id="internet_speed_kbps" placeholder="ex. 2 Mbps" value="<?php echo $ad_details->internet_speed; ?>"></input>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">GGC/Youtube Cache<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="youtube_cache" class="form-control" value="yes" id="youtube_cache_yes" <?php if($ad_details->youtube_speed != ""){ echo "checked";} ?>><label for="youtube_cache_yes">Yes</label>
                                                <input type="radio" name="youtube_cache" class="form-control" value="no" id="youtube_cache_no" <?php if(empty($ad_details->youtube_speed)){ echo "checked";} ?>><label for="youtube_cache_no">No</label>
                                            </div>
                                        </div>

                                        <div class="row form-group" style="<?php if($ad_details->youtube_speed != "") { echo "display: block"; } else { echo "display: none"; } ?>" id="youtube_speed_block">
                                            <label class="col-sm-3 label-title">Youtube Speed</label>
                                             <div class="col-sm-9">
                                                 <input type="text" name="youtube_speed_kbps" id="youtube_speed_kbps" placeholder="ex. 2 Mbps" value="<?php echo $ad_details->youtube_speed; ?>"></input>
                                             </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">BDIX Connected<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="bdx_speed_connection" class="form-control" value="yes" id="bdix_speed_connected_yes" <?php if($ad_details->bdix_speed != ""){ echo "checked";} ?>><label for="bdix_speed_connected_yes">Yes</label>
                                                <input type="radio" name="bdx_speed_connection" class="form-control" value="no" id="bdix_speed_connected_no" <?php if(empty($ad_details->bdix_speed)){ echo "checked";} ?>><label for="bdix_speed_connected_no">No</label>
                                            </div>
                                        </div>


                                        <div class="row form-group" style="<?php if($ad_details->bdix_speed != "") { echo "display: block"; } else { echo "display: none"; } ?>" id="bdix_speed_block">
                                            <label class="col-sm-3 label-title">BDIX Speed<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="bdix_speed_kbps" id="bdix_speed_kbps" placeholder="ex. 2 Mbps" value="<?php echo $ad_details->bdix_speed; ?>"></input>
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">FTP Link</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" name="ftp_link_checkbox" id="ftp_link_checkbox" <?php if(!empty($ad_details->ftp_link)){ echo "checked";} ?>></input>
                                                <input type="text" id="ftp_link" name="ftp_link" placeholder="FTP Link" style="<?php if($ad_details->ftp_link != "") { echo "display: block"; } else { echo "display: none"; } ?>" value="<?php echo $ad_details->ftp_link; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Live TV</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" name="live_tv_link" id="live_tv_link_checkbox" <?php if(!empty($ad_details->live_tv)){ echo "checked";} ?>></input>
                                                <input type="text" id="live_tv" name="live_tv" placeholder="Live TV" style="<?php if($ad_details->live_tv != "") { echo "display: block"; } else { echo "display: none"; } ?>" value="<?php echo $ad_details->live_tv; ?>">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Facebook Link</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="facebook_link" name="facebook_link" placeholder="Facebook Page" value="<?php if(!empty($ad_details->facebook_link)){ echo $ad_details->facebook_link;} ?>">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-3 label-title">Website Link</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="website" name="website" placeholder="Website" value="<?php if(!empty($ad_details->website_link)){ echo $ad_details->website_link;} ?>">
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
                                    <input type="hidden" name="isp_package_id" value="<?php echo $ad_details->id; ?>">
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
</div>
</div>
</div>
</div>

<style>
    .info { border: 1px solid #999; padding:0px 60px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;}

    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
        display: inline;
    }

    .image_block li img{
        max-height: 150px;
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

<script>

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
</script>