@extends("layouts.index")
@section("konten")
<div class="d-flex">
    <input type="text" class="form-control">
    <a href="{{route("game.create")}}" class="btn btn-secondary">Cari</a>
</div>
<a href="{{route("game.create")}}" class="btn btn-primary my-2">Tambah</a>

<table class="table table-striped">
    <thead class="bg-primary text-white">
        <tr>

            <th>Judul</th>
            <th>Developer</th>

            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
        <tr>
            <td>{{$game->name}}</td>
            <td>{{$game->developer->name}}</td>

            <td>
                <a href="{{route("game.edit",["game"=>$game])}}" class="btn-success btn-sm">Edit</a>
                <a href="{{route("game.show",["game"=>$game])}}" class="btn-primary btn-sm">Detail</a>
                <form action={{route("game.destroy",["game"=>$game])}} method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn-danger btn-sm">Hapus</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
