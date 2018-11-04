<?php


$baseUrl = Yii::app()->getBaseUrl(true);
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
?>





<style>
    .favorite-active {
        color: red;
    }
    ul.favorite_filter li{
        color: #0079CA;
        display: block;
        position: relative;
        float: left;
        height: 100px;
    }

    ul.favorite_filter li input[type=radio]{
        position: absolute;
        visibility: hidden;
    }

    ul.favorite_filter li label{
        display: block;
        position: relative;
        font-weight: 300;
        font-size: 15px;
        line-height: 12px;
        padding: 25px 25px 25px 80px;
        margin: 10px auto;
        height: 30px;
        z-index: 9;
        cursor: pointer;
        -webkit-transition: all 0.25s linear;
    }

    ul.favorite_filter li:hover label{
        color: #FF0000;
    }

    ul.favorite_filter li .check{
        display: block;
        position: absolute;
        border: 5px solid #0079CA;
        border-radius: 100%;
        height: 25px;
        width: 25px;
        top: 30px;
        left: 20px;
        z-index: 5;
        transition: border .25s linear;
        -webkit-transition: border .25s linear;
    }

    ul.favorite_filter li:hover .check {
        border: 5px solid #E25B60;
    }

    ul.favorite_filter li .check::before {
        display: block;
        position: absolute;
        content: '';
        border-radius: 100%;
        height: 13px;
        width: 13px;
        top: 1px;
        left: 1px;
        margin: auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
    }

    .favorite_filter input[type=radio]:checked ~ .check {
        border: 5px solid #E25B60;
    }

    .favorite_filter input[type=radio]:checked ~ .check::before{
        background: #E25B60;
    }

    .favorite_filter input[type=radio]:checked ~ label{
        color: #E25B60;
    }

    .signature {
        position: fixed;
        margin: auto;
        bottom: 0;
        top: auto;
        width: 100%;
    }

    .signature p{
        text-align: center;
        font-family: Helvetica, Arial, Sans-Serif;
        font-size: 0.85em;
        color: #AAAAAA;
    }

    .signature .much-heart{
        display: inline-block;
        position: relative;
        margin: 0 4px;
        height: 10px;
        width: 10px;
        background: #0079CA;
        border-radius: 4px;
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .signature .much-heart::before,
    .signature .much-heart::after {
        display: block;
        content: '';
        position: absolute;
        margin: auto;
        height: 10px;
        width: 10px;
        border-radius: 5px;
        background: #0079CA;
        top: -4px;
    }

    .signature .much-heart::after {
        bottom: 0;
        top: auto;
        left: -4px;
    }

    .signature a {
        color: #AAAAAA;
        text-decoration: none;
        font-weight: bold;
    }
</style>
<?php echo $this->renderPartial('../elements/profile_sidebar',array(
    'profile_data'=>$profile_data

)); ?>

<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">
        <div id="tab005" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab005">
                <span><i class="adicon-search"></i></span>
                My Searches
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-7">
                        <div class="icon-heading">
                            <h4><i class="adicon-search tc1"></i> My Searches</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <?php
                        $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                    </div>
                </div>

            </header>
            <div class="inner">

                <ul class="favorite_filter">
                    <li>
                        <input type="radio" id="f-option" name="selector" checked value="3" onclick="changeFilterValue(this.value)">
                        <label for="f-option">Show all</label>
                        <div class="check"></div>
                    </li>
                    <li>
                        <input type="radio" id="s-option" name="selector" value="1" onclick="changeFilterValue(this.value)">
                        <label for="s-option">Show only favorites</label>
                        <div class="check">
                            <div class="inside"></div>
                        </div>
                    </li>
                    <li>
                        <input type="radio" id="t-option" name="selector" value="2" onclick="changeFilterValue(this.value)">
                        <label for="t-option">Show only recently viewed</label>
                        <div class="check">
                            <div class="inside"></div>
                        </div>
                    </li>
                </ul>
                <div style="clear: both"></div>
                <div id="loader"></div>
                <div class="info-cards">

                </div>



            </div><!--inner-->
        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>
<script>

    function deleteRecentViewRecord(delete_id){
        if(delete_id) {
            $.ajax({
                dataType: "json"
                , type: "POST"
                , url: SITE_URL + "site/DeleteRecentView"
                , data: {ad_id: delete_id}
                , success: function (data) {
                    changeFilterValue(2);
                },
                error: function (e) {
                    if (window.console && window.console.log) {
                        console.log('ajax error');
                    }
                }
            });
        }
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
                    changeFilterValue(3);
                },
                error: function (e) {
                    if (window.console && window.console.log) {
                        console.log('ajax error');
                    }
                }
            });
        }
    }

    function changeFilterValue(filter_value) {
        $.ajax({
            type: "GET",
            url: SITE_URL + "category/listFavoriteAdUsingAjaxProfile",
            data: {filter_value:filter_value},
            cache: false,
            dataType:"json",
            beforeSend: function() {
                $('#loader').html('<img src="'+SITE_URL+'images/ajax-loader.gif" alt="" width="24" height="24" style="padding-left: 400px; margin-top:10px;" >');
            },
            success: function(data) {
                $(".info-cards").html(data.html);
                $('#loader').html('');
            }
        });
    }

    $(document).ready(function() {
        changeFilterValue(3);
    });


</script>