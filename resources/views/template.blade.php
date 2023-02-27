
<!doctype html>
<html lang="en">
  <head>
  	<title>Courier Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
 {{-- Tailwind CDN --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('assests/css/style.css')}}">
  </head>
  <body>

<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar">
	    <div class="p-4 pt-5">
            @auth
                @if (auth()->user()->id === 1)
                    <ul class="list-unstyled components mb-5">
                        <li>
                            <a class ="{{Request::routeIs('dashboard')?'active': ''}}" href="{{route('dashboard')}}"><i class="fa fa-tachometer mr-3"></i>Dashboard</a>
                        </li>

                        <li>
                            <a class ="{{Request::routeIs('categories.create')?'active': ''}}" href="{{route('categories.create')}}"><i class="fa fa-tasks mr-3"></i>Parcel Category</a>
                        </li>

                        <li class="">
                            <a href="#branchSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-building mr-3"></i>Branch</a>
                            <ul class="collapse list-unstyled" id="branchSubmenu">
                            <li>
                                <a class="{{Request::routeIs('branch.create')?'active': ''}}" href="{{route('branch.create')}}">Add New <span class="fa fa-angle-right ml-3"></span></a>
                            </li>
                            <li>
                                <a class="{{Request::routeIs('branch.index')?'active': ''}}" href="{{route('branch.index')}}">List <span class="fa fa-angle-right ml-3"></span></i></a>
                            </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#branchstaffSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-users mr-3"></span> Branch Staff</a>
                            <ul class="collapse list-unstyled" id="branchstaffSubmenu">
                                <li>
                                    <a href="{{route('staff.create')}}">Add New <span class="fa fa-angle-right ml-3"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('staff.index')}}">List <span class="fa fa-angle-right ml-3"></span></a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#parcelSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-th mr-3"></i>Parcels</a>
                            <ul class="collapse list-unstyled" id="parcelSubmenu">
                                <li>
                                    <a href="{{route('parcels.create')}}">Add New <span class="fa fa-angle-right ml-3"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('parcels.index')}}">List All <span class="fa fa-angle-right ml-3"></span></a>
                                </li>

                            </ul>
                        </li>

                        <li>
                        <a href="#"><i class="fa fa-search mr-3"></i>Track Parcel</a>
                        </li>

                        <li>
                        <a href="{{route('report.history')}}"><i class="fa fa-file mr-3" aria-hidden="true"></i>Reports</a>
                        </li>
                        </ul>
                    </ul>
                @else

                    <ul class="list-unstyled components mb-5">
                        <li>
                            <a class ="{{Request::routeIs('dashboard')?'active': ''}}" href="{{route('dashboard')}}"><i class="fa fa-tachometer mr-3"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="#parcelSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-th mr-3"></i>Parcels</a>
                            <ul class="collapse list-unstyled" id="parcelSubmenu">
                                <li>
                                    <a href="{{route('parcels.create')}}">Add New <span class="fa fa-angle-right ml-3"></span></a>
                                </li>
                                <li>
                                    <a href="{{route('parcels.index')}}">List All <span class="fa fa-angle-right ml-3"></span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                        <a href="#"><i class="fa fa-search mr-3"></i>Track Parcel</a>
                        </li>

                        <li>
                            <a href="{{route('report.history')}}"><i class="fa fa-file mr-3" aria-hidden="true"></i>Reports</a>
                        </li>

                        </ul>
                    </ul>
                @endif
            @endauth
	    </div>
    </nav>

        <!-- Page Content  -->
      <div id="content">


        @yield('main')

            <div class="container footer">
              <p style="color:black;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

      </div>

		</div>

    <script src="{{asset('assests/js/jquery.min.js')}}"></script>
    <script src="{{asset('assests/js/popper.js')}}"></script>
    <script src="{{asset('assests/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assests/js/main.js')}}"></script>
  </body>
</html>
