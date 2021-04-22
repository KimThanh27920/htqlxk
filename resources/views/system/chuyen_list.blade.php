@extends('page master.page_master')

@section('title', 'Danh Sách Chuyến')

@section('heading', 'QLXK')



@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Tables Page
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/home">Home\</a></li>
					  <li><a href="/table">Tables\</a></li>
					  <li class="active">Chuyến</li>
					</ol> 
									
		</div>
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
              <h5 class="modal-title" id="exampleModalLabel">Thêm Chuyến</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @include('addlist.add_chuyen')
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
                            <th>Điểm Xuất Phát</th>
                            <th>Điểm Đến</th>
                            <th>Giờ Chạy</th>
                             <th>Action</th>           
                        </tr>
                    </thead>


                    <tbody>
                        @if(isset($chuyenlist) && count($chuyenlist)>0)
                        @foreach($chuyenlist as $k =>$v)
                            <tr>
                                <td>{{$v->TD_XuatPhat}}</td>
                                <td>{{$v->TD_DichDen}}</td>
                                <td>{{$v->Gio}}</td>
                                <td>
                                    <a href="/home/chuyen/delete{{$v->TD_Ma}}+{{$v->Gio}}"><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp; </a>
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

@stop