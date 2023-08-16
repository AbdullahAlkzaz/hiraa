@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
@php $configData = Helper::applClasses(); @endphp

<html class="loading {{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
  lang="@if (session()->has('locale')){{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }}@endif" data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'rtl' }}"
  @if ($configData['theme'] === 'dark') data-layout="dark-layout" @endif>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="description"
    content="">
  <meta name="keywords"
    content="">
  <meta name="author" content="haniusif">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title') - {{ __('Dashboard') }}<</title>
  <link rel="apple-touch-icon" href="{{ asset('images/ico/favicon-32x32.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}" />
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


  {{-- Include core + vendor Styles --}}
  @include('panels.styles')
  <style>
    body {
        font-family: 'Cairo';
        /* font-size: 22px; */
    }
</style>
</head>

@isset($configData['mainLayoutType'])
  @extends((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts.horizontalDetachedLayoutMaster' :
  'layouts.verticalDetachedLayoutMaster' ))
@endisset
