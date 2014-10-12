function PostJson(formid, url) {
    $.ajax({
        url: url,
        data: $('#' + formid).serialize(),
        type: 'post',
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
            console.log(' data : ' + data);
            if (data.status == '1') {
                notyMessage(data.msg, 'topRight', 'success');
                console.log(' url : '+data.url);
                redirectDelay(data.url,5);
                //window.location.reload();
            } else {
                notyMessage(data.msg, 'topRight', 'error');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('jqXHR : ' + jqXHR + ' \n textStatus : ' + textStatus + ' \n errorThrown : ' + errorThrown);
        }
    });
}


