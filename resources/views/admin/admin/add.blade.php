@extends('layouts.app')

@section('content')
    <div class="p-2">
        @include('_message')

        <x-admin-breadcrumb address="Add" />

        <div class="col-md-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Admin</h3>
                </div>
                <form action="{{ route('admin.insert') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-ui.input label="Name" type="text" id="name" name="name" placeholder="Name"
                            value="{{ old('name') }}" />

                        <x-ui.input label="Email" type="email" id="email" name="email" placeholder="Email"
                            value="{{ old('email') }}" />

                        <x-ui.input label="Password" type="password" id="password" name="password"
                            placeholder="Password" />
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-1 col-md-1">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
