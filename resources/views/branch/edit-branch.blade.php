@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Edit Branch Details</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
		<div class="card-body">
            @include('Includes.flash-message')
            <form action="{{route('branch.update', $branch)}}" method="post">
                @method('put')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Street/Address</label>
                    <textarea name="street" class="form-control"  cols="30" rows="3">{{$branch->street}}</textarea>
                    @error('street')
                        <span style="color:red; margin bottom:25px">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Branch City</label>
                    <textarea name="city" class="form-control"  cols="30" rows="3">{{$branch->city}}</textarea>
                    @error('city')
                        <span style="color:red; margin bottom:25px">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Branch State</label>
                        <textarea name="state" class="form-control"  cols="30" rows="3">{{$branch->state}}</textarea>
                        @error('state')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Country</label>
                        <textarea name="country" class="form-control"  cols="30" rows="3">{{$branch->country}}</textarea>
                        @error('country')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Contact</label>
                        <textarea name="contact" class="form-control"  cols="30" rows="3">{{$branch->contact}}</textarea>
                        @error('contact')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip/Postal Code</label>
                        <textarea name="zipcode" class="form-control"  cols="30" rows="3">{{$branch->zipcode}}</textarea>
                        @error('zipcode')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer border-top border-info">
                    <div class="d-flex w-100 justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </div>
            </form>

  	    </div>

	</div>
</div>

@endsection
