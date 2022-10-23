@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.edit')}} {{$brand->name}}
@endsection

@section('page')
    {{$brand->name}}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('brand.index')}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$brand->name}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- form start -->
                <form action="{{route('brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group mb-1">
                            <label for="exampleInputText">{{__('admin.name')}}</label>
                            <input type="text" name="name" value="{{$brand->getTranslation('name' ,'en')}}" class="form-control " placeholder="{{__('admin.name')}}">
                        </div>
                        @error('name')
                        <div class="text-danger mb-3 ">{{ $message }}</div>
                        @enderror
                        <div class="form-group mb-1">
                            <label for="exampleInputText">{{__('admin.name_ar')}}</label>
                            <input type="text" name="name_ar" value="{{$brand->getTranslation('name' ,'ar')}}" class="form-control " placeholder="{{__('admin.name_ar')}}">
                        </div>
                        @error('name_ar')
                        <div class="text-danger mb-3 ">{{ $message }}</div>
                        @enderror



                        <div class="form-group mb-1">
                            <label for="exampleInputPassword">{{__('admin.Image')}}</label>
                            <img src="{{URL('images/brand').'/'.$brand->image}}" height="50px">
                            <input type="file" name="image"  class="form-control " placeholder="{{__('admin.Image')}}">

                        </div>
                        @error('image')
                        <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                        <div class="card-footer">
                         <button type="submit" class="btn btn-primary mt-3 mb-3 w-100">{{__('admin.edit')}}</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
@endsection
