<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks','TaskController@index' );

Route::post('/tasks', function () {
    // return request()->all();
    $taskCreateValidateRules = [
        'type' => 'required',
        'name' => 'required'
    ];

    $taskCreateValidateMessages = [
        'type.required' => 'ลงข้อมูล ประเภทงาน',
        'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'name'" . ').focus()"><i>ชื่องาน</i> <b>ด้วยสิอีช่อ</b>'
    ];

    request()->validate($taskCreateValidateRules, $taskCreateValidateMessages);

    $data = request()->all();

    if (request()->has('status')) {
        $data['status'] = true;
    }

    \App\Task::create($data);
    return back();
});

Route::patch('/tasks/{task}', function (\App\Task $task) {
    $task->update(request()->all());
    return back();
});

Route::get('/tasks/{id}',function($id){
    $tasks = \App\Task::all();

    $task = \App\Task::find($id);
    if(empty($task)){
        return "Not found";
    }
    // return $task;
    $types[]=["id"=>1, "name"=>"งานคณะฯ"];
    $types[]=["id"=>2, "name"=>"งานตามชื่อตำแหน่ง"];
    $types[]=["id"=>3, "name"=>"งานที่ได้รับมอบหมาย "];
    $types[]=["id"=>4, "name"=>"งานเพื่อส่วนรวม "];

    $status[]=["id"=>0, "name"=>"Incomplete"];
    $status[]=["id"=>1, "name"=>"completed"];
     return view('tasks.index')->with(['task'=>$task, 'types' => $types, 'status' => $status, 'tasks'=>$tasks]);
});
