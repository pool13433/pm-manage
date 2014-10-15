$(function() {
    $('.dataTable').dataTable();
    $('.datepicker1').datepicker().on('show', function(ev) {
        var today = new Date();
        var t = today.getDate() + "-" + (today.getMonth() + 1) + "-" + today.getFullYear();
        console.log(' current date : ' + t);
        $('.datepicker1').data({date: t}).datepicker('update');
    });
    $('.datepicker2').datepicker().on('show', function(ev) {
        var today = new Date();
        var t = today.getDate() + "-" + (today.getMonth() + 1) + "-" + today.getFullYear();
        $('.datepicker2').data({date: t}).datepicker('update');
    });
    /*----------- BEGIN chosen CODE -------------------------*/

    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });
    /*----------- END chosen CODE -------------------------*/

    /*----------- BEGIN timepicker CODE -------------------------*/
    $('.timepicker-default').timepicker();

    $('.timepicker-24').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false
    });
    /*----------- END timepicker CODE -------------------------*/
});
function myGritterBlack(title, text) {
    var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: title,
        // (string | mandatory) the text inside the notification
        text: text,
        // (string | optional) the image to display on the left
        //image: imagepath,
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: true,
        // (int | optional) the time you want it to be alive for before fading out
        time: '',
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
    });

    // You can have it return a unique id, this can be used to manually remove it later using
    /*
     setTimeout(function(){
     
     $.gritter.remove(unique_id, {
     fade: true,
     speed: 'slow'
     });
     
     }, 6000)
     */

    return false;
}
function myGritterWhite(title, text) {
    var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: title,
        // (string | mandatory) the text inside the notification
        text: text,
        // (string | optional) the image to display on the left
        //image: imagepath,
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: true,
        // (int | optional) the time you want it to be alive for before fading out
        time: '',
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'gritter-light',
        after_open: function(e) {
            //alert("I am called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
        },
    });

    // You can have it return a unique id, this can be used to manually remove it later using
    /*
     setTimeout(function(){
     
     $.gritter.remove(unique_id, {
     fade: true,
     speed: 'slow'
     });
     
     }, 6000)
     */
    console.log(' unique_id : ' + unique_id);
    return false;
}
function notyMessage(message, tLayout, tType) {
    $(function() {
// url api 
//http://ned.im/noty/#layouts
        var noty_id = noty({
            text: message,
            layout: tLayout, // topCenter,topLeft,topRight,...
            closeWith: ['button'], // ['click', 'button', 'hover']
            theme: 'defaultTheme',
            type: tType, // success, warning,information ,error ,notification ,alert
            //timeout: 10000,
            callback: {
                onShow: function() {
                },
                afterShow: function() {

                },
                onClose: function() {

                },
                afterClose: function() {

                }
            },
            maxVisible: 5, // you can set max visible notification for dismissQueue true option
            dismissQueue: false, // If you want to use queue feature set this true
            nimation: {
                open: {height: 'toggle'},
                close: {height: 'toggle'},
                easing: 'swing',
                speed: 500 // opening & closing animation speed
            },
            /* buttons: [
             {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
             
             // this = button element
             // $noty = $noty element
             
             $noty.close();
             noty({text: 'You clicked "Ok" button', type: 'success'});
             }
             },
             {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
             $noty.close();
             noty({text: 'You clicked "Cancel" button', type: 'error'});
             }
             }
             ],*/
            template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>',
        });
    });
}
function redirectDelay(url, timer) {
    setTimeout(function() {
        window.location.href = url; //will redirect to your blog page (an ex: blog.html)
    }, (timer * 100)); //will call the function after 2 secs.
}
function reloadDelay(timer) {
    setTimeout(function() {
        window.location.reload();//will redirect to your blog page (an ex: blog.html)
    }, (timer * 100)); //will call the function after 2 secs.
}
function goUrl(url) {
    window.location.href = url; //will redirect to your blog page (an ex: blog.html)
}
function deleteItem(id, url) {
    if (confirm('ยืนยันการลบข้อมูล รหัส [ ' + id + ' ]  ใช่ [OK], ไม่ใช่ [Cancel] ')) {
        $.ajax({
            url: url,
            data: {
                id: id,
            },
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (data.status == '1') {
                    notyMessage(data.msg, 'topRight', 'success');
                    reloadDelay(5);
                    //window.location.reload();
                } else {
                    notyMessage(data.msg, 'topRight', 'error');
                }
            }
        });
        return true;
    }
    return false;
}
function changeStatusUtil(id, status, url) {
    if (confirm('ยืนยันการเปลี่ยนสถานะ รหัส [ ' + id + ' ] ใช่ [OK] , ไม่ใช่ [Cancel] ')) {
        $.ajax({
            url: url,
            data: {
                id: id,
                status: status
            },
            type: 'get',
            dataType: 'json',
            success: function(data) {
                if (data.status == '1') {
                    notyMessage(data.msg, 'topRight', 'success');
                    reloadDelay(5);
                    //window.location.reload();
                } else {
                    notyMessage(data.msg, 'topRight', 'error');
                }
            }
        });
        return true;
    }
    return false;
}