<x-input type="hidden" name="route_loadmore" value="{{url('/')}}" />
<script>
    function updateUrlPaginateLoading(urlLoadMore){
            $("input[name='route_loadmore']").val(urlLoadMore);
        }
    function toggleBtnPaginateLoading(){
        $("#paginateLoading").toggle();
    }
    
    function showList(html){
        $("#jobList").append(html);
    }
    
    function paginateLoading(page){
        var url = $("input[name='route_loadmore']").val();
        if(url){
            $.ajax({
                type: "GET",
                url: url,
                data: {page: page},
                beforeSend: function(){
                    statusPaginateLoading = !statusPaginateLoading;
                    toggleBtnPaginateLoading();
                },
                success: function(data){
                    console.log(data.html);
                    stopPaginateLoading = data.html == '' ? true : false;
                    showList(data.html);
                },
                error: function(){
                    stopPaginateLoading = true;
                },
                complete: function(){
                    statusPaginateLoading = !statusPaginateLoading;
                    toggleBtnPaginateLoading();
                }
            });
        }
    }
    window.addEventListener('wheel', function(e) {
      if (e.deltaY > 0) {
        if($(this).scrollTop() + $(this).height() >= $(document).height() - $('footer').height() && !statusPaginateLoading && !stopPaginateLoading){
            pageCurrent ++;
            paginateLoading(pageCurrent);
        }
      }
    });
    window.addEventListener('touchmove', function(e) {
        // Xử lý sự kiện cuộn trang bằng cách vuốt trên thiết bị di động
        if($(this).scrollTop() + $(this).height() >= $(document).height() - $('footer').height() && !statusPaginateLoading && !stopPaginateLoading){
            pageCurrent ++;
            paginateLoading(pageCurrent);
        }
    });

</script>
    