@extends('page master.page_master')

@section('title', 'Danh Sách Chuyến')

@section('content')
    <div id="page-wrapper" >
		         <div class="header"> 
                        <h1 class="page-header">
                            Danh Sách
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/home">Home\</a></li>
					  <li><a href="/table">Tables\</a></li>
					  <li class="active">Xe</li>
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
                  <h5 class="modal-title" id="exampleModalLabel">Thêm Xe</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @include('addlist.add_xe')
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
                            
                                <th>Biển số</th>
                                <th>Loại Xe</th>
                                <th>Hạng Kiểm Định</th>
                                 <th>Action</th>           
                            
                            </tr>
                        </thead>

                        <tbody>
                            @if(isset($xelist) && count($xelist)>0)
                            @foreach($xelist as $k =>$v)
                                <tr>
                                    <td>{{$v->BienSo}}</td>
                                    <td>{{$v->LX_Ten}}</td>
                                    <td>{{$v->HangKiemDinh}}</td>
                                    <td>
                                        <a href="/home/xe/delete{{$v->BienSo}}"><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp;</a>
                                        <a href="javascript:void(0)"  data-toggle="modal" id="Edit" data-id="{{$v->BienSo}}" data-target="#EditModal" >&nbsp;&nbsp;
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
    {{-- End table --}}
            {{-- Model Edit  --}}
            <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Xe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  {{-- modalBody --}}
                  <div  class="modal-body" id="editform" >
      
                        <form  id="formEditxe" action="/editXe" method="POST">
      
                          @csrf
                          <label for="BienSo">Biển Số:</label>
                          <input type="text" class="form-control" id="BienSo" name="BienSo" readonly="true">

                          <label for="LX_Ma">Loại Xe :</label>
                          <select id="LX_Ma" class="form-control" name="LX_Ma">
                           {{-- @if(isset($lxlist) && count($lxlist)>0) --}}
                              @foreach($lxlist as $k =>$v)
                                  <option value="{{$v->LX_Ma}}" name="diemdung">{{$v->LX_Ten}}</option>
                              @endforeach
                           {{-- @endif  --}}
                          </select> 
                      
                          <label for="HangKiemDinh">Hạng Kiểm Định:</label>
                          <input type="date"  class="form-control"id="HangKiemDinh" name="HangKiemDinh">
                      
                         
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
@stop

@section('js')

<script>
    $(document).ready(function() {
      $('body').on('click', '#Edit', function() {

           var BienSo = $(this).data('id');
           $.get('/editXe/'+BienSo, function(xe){
           
           
            var BienSo= xe.BienSo;
            var LX_Ma =xe.LX_Ma;
            var HangKiemDinh= xe.HangKiemDinh;
           

              $("#BienSo").val(BienSo);
              $("#LX_Ma").val(LX_Ma);
              $("#HangKiemDinh").val(HangKiemDinh);
              $("#EditModal").modal('show');
              
          });
      });
  });

</script>
@endsection