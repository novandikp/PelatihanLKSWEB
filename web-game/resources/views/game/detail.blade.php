@extends("layouts.index")
@section("konten")
<h3>Detail Game</h3>
<canvas id="canvas" width="750" height="750"></canvas>
@once
@push('scripts')
    <script>
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        const width = canvas.width;
        const height = canvas.height;

        // Deklarasi gambar
        let background = new Image();
        background.src = "{{asset('assets/game/space.png')}}";

        let plane = new Image();
        plane.src = "{{asset('assets/game/airplane.png')}}";

        let laser = new Image();
        laser.src = "{{asset('assets/game/laser.png')}}";

        let ufo = new Image();
        ufo.src = "{{asset('assets/game/ufo.png')}}";

        // Deklarasi objek
        const playerSize = 50;
        const bulletSize = playerSize / 2 - 10;
        const bullets = [];
        const player = {
        x: (width - playerSize) / 2,
        y: height - playerSize,
        };

        const enemy = {
        x: (width - playerSize) / 2,
        y: 0 - playerSize,
        };

        let gameloop;

        window.onload = function () {
        controller();
        gameloop = setInterval(draw, 200);
        };

        const draw = function () {
        drawBackground();
        collisionDetectionSelf();
        drawPlayer();
        drawBullet();
        collisionDetection();
        drawEnemy();
        };

        const collisionDetectionSelf = function () {
        if (
            player.x + playerSize > enemy.x &&
            enemy.x + playerSize > player.x &&
            enemy.y + playerSize > player.y &&
            player.y + playerSize > enemy.y
        ) {
            let bomb = new Audio("{{asset('assets/game/bomb.mp3')}}");
            bomb.play();
            clearInterval(gameloop);
            alert("Game Over");
        }
        };

        const collisionDetection = function () {
        bullets.forEach(function (bullet) {
            if (
            bullet.y < enemy.y + playerSize &&
            enemy.x + playerSize > bullet.x &&
            bullet.x + bulletSize > enemy.x
            ) {
            //hapus tembak
            bullets.splice(bullets.indexOf(bullet), 1);
            let bomb = new Audio("{{asset('assets/game/bomb.mp3')}}");
            bomb.play();
            enemy.x = Math.floor(Math.random() * (width / playerSize)) * playerSize;
            enemy.y = 0 - playerSize;
            }
        });
        };

        const drawEnemy = function () {
        ctx.drawImage(ufo, enemy.x, enemy.y, playerSize, playerSize);
        enemy.y += playerSize;
        if (enemy.y > height) {
            enemy.x = Math.floor(Math.random() * (width / playerSize)) * playerSize;
            enemy.y = 0 - playerSize;
        }
        };

        const drawPlayer = function () {
        ctx.drawImage(plane, player.x, player.y, playerSize, playerSize);
        };
        const drawBackground = function () {
        ctx.drawImage(background, 0, 0, width, height);
        };

        const drawBullet = function () {
        bullets.forEach(function (bullet) {
            ctx.drawImage(laser, bullet.x, bullet.y, bulletSize, playerSize);
            bullet.y -= playerSize;
        });
        };

        const controller = function () {
        document.addEventListener("keydown", function (event) {
            if (event.key === "ArrowLeft") {
            player.x -= playerSize;
            } else if (event.key === "ArrowRight") {
            player.x += playerSize;
            }

            if (event.key === " " || event.key === "Enter") {
            bullets.push({
                x: player.x + (playerSize / 2 - 6),
                y: player.y - playerSize,
            });
            let laserSound = new Audio("{{asset('assets/game/laser.mp3')}}");
            laserSound.play();
            }

            if (player.x < 0) {
            player.x = 0;
            } else if (player.x > width - playerSize) {
            player.x = width - playerSize;
            }
        });
        };

    </script>
@endpush
@endonce
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
