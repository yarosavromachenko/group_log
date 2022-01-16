<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оценить студента </title>
</head>
<body>
<form action="{{route('home')}}">
    <button>На главную</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <div><h3>Оценка студента {{$student->first_name}} {{$student->last_name}}<br>
            по предмету: {{$item->name}}
        </h3></div>
    <div>
        <form method="post" action="{{route('student.store', ['student' => $student,
                    'item' => $item])}}">
            @csrf
            <div>
                <label for="grade"><h3>Введите оценку от 1 до 5</h3></label>
                <input type="text" name="grade" id="grade" placeholder="Введите оценку">
            </div>
            <br>
            <div>
                <button>Сохранить</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
