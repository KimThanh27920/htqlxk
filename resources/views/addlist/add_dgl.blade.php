
                                <form action="/add_DGL" method="POST">
                                    @csrf
                                
                                    <label for="vtct">Vị Trí Công Tác:</label>
                                    <select id="vtct" class="form-control" name="vtct">
                                     {{-- @if(isset($vtlist) && count($vtlist)>0) --}}
                                        @foreach($vtlist as $k =>$v)
                                            <option value="{{$v->VTCT_Ma}}" name="vtct">{{$v->VTCT_Ten}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 

                                    <label for="date">Ngày Áp Dụng:</label>
                                    <input type="date"  class="form-control"id="date" name="date">
                                
                                
                                    <label for="gia">Đơn Giá :</label>
                                    <input type="text" class="form-control" id="gia" name="gia">

                                    </select> 
                                    <br><br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>   
                                    
                                    
                                </form>
                                