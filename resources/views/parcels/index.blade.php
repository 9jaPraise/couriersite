@extends('template')
@section('main')
@include('layouts.navigation')
<div class="mt-3">
    <h3 class="ml-3">Parcel List</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
        @include('Includes.flash-message')
		<div class="card-header text-right bg-light">
                <a href="{{route('parcels.create')}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
		</div>
        @auth
        <div class="card-body">
            <table class="table my-4 text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Track code</th>
                    <th scope="col">Branch</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Parcel Name</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Price</th>
                    <th scope="col">parcel Staus</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($parcels as $parcel)
                        @if(auth()->user()->id ===1)
                            <tr>
                                <th scope="row">{{$parcel->id}}</th>
                                <td>{{$parcel->reference_number}}</td>
                                <td>{{$parcel->branch->city}} {{$parcel->branch->state}}</td>
                                <td>{{$parcel->destinationFrom}}</td>
                                <td>{{$parcel->destinationTo}}</td>
                                <td>{{$parcel->parcelName}}</td>
                                <td>{{$parcel->Weight}}</td>
                                <td>{{$parcel->price}}</td>
                                <td>{{$parcel->category->name}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        {{-- edit --}}
                                        <a href="{{route('parcels.edit', $parcel)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                        {{-- delete --}}
                                        <form action="" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @elseif(auth()->user()->id=== $parcel->user->id)
                            <tr>
                                <th scope="row">{{$parcel->id}}</th>
                                <td>{{$parcel->reference_number}}</td>
                                <td>{{$parcel->branch->city}} {{$parcel->branch->state}}</td>
                                <td>{{$parcel->destinationFrom}}</td>
                                <td>{{$parcel->destinationTo}}</td>
                                <td>{{$parcel->parcelName}}</td>
                                <td>{{$parcel->Weight}}</td>
                                <td>{{$parcel->price}}</td>
                                <td>{{$parcel->category->name}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        {{-- edit --}}
                                        <a href="{{route('parcels.edit', $parcel)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                        {{-- delete --}}
                                        <form action="" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                {{$parcels->links()}}
            </table>

		</div>
                <div class="mt-3">
                    <h5 class="text-center">Parcel History</h5>
                </div>
                <table class="table my-4 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Parcel Status</th>
                            <th scope="col">User</th>
                            <th scope="col">Date & Time</th>
                        </tr>
                    </thead>

                    @foreach ($activitylogs as $activitylog)
                        @if(auth()->user()->id===1)

                                <tr>
                                    <th scope="row">{{$activitylog->id}}</th>
                                    <td>{{$activitylog->category->name}}</td>
                                    <td>{{$activitylog->user->name}}</td>
                                    <td>{{$activitylog->datetime}}</td>
                                </tr>

                        @elseif(auth()->user()->id === $activitylog->user->id)
                            <tr>
                                <th scope="row">{{$activitylog->id}}</th>
                                <td>{{$activitylog->category->name}}</td>
                                <td>{{$activitylog->user->name}}</td>
                                <td>{{$activitylog->datetime}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>

        @endauth

	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>

@endsection
