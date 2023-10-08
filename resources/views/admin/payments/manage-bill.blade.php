@extends('admin.layout')

@section('header')
    @livewireStyles
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <livewire:usage-list lazy="on-load" /> --}}
                    @livewire('usage-list')
                </div>
                <div>
                    @livewire(\App\Livewire\WaterUnitChart::class)
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
@endsection