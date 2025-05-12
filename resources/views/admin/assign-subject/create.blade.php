@extends('layouts.app')

@section('content')
    <div class="p-2">
        @include('_message')

        <x-admin-breadcrumb address="Add" adminLabel="Subject Assign" adminUrl="{{ route('admin.assign-subject.index') }}" />

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $head_title }}</h3>
                        </div>
                        <form method="POST" action="{{ route('admin.assign-subject.insert') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="class_id">Class</label>
                                    <select name="class_id" id="class_id" class="form-control" required>
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Subjects</label>
                                    <div class="row">
                                        @foreach ($subjects as $subject)
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="subject_ids[]"
                                                        id="subject_{{ $subject->id }}" value="{{ $subject->id }}"
                                                        class="form-check-input">
                                                    <label for="subject_{{ $subject->id }}" class="form-check-label">
                                                        {{ $subject->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
