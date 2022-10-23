@section('style')
    @include('admin.layouts.datatable.datatable_css')
@endsection
@extends('admin.layouts.master')

@section('tittle')
    Settings
@endsection

@section('page')
    Settings
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row user">
                                <div class="col-md-3">
                                    <div class="tile p-0">
                                        <ul class="nav flex-column nav-tabs user-tabs">
                                            <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">Social Links</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact_us" data-toggle="tab">contact us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="general">
                                            @include('admin.controll.setting.genral')
                                        </div>
                                        <div class="tab-pane fade" id="site-logo">
                                            @include('admin.controll.setting.logo')
                                        </div>

                                        <div class="tab-pane fade" id="social-links">
                                            @include('admin.controll.setting.social_links')
                                        </div>
                                        <div class="tab-pane fade" id="contact_us">
                                            @include('admin.controll.setting.cuntact_us')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#contact_us_desc').summernote();
        });
    </script>
@endsection
