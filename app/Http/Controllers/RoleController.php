<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Team_leader;
use App\Models\Memmber;
class RoleController extends Controller
{
    public function AddRole(Request $request)
    {
        $role = new Role();
        $role->role = $request->role;
        $role->save();
    }


    public function updateRole(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return back()->withInput();
        }
        $user->role_id = $request->input('role_id');
        $user->save();
        if ($user->role_id == 1) {
            $company_id = $request->session()->get('company_id');
            if (!$company_id) {
                return response()->json([
                    'message' => 'Company ID not found in session',
                ]);
            }
            Team_leader::where('user_id', $userId)->delete();
            if (!Memmber::where('user_id', $userId)->exists()) {
                $member = new Memmber();
                $member->name = $user->name;
                $member->company_id = $user->company_id;
                $member->user_id = $userId;
                $member->save();
            }
        } elseif ($user->role_id == 2) {
            
            Memmber::where('user_id', $userId)->delete();
            if (!Team_leader::where('user_id', $userId)->exists()) {
                $teamLeader = new Team_leader();
                $teamLeader->name = $user->name;
                $teamLeader->company_id = $user->company_id;
                $teamLeader->user_id = $userId;
                $teamLeader->save();
            }
        }
        return view('Admin.welcome-Admin');
    }



}
