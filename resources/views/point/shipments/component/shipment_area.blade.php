    <label for="area" class="form-label">المنطقة</label>
    <div class="input-group input-group-merge ">
        <select class="form-select select2 area-selected" id="area-select"
            class="form-control text-center"
            data-placeholder="نوع المستخدم" name="receiver_area" required>
            <option value="" class="fs-4 text-center" selected>
                <span>إختر المنطقة</span>
            </option>
            @foreach ($government_areas as $area)
            <option value="{{ $area }}" class="fs-4 text-center">
                <span>{{ $area }}</span>
            </option>
            @endforeach
        </select>
    </div>