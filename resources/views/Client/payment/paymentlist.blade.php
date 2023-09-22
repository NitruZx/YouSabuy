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
<link rel="stylesheet" href="{{ asset('css/paymentpage.css')}}">
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
                <table class="table align-middle mb-0 bg-white">
                    <thead class="table-dark">
                      <tr>
                          <th><b>ID</b></th>
                          <th><b>ค่าน้ำ(บาท)</b></th>
                          <th><b>ค่าไฟ(บาท)</b></th>
                          <th><b>ค่าปรับ(บาท)</b></th>
                          <th><b>ค่าห้อง(บาท)</b></th>
                          <th><b>ยอดเงินรวม</b></th>
                          <th><b>สถานะ</b></th>
                          <th><b>วันที่ชำระ</b></th>
                      </tr>
                    </thead>
                      @foreach( $datas as $data)
                          <tr>
                              <td>{{ $data->id}}</td>
                              <td>{{ $data->water_bill}}</td>
                              <td>{{ $data->electric_bill}}</td>
                              <td>{{ $data->charge}}</td>
                              <td>{{$data->monthly_price}}</td>
                              <td>{{$data->water_bill + $data->electric_bill + $data->charge + $data->monthly_price}}</td>
                              @if ($data->status === 'paid')
                              <td>
                                <span class="badge badge-success rounded-pill d-inline">ชำระเงินแล้ว</span></td>
                              <td>{{ $data->paydate}}</td>
                              @elseif ( $data->status === 'unpaid')
                              <td>
                                {{-- <a href = "" class="btn btn-info">ชำระเงิน</a> --}}
                                <form action = "{{route('createpayment')}}" method="post">
                                  @csrf
                                    {{-- <input type="hidden" id="totalPrice" name="totalPrice" value="{{$data->water_bill + $data->electric_bill + $data->charge + 4000}}"> --}}
                                    <input type="hidden" name="bill_id" value="{{$data->id}}" />
                                    <input type="hidden" name="utility_price" value="{{$data->water_bill + $data->electric_bill + $data->charge}}" />
                                    <input type="hidden" name="room_id" value="{{$data->room_id}}" />
                                    <input type="submit" value="ไปชำระเงิน" class="btn btn-info btn-rounded" />
                                </form>
                                </td>   
                              <td>---</td>
                              @endif
                          </tr>
                      @endforeach
                  </table>
                </div>
            </div>
            </main>
        </div>
        @if ($message = Session::get('check'))
          {{-- @include('Client.payment.omise.paypage'); --}}
          {{$total = Session::get('total')}}
          {{-- @include('Client.payment.omise.checkout') --}}
          <style>
            .omise-checkout-button{
              display: none;
            }
        </style>
            <div class="form">
              
              <form name="checkoutForm" method="POST" action="{{route('paying')}}">
                @csrf
                <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                        data-key="pkey_test_5x5y20p7x8ck664erv7"
                        data-image="https://cdn.omise.co/assets/dashboard/images/omise-logo.png"
                        data-amount="{{$total}}00"
                        data-currency="thb"
                        data-button-label="Pay now"
                        data-frame-label="Example 1"
                        data-submit-label="Checkout"
                  data-other-payment-methods="promptpay">
                </script>
                <input type="hidden" id="totalPrice" name="totalPrice" value="{{$total}}">
              </form>
        <script>
            document.querySelector('.omise-checkout-button').click()
        </script>
        @endif
        
            
    </body>
</html>