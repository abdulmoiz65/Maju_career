{{-- resources/views/user/pages/apply.blade.php --}}



<div class="container my-5">
    <h2 class="mb-4 text-capitalize">Apply for {{ str_replace('_',' ', $job_type) }}</h2>

    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="job_type" value="{{ $job_type }}">

        {{-- 🔹 Common Fields --}}
        <div class="mb-3">
            <label class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Contact <span class="text-danger">*</span></label>
            <input type="text" name="contact" class="form-control" required value="{{ old('contact') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" name="dob" class="form-control" required value="{{ old('dob') }}">
        </div>


@if($job_type === 'permanent_faculty')
    @include('user.pages.forms.permanent')

@elseif($job_type === 'visiting_faculty')
    @include('user.pages.forms.visiting')

@elseif($job_type === 'staff')
    @include('user.pages.forms.staff')
@endif

        <button type="submit" class="btn btn-primary mt-3">Submit Application</button>
    </form>
</div>


