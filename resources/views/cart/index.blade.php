@extends('user.layouts.index')
@section('main')
<style type="text/css">
    .time, #subtotal, #price { border:none }
    .time:focus, #subtotal:focus, #price:focus { outline: none }
</style>
<div id="colorlib-main">
    <section class="ftco-section">
        <h2>{{__('Your Cart') }}</h2>
        <div class="container">
            <div class="ro px-md-4">
            
            <hr>
    
             <table class="table">
                <thead>
                    <tr>
                        <th>{{__('Car Name') }}</th>
                        <th>{{__('Price') }}</th>
                        <th>{{__('Time') }}</th>
                        <th>{{__('Update') }}</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td><input type="text" name="" id="price" value="{{$item->price}}" ></td>

                        <td>
                            <!-- <input name="quantity" class="form-control time" type="number" min=1 value="{{ $item->quantity }}"> -->

                            <input type="number" name="" class="time" placeholder="{{$item->quantity}}" value="{{$item->quantity}}" min='1'>
                        </td>
                        <td>
                            <a href="{{route('cart.destroy', $item->id)}}" role="button">{{__('Delete') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="success">
                {{-- display success message --}}
                @if(session()->has('message'))
                <div class="alert alert-success text-center" role="alert">
                 {{session('message')}}
             </div>
             @endif

             {{-- display error message --}}

             @if(session()->has('error'))
             <div class="alert alert-danger text-center" role="alert">
                {{session('error')}}
            </div>
            @endif
        </div>
        <div>
            <form action="{{route('cart.coupon')}}" method='get'>
                <input id="coupon_code" class="input-text" name="coupon_code" value=""placeholder="Code" type="text" required>
                <input class="button" name="apply_coupon" value="Confirm" type="submit">
            </form>
        </div>

        <div>
            <h2>Cart totals</h2>
            <ul>
                <li>{{__('SubTotal') }}: <span><input  id='subtotal' type="text" name="" value="{{\Cart::session(auth()->id())->getSubTotal()}} VNĐ"></span></li>
                <li>{{__('Total') }}: <span>{{\Cart::session(auth()->id())->getTotal()}}</span></li>
            </ul>
            <a href="{{route ('cart.checkout')}}">{{__('CheckOut') }}</a>
        </div>
    </div>
</div>
</section>
</div><!-- END COLORLIB-MAIN -->
<script type="text/javascript">
    $('.time').on('change',function(){
        
        const value = $('.time').val() * $('#price').val()
        
        $('#subtotal').val(value+' VND')
    })
</script>

@endsection




