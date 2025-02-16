@extends('layouts.app')

@section('content')
    <div class="p-2">
        @include('_message')
        <x-admin-breadcrumb address="Edit" />

        <div class="col-md-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Admin</h3>
                </div>
                <form action="{{ route('admin.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" id="name" required name="name" value="{{ $user->name }}"
                                class="form-control mt-1" placeholder="Name">
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email</label>
                            <input type="email" id="email" required name="email" value="{{ $user->email }}"
                                class="form-control mt-1" placeholder="Email">
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control mt-1"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-1 col-md-1">Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
