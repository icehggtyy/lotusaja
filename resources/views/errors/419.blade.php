@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))

<x-layout title="Page Expired">
    <div class="text-center py-20">
        <h1 class="text-4xl font-bold mb-2 mt-8">419 - Page Expired</h1>
        <p class="text-lg mb-8">This Page is expired, Please try to refresh or Contact Support</p>
        <a href="{{ url('/') }}" class="btn color1 text-white mb-8">Go back to Home</a>
    </div>
</x-layout>
