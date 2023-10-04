<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
          @include('layouts.navigation')

          <!-- Page Heading -->
              <header class="bg-white shadow">
                  <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Payment') }}
                    </h2>
                    </div>
                </div>
              </header>
            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                  
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-center text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
              <th scope="col" class="px-6 py-3">
                วันออกบิล
              </th>
              <th scope="col" class="px-6 py-3">
                วันครบกำหนด
              </th>
              <th scope="col" class="px-6 py-3">
                ค่าปรับ(บาท)
              </th>
              <th scope="col" class="px-6 py-3">
                ยอดเงินรวม(บาท)
              </th>
              <th scope="col" class="px-6 py-3">
                สถานะ
              </th>
              <th scope="col" class="px-6 py-3">
                วันที่ชำระ
              </th>
          </tr>
      </thead>
      <tbody>
        @php
          $late_fee = 0;    
        @endphp
          @foreach( $datas as $data)
          <tr class="bg-white border-b hover:bg-gray-50">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{ $data->monthbill}}
              </th>
              <td class="px-6 py-4">
                {{ $data->due}}
              </td>
              <td class="px-6 py-4">
                @if ($data->diff > 0 && $data->status === 'unpaid')
                {{$data->diff * 100}}
                @php
                    $late_fee = $data->diff * 100;
                @endphp
                @elseif ($data->diff > 0 && $data->status === 'paid')
                  {{$data->late_fee}}
                @php
                    $late_fee = $data->late_fee;
                @endphp
                @endif
              </td>
              <td class="px-6 py-4">
                {{$data->water_bill + $data->electric_bill + $late_fee + $data->monthly_price}}
              </td>
              @if ($data->status === 'paid')
                <td class="px-6 py-4">
                  <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">ชำระเงินแล้ว</span>
                </td>
                <td class="px-6 py-4">
                  {{ $data->paiddate}}
                </td>
              @elseif ( $data->status === 'unpaid')
                <td class="px-6 py-3">
                  <form action = "{{route('createpayment')}}" method="post">
                    @csrf
                      {{-- <input type="hidden" id="totalPrice" name="totalPrice" value="{{$data->water_bill + $data->electric_bill + $data->charge + 4000}}"> --}}
                      <input type="hidden" name="bill_id" value="{{$data->bill_id}}" />
                      <input type="hidden" name="utility_price" value="{{$data->water_bill + $data->electric_bill}}" />
                      <input type="hidden" name="room_id" value="{{$data->room_id}}" />
                      <input type="hidden" name="charge" value="{{$late_fee}}" />
                      <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">ไปชำระเงิน</button>
                  </form>
                </td>
                <td class="px-6 py-4">
                  ---
                </td>
              @endif
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
                </div>
            </div>
            </main>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </body>
</html>