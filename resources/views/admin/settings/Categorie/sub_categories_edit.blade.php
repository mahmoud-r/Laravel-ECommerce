@extends('admin.layouts.master')

@section('tittle')
    {{__('admin.edit')}} {{$sub_categorie->name}}
@endsection

@section('page')
    {{$sub_categorie->name}}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('categorie.show',$sub_categorie->categorie->id) }}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
    <form action="{{route('sub_categories.update',$sub_categorie->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
            <input type="hidden" value="{{$sub_categorie->categorie->id}}" name="categorie_id">

        <div class="form-group mb-1">
            <label for="exampleInputText">{{__('admin.name')}}</label>
            <input type="text" name="name" value="{{$sub_categorie->getTranslation('name' ,'en')}}" class="form-control " placeholder="{{__('admin.name')}}">
        </div>
        @error('name')
        <div class="text-danger mb-3 ">{{ $message }}</div>
        @enderror

        <div class="form-group mb-1">
            <label for="exampleInputText">{{__('admin.name_ar')}}</label>
            <input type="text" name="name_ar" value="{{$sub_categorie->getTranslation('name' ,'ar')}}" class="form-control " placeholder="{{__('admin.name_ar')}}">
        </div>
        @error('name_ar')
        <div class="text-danger mb-3 ">{{ $message }}</div>
        @enderror


            <button type="submit" class="btn btn-primary mt-3 mb-3">{{__('admin.edit')}}</button>

    </form>
@endsection
