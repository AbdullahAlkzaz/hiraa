@extends('layouts.app')
@section('title', 'New Price')

@push('style')
<link rel="stylesheet"
href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endpush

@section('content')
<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('prices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Lecture Duration -->
                    <div class="form-group col-md-6">
                        <label>Lecture Duration</label>
                        <div id="lecture-duration">
                            <span class="duration-option" data-value="30">30 minutes</span>
                            <span class="duration-option" data-value="45">45 minutes</span>
                            <span class="duration-option" data-value="60">60 minutes</span>
                        </div>
                        <input type="hidden" id="lecture_duration" name="lecture_duration" required>
                    </div>

                    <!-- Weekly Sessions -->
                    <div class="form-group col-md-6">
                        <label for="sessions_per_week">Weekly Sessions</label>
                        <input type="number" id="sessions_per_week" name="sessions_per_week" class="form-control" min="1">
                    </div>
                </div>


                <!-- Price and Discount -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Discount Type</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount_type" id="percentage"
                                value="percentage" checked>
                            <label class="form-check-label" for="percentage">Percentage</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discount_type" id="fixed" value="fixed">
                            <label class="form-check-label" for="fixed">Fixed Amount</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="coupon">Coupon Value</label>
                        <input type="number" id="coupon" name="coupon" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="coupon_time">Coupon Duration (in days)</label>
                        <input type="number" id="coupon_time" name="coupon_time" class="form-control" min="0">
                    </div>
                </div>

                <div class="form-group">
                    <label for="final_price">Final Price After Discount</label>
                    <input type="number" id="final_price" name="final_price" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="features">Features</label>
                    <div id="features-list">
                        <!-- Place to add features -->
                    </div>
                    <button type="button" id="add-feature" class="btn btn-secondary">Add Feature</button>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript to handle lecture duration selection -->
<script>
    document.querySelectorAll('.duration-option').forEach(function (el) {
        el.addEventListener('click', function () {
            document.querySelectorAll('.duration-option').forEach(function (e) {
                e.classList.remove('active');
            });
            el.classList.add('active');
            document.getElementById('lecture_duration').value = el.getAttribute('data-value');
        });
    });

</script>

<style>
    #lecture-duration {
        display: flex;
        gap: 10px;
        margin-bottom: 1rem;
    }

    .duration-option {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
    }

    .duration-option.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .form-row {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

</style>


@endsection

@section('page-script')
<!-- BEGIN: Page Vendor JS-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<!-- END: Page Vendor JS-->
<script>
    $(document).ready(function () {
        $('#add-feature').on('click', function () {
            var featureHtml = `
                <div class="input-group mb-2 feature-item">
                    <input type="text" name="features[]" class="form-control" placeholder="Enter a feature">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger remove-feature">Remove</button>
                    </div>
                </div>`;
            $('#features-list').append(featureHtml);
        });

        // Remove a feature input field
        $('#features-list').on('click', '.remove-feature', function () {
            $(this).closest('.feature-item').remove();
        });
    });

    $(document).ready(function () {
        function calculateFinalPrice() {
            const price = parseFloat($('#price').val()) || 0;
            const couponValue = parseFloat($('#coupon').val()) || 0;
            const discountType = $('input[name="discount_type"]:checked').val();

            let finalPrice = price;

            if (discountType === 'percentage') {
                finalPrice = price - (price * (couponValue / 100));
            } else if (discountType === 'fixed') {
                finalPrice = price - couponValue;
            }

            $('#final_price').val(finalPrice.toFixed(2));
        }

        function startCountdown() {
            let daysLeft = parseInt($('#coupon_time').val()) || 0;

            if (daysLeft > 0) {
                const countdownInterval = setInterval(function () {
                    daysLeft--;

                    $('#coupon_time').val(daysLeft);

                    if (daysLeft <= 0) {
                        clearInterval(countdownInterval);
                        // إعادة السعر للسعر الأصلي عند انتهاء العد التنازلي
                        const originalPrice = parseFloat($('#price').val()) || 0;
                        $('#final_price').val(originalPrice.toFixed(2));
                        $('#coupon').val(''); // مسح قيمة الكوبون
                    }
                }, 1000 * 60 * 60 * 24); // العد التنازلي اليومي
            }
        }

        // ربط الأحداث بالعناصر
        $('#coupon, #discount_type, #price').on('input change', calculateFinalPrice);
        $('#coupon_time').on('input', startCountdown);
    });

</script>
@endsection
