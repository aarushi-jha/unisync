$(document).on('click','.managetype',function(){
    let data = $(this).val();
    if(data==1) {
        $('#orgtypecontrol').css({"display":"block"});
    } else {
        $('#orgtypecontrol').css({"display":"none"});
    }
});
$(document).on('submit','.database_operation_form',function(){
    var url=$(this).attr('action');
    var data=new FormData($(this)[0]);
    $.ajax({
        type:'POST',
        url:url,
        data:data,
        contentType:false,
        processData:false,
        success:function(fb)
        {
            var resp=$.parseJSON(fb);
            if(resp.status=='true')
            {
              alert(resp.message);
              if(resp.reload!=0) {
                  window.location.href=resp.reload;
              }
            }
            else
            {
                alert(resp.message);
            }
        }


    });
    return false;
});
$(document).on('change','.upload_post',function(){
   $('#imgform').submit();
});
$(document).on('click','.send_request',function(){
    let id = $(this).attr('data-id');
    $.post("script/send_request.php",{id:id},function(fb){
        location.reload();
    })
});
$(document).on('click','.approve_request',function(){
    let id = $(this).attr('data-id');
    $.post("script/approve_request.php",{id:id},function(fb){
        location.reload();
    })
});
$(document).on('click','.passwordinfo',function(){
    let password = $('#password').val();
    let cpassword = $('#cpassword').val();
    if(password==''){
        alert("Please Enter Password")
    } else if(cpassword!=password) {
        alert("Password And Confirm Password Not Match")
    } else {
        $.post("script/change_password.php",{password:password},function(fb){
            location.reload();
        })
    }
});
$(document).on('click','.LinkPOst',function(){
    let id = $(this).attr('data-id');
    $.post('script/like.php',{id:id},function(fb){
        location.reload();
    })
});