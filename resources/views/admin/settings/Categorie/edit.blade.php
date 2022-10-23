@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.edit')}} {{$categorie->name}}
@endsection

@section('page')
    {{$categorie->name}}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('categorie.index')}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$categorie->name}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- form start -->
                <form action="{{route('categorie.update',$categorie->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="card-body">

                    <div class="form-group mb-1">
                        <label for="exampleInputText">{{__('admin.name')}}</label>
                        <input type="text" name="name" value="{{$categorie->getTranslation('name' ,'en')}}" class="form-control " placeholder="{{__('admin.name')}}">
                    </div>
                    @error('name')
                    <div class="text-danger mb-3 ">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-1">
                        <label for="exampleInputText">{{__('admin.name_ar')}}</label>
                        <input type="text" name="name_ar" value="{{$categorie->getTranslation('name' ,'ar')}}" class="form-control " placeholder="{{__('admin.name_ar')}}">
                    </div>
                    @error('name_ar')
                    <div class="text-danger mb-3 ">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-1">
                        <label for="exampleInputEmail">{{__('admin.description')}}</label>
                        <textarea name="description" class="form-control " rows="3" value="{{$categorie->getTranslation('description' ,'en')}}" placeholder="{{__('admin.description')}}"></textarea>
                    </div>
                    @error('description')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-1">
                        <label for="exampleInputEmail">{{__('admin.description_ar')}}</label>
                        <textarea name="description_ar" class="form-control " rows="3" value="{{$categorie->getTranslation('description' ,'ar')}}" placeholder="{{__('admin.description_ar')}}"></textarea>
                    </div>
                    @error('description_ar')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary mt-3 mb-3">{{__('admin.edit')}}</button>
                    </div>

                </form>

            </div>
        </div>
@endsection
