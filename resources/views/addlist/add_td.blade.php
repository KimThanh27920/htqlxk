
                                <form action="/add_TD" method="POST">
                                    @csrf
                                    <label for="ID">Mã Tuyến Đường:</label>
                                    <input type="text" class="form-control" id="ID" name="ID">
                                
                                    <label for="xuatphat">Xuất Phát:</label>
                                    <input type="text"  class="form-control" id="xuatphat" name="xuatphat">
                
                                    <label for="dichden">Đích Đến:</label>
                                    <input type="text"  class="form-control" id="dichden" name="dichden">
                                
                                    <label for="dai">Độ Dài:</label>
                                    <input type="text" class="form-control" id="dai" name="dai">

                                    <label for="thoigian">Thời Gian:</label>
                                    <input type="text" class="form-control" id="thoigian" name="thoigian">
                                    
                                    <label for="loai">Loại Xe:</label>
                                    <select id="loai" class="form-control" name="loai">
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
                                