@extends("layouts.index")
@section("konten")
<form method="GET">

    <div class="d-flex">
        <input name="keyword" type="text" class="form-control">
        <button type="submit" class="btn btn-secondary">Cari</button>
    </div>
</form>

<a href={{url('user/form')}} class="btn btn-primary my-2">Tambah</a>

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
                <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn-success btn-sm">Edit</a>
                <a href="{{route('user.detail',['id'=>$user->id])}}" class="btn-primary btn-sm">Detail</a>
                <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
