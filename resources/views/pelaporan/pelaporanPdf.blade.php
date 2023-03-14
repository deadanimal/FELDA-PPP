
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            PELAPORAN AKTIVITI <span style="text-transform: uppercase">{{$aktiviti->nama}} </span> BAGI PENGGUNA <span style="text-transform: uppercase">{{$user->nama}} </span> 
        </h1>
    </div>
    <div class="card" style="width: auto;">
        <div class="card-body" style="width: auto;">
            <div class="row d-flex justify-content-center">
                <table class="table table-bordered table-striped w-100">
                    <thead class="text-white bg-primary w-100">
                        <tr>
                            <th class="text-center">Bil.</th>
                            <th class="text-center" scope="col">Nama Parameter</th>
                            <th class="text-center" scope="col">Unit</th>
                            <th class="text-center" scope="col">Tempoh Masa</th>
                            <th class="text-center" scope="col">Masa Dilaksanakan</th>
                            <th class="text-center" scope="col">Sasaran</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <th style="background-color: gray" colspan="6"></th>
                            <th class="text-center">Pendapatan</th>
                            <th class="text-center">Perbelanjaan</th>
                        </tr>
                    </thead>
                    @php
                        $index = 1;
                    @endphp
                    <tbody>
                    @foreach ($jwpnParameter as $jwpn)
                        <tr>
                            <td class="text-center arial-N">{{$index}}</td>
                            <td class="text-center arial-N">{{$jwpn->AktivitiParameter->nama}}</td>
                            <td class="text-center arial-N">{{$jwpn->AktivitiParameter->unit}}</td>
                            <td class="text-center arial-N">{{$jwpn->AktivitiParameter->cycle}}</td>
                            <td class="text-center arial-N">{{date("d-m-Y",strtotime($jwpn->created_at))}}</td>
                            <td class="text-center arial-N">{{$jwpn->AktivitiParameter->sasaran_pendapatan ?? ""}}</td>
                            @if ($jwpn->AktivitiParameter->category == "Pendapatan")
                                <td class="text-center arial-N">{{$jwpn->value}}</td>
                                <td class="text-center arial-N"></td>
                            @else
                                <td class="text-center arial-N"></td>
                                <td class="text-center arial-N">{{$jwpn->value}}</td>
                            @endif
                        </tr>
                        @php
                        $index++;
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
  <style>
    .arial-N{
        font-family: 'Arial-N', sans-serif;
        font-size: 12px;
        text-transform: uppercase;
    }
    </style>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  