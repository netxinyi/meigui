
(function($){
    //初始化页面


    //jquery扩展
    //警告框
    $.alert = function(options,status,speed){

        options = typeof options == 'string' ? {msg:options,status:status,speed:speed} : options;
        var opt = $.extend({
            status: "success",
            msg: "成功",
            speed: 2000
        }, options || {});

        var status = {
            error:'danger'
        };

        var cls = $.isEmptyObject(status[opt.status]) ? opt.status : status[opt.status];

        var alertHtml = '<div class="modal-alert"><div class="alert alert-' + cls + '">'  + opt.msg + '</div></div>';

        $(alertHtml).appendTo($('body')).fadeIn().delay(opt.speed).fadeOut(function () {
            $(this).remove()
        });
    };

    //折叠菜单
    $.fn.sliderMenu = function(){

        $(this).find('ul.main-ui-tree>li:has(".main-ui-tree>li.active")').addClass('open');
        $(this).find('ul.main-ui-tree>li:has(".main-ui-tree") a').click(function(){
            $(this).parent('li').toggleClass('open');
        });
    };

    //REST请求
    $.rest = function(url,data,method,success,error){

        if(typeof url == 'object'){
            var opt = url;
        }else{
            var opt = {url:url,data:data,success:success,method:method,error:error};
        }

        var options = $.extend({
            method:"get",
            alertError:true,
            alertSuccess:true,
            complete:function(){}

        },opt);

        $.ajax({
            url:options.url,
            data:options.data,
            type:options.method || 'get',
            dataType:"json",
            complete:function(response){
                var reJson = response.responseJSON;
                $.isFunction(options.complete) && options.complete(reJson);

                if(response.status == 200 && !$.isEmptyObject(reJson)){

                    if(reJson.code == 1000){
                        $.isFunction(options.success) && options.success(reJson);
                        options.alertSuccess && $.alert(reJson.msg);
                    }else{
                        $.isFunction(options.error) && options.error(reJson);
                        options.alertError && $.alert(reJson.msg,'error');
                    }

                }else{
                    $.isFunction(options.error) && options.error(reJson);
                    options.alertError && $.alert('服务器错误,请稍后再试','error');

                }
            }
        });
    };
    $.restGet = function(url,data,success,error){
        if($.isFunction(data)){
            $.rest(url,{},'get',data,success);
        }else{
            $.rest(url,data,'get',success,error);
        }

    };

    $.restPost = function(url,data,success,error){
        if($.isFunction(data)){
            $.rest(url,{},'post',data,success);
        }else{
            $.rest(url,data,'post',success,error);
        }
    };

    //AJAX加载模板
    $.ajaxLoad = function(target,url,data,success,error,method){

        if($.isFunction(data)){
            method =error;
            error = success;
            success = data;
            data = {};
        }

        $.ajax({
            url:url,
            data:data,
            type:method || "GET",
            success:function(result){
                $(target).html(result).addClass('onload');
                $.isFunction(success) && success(result);
            },
            error:function(result){
                $.isFunction(error) && error(result);
            }
        });
    };

    //表单提交
    $.fn.form = function(option){
        var options = $.extend({
                        loading:true,
                        reset:true,
                        success:true,
                        error:true,
                        loadingText:'正在提交',
                        alertSuccess:true,
                        alertError:true,
                        method:"GET"
                    },option);


        return this.each(function(){

             var form = $(this);
            var submit = form.find('[type="submit"]');


             form.submit(function(){
                 if(options.loading === true){
                     submit.data('loadingText') || submit.data('loadingText',options.loadingText);
                     submit.button('loading');
                 }
                form.trigger('loading');

                 $.rest({
                     url:form.attr('action'),
                     method:form.attr('method').toUpperCase() || options.method,
                     data:form.serialize(),
                     alertSuccess:options.alertSuccess,
                     alertError:options.alertError,
                     success:function(reJson){
                         options.success && form.trigger('success',reJson);
                     },
                     error:function(reJson){
                         options.error && form.trigger('error',reJson);
                     },
                     complete:function(reJson){
                         options.reset && submit.button('reset');
                     }
                 });

                return false;
            });
        });
    };

    //事件
    //success
    $.fn.success = function(func){
        return this.each(function(){
            if($.isFunction(func)){
                $(this).on('success',func);
            }

        });

    };
    //error
    $.fn.error = function(func){
        return this.each(function(){
            if($.isFunction(func)){
                $(this).on('error',func);
            }
        });
    };
    //loading
    $.fn.loading = function(func){
        return this.each(function(){
            if($.isFunction(func)){
                $(this).on('loading',func);
            }
        });
    };
    $.fn.dismiss = function(){
        return this.each(function(){
            $(this).find('[data-dismiss="modal"]').click();
        });
    };
    //跳转
    $.redirect = function(url,after){
        after = after || 0;

        $.timeout(function(){
            if($.isEmptyObject(url)){
                window.location.reload();
            }else{
                window.location = url;
            }

        },after);

    };

    //定时
    $.timeout = function(callback,time){
        time = time == undefined ? 1000 : time;

        setTimeout(callback,time);
    };



    //事件绑定-模态框使用多次请求
    $("#modal").on("hidden.bs.modal", function() {
        $(this).removeData("bs.modal");
    });

    //弹窗事件
    $('[data-toggle="modal"]').click(function(){
        if($(this)[0].tagName == 'A'){
            var url = $(this).attr('href');
        }else{
            var url = $(this).data('remote');
        }

        $('#modal .modal-content').html('');
        $('#modal').modal({remote:url});

        return false;
    });

}($));