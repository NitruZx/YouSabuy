{{-- <x-app-layout> --}}
@extends('layouts.client-layout')

@section('header')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('counter')
                
                {{-- table --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="accordion-collapse{{$i}}" data-accordion="collapse">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" data-accordion-target="#accordion-collapse-body-{{$i}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$i}}">
                                    Apple MacBook Pro 17" {{$i}}
                                </th>
                                <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$i}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$i}}">
                                    Silver
                                </td>
                                <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$i}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$i}}">
                                    Laptop
                                </td>
                                <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$i}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$i}}">
                                    $2999
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div id="accordion-collapse-body-{{$i}}" class="hidden">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <p class="mb-2 text-gray-500 dark:text-gray-400">{{$i}} Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                                            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                {{-- table --}}
  
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@endsection
{{-- </x-app-layout> --}}