<?php

namespace App\Http\Controllers\Admin;

use App\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PromotionsController extends Controller
{
    public function index()
    {
        $promotion = Talent::all();
        return view('admin.promotion.index');
    }


    public function store(Request $request)
    {
        $promotion = new talent; 
        $promotion->Surname = $request->Surname;
        $promotion->FirstName = $request->FirstName;
        $promotion->StartingPosition = $request->StartingPosition;
        $promotion->CurrentPosition = $request->CurrentPosition;
        $promotion->DateOfPromotion = $request->DateOfPromotion;
        
        $promotion->save();
        
        return back()
        ->with('success','Training Record saved successfully');
    } 
}
