<?php

$baseUrl = Yii::app()->request->baseUrl;
$token = Yii::app()->request->getParam('uid');
$token = Yii::app()->request->getParam('uid');
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';

?>
<!-- main -->
<?php /*echo $this->renderPartial('../elements/_search_form',array(

    'fashion_featured_ads' => $fashion_featured_ads,
    'fashion_new_ads' => $fashion_new_ads,
    'electronic_featured_ads' => $electronic_featured_ads,
    'electronic_new_ads' => $electronic_new_ads,
    'computer_featured_ads' => $computer_featured_ads,
    'computer_new_ads' => $computer_new_ads,
    'mobile_featured_ads' => $mobile_featured_ads,
    'mobile_new_ads' => $mobile_new_ads,



)); */?>
<!-- ad-profile-page -->
<input id="view_type" type="hidden" name="view_type" value="list">
<input id="maximum" type="hidden" name="maximum" value="">
<input id="minimum" type="hidden" name="minimum" value="">
<input id="location" type="hidden" name="location" value="<?=$location_name?>">
<input id="search_string" type="hidden" name="search_string" value="<?=$search_keyword?>">
<input id="ads" type="hidden" name="ads" value="<?=$ads?>">
<div class="row">
    <div class="col-sm-9 col-sm-push-3">
        <div class="category-description std">
            <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col1 owl-carousel owl-theme">
                        <?php
                        if(isset($profile_page_slider_ads) && !empty($profile_page_slider_ads)){
                            $profile_page_slider_ads_opt = array(
                                'w' => '870',
                                'h' => '270',
                                'g' => 'center',
                                'r' => '0'
                            );
                            foreach($profile_page_slider_ads as $profile_page_slider){
                                $image_name = $profile_page_slider['banner_image'];
                                ?>

                                <div class="item"> <a href="#"><img alt="" src="<?php echo ImageHelper::cloudinary($image_name,$profile_page_slider_ads_opt)?>"></a></div>

                            <?php  }}

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <article class="col-main">
            <h2 class="page-heading"> <span class="page-heading-title">All <?=ucwords(str_replace("_"," ",$ads))?></span> </h2>
            <div class="display-product-option">

                <div class="sorter">
                    <div class="view-mode">
                        <span title="Grid" class="button-grid">&nbsp;</span>
                        <span title="List" class="button-active button-list">&nbsp;</span>
                    </div>
                </div>
            </div>
            <div class="result_display">
            </div>
            <div class="category-products">

            </div>
            <div class="toolbar">

            </div>
        </article>
        <!--	///*///======    End article  ========= //*/// -->
    </div>
    <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
        <aside class="col-left sidebar">
            <div class="side-nav-categories">
                <div class="block-title"> Categories </div>
                <!--block-title-->
                <!-- BEGIN BOX-CATEGORY -->
                <div class="box-content box-category">
                    <ul>
                        <?php
                        $all_category_name = Generic::getAllCategory();
                        foreach($all_category_name as $category_name){
                            $category_name_individual = $category_name['category_name'];
                            $category_id = $category_name['category_id'];
                            $category_slug = $category_name['category_slug'];
                            $all_sub_category = Generic::getAllSubcategoryData($category_id);
                            ?>
                            <li> <a class="active" href="javascript:void(0);" onclick="redirectUrlCat()" onmouseover="set_mouseover_cat('<?=$category_slug?>')"><?=$category_name_individual?></a> <span class="subDropdown minus"></span>
                                <ul class="level0_415" style="display:none">
                                    <?php
                                    foreach($all_sub_category as $sub_category){
                                        $sub_category_name = $sub_category['category_name'];

                                        ?>
                                        <li> <a href="javascript:void(0);"> <?=$sub_category_name?></a> <span class="subDropdown plus"></span></li>
                                    <?php }?>
                                </ul>
                                <!--level0-->
                            </li>
                        <?php }?>
                        <!--level 0-->
                    </ul>
                </div>
                <!--box-content box-category-->
                <!-- panel -->
                <div class="panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                            <h4 class="panel-title">Condition<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                        </a>
                    </div><!-- panel-heading -->

                    <div id="accordion-two" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <label for="new"><input type="checkbox" name="condition" id="new" value="1" data-value="new"> New</label>
                            <label for="used" style="margin-left: 50px;"><input type="checkbox" value="0" name="condition" data-value="used" id="used"> Used</label>
                        </div><!-- panel-body -->
                    </div>
                </div><!-- panel -->

                <!-- panel -->
                <div class="panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                            <h4 class="panel-title">
                                Price
                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                            </h4>
                        </a>
                    </div><!-- panel-heading -->

                    <div id="accordion-three" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <div class="price-range"><!--price-range-->
                                <div class="price">
                                    <div data-role="main" class="ui-content">
                                        <p>
                                            <label for="amount">Price range:</label>
                                            <br>
                                            <input type="hidden" name="minimum_price" id="minimum_price" value="">
                                            <input type="hidden" name="maximum_price" id="maximum_price" value="">
                                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                        </p>
                                        <div id="slider-range"></div>
                                    </div>
                                </div><!--/price-range-->
                            </div><!-- panel-body -->
                        </div>
                    </div><!-- panel -->
                </div>
                <?php
                $left_panel_pb_ads_opt= array(
                    'w' => '285',
                    'h' => '385',
                    'g' => 'center',
                    'r' => '0'
                );
                if(isset($left_panel_pb_ads) && !empty($left_panel_pb_ads)){
                    $left_panel_pb_ads_ad_url =  $left_panel_pb_ads[0]['banner_image'];?>
                    <div class="hot-banner"><img alt="banner" src="<?php echo ImageHelper::cloudinary($left_panel_pb_ads_ad_url,$left_panel_pb_ads_opt)?>"></div>
                <?php }?>

                <?php
                $left_panel_px_ads_opt= array(
                    'w' => '285',
                    'h' => '385',
                    'g' => 'center',
                    'r' => '0'
                );
                if(isset($left_panel_px_ads) && !empty($left_panel_px_ads)){
                    $left_panel_px_ads_ad_url =  $left_panel_px_ads[0]['banner_image'];?>
                    <div class="hot-banner"><img alt="banner" src="<?php echo ImageHelper::cloudinary($left_panel_px_ads_ad_url,$left_panel_px_ads_opt)?>"></div>
                <?php }?>


                <?php
                $left_panel_dp_ads_opt= array(
                    'w' => '285',
                    'h' => '385',
                    'g' => 'center',
                    'r' => '0'
                );
                if(isset($left_panel_dp_ads) && !empty($left_panel_dp_ads)){
                    $left_panel_dp_ads_ad_url =  $left_panel_dp_ads[0]['banner_image'];?>
                    <div class="hot-banner"><img alt="banner" src="<?php echo ImageHelper::cloudinary($left_panel_dp_ads_ad_url,$left_panel_dp_ads_opt)?>"></div>
                <?php }?>
                <?php
                $left_panel_pm_ads_opt= array(
                    'w' => '285',
                    'h' => '385',
                    'g' => 'center',
                    'r' => '0'
                );
                if(isset($left_panel_pm_ads) && !empty($left_panel_pm_ads)){
                    $left_panel_pm_ads_ad_url =  $left_panel_pm_ads[0]['banner_image'];?>
                    <div class="hot-banner"><img alt="banner" src="<?php echo ImageHelper::cloudinary($left_panel_pm_ads_ad_url,$left_panel_pm_ads_opt)?>"></div>
                <?php }?>


        </aside>
    </div>
</div>
</div>
</section>
<?php
$this->renderPartial("/elements/ad_preview_modal");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay_progress.min.js"></script>
<style>

    /****************************************************/

    table {
        *border-collapse: collapse; /* IE7 and lower */
        border-spacing: 0;
        width: 100%;
    }

    .bordered {
        border: solid #ccc 1px;
        -webkit-box-shadow: 0 1px 1px #ccc;
        -moz-box-shadow: 0 1px 1px #ccc;
        box-shadow: 0 1px 1px #ccc;
    }

    .bordered td, .bordered th {
        padding: 10px;
        border-bottom: 1px solid #f2f2f2;
    }

    .bordered th {
        background-color: #eee;
        border-top: none;
    }

    .bordered tbody tr:nth-child(even) {
        background: #f5f5f5;
        border:1px solid #000;

    }

    .bordered tbody tr:hover td {
        background: #d0dafd;
        color: #339;
    }


    a{ text-decoration: none; color:#6D37B0; }
    a:hover { color: #8D8D8D; }


    .linksss{border:1px solid #000; padding:5px; text-decoration:none;color:#000;}
    .linksss:hover{text-decoration:underline;color:#fff; background:#6D37B0;}
    .selecteddd{border:1px solid #000; padding:5px; text-decoration:none;color:#fff; background:#6D37B0;}
    /****************************************************/

    .favorite-active {
        color: red !important;
    }
    .favorite {
        color: white;
    }
    /* Pagination style */
    .paginations{margin:0;padding:0;}
    .paginations li{
        display: inline;
        padding: 6px 10px 6px 10px;
        border: 1px solid #ddd;
        margin-right: -1px;
        font: 15px/20px Arial, Helvetica, sans-serif;
        background: #FFFFFF;
        box-shadow: inset 1px 1px 5px #F4F4F4;
    }
    .paginations li a{
        text-decoration:none;
        color: #f36d45;
    }
    .paginations li.first {
        border-radius: 5px 0px 0px 5px;
    }
    .paginations li.last {
        border-radius: 0px 5px 5px 0px;
    }
    .paginations li:hover{
        background: #CFF;
    }
    .paginations li.active{
        background: #F0F0F0;
        color: #333;
    }

</style>



<script type="text/javascript">

    $('input[type="checkbox"]').on('change',function(){
        changePage(12,1);
    });


    function changePage(numRecords,pageNum){
        var viewType = $('#view_type').val();
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, '500', 'swing', function() {
        });
        displayAllRecords(numRecords,pageNum,viewType);
    }

    function displayAllRecords(numRecords,pageNum,viewType) {
        var maximum_price = $('#maximum_price').val();
        var minimum_price = $('#minimum_price').val();
        var search_string = '<?=$search_keyword?>';
        var location = '<?=$location_name?>';
        var ads = $('#ads').val();
        var condition_value = [];
        $('input[name="condition"]:checked').each(function() {
            var condition = $('input[name="condition"]:checked').val();
            condition_value.push(condition);
        });


        $.ajax({
            type: "GET",
            url: SITE_URL + "category/ListAllAdsUsingAjaxForShowAll",
            data: {show:numRecords,pagenum:pageNum,view:viewType,ads:ads,condition:condition_value,minimum_price:minimum_price,maximum_price:maximum_price},
            cache: false,
            dataType:"json",
            beforeSend: function() {
                $.LoadingOverlay("show", {
                    zIndex   : 9999,
                    color    : "rgba(0, 0, 0, 0.4)",
                });
            },
            success: function(data) {
                $(".category-products").html(data.html);
                $('.result_display').html(data.ad_result_block);
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 500);
            }
        });
    }

    function populateSliderRange(){
        var ads = $('#ads').val();
        var condition_value = [];
        $('input[name="condition"]:checked').each(function() {
            var condition = $('input[name="condition"]:checked').val();
            condition_value.push(condition);
        });

        var is_featured  = $('input[name="is_featured"]:checked').val();
        var is_premium  = $('input[name="is_premium"]:checked').val();
        var is_top  = $('input[name="is_top"]:checked').val();
        var is_hot  = $('input[name="is_hot"]:checked').val();

        $.ajax({
            type: "GET",
            url: SITE_URL + "category/ReturnMinMaxValue",
            data: {ads:ads,condition:condition_value},
            cache: false,
            dataType:"json",
            success: function(data) {
                $('#minimum').val(data.min_price);
                $('#maximum').val(data.max_price);
            },
            complete: function(){
                initialize_slider();
            }
        });
    }

    function getParameterByName(name, url) {
        if (!url) {
            url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }


    function changeDisplayRowCount(numRecords) {
        var viewType = $('#view_type').val();
        displayAllRecords(numRecords,1,viewType);
    }

    $(document).ready(function() {
        var viewType = 'list';
        displayAllRecords(12, 1,viewType);
        populateSliderRange();
    });

    $('.button-grid').click(function(){
        $('#view_type').val('grid');
        $(this).addClass("button-active");
        $('.button-list').removeClass("button-active");
        $('.products-list').css('display','none');
        $('.products-grid').css('display','block');
    });

    $('.button-list').click(function(){
        $('#view_type').val('list');
        $(this).addClass("button-active");
        $('.button-grid').removeClass("button-active");
        $('.products-list').css('display','block');
        $('.products-grid').css('display','none');
    });

    function redirectToProduct(id,ad_type){
        window.location = SITE_URL+'ad?ad_id='+encodeURIComponent(btoa(id))+'&ad_type='+encodeURIComponent(btoa(ad_type));
    }

    function ChangeFavoriteStatus(obj,ad_id){
        var search_class,find,status;
        search_class='favorite-active';
        if($(obj).hasClass("favorite")){
            find = $(obj);
        }
        else{
            if($(obj).find('.favorite')){
                find = $(obj).find('.favorite');
            }
        }

        if(find) {
            $.ajax({
                dataType: "json"
                , type: "POST"
                , url: SITE_URL + "site/ChangeFavoriteStatus"
                , data: {ad_id: ad_id}
                , success: function (data) {
                    if (data.status == 'favorite') {
                        find.addClass(search_class);
                        find.attr('title', "Remove from favorite");
                        status = 'Like';


                    } else if((data.status == 'un_favorite')) {
                        find.removeClass(search_class);
                        find.attr('title', "Add as favorite");

                    }

                },
                error: function (e) {
                    if (window.console && window.console.log) {
                        console.log('ajax error');
                    }
                }
            });
        }
    }

    function showAdPreviewModal(ad_id){
        $.ajax({
            type : 'POST',
            url  : SITE_URL+"profile/getAdDetailsForProfile",
            data : {ad_id : ad_id},
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $('.carousel-inner').html(response.ad_image);
                    $('.ad_title').html(response.ad_title);
                    $('.ad_price').html(response.ad_price);
                    //$('.ad_discount').html(response.ad_discount);
                    $('.short-info').html(response.ad_short_details);
                    $('.description').html(response.ad_details);
                    $("#ad_preview_modal").modal("show");
                }
            }
        });
    }


</script>

<script>
    function initialize_slider() {
        var minimum_price = $('#minimum').val();
        var maximum = $('#maximum').val();

        $( "#slider-range" ).slider({
            range: true,
            min: parseInt(minimum_price),
            max: parseInt(maximum),
            values: [ parseInt(minimum_price), parseInt(maximum) ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "Tk " + ui.values[ 0 ] + " - Tk " + ui.values[ 1 ] );
                var selected_price_minimum = ui.values[ 0 ];
                var selected_price_maximum = ui.values[ 1 ];
                $( "#minimum_price" ).val(selected_price_minimum);
                $( "#maximum_price" ).val(selected_price_maximum);
                var viewType = $('#view_type').val();
                displayAllRecords(12,1,viewType);
            }

        });

        $( "#amount" ).val( "Tk " + $( "#slider-range" ).slider( "values", 0 ) + " - Tk " + $( "#slider-range" ).slider( "values", 1 ) );

    }
</script>