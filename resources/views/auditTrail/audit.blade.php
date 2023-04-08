@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">
      Audit Trail
    </h1>
  </div>
  <div class="card" style="width: auto;">
    <div class="card-body" style="width: auto;">
      <div class="row d-flex justify-content-center">
        <form action="/user_auditFilter" method="POST">
          @csrf
          <table class="table table-borderless">
            <thead></thead>
            <tbody>
              <tr style="border: none;">
                <td style="border: none;"><p class="text04">ID Pengguna</p></td>
                <td style="border: none;"><input type="text" name="idPengguna" class="form-control" placeholder="ID Pengguna" value=""/></td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
              </tr>
              <tr style="border: none;">
                <td style="border: none;"><p class="text04">Aktiviti</p></td>
                <td style="border: none;"><input type="text" name="action" class="form-control" placeholder="Aktiviti" value=""/></td>
                <td style="border: none;"></td>
                <td style="border: none;"><button type="submit" name="filter" id="filter" class="btn btn-primary" style="margin-right: 0%; margin-left:auto;">Cari</button></td>
              </tr>
              <tr style="border: none;">
                <td style="border: none;"><p class="text04">Tarikh</p></td>
                <td style="border: none;"><input type="date" name="from_date" class="form-control" id="min" /></td>
                <td style="border: none;"><input type="date" name="to_date" class="form-control" id="max" /></td>
                <td style="border: none;"></td>
              </tr>
            </tbody>
            
          </table>
        </form>
      </div>
    </div>
  </div>
  <div class="card" style="width: auto;">
    <div class="card-body" style="width: auto;">
      <div class="row d-flex justify-content-center">
        
        <table class="table table-bordered table-striped w-100 Arial">
          <thead class="text-white bg-primary w-100">
            <tr>
              <th style="width: 1%">Bil.</th>
              <th scope="col" style="width: 15%"><span>ID Pengguna</span></th>
              <th scope="col" style="width: 24%"><span>Nama Pengguna</span></th>
              <th scope="col" style="width: 50%"><span>Keterangan</span></th>
              <th scope="col" style="width: 10%"><span>Tarikh Tindakan</span></th>
            </tr>
          </thead>
          <tbody class="Arial">
            @foreach ($audits as $audit)
                <tr  style="text-transform: uppercase">
                  <td>{{$loop->iteration}}</td>
                  <td>{{$audit->users->idPengguna}}</td>
                  <td class="text-upp">{{$audit->users->nama}}</td>
                  <td>{{$audit->action}}</td>
                  <td>{{$audit->created_at}}</td>
                </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<style>
  .Arial{
    font-family: 'Arial', sans-serif;
}

.text-upp{
    text-transform: uppercase;
  }
  .text04 {
  color: black;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: end;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
</style>
<script>
  $(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });
  
});
</script>
@endsection