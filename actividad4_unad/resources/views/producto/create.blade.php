@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/producto')}}" method="post">
    @csrf
    @include('producto.form',['modo'=>'Guardar'])
    </form>
</div>
@endsection