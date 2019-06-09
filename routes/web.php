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

Route::get('/tasks', function () {
    return view('tasks.index')->with(['tasks' => \App\Task::all()]);
});

Route::post('/tasks', function () {
    
    $taskCreateValidateRules = [
        'type' => 'required',
        'name' => 'required'
    ];

    $taskCreateValidateMessages = [
        'type.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'type'" . ').focus()"><i>ประเภทงาน</i> <b>ด้วยสิอีช่อ</b>',
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
