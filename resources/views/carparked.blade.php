<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance Manegment System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <body>
<h2>Car Parked</h2>
     <br>
  <div class="row">
    <div class="cl-md-6">
      
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>UserName</th>
        <th>Mobile No</th>
        <th>slots</th>
      </tr>
    </thead> 
	@foreach ($parks as $park)
    <tbody>
      <tr>
	  
       
        <td class="row-data" >{{$park->username}}</td>
        <td class="row-data">{{ $park->mobno }}</td>
		<td class="row-data">{{ $park->slots }}</td>
</tr>
      
    </tbody>
	@endforeach
</table>
</div>
</div>
</body>
</html>