<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
        public function index(){
        $users=User::latest()->paginate(5);
        return view('staff.index', compact('users'));
    }

    public function create(){

        return view("staff.staff-create");
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        return redirect(route('staff.index'))->with('status','A New Staff Has Been Created Succesfully');


    }

    public function edit(User $user){
        return view('staff.edit-staff', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);


            $name = $request->input('name');
            $email = $request->input('email');
            $password = Hash::make($request->password);

            $user -> name = $name;
            $user -> email = $email;
            $user -> password = $password;

        $user->save();

        return redirect(route('staff.index'))->with('status','A Staff Detail Has Been Updated Succesfully');
    }

    public function destroy(User $user){
            $user->delete();
            return redirect()->back()->with('status','A Staff Detail Has Been Deleted Succesfully');
    }

}

