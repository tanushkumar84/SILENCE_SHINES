document.addEventListener("DOMContentLoaded", function() {
    const jobListings = document.querySelector('.jobListings');

    // Handle "Apply Now" button clicks
    jobListings.addEventListener('click', function(event) {
        if (event.target.matches('button')) {
            const applyLink = event.target.dataset.applyLink;
            if (applyLink) {
                window.location.href = applyLink;
            }
        }
    });
});
