<div class="form-style-6">
    <h1>Create Account</h1>
    <form action="javascript:void(0);" id="protal-create-form" method="post">
        <input type="text" name="name" id="name" placeholder="Your Name" />
        <input type="email" name="email" id="email" placeholder="Email Address" />
        <input type="text" name="password" id="password" placeholder="password" />
        <input type="text" name="ref_id" id="ref_id" placeholder="Ref.Id" />
        <?php if ($group_id == 1){?>
        <div id="radio-demo">
            <input type="radio" name="radio-group" id="admin" value="2" />
            <label for="admin">Admin</label>
            <input type="radio" name="radio-group" id="guest" value="3" />
            <label for="guest">Guest</label>
        </div>
        <?php } else {?>
            <input type="hidden" id="group_id" name="group_id" value="3">

        <?php } ?>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $portal_user->id ?>">
        <input type="submit" value="Create" />
    </form>
</div>

<style>
    .form-style-6{
        font: 95% Arial, Helvetica, sans-serif;
        max-width: 400px;
        margin: 10px auto;
        padding: 16px;
        background: #F7F7F7;
    }
    .form-style-6 h1{
        background: #43D1AF;
        padding: 20px 0;
        font-size: 140%;
        font-weight: 300;
        text-align: center;
        color: #fff;
        margin: -16px -16px 16px -16px;
    }
    .form-style-6 input[type="text"],
    .form-style-6 input[type="email"],
    .form-style-6 select
    {
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;
        outline: none;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        background: #fff;
        margin-bottom: 4%;
        border: 1px solid #ccc;
        padding: 3%;
        color: #555;
        font: 95% Arial, Helvetica, sans-serif;
    }
    .form-style-6 input[type="text"]:focus,
    .form-style-6 input[type="email"]:focus,
    .form-style-6 select:focus
    {
        box-shadow: 0 0 5px #43D1AF;
        padding: 3%;
        border: 1px solid #43D1AF;
    }

    .form-style-6 input[type="submit"],
    .form-style-6 input[type="button"]{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 100%;
        padding: 3%;
        background: #43D1AF;
        border-bottom: 2px solid #30C29E;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;
        color: #fff;
    }
    .form-style-6 input[type="submit"]:hover,
    .form-style-6 input[type="button"]:hover{
        background: #2EBC99;
    }

  /*  #radio-demo {
        max-width:400px;
        margin:94px auto 0 auto;
    }*/

    #radio-demo input[type="radio"] {
        position: absolute;
        opacity: 0;
        -moz-opacity: 0;
        -webkit-opacity: 0;
        -o-opacity: 0;
    }

    #radio-demo input[type="radio"] + label {
        position: relative;
        padding: 0 0 0 90px;
        font-size: 12px;
        line-height: 60px;
        margin:0 0 10px 0;
    }

    #radio-demo input[type="radio"] + label:before {
        content: "";
        display: block;
        position: absolute;
        top: 2px;
        height: 14px;
        width: 14px;
        background: white;
        border: 1px solid gray;
        box-shadow: inset 0px 0px 0px 2px white;
        -webkit-box-shadow: inset 0px 0px 0px 2px white;
        -moz-box-shadow: inset 0px 0px 0px 2px white;
        -o-box-shadow: inset 0px 0px 0px 2px white;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        -o-border-radius: 8px;
    }

    #radio-demo input[type="radio"]:checked + label:before {
        background: #30C29E;
    }
</style>

<script>
    $('#protal-create-form').on('submit',function(){
        createPortalUsergroup();
    });
    function createPortalUsergroup(){
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var ref_id = $('#ref_id').val();
        var user_id = $('#user_id').val();
        <?php if($group_id == 1){?>
        var group_id = $('input[name="radio-group"]:checked').val();
        <?php } else {?>
        var group_id = $('#group_id').val();
        <?php } ?>
        $.ajax({
            type : 'POST',
            url  : SITE_URL+"site/CreatePortalUsergroup",
            data : {name:name,email:email,password:password,ref_id:ref_id,group_id:group_id,user_id:user_id},
            cache: false,
            dataType:"json",
            success : function(response){
                if(response.status=="success"){
                    $("#success_html").html('<div class="alert alert-danger"> <span></span> &nbsp; '+response.message+' !</div>');
                    $("#suggestion_html").html(response.suggestion);
                    window.location = '/portal';

                }else if(response.status=="false") {
                    $("#success_html").html('<div class="alert alert-success"> <span></span> &nbsp; '+response.message+' !</div>');
                }
            }
        });
    }

</script>