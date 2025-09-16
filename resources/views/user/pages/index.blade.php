@include('user.layouts.header')


<!-- Jobs Section -->
<section id="jobs" class="jobs-section">
    <div class="container">
      <div class="section-title">
        <h2>Latest Job Opportunities</h2>
        <p>Discover exciting career opportunities at Mohammad Ali Jinnah University</p>
      </div>
  
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Showing {{ $jobs->count() }} jobs</h5>
        <div class="d-flex align-items-center gap-2">
          <label for="sortJobs" class="form-label mb-0">Sort by:</label>
          <select id="sortJobs" class="form-select w-auto" style="padding-right: 2rem;">
            <option>Newest First</option>
            <option>Oldest First</option>
            <option>Job Title</option>
          </select>
        </div>
      </div>
  
      <!-- Job Cards Row -->
      <div class="row g-4">
         @if($jobs->isEmpty())
        <div class="col-12">
            <h1 class="text-center text-muted">No jobs available at the moment.</h1>
        </div>
    @else
        @foreach($jobs as $job)
          <div class="col-lg-4 col-md-6">
            <div class="job-card">
              <div class="job-status {{ $job->status === 'Active' ? 'status-active' : 'status-inactive' }}">
                {{ $job->status }}
              </div>
              <div class="job-header">
                <h3 class="job-title">{{ $job->title }}</h3>
                <div class="job-university">Mohammad Ali Jinnah University</div>
                <span class="job-type">{{ $job->job_type }}</span>
              </div>
              <div class="job-meta">
                <span><i class="fas fa-map-marker-alt"></i> Karachi, Pakistan</span>
                <span><i class="fas fa-users"></i> {{ rand(10,80) }} applications</span> 
                {{-- Fake for now --}}
              </div>
  
              <div class="job-actions">
                <div>
                   <button class="btn btn-apply" data-bs-toggle="modal" data-bs-target="#jobModal"
                      onclick='showJobDetails(
                          @json($job->id),
                          @json($job->title),
                          @json("Mohammad Ali Jinnah University"),
                          @json($job->job_type),
                          @json(Str::limit($job->description, 1500)),
                          @json(rand(10,80)),
                          @json($job->contact ?? "careers@jinnah.edu"),
                          @json($job->created_at->diffForHumans())
                      )'>
                      <i class="fas fa-eye me-2"></i> View Detail
                  </button>      
                </div>
                <div class="d-flex align-items-center gap-2">
                  <span class="job-date">{{ $job->created_at->diffForHumans() }}</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    @endif
      </div>
    </div>
  </section>


        <!-- Job Detail Modal -->
        <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="jobModalLabel">Job Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                         <div class="col-md-6">
                        <div class="job-detail-item">
                            <span class="job-detail-label">Job Title</span>
                            <div class="job-detail-value" id="modalJobTitle"></div>
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="job-detail-item">
                            <span class="job-detail-label">Job Type</span>
                            <div class="job-detail-value" id="modalJobType"></div>
                        </div>
                        </div>
                        </div>

                        <div class="job-detail-item">
                            <span class="job-detail-label">University Name</span>
                            <div class="job-detail-value" id="modalUniversityName"></div>
                        </div>
                        
                        
                        <div class="job-detail-item">
                            <span class="job-detail-label">Description</span>
                            <div class="job-detail-value job-description" id="modalDescription"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="job-detail-item">
                                    <span class="job-detail-label">Total Applications</span>
                                    <div class="job-detail-value" id="modalApplications"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="job-detail-item">
                                    <span class="job-detail-label">Upload Date</span>
                                    <div class="job-detail-value" id="modalUploadDate"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="job-detail-item">
                            <span class="job-detail-label">Contact Information</span>
                            <div class="job-detail-value" id="modalContact"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                     <a id="applyLink"
   href="{{ auth()->check() ? route('applications.create', $job->id) : route('login.form') }}"
   class="btn btn-apply-modal">
   <i class="fas fa-paper-plane me-2"></i> Apply Now
</a>

                  </div>

                    
                    
                </div>
            </div>
        </div>
    


@include('user.layouts.footer')