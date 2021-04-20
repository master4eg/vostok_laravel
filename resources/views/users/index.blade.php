@extends('layout.layout')
@section('title', 'Users')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add user</a>
                </div>
                <div class="col" style="text-align: right">
                    <a href="{{ route('users.export') }}" class="btn btn-success"><i class="demo-icon icon-file-excel"></i>Export to Excel</a>
                </div>
            </div>
        </div>
        <div class="card-body p-0 overflow-auto" style="max-height: 80vh">
            <table class="table table-striped table-hover m-0">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">SecondName</th>
                    <th scope="col">MiddleName</th>
                    <th scope="col">Debt</th>
                    <th scope="col">State Fee</th>
                    <th>Action</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row"></th>
                        <th scope="row">{{ $user->id }}</th>
                        <td><a target="_blank" href="{{ route('users.show', [$user->id]) }}">{{ $user->firstName }}</a>
                        </td>
                        <td><a target="_blank" href="{{ route('users.show', [$user->id]) }}">{{ $user->secondName }}</a>
                        </td>
                        <td><a target="_blank" href="{{ route('users.show', [$user->id]) }}">{{ $user->middleName }}</a>
                        </td>
                        <td>{{ $user->debt }}</td>
                        <td>{{ $user->stateFee }}</td>
                        <td>
                            <div class="dropdown d-grid gap-2">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="demo-icon icon-file-pdf"></i>PDF
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" target="_blank"
                                           href="{{ route('PDF.show', [$user->id ]) }}">Show</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ action([\App\Http\Controllers\InvoiceController::class, 'downloadDocument'], $user->id) }}">Download</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="d-grid gap-2">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm" type="submit"><i
                                        class="demo-icon icon-pencil"></i>Edit
                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                <div class="d-grid gap-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i
                                            class="demo-icon icon-trash-empty"></i>Delete
                                    </button>
                                </div>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            Users count: {{ $count }}
        </div>
    </div>
@endsection
