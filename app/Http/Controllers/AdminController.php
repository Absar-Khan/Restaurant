<?php

namespace App\Http\Controllers;

use App\Models\FoodChef;
use App\Models\FoodMenu;
use App\Models\Order;
use App\Models\User;
use App\Models\UserReservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminUser()
    {
        $data=User::all();
        return view('admin.admin_users',compact('data'));
    }
    public function AddFood()
    {
        $food=FoodMenu::all();
        return view('admin.food_menu',compact('food'));
    }
    public function AddFoodMenu(Request $request)
    {
        
        $food = new FoodMenu();
        $food->title = $request->title;
        $food->price = $request->price;

        if($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('foodimage', $imagename);
        $food->image = $imagename;
          }
          else
          {
            return ('No Image...!');
          }
       $food->description = $request->description;
       $food->save();
       $notification=array(
        'message'=>'Food Menu Added Successfully..!',
        'alert-type'=>'success',
       );
       return redirect()->back()->with($notification);
    }
 
    public function EditFoodMenu($id)
    {
        $food=FoodMenu::find($id);
        return view('admin.edit_food_menu',compact('food'));
    }
    public function UpdateFoodMenu(Request $request,$id)
    {
        $food=FoodMenu::find($id);  
        $food->title = $request->title;
        $food->price = $request->price;

        if($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('foodimage', $imagename);
        $food->image = $imagename;
          }
          else
          {
            return ('No Image...!');
          }
       $food->description = $request->description;
       $food->save();
       $notification=array(
        'message'=>'Food Menu Updated Successfully..!',
        'alert-type'=>'success',
       );
       return redirect()->route('add.food',compact('food'))->with($notification);
    }
    public function AdminShowUserReservation()
    {
        $reservation=UserReservation::all();
        return view('admin.admin_userreservation',compact('reservation'));
    }
    public function DeleteFoodMenu($id)
    {
        $food=FoodMenu::find($id);
        $food->delete();
        $notification=array(
            'message'=>'Food Menu Deleted Successfully..!',
            'alert-type'=>'success',
           );
        return redirect()->back()->with($notification);
    }
    public function DeleteUser($id)
    {
        $user=User::find($id);
        $user->delete();
        $notification=array(
            'message'=>'Admin Deleted User Successfully..!',
            'alert-type'=>'success',
           );
        return redirect()->back()->with($notification);
    }
    public function FoodChef()
    {
        $chef=FoodChef::all();
        return view('admin.admin_chef',compact('chef'));
    } 
    public function AddFoodChef(Request $request)
    {
        $chef= new FoodChef;
        $chef->name=$request->name;
        $chef->speciality=$request->speciality;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $imagename=time().'.'. $image->getClientOriginalExtension();
            $image->move('foodchef',$imagename);
            $chef->image=$imagename;
            $chef->save();
            $notification=array(
                'message'=>'Food Chef Added Successfully..!',
                'alert-type'=>'success',
               );
            return redirect()->back()->with($notification);
        }
        else
        {
            return 'Not Found';
        }
    }
    public function DeleteFoodChef($id)
    {
        $food=FoodChef::find($id);
        $food->delete();
        $notification=array(
            'message'=>'Food Chef Deleted Successfully..!',
            'alert-type'=>'success',
           );
        return redirect()->back()->with($notification);
    }
    public function EditFoodChef($id)
    {
        $foodchef=FoodChef::find($id);
        return view('admin.edit_food_chef',compact('foodchef'));
    }
    public function UpdateFoodChef(Request $request,$id)
    {
        $foodchef=FoodChef::find($id);
        $foodchef->name=$request->name;
        $foodchef->speciality=$request->speciality;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $imagename=time().'.'. $image->getClientOriginalExtension();
            $image->move('foodchef',$imagename);
            $foodchef->image=$imagename;
            $foodchef->save();
            $notification=array(
                'message'=>'Food Chef Updated Successfully..!',
                'alert-type'=>'success',
               );
            return redirect()->route('food.chef',compact('foodchef'))->with($notification);
        }
        else
        {
            return 'Not Found';
        }

    }
    public function AdminShowOrder()
    {
        $order=Order::all();
        return view('admin.admin_show_order',compact('order'));
    }
    public function AdminDeleteOrder($id)
    {
        $delete=Order::find($id);
        $delete->delete();
        $notification=array(
            'message'=>'Admin Deleted Order Successfully..!',
            'alert-type'=>'success',
           );
       return redirect()->back()->with($notification);
    }
    public function Search(Request $request)
    {
        $search=$request->search;
        $order=Order::where('name','like','%'.$search.'%')->get();
        return view('admin.admin_show_order',compact('order'));
    }
}