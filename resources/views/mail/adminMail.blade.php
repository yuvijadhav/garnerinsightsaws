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
	<h4>Dear Admin,</h4>
	<br>
	<br>
	<table>
		<tr>
			<td>Report Title</td>
			<td>: <a href="http://garnerinsights.com/{{$url}}">{{$url}}</a></td>
		</tr>
		<tr>
			<td>Name</td>
			<td>: {{$name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>: {{$email}}</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>: {{$mobile}}</td>
		</tr>
		<tr>
			<td>Enquiry Company</td>
			<td>: {{$enquiry_company}}</td>
		</tr>
		<tr>
			<td>Designation</td>
			<td>: {{$designation}}</td>
		</tr>
		<tr>
			<td>Country</td>
			<td>: {{$country}}</td>
		</tr>
		<tr>
			<td>Source</td>
			<td>: {{$source}}</td>
		</tr>
		<tr>
			<td>Message</td>
			<td>: {{$report_pages}}</td>    
		</tr>
		<tr>
			<td>Message</td>
			<td>: {{$description}}</td>    
		</tr>
		<tr>
			<td>IP Address:</td>
			<td>: {{$ip}}</td>    
		</tr>
	</table>
</body>
</html>





















