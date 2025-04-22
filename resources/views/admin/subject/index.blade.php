@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">

        @include('_message')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4 d-flex align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1>Subject List</h1>
                    </div>

                    <x-admin-breadcrumb address="List" />

                </div>
            </div>
        </section>

        <div class="col-md-12 mb-4">
            <div class="card card-primary">
                <form action="" method="get">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <x-ui.input type="text" id="name" name="name" placeholder="Name"
                                    value="{{ Request::get('name') }}" />
                            </div>

                            <div class="form-group col-md-3 mt-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ url('admin/subject') }}" class="btn btn-success ms-2">Clear</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        <!-- Main content -->
        <section class="content mb-3">
            <div class="container-fluid">
                <div class="row">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary ms-auto">
                                <a class="text-white text-decoration-none" href="{{ url('admin/subject/create') }}">
                                    Add New Subject
                                </a>
                            </button>
                            {{-- @dd(route('admin.subject.trash')); --}}

                            <a href="{{ route('admin.subject.trash') }}"
                                class="btn btn-dark text-white text-decoration-none ms-2">
                                Trash
                            </a>

                        </div>
                        <!-- /.card-header -->
                        {{-- @if ($classess->get()->isNotEmpty()) --}}

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->type }}</td>
                                        <td>{{ $subject->status }}</td>
                                        <td>{{ $subject->created_by_name }}</td>
                                        <td>{{ $subject->created_at }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('admin.subject.edit', $subject->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('admin.subject.destroy', $subject->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn are_you_shur btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- @else
                            <p class="text-center">No admins found.</p>
                        @endif --}}

                    </div>
                </div>
            </div>
        </section>

        {{ $subjects->withQueryString()->links() }}
    </div>
@endsection
