@extends('layouts.app')
@section('title', 'Prices')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
    <a href="{{ route('prices.create') }}" class="btn floating-btn">
        <i class="fas fa-plus"></i>
    </a>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Price</th>
                <th>Coupon</th>
                <th>Coupon Duration (days)</th>
                <th>Discount Type</th>
                <th>Final Price</th>
                <th>Lecture Duration</th>
                <th>Sessions Per Week</th>
                <th>Coupon End Date</th>
                <th>Features</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
                <tr>
                    <td>{{ $price->price }}</td>
                    <td>{{ $price->coupon }}</td>
                    <td>{{ $price->coupon_time }}</td>
                    <td>{{ $price->discount_type }}</td>
                    <td>{{ $price->final_price }}</td>
                    <td>{{ $price->lecture_duration }}</td>
                    <td>{{ $price->sessions_per_week }}</td>
                    <td>{{ $price->coupon_end_date }}</td>
                    <td>
                        <ul>
                            @foreach ($price->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ route('prices.edit', $price->id) }}">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="confirmDelete({{ $price->id }})">
                                        <i data-feather="delete"></i> Delete
                                    </a>
                                    <form id="delete-form-{{ $price->id }}"
                                        action="{{ route('prices.destroy', $price->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{ $prices->links() }}
@stop

@section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->

    <script>
        function confirmDelete(priceId) {
            if (confirm('Are you sure you want to delete this price?')) {
                document.getElementById('delete-form-' + priceId).submit();
            }
        }
    </script>

    <script>
        function confirmDelete(priceId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will delete the article!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + priceId).submit();
                }
            });

            $('.swal2-actions').css({
                'display': 'flex',
                'justify-content': 'space-between',
                'width': '100%'
            });

            $('.swal2-confirm').css({
                'background-color': '#3085d6',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto',
                'margin-right': '10px'
            });

            $('.swal2-cancel').css({
                'background-color': '#d33',
                'color': '#fff',
                'border': 'none',
                'padding': '10px 20px',
                'border-radius': '5px',
                'cursor': 'pointer',
                'flex': '0 1 auto',
                'margin-left': '10px'
            });
        }

        function sharePrice(url) {
            if (navigator.share) {
                navigator.share({
                        title: $(document).find("title").text(),
                        text: 'Check out this price!',
                        url: url,
                    })
                    .then(() => console.log('Price shared successfully!'))
                    .catch((error) => console.error('Error sharing price:', error));
            } else {
                // Fallback: Copy the URL to clipboard
                copyToClipboard(url);
                alert('The link has been copied to your clipboard.');
            }
        }

        function copyToClipboard(text) {
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(text).select();
            document.execCommand('copy');
            tempInput.remove();
        }
    </script>

@endsection
