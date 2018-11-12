<?php
$token = Yii::app()->session['user_token'];
$profile_data = Generic::getProfileData($token);
$user_name = isset($profile_data['user_name']) ? $profile_data['user_name'] : '';
$register_type = isset($profile_data['register_type']) ? $profile_data['register_type'] : '';
?>


<?php
echo $this->renderPartial($sidebar_type,array(
    'profile_data'=>$profile_data,
    'business_status' => $business_status,
    'store_url' => $store_url
));
?>


<div id="tabs-dashboard-01" class="uzr-panels">
    <div class="inner">

        <div id="tab003" class="uzr-panel tab-panel">
            <a class="tab-accordion-trigger" href="#tab003">
                <span><i class="adicon-envelope"></i></span>
                Messages
            </a>
            <header>
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <div class="icon-heading">
                            <h4><i class="adicon-envelope tc7"></i> Messages</h4>
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

                <div class="panel-actions">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <ul class="panel-action-list">
                                <li><a href="<?php echo $base_url ?>/my-profile/messages">Inbox</a></li>
                                <li><a href="<?php echo $base_url ?>/my-profile/messages/sent">Sent</a></li>
                                <li><a href="<?php echo $base_url ?>/my-profile/messages/read">Read</a></li>
                                <li><a href="<?php echo $base_url ?>/my-profile/messages/unread">Unread</a></li>
                                <li><a href="<?php echo $base_url ?>/my-profile/messages/starred">Starred</a></li>
                            </ul>
                        </div>
                        <!-- <div class="col-xs-12 col-md-6">
                            <ul class="text-right panel-action-list">
                                <li><a href="#" class="danger-hover">Mark as Read</a></li>
                                <li><a href="#" class="danger-hover">Delete</a></li>
                                <li>
                                    <div class="selection-dropdown">
                                        <div class="custom-check">
                                            <input id="select001" type="checkbox">
                                            <label for="select001"></label>
                                        </div>
                                        <button><i class="fa fa-caret-down"></i></button>
                                        <ul>
                                            <li><a href="#">All</a></li>
                                            <li><a href="#">None</a></li>
                                            <li><a href="#">Starred</a></li>
                                            <li><a href="#">Unread</a></li>
                                            <li><a href="#">Unstarred</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>

                <div class="msg-list">

                    <?php
                        //Generic::_setTrace($messages);
                        foreach ($messages as $message) {
                        $message = (object) $message;
                    ?>
                    <div class="msg-unit">
                        <div class="msg-content">
                            <figure title="View Sender Profile" class="show_sender" data-value="<?php echo $message->id ?>" message-type="<?php echo $message_type ?>" style="cursor:pointer;">
                                <img src="<?php if($message->image) { echo $message->image; } else { echo Yii::app()->request->getBaseUrl()."/images/user.jpg"; } ?>" alt="sender image">
                            </figure>
                            <header class="show_message" style="cursor: pointer">
                                <strong title="Read Message" class="show_message" data-value="<?php echo $message->id ?>" message-type="<?php echo $message_type ?>"><?php echo $message->sender_name ?> </strong>  | <?php echo $message->email ?> | <?php echo $message->phone ?> <span class="ad_id" data-value="<?php echo $message->ad_id ?>"><?php echo $message->title ?></span>
                            </header>
                            <div class="msg-body" data-value="<?php echo $message->id ?>" message-type="<?php echo $message_type ?>">
                                <p>
                                    <?php
                                    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $message->details);
                                    $string = str_replace("\n", " ", $string);
                                    $string = str_replace("<br>", "", $string);
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
                                    $message_duration = '';
                                    if($time_difference->y) {
                                        $message_duration = $time_difference->y." year ago";
                                    } else {
                                        if($time_difference->m){
                                            $message_duration = $time_difference->m." month ago";
                                        } else {
                                            if($time_difference->d) {
                                                $message_duration = $time_difference->d." days ago";
                                            } else {
                                                if($time_difference->h) {
                                                    $message_duration = $time_difference->h." hour ago";
                                                } else {
                                                    if($time_difference->i) {
                                                        $message_duration = $time_difference->i." min ago";
                                                    } else {
                                                        $message_duration = $time_difference->s." sec ago";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    echo $message_duration;
                                    ?>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="message_compose_time" id="message_compose_time" value="<?php echo $message_duration ?>" />
                        <div class="msg-actions">
                            <ul>
                                <?php if($message_type != 'sent') { ?>
                                <!-- <li><a class="tc reply-message" href="javascript:void(0)" data-value="<?php echo $message->id ?>" message-type="<?php echo $message_type ?>" title="reply"><i class="fa fa-reply"></i></a></li> -->
                                <?php } ?>
                                <li><a class="tc starr-message <?php if($message->is_starred) echo "starr-active"; ?>" href="javascript:void(0)" data-value="<?php echo $message->id ?>" message-type="<?php echo $message_type ?>" title="mark as starred"><i class="fa fa-star"></i></a></li>
                                <li><a class="tc12-hover delete-message" href="javascript:void(0)" data-value="<?php echo $message->id ?>" message-type="<?php echo $message_type ?>" title="delete message"><i class="adicon-recyclebin"></i></a></li>
                                <!-- <li>
                                    <div class="custom-check">
                                        <input id="select_<?php echo $message->id ?>" type="checkbox">
                                        <label for="select_<?php echo $message->id ?>"></label>
                                    </div>
                                </li> -->
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

<div class="modal fade" id="sender_details_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sender Details</h4>
            </div>
            <div class="modal-body">
                <div class="row col-sm-12" id="sender_details">

                </div>
                <div class="clr"></div>
            </div><!-- slider -->


        </div>

    </div>
</div>

<div class="modal fade" id="message_details_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Message Details</h4>
            </div>
            <div class="modal-body">
                <div class="row col-sm-12" id="full_message">
                </div>
                <br /><br /><br />
                <div class="row col-sm-12" id="reply_button_block">
                </div>
                <div class="clr"></div>
            </div><!-- slider -->
        </div>
    </div>
</div>

<div class="modal fade" id="message_reply_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 840px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Reply Message</h4>
            </div>
            <div class="modal-body">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'reply-form',
                    'enableAjaxValidation'=>false,
                    'action'=> $base_url.'/profile/saveMessage',
                    'enableClientValidation'=>false,

                ));
                ?>
                <div class="row col-sm-12" id="full_message"  style="overflow-y: scroll; max-height: 300px;">
                    <div contenteditable="true" id="reply_message" style="width: 100%; height: auto; min-height: 100px;" onblur="deselectReplyMessage()" onfocus="selectReplyMessage()" data-character-number="">
                    </div>
                </div>
                <div id="hidden_message_info">

                </div>
                <div class="row col-sm-12">
                    <br /><br />
                    <input type="hidden" id="reply_details" name="reply_details" value="" />
                    <button type="submit" onclick="setReplyMessage()" id="reply_message_submit" class="btn btn-primary">Submit</button>
                </div>
                <?php $this->endWidget();?>
                <div class="clr"></div>
            </div><!-- slider -->
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.starr-message').on('click',function () {
            value = $(this).attr('data-value');
            message_type = $(this).attr('message-type');
            current_element = $(this);
            $.ajax({
                type: 'POST',
                url: SITE_URL + "profile/starrMessage",
                data: {message_id: value,message_type:message_type},
                cache: false,
                dataType: "json",
                success: function (response) {
                    if(response.status == 'success') {
                        current_element.toggleClass('starr-active');
                    }
                }
            });
        });

        $('.delete-message').on('click',function () {
            value = $(this).attr('data-value');
            message_type = $(this).attr('message-type');
            var confirmation = confirm('Are you sure to delete this message');
            if(confirmation) {
                $.ajax({
                    type: 'POST',
                    url: SITE_URL + "profile/deleteMessage",
                    data: {message_id: value,message_type:message_type},
                    cache: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 'success') {
                            alert('Message deleted successfully');
                            location.reload();
                        }
                    }
                });
            }
        });

        $('.show_sender').on('click',function () {
            message_id = $(this).attr('data-value');
            message_type = $(this).attr('message-type');
            $.ajax({
                type: 'POST',
                url: SITE_URL + "profile/getSenderDetails",
                data: {message_id: message_id,message_type:message_type},
                cache: false,
                dataType: "json",
                success: function (response) {
                    if(response.status == 'success') {
                        $('#sender_details').html(response.html);
                        $('#sender_details_modal').modal('show');
                    }
                }
            });
        });
        
        // reply message box showing below
        $('.show_message,.msg-body').on('click',function () {
            message_id = $(this).attr('data-value');
            message_type = $(this).attr('message-type');
            $.ajax({
                type: 'POST',
                url: SITE_URL + "profile/getMessageDetails",
                data: {message_id: message_id,message_type:message_type},
                cache: false,
                dataType: "json",
                success: function (response) {
                    if(response.status == 'success') {
                        $('#full_message').html(response.html);
                        //$('#reply_button_block').html(response.html_reply_button);
                        $('#hidden_message_info').html(response.html_hidden);
                        $('#message_details_modal').modal('show');
                    }
                }
            });

        });

        $('.ad_id').on('click',function(){
            ad_id = $(this).attr('data-value');
            ad_url = SITE_URL + 'ad?ad_id='+encodeURIComponent(btoa(ad_id))+'&ad_type='+encodeURIComponent(btoa('ads'));
            var win = window.open(ad_url, '_blank');
            if (win) {
                win.focus();
            } else {
                alert('Please allow popups for this website');
            }
        });

        $('.reply-message').on('click',function(){
            message_id = $(this).attr('data-value');
            message_type = $(this).attr('message-type');
            $.ajax({
                type: 'POST',
                url: SITE_URL + "profile/getMessageDetails",
                data: {message_id: message_id,message_type:message_type},
                cache: false,
                dataType: "json",
                success: function (response) {
                    if(response.status == 'success') {
//                        $('#full_message').html(response.html);
//                        $('#reply_button_block').html(response.html_reply_button);
//                        $('#hidden_message_info').html(response.html_hidden);
//                        $('#message_details_modal').modal('show');

                        reply_message = 'Write here..<br/><br/><b><i class="fa fa-reply"></i> written '+$('#message_compose_time').val() +':</b><br/><span class="prev_mesage">' + response.html + '</span><br/>';
                        $('#reply_message').html(reply_message);
                        $('#hidden_message_info').html(response.html_hidden);
                        reply_message_character_number = $('#reply_message').html().length;
                        $('#reply_message').attr('data-character-number',reply_message_character_number);
                        $('#message_reply_modal').modal('show');
                    }
                }
            });
        });

    });

    function showReplyMessage(){
        $('#message_details_modal').modal('hide');
        reply_message = 'Write here..<br/><br/><b><i class="fa fa-reply"></i> written '+$('#message_compose_time').val() +':</b><br/><span class="prev_mesage">' + $('#full_message').html() + '</span><br/>';
        $('#reply_message').html(reply_message);
        $('#message_reply_modal').modal('show');
        $('#reply_message').focus();
    }

    function setReplyMessage(){
        $('#reply_details').val($('#reply_message').html());
    }

    function selectReplyMessage(){
        reply_message = $('#reply_message').html();
        reply_message = reply_message.replace("Write here..", "");
        $('#reply_message').html(reply_message);
    }

    function deselectReplyMessage(){
        reply_message = $('#reply_message').html();
        new_reply_message = "Write here.." + reply_message;
        prev_char_count = $('#reply_message').attr('data-character-number');
        if(new_reply_message.length == prev_char_count) {
            reply_message = new_reply_message;
        } else {
            reply_message = $('#reply_message').html();
        }
        $('#reply_message').html(reply_message);
    }

</script>