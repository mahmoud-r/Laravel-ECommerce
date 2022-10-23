@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.edit')}}
@endsection

@section('page')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('user.addresses',$address->id)}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> {{__('admin.edit')}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- form start -->
                <form action="{{route('addresses.update',$address->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5 required">
                                        First Name :
                                    </label>
                                    <div class="col-md-6">

                                        <input
                                            class="form-control"
                                            name="first_name"
                                            type="text"
                                            value="{{$address->first_name}}"
                                            required
                                            autocomplete="name" autofocus
                                            placeholder="first_name"
                                            @error('first_name') is-invalid @enderror">

                                    </div>

                                    <div class="col-md-4 form-control-comment right">
                                    </div>
                                </div>


                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5 required">
                                        Last Name :
                                    </label>
                                    <div class="col-md-6">

                                        <input
                                            class="form-control"
                                            name="last_name"
                                            type="text"
                                            value="{{$address->last_name}}"
                                            required
                                            placeholder="Last Name"
                                            @error('last_name') is-invalid @enderror">

                                    </div>

                                    <div class="col-md-4 form-control-comment right">
                                    </div>
                                </div>

                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5">
                                        City :
                                    </label>
                                    <div class="col-md-6">

                                        <div class="input-group js-parent-focus">
                                            <input
                                                class="form-control js-child-focus js-visible-password"
                                                name="City"
                                                type="text"
                                                value="{{$address->City}}"
                                                pattern=".{5,}"
                                                placeholder="City"
                                                required
                                                @error('City') is-invalid @enderror" >


                                        </div>


                                    </div>


                                </div>

                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5">
                                        Address :
                                    </label>
                                    <div class="col-md-6">

                                        <div class="input-group js-parent-focus">
                                            <input
                                                class="form-control js-child-focus js-visible-password"
                                                name="address"
                                                type="text"
                                                value="{{$address->address}}"
                                                pattern=".{5,}"
                                                placeholder="Address"
                                                required
                                                @error('address') is-invalid @enderror" >


                                        </div>


                                    </div>


                                </div>


                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5">
                                        Phone :
                                    </label>
                                    <div class="col-md-6">

                                        <div class="input-group js-parent-focus">
                                            <input
                                                class="form-control js-child-focus js-visible-password"
                                                name="phone"
                                                type="text"
                                                value="{{$address->phone}}"
                                                pattern=".{5,}"
                                                placeholder="Phone"
                                                required
                                                @error('address') is-invalid @enderror" >


                                        </div>


                                    </div>


                                </div>

                                <div class="form-group row no-gutters">
                                    <label class="col-md-2 form-control-label mb-xs-5">
                                        Other Phone :
                                    </label>
                                    <div class="col-md-6">

                                        <div class="input-group js-parent-focus">
                                            <input
                                                class="form-control js-child-focus js-visible-password"
                                                name="other_phone"
                                                type="text"
                                                value="{{$address->other_phone}}"
                                                pattern=".{5,}"
                                                placeholder="Other Phone"
                                                @error('other_phone') is-invalid @enderror" >


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
        </div>
    </div>





@endsection


