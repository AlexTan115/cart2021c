@extends('layout')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@CSRF
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<td>Order ID</td>
        			<td>Payment Status</td>
                    <td>amount</td>
                
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($orders as $order)
        		<tr>
        			<td>{{$order->id}}</td>
                    <td>{{$order->paymentStatus}}</td>
                    <td>{{$order->amount}}</td>
        		</tr>
        		@endforeach

               
        	</tbody>
        </table>
    </div>
    <div class="col-sm-3"></div>
 
</div>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-10"><a class="btn btn-xs btn-info"href="{{(route('pdfReport'))}}">Download Report</a></div>
</div>  
</form>


@endsection
    