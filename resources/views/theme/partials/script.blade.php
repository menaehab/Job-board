<script>
    const itemsPerPage = 5;
    let currentPage = 1;

    function displayJobs() {
        const jobList = document.getElementById("job-list");
        const jobItems = document.querySelectorAll("#job-list .job-item");
        const pagination = document.getElementById("pagination");

        jobItems.forEach(job => job.style.display = "none");

        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        for (let i = start; i < end && i < jobItems.length; i++) {
            jobItems[i].style.display = "block";
        }

        pagination.innerHTML = "";
        const totalPages = Math.ceil(jobItems.length / itemsPerPage);
        if (totalPages > 1) {
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement("button");
                button.classList.add("btn", "btn-primary", "mx-1");
                button.innerText = i;
                button.onclick = () => {
                    currentPage = i;
                    displayJobs();
                };
                if (i === currentPage) {
                    button.classList.add("btn-primary");
                }
                pagination.appendChild(button);
            }
        }
    }

    displayJobs();
</script>

<!-- JavaScript Libraries -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('theme') }}/lib/wow/wow.min.js"></script>
<script src="{{ asset('theme') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('theme') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('theme') }}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('theme') }}/js/main.js"></script>
