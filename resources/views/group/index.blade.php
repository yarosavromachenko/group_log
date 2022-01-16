<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
    <title>Журнал студентов</title>
</head>
<body>
<div>
    <table>
        <div><h3>Журнал студентов:</h3></div>
        <div>
            <thead>
            <tr>
                <br>
                <th style="width: 10px">#</th>
                <th>Имя</th>
                <th style="width: 100px">Фамилия</th>
                @foreach($items as $item)
                    <th>{{$item->name}}</th>
                @endforeach
                <th>Средняя студента:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr align="center">
                    <td><b>{{$student->id}}</b></td>
                    <td><b>{{$student->first_name}}</b></td>
                    <td><b>{{$student->last_name}}</b></td>
                    @foreach($student->items as $item)
                        @if(empty($item->pivot->grade))
                            <td>
                                <button><a
                                        href="{{route('student.create',['student' => $student, 'item' => $item])}}">Оценить</a>
                                </button>
                            </td>
                        @else
                            <td><b>{{$item->pivot->grade}}</b>
                                <button><a
                                        href="{{route('student.edit',['student' => $student, 'item' => $item, 'grade' => $item->pivot->grade])}}">Ред.</a>
                                </button>
                            </td>
                        @endif
                    @endforeach
                    <td>
                        <b>{{round($student->items->avg('pivot.grade'),1)}}</b>
                    </td>
                    <td>
                        <button><a href="{{route('student.send', ['student' => $student])}}">Отправить оценки</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            <td></td>
            <td></td>
            <th>Среднее предмета:</th>
            @foreach($items as $item)
                <th>{{round($item->students->avg('pivot.grade'),1)}}</th>
            @endforeach
            </tbody>
        </div>
    </table>
</div>
</body>
</html>
