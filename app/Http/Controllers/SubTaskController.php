<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubTask;
use App\Models\Task;
use App\Models\Memmber;
use App\Models\User;
use App\Notifications\SubTaskNotification;



class SubTaskController extends Controller
{

    public function AddSubTask(Request $request)
    {
        $sub = new SubTask();
        $sub->title = $request->title;
        $sub->description = $request->description;
        $sub->start_date = $request->start_date;
        $sub->end_date = $request->end_date;
        $sub->save();
        foreach ($request->task_ids as $taskId) {
            $task = Task::find($taskId);
            if ($task) {
                $sub->task_id = $task->id;
                $sub->save();
            }
        }
        foreach ($request->memmber_ids as $memmberId) {
            $memmber = Memmber::find($memmberId);
            if ($memmber) {
                $memmber->sub_tasks_id = $sub->id;
                $memmber->save();
    
                $memmber->user->notify(new SubTaskNotification($sub)); 
            }
        }

        return redirect()->back();
    }
    public function ShowAddSubTask()
    {
        $tasks = Task::get();
        $memmbers = Memmber::get();
        return view('TeamLeader.Add-Sub-Task', ['tasks'=>$tasks , 'memmbers' =>$memmbers]);
    }
    public function showsubtask()
    {
        $user = auth()->user(); 
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'يجب عليك تسجيل الدخول أولاً');
        }
    
        $myuser = $user->id;
    
        $myyUser = Memmber::where('user_id', $myuser)->first();  // استخدم first للحصول على الكائن الوحيد
    
        if (!$myyUser) {
            return redirect()->back()->with('error', 'المستخدم غير موجود');
        }
    
        $mySubTask = $myyUser->sub_task;  
    
        if (!$mySubTask) {
            return redirect()->back();
        }
    
        return view('showsubtask', compact('mySubTask'));
    }
    
//     public function showNotifications()
// {
//     $user = auth()->user();
//     $notifications = $user->notifications; 
//     return view('notifications.index', compact('notifications'));
// }

    
    
    public function DetailsSub(Request $request, $subtask)
    {

        $SubTask = SubTask::findOrFail($subtask);
        return view('Details-Sub-Task', ['SubTask'=>$SubTask]);

    }
    public function deleteSubTask($subtask)
    {
        $subtask = SubTask::find($subtask);
        if (!$subtask) {
            return redirect()->back();
        }
        $subtask->delete();
        return redirect()->back();

    }
}