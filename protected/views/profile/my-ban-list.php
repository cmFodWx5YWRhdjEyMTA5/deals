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
                            <h4><i class="fa fa-ban red"></i> Customer Blacklist</h4>
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
               <div class="row black_list_buttons"> 
                    <a href="/my-profile/black-list">Verify Customer Blacklist</a>
                    <a href="/my-profile/add-black-list">Add Blacklist</a>
                </div>
                <?php
                 foreach(Yii::app()->user->getFlashes() as $key => $message) {
                      echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                  }
                ?> 
                <h4 style="text-align: left;">My blacklist Customer</h4>       
                <table id="example" class="display" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>National ID</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Reporting ISP</th>
                        <th>Reason</th>
                        <th>Report Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   <?php if (!empty($black_list_data)){
                       $i=0;
                       foreach($black_list_data as $individual_data){
                          $isp_id = $individual_data->reported_by;
                          $ISP_details = Estore::model()->findbypk($isp_id);
                          $user_details=Register::model()->findbypk($ISP_details->user_id);
                          $report_date = new \DateTime($individual_data->create_date);
                       ?>
                   <tr>
                       <td data-search="<?=$individual_data->name ?>"><?=$individual_data->name?></td>
                       <td><?=$individual_data->nid?></td>
                       <td><?=$individual_data->phone?></td>
                       <td><?=$individual_data->address?></td>
                       <td data-order="<?=$user_details->enterprise_name?>"><?=$user_details->enterprise_name?></td>
                       <td data-order="<?=$individual_data->reason?>"><?=$individual_data->reason?></td>
                       <td><?php echo $report_date->format('d M Y') ?></td>
                       <td><a href="/site/changeBlacklistStatus?id=<?php echo $individual_data->id ?>" class="black_list_action"><?php if($individual_data->status){ echo "Remove from Blacklist"; } else { echo "Add to Blacklist"; } ?></td>
                   </tr>
                   <?php 
                        }
                      }
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
               if(data.status == 'approved' || data.status == 'cancelled' || data.status == 'completed' ){

                   $('#favorite-send-loading').hide();
                   $(".js_favorite_massage").html('<p class="alert-success">&nbsp;Order Status Changed Successfully.</p>');
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