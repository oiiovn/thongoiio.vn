<?php

namespace App\Admin\Http\Controllers\Privacy;

use App\Admin\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function getView(){
        return [
            'create' => 'admin.privacy.create',
        ];
    }

    public function create() {
        return view($this->view['create']);
    }
}
