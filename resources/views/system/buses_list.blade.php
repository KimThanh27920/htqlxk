@extends('page master.page_master')

@section('title', 'Danh Sách Tuyến Đường')

@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Tables Page
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/home">Home\</a></li>
					  <li><a href="/table">Tables\</a></li>
					  <li class="active">Tuyến Đường</li>
                      
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
              <h5 class="modal-title" id="exampleModalLabel">Thêm Tuyến Đường </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                @include('addlist.add_td')
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
                            <th>Mã Tuyến Đường</th>
                            <th>Điểm Xuất Phát</th>
                            <th>Điểm Đến</th>
                            <th>Độ Dài</th>
                            <th>Thời Gian</th>
                            <th>Loại Xe</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                       
                    <tbody>
                        @if(isset($buseslist) && count($buseslist)>0)
                        @foreach($buseslist as $k =>$v)
                            <tr>
                                <td>{{$v->TD_Ma}}</td>
                                <td>{{$v->TD_XuatPhat}}</td>
                                <td>{{$v->TD_DichDen}}</td>
                                <td>{{$v->TD_DoDai}} Km</td>
                                <td>{{$v->TD_ThoiGian}}</td>
                                <td>{{$v->LX_Ten}}</td>
                                <td>
                                    <a href="/home/buses/delete{{$v->TD_Ma}}"><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp;</a>

                                    <a href="javascript:void(0)"  data-toggle="modal" id="Edit" data-id="{{$v->TD_Ma}}" data-target="#EditModal" >&nbsp;&nbsp;
                                      <i class="icon-note" style="font-size: 25px;color:black;"></i>
                                    </a>
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
      <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Tuyến đường</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- modalBody --}}
            <div  class="modal-body" id="editform" >

                  <form  id="formEditTD" action="/editTD" method="POST">
                    @csrf
                    <label for="TD_Ma">Mã Tuyến Đường:</label>
                    <input type="text" class="form-control" id="TD_Ma" name="TD_Ma" readonly="true">
                
                    <label for="TD_XuatPhat">Xuất Phát:</label>
                    <input type="text"  class="form-control" id="TD_XuatPhat" name="TD_XuatPhat">

                    <label for="TD_DichDen">Đích Đến:</label>
                    <input type="text"  class="form-control" id="TD_DichDen" name="TD_DichDen">
                
                    <label for="TD_DoDai">Độ Dài:</label>
                    <input type="text" class="form-control" id="TD_DoDai" name="TD_DoDai">

                    <label for="TD_ThoiGian">Thời Gian:</label>
                    <input type="text" class="form-control" id="TD_ThoiGian" name="TD_ThoiGian">
                    
                    <label for="LX_Ma">Loại Xe:</label>
                    <select id="LX_Ma" class="form-control" name="LX_Ma">
                     {{-- @if(isset($lxlist) && count($lxlist)>0) --}}
                        @foreach($lxlist as $k =>$v)
                            <option value="{{$v->LX_Ma}}" name="loai">{{$v->LX_Ten}}</option>
                        @endforeach
                     {{-- @endif  --}}
                    </select> 

                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>   
                    
                    
                </form>
              </div>
              {{-- End modal body --}}
          </div>
        </div>
      </div>

      {{-- End Edit --}}
{{-- End Table --}}
		
@stop

@section('js')

<script>
    $(document).ready(function() {
      $('body').on('click', '#Edit', function() {
        debugger;
           var TD_Ma = $(this).data('id');
           $.get('/editTD/'+TD_Ma, function(tuyenduong){
           
           
            var TD_Ma= tuyenduong.TD_Ma;
            var TD_XuatPhat =tuyenduong.TD_XuatPhat;
            var TD_DichDen= tuyenduong.TD_DichDen;
            var TD_DoDai =tuyenduong.TD_DoDai;
            var TD_ThoiGian= tuyenduong.TD_ThoiGian;
            var LX_Ma =tuyenduong.LX_Ma;


              $("#TD_Ma").val(TD_Ma);
              $("#TD_XuatPhat").val(TD_XuatPhat);
              $("#TD_DichDen").val(TD_DichDen);
              $("#TD_DoDai").val(TD_DoDai);
              $("#TD_ThoiGian").val(TD_ThoiGian);
              $("#LX_Ma").val(LX_Ma);
              $("#EditModal").modal('show');
              
          });
      });
  });

</script>
@endsection