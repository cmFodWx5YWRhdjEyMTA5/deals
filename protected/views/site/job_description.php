<style type="text/css">
    .job_title {
        color: #000 !important;
    }
    .company_logo {
        float: left; 
        margin-right: 20px;
    }
    .company_logo img{
        width: 220px !important;
        padding-top: 10px;
    }
    .employer_name {
        font-size: 36px;
        text-transform: uppercase;
        line-height: 76px;
    }
</style>
<section id="main" class="clearfix contact-us">
    <div class="container">
        <div class="web-app">
            <div class="app-canvas">
                <div class="">
                    <div class="page contextual-page mb-0">
                        <div class="inner">

                            <header class="page-header text-center" style="padding: 5px !important;">
                                <p>
                                    <a href="<?php echo $company_link ?>" target="_blank" class="company_logo">
                                        <img src="<?=$employer_details->image?>">
                                    </a>
                                    <span class="employer_name"><?=$employer_details->enterprise_name?></span>
                                    <div style="clear: both;"></div>
                                </p>
                                
                            </header>

                            <div class="text-widget">
                                <div class="inner">
                                    <h3 class="job_title"><strong>Job Title: </strong><?=$job_details[0]['title']?></h3>
                                    <h4>Vacancy</h4>
                                    <p><?=$job_details[0]['vacancy']?></p>
                                    <hr>

                                    <h4>Job Description / Responsibility:</h4>

                                    <p><?=$job_details[0]['description']?></p>

                                    <hr>
                                    <h4>Educational Requirements:</h4>
                                    <p><?=$job_details[0]['educational_req']?></p>
                                    <hr>

                                    <h4>Experience Requirements:</h4>
                                    <p><?=$job_details[0]['experiment_req']?></p>

                                    <?php if($job_details[0]['additional']){ ?>
                                    <h4>Additional Requirements:</h4>
                                    <p><?=$job_details[0]['additional']?></p>
                                    <?php } ?>

                                    <h4>Job Requirements</h4>
                                    <p><?=$job_details[0]['job_req']?></p>
                                    <h4>Job Nature:</h4>
                                    <p><?=$job_details[0]['job_type']?></p>

                                    <h4>Salary:</h4>
                                    <p><?=$job_details[0]['salary']?></p>

                                    <h4>Job Location:</h4>
                                    <p><?=$job_details[0]['job_location']?></p>

                                    <h4>Last Date of Application:</h4>
                                    <p><?=date('Y-m-d', strtotime($job_details[0]['deadline']))?></p>
                                    <hr>

                                    </div>
                            </div>
                            <div class="text-widget">
                                <div class="inner" style="text-align: center;">
                                    <a href="javascript::void(0)"  class="btn btn-theme apply" data-item="<?=$job_details[0]['id']?>">Apply Now</a>
                                </div>
                            </div>

                        </div>
                    </div>  


                </div>

                
            </div>
        </div>


        <!--======================================
        Modals
        =======================================-->
        <?php echo $this->renderPartial('../elements/job_apply_modal'); ?>
    </div>
</section>

