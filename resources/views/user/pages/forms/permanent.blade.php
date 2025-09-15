{{-- resources/views/user/pages/forms/permanent.blade.php --}}

<h4 class="mt-4">Permanent Faculty Details</h4>

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

{{-- Area of Specialization --}}
<div class="mb-3">
    <label class="form-label">Area of Specialization</label>
    <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}">
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
<div class="mb-3">
    <label class="form-label">Name of Organization (Recent)</label>
    <input type="text" name="org_recent" class="form-control" value="{{ old('org_recent') }}">
</div>

{{-- Designation Recent --}}
<div class="mb-3">
    <label class="form-label">Designation (Recent)</label>
    <input type="text" name="designation_recent" class="form-control" value="{{ old('designation_recent') }}">
</div>

{{-- Salary Desired --}}
<div class="mb-3">
    <label class="form-label">Salary Desired</label>
    <input type="text" name="salary_desired" class="form-control" value="{{ old('salary_desired') }}">
</div>

{{-- Postal Address --}}
<div class="mb-3">
    <label class="form-label">Postal Address</label>
    <textarea name="postal_address" class="form-control" rows="2">{{ old('postal_address') }}</textarea>
</div>

{{-- Current City --}}
<div class="mb-3">
    <label class="form-label">Current City</label>
    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
</div>

{{-- Attachments --}}
<div class="mb-3">
    <label class="form-label">Resume (PDF/DOC, Max 5MB)</label>
    <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
</div>

<div class="mb-3">
    <label class="form-label">Highest Degree Certificate (PDF/Image, Max 5MB)</label>
    <input type="file" name="degree_certificate" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
</div>
