<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Masseges;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Contact_us;
use App\Http\Controllers\Manage\EmailsController;

class GeneralController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about_dr(){
        $current=2;
        return view('Fronted.DrHanadi.aboutDr',compact('current'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts(){
        $current=3;
        return view('Fronted.GeneralPages.contact_us',compact('current'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function contact_us(Request $request){
        $massage = new Masseges();
        $massage->name=$request->name;
        $massage->email=$request->email;
        $massage->phone=$request->phone;
        $massage->subject=$request->subject;
        $massage->massage=$request->massage;
        $massage->save();

        return response()->json(['status'=>1,'message'=>'your massage has been sent,we will contact you shortly']);
    }
}
