<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать оценку </title>
</head>
<body>
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
        <table>
            <tbody>
            <form method="post" action="{{route('student.update', ['student' => $student,
                    'item' => $item])}}">
                @csrf
                @method('PUT')
                <div>
                    <label for="grade"><h3>Текущая оценка: {{$grade}}</h3></label>
                    <input type="text" name="grade" id="grade" placeholder="Изменить оценку">
                </div>
                <br>
                <th>
                    <button>Сохранить</button>
                </th>
            </form>
            <th>
                <form action="{{route('home')}}">
                    <button>Отменить</button>
                </form>
            </th>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
