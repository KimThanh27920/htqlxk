
<div>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Nhân Viên</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @if(isset($ve) )
    <div  class="modal-body" id="editform" >
        <form  id="formEditVe" action="/editVe" method="POST">
            @csrf

            
                <label for="Ve_SoHieu">Số Hiệu Vé:</label>
                <input type="text" class="form-control" id="Ve_SoHieu" name="Ve_SoHieu" readonly="true" value="{{$ve->Ve_SoHieu}}" >
                
                <label for="Ve_TenKH">Tên Khách Hàng:</label>
                <input type="text" class="form-control" id="Ve_TenKH" name="Ve_TenKH" value="{{$ve->Ve_TenKH}}" >

                <label for="Ve_Sdt">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="Ve_Sdt" name="Ve_Sdt" value="{{$ve->Ve_Sdt}}" >

                <label for="TD_Ma">Tuyến Đường:</label>
                <select id="TD_Ma" class="form-control" name="TD_Ma">
                {{-- @if(isset($tdlist) && count($tdlist)>0) --}}
                    @foreach($chuyenlist as $k =>$v)
                        <option value="{{$v->TD_Ma}}" @if($ve->TD_Ma ==$v->TD_Ma) selected @endif>{{$v->TD_XuatPhat}}-{{$v->TD_DichDen}}</option>
                    @endforeach
                {{-- @endif  --}}
                </select> 

                <label for="Ngay">Ngày Chạy:</label>
                <input type="date"  class="form-control" id="Ngay" name="Ngay" value="{{$ve->Ngay}}" >

                <label for="Gio">Giờ :</label>
                <select id="Gio" class="form-control" name="Gio">
                {{-- @if(isset($gio) && count($gio)>0) --}}
                    @foreach($giolist as $k =>$v)
                        <option value="{{$v->Gio}}" @if($ve->Gio ==$v->Gio) selected @endif>{{$v->Gio}}</option>
                    @endforeach
                {{-- @endif  --}}
                </select> 

                <label for="SoGhe">Số Ghế:</label>
                <input type="text" class="form-control" id="SoGhe" name="SoGhe" value="{{$ve->SoGhe}}" >
            

            <br><br>
            <a  href="/home/vexe/list" class="btn btn-secondary" data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary">Save changes</button>                
        </form>
    </div>  
    @endif
</div>