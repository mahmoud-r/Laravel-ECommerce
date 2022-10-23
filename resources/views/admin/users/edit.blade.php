@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.edit')}} {{$user->name}}
@endsection

@section('page')
    {{$user->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('users')}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{__('admin.edit')}} {{$user->name}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- form start -->
                <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5 required">
                                        Name :
                                    </label>
                                    <div class="col-md-6">

                                        <input
                                            class="form-control"
                                            name="name"
                                            type="text"
                                            value="{{$user->name}}"
                                            required
                                            autocomplete="name" autofocus
                                            placeholder="Name"
                                            @error('name') is-invalid @enderror">

                                    </div>

                                    <div class="col-md-4 form-control-comment right">
                                    </div>
                                </div>


                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5 required">
                                        Email :
                                    </label>
                                    <div class="col-md-6">

                                        <input
                                            class="form-control"
                                            name="email"
                                            type="email"
                                            value="{{$user->email}}"
                                            required
                                            placeholder="Email"
                                            @error('email') is-invalid @enderror">

                                    </div>

                                    <div class="col-md-4 form-control-comment right">
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5">
                                        New password :
                                    </label>
                                    <div class="col-md-6">

                                        <div class="input-group js-parent-focus">
                                            <input
                                                class="form-control js-child-focus js-visible-password"
                                                name="new_password"
                                                type="password"
                                                value=""
                                                pattern=".{5,}"
                                                placeholder="New password"
                                                @error('new_password') is-invalid @enderror" >


                                        </div>


                                    </div>

                                    <div class="col-md-4 form-control-comment right">
                                        (Optional)
                                    </div>

                                </div>

                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5">
                                        password Confirmation :
                                    </label>
                                    <div class="col-md-6">

                                        <div class="input-group js-parent-focus">
                                            <input
                                                class="form-control js-child-focus js-visible-password"
                                                name="new_password_confirmation"
                                                type="password"
                                                value=""
                                                pattern=".{5,}"
                                                placeholder="password Confirmation"
                                                @error('password_confirmation') is-invalid @enderror" >


                                        </div>


                                    </div>

                                    <div class="col-md-4 form-control-comment right">
                                        (Optional)
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100"> {{__('admin.update')}}</button>
                    </div>
                </form>


            </div>

@endsection


