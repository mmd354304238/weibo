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
        },
        errorLabelContainer : 'ol.reg_error',
        wrapper : 'li',
        showErrors : function (errorMap,errorList){
          var errors = this.numberOfInvalids();
          if (errors>0){
              $('#register').dialog('option','height',errors*20+370);
          } else{
              $('#register').dialog('option','height',370);
          }
          this.defaultShowErrors();
        },
        highlight: function(element, errorClass) {
            $(element).css('border', '1px solid red');
            $(element).parent().find('span').html('*').removeClass('succ');
        },
        unhighlight : function (element, errorClass) {
            $(element).css('border', '1px solid #ccc');
            $(element).parent().find('span').html('&radic;').addClass('succ').css('color','green');
        },




        rules : {
            username :{
                required : true,
                minlength : 2,
                maxlength : 20,
                remote : {
                    url : ThinkPHP['MODULE'] + '/User/checkUserName',
                    type : 'POST',
               },
            },
            password :{
                required : true,
                minlength : 6,
                maxlength : 30,
            },
            repassword :{
                required : true,
                equalTo : '#password'
            },
            email :{
                required : true,
                email : true,

            },

        },
        messages :{
            username : {
                required : '帐号不得为空！',
                minlength : $.format('帐号不得小于{0}位！'),
                maxlength : $.format('帐号不得大于{0}位！'),
                remote : '帐号被占用！',
            },
            password : {
                required : '密码不得为空！',
                minlength : $.format('密码不得小于{0}位！'),
                maxlength : $.format('密码不得大于{0}位！'),
            },
            repassword : {required : '密码确认不得为空！',
                equalTo : '密码和密码确认不一致',
            },
            email : {
                required : '邮箱不得为空！',
                email : '邮箱格式不正确',
                remote : '邮箱被占用！',
            },
        }
    });





   $('#reg_link').click(function () {
       $('#register').dialog('open');
   });

});