<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','search');
    }
    //
    public function index(){
        return view('welcome');
    }

    public function search(Request $request){
        $request->validate([
            'search'=> 'required',
        ]);

        $parcels=Parcel::where('reference_number', 'like', '%' . $request->search . '%')
        ->latest()->get();
        return view('track', compact('parcels'));
    }

    public function history(Request $request){
        $parcels = Parcel::latest();

        if($request->category){
            $parcels =Category::where('name',$request->category)
            ->firstorfail()->parcels()->paginate(2)
            ->withQueryString();
        }

        $categories = Category::all();
        return view('report', compact('categories','parcels'));
    }
}
