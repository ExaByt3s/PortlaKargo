<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<title>{{Auth::user()->company->name ?? ''}}</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<style type="text/css">
			body{
				font-size:9px;
			}
		</style>
	</head>
	<body>
		<center><h1>Invoice</h1></center>
		<center><img style="height:80px" src="{{url($barcode)}}"></center>
		<br>
		<center><h4>{{ $company->name }}</h4></center>
		<table class="table-bordered" style="width:100%">
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Tel 1: </b></td>
				<td style="padding:0 15px 0 15px;">{{$company->phone}}</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Tel 2: </b></td>
				<td style="padding:0 15px 0 15px;">{{$company->second_phone ?? ''}}</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Instagram </b></td>
				<td style="padding:0 15px 0 15px;">{{$company->instagram ?? ''}}</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Address: </b></td>
				<td style="padding:0 15px 0 15px;">{{$company->address}}</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Email </b></td>
				<td style="padding:0 15px 0 15px;">{{$company->email}}</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>User</b></td>
				<td style="padding:0 15px 0 15px;">{{ Auth::user()->name }}</td>
			</tr>
		</table>
		
		
		<table class="table-bordered" style="width:100%">
			<input type="hidden" name="sender_id"
			value="{{$cargo->sender->id}}">
			<tr>
				<td class="text-center" style="padding:5px;" colspan="2">
					<b>Sender Info</b>
				</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Date</b> </td>
				<td style="padding:0 15px 0 15px;">{{$cargo->sender->created_at ?? ''}}</td>
			</tr>
			{{-- sender name --}}
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Full Name</b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->sender->name}}</td>
			</tr>
			
			{{-- sender phone --}}
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Telefon</b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->sender->phone}}</td>
			</tr>
		</table>
		{{-- receiver info --}}
		<br>
		<table class="table-bordered" style="width:100%">
			
			<tr>
				<td class="text-center" style="padding:5px;" colspan="2">
					<b>Receiver Info</b>
				</td>
			</tr>
			
			{{-- Receiver name --}}
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Full Name</b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->receiver->name}}</td>
			</tr>
			{{-- receiver passport --}}
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Passport</b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->receiver->passport}}</td>
			</tr>
			{{-- sender phone --}}
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Telefon: 1 </b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->receiver->phone}}
				</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Telefon: 2 </b></td>
				<td style="padding:0 15px 0 15px;">
					{{ $cargo->receiver->other_phone ?? ' '}}
				</td>
			</tr>
			<tr>
				<td style="padding:0 15px 0 15px;"><b>Address </b></td>
				<td style="padding:0 15px 0 15px;">
					{{$cargo->receiver->address}}
				</td>
			</tr>
		</table>
		{{-- cargo info --}}
		
		<table class="table-bordered" style="width:100%">
			<input type="hidden" name="cargo_id"
			value="{{$cargo->id}}">
			<tr>
				<td class="text-center" style="padding:5px;" colspan="2"><b>Cargo Info</b></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><h1>{{$cargo->number ?? ''}}</h1></td>
			</tr>
			<tr>
				<td><b>Cargo Kg</b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->total_kg}}</td>
			</tr>
			<tr>
				<td><b>Shipping fee</b></td>
				<td style="padding:0 15px 0 15px;">{{$cargo->cargo_price}}</td>
			</tr>
			<tr>
				<td><b>Payment type</b></td>
				<td style="padding:0 15px 0 15px;">
					{{$cargo->payment_type == 1 ? "Sender Pays":""}}
					
					
					{{$cargo->payment_type == 2 ? "Receiver Pays":""}}
					
				</td>
			</tr>
		</table>
		
		<br>
		<table class="table-bordered" style="width:100%;" >
			<tr>
				<td style="padding-left: 15px;padding-right: 15px;">No:</td>
				<td style="padding-left: 15px;padding-right: 15px;">NAME</td>
				<td style="padding-left: 15px;padding-right: 15px;">Qty</td>
				<td style="padding-left: 15px;padding-right: 15px;">All something</td>
				<td style="padding-left: 15px;padding-right: 15px;">Gross weight</td>
				<td style="padding-left: 15px;padding-right: 15px;">???????? ???? ????.</td>
				<td style="padding-left: 15px;padding-right: 15px;">????????</td>
			</tr>
			
			<?php $key = 0; for($i=1; $i<21; $i++){ ?>
			<tr>
				<input type="hidden" name="product_id"
				value="{{ $products[$key]->id ?? '' }}">
				<td style="padding-left: 15px; padding-right: 15px">{{ $i }}</td>
				<td style="padding-left: 15px;padding-right: 15px">
				{{ $products[$key]->name ?? ''}}</td>
				<td style="padding-left: 15px;padding-right: 15px;">{{ $products[$key]->count ?? ''}}</td>
				<td style="padding-left: 15px;padding-right: 15px;">
				{{ $products[$key]->product_kg ?? ''}}</td>
				<td style="padding-left: 15px;padding-right: 15px;">
				{{ $products[$key]->product_total_kg ?? ''}}</td>
				<td style="padding-left: 15px;padding-right: 15px;">
					{{ $products[$key]->cost ?? ''}}
				</td >
				<td style="padding-left: 15px;padding-right: 15px;">{{ $products[$key]->total ?? '-'}}</td>
			</tr>
			<?php $key++; } ?>
			<tr>
				<td style="padding-left: 15px;padding-right: 15px;" colspan="5" rowspan="2">
					<p>Decelaration Statment. I hereby certify that the information in this invoice is true and correct and the contents and value of this shipment is a stated above</p>
				</td>
				<td style="padding-left: 15px;padding-right: 15px;" >
				<center><h6>TOTAL WEIGHT </h6></center></td>
				<td style="padding-left: 15px;padding-right: 15px;" colspan="2">
					<h6>{{$cargo->total_kg ?? '0'}} KG</h6>
				</td>
			</tr>
			<tr>
				
				<td style="padding-left: 15px;padding-right: 15px;" >
				<center><h6>TOTAL PRICE </h6></center></td>
				<td style="padding-left: 15px;padding-right: 15px;" colspan="2">
					<h6>{{$cargo->total_price ?? '0'}} $</h6>
				</td>
			</tr>
		</table>
		
		<script type="text/javascript">
		window.print();
		</script>
	</body>
</html>