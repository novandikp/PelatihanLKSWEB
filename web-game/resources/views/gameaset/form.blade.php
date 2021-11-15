@extends("layouts.index")
@section("konten")
<h3>Tambah Asset Game</h3>
<form enctype="multipart/form-data" action="{{route('asset.store')}}" method="post">
    @csrf
    <input type="hidden" name="game_id" value="{{$id}}"/>
    <div class="form-group mt-2">
        <label for="">Asset</label>
       <input type="file" name="image_asset" class="form-control"/>
       @error('image_asset')
           <small class="text-danger">{{$message}}</small>
       @enderror
    </div>
    <div class="form-group mt-2">
        <label for="">Feature Image</label>
        <select name="featured_image" class="form-control">
            <option value="0">Tidak</option>
            <option value="1">Iya</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
