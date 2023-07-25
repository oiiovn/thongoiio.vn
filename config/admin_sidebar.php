<?php

return [
    [
        'title' => 'Dashboard',
        'routeName' => 'admin.dashboard',
        'icon' => '<i class="ti ti-home"></i>',
        'roles' => [],
        'sub' => []
    ],
    [
        'title' => 'Công việc',
        'routeName' => null,
        'icon' => '<i class="ti ti-checklist"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm công việc',
                'routeName' => 'admin.job.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS công việc',
                'routeName' => 'admin.job.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Các thuộc tính',
                'routeName' => 'admin.attribute.index',
                'icon' => '<i class="ti ti-clipboard-list"></i>',
                'roles' => [],
            ],
            // [
            //     'title' => 'Khiếu nại',
            //     'routeName' => 'admin.job.report.index',
            //     'icon' => '<i class="ti ti-flag-filled"></i>',
            //     'roles' => [],
            // ],
        ]
    ],
    [
        'title' => 'QL Thành viên',
        'routeName' => null,
        'icon' => '<i class="ti ti-users"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm thành viên',
                'routeName' => 'admin.user.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS thành viên',
                'routeName' => 'admin.user.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'QL Cửa hàng',
        'routeName' => null,
        'icon' => '<i class="ti ti-shopping-cart"></i>',
        'roles' => [],
        'sub' => [
            [
                'title' => 'DS yêu cầu đăng ký',
                'routeName' => 'admin.shop.dang-ky',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS cửa hàng',
                'routeName' => 'admin.shop.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'Quản lý giao dịch',
        'routeName' => null,
        'icon' => '<i class="ti ti-receipt"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Tạo lệnh nạp tiền',
                'routeName' => 'admin.transaction.deposit.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Tất cả giao dịch',
                'routeName' => 'admin.transaction.index',
                'icon' => '<i class="ti ti-menu"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Tất cả lệnh nạp',
                'routeName' => 'admin.transaction.deposit.index',
                'icon' => '<i class="ti ti-menu"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Tất cả lệnh rút',
                'routeName' => 'admin.transaction.withdrawn.index',
                'icon' => '<i class="ti ti-menu"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'QL Admin',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-cog"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm admin',
                'routeName' => 'admin.admin.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS admin',
                'routeName' => 'admin.admin.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'Tin tức',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-cog"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm tin tức',
                'routeName' => 'admin.news.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'DS tin tức',
                'routeName' => 'admin.news.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    [
        'title' => 'Quản lý chính sách',
        'routeName' => null,
        'icon' => '<i class="ti ti-book"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm mới chính sách',
                'routeName' => 'admin.privacy.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
//            [
//                'title' => 'Danh sách chính sách',
//                'routeName' => 'admin.privacy.index',
//                'icon' => '<i class="ti ti-list"></i>',
//                'roles' => [],
//            ],
        ]
    ],
    [
        'title' => 'Hướng dẫn người dùng',
        'routeName' => null,
        'icon' => '<i class="ti ti-microphone"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Thêm mới hướng dẫn',
                'routeName' => 'admin.tutorial.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
//            [
//                'title' => 'Danh sách hướng dẫn',
//                'routeName' => 'admin.tutorial.index',
//                'icon' => '<i class="ti ti-list"></i>',
//                'roles' => [],
//            ],
        ]
    ],
    [
        'title' => 'Cài đặt',
        'routeName' => null,
        'icon' => '<i class="ti ti-settings"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'Chung',
                'routeName' => 'admin.setting.general',
                'icon' => '<i class="ti ti-tool"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Công việc',
                'routeName' => 'admin.setting.job',
                'icon' => '<i class="ti ti-file-settings"></i>',
                'roles' => [],
            ],
            [
                'title' => 'Thống kê ảo',
                'routeName' => 'admin.setting.statistic_virtual',
                'icon' => '<i class="ti ti-chart-arrows-vertical"></i>',
                'roles' => [],
            ],
        ]
    ],
];
