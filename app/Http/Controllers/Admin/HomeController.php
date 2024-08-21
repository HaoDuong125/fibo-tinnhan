<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $permissionService;

    public function __construct(PermissionService $permissionService)
    {
       $this->middleware('auth');
       $this->permissionService = $permissionService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session(['SIDEBAR_PERMISSION' => $this->permissionService->permissionSidebar()]);
        return view('home');
    }

    public function listNotify()
    {
        return view("partials.list_notify");
    }
}
