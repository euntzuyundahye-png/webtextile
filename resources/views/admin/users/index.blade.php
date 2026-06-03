@extends('layouts.admin')

@section('content')

<style>
    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
        flex-wrap:wrap;
        gap:15px;
    }

    .page-title{
        color:#2563eb;
        font-size:28px;
        font-weight:bold;
    }

    .btn-add{
        background:#3b82f6;
        color:white;
        padding:12px 20px;
        border-radius:10px;
        text-decoration:none;
        font-weight:600;
        transition:.3s;
    }

    .btn-add:hover{
        background:#2563eb;
    }

    .card-table{
        background:white;
        border:2px solid #dbeafe;
        border-radius:20px;
        padding:20px;
        box-shadow:
            0 0 15px rgba(191,219,254,.4);
        overflow-x:auto;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:#eff6ff;
    }

    th{
        color:#1e40af;
        padding:15px;
        text-align:left;
        border-bottom:2px solid #dbeafe;
    }

    td{
        padding:15px;
        border-bottom:1px solid #e5e7eb;
    }

    tr:hover{
        background:#f8fbff;
    }

    .badge-role{
        background:#dbeafe;
        color:#1d4ed8;
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .action-group{
        display:flex;
        gap:10px;
        flex-wrap:wrap;
    }

    .btn-edit{
        background:#f59e0b;
        color:white;
        padding:8px 15px;
        border:none;
        border-radius:8px;
        text-decoration:none;
        cursor:pointer;
    }

    .btn-delete{
        background:#ef4444;
        color:white;
        padding:8px 15px;
        border:none;
        border-radius:8px;
        cursor:pointer;
    }

    .btn-edit:hover{
        background:#d97706;
    }

    .btn-delete:hover{
        background:#dc2626;
    }

    .alert-success{
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:10px;
        margin-bottom:20px;
    }

    .alert-error{
        background:#fee2e2;
        color:#991b1b;
        padding:15px;
        border-radius:10px;
        margin-bottom:20px;
    }

    @media(max-width:768px){

        .page-header{
            flex-direction:column;
            align-items:flex-start;
        }

        .page-title{
            font-size:24px;
        }

        table{
            min-width:700px;
        }
    }
</style>

<div class="page-header">

    <h2 class="page-title">
         Data User
    </h2>

    <a href="{{ route('users.create') }}" class="btn-add">
        + Tambah User
    </a>

</div>


<div class="card-table">

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($users as $user)

            <tr>

                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    <span class="badge-role">
                        {{ $user->role?->name }}
                    </span>
                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('users.edit', $user->id) }}"
                           class="btn-edit">
                            ✏️
                        </a>

                        <form action="{{ route('users.destroy', $user->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn-delete">
                                🗑
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5" style="text-align:center;">
                    Tidak ada data user.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection