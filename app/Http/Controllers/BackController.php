<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
//Models
use App\Models\NhanVien;
use App\Models\Chuyen;
use App\Models\TuyenDuong;
use App\Models\DonGia;
use App\Models\LichChay;
use App\Models\Ve;
use App\Models\Xe;
use App\Models\DiemDung;
use App\Models\VTCT;
use App\Models\ChiTietVe;
use App\Models\Luong;
use App\Models\LoaiXe;
use App\Models\TaiXe;
use App\Models\Gio;
use App\Models\Ngay;
use App\Models\ChooseRegisterJob;
use App\User;
//
use Illuminate\Http\Input;
use App\Http\Controllers\Controller;

use Session;

class BackController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
   
    public function getHome(){
        
            return view('auth.home');

    }

        // //////////////////////////////////////////////////////////softdelete//////////////////////////////////////////////////////////
        public function up()
    {
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('don_gia_luong', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('chuyen', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('diem_dung', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('don_gia', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('gio_xuat_ben', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('he_so_luong', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('lich_chay', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('loai_xe', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('nsx', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('tai_xe', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('thoi_diem', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('tuyen_duong', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('ve', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('vi_tri_cong_tac', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('xe', function (Blueprint $table) {
            $table->softDeletes();
        });

    }

    public function down()
    {
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('nhan_vien', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('don_gia_luong', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('chuyen', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('diem_dung', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('don_gia', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('gio_xuat_ben', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('he_so_luong', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('lich_chay', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
        Schema::table('loai_xe', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('nsx', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('tai_xe', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
        Schema::table('thoi_diem', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('tuyen_duong', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
        Schema::table('ve', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
        Schema::table('vi_tri_cong_tac', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
        Schema::table('xe', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
    }

    //////////////////////////////////////////////////////////// end softdelete //////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////Tài Khoản Nhân Viên//////////////////////////////////////////////////////////
    public function user_list(){
        return view('manager.add_tk');
    }

    //////////////////////////////////////////////////////////Nhân Viên//////////////////////////////////////////////////////////

    public function staff_list(){
        
        $list = DB::table('nhan_vien as b')
        ->join('vi_tri_cong_tac as c', 'b.VTCT_Ma', '=', 'c.VTCT_Ma')
        ->join('diem_dung as a','b.DD_Ma','=','a.DD_Ma')
        ->wherenull('b.deleted_at')
        ->selectRaw('b.NV_Ma,b.DD_Ma,a.DD_Ten,b.NV_HoTen, b.NV_NgaySinh, b.NV_GioiTinh, c.VTCT_Ten, b.NV_DiaChi, b.NV_Sdt')
        ->get();

        $txlist=TaiXe::all();

        $nhanvien=NhanVien::where('VTCT_Ma','NV3')->get();

        // $nhanvienedit= NhanVien::where('NV_Ma',$NV_Ma)->first();
        $ddlist= DiemDung::all();

        $vtlist= VTCT::all();
        return view('system.staff_list', compact('list','nhanvien', 'ddlist','vtlist','txlist'));
    }

    public function post_add_NV(Request $request){
        $add = new NhanVien;
        $add->NV_Ma = $request->ID;
        $add->NV_HoTen = $request->name;
        $add->VTCT_Ma = $request->vtct;
        $add->DD_Ma = $request->diemdung;
        $add->NV_DiaChi = $request->address;
        $add->NV_NgaySinh = $request->birth;
        $add->NV_GioiTinh = $request->gioitinh;
        $add->NV_Sdt = $request->phone;
        $add->save();
        return redirect('/home/staff/list');
    }
    public function post_add_TX(Request $request){
        $add_tx=new TaiXe;
        $add_tx->NV_Ma = $request->nhanvien;
        $add_tx->SoHieuBangLai=$request->banglai;
        $add_tx->save();
        return redirect('/home/staff/list');
    }


    public function Delete_NV($NV_Ma){
        $nhan_vien= NhanVien::where('NV_Ma',$NV_Ma)->delete();
        //$delete = DB::table('nhan_vien')->where('NV_Ma','=',$NV_Ma)->delete();
        return redirect('/home/staff/list');
    }
    //update
    
    public function getNhanVienById($NV_Ma){
        $nhanvien= NhanVien::where('NV_Ma',$NV_Ma)->first();
        $vtlist= VTCT::all();
        $ddlist= DiemDung::all();
        return view('edit.editNV',compact('nhanvien','vtlist','ddlist'));
    }

    public function update_NV(Request $request){
        $nhanvien = NhanVien::where('NV_Ma', $request->NV_Ma)
        ->update([
            'NV_HoTen' => $request->NV_HoTen,
            'NV_NgaySinh'=>$request->NV_NgaySinh,
            'NV_GioiTinh'=>$request->NV_GioiTinh,
            'NV_DiaChi'=>$request->NV_DiaChi,
            'NV_Sdt'=>$request->NV_Sdt,
            'VTCT_Ma'=>$request->VTCT_Ma,
            'DD_Ma'=>$request->DD_Ma
        ]);

        return redirect('/home/staff/list');

    }


    // //////////////////////////////////////////////////////////Đơn giá lương//////////////////////////////////////////////////////////

    public function dongialuong_list(){
        $dongialuong=DB::table('don_gia_luong as a')
        ->join('vi_tri_cong_tac as c', 'a.VTCT_Ma', '=', 'c.VTCT_Ma')
        ->wherenull('a.deleted_at')
        ->select('a.VTCT_Ma','c.VTCT_Ten','a.Ngay','a.DonGiaLuong')->get();

        $vtlist=VTCT::all();
        return view('system.dg_luong_list', compact('dongialuong','vtlist'));
    }


    public function Delete_DGL($VTCT_Ma,$Ngay){
        $delete_dgl= Luong::where([
            ['VTCT_Ma', '=', $VTCT_Ma],
            ['Ngay','=',  $Ngay],
        ])->delete();
        return redirect('/home/dongialuong/list');
    }

    public function post_add_DGL(Request $request){
        $ngay=Ngay::where('Ngay',$request->date)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->date;
            $add_ngay->save();
        } ;
        $add = new Luong;
        $add->VTCT_Ma = $request->vtct;
        $add->Ngay = $request->date;
        $add->DonGiaLuong = $request->gia;
        $add->save();
        return redirect('/home/dongialuong/list');
    }

     //update
     public function getDonGiaLuongById($VTCT_Ma,$Ngay){
        $luong= Luong::where([
            ['VTCT_Ma', '=', $VTCT_Ma],
            ['Ngay','=', $Ngay]
        ])->first();
        return response()->json($luong);
    }

    public function update_DGL(Request $request){
        $ngay=Ngay::where('Ngay',$request->Ngay)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->Ngay;
            $add_ngay->save();
        } ;

        $update =Luong::where([
            ['VTCT_Ma', '=', $request->VTCT_Ma],
            ['Ngay','=', $request->Ngay]
        ])
        ->update([
            'DonGiaLuong'=>$request->DonGiaLuong
          
        ]);

        return redirect('/home/dongialuong/list');

    }
    ////////////////////////////////////////////////////////////Tuyến Đường//////////////////////////////////////////////////////////

    public function buses_list(){
        $buseslist = DB::table('tuyen_duong as td')
        ->join('loai_xe as lx', 'td.LX_Ma', '=', 'lx.LX_Ma')
        ->wherenull('td.deleted_at')
        ->selectRaw('td.TD_Ma,td.TD_XuatPhat,td.TD_DichDen,td.TD_DoDai,td.TD_ThoiGian,lx.LX_Ten')
        ->get();
        $tdlist=TuyenDuong::all();
        $lxlist=LoaiXe::all();
        return view('system.buses_list', compact('buseslist','tdlist','lxlist'));
    }

    public function Delete_TD($TD_Ma){
        $tuyen_duong= TuyenDuong::where('TD_Ma',$TD_Ma)->delete();
        return redirect('/home/buses/list');
    }
    public function post_add_TD(Request $request){
        $add = new TuyenDuong;
        $add->TD_Ma = $request->ID;
        $add->TD_XuatPhat = $request->xuatphat;
        $add->TD_DichDen = $request->dichden;
        $add->TD_DoDai = $request->dai;
        $add->TD_ThoiGian = $request->thoigian;
        $add->LX_Ma = $request->loai;
        $add->save();
        return redirect('/home/buses/list');
    }

     //update
     public function getTuyenDuongById($TD_Ma){
        $tuyenduong= TuyenDuong::where('TD_Ma',$TD_Ma)->first();
        return response()->json($tuyenduong);
    }

    public function update_TD(Request $request){
        $update = TuyenDuong::where('TD_Ma', $request->TD_Ma)
        ->update([
            'TD_XuatPhat' => $request->TD_XuatPhat,
            'TD_DichDen'=>$request->TD_DichDen,
            'TD_DoDai'=>$request->TD_DoDai,
            'TD_ThoiGian'=>$request->TD_ThoiGian,
            'TD_ThoiGian'=>$request->TD_ThoiGian,
            'LX_Ma'=>$request->LX_Ma
        ]);

        return redirect('/home/buses/list');

    }

    ////////////////////////////////////////////////////////////Chuyến//////////////////////////////////////////////////////////

    public function chuyen_list(){
        $chuyenlist = DB::table('chuyen')
        ->join('tuyen_duong', 'chuyen.TD_Ma', '=', 'tuyen_duong.TD_Ma')
        ->wherenull('chuyen.deleted_at')
        ->select('tuyen_duong.TD_XuatPhat','tuyen_duong.TD_DichDen','chuyen.Gio', 'chuyen.TD_Ma')->get();
        $tdlist= TuyenDuong::all();
        $gio= Gio::all();
        return view('system.chuyen_list', compact('chuyenlist','tdlist','gio'));
    }

    public function Delete_Chuyen($TD_Ma,$Gio){
        $delete_chuyen = DB::table('chuyen')
        ->where([
            ['TD_Ma', '=', $TD_Ma],
            ['Gio','=',  $Gio],
        ])->delete();
        return redirect('/home/chuyen/list');
    }

    public function post_add_Chuyen(Request $request){
        $add = new Chuyen;
        $add->TD_Ma = $request->ID;
        $add->Gio = $request->gio;
        $add->save();
        return redirect('/home/chuyen/list');
    }
    //////////////////////////////////////////////////////////// Xe//////////////////////////////////////////////////////////

    public function xe_list(){
        $lxlist=LoaiXe::all();
        $xelist = DB::table('xe')
        ->join('loai_xe', 'xe.LX_Ma', '=', 'loai_xe.LX_Ma')
        ->wherenull('xe.deleted_at')
        ->select('loai_xe.LX_Ten','xe.BienSo','xe.HangKiemDinh','xe.LX_Ma')->get();
        return view('system.xe_list', compact('xelist','lxlist'));
    }
    
     public function Delete_Xe($BienSo){
        $xe= Xe::where('BienSo',$BienSo)->delete();
        return redirect('/home/xe/list');
    }

    public function post_add_Xe(Request $request){

        $add = new Xe;
        $add->BienSo = $request->ID;
        $add->LX_Ma = $request->loai;
        $add->HangKiemDinh = $request->date;
        $add->save();
        return redirect('/home/xe/list');
    }
       //update
       public function getXeById($BienSo){
        $xe= Xe::where( 'BienSo', $BienSo )->first();
        return response()->json($xe);
    }

    public function update_Xe(Request $request){

        $update =Xe::where( 'BienSo', $request->BienSo )->update([
            'LX_Ma'=>$request->LX_Ma,
            'HangKiemDinh'=>$request->HangKiemDinh
        ]);

        return redirect('/home/xe/list');

    }
    ////////////////////////////////////////////////////////////Đơn Giá//////////////////////////////////////////////////////////

    public function dongia_list(){
        $dongialist = DB::table('don_gia')
        ->join('tuyen_duong', 'don_gia.TD_Ma', '=', 'tuyen_duong.TD_Ma')
        ->wherenull('don_gia.deleted_at')
        ->select('don_gia.TD_Ma','tuyen_duong.TD_XuatPhat','tuyen_duong.TD_DichDen','don_gia.Giave','don_gia.Ngay')->get();
        $tdlist=TuyenDuong::all();
        return view('system.dongia_list', compact('dongialist','tdlist'));
    }

    public function Delete_DG($TD_Ma,$Ngay){
        $delete_dg= DonGia::where([
            ['TD_Ma', '=', $TD_Ma],
            ['Ngay','=',  $Ngay],
        ])->delete();
        return redirect('/home/dongia/list');
    }

    public function post_add_DG(Request $request){
        $ngay=Ngay::where('Ngay',$request->date)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->date;
            $add_ngay->save();
        } ;
        $add = new DonGia;
        $add->TD_Ma = $request->ID;
        $add->Ngay = $request->date;
        $add->Giave = $request->gia;
        $add->save();
        return redirect('/home/dongia/list');
    }

    //update
     public function getDonGiaById($TD_Ma,$Ngay){
        $dongia= DonGia::where([
            ['TD_Ma', '=', $TD_Ma],
            ['Ngay','=', $Ngay]
        ])->first();
        return response()->json($dongia);
    }

    public function update_DG(Request $request){
        $ngay=Ngay::where('Ngay',$request->Ngay)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->Ngay;
            $add_ngay->save();
        } ;

        $update =DonGia::where([
            ['TD_Ma', '=', $request->TD_Ma],
            ['Ngay','=', $request->Ngay]
        ])->update([
            'Giave'=>$request->Giave
          
        ]);

        return redirect('/home/dongia/list');

    }
    ////////////////////////////////////////////////////////////Lịch Chạy//////////////////////////////////////////////////////////

    public function lichchay_list(){
        $list = DB::table('lich_chay as a')
        ->join('nhan_vien as b','a.NV_Ma','=','b.NV_Ma')
        ->join('tuyen_duong as c', 'a.TD_Ma', '=', 'c.TD_Ma')
        ->wherenull('a.deleted_at')
        ->select('a.ID','a.NV_Ma','b.NV_HoTen','c.TD_XuatPhat','c.TD_DichDen','a.Ngay','a.Gio')->get();

        $txlist= DB::table('tai_xe as a')
        ->join('nhan_vien as b','a.NV_Ma','=','b.NV_Ma')
        ->select('a.NV_Ma','b.NV_HoTen')->get();

        // $tdlist=TuyenDuong::all();
        $chuyenlist=DB::table('chuyen as a')
        ->join('tuyen_duong as c', 'a.TD_Ma', '=', 'c.TD_Ma')
        ->select('a.TD_Ma','c.TD_XuatPhat','c.TD_DichDen')->distinct()->get();

        $giolist=DB::table('chuyen as a')->select('a.Gio')->distinct()->get();

        return view('manager.lichchay', compact('list','txlist','chuyenlist','giolist'));
    }

    public function Delete_LC($ID){
        $lichchay= LichChay::where('ID',$ID)->delete();
        return redirect('/home/lichchay/list');
    }

    public function post_add_LC(Request $request){
        $ngay=Ngay::where('Ngay',$request->date)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->date;
            $add_ngay->save();
        } ;
        $add = new LichChay;
        $add->NV_Ma=$request->nv;
        $add->TD_Ma = $request->td;
        $add->Ngay = $request->date;
        $add->Gio = $request->gio;
        $add->save();
        return redirect('/home/lichchay/list');
    }
         //update
         public function getLichChayById($ID){
            $lichchay=LichChay::where('ID', $ID )->first();
            
            $txlist= DB::table('tai_xe as a')
            ->join('nhan_vien as b','a.NV_Ma','=','b.NV_Ma')
            ->select('a.NV_Ma','b.NV_HoTen')->get();

            // $tdlist=TuyenDuong::all();
            $chuyenlist=DB::table('chuyen as a')
            ->join('tuyen_duong as c', 'a.TD_Ma', '=', 'c.TD_Ma')
            ->select('a.TD_Ma','c.TD_XuatPhat','c.TD_DichDen')->distinct()->get();

            $giolist=DB::table('chuyen as a')->select('a.Gio')->distinct()->get();
            
            return view('edit.editLC', compact('lichchay','txlist','chuyenlist','giolist'));
          
        }
    
        public function update_LC(Request $request){
            $ngay=Ngay::where('Ngay',$request->Ngay)->get();
            if($ngay == "[]") {
                $add_ngay= new Ngay;
                $add_ngay->Ngay = $request->date;
                $add_ngay->save();
            } ;
            $update =LichChay::where( 'ID', $request->ID )->update([
                'NV_Ma'=> $request->NV_Ma,
                'TD_Ma'=> $request->TD_Ma,
                'Ngay'=> $request->Ngay,
                'Gio'=> $request->Gio
            ]);
    
            return redirect('/home/lichchay/list');
    
        }
    ////////////////////////////////////////////////////////////Vé Xe////////////////////////////////////////////////////////// 
    public function banve_list(){
        $list = DB::table('ve as a')
        ->join('chi_tiet_ve as b','a.ve_sohieu','=','b.ve_sohieu')
        ->join('tuyen_duong as c', 'b.TD_Ma', '=', 'c.TD_Ma')
        ->wherenull('a.deleted_at')
        ->select('a.Ve_SoHieu','a.Ve_NgayLap','a.Ve_TenKH','a.Ve_Sdt','c.TD_XuatPhat','c.TD_DichDen','b.Ngay','b.Gio','b.SoGhe')->get();
        
        
        
        $tdlist=TuyenDuong::all();

        $chuyenlist = DB::table('chuyen as a')
        ->join('tuyen_duong as c', 'a.TD_Ma', '=', 'c.TD_Ma')
        ->select('a.TD_Ma','c.TD_XuatPhat','c.TD_DichDen')->distinct()->get();

        $giolist=DB::table('chuyen as a')->select('a.Gio')->distinct()->get();
        return view('manager.ban_ve', compact('list','tdlist','chuyenlist','giolist'));
    }
    
    public function Delete_VX($Ve_SoHieu){
        $chitiet= ChiTietVe ::where('Ve_SoHieu',$Ve_SoHieu)->delete();
        $ve= Ve::where('Ve_SoHieu',$Ve_SoHieu)->delete();
        return redirect('/home/vexe/list');
    }
   
    public function post_add_ve(Request $request){
        $ngay=Ngay::where('Ngay',$request->date)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->date;
            $add_ngay->save();
        } ;
        $add = new ve;
        $add->Ve_NgayLap=Carbon::now();
        $add->Ve_TenKH=$request->ID;
        $add->Ve_Sdt=$request->phone;
        $add->save();

        $add_ctv =new ChiTietVe;

        $Ve_SoHieu= Ve::where([
            ['Ve_NgayLap', '=',$add->Ve_NgayLap],
            ['Ve_TenKH','=', $request->ID ],
            ['Ve_Sdt','=',$request->phone],
        ])->select('Ve_SoHieu')->get();

        $add_ctv->Ve_SoHieu=substr($Ve_SoHieu,14, strlen($Ve_SoHieu)-16);
        $add_ctv->TD_Ma = $request->td;
        $add_ctv->Ngay = $request->date;
        $add_ctv->Gio = $request->gio;
        $add_ctv->SoGhe=$request->ghe;
        $add_ctv->save();
        
        return redirect('/home/vexe/list');
    }
      //update
      public function getVeById($Ve_SoHieu){
        $ve = DB::table('ve as a')
        ->join('chi_tiet_ve as b','a.Ve_SoHieu','=','b.Ve_SoHieu')
        ->where('a.Ve_SoHieu','=',$Ve_SoHieu)
        ->first();

        $tdlist=TuyenDuong::all();

        $chuyenlist = DB::table('chuyen as a')
        ->join('tuyen_duong as c', 'a.TD_Ma', '=', 'c.TD_Ma')
        ->select('a.TD_Ma','c.TD_XuatPhat','c.TD_DichDen')->distinct()->get();

        $giolist=DB::table('chuyen as a')->select('a.Gio')->distinct()->get();
        return view('edit.editBV',compact('ve','tdlist','chuyenlist','giolist'));
    }

    public function update_Ve(Request $request){
        $ngay=Ngay::where('Ngay',$request->Ngay)->get();
        if($ngay == "[]") {
            $add_ngay= new Ngay;
            $add_ngay->Ngay = $request->date;
            $add_ngay->save();
        } ;

       $update=Ve::where('Ve_SoHieu',$request->Ve_SoHieu)->update([
        'Ve_TenKH'=> $request->Ve_TenKH,
        'Ve_Sdt'=> $request->Ve_Sdt
       ]);
       $update=ChiTietVe::where('Ve_SoHieu',$request->Ve_SoHieu)->update([
        'SoGhe'=> $request->SoGhe,
        'TD_Ma'=> $request->TD_Ma,
        'Ngay'=> $request->Ngay,
        'Gio'=> $request->Gio
       ]);
        return redirect('/home/vexe/list');

    }

    
}
