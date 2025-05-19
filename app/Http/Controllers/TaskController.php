<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Team;
use App\Models\Team_leader;
use App\Models\Team_task;
use App\Notifications\TaskNotification;

class TaskController extends Controller
{
    public function Add_Task(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->save();
        foreach ($request->team_ids as $teamId) {
            $team = Team::find($teamId);
            if ($team) {
                $task->team_id = $team->id;
                $task->save();
            }
        }
        foreach ($request->team_leader_ids as $teamLeaderId) {
            $teamLeader = Team_leader::find($teamLeaderId);
            if ($teamLeader) {
                $teamLeader->task_id = $task->id;
                $teamLeader->save();
                $teamLeader->user->notify(new TaskNotification($task));
            }
        }
        return redirect()->back();
    }


    public function ShowAddTask(Request $request)
    {

        $company_id = $request->session()->get('company_id');
        $teams = Team::where('company_id', $company_id)->get();
        $teamLeaders = Team_leader::query()
            ->where('company_id', $company_id)
            ->whereNull('task_id')
            ->get();

        return view('Admin.Add-Task', ['teams' => $teams, 'teamLeaders' => $teamLeaders]);
    }
    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        if (!$task) {
            return redirect()->back();
        }
        //  $users = $task->user;
        //  foreach ($users as $user) {
        //      $user->task_id = null;
        //      $user->save();
        //  }
        $task->delete();
        return redirect()->back();
    }
    public function showTask(Request $request)
    {
        $company_id = $request->session()->get('company_id');
        $teams = Team::query()
            ->where('company_id', $company_id)->with('task')->get();
        return view('Show-Task', ['teams' => $teams]);
    }
    public function detalstak($taskId)
    {
        $task = Task::query()
            ->with('team_leader')->findOrFail($taskId);
        return view('Details-Task', ['task' => $task]);

    }







    public function showMytask()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'يجب عليك تسجيل الدخول أولاً');
        }

        $myuser = $user->id;

        $myyUser = Team_leader::where('user_id', $myuser)->get();

        if (!$myyUser) {
            return redirect()->back()->with('error', 'المستخدم غير موجود');
        }

        $myTask = $myyUser->task;

        if (!$myTask) {
            return redirect()->back();
        }

        return view('showtask', compact('myTask'));
    }
}

