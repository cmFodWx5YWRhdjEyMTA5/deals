<?php
$baseUrl = Yii::app()->request->getBaseUrl(true);

?>

<div class="container">
    <div class="profile section">
        <div class="uzr-dashboard">
            <div class="uzr-options-area clearfix">
                <div id="tabs-dashboard-01" class="uzr-panels" style="width: 100%;">
                    <div class="inner">
                        <div id="tab004" class="uzr-panel tab-panel">
                            <a class="tab-accordion-trigger" href="#tab004">
                                <span><i class="adicon-heart"></i></span>
                                Favourite Ads
                            </a>
                            <header>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6">
                                        <div class="icon-heading">
                                            <h4><i class="adicon-heart tc12"></i>CAREER</h4>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-6">
                                        <div align="right">
                                            <!--<a href="javascript:void (0);" onclick="redirectUrl()" class="btn">Create Resume</a>-->
                                        </div>
                                        <div class="listing-actions pull-left" data-target="#items-listing-area" style="margin-top: -40px">
                                            <div class="inner">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <div class="inner">
                                <div class="items-list-md style2 style3 pad-top-0">
                                    <div id="items-listing-area" class="items-list clearfix">
                                        <?php
                                        $counter = 0;
                                        if(!empty($all_job_details)){
                                            foreach ($all_job_details as $job){ ?>
                                                <article class="item-spot" style="height: 160px;">
                                                    <div class="item-content job" style="margin-left: -130px;">
                                                        <header>
                                                            <h4><a href="<?php echo $baseUrl."/job-details?job_id=".urlencode(base64_encode($job['id'])) ?>" target="_blank"><?=$job['title']?></a></h4>
                                                            <span class="col-sm-12" style="padding-left: 0px;"><b>Education : </b><?php echo strip_tags($job['educational_req'])?></span>
                                                            <span class="col-sm-12" style="padding-left: 0px;"><b>No. of vacancy :</b> <?=$job['vacancy']?></span>
                                                            <span class="col-sm-12" style="padding-left: 0px;"><b>Last Date of Application :</b> <?=date('Y-m-d', strtotime($job['deadline']));?></span>
                                                        </header>
                                                        <div class="price-tag"></div>
                                                        <div class="dashboard-btn-actions">
                                                            <a href="<?php echo $baseUrl."/job-details?job_id=".urlencode(base64_encode($job['id'])) ?>" class="btn btn-transparent" target="_blank">view</a>
                                                            <a href="javascript:void(0);" class="btn btn-transparent apply" data-item="<?=$job['id']?>">Apply</a>
                                                        </div>
                                                    </div>
                                                </article>
                                            <?php  $counter++;
                                            } 
                                        } else {
                                            echo "<h4 style='text-align:center'>No Job available right now</h4>";
                                        }
                                        
                                        ?>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div><!--panel-->
                <?php echo $this->renderPartial('../elements/job_apply_modal'); ?>
            </div>
        </div>
    </div>
</div>