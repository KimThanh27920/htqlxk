
<div>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Nhân Viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @if(isset($lichchay) )
        <div  class="modal-body" id="editform" >
            <form  id="formEditLC" action="/editLC" method="POST">
                @csrf
                <label for="ID">ID:</label>
                <input type="text"  class="form-control" id="ID" name="ID" readonly="true" value="{{$lichchay->ID}}">

                <label for="NV_Ma">Tài Xế:</label>
                <select id="NV_Ma" class ="form-control" name="NV_Ma">
                    @foreach($txlist as $k =>$v)
                        <option value="{{$v->NV_Ma}}" @if($lichchay->NV_Ma == $v->NV_Ma) selected @endif >{{$v->NV_HoTen}}</option>
                    @endforeach
              
                </select> 

                <label for="TD_Ma">Tuyến Đường:</label>
                <select id="TD_Ma" class="form-control" name="TD_Ma">
                
                    @foreach($chuyenlist as $k =>$v)
                        <option value="{{$v->TD_Ma}}" @if($lichchay->TD_Ma ==$v->TD_Ma) selected @endif>{{$v->TD_XuatPhat}}-{{$v->TD_DichDen}}</option>
                    @endforeach
                
                </select> 

                <label for="Ngay">Ngày Chạy:</label>
                <input type="date"  class="form-control"id="Ngay" name="Ngay" value="{{$lichchay->Ngay}}">

                <label for="Gio">Giờ :</label>
                <select id="Gio" class="form-control" name="Gio">
                    @foreach($giolist as $k =>$v)
                        <option value="{{$v->Gio}}" @if($lichchay->Gio==$v->Gio) selected @endif>{{$v->Gio}}</option>
                    @endforeach
                
                </select>             
                <br><br>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>                
            </form>
        </div>  
        @endif
    </div>