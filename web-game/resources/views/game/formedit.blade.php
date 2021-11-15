@extends("layouts.index")
@section("konten")
<h3>Edit Game</h3>

<form action="{{route('game.update',['game'=>$game])}}" method="post">
    @method('PUT')
    @csrf
    <div class="form-group mt-2">
        <label for="">Nama</label>
        <input type="text" name="name" value={{$game->name}} class="form-control">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Deskripsi</label>
        <input type="text" name="description" value={{$game->description}} class="form-control">
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Homepage</label>
        <input type="text" name="homepage" value={{$game->homepage}} class="form-control">
        @error('homepage')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Developer</label>
        <select name="developer_id" class="form-control">
            @foreach ($users as $user)
            <option {{$game->developer_id == $user->id ? 'selected' : ''}}
             value="{{$user->id}}">
             {{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-2">
        <label for="">Muncul di dashboard ?</label>
        <select name="enabled" class="form-control">
            <option {{$game->enabled == 0 ? 'selected' : ''}} value="0">Tidak Muncul</option>
            <option {{$game->enabled == 1 ? 'selected' : ''}} value="1">Muncul</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
