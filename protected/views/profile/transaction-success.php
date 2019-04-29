<?php


$baseUrl = Yii::app()->getBaseUrl(true);
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
                $this->renderPartial("/elements/notification",array('register_type' => $register_type));
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
                        <header>
                            <h4 style="text-align: center;text-decoration: underline">Transaction Status</h4>
                        </header>
                        <div class="inner">
                            <div class="row">
                                <div class="col-xs-12 col-md-6" style="border: 1px solid green;border-radius: 5px;background: #f3f3f3;margin: 0 auto; float: none">
                                    <h3 align="center" style="color: green">Your transaction successful</h3>
                                    <div class="form-group" style="text-align: center">
                                        <label>Your Transaction Id:</label>
                                        <span><?php echo $payment_details->invoice_id ?></span>
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                        <?php if($user_type != 'business'){ ?>
                                            <label>Store Url:</label>
                                            <span>Your Store is currently waiting for approval.</span>
                                        <?php } else { ?>
                                            <label>ISP Url:</label>
                                            <span>Your ISP is currently waiting for approval.</span>
                                        <?php } ?>
                                                
<!--                                        <span><a href="<?php //echo $store_url ?>" target="_blank"><?php //echo $store_url; ?></a></span>-->
                                    </div>
                                    <p style="text-align: center">Thanks for your business</p>
                                </div>
                                <div class="row" style="text-align: center;margin-top: 50px">
                                    <label style="margin: 0">Rate our service :</label>
                                    <span class="starRating">
                                        <input id="rating5" type="radio" name="rating" value="5">
                                        <label for="rating5" title="Awesome"></label>
                                        <input id="rating4" type="radio" name="rating" value="4">
                                        <label for="rating4" title="Very Good"></label>
                                        <input id="rating3" type="radio" name="rating" value="3">
                                        <label for="rating3" title="Good"></label>
                                        <input id="rating2" type="radio" name="rating" value="2">
                                        <label for="rating2" title="Average"></label>
                                        <input id="rating1" type="radio" name="rating" value="1">
                                        <label for="rating1" title="Bad"></label>
                                        <input type="hidden" id="payment_id" name="payment_id" value="<?=$payment_details->id?>">
                                    </span>
                                </div>
                                <div id="feedback_status"></div>
                                <!--<div id="feedback_block">
                                    <form action="javascript::void(0)" id="feedback-from" method="post">
                                        <div class="row" style="text-align: center">
                                            <textarea type="text" id="feedback" name="feedback" placeholder="Please write your feedback ... (Optional)" style="width: 48%;margin-top: 30px;height: 120px"></textarea>
                                        </div>
                                        <div class="row" style="text-align: center">
                                            <input type="hidden" id="payment_id" name="payment_id" value="<?/*=$payment_details->id*/?>">
                                            <input type="submit" id="feedback-submit" class="btn-theme" value="Feedback">
                                        </div>
                                    </form>
                                </div>
                                <div id="feedback_status"></div>-->
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

    .info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:12px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;margin: 14px auto;width: 48%}

    .starRating:not(old){
        display        : inline-block;
        width          : 7.5em;
        height         : 1.5em;
        /*overflow       : hidden;*/
        vertical-align : bottom;
    }

    .starRating:not(old) > input{
        margin-right : -100%;
        opacity      : 0;
    }

    .starRating:not(old) > label{
        display         : block;
        float           : right;
        position        : relative;
        background      : url('<?=$baseUrl?>/images/home2/star-off.svg');
        background-size : contain;
    }

    .starRating:not(old) > label:before{
        content         : '';
        display         : block;
        width           : 1.5em;
        height          : 1.5em;
        background      : url('<?=$baseUrl?>/images/home2/star-on.svg');
        background-size : contain;
        opacity         : 0;
        transition      : opacity 0.2s linear;
    }

    .starRating:not(old) > label:hover:before,
    .starRating:not(old) > label:hover ~ label:before,
    .starRating:not(:hover) > :checked ~ label:before{
        opacity : 1;
    }

</style>

<script>
    $('.starRating').on('click',function() {
            var payment_id = $('#payment_id').val();
            /*var feedback = $('#feedback').val();*/
            var rating = $('input[name=rating]:checked').val();
            var thanks_msg = false;

            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "profile/feedback",
                data: {payment_id: payment_id,rating:rating},
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.status === 'success') {
                        thanks_msg = true;
                    }
                },
                error: function () {
                    alert('Error!')
                }
            });

            if (thanks_msg) {
                $('#feedback_status').html('<div class="info" style="background: #15e4fa">Thanks for your rating</div>');
                return true;
            }
    });

    /*$('#feedback-submit').on('click',function(){
        $('#feedback_block').hide('slow');
    });*/




</script>