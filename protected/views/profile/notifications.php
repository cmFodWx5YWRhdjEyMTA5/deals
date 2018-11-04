
<?php

$info_array = array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
);
if(isset($service)){
    $info_array['service'] = $service;
    $info_array['service_plan'] = $service_plan;
}

echo $this->renderPartial($sidebar_type,$info_array);
?>


<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">

        <div id="tab003" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab003">
                <span><i class="adicon-envelope"></i></span>
                Notifications
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="icon-heading">
                            <h4><i class="adicon-envelope tc7"></i> Notifications</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-6">
                        <?php
                        $this->renderPartial("/elements/notification",array('register_type' => $register_type));
                        ?>
                    </div>
                </div>

            </header>
            <div class="inner">

                <div class="msg-list">

                    <?php
                        foreach ($messages as $message) {
                        $message = (object) $message;
                    ?>
                    <div class="msg-unit">
                        <div class="msg-content">
                            <figure title="View Sender Profile" class="show_sender" data-value="<?php echo $message->id ?>" style="cursor:pointer;">
                                <img src="<?php echo Yii::app()->request->getBaseUrl()."/images/logo.jpg"; ?>" alt="sender image">
                            </figure>
                            <header title="Read Message" class="show_message" data-value="<?php echo $message->id ?>" style="cursor: pointer">
                                <strong><?php if($message->sender_id) { echo ''; } else { echo 'business@bdbroadbanddeals.com'; } ?> </strong>
                            </header>
                            <div class="msg-body" data-value="<?php echo $message->id ?>">
                                <p>
                                    <?php
                                    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $message->short_desc);
                                    $string = str_replace("\n", " ", $string);
                                    $array = explode(" ", $string);
                                    if (count($array)<= $word_count)
                                    {
                                        $retval =  $string;
                                    }
                                    else
                                    {
                                        array_splice($array, $word_count);
                                        $retval = implode(" ", $array);
                                    }
                                    $string_length = strpos($retval,'<b>');
                                    if($string_length < 1) {
                                        echo $retval;
                                    } else {
                                        echo substr($retval,0,$string_length);
                                    }

                                    ?>
                                </p>
                                <div class="msg-time">
                                    <?php

                                    $post_date = new \DateTime($message->create_date);
                                    $current_time = new \DateTime();
                                    $time_difference = $current_time->diff($post_date);

                                    if($time_difference->y) {
                                        echo $time_difference->y." year ago";
                                    } else {
                                        if($time_difference->m){
                                            echo $time_difference->m." month ago";
                                        } else {
                                            if($time_difference->d) {
                                                echo $time_difference->d." days ago";
                                            } else {
                                                if($time_difference->h) {
                                                    echo $time_difference->h." hour ago";
                                                } else {
                                                    if($time_difference->i) {
                                                        echo $time_difference->i." min ago";
                                                    } else {
                                                        echo $time_difference->s." sec ago";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="msg-actions">
                            <ul>
                                <li><a class="tc12-hover delete-message" href="javascript:void(0)" data-value="<?php echo $message->id ?>" title="delete notification"><i class="adicon-recyclebin"></i></a></li>
                            </ul>
                        </div>
                    </div><!--msg-unit-->
                    <?php } ?>

                </div>



            </div><!--inner-->
        </div><!--panel-->
    </div>
</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="message_details_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Notification Details</h4>
            </div>
            <div class="modal-body">
                <div class="row col-sm-12" id="full_message">
                </div>
                <div class="clr"></div>
            </div><!-- slider -->
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        $('.delete-message').on('click',function () {
            value = $(this).attr('data-value');
            var confirmation = confirm('Are you sure to delete this notification');
            if(confirmation) {
                $.ajax({
                    type: 'POST',
                    url: SITE_URL + "profile/deleteAlertNotification",
                    data: {message_id: value},
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 'success') {
                            alert('Notification deleted successfully');
                            location.reload();
                        }
                    }
                });
            }
        });

        
        $('.show_message,.msg-body').on('click',function () {
            message_id = $(this).attr('data-value');
            $.ajax({
                type: 'POST',
                url: SITE_URL + "profile/getNotificationDetails",
                data: {message_id: message_id},
                cache: false,
                dataType: "json",
                success: function (response) {
                    if(response.status == 'success') {
                        $('#full_message').html(response.html);
                        $('#message_details_modal').modal('show');
                    }
                }
            });

        });

    });

</script>