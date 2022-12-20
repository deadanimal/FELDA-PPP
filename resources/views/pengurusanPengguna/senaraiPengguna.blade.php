@extends('layouts.guest')

@section('innercontent')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Senarai Pengguna
    </h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="/users/add" class="btn float-end frame9402-frame7445">
            <div class="frame9402-frame72931">
              <span class="frame9402-text08"><span>Daftar</span></span>
              <img
                  src="/SVG/daftar.svg"
                  class="frame9402-group7527"
              />
            </div>
          </a>
        </div>
        <div class="card-body">
          <div class="row d-flex justify-content-center">
            <table class="table table-bordered user-datatable">
              <thead class="text-white bg-primary">
                <tr>
                    <th>Bil.</th>
                    <th scope="col">No. Pengguna</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Wilayah</th>
                    <th scope="col">Rancangan</th>
                    <th scope="col">Tindakan</th>

                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>

.frame9402-frame7445 {
  display: flex;
  padding: 5px 11px;
  position: relative;
  align-self: flex-end;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  border-radius: 8.598855018615723px;
  flex-direction: column;
  background-color: #A2335D;
  text-decoration: none;
}
.frame9402-frame72931 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-text08 {
  color: white;
  width: 57px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  line-height: 34.39542007446289px;
  font-stretch: normal;
  margin-right: 2px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-group7527 {
  width: 24px;
  height: 24px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9402-rectangle828245 {
  width: 32px;
  height: 31px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  border: none;
  cursor:pointer;
  background: url("/SVG/pencil.svg")
}
.frame9402-rectangle828246 {
  width: 32px;
  height: 31px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  margin-left: 10px;
  border: none;
  cursor:pointer;
  background: url("/SVG/bin.svg")
}
</style>
<script type="text/javascript">
  $('.user-datatable').DataTable({
              processing: true,
              serverSide: true,
              responsive: true,
              language: {
                  "search": "Carian:",
                  "lengthMenu": "Tunjuk _MENU_ Pengguna",
                  "info": "Tunjuk _START_ ke _END_ dari _TOTAL_ Pengguna",
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
              ajax: "/users",
              columns: [{
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex',
                      className: "text-center"
                  },
                  {
                      data: 'idPengguna',
                      name: 'idPengguna',
                      className: "text-center"
                  },
                  {
                      data: 'nama',
                      name: 'nama'
                  },
                  {
                      data: 'wilayah', 
                      name: 'wilayah'
                  },
                  {
                      data: 'rancangan',
                      name: 'rancangan'
                  },
                  {
                      data: 'tindakan',
                      name: 'tindakan',
                      className: "d-flex justify-content-center"
                  },                    

              ]
          });
  </script>
{{-- <div class="frame9402-frame9402">
  <div class="frame9402-frame9281">
    <span class="frame9402-text"><span>{{$bilangan}}</span></span>
    <span class="frame9402-text02"><span>JUMLAH PENGGUNA</span></span>
    <form action="/pengurusanPengguna/cariPengguna" method="POST" class="frame9402-frame9278">
      @csrf
      <div class="frame9402-frame7301">
          <div class="frame9402-frame7188">
              <span class="frame9402-text04"><span>ID Pengguna /</span><br><span> Nama Pengguna</span></span>
              <input type="text" class="frame9402-kotaknama" name="idPengguna" id="idPengguna" onkeyup="changeTheColorOfButton()"/>
          </div>
          <div class="frame9402-frame7188 mt-3">
            <span class="frame9402-text04"><span>Wilayah</span></span>
            <input type="text" class="frame9402-kotaknama" name="wilayah" id="idPengguna" onkeyup="changeTheColorOfButton()"/>
        </div>
        <div class="frame9402-frame7188 mt-3">
          <span class="frame9402-text04"><span>Rancangan</span></span>
          <input type="text" class="frame9402-kotaknama" name="rancangan" id="idPengguna" onkeyup="changeTheColorOfButton()"/>
      </div>  
      </div>
      
      <button type="submit" class="frame9402-b-u-t-t-o-n-c-a-r-i-a-n" id="buttonCari" disabled onclick="changeTheColorOfButtonDaftar()">
        <div class="frame9402-frame7294">
          <div class="frame9402-frame7293">
            <span class="frame9402-text06"><span>Cari</span></span>
            <div class="frame9402-frame">
              <div class="frame9402-layer31">
                <img
                  src="/SVG/find.svg"
                  class="frame9402-shape"
                  />
              </div>
            </div>
          </div>
        </div>
      </button>
    </form>
  </div>
    <a href="/pengurusanPengguna/daftarPengguna" class="frame9402-frame7445">
      <div class="frame9402-frame72931">
        <span class="frame9402-text08"><span>Daftar</span></span>
        <img
            src="/SVG/daftar.svg"
            class="frame9402-group7527"
        />
      </div>
    </a>
    <table class="frame9402-table">
      <tr class="frame9402-frame93961">
          <th class="frame9402-text10"><span>Bil.</span></th>
          <th class="frame9402-text12"><span>No. Pengguna</span></th>
          <th class="frame9402-text14"><span>Nama Pengguna</span></th>
          <th><span>Wilayah</span></th>
          <th><span>Rancangan</span></th>
          <th class="frame9402-text16"><span>Tindakan</span></th>
      </tr>
      @php
        $i = 1;
      @endphp
      @foreach ($user as $pengguna)
        @if ($i == 1 || $i% 2 == 1)
          <tr class="frame9402-input">
        @else
          <tr class="frame9402-input" style="background-color: rgba(162, 50, 93, 0.08);"> 
        @endif
          <td class="frame9402-text18" id="bilangan">{{$i}}</td>
          <td class="frame9402-text19">{{$pengguna->idPengguna}}</td>
          <td class="frame9402-text20"><a href="/pengurusanPengguna/edit/{{$pengguna->id}}" style="text-decoration: none; color:#494949;">{{$pengguna->nama}}</a></td>
          <td class="frame9402-text19">{{$pengguna->wilayah_id->nama}}</td>
          <td class="frame9402-text19">{{$pengguna->rancangan_id->nama}}</td>
          <td class="frame9402-frame8727" id="tindakan">
            <a href="/pengurusanPengguna/edit/{{$pengguna->id}}" class="frame9402-rectangle828245 hovertext" data-hover="Edit">
          
            </a>
            <form method="post" action="/pengurusanPengguna/delete">
              @csrf
              @method('DELETE')
              <input type="hidden" name="penggunaId" value="{{$pengguna->id}}"/>
              <button class="frame9402-rectangle828246 hovertext" data-hover="Delete" type="submit">
            </form>
          </td>
        </tr>
        @php
          $i++;
        @endphp
      @endforeach
      
    </table>
  </div>
</div>   --}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
      //the confirm class that is being used in the delete button
      $('.frame9402-rectangle828246').click(function(event) {

          //This will choose the closest form to the button
          var form =  $(this).closest("form");

          //don't let the form submit yet
          event.preventDefault();

          //configure sweetalert alert as you wish
          Swal.fire({
              title: 'Padam Pengguna',
              text: "Anda Pasti Mahu Padam Pengguna?",
              cancelButtonText: "Tidak",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya'
          }).then((result) => {
              
              //in case of deletion confirm then make the form submit
              if (result.isConfirmed) {
                  form.submit();
              }
          })
      });
</script>
@endsection