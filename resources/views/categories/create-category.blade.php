@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Create New Parcel Category</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
		<div class="card-body">
            @include('Includes.flash-message')
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6 offset-md-4">

                    <textarea name="name" class="form-control" placeholder="Create New Parcel Category e.g Shipped" cols="30" rows="1">{{old('name')}}</textarea>
                    @error('name')
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
