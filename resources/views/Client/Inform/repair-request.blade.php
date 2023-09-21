<!DOCTYPE html>
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
<body>
    <table class="table table-striped">
  <thead class="bg-light">
    <tr>
        <th>Report No.</th>
        <th>Date</th>
        <th>Room</th>
        <th>Tel.</th>
        <th>Repair report</th>
        <th>ผู้รับแจ้ง</th>
        <th>Status</th>
    </tr>
    @foreach( $reports as $report)
        <tr>
            <td>{{ $report->id}}</td>
            <td>{{ $report->date}}</td>
            <td>{{ $report->room}}</td>
            <td>{{ $report->tel}}</td>
            <td>{{ $report->description}}</td>
            <td>{{ $report->receiver}}</td>
            <td>
            @if ($report->status === 'finished')
              <span class="badge badge-success rounded-pill d-inline">finished</span>
            @elseif ( $report->status === 'unfinished')
              <span class="badge rounded-pill badge-danger">unfinished</span>
            @endif
            </td>
        </tr>
    @endforeach
  </thead>
</table>
</body>
</html>