function showJobDetails(id, title, university, jobType, description, applications, contact, uploadDate) {
    document.getElementById('modalJobTitle').innerText = title;
    document.getElementById('modalUniversityName').innerText = university;
    document.getElementById('modalJobType').innerText = jobType;
    document.getElementById('modalDescription').innerText = description;
    document.getElementById('modalApplications').innerText = applications + " applications";
    document.getElementById('modalContact').innerText = contact;
    document.getElementById('modalUploadDate').innerText = uploadDate;

    // 🔹 Update Apply Now button link dynamically
    document.querySelector('#jobModal .btn-apply-modal').href = `/apply/${id}`;
}
