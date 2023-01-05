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
        </table>
        <table class="table table-bordered table-striped  w-100 audit-datatable" id="example">
          <thead class="text-white bg-primary w-100">
            <tr>
              <th>Bil.</th>
              <th scope="col"><span>ID Pengguna</span></th>
              <th scope="col"><span>Nama Pengguna</span></th>
              <th scope="col"><span>Keterangan</span></th>
              <th scope="col"><span>Tarikh Tindakan</span></th>
            </tr>
          </thead>
          <tbody>
            @php
                $count=0;
            @endphp
            @foreach ($audits as $audit)
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$audit->user->idPengguna}}</td>
                  <td>{{$audit->user->nama}}</td>
                  <td>{{$audit->action}}</td>
                  <td>{{$audit->created_at}}</td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{{-- <script type="text/javascript">
  $('.audit-datatable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      language: {
          "search": "Carian:",
          "lengthMenu": "Tunjuk _MENU_ Rekod",
          "info": "Tunjuk _START_ ke _END_ dari _TOTAL_ Rekod",
          "paginate": {
              "first": "Pertama",
              "last": "Akhir",
              "next": "Seterusnya",
              "previous": "Sebelum"
          },
          "zeroRecords": "Carian tidak dijumpai",
          "infoEmpty": "Tiada maklumat",
          "infoFiltered": "(carian dari _MAX_ jumlah rekod)"



      },
      ajax: "/audit",
      columns: [{
              data: 'DT_RowIndex',
              name: 'DT_RowIndex',
              className: "text-center"
          },
          {
              data: 'userNama',
              name: 'userNama',
              className: "text-center"
          },
          {
              data: 'userid',
              name: 'userid',
              className: "text-center"

          },
          {
              data: 'action', 
              name: 'action',
              className: "text-center"
          },
          {
              data: 'created_at',
              name: 'created_at',
              className: "text-center"
          },                    

      ]
  });
  </script> --}}
@endsection