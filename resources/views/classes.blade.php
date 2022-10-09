@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{ $teacherName }}</h1>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Class Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>

                @foreach($classList as $class)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($class['start_at']->date)->format('l (F jS)')}} </td>
                        <td>{{\Carbon\Carbon::parse($class['start_at']->date)->format('G:i')}} </td>
                        <td>{{\Carbon\Carbon::parse($class['end_at']->date)->format('G:i')}} </td>
                        <td>{{$class['className']}}</td>
                        <td><a class="btn btn-outline-primary btn-sm" href="{{route('classdetails', $class['classId'])}}">View class info</a></td> </td>
                    </tr>
                @endforeach

        </tbody>
    </table>
    <div class="pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
    </div>
</div>
@endsection()
