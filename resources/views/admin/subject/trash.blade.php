@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">

        @include('_message')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4 d-flex align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1>Subject Trash</h1>
                    </div>

                    <x-admin-breadcrumb address="List" adminLabel="Subject" adminUrl="{{ route('admin.subject.index') }}" />

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
                                <a href="{{ url('admin/subject-trash') }}" class="btn btn-success ms-2">Clear</a>
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


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Deleted At</th>
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
                                        <td>{{ $subject->deleted_at }}</td>
                                        <td class="d-flex gap-2">
                                            <!-- Restore Form - Changed to POST with method spoofing -->
                                            <form action="{{ route('admin.subject.restore', $subject->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to restore this subject?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Restore
                                                </button>
                                            </form>

                                            <!-- Force Delete Form - This is correct -->
                                            <form action="{{ route('admin.subject.force-delete', $subject->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to permanently delete this subject?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>

        {{ $subjects->withQueryString()->links() }}
    </div>
@endsection
