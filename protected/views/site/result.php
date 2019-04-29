<?php

$baseUrl = Yii::app()->request->baseUrl;
$token = Yii::app()->request->getParam('uid');
$token = Yii::app()->request->getParam('uid');
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';

?>

<!-- ad-profile-page -->
<input id="view_type" type="hidden" name="view_type" value="list">
<div class="slider_price">
</div>
<input id="location" type="hidden" name="location" value="<?=$location_name?>">
<input id="search_string" type="hidden" name="search_string" value="<?=$search_keyword?>">
<input id="maximum" type="hidden" name="maximum" value="<?php echo $maximum_price ?>">
<input id="minimum" type="hidden" name="minimum" value="<?php echo $minimum_price ?>">
<div id="content">
    <div class="content-shop left-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12 main-content">
                    <div class="main-content-shop">
                        <div class="banner-shop-slider">
                            <div class="wrap-item">
                                <?php
                                if(isset($image) && !empty($image)){
                                    $opt = array(
                                        'w' => '870',
                                        'h' => '290',
                                        'g' => 'center',
                                        'r' => '0'
                                    );
                                    foreach($image as $images){
                                        ?>
                                        <div class="item">
                                            <div class="item-shop-slider">
                                                <div class="shop-slider-thumb">
                                                    <a href="#"><img src="<?php echo ImageHelper::cloudinary($images,$opt)?>" alt="" /></a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php  }}?>
                            </div>
                        </div>
                        <input type="hidden" name="business_type" id="business_type" value="">
                        <!-- End Banner Slider -->
                        <div class="list-shop-cat">
                            <ul>
                                <li><a  href="javascript:void(0);" onclick="place_value('business'),focusMe(this);">Business <span class="business"></span></a></li>
                                <li><a  href="javascript:void(0);" onclick="place_value('personal'),focusMe(this);">Individuals <span class="personal"></span></a></li>
                                <li><a  href="javascript:void(0);" onclick="place_value('promotion'),focusMe(this);">Promotional <span class="promotion"></span></a></li>

                            </ul>
                        </div>
                        <!-- End List Shop Cat -->
                        <div class="shop-tab-product">
                            <div class="shop-tab-title">
                                <h2>  Search Result </h2>
                                <ul class="shop-tab-select">
                                    <li><a href="#product-grid" class="grid-tab" data-toggle="tab"></a></li>
                                    <li class="active"><a href="#product-list" class="list-tab" data-toggle="tab"></a></li>
                                </ul>
                            </div>
                            <div class="message"></div>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="product-grid">
                                    <ul class="row product-grid auto-clear">






                                    </ul>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="sort-pagi">



                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Sort Pagibar -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade in active" id="product-list">
                                    <ul class="product-list">






                                    </ul>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="sort-pagi">


                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Sort Pagibar -->
                                </div>
                            </div>
                        </div>
                        <!-- End Shop Tab -->
                    </div>
                    <!-- End Main Content Shop -->
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                    <div class="sidebar-shop sidebar-left">
                        <div class="widget widget-filter">
                            <div class="box-filter category-filter">
                                <h2 class="widget-title">CATEGORY</h2>
                                <ul>
                                    <?php
                                    $all_category_name = Generic::getAllCategory();
                                    foreach($all_category_name as $category_name){
                                        $category_name_individual = $category_name['category_name'];
                                        $category_id = $category_name['category_id'];
                                        $category_slug = $category_name['category_slug'];
                                        $category_icon = $category_name['category_icon'];
                                        $all_sub_category = Generic::getAllSubcategoryData($category_id);
                                        ?>
                                        <li>
                                            <a href="<?=$baseUrl?>/ad-list?category_slug=<?=$category_slug?>" id="<?=$category_slug?>" > <?=$category_name_individual?> </a>

                                        </li>
                                    <?php }?>
                                </ul>
                            </div>
                            <!-- End Category -->
                            <div class="box-filter manufacturer-filter">
                                <h2 class="widget-title">Conditions</h2>
                                <label for="new"><input type="checkbox" name="condition" id="new" value="1" data-value="new"> New</label>
                                <label for="used" style="margin-left: 50px;"><input type="checkbox" value="0" name="condition" data-value="used" id="used"> Used</label>
                            </div>
                            <div class="box-filter manufacturer-filter">
                                <h2 class="widget-title">Location</h2>
                                <ul>
                                    <label class="location" for="dhaka"><input type="checkbox" id="dhaka" name="locations" value="Dhaka"> Dhaka</label>
                                    <label class="location" for="chittagong"><input type="checkbox" id="chittagong" name="locations" value="Chittagong"> Chittagong</label>
                                    <label class="location" for="rajshahi"><input type="checkbox" id="rajshahi" name="locations" value="Rajshahi" > Rajshahi</label>
                                    <label class="location" for="khulna"><input type="checkbox" id="khulna" name="locations" value="Khulna"> Khulna</label>
                                    <label class="location" for="barishal"><input type="checkbox" id="barishal" name="locations" value="Barisal"> Barisal</label>
                                    <label class="location" for="sylhet"><input type="checkbox" id="sylhet" name="locations" value="Sylhet"> Sylhet</label>
                                    <label class="location" for="rangpur"><input type="checkbox" id="rangpur" name="locations" value="Rangpur"> Rangpur</label>
                                </ul>
                            </div>
                            <div class="box-filter price-filter">
                                <h2 class="widget-title">price</h2>
                                <input type="hidden" name="minimum_price" id="minimum_price" value="">
                                <input type="hidden" name="maximum_price" id="maximum_price" value="">
                                <div class="inner-price-filter">

                                    <div class="range-filter">
                                        <label style="margin: 0 1px 0 0;">&#2547;</label>
                                        <div id="amount"></div>
                                        <button class="btn-filter">Filter</button>
                                        <div id="slider-range"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Price -->


                            <!-- End Manufacturers -->
                        </div>
                        <!-- End Filter -->
                        <div class="widget widget-vote">
                            <h2 class="widget-title">Sort By</h2>


                            <label class="status" for="featured"><input type="checkbox" name="is_featured" value="1" id="new"> Featured</label>
                            <label class="status" for="top"><input type="checkbox" name="is_top" value="1" id="used" > Top</label>
                            <label class="status" for="premium"><input type="checkbox" name="is_premium" value="1" id="used"> Premium</label>
                            <label class="status" for="hot"><input type="checkbox" name="is_hot" value="1" id="used" > Hot</label>



                        </div>
                        <!-- End Vote -->
                        <div class="widget widget-adv">
                            <h2 class="title-widget-adv">
                                <span>Week</span>
                                <strong>big sale</strong>
                            </h2>


                            <div class="wrap-item">

                                <?php
                                $left_panel_rb_ads_opt= array(
                                    'w' => '270',
                                    'h' => '400',
                                    'g' => 'center',
                                    'r' => '0'
                                );
                                if(isset($left_panel_rb_ads) && !empty($left_panel_rb_ads)){
                                    $left_panel_rb_ads_ad_url =  $left_panel_rb_ads[0]['banner_image'];
                                    $left_panel_rb_ads_urls = $baseUrl.'/promotions/'.$left_panel_rb_ads[0]['page_alias_ad_special'];
                                    $promotion_hb_ads_uri= (isset($left_panel_rb_ads[0]['banner_url']) && !empty($left_panel_rb_ads[0]['banner_url']))? $left_panel_rb_ads[0]['banner_url']: $left_panel_rb_ads_urls;

                                    ?>

                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a target="_blank" href="<?=$promotion_hb_ads_uri?>"><img src="<?php echo ImageHelper::cloudinary($left_panel_rb_ads_ad_url,$left_panel_rb_ads_opt)?>" alt="" /></a>
                                            </div>

                                        </div>
                                    </div>

                                <?php }?>

                                <?php
                                $left_panel_rx_ads_opt= array(
                                    'w' => '270',
                                    'h' => '400',
                                    'g' => 'center',
                                    'r' => '0'
                                );
                                if(isset($left_panel_rx_ads) && !empty($left_panel_rx_ads)){
                                    $left_panel_rx_ads_ad_url =  $left_panel_rx_ads[0]['banner_image'];
                                    $left_panel_rx_ads_urls = $baseUrl.'/promotions/'.$left_panel_rx_ads[0]['page_alias_ad_special'];
                                    $left_panel_rx_ads_uri= (isset($left_panel_rx_ads[0]['banner_url']) && !empty($left_panel_rx_ads[0]['banner_url']))? $left_panel_rx_ads[0]['banner_url']: $left_panel_rx_ads_urls;

                                    ?>

                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a target="_blank" href="<?=$left_panel_rx_ads_uri?>"><img src="<?php echo ImageHelper::cloudinary($left_panel_rx_ads_ad_url,$left_panel_rx_ads_opt)?>" alt="" /></a>
                                            </div>

                                        </div>
                                    </div>

                                <?php }?>

                                <?php
                                $left_panel_rc_ads_opt= array(
                                    'w' => '270',
                                    'h' => '400',
                                    'g' => 'center',
                                    'r' => '0'
                                );
                                if(isset($left_panel_rc_ads) && !empty($left_panel_rc_ads)){
                                    $left_panel_rc_ads_ad_url =  $left_panel_rc_ads[0]['banner_image'];
                                    $left_panel_rc_ads_urls = $baseUrl.'/promotions/'.$left_panel_rc_ads[0]['page_alias_ad_special'];
                                    $left_panel_rc_ads_uri= (isset($left_panel_rc_ads[0]['banner_url']) && !empty($left_panel_rc_ads[0]['banner_url']))? $left_panel_rc_ads[0]['banner_url']: $left_panel_rc_ads_urls;
                                    ?>
                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a target="_blank" href="<?=$left_panel_rc_ads_uri?>"><img src="<?php echo ImageHelper::cloudinary($left_panel_rc_ads_ad_url,$left_panel_rc_ads_opt)?>" alt="" /></a>
                                            </div>

                                        </div>
                                    </div>
                                <?php }?>
                                <?php
                                $left_panel_rd_ads_opt= array(
                                    'w' => '270',
                                    'h' => '400',
                                    'g' => 'center',
                                    'r' => '0'
                                );
                                if(isset($left_panel_rd_ads) && !empty($left_panel_rd_ads)){
                                    $left_panel_rd_ads_ad_url =  $left_panel_rd_ads[0]['banner_image'];
                                    $left_panel_rd_ads_urls = $baseUrl.'/promotions/'.$left_panel_rd_ads[0]['page_alias_ad_special'];
                                    $left_panel_rc_ads_uri= (isset($left_panel_rd_ads[0]['banner_url']) && !empty($left_panel_rd_ads[0]['banner_url']))? $left_panel_rd_ads[0]['banner_url']: $left_panel_rd_ads_urls;


                                    ?>
                                    <div class="item">
                                        <div class="item-widget-adv">
                                            <div class="adv-widget-thumb">
                                                <a target="_blank" href="<?=$left_panel_rc_ads_uri?>"><img src="<?php echo ImageHelper::cloudinary($left_panel_rd_ads_ad_url,$left_panel_rd_ads_opt)?>" alt="" /></a>
                                            </div>

                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <!-- End Adv -->
                    </div>
                    <!-- End Sidebar Shop -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Shop -->
</div>
<!--<div class="loader"></div>-->
<!-- End Content -->
<?php
$this->renderPartial("/elements/ad_preview_modal");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<style>

    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 0.9;
        background: url('<?=$baseUrl?>/images/loading1.gif') 50% 50% no-repeat white;
    }

    .button-selected{
        color: red !important;
    }
    .info,.warning, .validation {
        border: 1px solid;
        margin: 10px 0px;
        padding:15px 10px 15px 50px;
        background-repeat: no-repeat;
        background-position: 10px center;
    }

    .warning {
        color: #9F6000;
        background-color: #FEEFB3;

    }




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
    .status{
        display: block;
    }
    .location{
        display: block;
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

    function place_value(business_type){
        jQuery('#business_type').val(business_type);
        var viewType = $('#view_type').val();
        displayAllRecords(12,1,viewType);

    }

    function displayAllRecords(numRecords,pageNum,viewType) {
        var maximum_price = $('#maximum_price').val();
        var minimum_price = $('#minimum_price').val();
        var search_string = '<?=$search_keyword?>';
        var location = '<?=$location_name?>';

        var category_id = '<?=$category_ids?>';
        var condition_value = [];
        $.each($("input[name='condition']:checked"), function(){
            condition_value.push($(this).val());
        });

        var business_type = $("#business_type").val();
        var location_value = [];
        $.each($("input[name='locations']:checked"), function(){
            location_value.push($(this).val());
        });


        var is_featured  = $('input[name="is_featured"]:checked').val();
        var is_premium  = $('input[name="is_premium"]:checked').val();
        var is_top  = $('input[name="is_top"]:checked').val();
        var is_hot  = $('input[name="is_hot"]:checked').val();

        $.ajax({
            type: "GET",
            url: SITE_URL + "category/ListAllAdUsingAjaxForSearch",
            data: {show:numRecords,pagenum:pageNum,view:viewType,location:location,search_string:search_string,maximum_price:maximum_price,minimum_price:minimum_price,condition:condition_value,is_featured:is_featured,is_premium:is_premium,is_top:is_top,is_hot:is_hot,locations:location_value,selected_category:category_id,business_type:business_type},
            cache: false,
            dataType:"json",
            beforeSend: function() {
                $(".loader").fadeIn("slow");
            },
            success: function(data) {
                $(".message").html(data.message);
                $(".product-list").html(data.list);
                $(".product-grid").html(data.grid);
                $(".sort-pagi").html(data.html);
                $('.result_display').html(data.ad_result_block);
                $('.personal').html(data.personal);
                $('.business').html(data.business);
                $('.promotion').html(data.promotion);
                setTimeout(function(){
                    $(".loader").fadeOut("slow");
                }, 500);
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
        initializeSlider();
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
        var root_node = $(obj).parent().parent().parent();
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

                        $(root_node).find('.product-stock .favourite').html(data.favourite);
                    } else if((data.status == 'un_favorite')) {
                        find.removeClass(search_class);
                        find.attr('title', "Add as favorite");
                        $(root_node).find('.product-stock .favourite').html(data.favourite);

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

    function initializeSlider() {
        if ($('.range-filter').length > 0) {

            var minimum_price = $('#minimum').val();
            var maximum = $('#maximum').val();


            $(".range-filter #slider-range").slider({
                range: true,
                min: parseInt(minimum_price),
                max: parseInt(maximum),
                values: [parseInt(minimum_price), parseInt(maximum)],
                slide: function (event, ui) {
                    $("#amount").html("<span>" + ui.values[0] + "</span>" + " - " + "<span>" + ui.values[1] + "</span>");
                    var selected_price_minimum = ui.values[0];
                    var selected_price_maximum = ui.values[1];
                    $("#minimum_price").val(selected_price_minimum);
                    $("#maximum_price").val(selected_price_maximum);
                    var viewType = $('#view_type').val();
                    displayAllRecords(12, 1, viewType);
                }
            });
            $(".range-filter #amount").html("<span>" + $("#slider-range").slider("values", 0) + "</span>" + " - " + "<span>" + $("#slider-range").slider("values", 1) + "</span>");
        }
    }

    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>

<script type="text/javascript">
    function focusMe(button) {
        var elem = document.getElementsByClassName("button-selected")[0];
        // if element having class `"button-selected"` defined, do stuff
        if (elem) {
            elem.className = "";
        }
        button.className = "button-selected";
    }
</script>