
<section id="main" class="clearfix contact-us">
    <div class="container">
        <div class="web-app">
            <div class="app-canvas">
                <div class="">
                    <div class="page contextual-page mb-0">
                        <div class="inner">

                            <header class="page-header text-center">
                                <h3><?=$job_details[0]['title']?></h3>
                            </header>

                            <div class="text-widget">
                                <div class="inner">
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

                        </div>
                    </div>

                </div>

                <div class="section">
                    <div class="container">
                        <div class="row">
                            <div class="text-widget">
                                <div class="inner">
                                    <h4>Contact details</h4>
                                    <p><strong>Send your resume: </strong> support@bdbroadbanddeals.com</p>
                                    <p><strong>Customer Support telephone number:   </strong> +88-09639114455</p>
                                    <p><b>If you have any questions about this policy please contact our customer service using the contact us form.</b></p><br>
                                    <a href="javascript::void(0)"  class="btn btn-theme apply" data-item="<?=$job_details[0]['id']?>">Apply</a>
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

