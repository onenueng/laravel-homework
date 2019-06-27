
@if($errors->any())
    <!-- <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h3>เกิดข้อผิดพลาด</h3>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div> -->
    
@endif


<form class="my-4" action="/tasks" method="POST">
    @csrf
    <div class="form-row">
        <!-- type -->
        <div class="form-group col-md-6">
            <label for="type_id">ประเภทงาน</label>
            <select class="form-control @error('type_id') is-invalid @enderror" name="type_id">
                <option value="" hidden><option>
            @foreach($types as $type)
                @if(old('type_id',isset($task)? $task->type_id: '')== $type['id'])
                    <option value = "{{ $type['id'] }}" selected> {{ $type['name']}}</option>
                @else   
                    <option value = "{{ $type['id'] }}"> {{ $type['name']}}</option>
                @endif
            @endforeach
            </select>

            @error('type_id')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- name -->
        <div class="form-group col-md-6">
            <label for="name">ซื่องาน</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name',isset($task) ? $task->name : '') }}">
        </div>
    </div>
    <!-- detail -->
    <div class="form-group">
        <label for="detail">รายละเอียด</label>
        <textarea class="form-control" id="detail" name="detail">{{ old('detail',isset($task) ? $task->detail : '')}}</textarea>
    </div>
    <!-- status -->
    <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="status" name="status" {{ isset($task) ? ($task->status == 1 ? 'checked' : '') : '' }}>
          <label class="form-check-label" for="status">Completed</label>
        </div>
    </div>

    <!-- <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="radio" id="status" name="status" {{ isset($task) ? ($task->status == 1 ? 'checked' : '') : '' }}>
          <label class="form-check-label" for="status">Completed</label>
        </div>
    </div> -->

    <!-- <div class="form-group">
        <div class="form-check">
          <input type="radio" name="status" id="status" value= {{ old('status',isset($task) ? $task->status : '') == 1 ? 'selected' : '' }}<br>
          <label class="form-check-label" for="status">Completed</label>
        </div>
    </div> -->
    <!-- submit -->
    <button type="submit" class="btn btn-primary">Create</button>
</form>
