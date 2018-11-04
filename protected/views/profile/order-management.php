<?php
$baseUrl = Yii::app()->getBaseUrl(true);
$token = Yii::app()->session['user_token'];
$id = isset($profile_data['id']) ? $profile_data['id'] : '';
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
?>


<?php
echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
?>


<link rel="stylesheet" type="text/css" href="<?=$baseUrl?>/fancybox/jquery.fancybox.css" />
<!-- //Fancybox jQuery -->





<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">

        <div id="tab002" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab002">
                <span><i class="adicon-document"></i></span>
                My Ads
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-6">
                        <div class="icon-heading">
                            <h4><i class="adicon-heart tc7"></i> Order Management</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <?php
                        $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                    </div>
                </div>
            </header>
            <div class="inner">
                <table id="example" class="display" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Buyer Name</th>
                        <th>Buyer Phone</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Order Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tbody>


                   <?php if (isset($order_data) && count($order_data>1)){
                       $i=0;

                       foreach($order_data as $individual_data){
                           $status = "Pending";
                           $button_one = "display:block";
                           $button_two = "display:block";

                           if(($individual_data->status) && ($individual_data->status == 1)){

                               $status = "Approved";
                               $button_one = "display:none";
                               $button_two = "display:none";
                            }
                              elseif(($individual_data->status) && ($individual_data->status == 2)){

                                  $status = "Cancelled";
                                  $button_one = "Approve";
                                  $button_two = "display:none";
                             }
                           $i++;
                           ?>

                   <tr>
                       <td data-search="<?=$individual_data->invoice_id?>"><?=$individual_data->invoice_id?></td>
                       <td><?=$individual_data->buyer_name?></td>
                       <td><?=$individual_data->buyer_phone?></td>
                       <td><?=$individual_data->product_name?></td>
                       <td data-order="<?=$individual_data->product_price?>"><?=$individual_data->product_price?></td>
                       <td data-order="<?=$status?>"><?=$status?></td>
                       <td><a class="fancybox" href="#inline<?php echo $i; ?>">View</a>
                           <div id="inline<?php echo $i; ?>" style="width:700px;display: none;">
                               <div class="wrapper" style="width: 700px;border: solid 2px #333;padding: 10px;">
                               <h3 style="border-bottom:2px solid #808080;margin-bottom:10px;">Order Details</h3>

                                   <table class="tbl2" width="100%">
                                       <tr>
                                           <td>Invoice ID</td>
                                           <td><?=$individual_data->invoice_id?></td>
                                        </tr>
                                       <tr>
                                           <th>Buyer Name</th>
                                           <td><?=$individual_data->buyer_name?></td>
                                           </tr>
                                       <tr>
                                           <th>Buyer Email</th>
                                           <td><?=$individual_data->buyer_email?></td>
                                           </tr>
                                       <tr>
                                           <th>Buyer Phone</th>
                                           <td><?=$individual_data->buyer_phone?></td>
                                           </tr>
                                       <tr>
                                           <th>Product Code</th>
                                           <td><?=$individual_data->item_code?></td>
                                           </tr>
                                       <tr>
                                           <th>Store Name</th>
                                           <td><?=$individual_data->estore_name?></td>
                                           </tr>
                                       <tr>
                                           <th>Product Name</th>
                                           <td><?=$individual_data->product_name?></td>
                                           </tr>
                                       <tr>
                                           <th>Product Price</th>
                                           <td><?=$individual_data->product_price?></td>
                                           </tr>
                                       <tr>
                                           <th>Status</th>
                                           <td><?=$status?></td>
                                           </tr>
                                       <tr>
                                           <th>Ordered Date</th>
                                           <td><?=$individual_data->create_date?></td>
                                       </tr>

                                            <a href="javascript:void(0);" style="<?=$button_one?>; width: 100px; padding: 5px 8px 5px 8px;text-align: center;float: left;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;" onclick="changeOrderStatus(1,'<?php echo $individual_data->invoice_id;?>')">Approve</a>
                                            <a href="javascript:void(0);" style="<?=$button_two?>;width: 100px; padding: 5px 8px 5px 8px;text-align: center;float: left;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;" onclick="changeOrderStatus(2,'<?php echo $individual_data->invoice_id;?>')">Cancel</a>
                                            <a href="javascript:void(0);" id="print_button" class="print_button" style="width: 100px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;">Print </a>

                                   </table>
                                       <div class="js_favorite_massage favorite-massage alert-warning"></div>
                                       <div class="favorite-send-controller">
                                        <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading">
                                            <img alt="Loading..." src="/images/loader.gif">
                                        </span>




                           </div>
                               </div>
                           </div>

                       </td>

                   </tr>
                       <?php }}
                     ?>
                     </tbody>

                </table>

            </div>

        </div>
    </div>
</div><!--panel-->
</div>
<style>

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }





</style>


<script type="text/javascript">

    $(document).ready(function() {
        $('#example').DataTable();
        $(".print_button").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.wrapper").printArea( options );
        });
    } );

   function changeOrderStatus(value,id){

       $('#favorite-send-loading').show();
       $.ajax({
           type:"POST"
           ,url:SITE_URL+"estore/ChangeOrderStatus"
           ,data:{status:value,id:id}
           ,dataType: "json"
           ,success:function(data){
               if(data.status == 'approved' || data.status == 'cancelled' ){

                   $('#favorite-send-loading').hide();
                   $(".js_favorite_massage").html('<p class="alert-success">&nbsp;Order Submitted Successfully.</p>');
                   $(".js_favorite_massage").show();
                   location.reload();

               }
               else if(data.status == 'false'){
                   $('#favorite-send-loading').hide();

                   $(".js_favorite_massage").show();

               }
           }
       });







  }


</script>


<script type="text/javascript" src="<?=$baseUrl?>/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?=$baseUrl?>/fancybox/main.js"></script>
<script src="<?=$baseUrl?>/js/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>