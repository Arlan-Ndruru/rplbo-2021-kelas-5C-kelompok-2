<nav
    class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid px-0">
        <a class="img-thumbnail font-weight-bolder ms-sm-3" href="/" rel="tooltip" title="SISTEM INFORMASI PELAYANAN SURAT MENYURAT SATU PINTU MTSN 10 PEKANBARU" data-placement="bottom">
            <img src="{{URL::asset('home/assets/img/SP3.gif')}}" class="img-fluid" height="50" width="50" alt="logo SIPSMSP MTSN 10 Pekanbaru">
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="/">
                        <i class="fa fa-home me-1"></i>
                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Home Page">Home</p>
                    </a>
                </li>
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="/about">
                        <i class="fa fa-info me-1"></i>
                        <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="About Us">Contact</p>
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth    
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link nav-link-icon me-2" href="/dashboard">
                                <i class="fa fa-dashboard me-1"></i>
                                <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="You already Login So, Dashboard Here!">Dashboard</p>
                            </a>
                        </li>
                        @else
                            <li class="nav-item ms-lg-auto">
                                <a class="nav-link nav-link-icon me-2" href="{{route('login')}}">
                                    <i class="fa fa-sign-in me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Login Please">Sign In</p>
                                </a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item ms-lg-auto">
                                <a class="nav-link nav-link-icon me-2" href="{{route('register')}}">
                                    <i class="fa fa-address-card-o me-1"></i>
                                    <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Register Here">Sign Up</p>
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
                
                
            </ul>
        </div>
    </div>
</nav>