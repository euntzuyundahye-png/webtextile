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
        font-size:28px;
        font-weight:700;
        color:#2563eb;
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
        border-radius:20px;
        overflow:hidden;
        border:1px solid #dbeafe;
        box-shadow:0 0 20px rgba(96,165,250,.15);
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
        border-bottom:2px solid #dbeafe;
        font-weight:600;
    }

    td{
        padding:15px;
        border-bottom:1px solid #e5e7eb;
    }

    tbody tr:hover{
        background:#f8fbff;
    }

    .permission-badge{
        display:inline-block;
        background:#dbeafe;
        color:#1d4ed8;
        padding:7px 14px;
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
        text-decoration:none;
        padding:8px 15px;
        border-radius:8px;
        font-size:14px;
    }

    .btn-delete{
        background:#ef4444;
        color:white;
        border:none;
        padding:8px 15px;
        border-radius:8px;
        cursor:pointer;
        font-size:14px;
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

        .table-card{
            overflow-x:auto;
        }

        table{
            min-width:700px;
        }

    }

</style>

<div class="page-header">

    <h2 class="page-title">
        🔑 Data Permission
    </h2>

    <a href="{{ route('permissions.create') }}" class="btn-add">
        + Tambah Permission
    </a>

</div>

<div class="table-card">

    <table>

        <thead>
            <tr>
                <th width="80">ID</th>
                <th>Permission</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($permissions as $permission)

            <tr>

                <td>
                    {{ $permission->id }}
                </td>

                <td>
                    <span class="permission-badge">
                        {{ $permission->name }}
                    </span>
                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('permissions.edit', $permission->id) }}"
                           class="btn-edit">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('permissions.destroy', $permission->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus permission ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-delete">
                                🗑 Hapus
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="3" style="text-align:center;padding:20px;">
                    Tidak ada data permission.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection