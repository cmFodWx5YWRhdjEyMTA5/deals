
<?php
/**
 * Created by PhpStorm.
 * User: KHASHRUL
 * Date: 10/10/2016
 * Time: 1:01 PM
 */
$baseUrl = Yii::app()->request->baseUrl;
$category_list = Generic::getAllCategory();
$all_category_list = Generic::getAllCategoryData();

$baseUrl = Yii::app()->request->baseUrl;
//$token = Yii::app()->request->getParam('uid');
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$register_type = isset($profile_data) && !empty($profile_data)? $profile_data['register_type']:'';

$session =  Yii::app()->session['user_token'];
$style = "";
if($register_type=="business"){
    $style = "display:none";
}

$select_location = (isset($_REQUEST['selected_location']) && $_REQUEST['selected_location'] != '') ? $_REQUEST['selected_location'] : "Select Location" ;
$search_keyword= (isset($_REQUEST['q'])) ? $_REQUEST['q'] : "" ;

?>

<!-- End Top Header -->
<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="logo">
                        <a class="navbar-brand" href="/"><img class="img-responsive" src="<?=$baseUrl?>/images/logo.png" alt="Logo" width="300" height="65" style="margin-top:-22px ;margin-left: -18px;"></a>

                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="smart-search">
                        <div class="select-category">
                            <a href="#" class="category-toggle-link"><span>All Categories</span></a>
                            <ul class="list-category-toggle sub-menu-top">

                                <?php
                                $category_name = "";
                                $id = 0;
                                $icon = 0;
                                $cat = 0;
                                foreach($category_list as $value){
                                    if($value['parent_id'] == $id){
                                        $category_name = $value['category_name'];
                                        $category_Id = $value['category_id'];
                                        $category_slug = $value['category_slug'];
                                        $category_icon = $value['category_icon'];
                                        $icon ++;
                                        $cat ++;
                                    }?>

                                    <li><a href="grid.html"><?=$category_name?></a></li>


                                <?php }?>
                            </ul>
                        </div>
                        <form class="smart-search-form">
                            <input type="text" value="I am shopping for..." onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" />
                            <input type="submit" value="" />
                        </form>
                    </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12 hidden-xs">
                    <div class="mini-cart-button">
                        <a href="javascript:void(0);" onclick="CheckLogin()" class="mini-cart-view">Post Your Ad</a>
                    </div>


                    <!-- End Mini Cart -->
                </div>
            </div>
        </div>

