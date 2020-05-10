  
@extends('layouts.admin')
@section('content')
  
@if(Auth()->User()->account_type == 'admin')
<h1>Dashboard buyer list, order list, permission</h1>
@else
<h1>You are editor</h1>
@endif
      
@endsection