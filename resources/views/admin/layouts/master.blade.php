@include('admin.layouts.header')
@include('admin.layouts.nav')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{URL('/design/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @include('admin.layouts.message')
                    <h1 class="m-0">@yield('tittle')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('control_panel')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">@yield('page')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                @yield('content')
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@include('admin.layouts.footer')
@yield('script')

<script>
    $(function (){
        $('#darkmode').change(function (e){
            e.preventDefault()
            if(this.checked) {
               $('body').addClass('dark-mode')
            }else{
                $('body').removeClass('dark-mode')
            }
        })
    })
</script>
