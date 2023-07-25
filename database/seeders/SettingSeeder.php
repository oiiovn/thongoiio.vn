<?php

namespace Database\Seeders;

use App\Enums\Setting\SettingGroup;
use App\Enums\Setting\SettingTypeInput;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Setting::truncate();
        Setting::insert([
            [
                'setting_key' => 'site_name',
                'setting_name' => 'Tên site',
                'plain_value' => 'Sàn đặt đơn',
                'type_input' => SettingTypeInput::Text,
                'group' => SettingGroup::General,
                'desc' => 'Tên của website, shop, app'
            ],
            [
                'setting_key' => 'site_logo',
                'setting_name' => 'Logo',
                'plain_value' => config('custom.images.logo'),
                'type_input' => SettingTypeInput::Image,
                'group' => SettingGroup::General,
                'desc' => 'Logo thương hiệu'
            ],
            [
                'setting_key' => 'site_banner',
                'setting_name' => 'Banner',
                'plain_value' => config('custom.images.banner'),
                'type_input' => SettingTypeInput::Image,
                'group' => SettingGroup::General,
                'desc' => 'Banner trang chủ'
            ],
            [
                'setting_key' => 'email',
                'setting_name' => 'Email',
                'plain_value' => 'mevivu@gmail.com',
                'type_input' => SettingTypeInput::Email,
                'group' => SettingGroup::General,
                'desc' => 'Email liên hệ'
            ],
            [
                'setting_key' => 'hotline',
                'setting_name' => 'Số điện thoại',
                'plain_value' => '0934584939',
                'type_input' => SettingTypeInput::Phone,
                'group' => SettingGroup::General,
                'desc' => 'Số điện thoại liên lạc.'
            ],
            [
                'setting_key' => 'zalo',
                'setting_name' => 'Số zalo',
                'plain_value' => '0999999999',
                'type_input' => SettingTypeInput::Text,
                'group' => SettingGroup::General,
                'desc' => 'Số zalo.'
            ],
            [
                'setting_key' => 'address',
                'setting_name' => 'Địa chỉ',
                'plain_value' => '998/42/15 Quang Trung, GV',
                'type_input' => SettingTypeInput::Text,
                'group' => SettingGroup::General,
                'desc' => 'Địa chỉ liên lạc.'
            ],
            [
                'setting_key' => 'group_facebook',
                'setting_name' => 'Địa chỉ group fb',
                'plain_value' => '#',
                'type_input' => SettingTypeInput::Text,
                'group' => SettingGroup::General,
                'desc' => 'Địa chỉ group facebook.'
            ],
            [
                'setting_key' => 'admin_facebook_name',
                'setting_name' => 'Tên Facebook Admin',
                'plain_value' => 'Facebook Admin',
                'type_input' => SettingTypeInput::Text,
                'group' => SettingGroup::General,
                'desc' => 'Địa chỉ admin facebook.'
            ],
            [
                'setting_key' => 'admin_facebook_link',
                'setting_name' => 'Link Facebook Admin',
                'plain_value' => '#',
                'type_input' => SettingTypeInput::Text,
                'group' => SettingGroup::General,
                'desc' => 'Địa chỉ admin facebook.'
            ],
            [
                'setting_key' => 'job_fee_service',
                'setting_name' => 'Phí sàn (%)',
                'plain_value' => '25',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::Job,
                'desc' => 'Phần trăm phí sàn khi 1 đơn hoàn tất.'
            ],
            [
                'setting_key' => 'job_fines_price',
                'setting_name' => 'Tiền phạt khi vi phạm',
                'plain_value' => '2000',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::Job,
                'desc' => 'Tiền phạt khi vi phạm chính sách về việc đăng và nhận đơn.'
            ],
            [
                'setting_key' => 'job_auto_complete_and_cancel',
                'setting_name' => 'Tự động hoàn thành (Ngày)',
                'plain_value' => '2',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::Job,
                'desc' => 'Trong khoản thời gian nếu shop không phản hồi thì đơn tự động duyệt hoàn thành. Đối với CTV nếu không phản hồi thì cv sẽ bị hủy.'
            ],
            // [
            //     'setting_key' => 'job_time_clone',
            //     'setting_name' => 'Thời gian nhân bản (Phút)',
            //     'plain_value' => '10',
            //     'type_input' => SettingTypeInput::Number,
            //     'group' => SettingGroup::Job,
            //     'desc' => 'Thời gian nhân bản hiển thị cho đơn cần nhiều người.'
            // ],
            [
                'setting_key' => 'job_time_blacklist_expired',
                'setting_name' => 'Hết hạn blacklist (Ngày)',
                'plain_value' => '5',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::Job,
                'desc' => 'Thời gian ctv có thể nhận tiếp đơn của 1 shop, trong khi đơn trước đó vẫn chưa hoàn thành.',
            ],
            [
                'setting_key' => 'transaction_deposit_fee',
                'setting_name' => 'Phí nạp tiền(%)',
                'plain_value' => '0',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::Job,
                'desc' => 'Cài đặt phí nạp tiền',
            ],
            [
                'setting_key' => 'transaction_withdrawn_fee',
                'setting_name' => 'Phí rút tiền(đ)',
                'plain_value' => '5',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::Job,
                'desc' => 'Cài đặt phí rút tiền',
            ],
            [
                'setting_key' => 'statistic_virtual_user_shop',
                'setting_name' => 'Số shop ảo',
                'plain_value' => '0',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::StaticticVirtual,
                'desc' => 'Số lượng shop sẽ được cộng vào thống kê ngoài trang chủ.',
            ],
            [
                'setting_key' => 'statistic_virtual_user_member',
                'setting_name' => 'Số thành viên ảo',
                'plain_value' => '0',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::StaticticVirtual,
                'desc' => 'Số lượng hành viên sẽ được cộng vào thống kê ngoài trang chủ.',
            ],
            [
                'setting_key' => 'statistic_virtual_job_complete',
                'setting_name' => 'Số đơn hoàn thành ảo',
                'plain_value' => '0',
                'type_input' => SettingTypeInput::Number,
                'group' => SettingGroup::StaticticVirtual,
                'desc' => 'Số lượng đơn hoàn thành được cộng vào thống kê ngoài trang chủ.',
            ],
        ]);
        // Setting::insert([
        //     [
        //         'setting_key' => 'statistic_virtual_user_shop',
        //         'setting_name' => 'Số shop ảo',
        //         'plain_value' => '0',
        //         'type_input' => SettingTypeInput::Number,
        //         'group' => SettingGroup::StaticticVirtual,
        //         'desc' => 'Số lượng shop sẽ được cộng vào thống kê ngoài trang chủ.',
        //     ],
        //     [
        //         'setting_key' => 'statistic_virtual_user_member',
        //         'setting_name' => 'Số thành viên ảo',
        //         'plain_value' => '0',
        //         'type_input' => SettingTypeInput::Number,
        //         'group' => SettingGroup::StaticticVirtual,
        //         'desc' => 'Số lượng hành viên sẽ được cộng vào thống kê ngoài trang chủ.',
        //     ],
        //     [
        //         'setting_key' => 'statistic_virtual_job_complete',
        //         'setting_name' => 'Số đơn hoàn thành ảo',
        //         'plain_value' => '0',
        //         'type_input' => SettingTypeInput::Number,
        //         'group' => SettingGroup::StaticticVirtual,
        //         'desc' => 'Số lượng đơn hoàn thành được cộng vào thống kê ngoài trang chủ.',
        //     ],
        // ]);
    }
}
