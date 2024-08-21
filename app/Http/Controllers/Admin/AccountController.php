<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EMessageStatusReturn;
use App\Enums\EUserRole;
use App\Exports\ExportCustomerAccount;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Services\AccountService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\OtpRegister;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;

class AccountController extends Controller
{
    private $accountService;
    private $userService;
    public function __construct(AccountService $accountService, UserService $userService)
    {
        $this->middleware('auth');
        $this->accountService = $accountService;
        $this->userService = $userService;
    }

    public function view(Request $request)
    {
        $info = [
            'statusSearch' => 'ALL',
            'statusPartnerSearch' => 'ALL',
            'fromTo' => '',
            'infoCustomer' => '',
            'type' => 'SEARCH'
        ];
        $listAccount = $this->accountService->searchAccount($info);
        return view('pages.admin.account.list', compact('listAccount', 'info'));
    }

    public function accountInternal(Request $request)
    {
        $statusSearch = $request->get('statusSearch');
        $fromTo = $request->get('fromTo');
        $fromDate = NULL;
        $toDate = NULL;
        $res = explode(' - ', $fromTo);
        if (count($res) == 2) {
            $fromDate = $res[0];
            $toDate = $res[1] . ' 23:59:59';
        }
        $info = [
            'infoCustomer' => $request->get('infoCustomer'),
            'statusSearch' => $statusSearch,
            'fromTo' => $fromTo,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'type' => 'SEARCH'
        ];
        $listAccount = $this->accountService->searchAccountInternal($info);
        return view('pages.admin.account.list-internal', compact('listAccount', 'info'));
    }

    public function viewCreate()
    {
        if (Auth::user()->role == EUserRole::USER) {
            return abort(403);
        }
        $listUser = $this->userService->getAllUser();
        $provinces = Province::get();
        return view('pages.admin.account.create', compact('listUser', 'provinces'));
    }

    public function create(Request $request)
    {
        try {
            if (Auth::user()->role == EUserRole::USER) {
                return abort(403);
            }
            $request->validate([
                'name' => 'required|string|max:255',
                'passwordWebsite' => 'required|string|min:6',
                'phone' => 'required|string|min:10',
            ]);
            $data = $request->all();
            $checkPhone = User::where("phone", $data['phone'])->first();
            if (!empty($checkPhone->id)) {
                return redirect()->back()->withInput()->with(EMessageStatusReturn::FAIL_CODE, 'Số điện thoại đã tồn tại!');;
            }
            if (!empty($data['email'])) {
                $checkEmail = User::where("email", $data['email'])->first();
                if (!empty($checkEmail->id)) {
                    return redirect()->back()->withInput()->with(EMessageStatusReturn::FAIL_CODE, 'Email đã được sử dụng!');;
                }
            }
            $this->accountService->createAccountCustomer($data);
            return redirect()->route('admin.list.account.view')->with(EMessageStatusReturn::SUCCESS_CODE, 'Tạo tài khoản thành công!');
        } catch (\Exception $e) {
            logger('Fail create customer Account : '.$e->getMessage());
            return redirect()->back()->withInput()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');;
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role == EUserRole::USER) {
            return abort(403);
        }
        $listUser = $this->userService->getAllUser();
        $user = $this->accountService->getUserById($id);
        $provinces = Province::get();
        if (!empty($user->province_id)) {
            $districts = District::where('province_id', $user->province_id)->get();
            $wards = Ward::where('district_id', $user->district_id)->get();
        } else {
            $districts = District::where('province_id', $provinces[0]->id)->get();
            $wards = Ward::where('district_id', $districts[0]->district_id)->get();
        }
        return view('pages.admin.account.update', compact('user', 'listUser', 'provinces', 'districts', 'wards'));
    }

    public function update(Request $request)
    {
        try {
            if (Auth::user()->role == EUserRole::USER) {
                return abort(403);
            }
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|min:10',
            ]);

            $data = $request->all();
            $user = User::where('id', $data['userId'])->first();
            $checkPhone = User::where("phone", $data['phone'])->where('id', "!=", $user->id)->first();
            if (!empty($checkPhone->id)) {
                return redirect()->back()->withInput()->with(EMessageStatusReturn::FAIL_CODE, 'Số điện thoại đã tồn tại!');;
            }
            if (!empty($data['email'])) {
                $checkEmail = User::where("email", $data['email'])->where('id', "!=", $user->id)->first();
                if (!empty($checkEmail->id)) {
                    return redirect()->back()->withInput()->with(EMessageStatusReturn::FAIL_CODE, 'Email đã được sử dụng!');;
                }
            }

            $this->accountService->updateAccount($request->all());
            return redirect()->route('admin.list.account.view')->with(EMessageStatusReturn::SUCCESS_CODE, 'Cập nhật tài khoản thành công!');
        } catch (\Exception $e) {
            logger('Fail create customer Account : '.$e->getMessage());
            return redirect()->back()->withInput()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');;
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $input = $request->all();
            if (empty($input['passwordCustomer'])) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Vui lòng nhập mật khẩu mới!');
            }
            if (empty($input['passwordConfirmCustomer'])) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Vui lòng xác thực mật khẩu!');
            }
            if ($input['passwordConfirmCustomer'] != $input['passwordCustomer']) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Xác thực mật khẩu không đúng! Vui lòng thử lại');
            }
            $userUpdate = $this->accountService->chnagePassword($input);
            if (!$userUpdate) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
            }
            return redirect()->back()->with(EMessageStatusReturn::SUCCESS_CODE, 'Cập nhật thành công!');
        } catch (Exception $e) {
            logger($e->getMessage() . ' at ' . $e->getLine() .  ' in ' . $e->getFile());
            return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
        }
    }

    public function stopActiveAccountUser(Request $request)
    {
        try {
            $input = $request->all();
            $userUpdate = $this->accountService->stopActiveAccountUser($input['userId']);
            if (!$userUpdate) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
            }
            return redirect()->back()->with(EMessageStatusReturn::SUCCESS_CODE, 'Cập nhật thành công!');
        } catch (Exception $e) {
            logger($e->getMessage() . ' at ' . $e->getLine() .  ' in ' . $e->getFile());
            return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
        }
    }

    public function activeAccountUser(Request $request)
    {
        try {
            $input = $request->all();
            $userUpdate = $this->accountService->activeAccountUser($input['userId']);
            if (!$userUpdate) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
            }
            return redirect()->back()->with(EMessageStatusReturn::SUCCESS_CODE, 'Cập nhật thành công!');
        } catch (Exception $e) {
            logger($e->getMessage() . ' at ' . $e->getLine() .  ' in ' . $e->getFile());
            return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
        }
    }

    public function stopActivePartner(Request $request)
    {
        try {
            $input = $request->all();
            $userUpdate = $this->accountService->stopActivePartner($input['userId']);
            if (!$userUpdate) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
            }
            return redirect()->back()->with(EMessageStatusReturn::SUCCESS_CODE, 'Cập nhật thành công!');
        } catch (Exception $e) {
            logger($e->getMessage() . ' at ' . $e->getLine() .  ' in ' . $e->getFile());
            return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
        }
    }

    public function activePartner(Request $request)
    {
        try {
            $input = $request->all();
            $userUpdate = $this->accountService->activePartner($input['userId']);
            if (!$userUpdate) {
                return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
            }
            return redirect()->back()->with(EMessageStatusReturn::SUCCESS_CODE, 'Cập nhật thành công!');
        } catch (Exception $e) {
            logger($e->getMessage() . ' at ' . $e->getLine() .  ' in ' . $e->getFile());
            return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Server Error!');
        }
    }


    public function search(Request $request)
    {
        try {
            if (Auth::user()->role == EUserRole::USER) {
                return abort(403);
            }
            $statusSearch = $request->get('statusSearch');
            $statusPartnerSearch = $request->get('statusPartnerSearch');
            $fromTo = $request->get('fromTo');
            $fromDate = NULL;
            $toDate = NULL;
            $res = explode(' - ', $fromTo);
            if (count($res) == 2) {
                $fromDate = $res[0];
                $toDate = $res[1] . ' 23:59:59';
            }
            $info = [
                'infoCustomer' => $request->get('infoCustomer'),
                'statusPartnerSearch'  => $statusPartnerSearch,
                'statusSearch' => $statusSearch,
                'status' => $statusSearch,
                'fromTo' => $fromTo,
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                'type' => 'SEARCH'
            ];
            $listAccount= $this->accountService->searchAccount($info);
            return view('pages.admin.account.list', compact('listAccount', 'info'));
        } catch (\Exception $e) {
            logger('Fail search phone Swicth: '.$e->getMessage());
        }
    }

    public function export(Request $request)
    {
        try {
            if (Auth::user()->role == EUserRole::USER) {
                return abort(403);
            }
            $statusSearch = $request->get('statusSearch');
            $fromTo = $request->get('fromTo');
            $fromDate = NULL;
            $toDate = NULL;
            $res = explode(' - ', $fromTo);
            if (count($res) == 2) {
                $fromDate = $res[0];
                $toDate = $res[1] . ' 23:59:59';
            }
            $info = [
                'infoCustomerSearch' => $request->get('infoCustomerSearch'),
                'statusSearch' => $statusSearch,
                'status' => $statusSearch,
                'fromTo' => $fromTo,
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                'type' => 'EXPORT'
            ];
            return Excel::download(new ExportCustomerAccount($this->accountService, $info), 'history_topup_'.date('YmdHis').'.xlsx');
        } catch (\Exception $e ) {
            logger('Fail search phone Swicth: '.$e->getMessage());
        }
    }

    public function detailConfig($id)
    {
        $user = $this->accountService->getUserById(base64_decode($id));
        if (empty($user->id)) {
            return redirect()->back()->with(EMessageStatusReturn::FAIL_CODE, 'Không tìm thấy thông tin!');
        }
        return view('pages.admin.account.detail', compact('user'));
    }

    public function otpList(Request $request)
    {
        $info = [
            'textSearch' => $request->get('textSearch'),
            'dateFrom' => $request->get('dateFrom'),
            'dateTo' => $request->get('dateTo'),
        ];
        $listOtp = OtpRegister::query();
        if (!empty($request->get('textSearch'))) {
            $listOtp = $listOtp->where('phone', 'like', "%".$info['textSearch']."%")
                                    ->orWhere('type', 'like', "%".$info['textSearch']."%");
        }
        if (!empty($request->get('dateFrom'))) {
            $listOtp = $listOtp->where('created_at', '>', $request->get('dateFrom'));
        }
        if (!empty($request->get('dateTo'))) {
            $listOtp = $listOtp->where('created_at', '<', $request->get('dateTo'));
        }
        $listOtp = $listOtp->orderBy('id', 'desc')->paginate(20);
        return view("pages.admin.account.otp", compact('listOtp', 'info'));
    }
}
