<?php

namespace Database\Seeders;

use App\Admin\Traits\Setup;
use App\Enums\User\UserGender;
use App\Enums\User\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    use Setup;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        $user = User::create([
            'code' => $this->uniqidReal(),
            'slug' => str()->uuid(),
            'username' => 'adminshop',
            'fullname' => 'Admin Shop',
            'email' => 'adminshop@gmail.com',
            'phone' => '0999999999',
            'gender' => UserGender::Female,
            'password' => bcrypt('123456'),
            'roles' => UserRoles::Shop,
            'name_shop' => 'Bán quạt'
        ]);
        $user->contact()->create();
        $user->wallet()->create([
            'amount' => 0
        ]);
        $user = User::create([
            'code' => $this->uniqidReal(),
            'slug' => str()->uuid(),
            'username' => 'member',
            'fullname' => 'Member',
            'email' => 'member@gmail.com',
            'phone' => '0999999998',
            'gender' => UserGender::Male,
            'password' => bcrypt('123456'),
            'roles' => UserRoles::Member,
        ]);
        $user->contact()->create();
        $user->wallet()->create([
            'amount' => 0
        ]);
        $user = User::create([
            'code' => $this->uniqidReal(),
            'slug' => str()->uuid(),
            'username' => 'adminshop 2',
            'fullname' => 'Admin Shop 2',
            'email' => 'adminshop2@gmail.com',
            'phone' => '0999999977',
            'gender' => UserGender::Male,
            'password' => bcrypt('123456'),
            'roles' => UserRoles::Shop,
            'name_shop' => 'Bán xe hơi'
        ]);
        $user->contact()->create();
        $user->wallet()->create([
            'amount' => 0
        ]);
    }
}
