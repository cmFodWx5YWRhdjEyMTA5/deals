<?php
$baseUrl = Yii::app()->request->getBaseUrl(true);

?>
<div class="modal fade" id="myModal_for_job" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 600px">
        <div class="modal-content" style="position: relative;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Apply For <div class="result"></div></h4>
            </div>
            <div class="modal-body">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'sending-job-application-form',
                    'enableAjaxValidation'=>false,
                    'action'=>$baseUrl.'/site/SendApplicationForJob',
                    'enableClientValidation'=>false,
                    'htmlOptions'=>array(
                        'enctype' => 'multipart/form-data',
                    ),

                ));
                ?>
                <input type="hidden" id="job_id" name="job_id" value="" />
                <div class="row">
                    <p id="error_message"></p>
                </div>
                <div class="row">
                    <div class="row form-group item-description" title="Name">
                        <label class="col-sm-3 label-title">Name</label>
                        <div class="col-sm-9">
                            <?php if(isset($loggedin_user)) { ?>
                                <span><?php echo $loggedin_user->user_name ?></span>
                                <input type="hidden" class="form-control" name="applicant_name" id="applicant_name" value="<?php echo $loggedin_user->user_name ?>" />
                            <?php } else { ?>
                                <input type="text" class="form-control" name="applicant_name" id="applicant_name" placeholder="Your name" required />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row form-group item-description" title="Email">
                        <label class="col-sm-3 label-title">Email</label>
                        <div class="col-sm-9">
                            <?php if(isset($loggedin_user)) { ?>
                                <span><?php echo $loggedin_user->email ?></span>
                                <input type="hidden" class="form-control" name="applicant_email" id="applicant_email" value="<?php echo $loggedin_user->email ?>" />
                            <?php } else { ?>
                                <input type="email" class="form-control" name="applicant_email" id="applicant_email" placeholder="Your Email" required />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row form-group item-description" title="Phone">
                        <label class="col-sm-3 label-title">Phone</label>
                        <div class="col-sm-9">
                            <?php if(isset($loggedin_user)) { ?>
                                <span><?php echo $loggedin_user->phone_number ?></span>
                                <input type="hidden" class="form-control" name="applicant_phone" id="applicant_phone" value="<?php echo $loggedin_user->phone_number ?>" />
                            <?php } else { ?>
                                <input type="tel" class="form-control" name="applicant_phone" id="applicant_phone" placeholder="Your Phone" required />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row form-group item-description" title="Phone">
                        <label class="col-sm-3 label-title">Address</label>
                        <div class="col-sm-9">
                            <?php if(isset($loggedin_user)) { ?>
                                <textarea class="form-control" name="applicant_address" id="applicant_address" placeholder="Your Address" rows="8" cols="4" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type few lines about your ad here. It's important to highlight your ad."><?php echo $loggedin_user->address ?></textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="applicant_address" id="applicant_address" placeholder="Your Address" rows="8" cols="4" data-container="body" data-toggle="popover" data-trigger="focus" data-content="Type few lines about your ad here. It's important to highlight your ad."></textarea>
                            <?php } ?>
                        </div>
                    </div>
                                    <span style="display: none; padding-left: 10px; width: 50px; float: left;" id="favorite-send-loading">
                                            <img alt="Loading..." src="/images/loader.gif">
                                    </span>
                    <input name="userfile" type="file" id="userfile"> (Upload your resume. Only .pdf and .doc allowed)
                    <div align="left" class="register_status"></div>
                    <button type="submit" id="apply_button" class="btn-theme">Send Request</button>
                </div>
                <div class="clr"></div>
                <?php $this->endWidget();?>
            </div><!-- slider -->
        </div>
    </div>
</div>

<script>
    $('a.apply').on('click', function () {
        $('#job_id').val($(this).attr('data-item'));
        $('#myModal_for_job').modal('show');
    });

    $('#sending-job-application-form').on('submit',function(){
        var unsupported_file = false;
        var  sel_files  = $('#userfile').val();
        if(!sel_files){
            $('#error_message').html('Please select your CV');
            return false;
        }

//        if(!unsupported_file){
//            $('#error_message').html('File type not supported');
//            return false;
//        }
        return true;
    });
</script>