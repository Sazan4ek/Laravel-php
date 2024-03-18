@extends('mails.order.layout')
@section('main')
    <p>
        Unfortunately, your order with the number {{ $orderNumber }} was cancelled! 
        <br>
        But you can <a href='#'>report the problem</a>
    </p>
@endsection