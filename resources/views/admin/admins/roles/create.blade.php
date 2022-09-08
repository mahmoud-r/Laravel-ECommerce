@extends('admin.layouts.master')

@section('tittle')
{{(__('admin.Create_New_Role'))}}
@endsection

@section('page')
    {{(__('admin.Create_New_Role'))}}
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>



    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group ">
                <strong >{{__('admin.name')}}</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong >{{__('admin.Permission')}}</strong>
                <br/>
                @foreach($permission as $value)
                    <label class="mt-2">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{__('admin.add')}}</button>
        </div>
    </div>
    {!! Form::close() !!}




@endsection
