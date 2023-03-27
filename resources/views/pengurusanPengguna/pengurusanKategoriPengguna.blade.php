@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Senarai Kategori Pengguna
    </h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button class="btn float-end frame9402-frame7445"  data-toggle="modal" data-target="#ModalCenterAddKategori">
            <div class="frame9402-frame72931">
              <span class="frame9402-text08"><span>Tambah</span></span>
              <img
                  src="/SVG/daftar.svg"
                  class="frame9402-group7527"
              />
            </div>
          </a>
        </div>
        
        {{-- Modal Tambah Kategori --}}
        <div class="modal fade" id="ModalCenterAddKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="frame9402-text01 modal-title" id="exampleModalLabel">CIPTA KATEGORI PENGGUNA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/user-categories" method="POST" >
                @csrf
                  <label for="namaKategori" class="frame9402-text04">
                    <strong>Nama Kategori Pengguna</strong>
                  </label>
                  <input type="text" class="frame9402-kotaknamaProses" id="namaKategori" placeholder="Sila Masuk Kategori Pengguna" name="namaKategoriPengguna" required>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary">Kemaskini</button>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="row d-flex justify-content-center">
            <table class="table table-bordered table-striped w-100 Arial category-datatable">
              <thead class="text-white bg-primary w-100">
                <tr>
                  <th>Bil.</th>
                  <th scope="col">Nama Kategori Pengguna</th>
                  <th scope="col" style="width: 100%">Tindakan</th>
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
.arial-N{
      font-family: 'Arial-N', sans-serif;
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
.frame9402-text01 {
  color: #781E2A;
  height: auto;
  font-size: 25px;
  align-self: auto;
  text-align: center;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 800;
  line-height: normal;
  font-stretch: normal;
  margin-bottom: 0;
}
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
  height: auto;
  padding-right: 5px;
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
  .frame9402-kotaknamaProses {
  width: 303px;
  height: 50px;
  position: relative;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  margin-right: 0;
  border-radius: 3.461621046066284px;
  margin-top: 10px;
  margin-bottom: 30px;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-size: 18px;
  padding-left:10px;
}

.frame9403-group71881 {
  display: flex;
  padding: 0;
  position: relative;
  align-self: auto;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 1;
  border-color: transparent;
  border-style: none;
  border-width: 0;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: row;
  justify-content: flex-start;
  background-color: transparent;
}

.frame9403-kotaknama {
  width: 454px;
  height: 50px;
  position: relative;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  border-radius: 3.461621046066284px;
  color: #161616;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-size: 17.3081px;
  padding-left:10px;
  text-transform: uppercase;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
}
.frame9402-text04 {
  color: black;
  height: auto;
  font-size: 17.30810546875px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold', sans-serif;
  line-height: normal;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;
}
  .formContainer .btn {
    padding: 12px 20px;
    border: none;
    background-color: #8ebf42;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    margin-bottom: 15px;
    opacity: 0.8;
  }
  .formContainer .cancel {
    background-color: #cc0000;
  }
  .formContainer .btn:hover,
  .openButton:hover {
    opacity: 1;
  }
  .Arial{
    font-family: 'Arial', sans-serif;
}

  .text-upp{
    text-transform: uppercase;
  }
</style>
<script type="text/javascript">
  $('.category-datatable').DataTable({
              processing: true,
              serverSide: true,
              responsive: true,
              language: {
                  "search": "Carian:",
                  "lengthMenu": "Tunjuk _MENU_ Kategori Pengguna",
                  "info": "Tunjuk _START_ ke _END_ dari _TOTAL_ Kategori Pengguna",
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
              ajax: "/user-categories",
              columns: [{
                      data: 'DT_RowIndex',
                      name: 'DT_RowIndex',
                      className: "text-center Arial"
                  },
                  {
                      data: 'nama',
                      name: 'nama',
                      className: 'Arial text-upp'
                  },
                  {
                      data: 'tindakan',
                      name: 'tindakan',
                      className: "text-center col-sm-auto w-25 Arial"
                  },                    

              ]
          });
</script>
@endsection