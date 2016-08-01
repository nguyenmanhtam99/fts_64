<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $layout;
    protected $viewData = [];

    public function __construct($layout = null)
    {
        if (is_null($layout)) {
            $layout = config('common.layouts.login.default');
        }

        $this->layout = $layout;
        view()->share([
            'layout' => $this->layout,
        ]);
    }
}
