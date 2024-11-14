<a id="testajax" href="javascript:void(0);">test</a>

<!-- An element where the new content will be injected -->
<div id="contentArea"></div>

<script>
    document.getElementById('testajax').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default link behavior
        
        var url = "{{ route('test2') }}"; // Dynamically set the URL from the Blade route helper

        // Send an AJAX request to the route
        fetch(url, {
            method: 'GET', // Or 'POST' if needed
            headers: {
                'Content-Type': 'application/json',
                // Add any necessary headers (like CSRF tokens for POST requests)
            }
        })
        .then(response => response.text()) // Get the HTML content from the server
        .then(data => {
            // Inject the returned HTML content into a specific part of the page
            document.getElementById('contentArea').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
