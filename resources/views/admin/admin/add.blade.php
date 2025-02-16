@extends('layouts.app')

@section('content')
<div class="p-2">
        @include('_message')

        <div class="col-auto d-flex justify-content-end mt-2">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin/admin/list') }}">Admin</a>
                </li>
                <li class="breadcrumb-item active">
                    Add
                </li>
            </ol>
        </div>

        <div class="col-md-12 mt-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Admin</h3>
                </div>
                <form action="{{ route('admin.insert') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" id="name" required name="name" class="form-control mt-1"
                                placeholder="Name">
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email</label>
                            <input type="email" id="email" required name="email" class="form-control mt-1"
                                placeholder="Email">
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Password</label>
                            <input type="password" id="password" required class="form-control mt-1" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mt-1 col-md-1">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
