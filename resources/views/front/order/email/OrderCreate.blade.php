@component('mail::message')

   <h2> your order number #{{$order->order_number}}</h2>
   @foreach($order->items as $item)
       <ul >
           <li >
               <a href="{{route('product',$item->products->id)}}">{{$item->product_name}}</a>
           </li>
           <li class="bold text-center">
               {{$item->quantity}}
           </li>
           <li class="text-center"> {{$item->price}}</li>
           <li class="text-center">{{$item->sum_price}}</li>
       </ul>
   @endforeach


@component('mail::button', ['url' => route('home')])
    continue shopping
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
