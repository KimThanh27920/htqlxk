
                                <form action="/add_Chuyen" method="POST">
                                    @csrf
                            
                                    <label for="ID">Tuyến Đường:</label>
                                    <select id="ID" class="form-control" name="ID">
                                     {{-- @if(isset($tdlist) && count($tdlist)>0) --}}
                                        @foreach($tdlist as $k =>$v)
                                            <option value="{{$v->TD_Ma}}" name="td">{{$v->TD_XuatPhat}}-{{$v->TD_DichDen}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 

                                    <label for="gio">Giờ :</label>
                                    <select id="gio" class="form-control" name="gio">
                                     {{-- @if(isset($gio) && count($gio)>0) --}}
                                        @foreach($gio as $k =>$v)
                                            <option value="{{$v->Gio}}" name="gio">{{$v->Gio}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 
                                    <br><br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>   
                                    
                                    
                                </form>
                                