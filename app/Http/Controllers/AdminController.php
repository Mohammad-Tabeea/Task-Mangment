<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\LoginAdminRequest;
use App\Services\AdminService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function viewRegisterAdmin()
    {
        return view('Admin.Register-Admin');
    }

    public function registerAdmin(RegisterAdminRequest $request)
    {
        $admin = $this->adminService->registerAdmin($request->validated());

        $request->session()->put('company_id', $admin->company_id);

        $accessToken = $admin->createToken('Admin_token')->accessToken;

        return view('Admin.welcome-Admin')->with('access_token', $accessToken);
    }

    public function viewLoginAdmin()
    {
        return view('Admin.Login-Admin');
    }

    public function loginAdmin(LoginAdminRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            $request->session()->put('company_id', $admin->company_id);
            return view('Admin.welcome-Admin');
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function viewGetUser(Request $request)
    {
        $company_id = $request->session()->get('company_id');
        $users = User::where('company_id', $company_id)->get();
        return view('Admin.Show-Users-Company', ['users' => $users]);
    }

    public function getUsers(Request $request)
    {
        $company_id = $request->session()->get('company_id');
        $users = User::where('company_id', $company_id)->get();
        return response()->json(['users' => $users]);
    }

    public function welcomeRegisterAdmin()
    {
        return view('welcomeAdmin');
    }
    public function logoutAdmin(){
        
    }
}
