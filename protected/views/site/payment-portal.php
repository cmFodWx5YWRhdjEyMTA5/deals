<style>
    table th{ text-align: center; background: #000; color: #fff; padding: 5px 10px; }
    .transaction_history {
        padding: 30px 20px;
    }
</style>
<div class="container">
    <div class="row">
        <h2 class="form-signin-heading">Payment Portal</h2><hr />
        <div class="col-xs-12 col-md-12 transaction_history">
            <div class="row">
                <a href="<?php echo Yii::app()->createAbsoluteUrl('/portal-logout'); ?>" class="btn btn-danger" style="float: right">Logout</a>
                <?php if($group_id == 1 || $group_id == 2){?>
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('/portal-create'); ?>" class="btn btn-green" style="float: right;margin-right: 50px">Create Account</a>
                <?php } ?>
            </div>
            <div class="row">
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'payment-search',
                    'enableAjaxValidation'=>false,
                    'enableClientValidation'=>false,
                ));
                ?>
                <div class="form-group">
                    <label>Transaction ID:</label>
                    <input type="text" name="transaction_id" id="transaction_id" class="number_input"/>
                </div>
                <div class="form-group">
                    <label>Reference:</label>
                    <?php foreach($portal_referral_ids as $referrer) { ?>
                        <input type="checkbox" name="referral_ids[]" id="referral_ids" value="<?php echo $referrer ?>" <?php if(in_array($referrer,$selected_reference)) echo "checked" ?>> <?php echo $referrer ?>
                    <?php } ?>
                </div>
                <?php if($portal_user->group_id == 1){ ?>
                    <div class="form-group">
                        <label>Admin:</label>
                        <?php foreach($admins as $admin) { ?>
                            <input type="checkbox" name="selected_user[]" id="selected_user_ids" value="<?php echo $admin->id ?>"  <?php if($selected_users) {if(in_array($admin->id,$selected_users)) echo "checked";}?>> <?php echo $admin->name ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if($portal_user->group_id == 1 || $portal_user->group_id == 2){ ?>
                    <div class="form-group">
                        <label>Guest:</label>
                        <?php foreach($guests as $guest) { ?>
                            <input type="checkbox" name="selected_user[]" id="selected_user_ids" value="<?php echo $guest->id ?>" <?php if($selected_users) {if(in_array($guest->id,$selected_users)) echo "checked";}?>> <?php echo $guest->name ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label>Status of Payment:</label>
                    <input type="radio" name="payment_status" id="approved_payment" value="1"> Approved
                    <input type="radio" name="payment_status" id="declined_payment" value="2"> Declined
                    <input type="radio" name="payment_status" id="cancelled_payment" value="0"> Cancelled

                </div>
                <div class="form-group">
                    <input type="SUBMIT" name="submit" value="Submit" class="btn btn-success">
                </div>
                <?php $this->endWidget();?>
            </div>
            <div class="row table-responsive">
                <table cellpadding="2" border="1" class="table" id="payment-portal-history">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Transaction ID</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Payment Status</th>
                            <th>Decline Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 1;
                    foreach($payment_history_details as $payment_history){ ?>
                        <tr>
                            <td align="center"><?=$counter ?></td>
                            <td align="center">
                                <?php
                                $transaction_date = new \DateTime($payment_history->transaction_date);
                                echo $transaction_date->format('d F, Y');
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                $user_details = Register::model()->findByPk($payment_history->user_id);
                                echo $user_details->user_name;
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                $country_details = Countries::model()->findByPk($user_details->country);
                                echo $country_details->name;
                                ?>
                            </td>
                            <td align="center">
                                <?php echo $payment_history->invoice_id; ?>&nbsp;
                            </td>
                            <td align="center">
                                <?php
                                switch($payment_history->payment_method) {
                                    case 1:
                                        echo "Visa/MasterCard";
                                        break;
                                    case 2:
                                        echo "Bank Deposit";
                                        break;
                                    case 3:
                                        echo "Direct Payment";
                                        break;
                                }
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                echo number_format($payment_history->payment_amount,2);
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                echo is_null($payment_history->referral_id) ? 'N/A' : $payment_history->referral_id;
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                    switch($payment_history->payment_status){
                                        case 0: echo "Cancelled"; break;
                                        case 1: echo "Approved"; break;
                                        case 2: echo "Declined"; break;
                                    }
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                echo is_null($payment_history->decline_reason) ? '--' : $payment_history->decline_reason;
                                ?>
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <form action="portal-excel" method="post">
                        <?php
                        if($transaction_id_excel){
                            echo '<input type="hidden" name="transaction_id" id="transaction" value="'.$transaction_id_excel.'">';
                        }
                        if($selected_reference){
                            foreach($selected_reference as $key=>$value){
                                echo '<input type="hidden" name="referral_ids[]" id="referral" value="'.$value.'">';
                            }
                        }
                        if($selected_users){
                            foreach($selected_users as $key=>$value){
                                echo '<input type="hidden" name="selected_user[]" id="users" value="'.$value.'">';
                            }
                        }
                        ?>
<!--                        <button type="submit" id="excel" class="btn btn-success pull-right">Import To Excel</button>-->
                    </form>
                    <?php if($counter > 1){?>
                        <button type="button" class="btn btn-success pull-right" onclick="tableToExcel('payment-portal-history', 'Payment Portal')"> Export to Excel </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>