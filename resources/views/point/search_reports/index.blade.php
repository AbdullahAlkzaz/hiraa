@extends('layouts.app')

@section('title', __('Orders Reports'))

@push('style')
@endpush
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Search reports'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Reports') }}</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('For') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $report['name'] }}</td>
                                    <td>{{ $report['for'] }}</td>

                                    <td>
                                        <a href="{{ route($report['action']) }}"
                                           class="btn btn-primary mr-1 mb-1 btn-sm"><i data-feather='eye'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script>
        $(document).ready(function() {

        });
    </script>
    @if (Session::has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                html: '{!! session('message') !!}',
                showConfirmButton: false,
                timer: 3000,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        </script>
    @endif
    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endpush
