@extends("layouts.index")
@section("konten")
<h3>Tambah Game</h3>

<form action="{{route('game.store')}}" method="post">
    @csrf
    <div class="form-group mt-2">
        <label for="">Nama</label>
        <input type="text" name="name" class="form-control">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Deskripsi</label>
        <input type="text" name="description" class="form-control">
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Homepage</label>
        <input type="text" name="homepage" class="form-control">
        @error('homepage')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Developer</label>
        <select name="developer_id" class="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-2">
        <label for="">Muncul di dashboard ?</label>
        <select name="enabled" class="form-control">
            <option value="0">Tidak Muncul</option>
            <option value="1">Muncul</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
