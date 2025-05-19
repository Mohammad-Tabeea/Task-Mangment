<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendRegisterNotification;
// use Illuminate\Support\Facades\Validator;
// use App\Models\Company;
// use Illuminate\Support\Facades\DB;
// use App\Notifications\registernotification;
// use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function registeruser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
    
        if ($validated) {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
    
            $company_id = $request->session()->get('company_id');
            if (!$company_id) {
                return response()->json([
                    'message' => 'Company ID not found in session',
                ]);
            }
    
            $input['company_id'] = $company_id;
    
            $user = new User();
            $user->fill($input);
            $user->save();
    
            $request->session()->put('company_id', $company_id);
    
            $accessToken = $user->createToken('authtoken')->accessToken;
    
            SendRegisterNotification::dispatch($user);  
    
            return view('Admin.welcome-Admin');
        } else {
            return response()->json([
                'message' => 'Validation failed',
            ]);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id == 2) {
                return redirect()->route('WelcomTeamLeader');
            } elseif ($user->role_id == 1) {
                return redirect()->route('welcomeMemmber');
            }
        }

        return response()->json([
            'message' => 'Invalid credentials or role not defined',
        ]);
    }


    public function WelcomeTeamLeader()
    {
        $user = auth()->user();
        $notifications = $user->notifications;
        return view('TeamLeader.welcome-User', compact('notifications'));
    }
    public function welcomeMemmber()
    {
        $user = auth()->user(); // جلب المستخدم الحالي
        $notifications = $user->notifications;
        return view('Memmber.welcome-Memmber', compact('notifications'));
    }



    public function ViewLogin()
    {
        return view('login');
    }
    public function ViewRegister()
    {
        $admin = Auth::guard('admin');
        return view('Admin.Register-Emplyees', ['admin' => $admin]);
    }
    // public function getusers()
    // {
    //     $companyName = 'tabeea';
    // }
    // public function welcomeser()
    // {
    //     return view('welcomeuser');
    // }
    public function getnullteam(Request $request, $teamId)
    {
        $company_id = $request->session()->get('company_id');
        $teams = Team::where('company_id', $company_id)->get();
        $team = Team::find($teamId);
        $users = User::where('team_id', null)->get();
        return view('selectteam', compact('users', 'teams'));
    }
    public function updateUserTeam(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'team_id' => 'required|exists:teams,id',
        ]);
        $teamId = $request->input('team_id');
        $userIdsToUpdate = $request->input('user_ids');
        User::whereIn('id', $userIdsToUpdate)->update(['team_id' => $teamId]);
        return redirect()->back()->with('success');
    }
    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back();
        }
        $user->delete();
        return redirect()->back();
    }
    public function deleteuserFromTeam($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return redirect()->back();
        }

        $user->team_id = null;
        $user->save();

        return redirect()->back();
    }
    public function AddMemmberToTeam(Request $request, $team_id)
    {
        $company_id = $request->session()->get('company_id');
        $team = Team::find($team_id);

        if (!$team) {
            return redirect()->back()->with('error', 'الفريق غير موجود.');
        }

        $users = User::whereNull('team_id')->get();

        // ✅ التحقق إذا كانت قائمة المستخدمين فارغة
        if ($users->isEmpty()) {
            return view('Admin.Add-Memmber-To-Team', [
                'users' => [],
                'team' => $team,
                'team_id' => $team_id,
            ]);
        }

        return view('Admin.Add-Memmber-To-Team', [
            'users' => $users,
            'team' => $team,
            'team_id' => $team_id
        ]);
    }






}