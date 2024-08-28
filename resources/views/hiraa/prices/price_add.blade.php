@extends('layouts.appHiraa')

@push('style')
@endpush

@section('content')
    <div class="contaner">
        <h2>Create Price</h2>
        <form action="{{ route('prices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Discount Type</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="discount_type" id="percentage" value="percentage"
                        checked>
                    <label class="form-check-label" for="percentage">
                        Percentage
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="discount_type" id="fixed" value="fixed">
                    <label class="form-check-label" for="fixed">
                        Fixed Amount
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="coupon">Coupon Value</label>
                <input type="number" id="coupon" name="coupon" class="form-control">
            </div>

            <div class="form-group">
                <label for="coupon_time">Coupon Duration (in days)</label>
                <input type="number" id="coupon_time" name="coupon_time" class="form-control" min="0">
            </div>

            <div class="form-group">
                <label for="final_price">Final Price After Discount</label>
                <input type="number" id="final_price" name="final_price" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="features">Features</label>
                <div id="features-list">
                    <!-- مكان إضافة الخصائص -->
                </div>
                <button type="button" id="add-feature" class="btn btn-secondary">Add Feature</button>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection

@section('page-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-feature').on('click', function() {
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
            $('#features-list').on('click', '.remove-feature', function() {
                $(this).closest('.feature-item').remove();
            });
        });

        $(document).ready(function() {
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
                    const countdownInterval = setInterval(function() {
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
