@php $titlePage = __('Cities') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')


                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('City name') }}</th>
                                    <th>{{ __('City en name') }}</th>
                                    <th>{{ __('Country') }}</th>
                                    <th>{{ __('Region') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                @foreach ($cities as $key => $city)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $city['nameAr'] }}</td>
                                        <td>{{ $city['name'] }}</td>
                                        <td>{{ $city['country']['name'] }}</td>
                                        <td>{{ $city['region']['name'] }}</td>
                                        <td>
                                            <a href="{{ route('cities.show', $city['id']) }}"
                                                class="btn btn-success mr-1 mb-1 btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('cities.delivery.points', [$city['id'],$city['name']]) }}"
                                               class="btn btn-outline-warning mr-1 mb-1 btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

@stop
