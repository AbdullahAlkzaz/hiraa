@php $titlePage = __('Return reasons') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Buyer:</strong> {{ $returnReason['buyer_id'] }}</p>
                    <p><strong>Reason:</strong> {{ $returnReason['return_reason'] }}</p>
                    <p><strong>Comment:</strong> {{ $returnReason['comment'] }}</p>
                    <p>
                        <strong>Image:</strong>
                        @if ($returnReason['image_path'])
                            <img src="{{ $returnReason['url'] }}" alt="Return Reason Image">
                        @else
                            No Image
                        @endif
                    </p>

                </div>
            </div>
        </div>


@stop
