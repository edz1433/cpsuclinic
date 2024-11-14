<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script>
    function visitSearch() {
        var selectedValue = document.getElementById("mySelect").value;
        if (selectedValue) {
            // Replace 'visitSearch' with the name of your route
            var url = "{{ route('visitSearch', ':id') }}";
            url = url.replace(':id', selectedValue);
            window.location.href = url;
        }
    }
</script>












