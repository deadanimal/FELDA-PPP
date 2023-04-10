@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Tugasan Bagi {{Auth::user()->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut sebelum tarikh yang ditetapkan.</h5>
                </div>
                <div class="card-body">
                    @if (!$tugasans->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                          <tr class="text-center">
                              <th scope="col">Nama Tugasan</th>
                              <th scope="col">Tarikh</th>
                              <th scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugasans as $tugasan)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">{{$tugasan->nama}}</td>
                                <td class="text-center arial">{{$tugasan->due_date}}</td>
                                <td class="text-center arial">
                                    <a class="btn btn-success" href="/user/tugasan/{{$tugasan->id}}/item_list" style="color: white; text-decoration:none;">
                                    Semak Tugasan
                                    </a>
                                </td>
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
  .arial{
    font-family: 'Arial', sans-serif;
}
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
    font-family: 'Arial', sans-serif;
    font-weight: 600;
    line-height: 34.39542007446289px;
    font-stretch: normal;
    margin-right: 2px;
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
</style>
@endsection