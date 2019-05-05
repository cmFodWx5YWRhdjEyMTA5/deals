<!-- main -->
<section id="main" class="clearfix published-page">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="congratulations">
                    <i class="fa fa-check-square-o"></i>
                    <h2>Congratulations!</h2>
                    <h4>Your ad will be Published soon.</h4>
                    <br>
                    <button id="myBtn" class="btn-danger">Preview Your Ad</button>
                </div>

            </div>
        </div><!-- row -->
    </div><!-- container -->
</section><!-- main -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ad Preview</h4>
            </div>
            <div class="modal-body">

                <div class="section slider">
                            <div class="row">
                                <!-- carousel -->
                                <div class="col-md-7">
                                    <div id="product-carousel" class="carousel slide" data-ride="carousel">

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <!-- item -->

                                            <?php
                                            $counter = 0;
                                            $images = json_decode($job_details->image_url);
                                            foreach( $images as $image )
                                            {
                                                if($counter == 0){
                                                    echo '<div class="item active">';
                                                } else {
                                                    echo '<div class="item">';
                                                }
                                                $counter++;
                                                ?>
                                            <div class="carousel-image">
                                                <img src="<?=$image?>" alt="Featured Image" class="img-responsive">
                                            </div>
                                            </div>
                                           <?php } ?>


                                        </div><!-- carousel-inner -->

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                        <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                                            <i class="fa fa-chevron-right"></i>
                                        </a><!-- Controls -->
                                    </div>
                                </div><!-- Controls -->

                                <!-- slider-text -->
                                <div class="col-md-5">
                                    <div class="slider-text">
                                        <h3 style="color:#00a651;"><?=$job_details['title']?></h3>
                                        <h4 style="color:#a6525a;">Salary: <?php if($job_details['salary'] != 'n/a') echo $job_details['salary']." BDT"; else "N/A"; ?></h4>
                                        <h6>Application Deadline: <?php $deadline_date = new \DateTime($job_details->deadline); echo $deadline_date->format('d M, Y') ?></h6>
                                        <!-- short-info -->
                                        <div class="short-info">

                                            <h4>Job Information</h4>

                                            <p><strong>Phone Number: </strong><?=$user_details->phone_number?></p>
                                            <p><strong>Type: </strong><?=$job_details->job_type?></p>
                                            <p><strong>Additional: </strong><?=$job_details->additional?></p>
                                            <p><strong>Location: </strong><?=$job_details->job_location?></p>
                                        </div><!-- short-info -->

                                    </div>
                                </div><!-- slider-text -->
                            </div>

                            <div class="description" style="margin-bottom: -125px; border-top: 1px solid #e5e5e5;">
                                <h4>Description</h4>
                                <p style="text-align: justify;"><?=$job_details['description']?> </p><br>
                            </div>
                        </div><!-- slider -->


            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        // Attach Button click event listener
        $("#myBtn").click(function(){

            // show Modal
            $('#myModal').modal('show');
        });
    });
</script>


