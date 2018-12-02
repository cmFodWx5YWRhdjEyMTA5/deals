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
            <div class="clr"></div>


            <div class="row estore_configuration">

                <div class="inner">
                    <div class="basic-card">
                        <header style="border-bottom: #fff">
                            <h5>Please choose a payment method</h5>
                        </header>
                        <div class="inner border">
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    <form action="<?=$baseUrl?>/my-profile/transaction-status" id="payment-confirmation-form" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=$user_id?>">
                                        <!-- <div class="form-group">
                                        <label for="credit_card"><input type="radio" name="payment" id="credit_card" value="1"> By Visa/MasterCard</label><br>
                                            </div>
                                        <div class="form-group" >
                                            <label for="bank_deposit"><input name="payment" id="bank_deposit" value="2" type="radio"> By Bank Deposit</label><br>

                                            <div class="form-group" id="bank_details_block" style="display: none;">
                                                <br>
                                                <div>
                                                    <label>A/C Name:</label>
                                                    <span>BDBROADBANDDEALS</span>
                                                </div>
                                                <div>
                                                    <label>A/C Number:</label>
                                                    <span>*********</span>
                                                </div>
                                                <div>
                                                    <label>Bank Name:</label>
                                                    <span>*********</span>
                                                </div>
                                                <div>
                                                    <label>Swift Code:</label>
                                                    <span>*********</span>
                                                </div>

                                                <div>
                                                    <br>
                                                    <label style="color: #FE9C00">Upload your Bank Deposit Copy :</label>
                                                    <p><input type="file" name="bank_receipt" id="bank_receipt" /></p>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                        <label for="marketing_representative"><input type="radio" name="payment" id="marketing_representative" value="3"> By Direct Payment</label><br>
                                            <div class="form-group" id="direct_payment_block" style="display: none">
                                                <br>
                                                <div class="">
                                                    <input class="form-input" type="text" id="seller_id" name="seller_id" placeholder="Type your saler Id" style="width: 60%;border-radius: 5px;border-color: #FE9C00">
                                                </div>
                                                <br>
                                                <div class="">
                                                    <input class="form-input number_input" type="text" id="advanced_payment" name="advanced_payment" placeholder="Enter deposit amount" style="width: 60%;border-radius: 5px;border-color: #FE9C00">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                        <label for="bkash"><input type="radio" name="payment" id="bkash" value="4"> By bKash Payment</label><br>
                                            <div class="form-group" id="bkash_payment_block" style="display: none">
                                                <div class="">
                                                    <input class="form-input number_input" type="text" id="sender_mobile" name="sender_mobile" placeholder="Sender Mobile Number" style="width: 60%;border-radius: 5px;border-color: #FE9C00">
                                                </div>
                                                <br>
                                                <div class="">
                                                    <input class="form-input" type="text" id="transaction_number" name="transaction_number" placeholder="Trx ID" style="width: 60%;border-radius: 5px;border-color: #FE9C00">
                                                </div>
                                                <br>
                                                <div class="">
                                                    <input class="form-input number_input" type="text" id="payment_amount" name="payment_amount" placeholder="Amount" style="width: 60%;border-radius: 5px;border-color: #FE9C00">
                                                </div>
                                                
                                            </div>

                                        </div>
                                        <!-- <div class="form-group">
                                        <label for="free_payment"><input type="radio" name="payment" id="free_payment" value="9"> Free (for first 3 months)</label><br>
                                        </div> -->
                                        <input type="checkbox" id="agreeIndividual" name="agree" required checked/> <label for="agreeIndividual">I agree all the <a href="<?php echo Yii::app()->createUrl('/terms-&-conditions');?>" target="_blank" a>Terms & Conditions</a></label>
                                        <div class="form-group">

                                        </div>
                                        <div align="left" id="update_name_status"></div>
                                        <input type="hidden" id="pricing_plan_id" name="pricing_plan_id" value="<?php echo $pricing_plan_id ?>" />
                                        <input type="hidden" id="order_amount" name="order_amount" value="<?php echo $total_price ?>" />
                                        <input type="hidden" id="isp_duration" name="isp_duration" value="<?php echo $package_duration ?>" />
                                        <input type="hidden" id="isp_package_type" name="isp_package_type" value="<?php echo $package_type ?>" />
                                        <input type="hidden" id="ad_post_service" name="ad_post_service" value="<?php echo $ad_post_service ?>" />
                                        <input type="hidden" id="request_for" name="request_for" value="<?php echo $request_for ?>" />
                                        <input type="hidden" id="promotion_request_type" name="promotion_request_type" value="<?php echo $promotion_request_type ?>" />
                                        <input type="hidden" id="business_information_data" name="business_information_data" value='<?php echo $business_information_data ?>' />
                                        <button type="submit" id="estore_submit"  class="btn btn-small btn-green">Submit</button>

                                    </form>
                                </div>
                                <div class="col-xs-12 col-md-4 billing-info">
                                    <div class="form-group">
                                        <h3 style="text-align: center;text-decoration: underline;color: #FE9C00">Billing Information</h3>
                                    </div>
                                    <div class="form-group bill-info">

                                        <h5 style="color: #0083c9"><?=strtoupper($profile_data['enterprise_name'])?></h5>
                                    </div>
                                    <div class="form-group bill-info">

                                        <span><?=strtoupper($profile_data['user_name'])?></span>
                                    </div>
                                    <div class="form-group bill-info">

                                        <span><?=$profile_data['designation']?></span>
                                    </div>
                                    <div class="form-group bill-info">

                                        <span><?=$profile_data['address']?></span>
                                    </div>
                                    <div class="form-group bill-info">

                                        <span><?=$profile_data['phone_number']?></span>
                                    </div>
                                    <div class="form-group bill-info">

                                        <span><?=strtoupper($package_type)?> / <?=strtoupper($package_duration)?></span>
                                    </div>

                                    <div class="form-group bill-info">
                                        <span>BDT <?=$total_price?></span>
                                    </div>
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

    .billing-info{
        border: 1px solid #e8e8e8;
        background-color: #f4f4f4;
    }

    .bill-info{
        color: #0083c9;
    }

    #bank_details_block{
        border: 1px solid #FE9C00;
        width: 70%;
        background-color: #f4f4f4;
        border-radius: 10px;
        padding-left: 30px;
        margin-top: 15px;
    }

</style>

<script>

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('.popover-dismiss').popover({
        trigger: 'focus'
    })


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


    $('#bank_deposit').on('click',function(){
        $('#bank_receipt').attr('required', 'required');
        $('#seller_id').removeAttr('required');
        $('#bank_details_block').show('slow');
        $('#direct_payment_block').hide('slow');
        $('#payment-confirmation-form').prop('action', '/my-profile/transaction-status');
    });
    $('#credit_card').on('click',function(){
        $('#bank_receipt').removeAttr('required');
        $('#seller_id').removeAttr('required');
        $('#bank_details_block').hide('slow');
        $('#direct_payment_block').hide('slow');
        $('#payment-confirmation-form').prop('action', '/my-profile/payment-processor');
    });
    $('#marketing_representative').on('click',function(){
        $('#bank_receipt').removeAttr('required');
        $('#seller_id').attr('required', 'required');
        $('#bank_details_block').hide('slow');
        $('#direct_payment_block').show('slow');
        $('#bkash_payment_block').hide('slow');
        $('#payment-confirmation-form').prop('action', '/my-profile/transaction-status');
    });
    $('#bkash').on('click',function(){
        $('#bank_receipt').removeAttr('required');
        $('#seller_id').attr('required', 'required');
        $('#bank_details_block').hide('slow');
        $('#direct_payment_block').hide('slow');
        $('#bkash_payment_block').show('slow');
        $('#payment-confirmation-form').prop('action', '/my-profile/transaction-status');
    });
    // $('#free_payment').on('click',function(){
    //     $('#bank_receipt').removeAttr('required');
    //     $('#seller_id').removeAttr('required');
    //     $('#bank_details_block').hide('slow');
    //     $('#direct_payment_block').hide('slow');
    //     $('#bkash_payment_block').show('slow');
    //     $('#payment-confirmation-form').prop('action', '/my-profile/transaction-status');
    // });

    $('#payment-confirmation-form').on('submit',function(){
        if($('input[name="payment"]:checked').val()){
            var payment_amount_given = $('#advanced_payment').val();
            var payment_amount = $('#order_amount').val();
            if(payment_amount_given > payment_amount){
                alert('Please enter amount correctly');
                return false;
            }
            return true;
        } else {
            alert('Please select a payment method');
            return false;
        }
    });

</script>



