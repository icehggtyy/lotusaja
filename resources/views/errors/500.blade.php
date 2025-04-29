@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

<x-layout title="Server Error">
    <div class="text-center py-20">
        <h1 class="text-4xl font-bold mb-2 mt-8">500 - Server Error</h1>
        <p class="text-lg mb-8">Sorry, There is problem with our server, try to come back later</p>
        <a href="{{ url('/') }}" class="btn color1 text-white mb-8">Go back to Home</a>
    </div>
</x-layout>
