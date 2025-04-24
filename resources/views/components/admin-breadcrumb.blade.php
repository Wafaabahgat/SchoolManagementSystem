@props([
    'address' => '',
    'adminUrl' => url('admin/admin/list'), 
    'adminLabel' => 'Admin'
])

<div class="col-auto d-flex justify-content-end mt-2">
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item">
            <a href="{{ $adminUrl }}">{{ $adminLabel }}</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $address }}
        </li>
    </ol>
</div>
