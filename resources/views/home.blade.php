@extends('layouts.master')

@section('title', "Delargo PH")
@section('username', $customer->username)

@section('orders')
    @if(empty($orders))
        <div>You don't have any cart lists</div>
    @endif
@endsection

@section('content')
    Congrats!
@endsection
