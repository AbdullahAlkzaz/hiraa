@extends('layouts.appHiraa')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
    <div class="container">
        <h1>Price</h1>
        <a href="{{ route('prices.create') }}" class="btn btn-primary">Add New Price</a>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Coupon</th>
                    <th>Coupon Duration (days)</th>
                    <th>Features</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                    <tr>
                        <td>{{ $price->title }}</td>
                        <td>{{ $price->price }}</td>
                        <td>{{ $price->coupon }}</td>
                        <td>{{ $price->coupon_time }}</td>
                        <td>
                            <ul>
                                @foreach ($price->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('prices.edit', $price->id) }}">
                                            <i data-feather="edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item"
                                            onclick="confirmDelete({{ $price->id }})">
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
    </div>
@endsection

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
                title: "{{ __('هل أنت متأكد؟') }}",
                text: "{{ __('ستقوم بحذف المقالة!') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('نعم، احذفها!') }}",
                cancelButtonText: "{{ __('إلغاء') }}",
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
                    .then(() => console.log('price shared successfully!'))
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
