<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Auth;
use Inertia\Inertia;
Use Redirect;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks;
        $id=Auth::user()->id;
        $users = User::all();
        foreach($users as $user){
            $user->tasks=$user->tasks()->count();
        }
        return Inertia::render('AppComponent', [
            'tasks' => $tasks,
            'users' => $users,
            'userId' => $id
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task= new Task();
        $task->description = $request['description'];
        $task->user_id = $request['user_id'];
        $task->save();

        return Redirect::route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task=Task::find($id);
        $task->iscompleted=$request['iscompleted'];
        $task->update();

        return Redirect::route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $task=Task::find($id);
       $task->delete();

       return Redirect::route('home');
    }
}
