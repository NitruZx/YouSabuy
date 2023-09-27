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
        <th>Admin</th>
    </tr>
    @foreach( $reports as $report)
    <tbody>
            <td>{{ $report->created_at}}</td>
            <td>{{ $report->room_id}}</td>
            <td>{{ $report->description}}</td>
            <td>{{ $report->fullname}}</td>
    </tbody>
    @endforeach
  </thead>
</table>
{{-- </body>
</html> --}}