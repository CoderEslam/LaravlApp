<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function showAdminName()
    {

        return 'EslamGhazy';
    }

    public function EditAdminName()
    {

        return 'EslamGhazy Edit';
    }

    public function DeleteAdminName()
    {

        return 'EslamGhazy Delete';
    }

    public function UpdateAdminName()
    {

        return 'EslamGhazy Update';
    }

    public function getView()
    {

        return view('welcome');
    }

}
