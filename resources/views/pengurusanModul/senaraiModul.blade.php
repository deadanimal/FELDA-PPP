@extends('layouts.guest')

@section('innercontent')
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">
        SENARAI MODUL
    </h1>
  </div>
  <div class="card" style="width: auto;">
    <div class="card-header">
      <div class="frame9402-frame9281">
        <span class="frame9402-text"><span>{{$bilangan}}</span></span>
        <span class="frame9402-text02"><span>JUMLAH MODUL</span></span>
      </div>
    </div>
    <div class="card-body" style="width: auto;">
      <div class="row d-flex justify-content-center">
        <table class="table table-bordered modul-datatable">
          <thead class="text-white bg-primary">
            <tr>
                <th>Bil.</th>
                <th scope="col">Nama Modul</th>
                <th scope="col">Status Modul</th>
                <th scope="col">Dicipta oleh</th>
                <th scope="col">Dikemaskini oleh</th>
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
  $('.modul-datatable').DataTable({
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
              ajax: "/moduls",
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
                      data: 'status',
                      name: 'status'
                  },
                  {
                      data: 'diciptaOleh', 
                      name: 'diciptaOleh',
                      className: "text-center"
                  },
                  {
                      data: 'dikemaskiniOleh',
                      name: 'dikemaskiniOleh',
                      className: "text-center"
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
<script>
      //the confirm class that is being used in the delete button
      $('#deleting').click(function(event) {

          //This will choose the closest form to the button
          var form =  $(this).closest("form");

          //don't let the form submit yet
          event.preventDefault();

          //configure sweetalert alert as you wish
          Swal.fire({
              title: 'Padam Proses',
              text: "Anda Pasti Mahu Padam Proses?",
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