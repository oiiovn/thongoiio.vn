<?php

namespace App\Admin\Http\Controllers\Tutorial;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Tutorial\TutorialRequest;
use App\Admin\Repositories\Tutorial\TutorialRepositoryInterface;
use App\Admin\Services\Tutorial\TutorialServiceInterface;
use App\Admin\DataTables\Tutorial\TutorialDataTable;

class TutorialController extends Controller
{
    public function getView(){
        return [
            'create' => 'admin.tutorial.create',
        ];
    }

    public function create() {
        return view($this->view['create']);
    }
}
