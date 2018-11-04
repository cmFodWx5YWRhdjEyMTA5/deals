<?php
$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$all_category_list = Generic::getAllCategoryData();
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$enter_prise_name = isset($profile_data['enterprise_name']) ? $profile_data['enterprise_name'] : '';
$url_alias = str_replace(" ","_",strtolower($enter_prise_name));
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';
$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
$company_logo = $store_details->logo;

$banner_images = $sub_bannner_images = [];
$banner_image_file = '';
if(!empty($store_details->banner)){
    $banner_images = json_decode($store_details->banner);
    $banner_image_file = ','.implode(',',$banner_images);
    if(empty($banner_images)){
        $banner_image_file = trim($banner_image_file,',');
    }
}

$sub_banner_image_file = '';
if(!empty($store_details->sub_banner)) {
    $sub_bannner_images = json_decode($store_details->sub_banner);
    $sub_banner_image_file = ','.implode(',',$sub_bannner_images);
    if(empty($sub_bannner_images)){
        $sub_banner_image_file = trim($sub_banner_image_file, ',');
    } 
}

$facebook_link = $store_details->facebook_link;
$twitter_link = $store_details->twitter_link;
$linked_link = $store_details->linkedin_link;
$google_plus_link = $store_details->google_plus_link;


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

<?php
echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
?>

<div id="tabs-dashboard-01" class="uzr-panels">
    <header>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php
                //$this->renderPartial("/elements/notification",array('register_type' => $register_type));
                ?>
            </div>
        </div>

    </header>
    <div class="inner">
        <div id="tab009" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab007">
                <span><i class="adicon-settings"></i></span>
                Update Your ISP Details
            </a>

            <div class="row estore_configuration">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <div class="icon-heading">
                            <h4><i class="adicon-create tc4"></i>Update Your ISP Details</h4>
                        </div>
                    </div>
                </div>

                <div class="inner">
                    <div class="basic-card">
                        <header>
                            <h5>Store Details</h5>
                        </header>
                        <div class="inner" style="border: 1px solid green; border-radius: 10px">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <form action="javascript:void(0);" id="estore-update" method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <input type="hidden" name="service_plan" id="service_plan">
                                        <input type="hidden" name="additional_service" id="additional_service">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" id="company_name" name="company_name" value="<?=$enter_prise_name?>" readonly class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Company Slogan</label>
                                            <input type="text" id="slogan" name="slogan" class="form-control" value="<?=$store_details->slogan?>" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company slogan here. Example: Your ads our services">
                                        </div>

                                        <!-- Categories input here -->
                                        <input type="hidden" name="category" value="226" id="category" >
                                        <!-- Categories input here -->
                                        <div class="form-group">
                                            <label>Company Logo (Preferred size: 220x55 px)</label>
                                            <input type="file" name="files" id="filer_input9">
                                            <input type="hidden" name="logo_image" value="<?php echo $company_logo ?>" id="logo_image" >
                                            <input type="hidden" name="delete_image_file1" id="delete_image_file1" />
                                            <ul class="image_block">
                                                <?php
                                                    ?>
                                                    <li>
                                                        <img src="<?php echo $company_logo; ?>" />
                                                    <span class="icon-jfi-trash logo_icon" data-icon="<?php echo $company_logo ?>">
                                                    </span>
                                                    </li>
                                            </ul>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Banner Slider (Upload Three Image)<p>(Preferred size: 850x430 px)</p></label>
                                            <input type="file" name="files[]" id="filer_input10" multiple="multiple">
                                            <input type="hidden" name="banner_image" value="<?php echo $banner_image_file ?>" id="banner_image" >
                                            <input type="hidden" name="delete_image_file2" id="delete_image_file2" />
                                            <ul class="image_block">
                                                <?php
                                                foreach ($banner_images as $image) {
                                                        if($image != '') {
                                                    ?>
                                                    <li>
                                                        <img src="<?php echo $image
                                                        ; ?>" />
                                                    <span class="icon-jfi-trash banner_icon" data-icon="<?php echo $image ?>">
                                                    </span>
                                                    </li>
                                                    <?php
                                                        }
                                                }
                                                ?>
                                            </ul>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Sub Banner (Upload Two Image)<p>(Preferred size: 370x190 px)</p></label>
                                            <input type="file" name="files[]" id="filer_input11" multiple="multiple">
                                            <input type="hidden" name="sub_banner" value="<?php echo $sub_banner_image_file ?>" id="sub_banner_image" >
                                            <input type="hidden" name="delete_image_file3" id="delete_image_file3" />
                                            <ul class="image_block">
                                                <?php
                                                foreach ($sub_bannner_images as $image) {
                                                        if($image != '') {
                                                    ?>
                                                    <li>
                                                        <img src="<?php echo $image
                                                        ; ?>" />
                                                    <span class="icon-jfi-trash sub_banner_icon" data-icon="<?php echo $image ?>">
                                                    </span>
                                                    </li>
                                                    <?php
                                                        }
                                                }
                                                ?>
                                            </ul>
                                            <div style="clear: both;"></div>
                                        </div>


                                        <div class="form-group">
                                            <label>About Us</label>

                                            <textarea rows="20" cols="40" id="about_us" name="about_us" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Write some description about your company / business."><?=$store_details->about_us?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Us</label>
                                            <textarea rows="20" cols="40" id="contact_us" name="contact_us" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company / business contact information here."><?=$store_details->contact_us?></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Facebook Link</label>
                                            <input type="text" id="facebook_link" name="facebook_link" value="<?=$facebook_link?>"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Link</label>
                                            <input type="text" id="twitter_link" name="twitter_link" value="<?=$twitter_link?>"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>LinkedIn Link</label>
                                            <input type="text" id="linkedin_link" name="linkedin_link" value="<?=$linked_link?>"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Google Plus Link</label>
                                            <input type="text" id="google_plus_link" name="google_plus_link" value="<?=$google_plus_link?>"  class="form-control" >
                                        </div>
                                        <div align="left" id="update_name_status"></div>
                                        <button type="submit" id="estore_update_submit"  class="btn btn-small btn-green">Update</button>

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
    function baseUrl(){
        var href=window.location.href.split('/');return href[0]+'//'+href[2]+'/';
    }
    var SITE_URL=baseUrl();

    $(document).ready(function() {

        $('#estore-update').on('submit',function(e){
            files_to_delete=$('#delete_image_file1').val();
            $.ajax({
                type:'POST',
                url:SITE_URL+"site/DeleteMultiImageFromS3",
                cache:false,
                data:{file:files_to_delete}});

            files_to_delete=$('#delete_image_file2').val();
            $.ajax({
                type:'POST',
                url:SITE_URL+"site/DeleteMultiImageFromS3",
                cache:false,
                data:{file:files_to_delete}});

            files_to_delete=$('#delete_image_file3').val();
            $.ajax({
                type:'POST',
                url:SITE_URL+"site/DeleteMultiImageFromS3",
                cache:false,
                data:{file:files_to_delete}});

            updateEstore();
        });

        function updateEstore(){
            var data=$('#estore-update').serialize();
            $.ajax({
                type:'POST',
                url:SITE_URL+"Isp/UpdateEstore",
                data:data,
                cache:false,
                dataType:"json",
                beforeSend:function(){
                    $("#update_name_status").fadeOut();$("#estore_update_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');
                },
                success:function(response){
                    if(response.status=="success"){
                        $("#estore_update_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');
                        function redirect(){
                            var url=SITE_URL+'my-profile/dashboard';window.open(url,"_self");
                        }
                        window.setTimeout(redirect,4000);
                    } else if(response.status=="false"){
                        $("#error_personal").fadeIn(1000,function(){
                            $("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');
                        });
                    }
                }
            });
        }


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

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })

    $('span.icon-jfi-trash.logo_icon').on('click',function(){
        var confirmation = confirm("Do you want to delete this image");
        if(confirmation) {
            data_property = $(this).attr('data-icon');
            file_name = data_property.replace('http://ad-dwit-a.s3.amazonaws.com/','');
            $('#delete_image_file1').val($('#delete_image_file1').val()+","+file_name);
            image_file_string = $('#logo_image').val();
            $('#logo_image').val(image_file_string.replace(data_property,''));
            $(this).parent().remove();
        }
    });

    $('span.icon-jfi-trash.banner_icon').on('click',function(){
        var confirmation = confirm("Do you want to delete this image");
        if(confirmation) {
            data_property = $(this).attr('data-icon');
            file_name = data_property.replace('http://ad-dwit-a.s3.amazonaws.com/','');
            $('#delete_image_file2').val($('#delete_image_file2').val()+","+file_name);
            image_file_string = $('#banner_image').val();
            $('#banner_image').val(image_file_string.replace(',' + data_property,''));
            $(this).parent().remove();
        }
    });

    $('span.icon-jfi-trash.sub_banner_icon').on('click',function(){
        var confirmation = confirm("Do you want to delete this image");
        if(confirmation) {
            data_property = $(this).attr('data-icon');
            file_name = data_property.replace('http://ad-dwit-a.s3.amazonaws.com/','');
            $('#delete_image_file3').val($('#delete_image_file3').val()+","+file_name);
            image_file_string = $('#sub_banner_image').val();
            $('#sub_banner_image').val(image_file_string.replace(',' + data_property,''));
            $(this).parent().remove();
        }
    });

</script>



