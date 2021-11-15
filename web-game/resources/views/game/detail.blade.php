@extends("layouts.index")
@section("konten")
<h3>Detail Game</h3>

<div class="form-group mt-2">
    <label for="">Nama</label>
    <input type="text" name="name" disabled readonly  value={{$game->name}} class="form-control">
    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mt-2">
    <label for="">Deskripsi</label>
    <input type="text" name="description" disabled readonly  value={{$game->description}} class="form-control">
    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mt-2">
    <label for="">Homepage</label>
    <input type="text" name="homepage" disabled readonly  value={{$game->homepage}} class="form-control">
    @error('homepage')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group mt-2">
    <label for="">Developer</label>
    <select name="developer_id" disabled readonly class="form-control">
        @foreach ($users as $user)
        <option {{$game->developer_id == $user->id ? 'selected' : ''}}
         value="{{$user->id}}">
         {{$user->name}}</option>
        @endforeach
    </select>
</div>

<h4>Asset Game</h4>
<a href="{{route("gameasset",["id"=>$game->id])}}" class="btn btn-primary my-2">Tambah</a>

<table class="table table-striped">
    <thead class="bg-primary text-white">
        <tr>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($game->asset as $asset)
        <tr>
            <td><img class="" style="max-height: 200px" src="{{asset('assets/images/game/'.$game->id.'/'.$asset->path)}}"/></td>
            <td>
                <form action={{route("asset.destroy",["asset"=>$asset])}} method="POST">
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
