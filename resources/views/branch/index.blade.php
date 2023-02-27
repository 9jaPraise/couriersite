@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Branch List</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
        @include('Includes.flash-message')
		<div class="card-header text-right bg-light">
                <a href="{{route('branch.create')}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
		</div>

		<div class="card-body">
            <table class="table my-4 text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Postal/Zip Code</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($branches as $branch)
                    <tr>
                        <th scope="row">{{$branch->id}}</th>
                        <td>{{$branch->zipcode}}</td>
                        <td>{{$branch->city}} {{$branch->state}}</td>
                        <td>{{$branch->contact}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                {{-- edit --}}
                                <a href="{{route('branch.edit', $branch)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                {{-- delete --}}
                                <form action="{{route('branch.destroy', $branch)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                {{$branches->links()}}
              </table>

		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>

@endsection
