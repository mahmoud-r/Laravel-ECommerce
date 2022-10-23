

@section('style')
@endsection

@section('title')
{{__('front.Addresses')}}
@endsection

@section('description')

@endsection
@section('nav')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">{{__('front.Home')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('profile')}}">
                            <span itemprop="name">{{__('front.MY ACCOUNT')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('address.index')}}">
                            <span itemprop="name">{{__('front.Addresses')}}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>
@endsection

@section('content')

    <section id="content" class="page-content">
        <a href="{{route('address.create')}}" class="btn btn-primary">
            {{__('front.Create  New address')}}
        </a>
        <h2 class="mt-20">Your Address</h2>
        @forelse($addresses as $address)
            <div class="row vendor-content-detail" style="padding-left: 20px; margin-top: 15px ;margin-bottom: 15px">
                <div class="content-seller-vendor">

                    <div class="ps-vendor-fullname">
                        <p>{{$address->first_name}} {{$address->last_name}}</p>
                    </div>
                    <div class="ps-vendor-detail">
                        <p><i class="fa fa-fw fa-map-marker"></i><label><b> {{__('front.City : ')}} </b>{{$address->City}}</label></p>
                    </div>
                    <div class="ps-vendor-detail" style="text-overflow: ellipsis;overflow: hidden">
                        <p ><i class="fa fa-fw fa-map-marker" ></i><label><b> {{__('front.Address : ')}} </b>{{$address->address}}</label></p>
                    </div>
                    <div class="ps-vendor-detail">
                        <p><i class="fa fa-fw fa-phone"></i><label><b> {{__('front.Phone : ')}}</b> {{$address->phone}}</label></p>
                    </div>
                    <div class="ps-vendor-detail">
                        <p><i class="fa fa-fw fa-phone"></i><label><b> {{__('front.Other Phone : ')}} </b>{{$address->other_phone}}</label></p>
                    </div>
                    <div class="ps-vendor-detail">
                        <a href="{{route('address.edit',$address->id)}}" class="btn btn-primary">
                            {{__('front.Edit')}}
                        </a>
                        <form action="{{route('address.destroy',$address->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="account-link btn btn-danger ">
                                {{__('front.Delete')}}
                            </button>
                        </form>


                    </div>


                </div>
            </div>

        @empty
            <div class="alert alert-success"> {{__('front.Address is empty')}}</div>
        @endforelse

    </section>
    <footer class="page-footer">



        <a href="{{route('profile')}}" class="account-link btn btn-primary">
            <i class="material-icons">&#xE5CB;</i>
            {{__('front.Back to your account')}}
        </a>
        <a href="{{route('home')}}" class="account-link btn btn-secondary">
            <i class="material-icons">&#xE88A;</i>
            {{__('front.Home')}}
        </a>



    </footer>

@endsection

@section('script')

@endsection


@include('front.master')
