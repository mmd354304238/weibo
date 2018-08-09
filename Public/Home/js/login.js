$(function () {

    var rand = Math.floor(Math.random() * 5) + 1;
    $('body').css('background', 'url(' + ThinkPHP['IMG'] + '/login_bg' + rand + '.jpg) no-repeat')
        .css('background-size', '100%');

    $('#login input[type="submit"]').button();

    var model = ThinkPHP['MODULE'] + '/User/register';

    $('#register').dialog({
        width: 430,
        height: 385,
        title: '注册新用户',
        modal: true,
        resizable: false,
        autoOpen: false,
        closeText: '关闭',
        buttons: [{
            text: '提交',
            click: function (e) {

                $(this).submit();

            }
        }],
    }).validate({
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                url: model,
                type: 'post',
                beforeSubmit: function () {
                    $('#loading').dialog('open');
                    $('#register').dialog('widget').find('button').eq(1).button('disable');
                },
                success : function (responseText, statusText) {
                    if (responseText) {
                        $('#register').dialog('widget').find('button')
                            .eq(1).button('enable');
                        $('#loading').css('background', 'url(' + ThinkPHP['IMG']
                            + '/success.gif) no-repeat 20px center').html('数据新增成功...');
                        setTimeout(function () {
                            $('#loading').dialog('close');
                            $('#register').dialog('close');
                            $('#register').resetForm();
                            $('#register span.star')
                                .html('*').removeClass('succ');
                            $('#loading').css('background', 'url(' + ThinkPHP['IMG']
                                + '/loading.gif) no-repeat 20px center').html('数据提交中...');
                        }, 3000);
                    }},
            });
        },
        errorLabelContainer: 'ol.reg_error',
        wrapper: 'li',
        showErrors: function (errorMap, errorList) {
            var errors = this.numberOfInvalids();
            if (errors > 0) {
                $('#register').dialog('option', 'height', errors * 20 + 385);
            } else {
                $('#register').dialog('option', 'height', 385);
            }
            this.defaultShowErrors();
        },
        highlight: function (element, errorClass) {
            $(element).css('border', '1px solid red');
            $(element).parent().find('span').html('*').css('color', 'red').removeClass('succ');
        },
        unhighlight: function (element, errorClass) {
            $(element).css('border', '1px solid #ccc');
            $(element).parent().find('span').html('&nbsp;').addClass('succ').css('color', 'green');
        },


        rules: {
            username: {
                required: true,
                minlength: 2,
                maxlength: 20,
                remote: {
                    url: ThinkPHP['MODULE'] + '/User/checkUserName',
                    type: 'POST',
                    beforeSend: function () {
                        $('#username').next().html('&nbsp;').removeClass('succ').addClass('loading');
                    },
                    complete: function (jqXHR) {
                        if (jqXHR.responseText == 'true') {
                            $('#username').next().html('&nbsp;')
                                .removeClass('loading').addClass('succ');
                        } else {
                            $('#username').next().html('*')
                                .removeClass('succ').removeClass('loading');
                        }
                    },
                },
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 30,
            },
            repassword: {
                required: true,
                equalTo: '#password'
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: ThinkPHP['MODULE'] + '/User/checkEmail',
                    type: 'POST',
                    beforeSend: function () {
                        $('#email').next().html('&nbsp;').removeClass('succ').addClass('loading');
                    },
                    complete: function (jqXHR) {
                        if (jqXHR.responseText == 'true') {
                            $('#email').next().html('&nbsp;')
                                .removeClass('loading').addClass('succ');
                        } else {
                            $('#email').next().html('*')
                                .removeClass('succ').removeClass('loading');
                        }
                    },
                },

            },

        },
        messages: {
            username: {
                required: '帐号不得为空！',
                minlength: $.format('帐号不得小于{0}位！'),
                maxlength: $.format('帐号不得大于{0}位！'),
                remote: '帐号被占用！',
            },
            password: {
                required: '密码不得为空！',
                minlength: $.format('密码不得小于{0}位！'),
                maxlength: $.format('密码不得大于{0}位！'),
            },
            repassword: {
                required: '密码确认不得为空！',
                equalTo: '密码和密码确认不一致',
            },
            email: {
                required: '邮箱不得为空！',
                email: '邮箱格式不正确',
                remote: '邮箱被占用！',
            },
        }
    });

    $('#loading').dialog({
        autoOpen: false,
        modal: true,
        closeOnEscape: false,
        resizable: false,
        draggable: false,
        width: 180,
        height: 40,
    }).parent().find('.ui-widget-header').hide();


    $('#reg_link').click(function () {
        $('#register').dialog('open');
    });




    $('#email').autocomplete({
        delay : 0,
        autoFocus : true,
        source : function (request, response) {
//获取用户输入的内容
//alert(request.term);
//绑定数据源的
//response(['aa', 'aaaa', 'aaaaaa', 'bb']);
            var hosts = ['qq.com', '163.com',
                    '263.com', 'sina.com.cn','gmail.com', 'hotmail.com'],term = request.term, //获取用户输入的内容
                name = term, //邮箱的用户名
                host = '', //邮箱的域名
                ix = term.indexOf('@'), //@的位置
                result = []; //最终呈现的邮箱列表
            result.push(term);
//当有@的时候，重新分别用户名和域名
            if (ix > -1) {
                name = term.slice(0, ix);
                host = term.slice(ix + 1);
            }
            if (name) {
//如果用户已经输入@和后面的域名，
//那么就找到相关的域名提示，比如bnbbs@1，就提示bnbbs@163.com
//如果用户还没有输入@或后面的域名，
//那么就把所有的域名都提示出来
                var findedHosts = (host ? $.grep(hosts,
                    function (value, index) {
                        return value.indexOf(host) > -1
                    }) : hosts),
                    findedResult = $.map(findedHosts,
                        function (value, index) {
                            return name + '@' + value;
                        });
                result = result.concat(findedResult);
            }
            response(result);
        },
    });











});