function showJobDetails(title, university, jobType, description, applications, contact, uploadDate) {
    document.getElementById('modalJobTitle').innerText = title;
    document.getElementById('modalUniversityName').innerText = university;
    document.getElementById('modalJobType').innerText = jobType;
    document.getElementById('modalDescription').innerText = description;
    document.getElementById('modalApplications').innerText = applications + " applications";
    document.getElementById('modalContact').innerText = contact;
    document.getElementById('modalUploadDate').innerText = uploadDate;
}
