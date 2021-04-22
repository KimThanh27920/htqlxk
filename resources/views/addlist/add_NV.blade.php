
                                <form action="/add_NV" method="POST">
                                    @csrf
                                    <label for="ID">Mã Nhân Viên:</label>
                                    <input type="text" class="form-control" id="ID" name="ID">
                                
                                    <label for="name">Họ Tên:</label>
                                    <input type="text"  class="form-control"id="name" name="name">
                                
                                    <label for="birth">Ngày Sinh:</label>
                                    <input type="date"  class="form-control"id="birth" name="birth">
                                
                                    <label for="gioitinh">Giới Tính:</label><br>
                                    <select id="gioitinh" class="form-control" name="gioitinh">
                                        <option value="Nam" selected="True">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác" >Khác</option>
                                    </select>
                                
                                    <label for="address">Địa Chỉ:</label>
                                    <input type="text"  class="form-control" id="address" name="address">
                                
                                    <label for="phone">Số Điện Thoại:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                
                                    <label for="vtct">Vị Trí Công Tác:</label>
                                    <select id="vtct" class="form-control" name="vtct">
                                     {{-- @if(isset($vtlist) && count($vtlist)>0) --}}
                                        @foreach($vtlist as $k =>$v)
                                            <option value="{{$v->VTCT_Ma}}" name="vtct">{{$v->VTCT_Ten}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 

                                    <label for="diemdung">Điểm Dừng :</label>
                                    <select id="diemdung" class="form-control" name="diemdung">
                                     {{-- @if(isset($ddlist) && count($ddlist)>0) --}}
                                        @foreach($ddlist as $k =>$v)
                                            <option value="{{$v->DD_Ma}}" name="diemdung">{{$v->DD_Ten}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 
                                    <br><br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>    
                                    
                                </form>
                                