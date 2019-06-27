<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = \App\Type::all();

        return view('tasks.index')->with(['tasks' => \App\Task::all(),'types'=>$types]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         // return request()->all();
    $taskCreateValidateRules = [
        'type_id' => 'required',
        'name' => 'required'
    ];

    $taskCreateValidateMessages = [
        'type_id.required' => 'ลงข้อมูล ประเภทงาน',
        'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'name'" . ').focus()"><i>ชื่องาน</i> <b>ด้วยสิอีช่อ</b>'
    ];

    request()->validate($taskCreateValidateRules, $taskCreateValidateMessages);

    $data = request()->all();

    if (request()->has('status')) {
        $data['status'] = true;
    }

    \App\Task::create($data);
    return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $tasks = \App\Task::all();

    $task = \App\Task::find($id);
    if(empty($task)){
        return "Not found";
    }
    // return $task;
    $types[]=["id"=>1, "name"=>"Support"];
    $types[]=["id"=>2, "name"=>"Maintain"];
    $types[]=["id"=>3, "name"=>"Consult"];
    $types[]=["id"=>4, "name"=>"CSR"];

    $status[]=["id"=>0, "name"=>"Incomplete"];
    $status[]=["id"=>1, "name"=>"completed"];
     return view('tasks.index')->with(['task'=>$task, 'types' => $types, 'status' => $status, 'tasks'=>$tasks]);
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
        $task->update(request()->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
