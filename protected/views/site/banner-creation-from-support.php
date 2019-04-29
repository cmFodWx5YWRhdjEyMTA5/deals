<div id="tabs-dashboard-01" class="uzr-panels row">
    <div class="inner" style="width: 1000px; margin: 0 auto">
        <div id="tab009" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab007">
                <span><i class="adicon-settings"></i></span>
                Promotion Banner
            </a>

            <div class="row estore_configuration">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <div class="icon-heading">
                            <h4><i class="adicon-create tc4"></i> Promotion Banner</h4>
                        </div>
                    </div>
                </div>

                <div class="inner">
                    <div class="basic-card">
                        <header>
                            <h5>Banner Details</h5>
                        </header>
                        <div class="inner">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <form action="site/uploadBanner" id="estore-create-from-support"
                                          method="post">
                                        <input type="hidden" id="user_id" class="form-control" name="user_id"
                                               value="<?php echo $user_details->id ?>">

                                        <div class="row">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" id="company_name" name="company_name" value="<?php echo  $user_details->user_name ?>"
                                                       readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="sel1">Select Page:</label>
                                                <select id="banner_location" class="form-control">
                                                    <?php
                                                    $all_page_list = Generic::getAllPageForBannerAds();
                                                    foreach ($all_page_list as $key => $individual_page) {
                                                        ?>
                                                        <option value="<?= $key ?>"><?= $individual_page ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id ="banner_location_all" class="row">
                                            <input type="hidden" id="banner_location_value" value="">

                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Upload Banner</label>
                                                <input type="file" name="files" id="filer_input4">
                                                <input type="hidden" name="banner_image" value="" id="logo_image">
                                            </div>
                                        </div>
                                        <button type="submit" id="estore_submit" class="btn btn-small btn-green">Upload Banner
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--basic-card-->

                </div>
            </div>

        </div>
        <!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>

<style>

    .show {
        width: 900px;
        clear: both;
    }

    .firsts {
        background-color: #ffe6e6;
        width: 200px;
        float: left;
    }

    .mid {
        padding-left: 30px;
        float: left;
        text-align: center;
        width: 369px;

    }

    .ends {
        background-color: #ffe6e6;
        width: 200px;
        float: left;
    }

    input[type="file"] {

        display: inline;
    }

    .imageThumb {
        max-height: 75px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
        display: inline;
    }

</style>

<script>
    $(document).ready(function () {

        $("#banner_location").change(function() {
            var selected_value = ( $('option:selected', this).val() );
            $.ajax({
                type:"POST",
                dataType:"json",
                url:SITE_URL + "site/LoadAdsValue",
                data:{selected_value:selected_value,from_support:1},
                success: function (data) {
                    $("#banner_location_all").html(data.html);
                },
                error:function(){
                    console.log('ajax error')}
            });
        });

    });


</script>



