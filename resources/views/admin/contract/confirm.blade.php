@extends('admin.layout')

@section('header')
    @livewireStyles
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{$reg->room_id}}

                <x-input-label for="token" :value="__('Enter Token:')" />
                <x-text-input id="token" class="block mx-2" type="text" name="token" :value="old('token')" required autofocus />
            </div>
        </div>
    </div>
</div>
@livewireScripts
@endsection