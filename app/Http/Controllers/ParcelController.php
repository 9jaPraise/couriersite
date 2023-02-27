<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Parcel;
use App\Models\Category;
use App\Models\Branch;
use Carbon\Carbon;
use App\Models\parcelActivitylog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $parcels = Parcel::latest()->paginate(5);
        $activitylogs = parcelActivitylog::latest()->paginate(5);
        return view('parcels.index', compact('parcels','activitylogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $branches = Branch::all();
        return view('parcels.create-parcel', compact('categories', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        //
        $request->validate([
            'sendername'=>'required',
            'address'=>'required',
            'contact'=>'required|numeric|min:11',
            'recieverName'=>'required',
            'recieverAddress'=>'required',
            'recieverContact'=>'required|numeric|min:11',
            'destinationFrom'=>'required',
            'destinationTo'=>'required',
            'parcelName'=>'required',
            'Weight'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required',
            'branch_id'=>'required',

        ],

        [
            'destinationFrom.required'=>'The from field is required',
            'destinationTo.required'=>'The to field is required',
            'category_id.required'=>'The category field is required',
            'branch_id.required'=>'The branch field is required',
        ]);

        $reference_number = Str::upper(Str::random(10));
        $sendername = $request->input('sendername');
        $user_id=Auth::user()->id;
        $address =  $request->input('address');
        $contact =  $request->input('contact');
        $recieverName =  $request->input('recieverName');
        $recieverAddress =  $request->input('recieverAddress');
        $recieverContact =  $request->input('recieverContact');
        $destinationFrom =  $request->input('destinationFrom');
        $destinationTo =  $request->input('destinationTo');
        $parcelName =  $request->input('parcelName');
        $Weight =  $request->input('Weight');
        $price =  $request->input('price');
        $category_id = $request->input('category_id');
        $branch_id = $request->input('branch_id');

        $parcels = new Parcel();

        $parcels->reference_number = $reference_number;
        $parcels->sendername = $sendername;
        $parcels->user_id = $user_id;
        $parcels->address = $address;
        $parcels->contact = $contact;
        $parcels->recieverName = $recieverName;
        $parcels->recieverAddress = $recieverAddress;
        $parcels->recieverContact = $recieverContact;
        $parcels->destinationFrom = $destinationFrom;
        $parcels->destinationTo = $destinationTo;
        $parcels->parcelName = $parcelName;
        $parcels->Weight = $Weight;
        $parcels->price = $price;
        $parcels->category_id = $category_id;
        $parcels->branch_id = $branch_id;



        $parcels->save();

        return redirect(route('parcels.index'))->with('status', 'A New Parcel Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcel $parcel)
    {
        //
        $categories = Category::all();
        $branches = Branch::all();
        return view('parcels.edit-parcel', compact('parcel', 'categories', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcel $parcel, parcelActivitylog $activitylog)
    {
        //
        $request->validate([
            'sendername'=>'required',
            'address'=>'required',
            'contact'=>'required|numeric|min:11',
            'recieverName'=>'required',
            'recieverAddress'=>'required',
            'recieverContact'=>'required|numeric|min:11',
            'destinationFrom'=>'required',
            'destinationTo'=>'required',
            'parcelName'=>'required',
            'Weight'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required',
            'branch_id'=>'required',

        ],

        [
            'destinationFrom.required'=>'The from field is required',
            'destinationTo.required'=>'The to field is required',
            'category_id.required'=>'The category field is required',
            'branch_id.required'=>'The branch field is required',
        ]);

        $sendername = $request->input('sendername');
        $address =  $request->input('address');
        $contact =  $request->input('contact');
        $recieverName =  $request->input('recieverName');
        $recieverAddress =  $request->input('recieverAddress');
        $recieverContact =  $request->input('recieverContact');
        $destinationFrom =  $request->input('destinationFrom');
        $destinationTo =  $request->input('destinationTo');
        $parcelName =  $request->input('parcelName');
        $Weight =  $request->input('Weight');
        $price =  $request->input('price');
        $category_id = $request->input('category_id');
        $branch_id = $request->input('branch_id');

        $dt= Carbon::now();
        $todayDate = $dt->toDateTimeString();
        $parcel_id=$parcel->id;
        $user_id=Auth::user()->id;

        $parcel->sendername = $sendername;
        $parcel->address = $address;
        $parcel->contact = $contact;
        $parcel->recieverName = $recieverName;
        $parcel->recieverAddress = $recieverAddress;
        $parcel->recieverContact = $recieverContact;
        $parcel->destinationFrom = $destinationFrom;
        $parcel->destinationTo = $destinationTo;
        $parcel->parcelName = $parcelName;
        $parcel->Weight = $Weight;
        $parcel->price = $price;
        $parcel->category_id = $category_id;
        $parcel->branch_id = $branch_id;

        $activitylog->senderName = $sendername;
        $activitylog->parcelname = $parcelName;
        $activitylog->phone_number = $contact;
        $activitylog->category_id = $category_id;
        $activitylog->modifyparcel = 'update';
        $activitylog->datetime = $todayDate;
        $activitylog->parcel_id = $parcel_id;
        $activitylog->user_id = $user_id;


        $parcel->save();
        $activitylog->save();

        return redirect(route('parcels.index'))->with('status', 'Parcel has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcel $parcel)
    {
        //
        $parcel->delete();
        return redirect()->back()->with('status', 'The Parcel has been Deleted Successfully');
    }
}
