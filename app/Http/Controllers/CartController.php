<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Dathang;
use App\Thongtin;
use Session;
class CartController extends Controller
{
    public function  index(){
    	$products = DB::table('sanpham')->get();
    	return view('trangchu',compact('products'));
    }
    public function AddCart(Request $request,$id){
    	
    	$products = DB::table('sanpham')->where('id',$id)->first();
    	if($products != null){
    		$oldCart =  Session('Cart') ? Session('Cart') : null;
    		$newCart = new Cart($oldCart);
    		$newCart->AddCart($products, $id);
    		$request->session()->put('Cart',$newCart);
    		
    	}
    	return view('cart');
    	
	}
	public function getChiTiet(Request $request,$id){
		$products1 = DB::table('sanpham')->where('id',$id)->get();
		return view('chitietsanpham',compact('products1'));
	}
	public function DeleteCart(Request $request,$id){
    		$oldCart =  Session('Cart') ? Session('Cart') : null;
			$newCart = new Cart($oldCart);
			$newCart ->DeleteCart($id);
			if(Count( $newCart->products) > 0){
				$request->Session()->put('Cart', $newCart);
			}
			else{
				$request->Session()->forget('Cart');
			}
		return view('cart');
	}
	public function viewList(){
		return view('list');
	}
	public function DeleteListCart(Request $request,$id){
		$oldCart =  Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart ->DeleteCart($id);
		if(Count( $newCart->products) > 0){
			$request->Session()->put('Cart', $newCart);
		}
		else{
			$request->Session()->forget('Cart');
		}
		return view('list-cart');
	}
	public function SaveListCart(Request $request,$id,$quanty){
		$oldCart =  Session('Cart') ? Session('Cart') : null;
		$newCart = new Cart($oldCart);
		$newCart ->UpdateCart($id,$quanty);
		
		$request->Session()->put('Cart', $newCart);
		
		return view('list-cart');
	}
	public function Pay(){
		return view('thanhtoan');
	}
	public function getDatHang(Request $request,$id){
		$dathang = Dathang::where('id_dathang',$id)->get();
		return view('donhang',compact('dathang'));
	}
	public function getThongTin(Request $request,$id){
		$thongtin = Thongtin::where('id_thongtin',$id)->get();
		return view('thongtindathang',compact('thongtin'));
	}
	public function getXacnhan(Request $request,$id){
		$xacnhan = Thongtin::where('id_thongtin',$id)->get();
		return view('xacnhanthanhtoan',compact('xacnhan'));
	}
	public function themThongTin()
	{
		return view('themthongtin');
	}
	public function addThongTin(Request $request)
	{
		$addthongtin = $request->all();
		return view('addthanhcong',compact('addthongtin'));
	}
	public function napTien()
	{
		return view('naptien');
	}
	public function logNapTien()
	{
		return view('lichsunaptien');
	}
}
