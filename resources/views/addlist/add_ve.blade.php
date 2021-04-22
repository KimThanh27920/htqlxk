
                                <form action="/add_ve" method="POST">
                                    @csrf
                                    <label for="ID">Tên Khách Hàng:</label>
                                    <input type="text" class="form-control" id="ID" name="ID">

                                    <label for="phone">Số Điện Thoại:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">

                                    <label for="td">Tuyến Đường:</label>
                                    <select id="td" class="form-control" name="td">
                                     {{-- @if(isset($tdlist) && count($tdlist)>0) --}}
                                        @foreach($chuyenlist as $k =>$v)
                                            <option value="{{$v->TD_Ma}}">{{$v->TD_XuatPhat}}-{{$v->TD_DichDen}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 

                                    <label for="date">Ngày Chạy:</label>
                                    <input type="date"  class="form-control"id="date" name="date">

                                    <label for="gio">Giờ :</label>
                                    <select id="gio" class="form-control" name="gio">
                                     {{-- @if(isset($gio) && count($gio)>0) --}}
                                        @foreach($giolist as $k =>$v)
                                            <option value="{{$v->Gio}}" name="gio">{{$v->Gio}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 

                                    <label for="ghe">Số Ghế:</label>
                                    <input type="text" class="form-control" id="ghe" name="ghe">


                                    <br><br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>  
                                    
                                </form>
                                