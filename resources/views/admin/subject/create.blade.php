@extends('layouts.app')

@section('content')
    <div class="p-2">
        @include('_message')

        <x-admin-breadcrumb address="Add" />

        <div class="col-md-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Subject</h3>
                </div>
                <form action="{{ route('admin.subject.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-ui.input label="Name" type="text" id="name" name="name" placeholder="Name"
                            value="{{ old('name') }}" />

                        <x-ui.select name="type" :options="['theory' => 'Theory', 'practical' => 'Practical']" label="type" :selected="old('type', 'theory')" />
                        <x-ui.select name="status" :options="['active' => 'Active', 'inactive' => 'Inactive']" label="Status" :selected="old('status', 'active')" />
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-1 col-md-1">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
