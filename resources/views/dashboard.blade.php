@extends('template')

@section('main')
    <x-app-layout>
@auth

{{-- @if (Auth::check())
jgjgjfjfgghfhf --}}
<div class="py-12">
    <div class="p-6 border-b border-gray-200">
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="max-w-sm rounded overflow-hidden shadow">
                    <div class="px-1 py-4 text-center">
                        <div class="font-bold text-l mb-2">shipped Status</div>
                        <p class="text-gray-700 text-base">
                            {{$shipped}}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="max-w-sm rounded overflow-hidden shadow">
                    <div class="px-6 py-4 text-center">
                    <div class="font-bold text-l mb-2">In-Transit Status</div>
                    <p class="text-gray-700 text-base">
                        {{$transit}}
                    </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="max-w-sm rounded overflow-hidden shadow">
                    <div class="px-6 py-4 text-center">
                    <div class="font-bold text-l mb-2">Delivered Status</div>
                    <p class="text-gray-700 text-base">
                        {{-- {{$delivered}} --}}
                    </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row mt-3"> --}}
            {{-- <div class="col-md-4">
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <div class="px-1 py-4 text-center">
                    <div class="font-bold text-l mb-2">Ready to be Delivered Status</div>
                    <p class="text-gray-700 text-base">
                        {{$ready}}
                    </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4 text-center">
                    <div class="font-bold text-l mb-2">Unseccessful Delivery Status</div>
                    <p class="text-gray-700 text-base">
                        {{$unsuccessful}}
                    </p>
                    </div>
                </div>
            </div> --}}
    </div>
</div>
{{-- @endif --}}

    {{-- @elseif(auth()->user()->name === $parcel->user->name) --}}

    {{-- <div class="py-12">
        <div class="p-6 border-b border-gray-200">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="max-w-sm rounded overflow-hidden shadow">
                        <div class="px-1 py-4 text-center">
                        <div class="font-bold text-l mb-2">Shipped Status</div>
                        <p class="text-gray-700 text-base">
                            {{$shipped}}
                        </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="max-w-sm rounded overflow-hidden shadow">
                        <div class="px-1 py-4 text-center">
                        <div class="font-bold text-l mb-2">In-Transit Status</div>
                        <p class="text-gray-700 text-base">
                            {{$transit}}
                        </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="max-w-sm rounded overflow-hidden shadow">
                        <div class="px-1 py-4 text-center">
                        <div class="font-bold text-l mb-2">Delivered Status</div>
                        <p class="text-gray-700 text-base">
                            {{$delivered}}
                        </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-1 py-4 text-center">
                        <div class="font-bold text-l mb-2">Ready to be Delivered Status</div>
                        <p class="text-gray-700 text-base">
                            {{$ready}}
                        </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4 text-center">
                        <div class="font-bold text-l mb-2">Unseccessful Delivery Status</div>
                        <p class="text-gray-700 text-base">
                            {{$unsuccessful}}
                        </p>
                        </div>
                    </div>
                </div>
        </div>
    </div> --}}
    {{-- @endif --}}
{{-- @endforeach --}}
@endauth

    </x-app-layout>

@endsection
