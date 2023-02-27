@extends('template')

@section('main')

<div class="mt-3">
    <h3 class="ml-3">Staff List</h3>
</div>

<hr>

<div class="col-lg-12">
	<div class="card border-primary my-5">
        @include('Includes.flash-message')
		<div class="card-header text-right bg-light">
                <a href="{{route('staff.create')}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
		</div>

		<div class="card-body">
            <table class="table my-4 text-center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td class="text-center">
                            <div class="btn-group">
                                {{--edit --}}
                                 <a href="{{route('staff.edit', $user)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                {{-- delete --}}
                                <form action="{{route('staff.destroy', $user)}}" method="post">
                                    @method('delete')
                                     @csrf
                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
                {{$users->links()}}
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
