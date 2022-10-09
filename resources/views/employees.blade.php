@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Name</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>

            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->title }}</td>
                    <td>{{ $employee->forename }} {{ $employee->surname }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="{{ route('schedule', $employee->id)}}">View classes</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- TODO: Pagination using the more URL in the API. Simple next/prev --}}
    <div class="pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
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
