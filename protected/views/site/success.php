<?php
$ad_id = base64_decode(Yii::app()->request->getParam('ad_id',''));
$ad_details = array();
$ad_details = Generic::getAddDetailsFromAddTable($ad_id);
$ad_details_all = Generic::getAddDetailsFromAddMetaTable($ad_details['id']);
foreach($ad_details_all as $ad){
    $field_name = $ad['field_name'];
    $field_value = $ad['field_value'];
    $ad_details[$field_name] = $field_value;
}

$images = json_decode($ad_details['image_url']);
$user_id = $ad_details['user_id'];
$ad_type = Generic::getAdCategoryFromUserId($user_id);
$profile_data = Generic::getUserData($user_id);
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';

?>


<!-- main -->
<section id="main" class="clearfix published-page">

    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="header col-sm-12" style="padding-top: 10px">
                    <a class="close" href="<?php echo Yii::app()->request->getBaseUrl(true) ?>">X</a>
                </div>
                <div class="congratulations">
                    <i class="fa fa-check-square-o"></i>
                    <h2>Congratulations!</h2>
                    <h4>Your ad will be Published soon.</h4>
                    <br>
                    <button id="myBtn" class="btn btn-danger">Preview Your Ad</button>
                   <a class="btn btn-blue" href="<?php echo Yii::app()->createUrl($post_another_ad_url); ?>">Post Another Ad</a>
                <input type="hidden" id="ad_id" name="ad_id" value="<?php echo $ad_id ?>" >
                <input type="hidden" id="user_type" name="user_type" value="<?php echo $profile_data['register_type'] ?>" >
                </div>

            </div>
        </div><!-- row -->
    </div><!-- container -->
</section><!-- main -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ad Preview</h4>
            </div>
            <div class="modal-body">

                <div class="section slider">
                            <div class="row">
                                <!-- carousel -->
                                <div class="col-md-7">
                                    <div id="product-carousel" class="carousel slide" data-ride="carousel">

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <!-- item -->

                                            <?php
                                            $counter = 0;
                                            foreach( $images as $image )
                                            {
                                                if($counter == 0){
                                                    echo '<div class="item active">';
                                                } else {
                                                    echo '<div class="item">';
                                                }
                                                $counter++;
                                                ?>
                                            <div class="carousel-image">
                                                <img src="<?= ImageHelper::cloudinary($image,$opt)?>" alt="Featured Image" class="img-responsive">
                                            </div>
                                            </div>
                                           <?php } ?>


                                        </div><!-- carousel-inner -->

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                        <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                                            <i class="fa fa-chevron-right"></i>
                                        </a><!-- Controls -->
                                    </div>
                                </div><!-- Controls -->

                                <?php
                                $price_range = '';
                                if($ad_details['price_end'] != null && $ad_details['price_end'] != $ad_details['price'] && $ad_details['price_end'] != 0) {
                                    $price_range = ' - '.$ad_details['price_end'];
                                }
                                ?>
                                <!-- slider-text -->
                                <div class="col-md-5">
                                    <div class="slider-text">
                                        <h3 style="color:#00a651;"><?=$ad_details['title']?></h3>
                                        <h4 style="color:#a6525a;">BDT <?=$ad_details['price'].$price_range?></h4>
                                        <!-- short-info -->
                                        <div class="short-info">

                                            <h4>Short Information</h4>
                                            <div id="short_info_block">
                                                
                                            </div>

                                            <?php
                                            $counter = 1;
                                            foreach ($ad_details_all as $column) { ?>

                                                <p><strong><?=ucwords(str_replace("_"," ",$column['field_name']))?>: </strong><?=$column['field_value']?> </p>

                                                <?php $counter++;
                                            }
                                            ?>
                                            
                                            <p><strong>Phone Number: </strong><?=$phone_number?></p>
                                        </div><!-- short-info -->

                                    </div>
                                </div><!-- slider-text -->
                            </div>

                            <div class="description" style="margin-bottom: -125px; border-top: 1px solid #e5e5e5;">
                                <h4>Description</h4>
                                <p style="text-align: justify;"><?=$ad_details['description']?> </p><br>
                            </div>
                        </div><!-- slider -->


            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        // Attach Button click event listener
        $("#myBtn").click(function(){
            // show Modal
            var ad_id = $('#ad_id').val();
            var user_type = $('#user_type').val();
            $.ajax({
                type:"POST"
                ,url:SITE_URL+"site/GetAdDetailsForModal"
                ,data:{ad_id:ad_id, user_type:user_type }
                ,dataType: "json"
                ,success:function(data){
                    if(data.status == 'success'){
                        $('#short_info_block').html(data.html);
                    } 
                }
            });

            $('#myModal').modal('show');

        });
    });
   /* setTimeout(function () {
        window.location.href= SITE_URL+'my-profile/my-ads';
    },10000);*/
</script>


