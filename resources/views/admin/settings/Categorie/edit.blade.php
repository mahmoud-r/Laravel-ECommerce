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
    <form action="{{route('categorie.update',$categorie->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group mb-1">
            <label for="exampleInputText">{{__('admin.name')}}</label>
            <input type="text" name="name" value="{{$categorie->name}}" class="form-control " placeholder="{{__('admin.name')}}">
        </div>
        @error('name')
        <div class="text-danger mb-3 ">{{ $message }}</div>
        @enderror

        <div class="form-group mb-1">
            <label for="exampleInputEmail">{{__('admin.description')}}</label>
            <textarea name="description" class="form-control " rows="3" value="{{$categorie->description}}" placeholder="{{__('admin.description')}}"></textarea>
        </div>
        @error('description')
        <div class="text-danger mb-3">{{ $message }}</div>
        @enderror

        <div class="form-group mb-1">
            <label for="exampleInputPassword">{{__('admin.Image')}}</label>
            <img src="{{URL('images/categorie').'/'.$categorie->image}}" height="50px">
            <input type="file" name="image"  class="form-control " placeholder="{{__('admin.Image')}}">

        </div>
        @error('image')
        <div class="text-danger mb-3">{{ $message }}</div>
        @enderror

            <button type="submit" class="btn btn-primary mt-3 mb-3">{{__('admin.edit')}}</button>

    </form>
@endsection
