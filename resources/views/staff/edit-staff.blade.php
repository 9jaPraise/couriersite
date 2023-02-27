@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Edit Staff Details</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
		<div class="card-body">
            @include('Includes.flash-message')
            <form method="post" action="{{route('staff.update', $user)}}">
                @method('put')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Name</label>
                      <textarea name="name" class="form-control"  cols="30" rows="1">{{$user->name}}</textarea>
                      @error('name')
                      <span style="color:red; margin-bottom:25px">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Email</label>
                      <input type="email" class="form-control" name="email" value={{$user->email}}>
                      @error('email')
                      <span style="color:red; margin-bottom:25px">{{$message}}</span>
                      @enderror
                    </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Password</label>
                    <input type="password" class="form-control"  name="password" value={{$user->password}}>
                    @error('password')
                      <span style="color:red; margin-bottom:25px">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4"> Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" value={{$user->password_confirmation}}>
                    @error('password_confirmation')
                      <span style="color:red; margin-bottom:25px">{{$message}}</span>
                      @enderror
                  </div>
                </div>


                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mr-3">save</button>
                    </div>
              </form>

  	    </div>

	</div>
</div>


@endsection
