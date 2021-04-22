
                                <form action="/add_DG" method="POST">
                                    @csrf
                                    

                                    <label for="ID">Tuyến Đường:</label>
                                    <select id="ID" class="form-control" name="ID">
                                     {{-- @if(isset($tdlist) && count($tdlist)>0) --}}
                                        @foreach($tdlist as $k =>$v)
                                            <option value="{{$v->TD_Ma}}" name="td">{{$v->TD_XuatPhat}}-{{$v->TD_DichDen}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 

                                    <label for="date">Ngày Áp Dụng:</label>
                                    <input type="date"  class="form-control"id="date" name="date">
                                
                                
                                    <label for="gia">Đơn Giá :</label>
                                    <input type="text" class="form-control" id="gia" name="gia">
                                
                                   
                                    <br><br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>   
                                    
                                    
                                </form>
                                