{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <th>Description</th>
        <th>ผู้รับแจ้ง</th>
        <th>Status</th>
    </tr>
    @foreach( $requests as $request)
    <tbody>
            <td>{{ $request->created_at}}</td>
            <td>{{ $request->room_id}}</td>
            <td>{{ $request->description}}</td>
            <td>{{ $request->fullname}}</td>
            <td>
            @if ($request->status === 'finished')
              <span class="badge badge-success rounded-pill d-inline">finished</span>
            @elseif ( $request->status === 'unfinished')
              <span class="badge rounded-pill badge-danger">unfinished</span>
            @endif
            </td>
    </tbody>
    @endforeach
  </thead>
</table>
{{-- </body>
</html> --}}