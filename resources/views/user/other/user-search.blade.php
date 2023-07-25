@extends('layout')

@section('content')
<x-card>
    <x-slot name="header">
        <span class="text-white"><i class="fa fa-search me-2" aria-hidden="true"></i><span class="">Tìm kiếm người dùng</span></span>
    </x-slot>

    <div class="card-body">
        <x-input class="w-100" id="search" name="search" placeholder="Nhập tên người cần tìm vào đây" />
    </div>
</x-card>

<div id="resultSearch"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        setTimeout(function() {
            $.ajax({
                type: 'get',
                url: "{{ route('info.user_result') }}",
                data: {
                    'search': $value
                },
                success: function(data) {
                    var output = '';
                    $.each(data.user, function(index, user) {
                        output += '<a href="nguoi-dung/' + user.slug + '"><div class="card border-0 shadow-sm mb-3"><div class="card-body">' + user.fullname + ' (' + user.username + ')' + '</div></div></a>';
                    });
                    $('#resultSearch').html(output);
                }
            });
        }, 1000);
    });
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
@endsection
