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
                <form action="{{ route('admin.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <x-ui.input label="Name" type="text" id="name" name="name" placeholder="Name"
                            value="{{ $user->name }}" />

                        <x-ui.input label="Password" type="password" id="password" name="password"
                            placeholder="Password" />
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-1 col-md-1">Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
