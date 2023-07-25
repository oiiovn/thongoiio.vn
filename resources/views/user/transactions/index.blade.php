@extends('layout')

@section('content')
    <x-card>
        <x-slot name="header">
            <span class="text-white"><i class="fa-solid fa-building-columns me-2" aria-hidden="true"></i><span
                    class="">Lịch sử giao dịch</span></span>
        </x-slot>
        <div class="card-body">
            <div class="history-search-wrapper">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Tìm kiếm giao dịch</span>
                        <input type="text" class="form-control" name="search" value="{{isset($_GET['search'])?$_GET['search']:""}}" placeholder="Nhập mã giao dịch...">
                        <span class="input-group-text"><button type="submit" class="border-0 bg-transparent"><i
                                    class="fas fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            @each('user.transactions.include.row', $transactions, 'item')
            <div>
                {{ $transactions->links() }}
            </div>
        </div>
    </x-card>
@endsection
