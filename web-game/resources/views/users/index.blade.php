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
        @foreach ($users as $no=>$user)
        <tr>
            <td>{{$no+1}}</td>
            <td>Kevin</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>
                <button class="btn-success btn-sm">Edit</button>
                <button class="btn-primary btn-sm">Detail</button>
                <button class="btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
