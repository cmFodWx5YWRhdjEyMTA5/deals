<style>
    table th{ text-align: center; background: #000; color: #fff; padding: 5px 10px; }
    .transaction_history {
        padding: 30px 20px;
    }
</style>
<div class="container">
    <div class="row">
        <h2 class="form-signin-heading">Payment Portal For Declined Transaction</h2><hr />
        <div class="col-xs-12 col-md-12 transaction_history">
            <div class="row">
                <a href="<?php echo Yii::app()->createAbsoluteUrl('/portal-logout'); ?>" class="btn btn-danger" style="float: right">Logout</a>
            </div>
            <br>
            <div class="row table-responsive">
               <table cellpadding="2" border="1" class="table">
                   <tr>
                       <th>Serial</th>
                       <th>Date</th>
                       <th>Name</th>
                       <th>Country</th>
                       <th>Transaction ID</th>
                       <th>Payment Method</th>
                       <th>Amount</th>
                       <th>Reference</th>
                       <th>Decline Reason</th>
                   </tr>
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
                            <?php echo $payment_history->invoice_id; ?>
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
                                echo  is_null($payment_history->referral_id) ? 'N/A' : $payment_history->referral_id;
                            ?>
                        </td>
                        <td>
                            <?php echo $payment_history->decline_reason; ?>
                        </td>
                    </tr>
                   <?php
                    $counter++;
                    }
                   ?>
               </table>
            </div>
        </div>
    </div>
</div>
