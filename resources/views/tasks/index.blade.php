@extends('layouts.app')

@section('title', 'Task Index')

@section('contents')
@include('tasks._form')
<h1>Tasks</h1>
<hr>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>ประเภทงาน</th>
            <th>ชื่องาน</th>
            <th>รายละเอียด</th>
            <th>สถานะ</th>
            <th>แอ็คชั่น</th>
            <th>manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <th>{{ $task->id }}</th>
            <!-- <td>{{ $task->getTypeName() }}</td> -->
            <td>{{ $task->type->name }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->detail }}</td>
            <td>{{ $task->status ? 'เสร็จแล้วจ้า':'ยังไม่เสร็จ' }}</td>
            <td>
                <form id="check-complate-{{ $task->id }}" action="/tasks/{{ $task->id }}" method="POST" style="display: none;">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="status" value="1">
                </form>
                @if(!$task->status)
                    <button
                        class="btn btn-sm btn-info"
                        onclick="document.getElementById('check-complate-{{ $task->id }}').submit()"
                    >ทำเสร็จแล้วจ้า</button>
                @endif
            </td>
            <td>
                <a class="btn btn-success" role="button" href="{{ url('tasks', $task->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
