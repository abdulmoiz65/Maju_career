{{-- resources/views/user/pages/forms/visiting.blade.php --}}

<h4 class="mt-4">Visiting Faculty Details</h4>

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

{{-- Postal Address --}}
<div class="mb-3">
    <label class="form-label">Postal Address</label>
    <textarea name="postal_address" class="form-control" rows="2">{{ old('postal_address') }}</textarea>
</div>

{{-- Salary Desired --}}
<div class="mb-3">
    <label class="form-label">Salary Desired</label>
    <input type="text" name="salary_desired" class="form-control" value="{{ old('salary_desired') }}">
</div>

{{-- Availability --}}
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

{{-- Department --}}
<div class="mb-3">
    <label class="form-label d-block">Department <span class="text-danger">*</span></label>
    @foreach(['business' => 'Faculty of Business Administration', 'computing' => 'Faculty of Computing', 'life_sciences' => 'Faculty of Life Sciences'] as $value => $label)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="dept" value="{{ $value }}" {{ old('dept') == $value ? 'checked' : '' }} required>
            <label class="form-check-label">{{ $label }}</label>
        </div>
    @endforeach
</div>

{{-- Area of Specialization --}}
<div class="mb-3">
    <label class="form-label">Area of Specialization</label>
    <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}">
</div>

{{-- Post Applied --}}

<div class="mb-3">
    <label class="form-label d-block">Post Applied For <span class="text-danger">*</span></label>
    @foreach(['professor' => 'Professor', 'associate_professor' => 'Associate Professor', 'assistant_professor' => 'Assistant Professor', 'lecturer' => 'Lecturer', 'instructor' => 'Instructor', 'lab_engineer' => 'Lab Engineer'] as $value => $label)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="post_applied[]" value="{{ $value }}"
                   @if(is_array(old('post_applied')) && in_array($value, old('post_applied'))) checked @endif>
            <label class="form-check-label">{{ $label }}</label>
        </div>
    @endforeach
</div>

{{-- Organization Recent --}}
<div class="form-section">
    <h6 class="mb-3">Employment History (Recent)</h6>
    <div class="row g-3 ">
        <div class="col-md-6">
<div class="mb-3">
    <label class="form-label">Name of Organization (Recent)</label>
    <input type="text" name="org_recent" class="form-control" value="{{ old('org_recent') }}">
</div>
        </div>

{{-- Designation Recent --}}
        <div class="col-md-6">
<div class="mb-3">
    <label class="form-label">Designation (Recent)</label>
    <input type="text" name="designation_recent" class="form-control" value="{{ old('designation_recent') }}">
</div>
        </div>
    </div>
</div>

{{-- Experience --}}

<div class="form-section">
    <h6 class="mb-3">Visiting Faculty Details</h6>
    <div class="row g-3 ">
        <div class="col-md-6">
<div class="mb-3">
    <label class="form-label">Years of Experience in Academia</label>
    <input type="number" name="years_academia" class="form-control" min="0" value="{{ old('years_academia') }}">
</div>
        </div>

        <div class="col-md-6">
<div class="mb-3">
    <label class="form-label">Years of Experience in Industry</label>
    <input type="number" name="years_industry" class="form-control" min="0" value="{{ old('years_industry') }}">
</div>
        </div>
    </div>
</div>

{{-- Attachments --}}
<div class="form-section">
    <h6 class="mb-3">Attachments</h6>
    <div class="row g-3 ">
        <div class="col-md-6">
        <div class="mb-3">
    <label class="form-label">Current Photo (Max 10MB)</label>
    <input type="file" name="photo" class="form-control" accept="image/*" required>
</div>
</div>


        <div class="col-md-6">
<div class="mb-3">
    <label class="form-label">Resume (PDF/DOC, Max 5MB)</label>
    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
</div>
        </div>
</div>
</div>
