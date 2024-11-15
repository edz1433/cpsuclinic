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












