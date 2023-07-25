<?php

return [
    'admin' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'roles' => [
            'title' => 'Roles',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'user' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'username' => [
            'title' => 'Tên đăng nhập',
            'orderable' => false,
            'visible' => false
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'shop' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'username' => [
            'title' => 'Tên đăng nhập',
            'orderable' => false,
            'visible' => false
        ],
        'name_shop' => [
            'title' => 'Tên cửa hàng đăng ký',
            'orderable' => false,
            'visible' => true
        ],
        'fullname' => [
            'title' => 'Họ tên',
            'orderable' => false
        ],
        'email' => [
            'title' => 'Email',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'Số điện thoại',
            'orderable' => false,
            'visible' => false
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
            'visible' => true
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'attribute' => [
        'position' => [
            'title' => 'Vị trí',
            'orderable' => false,
        ],
        'name' => [
            'title' => 'Tên thuộc tính',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'type' => [
            'title' => 'Loại',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false
        ],
        'options' => [
            'title' => 'Các tùy chọn',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'attributes_options' => [
        'position' => [
            'title' => 'Vị trí',
            'orderable' => false,
        ],
        'name' => [
            'title' => 'Tên tùy chọn',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'price' => [
            'title' => 'Giá',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'desc' => [
            'title' => 'Mô tả',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'job' => [
        // 'name' => [
        //     'title' => 'Tên công việc',
        //     'addClass' => 'align-middle',
        //     'orderable' => false,
        // ],
        'shop' => [
            'title' => 'Shop',
            'addClass' => 'align-middle',
            'orderable' => false,
        ],
        'worker' => [
            'title' => 'Người làm',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false,
        ],
        'money' => [
            'title' => 'Tổng tiền',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        // 'money_product' => [
        //     'title' => 'Tiền sản phẩm',
        //     'addClass' => 'align-middle',
        //     'orderable' => false,
        // ],
        'money_product_addition' => [
            'title' => 'Tiền cọc',
            'addClass' => 'align-middle',
            'orderable' => false,
            'visible' => false
        ],
        'status' => [
            'title' => 'Trạng thái',
            'addClass' => 'align-middle',
            'orderable' => false,
        ],
        'is_virtual' => [
            'title' => 'Đơn ảo',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false
        ],
        // 'note' => [
        //     'title' => 'Ghi chú',
        //     'orderable' => false,
        //     'addClass' => 'align-middle',
        //     'visible' => false
        // ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'report_jobs' => [
        'user' => [
            'title' => 'TV khiếu nại',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'job' => [
            'title' => 'Công việc',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'news' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'title' => [
            'title' => 'Tên tin tức',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'privacies' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'title' => [
            'title' => 'Tiêu đề chính sách',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'tutorials' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'title' => [
            'title' => 'Tiêu đề hướng dẫn',
            'orderable' => false,
        ],
        'link' => [
            'title' => 'Link Youtube hướng dẫn',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    'withdrawn' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'user' => [
            'title' => 'Tài khoản',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'code' => [
            'title' => 'Mã giao dịch',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'amount' => [
            'title' => 'Số tiền',
            'orderable' => false,
        ],
        'fee' => [
            'title' => 'Phí rút',
            'orderable' => false,
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'deposit' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'user' => [
            'title' => 'Tài khoản',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'code' => [
            'title' => 'Mã giao dịch',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],

        'amount' => [
            'title' => 'Số tiền',
            'orderable' => false,
        ],
        'fee' => [
            'title' => 'Phí nạp',
            'orderable' => false,
        ],
        'bank' => [
            'title' => 'Ngân hàng',
            'orderable' => false,
        ],
        'time' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'transaction' => [
        'DT_RowIndex' => [
            'title' => 'STT',
            'width' => '20px',
            'orderable' => false
        ],
        'user' => [
            'title' => 'Tài khoản',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'code' => [
            'title' => 'Mã giao dịch',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'type' => [
            'title' => 'Loại',
            'orderable' => false,
        ],
        'amount' => [
            'title' => 'Số tiền',
            'orderable' => false,
        ],
        'fee' => [
            'title' => 'Phí rút',
            'orderable' => false,
        ],

        'created_at' => [
            'title' => 'Ngày tạo',
            'orderable' => false,
        ],
        'status' => [
            'title' => 'Trạng thái',
            'orderable' => false,
        ],
        'action' => [
            'title' => 'Thao tác',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
];
