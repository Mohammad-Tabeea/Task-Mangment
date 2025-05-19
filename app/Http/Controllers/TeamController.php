<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Services\TeamService;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    protected $teamService;

    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    private function getCompanyId(Request $request)
    {
        $company_id = $request->session()->get('company_id');
        if (!$company_id) {
            return response()->json([
                'message' => 'Company ID not found in session',
            ]);
        }
        return $company_id;
    }


    public function AddTeam(TeamRequest $request)
    {
        $company_id = $this->getCompanyId($request);
        if ($company_id instanceof \Illuminate\Http\JsonResponse) {
            return $company_id;
        }

        $team = $this->teamService->AddTeamService($request->validated(), $company_id);
        $this->assignUsersToTeam($request->user_ids, $team->id);

        return view('Admin.welcome-Admin');
    }


    private function assignUsersToTeam(?array $selectedUsers, int $teamId)
    {
        if ($selectedUsers) {
            foreach ($selectedUsers as $userId) {
                $user = User::find($userId);
                if ($user) {
                    $user->team_id = $teamId;
                    $user->save();
                }
            }
        }
    }

    public function viewAddTeam(Request $request)
    {
        $companyId = $this->getCompanyId($request);

        $users = User::query()
            ->whereNull('team_id')
            ->where('company_id', $companyId)
            ->get();
        return view('Admin.Add-Team', ['users' => $users]);
    }

    public function viewGetTeam(Request $request)
    {
        $company_id = $this->getCompanyId($request);
        $teams = Team::where('company_id', $company_id)->get();

        return view('Get-Teams', ['teams' => $teams]);
    }

    public function showTeamsWithUsers(Request $request)
    {
        $company_id = $this->getCompanyId($request);
        $teams = Team::where('company_id', $company_id)
            ->with('user')
            ->get();

        return view('Show-Teams', compact('teams'));
    }

    public function deleteTeam(int $teamId)
    {
        $team = Team::find($teamId);
        if (!$team) {
            return redirect()->back();
        }
        foreach ($team->user as $user) {
            $user->update([
                'role_id' => null,
                'team_id' => null
            ]);
        }
        $team->delete();
        return redirect()->back();
    }

    public function MemmberTeam(Request $request, int $team_id)
    {
        $userId = $request->userId;
        if ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->update(['team_id' => $team_id]);
            }
        }
        return redirect()->back();
    }
}
