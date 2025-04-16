@extends('layouts.app')

@section('content')
    <div class="p-2">
        @include('_message')
        <x-admin-breadcrumb address="Edit" />

        <div class="col-md-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Class</h3>
                </div>
                <form action="{{ route('admin.class.update', $class->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <x-ui.input
                            label="Name"
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Name"
                            value="{{ old('name', $class->name) }}"
                        />

                        <x-ui.select
                            name="status"
                            :options="['active' => 'Active', 'inactive' => 'Inactive']"
                            label="Status"
                            :selected="old('status', $class->status)"
                        />
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-1 col-md-1">Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
