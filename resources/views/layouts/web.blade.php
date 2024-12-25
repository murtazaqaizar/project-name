<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="bg-danger">
    <div class="container">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/download (1).png') }}" width="130" height="130" alt="Logo" class="me-3">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/now-showing') }}">Now Showing</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/coming-soon') }}">Coming Soon</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#location_section">Locations</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#contact_sections">Contacts</a></li>
            </ul>
            <div class="search-container">
    <input 
        type="text" 
        id="searchInput" 
        placeholder="Search by Name or Category" 
    />
    <div id="searchResults" class="dropdown-content" style="display: none;">
        <!-- Dynamic dropdown items will be added here -->
    </div>
</div>
    </div>
</header>

<main >
        @yield('content') <!-- This is where child views will be inserted -->
    </main>

<footer>

</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const query = this.value;

            if (query.length > 0) {
                fetch(`/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const resultsContainer = document.getElementById('searchResults');
                        resultsContainer.innerHTML = ''; // Clear previous results
                        resultsContainer.style.display = 'block'; // Show dropdown

                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.textContent = `${item.name} `; // Adjust based on your data structure
                            resultsContainer.appendChild(div);
                        });
                    });
            } else {
                document.getElementById('searchResults').style.display = 'none'; // Hide dropdown if input is empty
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src = "js/script.js"></script>
</body>
</html>