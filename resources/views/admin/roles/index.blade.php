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
        font-weight:700;
    }

    .btn-add{
        background:#3b82f6;
        color:white;
        text-decoration:none;
        padding:12px 20px;
        border-radius:12px;
        font-weight:600;
        transition:.3s;
    }

    .btn-add:hover{
        background:#2563eb;
        transform:translateY(-2px);
    }

    .table-card{
        background:white;
        border-radius:18px;
        overflow:hidden;
        box-shadow:0 0 20px rgba(96,165,250,.15);
        border:1px solid #dbeafe;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:#eff6ff;
    }

    th{
        padding:15px;
        text-align:left;
        color:#1e40af;
        font-weight:600;
        border-bottom:2px solid #dbeafe;
    }

    td{
        padding:15px;
        border-bottom:1px solid #e5e7eb;
    }

    tbody tr:hover{
        background:#f8fbff;
    }

    .role-badge{
        display:inline-block;
        background:#dbeafe;
        color:#1d4ed8;
        padding:6px 14px;
        border-radius:20px;
        font-size:13px;
        font-weight:600;
    }

    .action-group{
        display:flex;
        gap:8px;
        flex-wrap:wrap;
    }

    .btn-permission{
        background:#8b5cf6;
        color:white;
        text-decoration:none;
        padding:8px 14px;
        border-radius:8px;
        font-size:14px;
    }

    .btn-edit{
        background:#f59e0b;
        color:white;
        text-decoration:none;
        padding:8px 14px;
        border-radius:8px;
        font-size:14px;
    }

    .btn-delete{
        background:#ef4444;
        color:white;
        border:none;
        padding:8px 14px;
        border-radius:8px;
        cursor:pointer;
        font-size:14px;
    }

    .btn-permission:hover{
        background:#7c3aed;
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

    @media(max-width:768px){

        .page-header{
            flex-direction:column;
            align-items:flex-start;
        }

        table{
            min-width:700px;
        }

        .table-card{
            overflow-x:auto;
        }
    }
</style>

<div class="page-header">

    <h2 class="page-title">
         Data Role
    </h2>

    <a href="{{ route('roles.create') }}" class="btn-add">
        + Tambah Role
    </a>

</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th width="80">ID</th>
                <th>Nama Role</th>
                <th width="350">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($roles as $role)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <span class="role-badge">
                        {{ $role->name }}
                    </span>
                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('roles.permissions', $role->id) }}"
                           class="btn-permission">
                            🔑 
                        </a>

                        <a href="{{ route('roles.edit', $role->id) }}"
                           class="btn-edit">
                            ✏️ 
                        </a>

                        <form action="{{ route('roles.destroy', $role->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus role ini?')">

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
                <td colspan="3" style="text-align:center;">
                    Tidak ada data role.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection