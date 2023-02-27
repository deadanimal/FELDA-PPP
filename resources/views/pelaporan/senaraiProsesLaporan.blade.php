@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">
        PELAPORAN MODUL <span style="text-transform: uppercase;">{{$modul->nama}}</span>
    </h1>
  </div>
  <div class="card" style="width: auto;">
    <div class="card-header">
      <h3>SENARAI PROSES</h3>
    </div>
    <div class="card-body" style="width: auto;">
      <div class="row d-flex justify-content-center">
        <table class="table table-bordered table-striped w-100 proses-datatable">
          <thead class="text-white bg-primary w-100">
            <tr>
                <th>Bil.</th>
                <th scope="col">Nama Proses</th>
                <th scope="col" >Tindakan</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<style>
  .arial-N{
      font-family: 'Arial-N', sans-serif;
      font-size: 18px;
      text-transform: uppercase;
  }
  .frame9402-frame9281 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    flex-direction: column;
    background-color: #F1F1F1;
  }
  .frame9402-text {
    color: #781E2A;
    width: 383px;
    height: auto;
    font-size: 80px;
    align-self: auto;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 38px;
    text-decoration: none;
    padding-bottom:15px;
    padding-top:50px;
  }
  .frame9402-text02 {
    color: #781E2A;
    width: 368px;
    height: auto;
    font-size: 25px;
    align-self: auto;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 38px;
    text-decoration: none;
  }
  .frame9402-kotaknama {
    width: 399px;
    height: 50px;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    margin-right: 0;
    border-radius: 3.461621046066284px;
    margin-bottom: 0;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-size: 18px;
    padding-left:10px;
  }
  .frame9402-rectangle828245 {
    width: 32px;
    height: 30px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-left: 10px;
    text-decoration: none;
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
<script>
  function changeTheColorOfButton() {
    var button = document.getElementById("buttonCari");
    if (document.getElementById("namaModul").value !== "") {
      button.style.opacity = "1";
      button.disabled = false;
    } else {
      button.style.opacity = "0.5";
      button.disabled = true;
    }
  }

</script>
<script type="text/javascript">
  $('.proses-datatable').DataTable({
              processing: true,
              serverSide: true,
              responsive: true,
              language: {
                  "search": "Carian:",
                  "lengthMenu": "Tunjuk _MENU_ Proses",
                  "info": "Tunjuk _START_ ke _END_ dari _TOTAL_ Proses",
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
              ajax: "/pelaporan/".$idModul,
              columns: [{
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex',
                      className: "text-center arial-N"
                  },
                  {
                      data: 'nama',
                      name: 'nama',
                      className: "text-center arial-N"
                  },
                  {
                      data: 'tindakan',
                      name: 'tindakan',
                      className: "text-center col-sm-auto w-25"
                  },                    

              ]
          });
  </script>
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{{-- <script type="text/javascript" src='https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.js'></script>
<link media="screen" rel="stylesheet" href='https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css' />
<link media="screen" rel="stylesheet" href='https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.css' />
<script>
  function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    swal({
          title: 'Anda Pasti Mahu Padam Modul?',
          showCancelButton: true,
          showConfirmButton: true,
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          type: 'warning',
          buttonsStyling: true
      }).then(function (yes) {
          // Called if you click Yes.
          if (yes) {
            window.location.href = urlToRedirect;
          }
      },
      function (no) {
          // Called if you click No.
          if (no == 'cancel') {
              swal('Tidak Di Padam', '', 'error');
          }
      });
    }
</script> --}}
@endsection