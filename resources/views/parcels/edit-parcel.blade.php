@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Edit Parcel</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
		<div class="card-body">
            <form action="{{route('parcels.update', $parcel)}}" method="post">
                @method('put')
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="status">Branch</label>
                        <select class="custom-select" id="" name="branch_id">
                        <option selected disabled value="">{{$parcel->branch->city}} {{$parcel->branch->state}}</option>
                        @foreach ($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->city}} {{$branch->state}}</option>
                        @endforeach

                        </select>
                        @error('branch_id')
                        <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Sender Name</label>
                    <textarea name="sendername" class="form-control"  cols="30" rows="3">{{$parcel->sendername}}</textarea>
                    @error('sendername')
                        <span style="color:red; margin bottom:25px">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Sender Address</label>
                    <textarea name="address" class="form-control"  cols="30" rows="3">{{$parcel->address}}</textarea>
                    @error('address')
                        <span style="color:red; margin bottom:25px">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Sender Contact</label>
                        <textarea name="contact" class="form-control"  cols="30" rows="3">{{$parcel->contact}}</textarea>
                        @error('contact')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Receiver Name</label>
                        <textarea name="recieverName" class="form-control"  cols="30" rows="3">{{$parcel->recieverName}}</textarea>
                        @error('recieverName')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Receiver Address</label>
                        <textarea name="recieverAddress" class="form-control"  cols="30" rows="3">{{$parcel->recieverAddress}}</textarea>
                        @error('recieverAddress')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputZip">Receiver Contact</label>
                        <textarea name="recieverContact" class="form-control"  cols="30" rows="3">{{$parcel->recieverContact}}</textarea>
                        @error('recieverContact')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <label for="destination">Destination</label>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">From</label>
                        <textarea name="destinationFrom" class="form-control"  cols="30" rows="3">{{$parcel->destinationFrom}}</textarea>
                        @error('destinationFrom')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputZip">To</label>
                        <textarea name="destinationTo" class="form-control"  cols="30" rows="3">{{$parcel->destinationTo}}</textarea>
                        @error('destinationTo')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <hr>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputZip">Parcel Name</label>
                        <textarea name="parcelName" class="form-control"  cols="30" rows="3">{{$parcel->parcelName}}</textarea>
                        @error('parcelName')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputCity">Weight</label>
                        <textarea name="Weight" class="form-control"  cols="30" rows="3">{{$parcel->Weight}}</textarea>
                        @error('Weight')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputCity">Price</label>
                        <textarea name="price" class="form-control"  cols="30" rows="3">{{$parcel->price}}</textarea>
                        @error('price')
                            <span style="color:red; margin bottom:25px">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">


                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                         <select class="custom-select" id="" name="category_id">
                            <option selected disabled value="">{{$parcel->category->name}}</option>
                            @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                          @error('category_id')
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
