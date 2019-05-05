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


$ad_type = 'ads';
$user_id = $profile_data['id'];
$ads = Generic::getAdDetailsFromAddTable($user_id);
$opt = array(
    'w' =>'320',
    'h' =>'240',
    'g'=>'center',
    'r' => '0'
);

$info_array = array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
);
if(isset($service)){
    $info_array['service'] = $service;
    $info_array['service_plan'] = $service_plan;
}

?>

<?php
echo $this->renderPartial($sidebar_type,$info_array);
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
            <div class="clr"></div>


            <div class="row estore_configuration">

                <div class="inner">

                    <div class="basic-card">
                        <header style="border-bottom: #fff">
                            <h4><i class="adicon-create tc4"></i> Website Management</h4>
                        </header>
                        <div class="inner border">
                            <div class="row business-information">
                                <div class="col-xs-12 col-md-12">
                                    <div class="info"><?php echo $message ?></div>
                                    <form action="" id="website-link-edit-form" method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <div class="form-group">
                                            <label>Banner</label>
                                            <br>
                                            <img src="<?php echo ImageHelper::cloudinary($banner_details->banner_image,$banner_size_option)  ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Banner Url</label>
                                            <br>
                                            <input type="text" id="banner_url" class="form-control" name="banner_url" value="<?=$banner_details->banner_url?>" readonly>
                                            <a class="btn edit_banner_link" href="javascript:void(0)">Edit Link</a>
                                            <br>
                                            <button type="submit" id="banner_link_submit" style="display: none;" class="btn btn-small btn-green">Update</button>
                                        </div>

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

    .planContainer .button input {
        text-transform: uppercase;
        text-decoration: none;
        color: #3e4f6a;
        font-weight: 700;
        letter-spacing: 3px;
        line-height: 2.8em;
        border: 2px solid #3e4f6a;
        display: inline-block;
        width: 80%;
        height: 2.8em;
        border-radius: 4px;
        margin: 1.5em 0 1.8em;
        background: #fff;
    }

    .planContainer .button input:hover {
        background: #3e4f6a;
        color: #fff;
    }

    .price_list{
        text-align: left;
        padding-left: 68px;
    }


</style>

<script>
    $('.edit_banner_link').on('click', function () {
        $('#banner_url').removeAttr('readonly');
        $(this).hide();
        $('#banner_link_submit').show();
    });
</script>




