<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                Borang {{$borangJwpn->borangs->namaBorang}}
            </h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h1 class="header-title" style="color: var(--bs-body-color)">Nama Permohon: <p style="color: var(--bs-body-color);text-transform:uppercase">{{$borangJwpn->user->nama}}</p></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="jwpn{{$borangJwpn->id}}" style="font-family:'Arial'; text-transform: uppercase;">NAMA: {{$borangJwpn->nama}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="jwpn{{$borangJwpn->id}}" style="font-family:'Arial'; text-transform: uppercase;">NO KAD PENGENALAN: {{$borangJwpn->ic}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="jwpn{{$borangJwpn->id}}" style="font-family:'Arial'; text-transform: uppercase;">WILAYAH: {{$borangJwpn->wilayahs->nama}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="jwpn{{$borangJwpn->id}}" style="font-family:'Arial'; text-transform: uppercase;">NO KAD PENGENALAN: {{$borangJwpn->rancangans->nama}}</label>
                    </div>
                </div>
            @foreach($jawapanMedan as $jwpnMedan)
                <div class="row">
                    <div class="mb-3">
                        <label for="jwpn{{$jwpnMedan->id}}" style="font-family:'Arial'; text-transform: uppercase;">{{$jwpnMedan->medan->nama}}: {{$jwpnMedan->jawapan}}</label>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</body>
</html>