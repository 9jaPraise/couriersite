@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Create New Staff</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
		<div class="card-body">
            @include('Includes.flash-message')
            <form method="post" action="{{route('staff.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Name</label>
                      <input type="name" class="form-control" name="name" value={{old('name')}}>
                      @error('name')
                      <span style="color:red; margin bottom:25px">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Email</label>
                      <input type="email" class="form-control" name="email" value={{old('email')}}>
                      @error('email')
                      <span style="color:red; margin bottom:25px">{{$message}}</span>
                      @enderror
                    </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Password</label>
                    <input type="password" class="form-control"  name="password" value={{old('password')}}>
                    @error('password')
                      <span style="color:red; margin bottom:25px">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4"> Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" value={{old('password_confirmation')}}>
                    @error('password_confirmation')
                      <span style="color:red; margin bottom:25px">{{$message}}</span>
                      @enderror
                  </div>
                </div>


                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mr-3">Register</button>
                    </div>
              </form>

  	    </div>

	</div>
</div>


@endsection
