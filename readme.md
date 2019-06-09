
github.com/koramit/fon-homework

# Homework ครั้งที่ 1 - 2

1 ให้สร้าง Form สำหรับกรอกข้อมูล Task
2 บันทึกข้อมูลลง Database ตาราง ชื่อ Task เขียนคำสั่งบันทึกข้อมูลที่ web.php
3 เมื่อบันทึกข้อมูลแล้วให้ return หน้า view ที่เป็นตารางข้อมูล Task
4 ข้อมูลในตารางให้มีปุ่ม click completed สำหรับ update งานเมื่อทำเสร็จแล้ว


## ตาราง tasks

```php
Schema::create('tasks', function (Blueprint $table) {
    $table->bigIncrements('id');            // auto
    $table->integer('type');                // dropdown
    $table->string('name');                 // textbox
    $table->text('detail')->nullable();     // textarea
    $table->boolean('status')->default(0);  // checkbox
    $table->timestamps();
});
```


## ฺBootstrap navber
```html
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Current Page</a>
            </li>
        </ul>
    </div>
</nav>
```


## Task index table
```html
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>ประเภทงาน</th>
            <th>ชื่องาน</th>
            <th>รายละเอียด</th>
            <th>สถานะ</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
    </tbody>
</table>
```



## Task create form using bootstrap
```html
<div class="form-row">
    <!-- type -->
    <div class="form-group col-md-6">
        <label for="type">ประเภทงาน</label>
        <select id="type" class="form-control" name="type">
            <option value="" selected>เลือกซิจ๊ะ...</option>
            <option value="1"  {{ old('type') == 1 ? 'selected' : '' }}>งานคณะฯ</option>
            <option value="2"  {{ old('type') == 2 ? 'selected' : '' }}>งานตามชื่อตำแหน่ง</option>
            <option value="3"  {{ old('type') == 3 ? 'selected' : '' }}>งานที่ได้รับมอบหมาย</option>
            <option value="4"  {{ old('type') == 4 ? 'selected' : '' }}>งานเพื่อส่วนรวม</option>
        </select>
    </div>
    <!-- name -->
    <div class="form-group col-md-6">
        <label for="name">ซื่องาน</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
</div>
<!-- detail -->
<div class="form-group">
    <label for="detail">รายละเอียด</label>
    <textarea class="form-control" id="detail" name="detail"></textarea>
</div>
<!-- status -->
<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="status" name="status">
      <label class="form-check-label" for="status">Completed</label>
    </div>
</div>
<!-- submit -->
<button type="submit" class="btn btn-primary">Create</button>
```



## Validate@backend
```php
$taskCreateValidateRules = [
    'type' => 'required',
    'name' => 'required'
];

request()->validate($taskCreateValidateRules);
```



## Show errors@form
```html
@if(count($errors) > 0)
    @foreach($errors as $errors)
    <div>{{ $errors }}</div>
    @endforeach
@endif
```



## Validate with custom message
```php
$taskCreateValidateRules = [
    'type' => 'required',
    'name' => 'required'
];

$taskCreateValidateMessages = [
    'type.required' => 'ลงข้อมูล ประเภทงาน ด้วยสิอีช่อ',
    'name.required' => 'ลงข้อมูล ชื่องาน ด้วยสิอีช่อ'
];

request()->validate($taskCreateValidateRules, $taskCreateValidateMessages);
```
