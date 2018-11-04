<?php

include dirname(__FILE__) . '/../../extensions/card-processor/api_lib.php';
include dirname(__FILE__) . '/../../extensions/card-processor/configuration.php';
include dirname(__FILE__) . '/../../extensions/card-processor/connection.php';


$baseUrl = Yii::app()->getBaseUrl(true);
//Creates the Merchant Object from config. If you are using multiple merchant ID's,
// you can pass in another configArray each time, instead of using the one from configuration.php
$merchantObj = new Merchant($configArray);

// The Parser object is used to process the response from the gateway and handle the connections
// and uses connection.php
$parserObj = new Parser($merchantObj);

//The Gateway URL can be set by using the following function, or the
//value can be set in configuration.php
//$merchantObj->SetGatewayUrl("https://secure.uat.tnspayments.com/api/nvp");
$requestUrl = $parserObj->FormRequestUrl($merchantObj);

//This is a library if useful functions
$new_api_lib = new api_lib;

//Use a method to create a unique Order ID. Store this for later use in the receipt page or receipt function.
//$order_id = $new_api_lib->getRandomString(10);
//$order_id = $new_api_lib->getRandomString(10);

//Form the array to obtain the checkout session ID.
$request_assoc_array = array("apiOperation"=>"CREATE_CHECKOUT_SESSION",
    "order.id"=>$order_id,
    "order.amount"=>$order_amount,
    "order.currency"=>$order_currency,
    "interaction.displayControl.billingAddress" =>"HIDE"
);

//This builds the request adding in the merchant name, api user and password.
$request = $parserObj->ParseRequest($merchantObj, $request_assoc_array);

//Submit the transaction request to the payment server
$response = $parserObj->SendTransaction($merchantObj,$request);

//Parse the response
$parsed_array = $new_api_lib->parse_from_nvp($response);

//Store the successIndicator for later use in the receipt page or receipt function.
$successIndicator = $parsed_array['successIndicator'];

//The session ID is passed to the Checkout.configure() function below.
$session_id = $parsed_array['session.id'];

//Store the variables in the session, or a database could be used for example
//$_SESSION['successIndicator']= $successIndicator;
//$_SESSION['orderID']= $order_id;
if(!isset(Yii::app()->session['successIndicator']) && !isset(Yii::app()->session['orderID'])){
    Yii::app()->session['successIndicator'] = $successIndicator;
    Yii::app()->session['orderID'] = $order_id;
    Yii::app()->session['ad_post_service'] = $ad_post_service;
    Yii::app()->session['pricing_plan_id'] = $pricing_plan_id;
    Yii::app()->session['registered_user_data'] = $business_info_data;
}

$merchantID = "'" . $merchantObj->GetMerchantId() . "'";

$baseUrl = Yii::app()->request->baseUrl;
$session =  Yii::app()->session['user_token'];
$token = Yii::app()->session['user_token'];
$user_id = isset($profile_data['id']) ? $profile_data['id'] : '';
$all_category_list = Generic::getAllCategoryData();
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$city = isset($profile_data['district']) ? $profile_data['district'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$enter_prise_name = isset($profile_data['enterprise_name']) ? $profile_data['enterprise_name'] : '';
$url_alias = str_replace(" ","_",strtolower($enter_prise_name));
$category_id = isset($profile_data['business_category_id']) ? $profile_data['business_category_id'] : '';
$result = Yii::app()->db->createCommand( "SELECT * FROM tbl_category  WHERE parent_id LIKE '$category_id'")->queryAll();
$customer_receipt_email = "'" . $email . "'";

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

<script src="https://easternbank.ap.gateway.mastercard.com/checkout/version/35/checkout.js"
        data-error="<?php echo $failure_page_url ?>"
        data-cancel="<?php echo $cancel_page_url ?>"
        data-complete="<?php echo $success_page_url ?>"
    >
</script>

<script type="text/javascript">
    function errorCallback(error) {
        alert(JSON.stringify(error));
    }

    function completeCallback(resultIndicator, sessionVersion) {
        alert("Result Indicator");
        alert(JSON.stringify(resultIndicator));
        alert("Session Version:");
        alert(JSON.stringify(sessionVersion));
        alert("Successful Payment");
    }

    function cancelCallback() {
        alert('Payment cancelled');

    }


    Checkout.configure({
        merchant   : <?php echo $merchantID; ?>,
        order      : {
            amount     : <?php echo json_encode($order_amount); ?>,
            currency   : <?php echo json_encode($order_currency); ?>,
            description: '<?php echo $order_description ?>',
            id				 : <?php echo json_encode($order_id); ?>,
            item			 : {
                brand: 'Mastercard',
                description: '<?php echo $order_description ?>',
                name: 'HostedCheckoutItem',
                quantity: '1',
                unitPrice: '1.00',
                unitTaxAmount: '1.00'
            }
        },
        billing    : {
            address  : {
                street: '<?php echo $address ?>',
                stateProvince: '<?php echo $city ?>',
                city: '<?php echo $city ?>',
                company: 'Eastern Bank Limited',
                postcodeZip: '1000',
                country: 'BGD'
            }
        },
        customer :{
            email: <?php echo $customer_receipt_email; ?>
        },
        interaction: {
            merchant: {
                name: 'BDADS24.com',
                address: {
                    line1: '100 Dilkusha ',
                    line2: 'Motijheel 1000'
                },
                logo:  'https://ad-dwit-a.s3.amazonaws.com/1488964778.jpg'
            }
        },
        session: {
            id: <?php echo json_encode($session_id); ?>
        }
    });

</script>

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
                        <header>
                            <h5>Transaction Processing... Please Wait!!</h5>
                        </header>
                        <div class="inner">
                            <div class="row">
                                <div class="col-xs-12 col-md-8" style="border: 1px solid green;border-radius: 5px;margin: 0 auto;float: none">

                                    <!--<p style="text-align:center;"><a href="../index.html"><img src="http://ebl.com.bd/images/eastern-bank-ltd.gif" alt="Main Order Home Page" /></a></p>-->
                                    <h2 align="center" style="color: green"> Transaction Summary</h2>
                                    <p style="text-align:center;"> <h5 align="center"><label>Total transaction amount :</label>  BDT <?php if (isset($order_amount)) echo $order_amount ?></h5></p>
                                    <!--<p style="text-align:center;"> Currency&nbsp&nbsp&nbsp: <?php /*if (isset($order_currency)) echo $order_currency */?> </p>-->
                                    <br>
                                    <h5>You will be redirecting to payment page in 5 seconds. If you are not redirected automatically, try another way from below:</h5>
<!--                                    <h5 align="center">You are redirecting to payment processing page.</h5> <br> <h5 align="center" style="margin-top: -22px"><img src="--><?//=$baseUrl?><!--/images/page_loading1.gif" height="80"></h5><br><h5 style="text-align: center;color: #afafaf;margin-top: -20px">Page Loading</h5>-->
                                    <!-- Note in reality only one of the following functions will be called -->
                                    <!--<p style="text-align:center;"><input type="button" value="tra Lightbox" onclick="Checkout.showLightbox();" /></p>-->
<!--                                    <p style="text-align:center;"><input type="button" value="Confirm Payment" class="button btn-success" onclick="Checkout.showPaymentPage();" /></p>-->
                                    <p style="text-align:center;">
                                    <form action="<?php echo $alternate_link ?>" method="post">
                                        <input type="hidden" name="order.token" id="order.token" value="<?php echo $data_token ?>">
                                        <input type="hidden" name="order.amount" id="order.amount" value="<?php echo $order_amount ?>">
                                        <input type="hidden" name="order.currency" id="order.currency" value="<?php echo $order_currency ?>">
                                        <input type="hidden" name="customer_receipt_email" id="customer_receipt_email" value="<?php echo $customer_receipt_email ?>">
                                        <input type="submit" name="submit" class="button btn-success alternate_button" value="Alternate Payment" style="display: none" />
                                    </form>

                                    </p>

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
<script type="text/javascript">
    setTimeout(function () {
        Checkout.showPaymentPage();
    },5000);
</script>

<script type="text/javascript">
    setTimeout(function () {
        $('.alternate_button').show();
    },10000);
</script>