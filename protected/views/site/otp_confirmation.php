<div class="container">
    <div class="row">
        <div class="col-xs-10 col-md-4" style="margin: 60px auto;float:none;border: 1px solid #fe9c00;background: #f1f1f1;border-radius: 10px">
            <div class="form-group" style="padding-top: 15px">
                <h5 style="color: blue"><i>Verified by</i></h5>
                <h4 style="color: #fe9c00;margin-top: -12px">bdads24.com</h4>
                <p style="text-align: center;color: green"><label>ACCOUNT VERIFICATION</label></p>
                <p><span>Your secure code has been sent to your mobile phone. Please enter security code below :</span></p>
                <label class="fa fa-user" style="color: #fe9c00;margin-left: 100px"></label>&nbsp;&nbsp;<span><?=$user_name?></span><br>
                <label class="fa fa-mobile" style="color: #fe9c00;margin-left: 100px"></label>&nbsp;&nbsp;<span><?=$phone_number?></span><br><br>
                <input type="text" id="otp" name="otp" placeholder="Enter your security code">
                <input type="hidden" name="user_token" id="user_token" value="<?php echo md5($user_token) ?>" />
            </div>
            <div class="form-group">
                <input type="submit" id="confirm-otp" value="Submit" class="btn-theme">
                <div align="left" id="register_status_personal"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .info { border: 1px solid #999; padding:12px 20px 12px 20px; font: bold 12px verdana;-moz-box-shadow: 0 0 5px #888; -webkit-box-shadow: 0 0 5px#888;box-shadow: 0 0 5px #888;text-shadow: 2px 2px 2px #ccc;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;font-family:Verdana, Geneva, sans-serif; font-size:11px; line-height:20px;font-weight:normal;color: black;background: #BDE5F8;margin: -43px 0 0 148px;}
</style>

<script>
    function baseUrl(){
        var href=window.location.href.split('/');return href[0]+'//'+href[2]+'/';
    }
    var SITE_URL=baseUrl();

    $('#confirm-otp').on('click',function() {
        if ($('#otp').val() != '') {
            var otp = $('#otp').val();
            var user_token = $('#user_token').val();
            var error_msg = false;
            var success_msg = false;
            $.ajax({
                type: 'POST',
                async: false,
                url: SITE_URL + "site/CheckOtp",
                data: {otp: otp,user_token:user_token},
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data.status === 'Confirm Successfully') {
                        success_msg = true;
                        window.location=SITE_URL + "my-profile/dashboard";
                    } else {
                        error_msg = true;
                    }
                },
                error: function () {
                    alert('Error!')
                }
            });

            if (error_msg) {
                $('#register_status_personal').html('<div class="info" style="background: #ff2c00">Your code is invalid</div>');
                return false;
            }

            if (success_msg) {
                $('#register_status_personal').html('<div class="info" style="background: #00c500">Successfully Verified...</div>');
                return true;
            }
        }
    });

</script>