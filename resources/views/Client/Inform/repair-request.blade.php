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
{{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">Created At</th>
        <th scope="col" class="px-6 py-3">Room</th>
        <th scope="col" class="px-6 py-3">Description</th>
        <th scope="col" class="px-6 py-3">ผู้รับแจ้ง</th>
        <th scope="col" class="px-6 py-3">Status</th>
    </tr>
    @foreach( $requests as $request)
    <tbody>
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $request->created_at}}</th>
            <td class="px-6 py-4">{{ $request->room_id}}</td>
            <td class="px-6 py-4">{{ $request->description}}</td>
            <td class="px-6 py-4">{{ $request->fullname}}</td>
            <td class="px-6 py-4">
            @if ($request->status === 'finished')
              <span class="badge badge-success rounded-pill d-inline">finished</span>
            @elseif ( $request->status === 'unfinished')
              <span class="badge rounded-pill badge-danger">unfinished</span>
            @endif
            </td>
      </tr>
    </tbody>
    @endforeach
  </thead>
</table> --}}


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                Created At
              </th>
              <th scope="col" class="px-6 py-3">
                Room
              </th>
              <th scope="col" class="px-6 py-3">
                Description
              </th>
              <th scope="col" class="px-6 py-3">
                ผู้รับแจ้ง
              </th>
              <th scope="col" class="px-6 py-3">
                Status
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
          </tr>
      </thead>
      <tbody>
        @foreach( $requests as $request)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $request->created_at}}
              </th>
              <td class="px-6 py-4">
                {{ $request->room_id}}
              </td>
              <td class="px-6 py-4">
                {{ $request->description}}
              </td>
              <td class="px-6 py-4">
                {{ $request->fullname}}
              </td>
              <td class="px-6 py-4 text-left">
                @if ($request->status === 'finished')
                <span class="inline-block whitespace-nowrap rounded-full bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                  finished
                </span>
              @elseif ( $request->status === 'unfinished')
                <span class="inline-block whitespace-nowrap rounded-full bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700">
                  unfinished
                </span>
              @endif
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>

{{-- </body>
</html> --}}