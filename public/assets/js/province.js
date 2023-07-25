var getUrl = window.location;
var urlHome = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

var token = jQuery('meta[name="csrf-token"]').attr('content');

$(document).on('change', 'select[name="province_id"]', function(event) {
    event.preventDefault();
    
    flag = false;
    $('select[name="district_id"]').html('<option value="">Chọn quận huyện</option>');
    
    $.ajax({
        url: urlHome + '/lay-quan-huyen-theo-tinh-thanh',
        type: 'GET',
        dataType: 'json',
        data: {id: $(this).val()},
    })
    .done(function(data) {
        var html = '<option value="">Chọn quận huyện</option>';
        $.each(data, function( index, value ) {
            html += '<option value="'+value.id+'">'+value.name+'</option>';
        });
        

        $('select[name="district_id"]').html(html);
        
    });
});

$(document).on('change', 'select[name="district_id"]', function(event) {
    event.preventDefault();
    /* Act on the event */
    flag = false;
    // sendAjax();
    var district = $(this).val();
    
    $.ajax({
        url: urlHome+'/lay-phuong-xa-theo-quan-huyen',
        type: 'GET',
        dataType: 'json',
        data: {id: district},
    })
    .done(function(data) {
        var html = '<option value="">Chọn xã phường</option>';
        $.each(data, function( index, value ) {
            html += '<option value="'+value.id+'">'+value.name+'</option>';
        });
        
        $('select[name="ward_id"]').html(html);
    });
    
});
