<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;


class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //To branch List
    public function index(){
        $branches = Branch::latest()->paginate(5);
        return view('branch.index', compact('branches'));
    }

    //To create branch
    public function create(){
        return view('branch.create-branch');
    }

    //store data into DB
    public function store(Request $request){

        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'contact' => 'required|numeric|min:11',
            'zipcode' => 'required|numeric|min:10',
        ],

        [
            'zipcode.required|numeric' => 'Zip/postal field is required'
        ]);


        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $contact = $request->input('contact');
        $zipcode = $request->input('zipcode');

        $branch = new Branch();
        $branch -> street = $street;
        $branch -> city = $city;
        $branch -> state = $state;
        $branch -> country = $country;
        $branch -> contact = $contact;
        $branch -> zipcode = $zipcode;

        $branch->save();

        return redirect(route('branch.index'))->with('status', 'Branch has been Created Sucessfully');

    }

    public function edit(Branch $branch){
        return view('branch.edit-branch', compact('branch'));
    }

    public function update(Request $request, Branch $branch){
        $request->validate([
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'contact' => 'required|numeric|min:11',
            'zipcode' => 'required|numeric|min:10',
        ],

        [
            'zipcode.required|numeric' => 'Zip/postal field is required'
        ]);


        $street = $request->input('street');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $contact = $request->input('contact');
        $zipcode = $request->input('zipcode');


        $branch -> street = $street;
        $branch -> city = $city;
        $branch -> state = $state;
        $branch -> country = $country;
        $branch -> contact = $contact;
        $branch -> zipcode = $zipcode;

        $branch->save();

        return redirect(route('branch.index'))->with('status', 'Branch has been Updated Sucessfully');

    }

    public function destroy(Branch $branch){
        $branch->delete();

        return redirect()->back()->with('status', 'Branch has been Deleted Sucessfully');
    }
}
