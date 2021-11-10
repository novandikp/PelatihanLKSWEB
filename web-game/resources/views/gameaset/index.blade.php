@extends("layouts.index")
@section("konten")
<div class="d-flex">
    <input type="text" class="form-control">
    <button class="btn btn-secondary">Cari</button>
</div>
<button class="btn btn-primary my-2">Tambah</button>

<table class="table table-striped">
    <thead class="bg-primary text-white">
        <tr>
            <th>No</th>
            <th>Avatar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Kevin</td>
            <td>Budi</td>
            <td>Email</td>
            <td>Role</td>
            <td>
                <button class="btn-success btn-sm">Edit</button>
                <button class="btn-primary btn-sm">Detail</button>
                <button class="btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
