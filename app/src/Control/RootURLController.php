<?php

namespace App\Control;

use SilverStripe\Admin\AdminRootController;
use SilverStripe\Control\Controller;

class RootURLController extends Controller
{
    private $allowed_actions = [
        'index',
    ];

    public function index()
    {
        return $this->redirect(AdminRootController::admin_url());
    }
}
