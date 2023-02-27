
@extends('layout')
@section('main')
<div class="container">
    @forelse ($parcels as $parcel)
        <div class="container my-4">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Track No - {{$parcel->reference_number}}</h3>
                </div>

                    <div class="col-sm-6">
                       <h5>{{$parcel->branch->city}} {{$parcel->branch->state}}</h5>
                    </div>

            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sender Information</h5>
                                <p class="card-text">Name: <br/>
                                    {{$parcel->sendername}}
                                </p>
                                <p class="card-text">Address: <br/>
                                    {{$parcel->address}}
                                </p>
                                <p class="card-text">Contact: <br/>
                                    {{$parcel->contact}}
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reciever Information</h5>
                                <p class="card-text">Name: <br/>
                                    {{$parcel->recieverName}}
                                </p>
                                <p class="card-text">Address: <br/>
                                    {{$parcel->recieverAddress}}
                                </p>
                                <p class="card-text">Contact: <br/>
                                    {{$parcel->recieverContact}}
                                </p>


                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Parcel Information</h5>
                                <p class="card-text">Parcel Name: <br/>
                                    {{$parcel->parcelName}}
                                </p>
                                <p class="card-text">Weight: <br/>
                                    {{$parcel->Weight}}
                                </p>
                                <p class="card-text">Price: <br/>
                                    {{$parcel->price}}
                                </p>
                                <p class="card-text">Destination: <br/>
                                 From {{$parcel->destinationFrom}} To {{$parcel->destinationTo}}
                                </p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="card-text">Parcel Status:</p>
                                        <span style="background-color: green; color:white; border-radius: 15px;" class="px-3 py-2">
                                            {{$parcel->category->name}}</span>
                                    </div>
                                    <div class="col-sm-6 py-3">
                                        <p class="card-text">Updated: {{$parcel->updated_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    @empty
        <div class="card mt-4">
            <div class="card-body text-center">
                <p>Sorry Search Result not Found. Please Enter a Valid Tracking ID</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
