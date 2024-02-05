<section class="headerSec">
    <div class="container headerDiv">
        <div class="row">
            <div class="col-2 col-md-8 welcome">
                <a href="{{route('teams')}}"><img src="/assets/images/logo.png" class="me-2 logo" alt="Arthur Lawrence Logo"></a>
                <span>
                        <h2>Welcome  {{ \Str::title(auth::user()->name) }}</h2>
                        <p> <?php $mytime = Carbon\Carbon::now();
                            echo $mytime->toDateTimeString(); ?></p>
                    </span>
               <img src="/assets/images/wave.png" class="wave" alt="wave hand">
            </div>

            <div class="col-10 col-md-4 user ">
                <div class="dropdown">
                    <div class="dropdown-trigger">
                        @if(auth::user()->image)
                         {{--   <img  src="{{url( '/assets/images/'. auth::user()->image)}}" alt="User Image" class="person me-2" style="max-width: 42px;border-radius: 50%;">--}}
                        @else
                         {{--   <img  src="/assets/images/user-account.png" alt="User Placeholder Image"  class="person me-2" style="max-width: 42px;border-radius: 50%;">--}}
                        @endif

                        <span>

                            <input id="send_role_value" value="{{ \Str::title(auth::user()->roles()->first()->id) }}" hidden>
                                {{--<p>{{ \Str::title(auth::user()->roles()->first()->role) }}</p>--}}
                            </span>
                        <img src="/assets/images/down.png" class="dropdownImg" alt="dropdown">
                    </div>
                    <div class="dropdown-menu">
                        @if (userRole(auth()->id())== "administrator")

                            {{--  <a href="{{route('portal')}}">Insurance</a>
                           <a  href="{{route('rolesrights')}}">Role Rights</a>--}}
                        @endif
                            <a  href="{{ route('site.logout') }}">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
{{--    TOP NAVIGATION--}}
{{--<div class="top-nav-bar">
    <div class="container-fluid">

        <div class="row m-0">
            <h2 class="font-size-18 d-flex mb-0" style="
    width: auto;
">
                GOOD MORNING

            </h2>
            <h2 class="font-size-14 d-flex mb-0" style="width: auto;">
                @if(userRole(\Auth::user()->id) == 'administrator')



                @else



     @endif
 </h2>--}}

 {{--<div class="dropdown col d-flex">
     <div class="col-1 d-flex align-items-center" style="width: 26%;">
         <?php $mytime = Carbon\Carbon::now();
         echo $mytime->toDateTimeString(); ?>
     </div>
     <div class="row">
         @if(auth::user()->image)
             <img class="mt-1" src="{{url( '/assets/images/'. auth::user()->image)}}" alt="User Image">
         @else
             <img class="mt-1" src="/assets/images/user-account.png" alt="User Placeholder Image">
         @endif

         <div class="col">
             <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <p class="font-size-15 fw-light">
                    {{ \Str::title(auth::user()->name) }}
                </p>
                 <input id="send_role_value" value="{{ \Str::title(auth::user()->roles()->first()->id) }}" hidden>

                 <p class="font-size-15 fw-bold" style="text-transform: uppercase;">
                     {{ \Str::title(auth::user()->roles()->first()->role) }}
                 </p>
             </a>
             <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                 @if (userRole(auth()->id())== "administrator")

                 <li><a class="dropdown-item" href="">Users</a></li>
                 <li><a class="dropdown-item" href="{{route('rolesrights')}}">Role Rights</a></li>
                 @endif
                 <li><a class="dropdown-item" href="{{ route('site.logout') }}">Logout</a></li>
             </ul>
         </div>
     </div>
 </div>
</div>
</div>
</div>--}}
{{--    TOP NAVIGATION--}}

{{--sidebar--}}
    @include('partials/sidebar')
{{--sidebar--}}

