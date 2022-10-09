@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Students in class</h1>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

                @foreach($students as $student)
                    {{-- @foreach ($classes as $class ) --}}
                        <tr>
                            <td>{{ $student->forename . ' ' . $student->surname }} </td>
                            <td></td>
                            <td></td>
                            <td><td><a class="btn btn-outline-primary btn-sm" href="#">View student details </a></td> </td></td>
                        </tr>
                    {{-- @endforeach --}}
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
