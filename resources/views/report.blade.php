@extends('template')

@section('main')
<h4 class="text-center mt-3">Company Report</h4>
<div class="container-fluid mb-4 py-3" style="background-color: white">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group list-group-flush mt-3">
                @foreach ($categories as $category)
                    <li class="list-group-item">
                        <a class="text-dark" href="{{route('report.history',['category'=>$category->name])}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-9">
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
                  </tr>
                </thead>
                <tbody>
                    @foreach ($parcels as $parcel)
                        @if(auth()->user()->id == $parcel->user->id)
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
                                    <td>{{count()}}</td>
                                </tr>
                                <td></td>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
