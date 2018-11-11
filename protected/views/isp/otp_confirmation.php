<div class="container">
    <div class="row">
        <div class="col-xs-10 col-md-4" style="margin: 60px auto;float:none;border: 1px solid #fc260d;background: #fff;border-radius: 10px">
            <div class="form-group" style="padding-top: 15px">
                <a href="/" style="margin-bottom: 10px;"><img src="/images/logo.jpg"></a>
                <p style="text-align: center;color: green"><label>ORDER VERIFICATION</label></p>
                <p><span>A verification code has been sent to your mobile phone. Please enter verification code below :</span></p>
                <p style="text-align: center;"><label style="color: #fc260d;">Verfication code sent to: </label>&nbsp;&nbsp;<span><?=$phone_number?></span></p><br>
                <p style="text-align: center;"><input type="text" id="otp" name="otp" placeholder="Enter your verification code"></p>
                <input type="hidden" name="order_id" id="order_id" value="<?php echo md5($order_id) ?>" />
            </div>
            <div align="left" id="register_status_personal"></div>
            <div style="text-align: center; margin-bottom: 10px;">
                Didn't receive verification code? <button id="resend_verification_code">Resend again</button>
            </div>
            <div class="form-group">
                <p style="text-align: center;">
                    <input type="submit" id="confirm-otp" value="Submit" class="btn-theme">
                    <a href="<?php echo $return_url ?>" id="return_to_site">Return to Site</a>
                </p>
                
            </div>
        </div>
    </div>
</div>

<style>
    .info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: #fff;background: #BDE5F8;margin-bottom: 15px;}
    #otp{
        border: solid 1px green;
        border-radius: 7px;
        padding:3px 5px;
        width: 50%;
    }
    #confirm-otp {
        border: none;
        background: green;
        border-radius: 4px;
        padding: 5px 10px;
        text-align: center;
        color: #fff;
        display: block;
        margin-left: 151px;
    }

    #return_to_site {
        border: none;
        background: #f82108;
        border-radius: 4px;
        padding: 6px 10px;
        text-align: center;
        color: #fff;
        float: right;
        margin-top: -35px;
        margin-right: 0px;
    }

    /*#resend_verification_code {
        border:none;
        box-shadow: 0px 0px 3px 4px #CCC;
    }*/
</style>

<script>
    function baseUrl(){
        var href=window.location.href.split('/');return href[0]+'//'+href[2]+'/';
    }
    var SITE_URL=baseUrl();

    $('#confirm-otp').on('click',function() {
        if ($('#otp').val() != '') {
            var otp = $('#otp').val();
            var order_id = $('#order_id').val();
            var error_msg = false;
            var success_msg = false;
            var business_url = '';
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "Isp/CheckOtp",
                data: {otp: otp,order_id:order_id},
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.status === 'Confirm Successfully') {
                        success_msg = true;
                        business_url = data.business_url;
                        //window.location=SITE_URL + "my-profile/dashboard";
                    } else {
                        error_msg = true;
                    }
                },
                error: function () {
                    alert('Error!')
                }
            });

            if (error_msg) {
                $('#register_status_personal').html('<div class="info" style="background: #ff2c00">Your verification code is invalid</div>');
                return false;
            }

            if (success_msg) {
                $('#register_status_personal').html('<div class="info" style="background: #00c500">Successfully sent your order request. Redirecting...</div>');
                 setTimeout(function () {
                       window.location.href= SITE_URL+business_url;
                   },5000);
            }
        }
    });

    $('#resend_verification_code').on('click',function(){
        var order_id = $('#order_id').val();
        $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "Isp/ResendOtp",
                data: {order_id:order_id},
                cache: false,
                dataType: "json",
                success: function (data) {
                },
                error: function () {
                    alert('Error!')
                }
            });
    });

</script>