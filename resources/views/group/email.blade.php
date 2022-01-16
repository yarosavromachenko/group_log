<div>
    @if(empty($student->items->avg('pivot.grade')))
        <h3>Среднюю оценку студента {{$student->first_name}} {{$student->last_name}}
            пока нельзя вычислить.</h3>
    @else
        <h3>Средняя оценка студента {{$student->first_name}} {{$student->last_name}}
            :{{$student->items->avg('pivot.grade')}} балла </h3>
    @endif
    <br>
    <h3>Оценки по всем предметам:</h3>
    <table>
        <thead>
        <tr>
            @foreach($items as $item)
                <th>{{$item->name}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <tr align="center">
            @foreach($student->items as $item)
                <td>
                    @if(empty($item->pivot->grade))
                        Еще не оценен!
                    @else
                        {{$item->pivot->grade}}
                    @endif
                </td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>
