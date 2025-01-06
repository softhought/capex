<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('capexAdmin.userId')) {
            return redirect('admin/dashboard');
        } else {
            $operand1 = rand(1, 10);
            $operand2 = rand(1, 10);

            $data['operand1'] = $operand1;
            $data['operand2'] = $operand2;
            $session['captchaSum'] = $operand1 + $operand2;
            session(['captcha_result' => $session]);

            return view('admin/login/login_view', $data);
        }
    }
    public function auth(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'password' => 'required',
              //  'captcha_input' => 'required|integer|in:' . session('captcha_result.captchaSum'),
            ],
            [
                // 'captcha_input.required' => 'The captcha filled is required',
                // 'captcha_input.integer' => 'The captcha filled is invalid',
                // 'captcha_input.in' => 'The captcha filled is invalid',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        } else {
            $username = $request->post('username');
            $password = $request->post('password');
            $result = User::where(['username' => $username, 'is_active' => 1])->first();
            // pre($result);exit;
            // pre(Hash::make($password));exit;
            if ($result) {
                if (Hash::check($password, $result->password)) {
                    $user_id = $result->id;
                    $userName = $result->name;

                    $user = User::with('role')->find($user_id);
                    $role = $user->role->role;
                    $role_id = $user->role->id;
                    // $user = User::find($user_id);
                    $user->is_online = 1;
                    $user->save();

                    $ipAddress = $request->ip();
                    $arr = [
                        "user_id" => $user_id,
                        "ip_address" => $ipAddress,
                        "user_browser" => getUserBrowserName(),
                        "user_platform" => getUserPlatform(),
                        "login_time" => now(),
                    ];
                    $user_activity_id = DB::table('user_account_activitys')->insertGetId($arr);
                    $result = ['userId' => $user_id, 'userName' => $userName, 'userActivityId' => $user_activity_id, 'role' => $role, 'roleId' => $role_id];
                    $this->setSessionData($result);
                    // $request->session()->put('USER_ACTIVITY_ID', $user_activity_id);
                    // return redirect('admin/dashboard');
                    return response()->json(['msg_status' => 1, 'msg_data' => 'Login successfully']);
                } else {
                    // $request->session()->flash('error', 'Please enter correct password');
                    // return redirect('admin');
                    // return redirect('admin')->withInput($request->only('username'))
                    //     ->withErrors(['password' => 'Invalid password']);
                    return response()->json(['msg_status' => 2, 'msg_data' => 'Please enter correct password']);
                }
            } else {
                // session()->flash('error', 'Please enter valid login details');
                // return redirect('admin');
                return response()->json(['msg_status' => 2, 'msg_data' => 'Please enter valid login details']);
            }
        }



    }

    public function logout()
    {
        $capexAdmin = session()->get('capexAdmin');
        $userId = $capexAdmin['userId'];
        $user_activity_id = $capexAdmin['userActivityId'];

        $user = User::find($userId);
        $user->is_online = "0";
        $user->save();

        $arr = [
            "logout_time" => now(),
        ];
        DB::table('user_account_activitys')->where(['id' => $user_activity_id])->update($arr);
        // CommonDataModel::insertLogData('user_account_activitys', $arr, $user_activity_id, config('constants.LOG_U'));

        session()->forget('capexAdmin');
        session()->flash('logout', 'Logout sucessfully');
        return redirect('admin');
    }

    private function setSessionData($result)
    {
        session(['capexAdmin' => $result]);

    }

    public function renderChangePassword()
    {
        $body['bodyView'] = view('admin/user_management/reset_password');
        return LayoutController::loadAdmin($body);
    }

    public function changePassword(Request $request)
    {
        $user_id = $request->post('user_id');
        $old_password = $request->post('old_password');
        $new_password = $request->post('new_password');
        $confirm_password = $request->post('confirm_password');

        $result = User::find($user_id);

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'The old password is required.',
            'new_password.required' => 'The new password is required',
            'confirm_password.required' => 'The confirm password is required',
            'confirm_password.same' => 'The confirm password must match the new password',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return response()->json(['msg_status' => 0, 'errors' => $error]);
        } else {

            if (Hash::check($old_password, $result->password)) {
                $user = User::find($user_id);
                $user->password = Hash::make($new_password);
                $user->save();

                // CommonDataModel::insertLogData('users_soft', [], $user_id, config('constants.LOG_U'), $user_id);
                return response()->json(['msg_status' => 1, 'errors' => ""]);
            } else {
                return response()->json(['msg_status' => 0, 'errors' => ["old_password" => "Invalid Password"]]);
            }
        }
    }

    public function reloadCaptach()
    {
        $operand1 = rand(1, 10);
        $operand2 = rand(1, 10);

        $data['operand1'] = $operand1;
        $data['operand2'] = $operand2;
        $result['captchaSum'] = $operand1 + $operand2;

        session()->forget('captcha_result');
        session(['captcha_result' => $result]);

        return response()->json($data);

    }

}
