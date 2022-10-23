

@section('style')
@endsection

@section('title')
    #{{$order->order_number}}
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

            <h1 class="page-title">{{__('front.order')}}</h1>

            <div id="block-history" class="block-center">
                <table class="std table">
                    <thead>
                        <tr>
                            <th  class="text-center">{{__('front.Order Number')}}</th>
                            <th  class="text-center">{{__('front.Date')}}</th>
                            <th  class="text-center">{{__('front.Shipping Method')}}</th>
                            <th  class="text-center">{{__('front.Status')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td  class="text-center">#{{$order->order_number}}</td>
                        <td  class="text-center">{{$order->created_at->toDateString()}}</td>
                        <td  class="text-center">{{$order->shipping_method}}</td>
                        <td  class="text-center">{{$order->status->last()->status}}</td>
                    </tr>
                    </tbody>

                </table>
                <table class="std table">
                    <thead>
                        <tr>
                            <th  class="text-center" colspan="5">{{__('front.Address')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td  class="text-center">{{$order->address->first_name}}</td>
                        <td  class="text-center">{{$order->address->City}}</td>
                        <td  class="text-center">{{$order->address->address}}</td>
                        <td  class="text-center">{{$order->address->phone}}</td>
                        <td  class="text-center">{{$order->address->other_phone}}</td>
                    </tr>
                    </tbody>

                </table>

                <table class="std table">
                    <thead>
                    <tr>
                        <th class="first_item">{{__('front.Product Name')}}</th>
                        <th class="item mywishlist_first text-center">{{__('front.QTY')}}</th>
                        <th class="item mywishlist_first text-center" >{{__('front.Price')}}</th>
                        <th class="item mywishlist_second text-center">{{__('front.Total')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->items as $item)
                    <tr id="wishlist_59">
                        <td >
                            <a href="{{route('product',$item->products->id)}}">{{$item->product_name}}</a>
                        </td>
                        <td class="bold text-center">
                            {{$item->quantity}}
                        </td>
                        <td class="text-center"> {{$item->price}}</td>
                        <td class="text-center">{{$item->sum_price}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                    <tfoot style="background-color: #2d9ae8 ; color: white;font-weight: bold;text-align: center">
                    <tr>
                        <td style="background-color: white"></td>
                        <td colspan="2">{{__('front.Sub Total')}}</td>
                        <td colspan="1">{{$order->subtotal}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: white"></td>
                        <td colspan="2">{{__('front.Tax')}}</td>
                        <td colspan="1">{{$order->tax}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: white"></td>
                        <td colspan="2">{{__('front.Shipping')}}</td>
                        <td colspan="1">{{$order->shipping}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: white"></td>
                        <td colspan="2">{{__('front.Total')}}</td>
                        <td colspan="1">{{$order->total}}</td>
                    </tr>
                    </tfoot>
                </table>
                <table class="std table">
                    <thead>
                    <tr>
                        <th  class="text-center" colspan="">{{__('front.status')}}</th>
                        <th  class="text-center" colspan="">{{__('front.note')}}</th>
                        <th  class="text-center" colspan="">{{__('front.Date')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->status as $status)
                    <tr>
                        <td  class="text-center font-weight-bold
                        @if($status->status == 'pending')
                                            text-secondary
                                            @elseif($status->status == 'accept')
                                            text-warning
                                            @elseif($status->status == 'shipping')
                                           text-info
                                            @elseif($status->status == 'return')
                                            text-warning
                                            @elseif($status->status == 'complete')
                                             text-success
                                            @elseif($status->status == 'cancel')
                                            text-danger
                                            @endif
                        ">{{$status->status}}</td>
                        <td  class="text-center">{{$status->pivot->note}}</td>
                        <td  class="text-center">{{$status->pivot->date}}</td>
                    </tr>
                    @endforeach
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
