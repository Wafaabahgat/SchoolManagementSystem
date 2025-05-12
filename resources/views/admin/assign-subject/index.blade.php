@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-3">

        @include('_message')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4 d-flex align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1>Subject Assign List</h1>
                    </div>

                    <x-admin-breadcrumb address="List" adminLabel="assign-subject"
                        adminUrl="{{ route('admin.assign-subject.index') }}" />
                </div>
            </div>
        </section>

        <!-- Search Form -->
        <div class="col-md-12 mb-4">
            <div class="card card-primary">
                <form action="" method="get">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <x-ui.input type="text" id="name" name="name" placeholder="Class Name"
                                    value="{{ Request::get('name') }}" />
                            </div>
                            <div class="col-md-3">
                                <x-ui.input type="date" id="date" name="date"
                                    value="{{ Request::get('date') }}" />
                            </div>
                            <div class="form-group col-md-3 mt-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('admin.assign-subject.index') }}" class="btn btn-success ms-2">Clear</a>
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
                    <div class="card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary ms-auto">
                                <a class="text-white text-decoration-none"
                                    href="{{ route('admin.assign-subject.create') }}">
                                    Add New Subject Assign
                                </a>
                            </button>
                            <a href="{{ route('admin.assign-subject.trash') }}"
                                class="btn btn-dark text-white text-decoration-none ms-2">
                                Trash
                            </a>

                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cls as $class)
                                    <tr>
                                        <td>{{ $class->id }}</td>
                                        <td>{{ $class->name ?? 'N/A' }}</td>
                                        <td>{{ $class->subjects->pluck('name')->implode(', ') ?: 'No subjects assigned' }}
                                        </td>
                                        <td>{{ $class->status }}</td>
                                        <td>{{ $class->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('admin.assign-subject.edit', $class->id) }}"
                                                class="btn btn-success btn-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.assign-subject.destroy', $class->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this class?')">
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
                                        <td colspan="6" class="text-center">No assignments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        {{ $cls->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
