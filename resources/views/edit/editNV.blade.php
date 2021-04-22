
<div >
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Sửa Thông Tin Nhân Viên</h5>

    <a href="/home/staff/list" class="close"  aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </a>

  </div>
    @if(isset($nhanvien) )
    <div  class="modal-body" id="editform" >
    <form  id="formEditNV" action="/editNV" method="POST" >

        @csrf

        <label for="NV_Ma">Mã Nhân Viên:</label>
        <input type="text" class="form-control" id="NV_Ma" name="NV_Ma" readonly="True" value="{{$nhanvien->NV_Ma}}">

        <label for="NV_HoTen">Họ Tên:</label>
        <input type="text"  class="form-control" id="NV_HoTen" name="NV_HoTen" value="{{$nhanvien->NV_HoTen}}">

        <label for="NV_NgaySinh">Ngày Sinh:</label>
        <input type="date"  class="form-control" id="NV_NgaySinh" name="NV_NgaySinh" value="{{$nhanvien->NV_NgaySinh}}" maxlength="10">

        <label for="NV_GioiTinh">Giới Tính:</label><br>
        <select id="NV_GioiTinh" class="form-control" name="NV_GioiTinh">
            <option value="Nam" @if($nhanvien->NV_GioiTinh == "Nam") selected @endif>Nam</option>
            <option value="Nữ" @if($nhanvien->NV_GioiTinh == "Nữ") selected @endif>Nữ</option>
            <option value="Khác" @if($nhanvien->NV_GioiTinh == "Khác") selected @endif>Khác</option>

        </select>

        <label for="NV_DiaChi">Địa Chỉ:</label>
        <input type="text"  class="form-control" id="NV_DiaChi" name="NV_DiaChi" value="{{$nhanvien->NV_DiaChi}}">

        <label for="NV_Sdt">Số Điện Thoại:</label>
        <input type="text" class="form-control" id="NV_Sdt" name="NV_Sdt" value="{{$nhanvien->NV_Sdt}}" maxlength="10">

        <label for="VTCT_Ma">Vị Trí Công Tác:</label>
        <select id="VTCT_Ma" class="form-control" name="VTCT_Ma" value="{{$nhanvien->VTCT_Ma}}">
        {{-- @if(isset($vtlist) && count($vtlist)>0) --}}
            @foreach($vtlist as $k =>$v)
                <option value="{{$v->VTCT_Ma}}" @if($v->VTCT_Ma == $nhanvien->VTCT_Ma) selected @endif>{{$v->VTCT_Ten}}</option>
            @endforeach
        {{-- @endif  --}}
        </select> 

        <label for="DD_Ma">Điểm Dừng :</label>
        <select id="DD_Ma" class="form-control" name="DD_Ma">
        {{-- @if(isset($ddlist) && count($ddlist)>0) --}}
            @foreach($ddlist as $k =>$v)
                <option value="{{$v->DD_Ma}}" @if($v->DD_Ma == $nhanvien->DD_Ma) selected @endif>{{$v->DD_Ten}}</option>
            @endforeach
        {{-- @endif  --}}
        </select>
        
        <br><br>
        <a href="/home/staff/list" class="btn btn-secondary" >Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>   
        <br><br>
    </form>
    </div>  
    @endif
</div>