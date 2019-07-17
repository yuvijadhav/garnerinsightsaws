<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {

			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>
	<center>
	<div style="width: 50%;background-color: #eee;">
			<h4>Below user had filled the form details on payment page for {{$source}}.</h4>
			<br>
			<br>
			<table>
				<tr>
					<td>Report ID</td>
					<td>: {{$report_id}}</td>
				</tr>
				<tr>
					<td>Report Title</td>
					<td>: <a href="http://garnerinsights.com/{{$url}}">{{$report_title}}</a></td>
				</tr>
				<tr>
					<td>Report Amount</td>
					<td>: {{$amount}}</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>: {{$first_name}} {{$last_name}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>: {{$email}}</td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>: {{$pre}} {{$phone_no}}</td>
				</tr>
				<tr>
					<td>Company</td>
					<td>: {{$company}}</td>
				</tr>
				<tr>
					<td>Designation</td>
					<td>: {{$designation}}</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>: {{$address}}</td>    
				</tr>
				<tr>
					<td>City</td>
					<td>: {{$city}}</td>
				</tr>
				<tr>
					<td>State</td>
					<td>: {{$state}}</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>: {{$country}}</td>
				</tr>
				<tr>
					<td>Zip</td>
					<td>: {{$zip}}</td>
				</tr>
				<tr>
					<td>IP</td>
					<td>: {{$ip}}</td>
				</tr>
			</table>
		</div>
	</center>
</body>
</html>










