@extends('page master.page_master')

@section('title', 'Danh Sách Nhân Viên')

@section('content')
      <div id="page-wrapper" >
                <div class="header"> 
                                  <h1 class="page-header">
                                      Danh Sách
                                  </h1>
                      <ol class="breadcrumb">
                      <li><a href="/home">Home\</a></li>
                      <li><a href="/table">Tables\</a></li>
                      <li class="active">Nhân Viên</li>
                    </ol> 
                  </div>
      </div>
  
		{{-- Table --}}
      <div id="page-inner"> 
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="ion ion-md-create" style="font-size: 20px;"></i> NEW</button>
            <!-- Modal ADD  -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      @include('addlist.add_NV')
                  </div>
                </div>
              </div>
            </div>

            {{-- End ADD --}}
            <br><br>
            <div class="row">
              <div class="col-12">
                  <div class="card-box">
                      <table id="datatable" class="table table-bordered table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th>Mã Nhân Viên</th>
                              <th>Họ Tên</th>
                              <th>Ngày Sinh</th>
                              <th>Giới Tính</th>
                              <th>Vị Trí Công Tác</th>
                              <th>Địa Chỉ</th>
                              <th>Số Điện Thoại</th>
                              <th>Action</th>
                          </tr>
                          </thead>


                          <tbody>
                            @if(isset($list) && count($list)>0)
                            @foreach($list as $k =>$v)
                                <tr id="NV{{$v->NV_Ma}}">
                                    <td>{{$v->NV_Ma}}</td>
                                    <td>{{$v->NV_HoTen}}</td>
                                    <td>{{$v->NV_NgaySinh}}</td>
                                    <td>{{$v->NV_GioiTinh}}</td>
                                    <td>{{$v->VTCT_Ten}}</td>
                                    <td>{{$v->NV_DiaChi}}</td>
                                    <td>{{$v->NV_Sdt}}</td>
                                    <td>
                                        <a href="/home/staff/delete{{$v->NV_Ma}}" ><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp;</a>
                                        
                                        <a href="/home/staff/edit{{$v->NV_Ma}}" data-toggle="modal" data-target="#EditModal"><i class="icon-note" style="font-size: 25px;color:black;"></i></a>
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

      {{-- End Edit --}}
      {{-- End Table --}}

      {{-- Table 2 --}}
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtxModal"><i class="ion ion-md-create" style="font-size: 20px;"></i> NEW</button>
      <!-- Modal ADD  -->
      <div class="modal fade" id="addtxModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Xế</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/add_TX"  method ="POST" id="formEdittx">
                @csrf
                <label for="nhanvien">Nhân Viên: </label>
                <select id="nhanvien" class="form-control" name="nhanvien">
                 {{-- @if(isset($vtlist) && count($vtlist)>0) --}}
                    @foreach($nhanvien as $k =>$nv)
                        <option value="{{$nv->NV_Ma}}">{{$nv->NV_HoTen}}</option>
                    @endforeach
                {{-- @endif  --}}
                </select> 
            
                <label for="banglai">Số Hiệu Bằng Lái:</label>
                <input type="text"  class="form-control"id="banglai" name="banglai">
            

                <br><br>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>   
                
                
            </form>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      {{-- End ADD --}}
      <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title">Danh Sách Tài Xế</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-dark">
                        <tr>
                            <th>Mã Nhân Viên</th>
                            <th>Số Hiệu Bằng Lái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @if(isset($txlist) && count($txlist)>0)
                            @foreach($txlist as $k =>$v)
                                <tr>
                                    <td>{{$v->NV_Ma}}</td>
                                    <td>{{$v->SoHieuBangLai}}</td>
                                    <td>
                                        <a href="/home/taixe/delete{{$v->NV_Ma}}"><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp;</a>
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
      {{-- End table2 --}}
     
@stop

