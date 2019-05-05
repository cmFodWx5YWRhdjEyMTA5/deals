/*
$('#estore-update').on('submit',function(e){
    files_to_delete=$('#delete_image_file1').val();
    $.ajax({
        type:'POST',
        url:SITE_URL+"site/DeleteMultiImageFromS3",
        cache:false,
        data:{file:files_to_delete}});

    files_to_delete=$('#delete_image_file2').val();
    $.ajax({
        type:'POST',
        url:SITE_URL+"site/DeleteMultiImageFromS3",
        cache:false,
        data:{file:files_to_delete}});

    files_to_delete=$('#delete_image_file3').val();
    $.ajax({
        type:'POST',
        url:SITE_URL+"site/DeleteMultiImageFromS3",
        cache:false,
        data:{file:files_to_delete}});

    updateEstore();
});

function updateEstore(){
    var data=$('#estore-update').serialize();
    $.ajax({
        type:'POST',
        url:SITE_URL+"estore/UpdateEstore",
        data:data,
        cache:false,
        dataType:"json",
        beforeSend:function(){$("#update_name_status").fadeOut();$("#estore_update_submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Submitting ...');},
        success:function(response){
            if(response.status=="success"){
                $("#estore_update_submit").html('<img src="'+SITE_URL+'images/ajax-loader.gif" /> &nbsp; Submitting Data ...');
                function redirect(){
                    var url=SITE_URL+'my-profile/dashboard';window.open(url,"_self");
                }
    window.setTimeout(redirect,4000);
            } else if(response.status=="false"){
                $("#error_personal").fadeIn(1000,function(){
                    $("#error_ad_post").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response.message+' !</div>');
                });
            }
        }
    });
}*/
