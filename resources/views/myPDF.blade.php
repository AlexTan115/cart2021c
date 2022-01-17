<head>
    <tittle></tittle>Southern Online
</head>
<body>
    <div>
<table class="table table-bordered">
        	<thead>
        		<tr>
        			<td>Order ID</td>
        			<td>Payment Status</td>
                    <td>amount</td>
                
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($data as $order)
        		<tr>
        			<td>{{$order->id}}</td>
                    <td>{{$order->paymentStatus}}</td>
                    <td>{{$order->amount}}</td>
        		</tr>
        		@endforeach

               
        	</tbody>
        </table>
</div>
</body>
