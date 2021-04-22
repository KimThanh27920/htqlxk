@extends('page master.page_master')

@section('title', 'Lịch Chạy')


@section('content')
<div id="page-wrapper" >
    <div class="header"> 
                      <h1 class="page-header">
                          Tables Page
                      </h1>
          <ol class="breadcrumb">
          <li><a href="/home">Home</a></li>
          <li><a href="/table">Tables</a></li>
          <li class="active">Lịch Chạy</li>
        </ol> 
                
  </div>
  

{{-- Table --}}
<div id="page-inner"> 
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="ion ion-md-create" style="font-size: 20px;"></i> NEW</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm Lịch Chạy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              @include('addlist.add_lich_chay')
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-12">
          <div class="card-box">
              <table id="datatable" class="table table-bordered table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Nhân Viên</th>
                                          <th>Tuyến Đường</th>
                                          <th>Ngày Chạy</th>
                                          <th>Giờ Chạy</th>
                                          <th>Ghi Chú</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      @if(isset($list) && count($list)>0)
                                      @foreach($list as $k =>$v)
                                          <tr>
                                              <td>{{$v->ID}}</td>
                                              <td>{{$v->NV_HoTen}}</td>
                                              <td>{{$v->TD_XuatPhat}}--{{$v->TD_DichDen}}</td>
                                              <td>{{$v->Ngay}}</td>
                                              <td>{{$v->Gio}}</td>
                                              <td></td>
                                              <td>
                                                  <a href="/home/lichchay/delete{{$v->ID}}"><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp;</a>
                                                  <a href="/home/lichchay/edit{{$v->ID}}" data-toggle="modal" data-target="#EditModal"><i class="icon-note" style="font-size: 25px;color:black;"></i></a>
                                                </td>

                                          </tr>
                                          @endforeach
                                          @endif
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                        </div> 
                  </div>
                  {{-- End Table --}}
                    {{-- Model Edit  --}}
              <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    
                    {{-- modalBody --}}
                    <div  class="modal-body" id="editform" >
            
                    </div>
                    {{-- End modal body --}}
                  </div>
                </div>
              </div>
@stop


