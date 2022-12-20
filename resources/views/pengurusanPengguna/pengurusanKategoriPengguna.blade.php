@extends('layouts.guest')

@section('innercontent')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
          <button class="btn float-end frame9402-frame7445" onclick="openForm()">
            <div class="frame9402-frame72931">
              <span class="frame9402-text08"><span>Tambah</span></span>
              <img
                  src="/SVG/daftar.svg"
                  class="frame9402-group7527"
              />
            </div>
          </a>
        </div>
        
        {{-- popup form Tambah proses --}}
        <div class="loginPopup">
          <div class="formPopup" id="popupForm">
            <form action="/user-categories" method="POST" class="formContainer">
              @csrf
              <h2 class="frame9402-text01" style="margin-top: 0px;">CIPTA KATEGORI PENGGUNA</h2>
              <label for="namaProses" class="frame9402-text04">
                <strong>Nama Kategori Pengguna</strong>
              </label>
              <input type="text" class="frame9402-kotaknamaProses" id="namaProses" placeholder="Sila Masuk Kategori Pengguna" name="namaKategoriPengguna" required>
              <button type="submit" class="btn">Tambah</button>
              <button type="button" class="btn cancel" onclick="closeForm()">Batal</button>
            </form>
          </div>
        </div>

        <div class="card-body">
          <div class="row d-flex justify-content-center">
            <table class="table table-bordered category-datatable">
              <thead class="text-white bg-primary">
                <tr>
                  <th>Bil.</th>
                  <th scope="col">Nama Kategori Pengguna</th>
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
.loginPopup {
    position: relative;
    text-align: center;
    width: 100%;
  }
  .formPopup {
    display: none;
    position: fixed;
    left: 50%;
    top: 25%;
    transform: translate(-50%, 5%);
    border: 4px solid #781E2A;
    border-radius: 8px;
    z-index: 9;
  }
  .formContainer {
    max-width: 550px;
    padding: 15px;
    background-color: #fff;
    border-radius: 8px;
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
                      className: "text-center"
                  },
                  {
                      data: 'nama',
                      name: 'nama'
                  },
                  {
                      data: 'tindakan',
                      name: 'tindakan',
                      className: "d-flex justify-content-center"
                  },                    

              ]
          });
</script>
<script>
  function openForm() {
    document.getElementById("popupForm").style.display = "block";
  }
  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
  }
</script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
  //the confirm class that is being used in the delete button
  $("#delete").click(function(event) {

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