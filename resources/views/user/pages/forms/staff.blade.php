{{-- resources/views/user/pages/forms/staff.blade.php --}}

<h4 class="mt-4">Staff (Non-Teaching) Application Form</h4>

{{-- ================= Personal Information ================= --}}
<div class="form-section">
    <h6 class="mb-3">Personal Information</h6>
    <div class="row">
        {{-- Gender --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label d-block">Gender <span class="text-danger">*</span></label>
                @foreach(['male' => 'Male', 'female' => 'Female'] as $value => $label)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="{{ $value }}"
                               {{ old('gender') == $value ? 'checked' : '' }} required>
                        <label class="form-check-label">{{ $label }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- ================= Job Details ================= --}}
<div class="form-section">
    <h6 class="mb-3">Job Details</h6>
    <div class="row">
        {{-- Post Applied --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Post Applied For <span class="text-danger">*</span></label>
                <input type="text" name="post_applied" class="form-control"
                       value="{{ old('post_applied') }}" required>
            </div>
        </div>

        {{-- Salary Desired --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Salary Desired</label>
                <input type="text" name="salary_desired" class="form-control"
                       value="{{ old('salary_desired') }}">
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Availability --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">When can you join us?</label>
                <input type="date" name="join_date" class="form-control"
                       value="{{ old('join_date') }}">
            </div>
        </div>
    </div>
</div>

{{-- ================= Education ================= --}}
<div class="form-section">
    <h6 class="mb-3">Education</h6>
    {{-- Highest Degree --}}
    <div class="mb-3">
        <label class="form-label d-block">Highest Degree <span class="text-danger">*</span></label>
        @foreach(['phd' => 'PhD', 'masters18' => 'Masters (18 Years)', 'masters16' => 'Masters (16 Years)', 'bachelors' => 'Bachelors', 'other' => 'Other'] as $value => $label)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="highest_degree" value="{{ $value }}"
                       {{ old('highest_degree') == $value ? 'checked' : '' }} required>
                <label class="form-check-label">{{ $label }}</label>
            </div>
        @endforeach
    </div>

    <div class="row">
        {{-- Institute --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Name of Institute</label>
                <input type="text" name="institute" class="form-control"
                       value="{{ old('institute') }}">
            </div>
        </div>

        {{-- Passing Year --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Passing Year</label>
                <input type="number" name="passing_year" class="form-control"
                       min="1950" max="{{ date('Y') }}" value="{{ old('passing_year') }}">
            </div>
        </div>
    </div>

    {{-- Area of Specialization --}}
    <div class="mb-3">
        <label class="form-label">Area of Specialization</label>
        <input type="text" name="specialization" class="form-control"
               value="{{ old('specialization') }}">
    </div>
</div>

{{-- ================= Employment History ================= --}}
<div class="form-section">
    <h6 class="mb-3">Employment History</h6>
    <div class="row g-3">
        {{-- Organization --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Name of Organization</label>
                <input type="text" name="org_recent" class="form-control"
                       value="{{ old('org_recent') }}">
            </div>
        </div>

        {{-- Designation --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input type="text" name="designation_recent" class="form-control"
                       value="{{ old('designation_recent') }}">
            </div>
        </div>
    </div>

    <div class="row g-3">
        {{-- Date of Joining --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Date of Joining</label>
                <input type="date" name="date_of_joining" class="form-control"
                       value="{{ old('date_of_joining') }}">
            </div>
        </div>
    </div>
</div>

{{-- ================= Experience ================= --}}
<div class="form-section">
    <h6 class="mb-3">Experience</h6>
    <div class="mb-3">
        <label class="form-label">Years of Experience</label>
        <input type="number" name="years_experience" class="form-control"
               min="0" value="{{ old('years_experience') }}">
    </div>
</div>

{{-- ================= Attachments ================= --}}
<div class="form-section">
    <h6 class="mb-3">Attachments</h6>
    <div class="row g-3">
        {{-- Resume --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Resume (PDF/DOC, Max 5MB)</label>
                <input type="file" name="resume" class="form-control"
                       accept=".pdf,.doc,.docx" required>
            </div>
        </div>

        {{-- Photo --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Current Photo (Max 10MB)</label>
                <input type="file" name="photo" class="form-control"
                       accept="image/*" required>
            </div>
        </div>
    </div>
</div>
