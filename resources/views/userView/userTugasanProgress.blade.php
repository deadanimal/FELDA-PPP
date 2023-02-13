@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Perkara Tugasan {{$tugasan_item->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table style="width: -webkit-fill-available;">
                        <tr>
                            <td>
                                <a href="/user/tugasan/{{$tugas_id}}/item_list" class="btn frame9403-frame7445" style="margin-left:0px; width:50%;">
                                    <span class="frame9403-text21">Kembali</span>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn frame9403-frame7445" data-toggle="modal" data-target="#exampleModalCenter">
                                    <div class="frame9403-frame7293">
                                        <span class="frame9403-text21">Progress</span>
                                        <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                    </div>
                                </button>
                            </td>
                        </tr>
                    </table>
                    
                    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Progress</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/user/tugasan/tugas_item/progress_add" method="post">
                                @csrf
                            <div class="modal-body">
                                <table class="table table-borderless">
                                    <tr style="border: none;">
                                      <td>
                                        <label for="progress" class="frame9402-text04">
                                          <strong>Progress</strong>
                                        </label>
                                      </td>
                                      <td>
                                        <input class="form-control" id="progress" name="progress" required>
                                      </td>
                                    </tr>
                                    <tr style="border: none;">
                                      <td>
                                        <label for="actual_date" class="frame9402-text04">
                                          <strong>Tarikh Dilakukan</strong>
                                        </label>
                                      </td>
                                      <td>
                                        <input type="date" class="form-control" id="actual_date" name="actual_date" required>
                                      </td>
                                    </tr>
                                </table>
                                <input type="hidden" name="tugasItem_id" value="{{$tugasan_item->id}}">
                                <input type="hidden" name="tugas_id" value="{{$tugas_id}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                            </form>
                          </div>
                      </div>
                    </div>       
                <div class="card-body">
                    @if (!$item_progress->isEmpty())
                    <table class="table table-bordered table-striped w-100">
                        <thead class="text-white bg-primary w-100">
                          <tr class="text-center">
                              <th scope="col">Progress</th>
                              <th scope="col">Tarikh Dilakukan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($item_progress as $item_progress)
                            <tr>
                                <td class="text-center arial-N" style="text-transform: uppercase;">{{$item_progress->progress}}</td>
                                <td class="text-center arial-N">{{$item_progress->actual_date}}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    @else
                        <h1 style="text-align: center;"> Tiada Tugasan </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .frame9403-frame7445 {
    width: 125px;
    height: 44px;
    display: flex;
    max-width: 157px;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    align-items: center;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    padding-bottom: 0px;
    justify-content: center;
    background-color: #A2335D;
    margin-top: 1%;
    margin-left:auto;
    margin-right: 0px;
    cursor: pointer;
    text-decoration: none;
  }
  .frame9403-frame7445:hover{
    text-decoration: none;

  }
  .frame9403-frame7293 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
    height: auto;
    font-size: 16px;
    align-self: auto;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-stretch: normal;
    margin-right: 2px;
    margin-bottom: 0;
    text-decoration: none;
    text-align: center;
  }
  .frame9403-group7527 {
    width: 24px;
    height: 24px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    margin-bottom: 0;
  }
  .frame9403-frame7445 {
      width: auto;
    height: 50px;
    display: flex;
    max-width: 250px;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    justify-content: center;
    background-color: #A2335D;
    cursor: pointer;
    align-self: flex-end;
    margin-left: auto;
    margin-right: 10px;
  }
  .frame9403-frame7293 {
  display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
    height: auto;
    font-size: 16px;
    align-self: auto;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-stretch: normal;
    margin-right: 10px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9403-group7527 {
    width: 24px;
    height: 24px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    margin-bottom: 0;
  }
  .frame9402-kotaknamaBorang {
    width: 299px;
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
    text-transform: uppercase;
  }
</style>
@endsection