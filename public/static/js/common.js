$( document ).ready(function() {

    /**
     * 让body溢出后隐藏， 避免由于导航条产生X轴滚动
     */
    $("body").css({
        "overflow-x":"hidden"
    });

    /**
     * 清除a标签颜色和下划线
     */
    $("a, a:hover, a:visited").css({
        //"color": "#000",
        "text-decoration": "none"
    });
    /**
     * 回到顶部按钮
     */
    var toTop = "#toTop";
    $(toTop).click(function() {
        $("html, body").animate({scrollTop: "0px"},500);
    });

    if(document.documentElement.clientHeight < document.documentElement.offsetHeight) {

        $(toTop).show();
    }


    /**
     * 设置评论头像位置垂直居中
     * @type {string}
     */
/*    var commentAvatarClass = ".avatar";
    var commentsClass = ".comments";
    $(commentsClass).each(function(){
        //var commentsHeight = $(commentsClass).height();
        //var avatarTop = (commentsHeight - 48) / 2;
        //alert(($(this).height() - 48) /2);
        var avatarTop = ($(this).height() - 48) / 2;
        $(commentAvatarClass).css("marginTop", avatarTop);
    });*/

    //页脚gitHub和instagram提示信息位置
    $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


    /**
     * 设置实时搜索结果的div样式
     * @type {string}
     */
    var inputWidth = $(".searchInput").width();
    var suggest = '#search-suggest';
    $(suggest).css({
        "position": "absolute",
        "display": "none",
        "padding": "0.3%",
        "width": inputWidth,
        "height": "auto",
        "font-size": "85%",
        "color": "#666",
        "z-index": "999",
        "border": "1px solid #DDD",
        "backgroundColor": "#FFF"
    //
    });

    /**
     * 对搜索框进行跳转操作
     * 若搜索框有内容，则定向到search控制器中进行搜索
     * 否则，定向到all控制器，显示所有书籍
     */

    //输入框Class
    var inputValueClass = '.inputValue';

    //点击搜索
    $("#search").click(function() {
        jumpTo();
    });
    //激活回车搜索的功能
    $(inputValueClass).keydown(function(event) {
        if(event.keyCode ==13 || event.which == 13){
            jumpTo();
        }
    });
    //搜索跳转
    function jumpTo() {
        var inputValue = $(inputValueClass).val();
        if (inputValue != '') {
            inputValue = textFilter(inputValue);
            location.href = 'http://localhost/cangshufang/public/search/' + inputValue;
        } else {
            location.href = 'http://localhost/cangshufang/public/catalog';
        }
    }
    /**
     * 使用Ajax实时显示搜索建议
     */
    //检测中文的正则
    var chineseReg = /^[\u4e00-\u9fa5]+$/;
    //设置超时
    var lastTime = 0;
    //绑定keyup和focus事件
    $(inputValueClass).bind('keyup', 'focus', function(event){
        //获取输入框文本，判断并过滤
        var inputNeedToSearch = $(".inputValue").val();
        //如果文本为空就不执行
        if(inputNeedToSearch != '') {
            //过滤输入文本
            inputNeedToSearch = textFilter(inputNeedToSearch);
            //获取时间戳
            lastTime = event.timeStamp;
            setTimeout(function() {
                if(lastTime - event.timeStamp == 0) {
                    //进行汉字判断
                    if(chineseReg.test(inputNeedToSearch)) {
                        //如果是汉字，识别出空格键和删除键对字符的操作
                        if(event.keyCode == 8 || event.keyCode == 32) {
                            ajaxSearch(inputNeedToSearch);
                        }
                        //字母直接搜索
                    } else {
                        ajaxSearch(inputNeedToSearch);
                    }
                }
            }, 500);
        } else {
            $(suggest).hide();
            return false;
        }
    });

    /**
     * 执行Ajax实时显示搜索结果
     * @param inputNeedToSearch
     */
    function ajaxSearch(inputNeedToSearch) {
        var linkToBook = "#to-book";
        $.ajax({
            type: "GET",
            url: "http://localhost/cangshufang/public/searchSuggest/" + inputNeedToSearch,
            dataType: "json",
            success: function(data){
                $.each(data, function(name, value){
                    $(linkToBook).html(value.title);
                    $(linkToBook).attr('href', "http://localhost/cangshufang/public/detail/"
                        + value.isbn);
                    $(suggest).show();
                });
            },
            error: function(jqXHR){
                //alert(jqXHR.status);
            }
        });
    }

    /**
     * 利用Ajax通过搜索ISBN自动填充图书数据
     */
    //存储从豆瓣获取的数据
    var bookData = '';
    //存储书籍tags
    var bookTags = '';
    //丛书标签是否存在
    var serials = '无';
    //获取并过滤isbn
    var isbnId = "#isbn";
    $(isbnId).bind('keyup', function() {
        var isbnValue = textFilter($(isbnId).val());
        //如果isbn字数达到13位，开始ajax查找
        if(isbnValue.length == 13 || isbnValue.length == 10) {
            $.ajax({
                type: "GET",
                url: "https://api.douban.com/v2/book/isbn/" + isbnValue,
                dataType: "jsonp",    //使用jsonp进行跨域
                jsonp: "callback",    //就必须增加这个自定义字段
                success: function(data){
                    bookData = data;
                    bookTags = '';
                    //解析tags
                    $.each(bookData.tags, function(name, value){
                        //bookTags = bookTags + value.title + ' ';
                        bookTags = bookTags + ' ' + value.title + '/' + ' ';
                    });

                    serials = data.series;
                    if(serials) {
                        serials = data.series.title;
                    } else {
                        serials  = '无';
                    }
                    $("#title").val(data.title);
                    $("#sub-title").val(data.subtitle);
                    $("#original-title").val(data.origin_title);
                    $("#author").val(data.author);
                    $("#translator").val(data.translator);
                    $("#pages").val(data.pages);
                    $("#price").val(data.price);
                    $("#rating").val(data.rating.average);
                    $("#tags").val(bookTags);
                    $("#serials").val(serials);
                    $("#img").val(data.images.large);
                    $("#isbn-now").val(data.isbn13);
                    $("#publisher").val(data.publisher);
                    $("#pub-date").val(data.pubdate);
                    $("#url").val(data.alt);
                    $("#author-intro").val(data.author_intro);
                    $("#summary").val(data.summary);
                },
                //如果出错则让isbn输入框文字变红提示
                error:function(jqXHR){
                    if(jqXHR.status == 404) {
                        swal('图书不存在，检查ISBN', '', 'warning');
                        //alert('图书不存在，检查ISBN');
                    } else if(jqXHR.status == 400) {
                        swal('服务器调用异常', '', 'error');
                        //alert('服务器调用异常');
                    }
                    $(isbnId).css({
                        "color": "red"
                    });
                }
            });
            //正常状态为黑色
            $(isbnId).css({
                "color": "#000"
            });
            //如果输入超过13字符数就变红提示
        } else if(isbnValue.length > 13) {
            $(isbnId).css({
                "color": "orange"
            });
            //输入小于13显示黑色
        } else {
            $(isbnId).css({
                "color": "#000"
            });
        }
    });


    /**
     * ajax执行评论操作
     */
    //获取书籍信息
    //从detail页面获取
    var bookTitle = $("#bookTitle").html();
    var bookIsbn = $("#bookIsbn").html();
    var bookId = $("#bookId").val();
    var username = $("#username").val();
    var thumb = $("#thumb").attr("src");
    var userThumb = $("#userThumb").html();
    //设置类/id选择器变量
    var commentCountClass = ".comment-count";
    var commentWriteClass = "#comment-write";
    //点击按钮，执行ajax插入新评论，并存入数据库
    $("#comment-post").click(function(event) {
        if(!userThumb) {
            swal('你还没有登录', '', 'warning');
            //alert('没有登录');
            return false;
        } else {
            //获取评论数，准备更改
            var commentCount = parseInt($(commentCountClass).html());
            //获取评论内容
            var commentContent = $(commentWriteClass).val();
            //点击提交后插入评论区域的html
            var newComment = '<div class="media comment-content">' +
                '<div class="media-left">' +
                '<img src="' + thumb + '" class="avatar">' +
                '</div><div class="media-body comments"><span class="media-heading">'
                + commentContent +
                '</span><h5 class="comment-border">' +
                '评论人: ' + username + ' &nbsp;&emsp;评论时间: '+ moment().format('YYYY-MM-DD HH:mm:ss') +'</h5></div></div>';
            //getNowFormatDate()
            if(commentContent == '') {
                swal('内容为空呢', '', 'warning');
                event.preventDefault();
            } else {
                //提交后，评论数+1
                commentCount++;
                $(commentCountClass).html(commentCount);
                //预先输出显示评论内容，此时的数据并非从数据库获取
                $(newComment).prependTo(".media-list");
                //提交后清空评论框里的内容，避免重复提交相同内容
                $(commentWriteClass).val('');
                //开始执行提交
                $.ajax({
                    type: "POST",
                    url: "http://localhost/cangshufang/public/commentPost",
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "bookId" : bookId,
                        "title" : bookTitle,
                        "bookIsbn" : bookIsbn,
                        "content" : commentContent,
                        "username": username,
                        "thumb": userThumb
                    },
                    success: function(data) {
                        if(data.result) {
                            swal('评论成功', '', 'success');
                        } else {
                            swal('评论失败', '', 'error');
                        }
                    },
                    error: function(jqXHR) {
                        //
                    }
                });
            }
        }
    });

    /**
     * 获取评分星星个数
     */
    $(".star-rating__input").click(function() {
        //获取当前点击的星星，并转换为10分制
        var clickStar = parseInt($(this).val());
        $.ajax({
            type: "POST",
            url: "http://localhost/cangshufang/public/starRating",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:  {
                "bookId" : bookId,
                "title" : bookTitle,
                "bookIsbn" : bookIsbn,
                "star" : clickStar,
                "username": username
            },
            success: function(data) {
                if(data.result) {
                    swal('评分成功', '', 'success');
                    //移除click绑定，不再进行点击评分
                    $("input").unbind();
                } else {
                    swal('评分失败', '', 'error');
                    //alert('评分失败');
                }
            },
            error: function(jqXHR) {
                swal('评分失败', '', 'error');
                //alert(jqXHR.status);
                }
        });
    });

    //管理页面，点击执行删除书籍
    $(".click-to-delete").click(function() {
        //获取删除操作的url
        var urlToDelete = $(this).children().first().html();
        swal({
            title: '你确定要删除吗？',
            text: '',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EE5C42',
            cancelButtonColor: '#71C671',
            confirmButtonText: '确定删除',
            cancelButtonText: '留着吧'
        }).then(function() {
            swal(
                '删除成功',
                '',
                'success'
            ).then(function() {
                //点击确定以后跳转到删除页面，包括删除书籍和评论
                location.href = urlToDelete;
            });
        }, function(dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel') {
                swal(
                    '取消删除',
                    '',
                    'error'
                );
                return false;
            }
        });
    });


    /**
     * ajax新增一本书
     */
    $("#click-to-addBook").click(function (event) {
        if ($("#title").val() != '') {
            if (bookData != '') {    //此bookData是通过isbn获取后储存的
                addNewBook(bookData);
            } else {
                bookTags = '无';
            }
        } else {
            swal('内容为空','','warning');
            //alert('内容为空');
            $("html, body").animate({scrollTop: "0px"}, 500);
            event.preventDefault();
        }
        //使用ajax执行保存一本新书
        function addNewBook(bookData) {
            //获取书籍分类
            var categorySelected = $("#bookCategory option:selected").val();
            var translator = '';
            if(bookData.translator != '') {
                translator = bookData.translator.join();
            } else {
                translator = '无';
            }
            $.ajax({
                type: "POST",
                url: "http://localhost/cangshufang/public/addNewBook",
                dataType: "json",
                data: {
                    'title': bookData.title,
                    'sub_title': bookData.subtitle,
                    'origin_title': bookData.origin_title,
                    'author': (bookData.author).join(),
                    'translator': translator,
                    'pages': bookData.pages,
                    'price': bookData.price,
                    'rating': bookData.rating.average,
                    'serials': serials,
                    'img': bookData.images.large,
                    'isbn13': bookData.isbn13,
                    'publisher': bookData.publisher,
                    'pub_date': bookData.pubdate,
                    'alt': bookData.alt,
                    'author_intro': bookData.author_intro,
                    'summary': bookData.summary,
                    'tags': bookTags,
                    'category': categorySelected
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.result == true) {
                        swal('新增成功','','success');
                        //返回到顶部
                        $("html, body").animate({scrollTop: "0px"}, 500);
                        //点击ISBN框，清除内容
                        $(isbnId).focus(function () {
                            $(isbnId).val('');
                        });
                    } else if (data.result == 'hasOne') {
                        swal('书籍已经存在','','warning');
                        $("html, body").animate({scrollTop: "0px"}, 500);
                    } else {
                        swal('新增失败','','error');
                        $("html, body").animate({scrollTop: "0px"}, 500);
                    }
                },
                error: function (jqXHR) {
                    //alert(jqXHR.status);
                }
            });
        }
    });

    /**
     * ajax编辑一本书
     */
    var bookNewInfo = [];
    //通过获取到的旧的书籍分类，设置编辑界面的书籍分类
    var oldCategory = $("#old-category").html();
    $("#bookCategory option[value='" + oldCategory + "']").attr("selected", true);
    //同上，设置编辑界面的状态信息
    var mark = 1;
    var oldMark = $("#old-mark").html();
    switch (oldMark) {
        case '在库' :
            mark = 1;
            break;
        case '送出' :
            mark = 2;
            break;
        case '借出' :
            mark = 3;
            break;
        case '丢失' :
            mark = 4;
            break;
        case '损坏' :
            mark = 5;
            break;
        case '未知' :
            mark = 6;
            break;
        default :
            mark = 1;
    }
    $("#bookMark option[value='" + mark + "']").attr("selected", true);
    $("#click-to-editBook").click(function () {
        var updateBookId = $("#bookId").val();
        //获取书籍分类
        var categorySelected = $("#bookCategory option:selected").val();
        //获取书籍状态信息
        var markSelected = $("#bookMark option:selected").val();
        //获取数据
        $(".editInfo").each(function () {
            var key = $(this).prop('name');
            bookNewInfo[key] = $(this).val();
        });
        //开始ajax
        $.ajax({
            type: "POST",
            url: "http://localhost/cangshufang/public/updateBook",
            dataType: "json",
            data: {
                'id': updateBookId,
                'title': bookNewInfo['title'],
                'sub_title': bookNewInfo['subtitle'],
                'origin_title': bookNewInfo['original_title'],
                'author': bookNewInfo['author'],
                'translator': bookNewInfo['translator'],
                'pages': bookNewInfo['pages'],
                'price': bookNewInfo['price'],
                'rating': bookNewInfo['rating'],
                'serials': bookNewInfo['serials'],
                'img': bookNewInfo['img'],
                'isbn': bookNewInfo['isbn'],
                'publisher': bookNewInfo['publisher'],
                'pub_date': bookNewInfo['pub_date'],
                'alt': bookNewInfo['url'],
                'author_intro': bookNewInfo['author_intro'],
                'summary': bookNewInfo['description'],
                'tags': bookNewInfo['tags'],
                'mark': markSelected,
                'category': categorySelected
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.result == true) {
                    swal('更新成功','','success').then(function() {
                        //返回到顶部
                        //$("html, body").animate({scrollTop: "0px"}, 500);
                        //返回管理页面
                        location.href = 'http://localhost/cangshufang/public/admin/manageBook';
                    });
                    //alert('更新成功');
                } else {
                    swal('更新失败','','error');
                    //alert('更新失败');
                    $("html, body").animate({scrollTop: "0px"}, 500);
                }
            },
            error: function (jqXHR) {
                //alert(jqXHR.status);
            }
        });
    });

    //ajax编辑评论
    $("#click-to-editComment").click(function() {
        var commentId = $("#commentId").val();
        //开始ajax
        $.ajax({
            type: "POST",
            url: "http://localhost/cangshufang/public/updateComment",
            dataType: "json",
            data: {
                'id': commentId,
                'title': $("#title").val(),
                'comment_by': $("#commentBy").val(),
                'content': $("#commentContent").val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data.result) {
                    swal(
                        '更新成功',
                        '',
                        'success'
                    ).then(function() {
                        location.href = 'http://localhost/cangshufang/public/admin/manageComment';
                    });
                    //alert('更新成功');

                } else {
                    swal('更新失败','','error');
                    //alert('更新失败');
                }
            },
            error: function(jqXHR) {
                //alert(jqXHR.status);
            }
        });
    });


////////////////////////////////////////////
/*              函数功能区                 */
//////////////////////////////////////////
    /**
     * 使用moment.js
     * 这个不用啦
     * 获取当前日期和时间
     * @returns {string}
     */
/*    function getNowFormatDate() {
        var date = new Date();
        var separatorDate = "-";
        var separatorTime = ":";

        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        var strSeconds = date.getSeconds();

        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        if (strSeconds >= 0 && strSeconds <= 9) {
            strSeconds = "0" + strSeconds;
        }
        return date.getFullYear() +
            separatorDate + month +
            separatorDate +
            strDate + " " +
            date.getHours() +
            separatorTime +
            date.getMinutes() +
            separatorTime +
            strSeconds;*/

        /*return date.getFullYear() +
            separatorDate +
            (date.getMonth() + 1) +
            separatorDate +
            date.getDate() + " " +
            date.getHours() +
            separatorTime +
            date.getMinutes() +
            separatorTime +
            date.getSeconds();
    }*/

    /**
     * 转换5分评分数值为10分制
     * @param rateValue
     * @returns {*}
     */
/*    function translateRating(rateValue) {
        rateValue = (rateValue - 1) * (9/4) +1;
        return rateValue;
    }*/

    /**
     * 过滤文本中的特殊字符
     * @param text
     * @returns string
     */
    function textFilter(text) {
        text = text.replace(/<\/?[^>]*>/g, "");    //去除html标签
        text = text.replace(/\s/g, "");    //去除文字中间空格
        text = $.trim(text);
        return text;
    }
});