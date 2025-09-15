{{-- resources/views/user/pages/forms/staff.blade.php --}}

<h4 class="mt-4">Staff (Non-Teaching) Application Details</h4>

{{-- Gender --}}
<div class="mb-3">
    <label class="form-label d-block">Gender <span class="text-danger">*</span></label>
    @foreach(['male' => 'Male', 'female' => 'Female'] as $value => $label)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="{{ $value }}" {{ old('gender') == $value ? 'checked' : '' }} required>
            <label class="form-check-label">{{ $label }}</label>
        </div>
    @endforeach
</div>

{{-- Post Applied --}}
<div class="mb-3">
    <label class="form-label">Post Applied For <span class="text-danger">*</span></label>
    <input type="text" name="post_applied" class="form-control" value="{{ old('post_applied') }}" required>
</div>

{{-- Salary Desired --}}
<div class="mb-3">
    <label class="form-label">Salary Desired</label>
    <input type="text" name="salary_desired" class="form-control" value="{{ old('salary_desired') }}">
</div>

{{-- When can join --}}
<div class="mb-3">
    <label class="form-label">When can you join us?</label>
    <input type="date" name="join_date" class="form-control" value="{{ old('join_date') }}">
</div>

{{-- Highest Degree --}}
<div class="mb-3">
    <label class="form-label d-block">Highest Degree <span class="text-danger">*</span></label>
    @foreach(['phd' => 'PhD', 'masters18' => 'Masters (18 Years)', 'masters16' => 'Masters (16 Years)', 'bachelors' => 'Bachelors', 'other' => 'Other'] as $value => $label)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="highest_degree" value="{{ $value }}" {{ old('highest_degree') == $value ? 'checked' : '' }} required>
            <label class="form-check-label">{{ $label }}</label>
        </div>
    @endforeach
</div>

{{-- Institute --}}
<div class="mb-3">
    <label class="form-label">Name of Institute</label>
    <input type="text" name="institute" class="form-control" value="{{ old('institute') }}">
</div>

{{-- Passing Year --}}
<div class="mb-3">
    <label class="form-label">Passing Year</label>
    <input type="number" name="passing_year" class="form-control" min="1950" max="{{ date('Y') }}" value="{{ old('passing_year') }}">
</div>

{{-- Area of Specialization --}}
<div class="mb-3">
    <label class="form-label">Area of Specialization</label>
    <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}">
</div>

{{-- Organization --}}
<div class="mb-3">
    <label class="form-label">Name of Organization</label>
    <input type="text" name="org_recent" class="form-control" value="{{ old('org_recent') }}">
</div>

{{-- Designation --}}
<div class="mb-3">
    <label class="form-label">Designation</label>
    <input type="text" name="designation_recent" class="form-control" value="{{ old('designation_recent') }}">
</div>

{{-- Date of Joining --}}
<div class="mb-3">
    <label class="form-label">Date of Joining</label>
    <input type="date" name="date_of_joining" class="form-control" value="{{ old('date_of_joining') }}">
</div>

{{-- Years of Experience --}}
<div class="mb-3">
    <label class="form-label">Years of Experience</label>
    <input type="number" name="years_experience" class="form-control" min="0" value="{{ old('years_experience') }}">
</div>

{{-- Attachments --}}
<div class="form-section">
    <h6 class="mb-3">Attachments</h6>
    <div class="row g-3 ">
        <div class="col-md-6">
<div class="mb-3">
    <label class="form-label">Resume (PDF/DOC, Max 5MB)</label>
    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
</div>
</div>

        <div class="col-md-6">

<div class="mb-3">
    <label class="form-label">Current Photo (Max 10MB)</label>
    <input type="file" name="photo" class="form-control" accept="image/*" required>
</div>
        </div>
    </div>
</div>
