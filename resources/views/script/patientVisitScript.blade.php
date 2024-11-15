<script>
function visitSearch() {
    var selectedValue = document.getElementById("mySelect").value;
    if (selectedValue) {
        // Disable select to prevent further interaction
        $('#mySelect').prop('disabled', true);

        // Replace 'visitSearch' with the name of your route
        var url = "{{ route('visitSearch', ':id') }}";
        url = url.replace(':id', selectedValue);

        // Redirect after a short delay to allow the UI to update
        setTimeout(function() {
            window.location.href = url;
        }, 100); // 100 ms delay before redirecting
    }
}
</script>












