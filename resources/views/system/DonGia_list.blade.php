@extends('page master.page_master')

@section('title', 'Danh Sách Đơn Giá ')

@section('heading', 'QLXK')



@section('content')
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Danh Sách
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="/home">Home\</a></li>
					  <li><a href="/table">Tables\</a></li>
					  <li class="active">Đơn Giá</li>
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
                      <h5 class="modal-title" id="exampleModalLabel">Thêm Đơn Giá</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        @include('addlist.add_dg')
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
                                    <th>Đơn Giá</th>
                                    <th>Ngày Lập</th>
                                    <th>Action</th>  
                                
                    
                            </tr>
                            </thead>
  
  
                            <tbody>
                                @if(isset($dongialist) && count($dongialist)>0)
                                @foreach($dongialist as $k =>$v)
                                    <tr>
                                        <td>{{$v->TD_XuatPhat}}</td>
                                        <td>{{$v->TD_DichDen}}</td>
                                        <td>{{$v->Giave}}</td>
                                        <td>{{$v->Ngay}}</td>
                                        <td>
                                            <a href="/home/dongia/delete{{$v->TD_Ma}}+{{$v->Ngay}}"><i class="ion ion-md-trash" style="font-size: 30px; color:red;"></i>&nbsp;&nbsp;</i></a>
                                            <a href="javascript:void(0)"  data-toggle="modal" id="Edit" data-id="{{$v->TD_Ma}}{{$v->Ngay}}" data-target="#EditModal" >&nbsp;&nbsp;
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

        {{-- End Table --}}
        {{-- Model Edit  --}}
      <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Đơn Giá</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- modalBody --}}
            <div  class="modal-body" id="editform" >

                  <form  id="formEditDG" action="/editDG" method="POST">

                    @csrf
                                    
                    <label for="TD_Ma">Tuyến Đường:</label>
                    <select id="TD_Ma" class="form-control" name="TD_Ma" readonly="true">
                     {{-- @if(isset($tdlist) && count($tdlist)>0) --}}
                        @foreach($tdlist as $k =>$v)
                            <option value="{{$v->TD_Ma}}">{{$v->TD_XuatPhat}}-{{$v->TD_DichDen}}</option>
                        @endforeach
                     {{-- @endif  --}}
                    </select> 

                    <label for="Ngay">Ngày Áp Dụng:</label>
                    <input type="date"  class="form-control"id="Ngay" name="Ngay" readonly="true">
                
                
                    <label for="Giave">Đơn Giá :</label>
                    <input type="text" class="form-control" id="Giave" name="Giave">
                
                   
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

           var x = $(this).data('id');
           var a=x.length;
           var TD_Ma=x.substring(0,3);
           var Ngay=x.substring(3,a);
           $.get('/editDG/'+TD_Ma+'+'+Ngay, function(dongia){
           
           
            var TD_Ma= dongia.TD_Ma;
            var Ngay =dongia.Ngay;
            var Giave= dongia.Giave;
           

              $("#TD_Ma").val(TD_Ma);
              $("#Ngay").val(Ngay);
              $("#Giave").val(Giave);
              $("#EditModal").modal('show');
              
          });
      });
  });

</script>
@endsection