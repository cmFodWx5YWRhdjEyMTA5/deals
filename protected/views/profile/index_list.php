<?php


$baseUrl = Yii::app()->request->baseUrl;


$token = Yii::app()->request->getParam('uid');
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$email = isset($profile_data['email']) ? $profile_data['email'] : '';
$phone_number = isset($profile_data['phone_number']) ? $profile_data['phone_number'] : '';
?>
<?php echo $this->renderPartial('../elements/_search_form'); ?>
<!-- ad-profile-page -->

<div class="row">
    <div class="col-sm-9 col-sm-push-3">
        <div class="category-description std">
            <img class="" src="images/inside-images/listing-banner.jpg" alt="category-banner">
        </div>
        <article class="col-main">
            <h2 class="page-heading"> <span class="page-heading-title">Women</span> </h2>
            <div class="display-product-option">
                <div class="pager hidden-xs">
                    <div class="pages">
                        <ul class="pagination">
                            <li><a href="#">&laquo;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="sorter">
                    <div class="view-mode"> <a class="button button-grid" title="Grid" href="<?php echo Yii::app()->createUrl('/userprofile');?>">&nbsp;</a><span class="button button-active button-list" title="List">&nbsp;</span> </div>
                </div>
            </div>
            <div class="category-products">
                <ol class="products-list" id="products-list">
                    <li class="item first">
                        <div class="product-image"> <a href="product_detail.html" title="ThinkPad X1 Ultrabook"> <img class="small-image" src="images/inside-images/product1.jpg" alt="ThinkPad X1 Ultrabook"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="HTC Rhyme Sense">ThinkPad X1 Ultrabook</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:50%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box">
                                <p class="old-price"> <span class="price-label"></span> <span class="price"> $442.99 </span> </p>
                                <p class="special-price"> <span class="price-label"></span> <span class="price"> $222.99 </span> </p>
                            </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item even">
                        <div class="product-image"> <a href="product_detail.html" title="Samsung GALAXY Note"> <img class="small-image" src="images/inside-images/product2.jpg" alt="Samsung GALAXY Note"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="Samsung GALAXY Note">Samsung GALAXY Note</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:10%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$99.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item odd">
                        <div class="product-image"> <a href="product_detail.html" title="30&quot; Flat-Panel HD Monitor"> <img class="small-image" src="images/inside-images/product3.jpg" alt="30&quot; Flat-Panel HD Monitor"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="30&quot; Flat-Panel HD Monitor">Epson L360 Printer</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:0%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$699.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item even">
                        <div class="product-image"> <a href="product_detail.html" title="QX30 Lens Camera"> <img class="small-image" src="images/inside-images/product4.jpg" alt="QX30 Lens Camera"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="QX30 Lens Camera">QX30 Lens Camera</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:80%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$399.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item odd">
                        <div class="product-image"> <a href="product_detail.html" title="Smart Watch A9 "> <img class="small-image" src="images/inside-images/product5.jpg" alt="Smart Watch A9"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="Smart Watch A9 ">Smart Watch A9</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:100%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item even">
                        <div class="product-image"> <a href="product_detail.html" title="Seagate 500GB HD"> <img class="small-image" src="images/inside-images/product6.jpg" alt="Seagate 500GB HD"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="Seagate 500GB HD">Seagate 500GB HD</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:90%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$299<span class="sub">.00</span></span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item odd">
                        <div class="product-image"> <a href="product_detail.html" title="Canon Zoom Camera"> <img class="small-image" src="images/inside-images/product7.jpg" alt="Canon Zoom Camera"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="Canon Zoom Camera">Canon Zoom Camera</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:60%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$2,049.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item even">
                        <div class="product-image"> <a href="product_detail.html" title="24&quot; Widescreen LCD Monitor"> <img class="small-image" src="images/inside-images/product8.jpg" alt="24&quot; Widescreen LCD Monitor"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="24&quot; Widescreen LCD Monitor">24\" Widescreen LCD Monitor</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:20%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$699.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item odd">
                        <div class="product-image"> <a href="product_detail.html" title="Logitech Optical Trackman"> <img class="small-image" src="images/inside-images/product9.jpg" alt="Logitech Optical Trackman"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="Logitech Optical Trackman">Logitech Optical Trackman</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:25%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$79.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                    <li class="item last even">
                        <div class="product-image"> <a href="product_detail.html" title="iPhone 6 Plus"> <img class="small-image" src="images/inside-images/product10.jpg" alt="iPhone 6 Plus"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="product_detail.html" title="iPhone 6 Plus">iPhone 6 Plus</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:80%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Reviews</a> <span class="separator">|</span> <a href="##review-form">Add Your Review</a> </p>
                            </div>
                            <div class="desc std">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged... <a class="link-learn" title="" href="product_detail.html">Learn More</a> </p>
                            </div>
                            <div class="price-box"> <span class="regular-price"> <span class="price">$239.99</span> </span> </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                            </div>
                        </div>
                    </li>
                </ol>
                <div class="toolbar">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div id="sort-by">
                                <label class="left">Sort By: </label>
                                <ul>
                                    <li><a href="#">Position<span class="right-arrow"></span></a>
                                        <ul>
                                            <li><a href="#">Name</a></li>
                                            <li><a href="#">Price</a></li>
                                            <li><a href="#">Position</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-7 col-md-5">
                            <div class="pager">
                                <div class="pages">
                                    <label>Page:</label>
                                    <ul class="pagination">
                                        <li><a href="#">&laquo;</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-md-3">
                            <div id="limiter">
                                <label>View: </label>
                                <ul>
                                    <li><a href="#">09<span class="right-arrow"></span></a>
                                        <ul>
                                            <li><a href="#">15</a></li>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#">30</a></li>
                                            <li><a href="#">35</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> </div>
                        </div>
                    </div>
                </div>
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
                        <li> <a class="active" href="grid.html">Audio & Video</a> <span class="subDropdown minus"></span>
                            <ul class="level0_415" style="display:block">
                                <li> <a href="grid.html"> Audio Components </a> <span class="subDropdown plus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Evening Tops </a> </li>
                                        <li> <a href="grid.html"> Shirts &amp; Blouses </a> </li>
                                        <li> <a href="grid.html"> Tunics </a> </li>
                                        <li> <a href="grid.html"> Vests </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Video Accesories </a> <span class="subDropdown plus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Bags </a> </li>
                                        <li> <a href="grid.html"> Designer Handbags </a> </li>
                                        <li> <a href="grid.html"> Purses </a> </li>
                                        <li> <a href="grid.html"> Shoulder Bags </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Televisions </a> <span class="subDropdown plus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Flat Shoes </a> </li>
                                        <li> <a href="grid.html"> Flat Sandals </a> </li>
                                        <li> <a href="grid.html"> Boots </a> </li>
                                        <li> <a href="grid.html"> Heels </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Headsets </a>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Bracelets </a> </li>
                                        <li> <a href="grid.html"> Necklaces &amp; Pendants </a> </li>
                                        <li> <a href="grid.html"> Pins &amp; Brooches </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Videography </a> <span class="subDropdown plus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Casual Dresses </a> </li>
                                        <li> <a href="grid.html"> Evening </a> </li>
                                        <li> <a href="grid.html"> Designer </a> </li>
                                        <li> <a href="grid.html"> Party </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Audio Chipset </a> <span class="subDropdown plus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Bras </a> </li>
                                        <li> <a href="grid.html"> Bodies </a> </li>
                                        <li> <a href="grid.html"> Lingerie Sets </a> </li>
                                        <li> <a href="grid.html"> Shapewear </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                            </ul>
                            <!--level0-->
                        </li>
                        <!--level 0-->
                        <li> <a href="grid.html">Computer</a> <span class="subDropdown plus"></span>
                            <ul class="level0_455" style="display:none">
                                <li> <a href="grid.html"> Shoes </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Flat Shoes </a> </li>
                                        <li> <a href="grid.html"> Boots </a> </li>
                                        <li> <a href="grid.html"> Heels </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Jewellery </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Bracelets </a> </li>
                                        <li> <a href="grid.html"> Necklaces &amp; Pendants </a> </li>
                                        <li> <a href="grid.html"> Pins &amp; Brooches </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Dresses </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Casual Dresses </a> </li>
                                        <li> <a href="grid.html"> Evening </a> </li>
                                        <li> <a href="grid.html"> Designer </a> </li>
                                        <li> <a href="grid.html"> Party </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Jackets </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Coats </a> </li>
                                        <li> <a href="grid.html"> Jackets </a> </li>
                                        <li> <a href="grid.html"> Leather Jackets </a> </li>
                                        <li> <a href="grid.html"> Blazers </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Swimwear </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Swimsuits </a> </li>
                                        <li> <a href="grid.html"> Beach Clothing </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                            </ul>
                            <!--level0-->
                        </li>
                        <!--level 0-->
                        <li> <a href="grid.html">Appliances</a> <span class="subDropdown plus"></span>
                            <ul class="level0_482" style="display:none">
                                <li> <a href="grid.html"> Smartphones </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Samsung </a> </li>
                                        <li> <a href="grid.html"> Apple </a> </li>
                                        <li> <a href="grid.html"> Blackberry </a> </li>
                                        <li> <a href="grid.html"> Nokia </a> </li>
                                        <li> <a href="grid.html"> HTC </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Cameras </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> Digital Cameras </a> </li>
                                        <li> <a href="grid.html"> Camcorders </a> </li>
                                        <li> <a href="grid.html"> Lenses </a> </li>
                                        <li> <a href="grid.html"> Filters </a> </li>
                                        <li> <a href="grid.html"> Tripod </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                                <li> <a href="grid.html"> Accesories </a> <span class="subDropdown minus"></span>
                                    <ul class="level1" style="display:none">
                                        <li> <a href="grid.html"> HeadSets </a> </li>
                                        <li> <a href="grid.html"> Batteries </a> </li>
                                        <li> <a href="grid.html"> Screen Protectors </a> </li>
                                        <li> <a href="grid.html"> Memory Cards </a> </li>
                                        <li> <a href="grid.html"> Cases </a> </li>
                                        <!--end for-each -->
                                    </ul>
                                    <!--level1-->
                                </li>
                                <!--level1-->
                            </ul>
                            <!--level0-->
                        </li>
                        <!--level 0-->
                        <li> <a href="grid.html">Mobile Electronics</a> </li>
                        <!--level 0-->
                        <li class="last"> <a href="grid.html">Desktop</a> </li>
                        <!--level 0-->
                    </ul>
                </div>
                <!--box-content box-category-->
            </div>
            <div class="hot-banner"><img alt="banner" src="images/inside-images/hot-trends-banner.jpg"></div>
            <div class="block block-layered-nav">
                <div class="block-title">Shop By</div>
                <div class="block-content">
                    <p class="block-subtitle">Shopping Options</p>
                    <dl id="narrow-by-list">
                        <dt class="odd">Price</dt>
                        <dd class="odd">
                            <ol>
                                <li> <a href="#"><span class="price">$0.00</span> - <span class="price">$99.99</span></a> (6) </li>
                                <li> <a href="#"><span class="price">$100.00</span> and above</a> (6) </li>
                            </ol>
                        </dd>
                        <dt class="even">Manufacturer</dt>
                        <dd class="even">
                            <ol>
                                <li> <a href="#">TheBrand</a> (9) </li>
                                <li> <a href="#">Company</a> (4) </li>
                                <li> <a href="#">LogoFashion</a> (1) </li>
                            </ol>
                        </dd>
                        <dt class="odd">Color</dt>
                        <dd class="odd">
                            <ol>
                                <li> <a href="#">Green</a> (1) </li>
                                <li> <a href="#">White</a> (5) </li>
                                <li> <a href="#">Black</a> (5) </li>
                                <li> <a href="#">Gray</a> (4) </li>
                                <li> <a href="#">Dark Gray</a> (3) </li>
                                <li> <a href="#">Blue</a> (1) </li>
                            </ol>
                        </dd>
                        <dt class="last even">Size</dt>
                        <dd class="last even">
                            <ol>
                                <li> <a href="#">S</a> (6) </li>
                                <li> <a href="#">M</a> (6) </li>
                                <li> <a href="#">L</a> (4) </li>
                                <li> <a href="#">XL</a> (4) </li>
                            </ol>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="block block-cart">
                <div class="block-title ">My Cart</div>
                <div class="block-content">
                    <div class="summary">
                        <p class="amount">There are <a href="shopping_cart.html">3 items</a> in your cart.</p>
                        <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$42.99</span> </p>
                    </div>
                    <div class="ajax-checkout">
                        <button class="button button-checkout" title="Submit" type="submit"><span>Checkout</span></button>
                    </div>
                    <p class="block-subtitle">Recently added item(s) </p>
                    <ul>
                        <li class="item"> <a href="shopping_cart.html" title="iPhone 6 Plus" class="product-image"><img src="images/inside-images/product10.jpg" alt="iPhone 6 Plus"></a>
                            <div class="product-details">
                                <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
                                <strong>1</strong> x <span class="price">$19.99</span>
                                <p class="product-name"> <a href="shopping_cart.html">iPhone 6 Plus</a> </p>
                            </div>
                        </li>
                        <li class="item last"> <a href="shopping_cart.html" title="ThinkPad X1 Ultrabook" class="product-image"><img src="images/inside-images/product1.jpg" alt="ThinkPad X1 Ultrabook"></a>
                            <div class="product-details">
                                <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
                                <strong>1</strong> x <span class="price">$8.00</span>
                                <p class="product-name"> <a href="shopping_cart.html"> ThinkPad X1 Ultrabook </a> </p>

                                <!--access clearfix-->
                            </div>
                        </li>
                        <li class="item last"> <a href="shopping_cart.html" title="Smart Watch A9" class="product-image"><img src="images/inside-images/product5.jpg" alt="Smart Watch A9"></a>
                            <div class="product-details">
                                <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
                                <strong>1</strong> x <span class="price">$15.00</span>
                                <p class="product-name"> <a href="shopping_cart.html"> Smart Watch A9 </a> </p>

                                <!--access clearfix-->
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="block block-compare">
                <div class="block-title ">Compare Products (2)</div>
                <div class="block-content">
                    <ol id="compare-items">
                        <li class="item odd">
                            <input type="hidden" value="2173" class="compare-item-id">
                            <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> ThinkPad X1 Ultrabook</a> </li>
                        <li class="item last even">
                            <input type="hidden" value="2174" class="compare-item-id">
                            <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> QX30 Lens Camera</a> </li>
                    </ol>
                    <div class="ajax-checkout">
                        <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
                        <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
                    </div>
                </div>
            </div>

            <div class="block block-list block-viewed">
                <div class="block-title"> Recently Viewed </div>
                <div class="block-content">
                    <ol id="recently-viewed-items">
                        <li class="item odd">
                            <p class="product-name"><a href="#"> ThinkPad X1 Ultrabook </a></p>
                        </li>
                        <li class="item even">
                            <p class="product-name"><a href="#"> Samsung GALAXY Note </a></p>
                        </li>
                        <li class="item last odd">
                            <p class="product-name"><a href="#"> QX30 Lens Camera </a></p>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="block block-tags">
                <div class="block-title"> Popular Tags</div>
                <div class="block-content">
                    <ul class="tags-list">
                        <li><a href="#" style="font-size:98.3333333333%;">Camera</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">Notebook</a></li>
                        <li><a href="#" style="font-size:145%;">NOTE</a></li>
                        <li><a href="#" style="font-size:75%;">juicer</a></li>
                        <li><a href="#" style="font-size:110%;">Watch</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">Iron</a></li>
                        <li><a href="#" style="font-size:110%;">printer</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">scanner</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">iphone</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">dualsim</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">slim</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">HD</a></li>
                        <li><a href="#" style="font-size:75%;">laptop</a></li>
                        <li><a href="#" style="font-size:75%;">mobile</a></li>
                        <li><a href="#" style="font-size:75%;">nice</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">phone</a></li>
                        <li><a href="#" style="font-size:98.3333333333%;">red</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">tight</a></li>
                        <li><a href="#" style="font-size:75%;">trendy</a></li>
                        <li><a href="#" style="font-size:86.6666666667%;">young</a></li>
                    </ul>
                    <div class="actions"> <a href="#" class="view-all">View All Tags</a> </div>
                </div>
            </div>
        </aside>
    </div>
</div>
</div>
</section>
