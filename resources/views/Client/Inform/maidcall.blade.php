{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/maid.css')}}">
=======
>>>>>>> f47b8a8254e57f30632debee8d583a66a8962757
    <title>Document</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
</head>
<body> --}}

    <table class="table table-striped">
  <thead class="table-dark">
    <tr>
        <th>Created At</th>
        <th>Room</th>
        <th>Clean Date</th>        
        <th>Maid Name</th>        
        <th>Status</th>
    </tr>
    @foreach( $calls as $call)
    <tbody>
            <td>{{ $call->created_at}}</td>
            <td>{{ $call->room_id}}</td>
            <td>{{ $call->clean_date}}</td>
            <td>{{ $call->fullname}}</td>
            <td>
                @if ($call->status === 'finished')
                  <span class="badge badge-success rounded-pill d-inline">cleaned</span>
                @elseif ( $call->status === 'unfinished')
                  <span class="badge rounded-pill badge-danger">unsuccess</span>
                @endif
                </td>
    </tbody>
    @endforeach
  </thead>
{{-- </table>
</body>
</html> --}}