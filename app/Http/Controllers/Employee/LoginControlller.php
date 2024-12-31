<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\Employee;
use App\Models\Initiator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginControlller extends Controller
{
    public function index(Request $request)
    {
        // pre($request->session());exit;   
        if ($request->session()->has('pptcEmployee.employeeId')) {
            return redirect('emp-dashboard');
        } else {
            $operand1 = rand(1, 10);
            $operand2 = rand(1, 10);

            $data['operand1'] = $operand1;
            $data['operand2'] = $operand2;
            $session['captchaSum'] = $operand1 + $operand2;
            session(['employee_captcha' => $session]);

            return view('employee/login/login_view', $data);
        }
    }
    public function auth(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'emp_code' => 'required',
            'password' => 'required',
            'captcha_input' => 'required|integer|in:' . session('employee_captcha.captchaSum'),
        ],
         [
            'captcha_input.required'=>'The captcha filled is required',
            'captcha_input.integer'=>'The captcha filled is invalid',
            'captcha_input.in'=>'The captcha filled is invalid',
         ]
        );
        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }else{
            $emp_no = $request->post('emp_code');
            $password = $request->post('password');
            $result = Employee::where(['emp_no' => $emp_no, 'is_active' => 1])->first();
            // pre($result);exit;
           // pre(Hash::make($password));exit;
            if ($result) {
                if (Hash::check($password, $result->password)) {
                    $employee_id = $result->id;
                    $emp_name = $result->emp_name;

                    $employee = Employee::with('role')->find($employee_id);
                    $role = $employee->role->role;
                    $role_id = $employee->role->id;
                    // $employee = employee::find($employee_id);
                    $employee->is_online = 1;
                    $employee->save();

                    // $emp_type="INITIATOR"; // It will set dybamically
                    $emp_type=$this->checkEmployeeType($emp_no);

                    $result = ['employeeId' => $employee_id, 'employeeName' => $emp_name,'empCode' => $emp_no, 'role' => $role,'roleId'=>$role_id,'emp_type'=>$emp_type];
                    $this->setSessionData($result);

                    return response()->json(['msg_status' => 1, 'msg_data' => 'Login successfully']);
                } else {
                    return response()->json(['msg_status' => 2, 'msg_data' => 'Please enter correct password']);
                }
             } else {
                return response()->json(['msg_status' => 2, 'msg_data' => 'Please enter valid login details']);
            }
        }

    }

    public function logout()
    {
        $pptcEmployee = session()->get('pptcEmployee');
        $employeeId = $pptcEmployee['employeeId'];

        $user = Employee::find($employeeId);
        $user->is_online = "0";
        $user->save();

        session()->forget('pptcEmployee');
        session()->flash('logout', 'Logout sucessfully');
        return redirect('/');
    }

    private function setSessionData($result)
    {
        session(['pptcEmployee' => $result]);

    }

    public function renderChangePassword()
    {
        $body['bodyView'] = view('admin/user_management/reset_password');
        return LayoutController::loadEmployee($body);
    }

    public function changePassword(Request $request)
    {
        $user_id = $request->post('user_id');
        $old_password = $request->post('old_password');
        $new_password = $request->post('new_password');
        $confirm_password = $request->post('confirm_password');

        $result = Employee::find($user_id);

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
                $user = Employee::find($user_id);
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

        session()->forget('employee_captcha');
        session(['employee_captcha' => $result]);

        return response()->json($data);

    }

    public function checkEmployeeType($emp_code){
        $emp_type="APPROVER";
    

        return $emp_type;

    }

}
