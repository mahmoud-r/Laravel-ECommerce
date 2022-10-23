

@section('style')
@endsection

@section('title')
{{__('front.Orders')}}
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
                            <span itemprop="name">{{__('front.Orders')}}</span>
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

        <div id="mywishlist">

            <h1 class="page-title">{{__('front.Orders History')}}</h1>

            <div id="block-history" class="block-center">
                <table class="std table">
                    <thead>
                    <tr >
                        <th class="first_item">{{__('front.Order Number')}}</th>
                        <th class="item mywishlist_first">{{__('front.Date')}}</th>
                        <th class="item mywishlist_second">{{__('front.Status')}}</th>
                        <th class="last_item mywishlist_first">{{__('front.View')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                    <tr id="wishlist_59">
                        <td style="width:200px;">
                           #{{$order->order_number}}
                        </td>
                        <td class="bold align_center">
                            {{$order->created_at->toDateString()}}
                        </td>
                        <td class="wishlist_default font-weight-bold
                        @if($order->status->last()->status == 'pending')
                                            text-secondary
                                            @elseif($order->status->last()->status == 'accept')
                                            text-warning
                                            @elseif($order->status->last()->status == 'shipping')
                                           text-info
                                            @elseif($order->status->last()->status == 'return')
                                            text-warning
                                            @elseif($order->status->last()->status == 'complete')
                                             text-success
                                            @elseif($order->status->last()->status == 'cancel')
                                            text-danger
                                            @endif
                        " >{{$order->status->last()->status}}</td>
                        <td class="wishlist_delete">
                            <a href="{{route('profile.orders.show',$order->id)}}">{{__('front.View')}}</a>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div id="block-order-detail">&nbsp;</div>


        </div>

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
