<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackSubmitted;
use App\Models\Cart;
use App\Models\FeedBack;
use App\Models\FoodChef;
use App\Models\FoodMenu;
use App\Models\Order;
use App\Models\UserReservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
   public function Index()
   {
    if(Auth::id())
    {
      return redirect('redirects');
    }
    else
    $food=FoodMenu::all();
    $chef=FoodChef::all();
    return view('Layouts.user',compact('food','chef'));
   }
   public function Redirects()
   {
    $food=FoodMenu::all();
    $chef=FoodChef::all();
    $usertype=Auth::user()->usertype;
    if($usertype==1)
    {
        return view('admin.child');
    }
    else
    {
      $user_id=Auth::user()->id;
      $count=Cart::where('user_id',$user_id)->count();
        return view ('Layouts.user',compact('food','chef','count'));
    }
   }
   public function UserReservation(Request $request)
   {
    if(Auth::id())
    {
      UserReservation::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'guest'=>$request->guest,
        'date'=>$request->date,
        'time'=>$request->time,
        'message'=>$request->message,
      ]);
      $notification=array(
        'message'=>'User Reservation Added Successfully..!',
        'alert-type'=>'success',
       );
      return redirect()->back()->with($notification);
    }
    else
    {
      return redirect('/login');
    }
   }
   public function AddCart(Request $request,$id)
   {
    if(Auth::id())
    {
      $user_id=Auth::id();
      $foodid=$id;
      $quantity=$request->quantity;
      $cart=new Cart;
      $cart->user_id=$user_id;
      $cart->foodmenu_id=$foodid;
      $cart->quantity=$quantity;
      $cart->save();
      $notification=array(
        'message'=>'Added To Cart Successfully..!',
        'alert-type'=>'success',
       );
     return redirect()->back()->with($notification);
    }
    else
    {
      return redirect('/login');
    }
   }
   public function ShowCart(Request $request,$id)
   {
    $count=Cart::where('user_id',$id)->count();
    // $delete=Cart::select('*')->where('user_id','=',$id)->get();
    $data=Cart::where('user_id',$id)->with('foodmenu')->get();
    return view('admin.show_cart',compact('count','data'));
   }
   public function DeleteCartItem($id)
   {
     $crt=Cart::find($id);
     if(!$crt)
     {
        return 'No Item in Cart';
     }
     else
     {
      $crt->delete();
      $notification=array(
        'message'=>'Cart Item Deleted Successfully..!',
        'alert-type'=>'success',
       );
      return redirect()->back()->with($notification);
     }
   }
   public function OrderConfirm(Request $request)
   {
    foreach($request->foodname as $key=>$foodname)
    {
      $odr=new Order;
      $odr->foodname=$foodname;
      $odr->price=$request->price[$key];
      $odr->quantity=$request->quantity[$key];
      $odr->name=$request->name;
      $odr->phone=$request->phone;
      $odr->address=$request->address;
      $odr->save();
    }
    $notification=array(
      'message'=>'User Confirm The Order Successfully..!',
      'alert-type'=>'success',
     );
    return redirect()->back()->with($notification);
   }
   public function AddFeedback(Request $request)
   {
    
     $feed=FeedBack::create([
          'name'=>$request->name,
          'rating'=>$request->rating,
          'date'=>$request->date,
          'time'=>$request->time,
          'message'=>$request->message
    ]);
    Mail::to('absar729khan@gmail.com')->send(new FeedbackSubmitted($feed));
    return redirect()->back();
   }
}
