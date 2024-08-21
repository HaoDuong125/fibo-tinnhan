<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ERegisterPartnerStatus;
use App\Enums\EUserRole;
use App\Enums\EUserStatus;
use App\Http\Controllers\Controller;
use App\Services\PermissionService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    private $permissionService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->middleware('guest')->except('logout');
        $this->permissionService = $permissionService;
    }

    protected function credentials(Request $request)
    {
        if (auth()->check()) {
            return redirect('/home');
        }
        if(is_numeric($request->get('email'))){
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }
        return ['phone' => $request->get('email'), 'password'=>$request->get('password')];
    }

    protected function authenticated(Request $request, $user) {
        if ($user->status != EUserStatus::ACTIVE) {
            auth()->logout();
        }
        session(['SIDEBAR_PERMISSION' => $this->permissionService->permissionSidebar()]);

        return redirect($this->redirectTo);
    }

    public function logout(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/home');
        }
        $this->performLogout($request);
        return redirect('/');
    }
}
