$(document).ready(function() {

    /**
     * 注册验证
     * @type {RegExp}
     */
    //邮箱验证
    var emailReg = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
    var inputEmail = '#email';
    $(inputEmail).blur(function() {
        var email = $(inputEmail).val();
        if(email == '') {
            var toShow = ['#email-error', '邮箱为空', inputEmail, '#email-label', '#login', false];
            validateShow(toShow);
        }else if(!emailReg.test(email)) {
            toShow = ['#email-error', '邮箱格式不对', inputEmail, '#email-label', '#login', false];
            validateShow(toShow);
        } else {
            toShow = ['#email-error', '', inputEmail, '#email-label', '#login', true];
            validateShow(toShow);
        }
    });
    //密码验证
    var inputPassword = '#password';
    $(inputPassword).blur(function() {
        var password = $(inputPassword).val();
        if(password.length < 6) {
            var toShow = ['#password-error', '密码长度错误', inputPassword, '#password-label', '#login', false];
            validateShow(toShow);
        } else {
            toShow = ['#password-error', '', inputPassword, '#password-label', '#login', true];
            validateShow(toShow);
        }
    });
    //登录验证
    $("#login").click(function() {
        if($(inputEmail).val() == '' || $(inputPassword).val() == '') {
            $(this).attr("disabled", "disabled");
        } else {
            $(this).removeAttr("disabled");
        }
    });

    /**
     * 注册验证
     */
    //验证用户名
    var inputName = '#login-name';
    $(inputName).blur(function() {
        var name = $(inputName).val();
        if(name.length < 2 || name.length > 20) {
            var toShow = ['#name-error', '用户名长度错误', inputName, '#name-label', '#reg', false];
            validateShow(toShow);
        } else {
            //使用ajax检测用户名是否存在
            ajaxCheck(name);
        }


    });
    //验证重复密码
    var inputRePassword = '#login-rePassword';
    $(inputRePassword).blur(function() {
        var rePassword = $(inputRePassword).val();
        if(rePassword == '') {
            var toShow = ['#rePassword-error', '密码确认未输入', inputRePassword, '#rePassword-label', '#reg', false];
            validateShow(toShow);
        } else if(rePassword !== $("#password").val()) {
            toShow = ['#rePassword-error', '两次密码输入不一致', inputRePassword, '#rePassword-label', '#reg', false];
            validateShow(toShow);
        } else {
            toShow = ['#rePassword-error', '', inputRePassword, '#rePassword-label', '#reg', true];
            validateShow(toShow);
        }
    });
    //注册验证
    $("#reg").click(function() {
        if($(inputName).val() =='' || $(inputEmail).val() =='' || $(inputPassword).val() =='' || $().val(inputRePassword) =='') {
            $(this).attr("disabled", "disabled");
        } else {
            $(this).removeAttr("disabled");
        }
    });

    /**
     * 检测注册时候用户名是否已经存在
     * @param name
     */
    function ajaxCheck(name) {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/cangshufang/public/checkUser/' + name,
            dataType: 'json',
            success: function(data) {
                if(data.result) {
                    var toShow = ['#name-error', '用户名已经存在', inputName, '#name-label', '#reg', false];
                    validateShow(toShow);
                } else {
                    toShow = ['#name-error', '', inputName, '#name-label', '#reg', true];
                    validateShow(toShow);
                }
            }
        });
    }

    /**
     * 展示输入内容的CSS
     * @param toShow
     * @returns {boolean}
     */
    function validateShow(toShow)
    {
        if(toShow[5]) {
            $(toShow[0]).html(toShow[1]);
            $(toShow[2]).css({
                'borderColor' : ''
            });
            $(toShow[3]).css({
                'color' : ''
            });
            $(toShow[4]).removeAttr("disabled");
            return true;
        } else {
            $(toShow[0]).html(toShow[1]);
            $(toShow[2]).css({
                'borderColor' : '#A0403E'
            });
            $(toShow[3]).css({
                'color' : '#A0403E'
            });
            $(toShow[4]).attr("disabled", "disabled");
            return false;
        }
    }

});
