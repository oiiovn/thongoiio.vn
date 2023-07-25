<?php

use App\Enums\Status;
use App\Enums\Job\JobStatus;
use App\Enums\Admin\AdminRoles;
use App\Enums\Job\ReportJobStatus;
use App\Enums\Transaction\Deposit\DepositStatus;
use App\Enums\Transaction\TransactionStatus;
use App\Enums\Transaction\TransactionType;
use App\Enums\User\{UserGender, UserRoles};
use App\Enums\Transaction\Withdrawn\WithdrawnStatus;

return [
    Status::class => [
        Status::Active->value => 'Hoạt động',
        Status::Deactive->value => 'Tạm ngưng'
    ],
    AdminRoles::class => [
        AdminRoles::SuperAdmin->value => 'Dev',
        AdminRoles::Admin->value => 'Admin',
        AdminRoles::Accountant->value => 'Kế toán',
    ],
    UserGender::class => [
        UserGender::Male->value => 'Nam',
        UserGender::Female->value => 'Nữ',
        UserGender::Other->value => 'Khác',
    ],
    UserRoles::class => [
        UserRoles::Member->value => 'Thành viên',
        UserRoles::Shop->value => 'Shop',
    ],
    JobStatus::class => [
        // JobStatus::NotReceived->value => 'Đơn chưa nhận',
        // JobStatus::Received->value => 'Đơn đã nhận',
        // JobStatus::Ordered->value => 'Đơn đã đặt',
        // JobStatus::OrderConfirmed->value => 'Đơn xác nhận đã đặt',
        // JobStatus::Reviewed->value => 'Đơn đã đánh giá',
        // JobStatus::Completed->value => 'Đơn đã hoàn thành',
        // JobStatus::Cancelled->value => 'Đơn đã hủy'
        JobStatus::NotReceived->value => 'Chờ xác nhận',
        JobStatus::Received->value => 'Đã nhận',
        JobStatus::Ordered->value => 'Chờ đặt đơn',
        JobStatus::OrderConfirmed->value => 'Đã đặt',
        JobStatus::Reviewed->value => 'Đánh giá',
        JobStatus::Completed->value => 'Hoàn thành',
        JobStatus::Cancelled->value => 'Đơn hủy'
    ],
    ReportJobStatus::class => [
        ReportJobStatus::Processing->value => 'Đang xử lý',
        ReportJobStatus::Processed->value => 'Đã xử lý'
    ],
    WithdrawnStatus::class => [
        WithdrawnStatus::Pending->value => 'Chưa duyệt',
        WithdrawnStatus::Success->value => 'Thành công',
        WithdrawnStatus::Cancel->value => 'Thất bại',
    ],
    WithdrawnStatus::class => [
        WithdrawnStatus::Pending->value => 'Chưa duyệt',
        WithdrawnStatus::Success->value => 'Thành công',
        WithdrawnStatus::Cancel->value => 'Thất bại',
    ],
    DepositStatus::class => [
        DepositStatus::Pending->value => 'Chưa duyệt',
        DepositStatus::Success->value => 'Thành công',
        DepositStatus::Cancel->value => 'Thất bại',
        DepositStatus::Error->value => 'Không hợp lệ',
    ],
    TransactionStatus::class => [
        TransactionStatus::Pending->value => 'Chưa duyệt',
        TransactionStatus::Approved->value => 'Thành công',
        TransactionStatus::Cancel->value => 'Thất bại',
    ],
    TransactionType::class => [
        TransactionType::Deposit->value => 'Nạp tiền',
        TransactionType::Withdrawn->value => 'Rút tiền',
        TransactionType::Job->value => 'Công việc',
    ]
];