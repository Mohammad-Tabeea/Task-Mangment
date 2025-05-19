<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Team_leader;


class TeamLeaderController extends Controller
{
   public function myteam(Request $request)
   {
      $currentUser = Auth::user();
      $users = User::where('team_id', $currentUser->team_id)->get();

      return view('My-Team', ['users'=>$users]);
   }
   // private function getCompanyId(Request $request)
   // {
   //    $company_id = $request->session()->get('company_id');
   //    if (!$company_id) {
   //       return response()->json([
   //          'message' => 'Company ID not found in session',
   //       ]);
   //    }
   //    return $company_id;
   // }
   // public function viewGetTeamLeader(Request $request)
   // {
   //    $company_id = $this->getCompanyId($request);
   //    $teams = Team_leader::where('company_id', $company_id)->get();

   //    return view('getteam', compact('teams'));
   // }

}
