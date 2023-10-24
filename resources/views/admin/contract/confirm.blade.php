@extends('admin.layout')

@section('header')
    @livewireStyles
@endsection

@section('content')
@if(Session::has('success'))
    <script>
      swal("Reg Success", "{{ Session::get('success') }}", 'success',{
        button:true,
        button:"oK",
      });
    </script>
@endif
@if(Session::has('failed'))
    <script>
      swal("Token not found", "{{ Session::get('failed') }}", 'error',{
        button:true,
        button:"oK",
      });
    </script>
@endif
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                
                <div
                    class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        Registration Info
                        @if ($reg->reg_status === 'pending')
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-warning-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-warning-800">
                                pending
                            </span>
                        @elseif ($reg->reg_status === 'in-progress')
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-info-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-info-800">
                                complete contract
                            </span>
                        @elseif ($reg->reg_status === 'accept')
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                accepted
                            </span>
                        @endif
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Room : {{$reg->room_id}}<br>
                        Fullname : {{$reg->client->firstname}} {{$reg->client->lastname}}<br>
                        Created At : {{$reg->created_at}}<br>
                        Status : 
                        {{-- @if ($reg->reg_status === 'pending')
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-warning-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-warning-800">
                                pending
                            </span>
                        @elseif ($reg->reg_status === 'in-progress')
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-info-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-info-800">
                                complete contract
                            </span>
                        @elseif ($reg->reg_status === 'accept')
                            <span
                            class="inline-block whitespace-nowrap rounded-full bg-success-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-success-700">
                                accepted
                            </span>
                        @endif --}}
                    </p>
                    </div>
                    @if ($contract != null)
                    <br>
                    <div
                    class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        Contract Info
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Address : {{$contract->address}}<br>
                        Citizen ID : {{$contract->citizen_id}}<br>
                        Startdate : {{$contract->startdate}}<br>
                        Enddate : {{$contract->enddate}}
                    </p>
                    </div>
                        @if($reg->status === 'in-progress')
                            <br>
                            <form action = "{{route('confirm')}}" method="post">
                                @csrf
                                    <input type="hidden" name="client_id" value="{{$contract->client_id}}" />
                                    <x-input-label for="token" :value="__('Enter Token:')" />
                                    <x-text-input id="token" class="block mx-2" type="text" name="token" :value="old('token')" required autofocus />
                                    <button
                                        type="submit"
                                        class="inline-block rounded bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]">
                                        Dark
                                    </button>
                            </form>
                        @endif
                    @endif
            </div>
        </div>
    </div>
</div>
@livewireScripts
@endsection