<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="align-items: center;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img class="img-fluid" src="{{URL('design/front/images/flags/'). '/'.LaravelLocalization::getCurrentLocale().'.jpg'}}" alt="{{LaravelLocalization::getCurrentLocale() =='ar' ?'عربي':'English'}}" width="16" height="11"/>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <!-- Message Start -->
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <img class="img-fluid" src="{{URL('design/front/images/flags/'). '/'.$localeCode.'.jpg'}}" alt="{{$localeCode =='ar' ?'عربي':'English'}}" width="16" height="11"/>
                                <span>
                                @if($localeCode == 'ar')
                                        اللغة العربية
                                    @else
                                        English
                                    @endif

                             </span>
                            </a>
                        <!-- Message End -->
                    @endforeach

                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="nav-icon fas fa-cogs"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right text-center">
                    <div class="custom-control custom-switch dropdown-item ">
                        <input class="custom-control-input" type="checkbox" value="1" role="switch" id="darkmode" >
                        <label class="custom-control-label" for="darkmode">Dark Mode</label>
                    </div>
                </div>
            </li>

    </ul>
</nav>
<!-- /.navbar -->



<!-- Content Wrapper. Contains page content -->
@include('admin.layouts.menu')

