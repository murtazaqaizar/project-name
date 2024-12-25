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
        placeholder="Search by Name" 
    />
    <div id="searchResults" class="dropdown-content" style="display: none;">
        <!-- Dynamic dropdown items will be added here -->
    </div>
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
    $(document).ready(function() {
        $('#movie-search').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 0) {
                // Perform the AJAX request
                $.ajax({
                    url: "{{ route('search') }}", // Ensure this route exists
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        // Update the results section with the response
                        $('#movie-results').html(response).show(); // Show results
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                $('#movie-results').empty().hide(); // Hide results if input is empty
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src = "js/script.js"></script>
</body>
</html>