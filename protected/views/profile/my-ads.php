<?php


$baseUrl = Yii::app()->getBaseUrl(true);
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
$address = isset($profile_data['address']) ? $profile_data['address'] : '';
$password = isset($profile_data['password']) ? $profile_data['password'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';

$ad_type = 'ads';
$user_id = $profile_data['id'];
$ads = Generic::getAdDetailsFromAddTable($user_id,false,false);

$opt = array(
    'w' =>'130',
    'h' =>'120',
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
                            <h4><i class="adicon-heart tc7"></i> My Ads</h4>
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
                <?php if($ads){ ?>
                <div class="call-to-action-2">
                    <div class="inner">
                        <p><strong>Post an another ad now!</strong></p>
                        <a href="javascript:void(0);" onclick="CheckLogin()" class="btn btn-transparent">post an ad</a>
                    </div><!--text-widget-->
                </div><br>
                <?php } ?>

                <?php if(!$ads){ ?>
                    <section id="something-sell" class="clearfix parallax-section">
                        <div class="">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <h2 class="title">Do you have something-sell?</h2>
                                    <h4>Post your ad for free on bdbroadbanddeals.com</h4>
                                    <a href="javascript:void(0);" onclick="CheckLogin()" class="btn btn-transparent">Post Your Ad</a>
                                </div>
                            </div><!-- row -->
                        </div><!-- contaioner -->
                    </section><!-- something-sell -->
                <?php } ?>

                <div class="items-list-md style2 pad-top-0">


                </div>

                <br>
              <div align="center">
                  <?php if (isset($ads) && count($ads) > 4){?>
                  <a href="javascript:void(0);" id="load_more_button"  class="btn btn-white block-element btn-md text-center">load more ads</a>
                 <?php }?>
              </div>
            </div>

        </div>
    </div>
</div><!--panel-->
</div>
</div>
</div>
</div>



<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Request for hot ads</h4>
            </div>
            <div class="modal-body">
                <form class="form-hot-ads" action="javascript:void(0);" id="hot_ads_submit" method="post">
                    <input type="hidden" name="ad_id" id="ad_id" value="">
                    <br />
                    <h4>Validation Time</h4>
                    <br />
                    <div class="col-sm-6">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Start Date">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="end_date" id="end_date" placeholder="End Date">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                    <div align="left" id="hot_ads_status"></div>
                    <a class="btn btn-transparent" type="submit" style="margin-left: 16px; margin-top: 20px">Send Request</a>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
$this->renderPartial("/elements/ad_preview_modal");
?>


<style>
    .datepicker {
        z-index: 1600 !important; /* has to be larger than 1050 */
    }
</style>

<script src="/js/bootstrap-datepicker.js"></script>


<script type="text/javascript">
    var track_page = 1; //track user click as page number, righ now page number 1
    load_contents(track_page); //load content

    $("#load_more_button").click(function (e) { //user clicks on button
        track_page++; //page number increment everytime user clicks load button
        load_contents(track_page); //load content
    });

    //Ajax load function
    function load_contents(track_page){
        $('.animation_image').show(); //show loading image
        var user_id = <?=$user_id?>;
        $.ajax({
            type: 'POST',
            async: false,
            url: SITE_URL + "profile/LoadMoreAds",
            data: {page: track_page,user_id:user_id},
            cache: false,
            dataType: "json",
            success: function(data){
                $(".items-list-md").append(data.html); //append data into #results element
                //scroll page to button element

                if(data.html == ""){
                    //display text and disable load button if nothing to load
                    $("#load_more_button").text("You have reached end of the record!").prop("disabled", true);
                }
               // $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 800);

                //hide loading image
                $('.animation_image').hide(); //hide loading image once data is received

            },
            error: function (){
                alert('Error!')
            }
        })
    }
</script>


<script>
    function deleteItem(id,user_id) {
        var del = confirm("Are you want to delete this item?");

        if (del == true) {
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/DeleteAd",
                data: {ad_id: id, user_id: user_id},
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.status === "success") {
                        $(".items-list-md").html();
                        $(".items-list-md").html(data.html);
                        alert('Record successfully deleted');
                    }

                },
                error: function () {
                    alert('Error!')
                }
            })
        }
    }
</script>


<script type="text/javascript">

    function set_ad_id(id) {
        var ad_id = jQuery('#ad_id').val(id);
        $("#myModal").modal("show");
    }

    $('#myModal').on('shown.bs.modal', function() {
        $('.input-group.date').datepicker({
            format: "yyyy-mm-dd",
            startDate: "2015-01-01",
            endDate: "2025-01-01",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            container: '#myModal modal-body'
        });
    });



    function showAdPreviewModal(ad_id){
        $.ajax({
            type : 'POST',
            url  : SITE_URL+"profile/getAdDetailsForProfile",
            data : {ad_id : ad_id},
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    if(response.ad_status == '1') {
                       window.open(
                          SITE_URL+response.ad_link,
                          '_blank' 
                        );
                    } else {
                        $('.carousel-inner').html(response.ad_image);
                        $('.ad_title').html(response.ad_title);
                        $('.ad_price').html(response.ad_price);
                        //$('.ad_discount').html(response.ad_discount);
                        $('.short-info').html(response.ad_short_details);
                        $('.description').html(response.ad_details);
                        $("#ad_preview_modal").modal("show");
                    }
                }
            }
        });
    }






</script>