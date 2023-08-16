<div class="mb-1 col-md-6" style="margin-right:25%;">
    <label for="register-username" class="form-label">إختر المكتب</label>
    <select class="form-select select2" id="office-id" class="form-control text-center"
        name="office_id" required>
        <option value="" class="fs-4 text-center" disabled selected>
            <span>إختر المكتب</span>
        </option>
        @foreach ($offices as $office)
            @if (!$office->hasRole('admin'))
                <option value="{{ $office->id }}" class="fs-4 text-center">
                    <span>{{ $office->name }}</span>
                </option>
            @endif
        @endforeach
    </select>
</div>