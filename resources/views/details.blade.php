
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
<button type="submit" class="btn btn-outline-success btn-lg"><a href="{{ route('office')}}" class="link-product-add-cart" >Office</a></button>
<div class="container">
  <h2>Attendance System</h2>
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>UserName</th>
        <th>UserId</th>
        <th>IP</th>
		<th>Region Name</th>
		<th>City Name</th>
		<th>Zipcode</th>
		<th>Action</th>
      </tr>
    </thead>
	@foreach ($users as $user)
    <tbody>
      <tr>
	  
        <td class="row-data">{{ $user->name }} </td>
        <td >{{$user->id }}</td>
        <td>{{ $data->ip }}</td>
		<td>{{ $data->regionName }}</td>
		<td>{{ $data->cityName }}</td>
		<td>{{ $data->zipCode }}</td>
		<td>
		@if($user->status=='rejected')
		<button type="submit" class="btn btn-outline-success btn-lg"><a href="{{ route('accept',$user->id)}}" class="link-product-add-cart" >Accept</a></button>
     @else
     <button type="submit" class="btn btn-outline-danger btn-lg"><a href="{{ route('reject',$user->id)}}" class="link-product-add-cart" >Reject</a></button>
   @endif
    </td>
</tr>
      
    </tbody>
	@endforeach
</table>
</div>
</body>
</html>
