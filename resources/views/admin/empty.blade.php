@extends('admin.layouts.master')

@section('tittle')
    Admins
@endsection

@section('page')
    admin
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('admin.index')}}"> {{__('admin.Back')}}</a>
            </div>
        </div>
    </div>
@endsection
