@extends('layouts.app')
@section('content-header')

@endsection
@push('style')
@endpush
@section('content')
 

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
@livewire('profile.update-password-form')
@endif

@stop
@push('scripts')
 
@endpush
