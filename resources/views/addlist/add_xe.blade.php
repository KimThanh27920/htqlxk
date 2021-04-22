
                                <form action="/add_Xe" method="POST">
                                    @csrf
                                    <label for="ID">Biển Số:</label>
                                    <input type="text" class="form-control" id="ID" name="ID">

                                    <label for="loai">Loại Xe :</label>
                                    <select id="loai" class="form-control" name="loai">
                                     {{-- @if(isset($lxlist) && count($lxlist)>0) --}}
                                        @foreach($lxlist as $k =>$v)
                                            <option value="{{$v->LX_Ma}}" name="diemdung">{{$v->LX_Ten}}</option>
                                        @endforeach
                                     {{-- @endif  --}}
                                    </select> 
                                
                                    <label for="date">Hạng Kiểm Định:</label>
                                    <input type="date"  class="form-control"id="date" name="date">
                            
                                    <br><br>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>   
                                    
                                    
                                </form>
                                