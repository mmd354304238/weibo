$(function () {

   var rand = Math.floor(Math.random()*5)+1;
   $('body').css('background','url('+ThinkPHP['IMG']+'/login_bg'+rand+'.jpg) no-repeat')
            .css('background-size','100%');

   $('#login input[type="submit"]').button();

   var model = ThinkPHP['MODULE']+'/User/register';

    $('#register').dialog({
        width : 430,
        height : 360,
        title : '注册新用户',
        modal : true,
        resizable : false,
        autoOpen : false,
        closeText : '关闭',
        buttons : [{
            text : '提交',
            click : function (e) {

                $(this).submit();

            }
        }],
    }).validate({
        submitHandler : function (form) {
             $(form).ajaxSubmit({

                 url : model,
                 type:'post',
             });
        }
    });





   $('#reg_link').click(function () {
       $('#register').dialog('open');
   });

});