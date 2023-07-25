<script>
    var urlLoadMore = $(".job-status-nav-tabs .nav-item.active").data('route');
    $(document).ready(function(e){
        updateUrlPaginateLoading(urlLoadMore);
    });
    $(document).on('click', '.job-status-nav-tabs .nav-item', function() {
        var that = this;
        $('.job-status-nav-tabs .nav-item').removeClass('active');
        $(that).addClass('active');
        urlLoadMore = $(this).data('route');
        window.history.pushState('', '', urlLoadMore);
        updateUrlPaginateLoading(urlLoadMore);
        $.ajax({
            type: "GET",
            url: $(that).data('route'),
            beforeSend: function() {
                addOverlayLoading('.main-content');
                $('#jobList').empty();
                $('#loading').css('display', 'flex');
            },
            success: function(data) {
                $('#loading').css('display', 'none');
            },
        }).done(function(response) {
            $('#jobList').append(response.html);
            resetLoadmore();
        }).fail(function(response) {
            msgError('Vui lòng thử lại')
        }).always(function(){
            removeOverlayLoading('.main-content');
        })
    });
</script>