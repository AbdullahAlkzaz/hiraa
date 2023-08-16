<div class="row match-height">
    <div class="col-xl-6 col-md-6 col-12">
        <div class="card card-congratulation-medal">
            <div class="card-body">
                <h5>عمليات السحب</h5>

                <h3 class="mb-75 mt-2 pt-50">
                    {{ $wallet->debit_amount }}
                </h3>

            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 col-12">
        <div class="card card-congratulation-medal">
            <div class="card-body">
                <h5>عمليات الابداع</h5>

                <h3 class="mb-75 mt-2 pt-50">
                    {{ $wallet->credit_amount }}
                </h3>

            </div>
        </div>
    </div>
</div>
