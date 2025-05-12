@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">

        @include('_message')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4 d-flex align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1>Subject Assign Trash</h1>
                    </div>

                    <x-admin-breadcrumb address="List" adminLabel="Subject Assign" adminUrl="{{ route('admin.assign-subject.index') }}" />
                </div>
            </div>
        </section>

        <div class="col-md-12 mb-4">
            <div class="card card-primary">
                <form action="" method="get">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <x-ui.input type="text" id="name" name="name" placeholder="Search by Subject or Class Name"
                                    value="{{ Request::get('name') }}" />
                            </div>
                            <div class="form-group col-md-3 mt-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('admin.assign-subject.trash') }}" class="btn btn-success ms-2">Clear</a>
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
                                    <th>Class Name</th>
                                    <th>Subject Name</th>
                                    <th>Status</th>
                                    <th>Deleted At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subjects as $assignment)
                                    <tr>
                                        <td>{{ $assignment->id }}</td>
                                        <td>{{ $assignment->class->name ?? 'N/A' }}</td>
                                        <td>{{ $assignment->subject->name ?? 'N/A' }}</td>
                                        <td>{{ $assignment->status }}</td>
                                        <td>{{ $assignment->deleted_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="d-flex gap-2">
                                            <!-- Restore Form -->
                                            <form action="{{ route('admin.assign-subject.restore', $assignment->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to restore this subject assignment?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Restore
                                                </button>
                                            </form>

                                            <!-- Force Delete Form -->
                                            <form action="{{ route('admin.assign-subject.force-delete', $assignment->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to permanently delete this subject assignment?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No trashed assignments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        {{ $subjects->withQueryString()->links() }}
    </div>
@endsection
