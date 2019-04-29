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
                            <h4><i class="adicon-create tc4"></i> Landing Page Management</h4>
                        </header>
                        <div class="inner border">
                            <div class="row business-information">
                                <div class="col-xs-12 col-md-12">
                                    <form action="<?=$baseUrl?>/profile/SaveLandingPage" id="payment-form-section" method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <div class="form-group">
                                            <label>Company/Enterprise Name :</label>
                                            <label style="color: green"><?=$enter_prise_name?></label>
                                            <input type="hidden" id="company_name" name="company_name" value="<?=$enter_prise_name?>" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label>Company/Enterprise Logo (Upload logo or visiting card)(Preferred size: 220x55 px)</label>
                                            <input type="file" name="files" id="filer_input9">
                                            <input type="hidden" name="logo_image" value="" id="logo_image" >
                                        </div>

<!--                                        About us Section-->
                                        <div class="form-group">
                                            <label for="show_about_us">Show About Us</label>
                                            <input type="checkbox" name="show_about_us" id="show_about_us" />
                                        </div>
                                        <fieldset id="about_us_block" style="display: none">
                                            <div class="form-group">
                                                <label for="about_us">About us</label><br>
                                                <textarea rows="20" cols="40" id="about_us" name="contact_us" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type about your servie here."></textarea>
                                            </div>
                                            <div>
                                                <label>About us Images (Upload Two Images)<span>(Preferred size: 850x430 px)</span></label>
                                                <input type="file" name="files[]" id="filer_input60" multiple="multiple">
                                                <input type="hidden" name="about_us_image" value="" id="about_us_image" >
                                            </div>
                                        </fieldset>

<!--                                        Latest News Section-->
                                        <div class="form-group">
                                            <label for="show_latest_news">Show Latest News</label>
                                            <input type="checkbox" name="show_latest_news" id="show_latest_news" />
                                        </div>
                                        <fieldset id="latest_news_block" style="display: none">
                                            <div class="form-group">
                                                <label for="show_latest_news">Latest News Section</label>

                                            </div>
                                        </fieldset>

<!--                                        Program List Section-->
                                        <div class="form-group">
                                            <label for="show_program_list">Show Program List</label>
                                            <input type="checkbox" name="show_program_list" id="show_program_list" />
                                        </div>
                                        <fieldset id="program_list_block" style="display: none">
                                            <div class="form-group">
                                                <label for="program_list">Program List Section Description</label>
                                                <textarea rows="20" cols="40" id="program_list" name="program_list" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company / business contact information here."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="program_list_section">Program List Section</label>
                                            </div>
                                        </fieldset>

<!--                                        Our Story Section-->
                                        <div class="form-group">
                                            <label for="show_our_story">Show Our Story</label>
                                            <input type="checkbox" name="show_our_story" id="show_our_story" />
                                        </div>
                                        <fieldset id="our_story_block" style="display: none">
                                            <div class="form-group">
                                                <label for="show_latest_news">Our Story Section</label>

                                            </div>
                                        </fieldset>

<!--                                        Team member section-->
                                        <div class="form-group">
                                            <label for="show_team_member">Show Team Member</label>
                                            <input type="checkbox" name="show_team_member" id="show_team_member" />
                                        </div>
                                        <fieldset id="team_member_block" style="display: none">
                                            <div class="form-group">
                                                <label for="team_member_description">Team Member Description</label>
                                                <textarea rows="20" cols="40" id="team_member_description" name="team_member_description" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type your company / business contact information here."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="team_member_section">Team Member Section</label>

                                            </div>
                                        </fieldset>

<!--                                        gallery section-->
                                        <div class="form-group">
                                            <label for="show_gallery">Show Gallery</label>
                                            <input type="checkbox" name="show_gallery" id="show_gallery" />
                                        </div>
                                        <fieldset id="gallery_block" style="display: none;">
                                            <div class="form-group">
                                                <label for="team_member_section">Gallery Section</label>
                                            </div>
                                        </fieldset>

                                        <div class="form-group">
                                            <label for="contact_number1">Contact Number 1</label>
                                            <input type="text" class="" name="contact_number1" id="contact_number1" value="<?php ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_number2">Contact Number 2</label>
                                            <input type="text" class="" name="contact_number2" id="contact_number2" value="<?php ?>">
                                        </div><br>
                                        <button type="submit" id="estore_submit"  class="btn btn-small btn-green">Submit Now</button>

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
    $(document).ready(function(){

        $('#show_about_us').on('click',function(){
            $('#about_us_block').toggle('slow');
        });

        $('#show_latest_news').on('click',function(){
            $('#latest_news_block').toggle('slow');
        });

        $('#show_program_list').on('click',function(){
            $('#program_list_block').toggle('slow');
        });

        $('#show_our_story').on('click',function(){
            $('#our_story_block').toggle('slow');
        });

        $('#show_team_member').on('click',function(){
            $('#team_member_block').toggle('slow');
        });

        $('#show_gallery').on('click',function(){
            $('#gallery_block').toggle('slow');
        });
    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $('.popover-dismiss').popover({
        trigger: 'focus'
    });


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




</script>



