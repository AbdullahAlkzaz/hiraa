@extends('layouts/contentLayoutMaster')

@section('title', __("Tabby sales"))
@unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Tabby sales'))
    <script>window.location = "{{ route('dashboard') }}";</script>
    <?php exit; ?>
@endunless

@section('content')


{{-- [{"companyView":{"name_ar":"Mina","name":"Mina","tabbyEnabled":true,"id":24},"totalTabbySales":62.37,"totalAllSales":475.3649999999999,"tabbyOrdereNum":3,"allOrderNum":20}, --}}



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">{{ __('Tabby sales') }}</h4>
            </div>
            <div class="card-content">
                <div class="table-responsive mt-1">
                    <table class="table table-hover-animation mb-0">
                        <thead>
                            <tr>

                                <th>{{ __('Company name') }}</th>
                                <th>{{ __('tabby Enabled') }}</th>
                                <th>{{ __('totalTabbySales') }}</th>
                                <th>{{ __('totalAllSales') }}</th>
                                <th>{{ __('tabbyOrdereNum') }}</th>
                                <th>{{ __('allOrderNum') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies_tabby_sales as $key => $tabby_sale)
                                <tr>


                                    <td>{{ $tabby_sale['companyView']['name_ar'] }}</td>
                                    <td>{{ $tabby_sale['companyView']['tabbyEnabled']  == 1 ? __('YES') : __('NO') }}</td>
                                    <td>{{ $tabby_sale['totalTabbySales'] }}</td>
                                    <td>{{ $tabby_sale['totalAllSales'] }}</td>
                                    <td>{{ $tabby_sale['tabbyOrdereNum'] }}</td>
                                    <td>{{ $tabby_sale['allOrderNum'] }}</td>

                                    <td>
                                        <a class="btn btn-success"  href="{{ route('company_dashboard' ,   $tabby_sale['companyView']['id'] )}}" >
                                            <i data-feather='eye'></i>
                                        </a>
{{--                                        <a class="btn btn-warning"  href="{{ route('company_dashboard_live' ,   $tabby_sale['companyView']['id'] )}}" >--}}
{{--                                            <i data-feather='edit'></i>--}}
{{--                                        </a> --}}
                                        <a class="btn btn-warning modal-val"  data-bs-toggle="modal"
                                           data-company="{{ $tabby_sale['companyView']['id'] }}"
                                           data-bs-target="#modalForDate" >
                                            <i data-feather='edit'></i>
                                        </a>

                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        {{ __('No data found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForDate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tabby sales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('company_dashboard_live' )}}" method="POST">
            <div class="modal-body">
                @csrf
                <input type="text" id="company"  name="company" class="form-control">
                <br>
                <label for="from">from:</label>
                <input type="date" name="from" class="form-control">
                <br>
                <label for="to">to:</label>
                <input type="date" name="to" class="form-control">
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection

@section('page-script')
    {{-- Page js files --}}
    <script>
        $(document).on("click", ".modal-val", function () {
            var company_id = $(this).data('company');
            $(".modal-body #company").val( company_id );

        });
    </script>

@endsection
