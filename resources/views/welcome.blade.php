@extends('layout')

@section('main')
<main>

    <div class="container">
        <div class="card border-primary my-5">
            <div class="card-body">
                <h3 class="text-center py-5">Safe & Reliable <span>Logistic</span> Solutions!</h3>
                <form action="/track" method="get">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6 offset-md-3">

                        <textarea name="search" class="form-control" placeholder="Enter Your Track Code Here" cols="30" rows="1">{{old('search')}}</textarea>
                            @error('search')
                                <span class="text-danger pt-3">{{$message}}</span>
                            @enderror
                      </div>
                    </div>

                    <div class="card-footer border-top border-info">
                        <div class="d-flex w-100 justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary mr-2">Search and Trace</button>
                        </div>
                    </div>
                </form>

              </div>

        </div>
    </div>


</main>
@endsection
