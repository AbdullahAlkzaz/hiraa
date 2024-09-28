@extends('layouts.appHiraa')

@section('title', 'Refistration')

@push('style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
@endpush

<style>
    #country_code {
        border-radius: 0.357rem 0 0 0.357rem;
    }

    #phone {
        border-radius: 0 0.357rem 0.357rem 0;
    }
</style>


@section('content')
    <div class="card w-75">
        <div class="card-body">
            <div class="card-content">
                <form action="{{ route('students.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- الاسم -->
                    <div class="mb-3">
                        <label for="first_name" class="form-label">first name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="first name.." value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- الاسم -->
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your Name.."
                            value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="@gmail.com"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- رقم الهاتف مع كود البلد -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <!-- قائمة اختيار كود الدولة -->
                            <div class="input-group-prepend">
                                <select class="selectpicker form-select" id="country_code" name="country_code"
                                    data-live-search="true" required>
                                    <option value="" disabled selected>Select Country Code</option>
                                    @foreach ($countries as $country)
                                        @if (isset($country['idd']['root']))
                                            <option value="{{ $country['idd']['root'] }}"
                                                data-content='<span class="flag-icon flag-icon-{{ strtolower($country['cca2']) }}"></span> {{ $country['idd']['root'] }} - {{ $country['name']['common'] }}'>
                                                {{ $country['idd']['root'] }} - {{ $country['name']['common'] }}
                                            </option>
                                        @else
                                            <option value="">{{ $country['name']['common'] }} (No Code Available)
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- حقل الهاتف -->
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ old('phone') }}" placeholder="010 01234567" required
                                style="border-radius: 0 0.357rem 0.357rem 0;">

                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- العمر -->
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" name="dob"
                            value="{{ old('dob') }}" required>
                        @error('dob')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- الجنس -->
                    <div class="mb-3">
                        <label class="form-label">Student Gender <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                {{ old('gender') == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                                {{ old('gender') == 'female' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="female">Female</label>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- الكورس -->
                    <div class="mb-3">
                        <label for="course" class="form-label">Choose Your Course <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="course_id" name="course_id" required>
                            <option value="" disabled selected>What You Need?</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('course')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- الملاحظات -->
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea id="notes" name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                        @error('notes')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- زر إرسال -->
                    <button type="submit" class="btn btn-primary">ENROLL</button>
                </form>
            </div>
        </div>
    </div>

@stop

@section('page-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countrySelect = document.getElementById('country_code');
            for (const option of countrySelect.options) {
                if (option.value) {
                    const countryCode = option.value.trim();
                    option.innerHTML =
                        `<span class="flag-icon flag-icon-${countryCode.toLowerCase()}"></span> ${option.text}`;
                }
            }
        });
    </script>
@endsection
