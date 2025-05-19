<?php
namespace App\Services;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamService
{
    public function AddTeamService(array $data,$company_id)
    {

        $team = Team::create([
            'team_name' => $data['team_name'],
            'company_id' => $company_id,
        ]);
        return $team;
    }
}

