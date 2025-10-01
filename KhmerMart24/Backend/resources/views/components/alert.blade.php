<!-- Finally, show session alerts AFTER all scripts are loaded -->
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showSuccessAlert("{{ session('success') }}");
        });
    </script>
@endif

@if (session('error'))
    <script>
        $(document).ready(function() {
            showErrorAlert("{{ session('error') }}");
        });
    </script>
@endif
