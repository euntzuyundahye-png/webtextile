@extends('layouts.admin')

@section('content')

<h2>
    Permission Role :
    {{ $role->name }}
</h2>

<form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">


    @csrf
    @method('PUT')

    @php

    $groups = [

    'USER MANAGEMENT' => [
    'user.view',
    'user.create',
    'user.edit',
    'user.delete',
    ],

    'ROLE MANAGEMENT' => [
    'role.view',
    'role.create',
    'role.edit',
    'role.delete',
    ],

    'PERMISSION MANAGEMENT' => [
    'permission.view',
    'permission.create',
    'permission.edit',
    'permission.delete',
    ],

    'DATA KAIN' => [
    'kain.view',
    'kain.create',
    'kain.edit',
    'kain.delete',
    ],

    'STOK MASUK' => [
    'stok_masuk.view',
    'stok_masuk.create',
    'stok_masuk.edit',
    'stok_masuk.delete',
    ],

    'STOK KELUAR' => [
    'stok_keluar.view',
    'stok_keluar.create',
    'stok_keluar.edit',
    'stok_keluar.delete',
    ],

    'LAPORAN' => [
    'laporan.view',
    ],

    ];

    @endphp

    @foreach($groups as $title => $items)

    <div style="
            border:1px solid #ccc;
            padding:15px;
            margin-bottom:15px;
        ">

        <h3>{{ $title }}</h3>

        <button type="button" onclick="checkGroup('{{ Str::slug($title) }}')">
            Centang Semua
        </button>

        <button type="button" onclick="uncheckGroup('{{ Str::slug($title) }}')">
            Hapus Centang
        </button>

        <hr>

        @foreach($permissions as $permission)

        @if(in_array($permission->name, $items))

        <div>

            <label>

                <input type="checkbox" class="{{ Str::slug($title) }}" name="permissions[]"
                    value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>

                {{ $permission->name }}

            </label>

        </div>

        @endif

        @endforeach

    </div>

    @endforeach

    <button type="submit">
        Simpan Permission
    </button>


</form>

<script>
function checkGroup(group) {
    document
        .querySelectorAll('.' + group)
        .forEach(function(item) {

            item.checked = true;

        });
}

function uncheckGroup(group) {
    document
        .querySelectorAll('.' + group)
        .forEach(function(item) {

            item.checked = false;

        });
}
</script>

@endsection