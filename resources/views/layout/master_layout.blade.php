<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CPSU || Clinic</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('style/plugins/fontawesome-free-v6/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('style/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('style/dist/css/custom.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('style/plugins/toastr/toastr.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('style/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('style/plugins/fullcalendar1/fullcalendar.css') }}">
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('style/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('style/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        
    <!-- Logo  -->
    <link rel="shortcut icon" type="" href="{{ asset('style/dist/img/CPSU_L.png') }}">

    <style type="text/css">

    </style>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed text-sm">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light bg-greenn">
            <div class="container-fluid">
                <a href="" class="">
                    <img src="{{ asset('style/dist/img/MDHULogo.png') }}" alt="AdminLTE Logo" class="brand-image">
                    <span class="brand-text font-weight-light"></span>
                </a>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse"></div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" role="button" style="color: #fff !important">
                            <i class="fas fa-sign-out"></i> Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <nav class="main-header navbar navbar-expand-md navbar-light bottom-border-0" style="margin-top: 45px;">
            <div class="container-fluid">
                <a href="#" class=""></a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    @include('control.control_topmenu')
                </div>
            </div>
        </nav>

        <div class="content-wrapper" style="padding-top: 40px">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        
                    </div>
                </div>
            </div>

            <div class="content">
                @yield('body')
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                CPSU Clinic Management System
            </div>
            <!-- Default to the left -->
            <strong>Maintain and Manage by <a href="#">MIS</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('style/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('style/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('style/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('style/plugins/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('style/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('style/plugins/moment1/moment.min.js') }}"></script>
    <script src="{{ asset('style/plugins/fullcalendar1/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/event/calendar.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('style/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> 
    <script src="{{ asset('style/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('style/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('style/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('style/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script src="{{ asset('js/basic/table.js') }}"></script>

    @if(request()->is('home'))
    <!-- ChartJS -->
    <script src="style/plugins/chart.js/Chart.min.js"></script>
    @endif
    <script src="{{ asset('js/validation/patientValidation.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('style/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        });
    </script>
   
  

<script>
    // Store session message in sessionStorage
    @if(Session::has('success'))
        sessionStorage.setItem('successMessage', "{{ session('success') }}");
    @endif

    // Display the message if it's found in sessionStorage
    $(document).ready(function() {
        let message = sessionStorage.getItem('successMessage');
        if (message) {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "5000",
                "extendedTimeOut": "1000"
            };
            toastr.success(message);
            sessionStorage.removeItem('successMessage'); // Clear after showing
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100] 
        });
    });
</script>

    <script>
        function calculateAge() {
            var birthday = document.getElementById('bday').value;
            var today = new Date();
            var birthDate = new Date(birthday);
            var age = today.getFullYear() - birthDate.getFullYear();

            if (today.getMonth() < birthDate.getMonth() || (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.update-field').on('change', function() {
                var elementType = $(this).prop('tagName').toLowerCase();
                if (elementType === 'input' || elementType === 'textarea') {
                    columnid = $(this).data('column-id');
                    columnname = $(this).data('column-name');
                } else if (elementType === 'select') {
                    columnid = $(this).find('option:selected').data('column-id');
                    columnname = $(this).find('option:selected').data('column-name');
                }

                var value = $(this).val();

                $.ajax({
                    url: '{{ route("patientUpdate") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: columnid,
                        column: columnname,
                        value: value
                    },
                    success: function(response) {
                        
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            console.error('Validation errors:', errors);
                        } else {
                            console.error('Error:', error);
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.update-field1').on('change', function() {
            var columnId = $(this).data('column-id');
            var columnName = $(this).data('column-name');
            var value = $(this).val();
            var dataArray = $(this).data('array'); // Add this line

            $.ajax({
                url: "{{ route('patientHistory') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: columnId,
                    column: columnName,
                    value: value,
                    data_array: dataArray // Add this line
                },
                success: function(response) {
                    
                }
            });
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            $('#patient-select').change(function() {
                var selectedId = $(this).val();
                if (selectedId) {
                    var url = '{{ route("reportsRead", ":id") }}';
                    url = url.replace(':id', selectedId);
                    window.location.href = url;
                }
            });
        });
    </script>

    <script>
        function updateCoursePreferences(studCollege) {
        $.ajax({
                url: '{{ route("getCourse") }}?studCollege=' + studCollege,
                type: 'GET',
                success: function(data) {
                    updateCourseOptions('studCourse', data.course);
                },
                error: function() {
                    console.error('Error fetching course');
                }
            });
        }

        function updateCourseOptions(selectName, options) {
            const select = $('select[name=' + selectName + ']');
            select.empty();
            select.append('<option value="">Select Course</option>');
            $.each(options, function(key, value) {
                select.append('<option value="' + value.progAcronym + '">' + value.progAcronym + '</option>');
            });
        }

        $('#collegeSelect').change(function() {
            const selectedCollege = $(this).val();
            updateCoursePreferences(selectedCollege);
        });

    </script>
    @if(Route::currentRouteName() == 'dash')
    <script>
        $(function () {
            var donutChartCanvas = $('#donutChartPatient').get(0).getContext('2d')
            var donutData        = {
            labels: [
                'Student',
                'Employee',
                'Guest',
            ],
            datasets: [
                {
                data: [{{ count($pstudent) }},{{ count($pemployee) }},{{ count($pguest) }}],
                backgroundColor : ['#00a65a', '#00c0ef', '#3c8dbc'],
                }
            ]
            }
            var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
            }

            var donutChartCanvas1 = $('#donutChartRemarks').get(0).getContext('2d')
            var donutData1        = {
            labels: [
                'Fit for enrollment',
                'Not fit for enrollment',
                'Pending',
            ],
            datasets: [
                {
                data: [{{ count($remarks1) }},{{ count($remarks2) }},{{ count($remarks3) }}],
                backgroundColor : ['#00a65a', '#00c0ef', '#3c8dbc'],
                }
            ]
            }
            var donutOptions1     = {
            maintainAspectRatio : false,
            responsive : true,
            }

            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            new Chart(donutChartCanvas1, {
                type: 'doughnut',
                data: donutData1,
                options: donutOptions1
            })
        });
    </script>
    @endif
<script>
$(document).ready(function() {
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // AJAX request to get provinces based on selected region
    $('#region').change(function() {
        var regionId = $(this).val();
        if (regionId) {
            $.ajax({
                url: "{{ route('getProvinces', ['regionId' => ':regionId']) }}".replace(':regionId', regionId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#province').empty();
                    $('#province').append('<option value="">Select Province</option>');
                    $.each(data, function(key, value) {
                        let patientId = "{{ request()->is('patient/moreinfo/*') ? $patients->id : '' }}";
                        $('#province').append(
                            '<option value="' + value.province_id + 
                            '" data-column-id="' + patientId + 
                            '" data-column-name="home_province">' + 
                            value.name + '</option>'
                        );
                    });
                    $('#province').prop('disabled', false);
                },
                error: function() {
                    $('#province').empty();
                    $('#province').append('<option value="">Select Province</option>');
                    $('#province').prop('disabled', true);
                }
            });
        } else {
            $('#province').empty();
            $('#province').append('<option value="">Select Province</option>');
            $('#province').prop('disabled', true);
        }
    });

    // AJAX request to get cities based on selected province
    $('#province').change(function() {
        var provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: "{{ route('getCities', ['provinceId' => ':provinceId']) }}".replace(':provinceId', provinceId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                    $.each(data, function(key, value) {
                        let patientId = "{{ request()->is('patient/moreinfo/*') ? $patients->id : '' }}";
                        $('#city').append(
                            '<option value="' + value.city_id + 
                            '" data-column-id="' + patientId + 
                            '" data-column-name="home_city">' + 
                            value.name + '</option>'
                        );
                    });
                    $('#city').prop('disabled', false);
                },
                error: function() {
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                    $('#city').prop('disabled', true);
                }
            });
        } else {
            $('#city').empty();
            $('#city').append('<option value="">Select City</option>');
            $('#city').prop('disabled', true);
        }
    });

    // AJAX request to get barangays based on selected city
    $('#city').change(function() {
        var cityId = $(this).val();
        if (cityId) {
            $.ajax({
                url: "{{ route('getBarangays', ['cityId' => ':cityId']) }}".replace(':cityId', cityId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#barangay').empty();
                    $('#barangay').append('<option value="">Select Barangay</option>');
                    $.each(data, function(key, value) {
                        let patientId = "{{ request()->is('patient/moreinfo/*') ? $patients->id : '' }}";
                        $('#barangay').append(
                            '<option value="' + value.id + 
                            '" data-column-id="' + patientId + 
                            '" data-column-name="home_brgy">' + 
                            value.name + '</option>'
                        );
                    });
                    $('#barangay').prop('disabled', false);
                },
                error: function() {
                    $('#barangay').empty();
                    $('#barangay').append('<option value="">Select Barangay</option>');
                    $('#barangay').prop('disabled', true);
                }
            });
        } else {
            $('#barangay').empty();
            $('#barangay').append('<option value="">Select Barangay</option>');
            $('#barangay').prop('disabled', true);
        }
    });


    // AJAX request to get provinces based on selected region
    $('#region1').change(function() {
        var regionId = $(this).val();
        if (regionId) {
            $.ajax({
                url: "{{ route('getProvinces', ['regionId' => ':regionId']) }}".replace(':regionId', regionId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#province1').empty();
                    $('#province1').append('<option value="">Select Province</option>');
                    $.each(data, function(key, value) {
                        let patientId = "{{ request()->is('patient/moreinfo/*') ? $patients->id : '' }}";
                        $('#province1').append(
                            '<option value="' + value.province_id + 
                            '" data-column-id="' + patientId + 
                            '" data-column-name="guardian_province">' + 
                            value.name + '</option>'
                        );
                    });
                    $('#province1').prop('disabled', false);
                },
                error: function() {
                    $('#province1').empty();
                    $('#province1').append('<option value="">Select Province</option>');
                    $('#province1').prop('disabled', true);
                }
            });
        } else {
            $('#province1').empty();
            $('#province1').append('<option value="">Select Province</option>');
            $('#province1').prop('disabled', true);
        }
    });

    // AJAX request to get cities based on selected province
    $('#province1').change(function() {
        var provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: "{{ route('getCities', ['provinceId' => ':provinceId']) }}".replace(':provinceId', provinceId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#city1').empty();
                    $('#city1').append('<option value="">Select City</option>');
                    $.each(data, function(key, value) {
                        let patientId = "{{ request()->is('patient/moreinfo/*') ? $patients->id : '' }}";
                        $('#city1').append(
                            '<option value="' + value.city_id + 
                            '" data-column-id="' + patientId + 
                            '" data-column-name="guardian_city">' + 
                            value.name + '</option>'
                        );
                    });
                    $('#city1').prop('disabled', false);
                },
                error: function() {
                    $('#city1').empty();
                    $('#city1').append('<option value="">Select City</option>');
                    $('#city1').prop('disabled', true);
                }
            });
        } else {
            $('#city1').empty();
            $('#city1').append('<option value="">Select City</option>');
            $('#city1').prop('disabled', true);
        }
    });

    // AJAX request to get barangays based on selected city
    $('#city1').change(function() {
        var cityId = $(this).val();
        if (cityId) {
            $.ajax({
                url: "{{ route('getBarangays', ['cityId' => ':cityId']) }}".replace(':cityId', cityId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#barangay1').empty();
                    $('#barangay1').append('<option value="">Select Barangay</option>');
                    $.each(data, function(key, value) {
                        let patientId = "{{ request()->is('patient/moreinfo/*') ? $patients->id : '' }}";
                        $('#barangay1').append(
                            '<option value="' + value.id + 
                            '" data-column-id="' + patientId + 
                            '" data-column-name="guardian_brgy">' + 
                            value.name + '</option>'
                        );
                    });
                    $('#barangay1').prop('disabled', false);
                },
                error: function() {
                    $('#barangay1').empty();
                    $('#barangay1').append('<option value="">Select Barangay</option>');
                    $('#barangay1').prop('disabled', true);
                }
            });
        } else {
            $('#barangay1').empty();
            $('#barangay1').append('<option value="">Select Barangay</option>');
            $('#barangay1').prop('disabled', true);
        }
    });
});
</script>
<script>
    // Function to get BMI category based on BMI value
    function getBMICategory(bmi) {
        if (bmi < 16.0) {
            document.getElementById('bmi_cat').value = "Severely Underweight";    
        } else if (bmi >= 16.0 && bmi <= 18.4) {
            document.getElementById('bmi_cat').value = "Underweight";
        } else if (bmi >= 18.5 && bmi <= 24.9) {
            document.getElementById('bmi_cat').value = "Normal";
        } else if (bmi >= 25.0 && bmi <= 29.9) {
            document.getElementById('bmi_cat').value = "Overweight";
        } else if (bmi >= 30.0 && bmi <= 34.9) {
            document.getElementById('bmi_cat').value = "Moderately Obese";
        } else if (bmi >= 35.0 && bmi <= 39.9) {
            document.getElementById('bmi_cat').value = "Severely Obese";
        } else if (bmi >= 40.0) {
            document.getElementById('bmi_cat').value = "Morbidly Obese";
        } else {
            document.getElementById('bmi_cat').value = ''; 
        }
    }

    $(document).ready(function() {
        setInterval(function() {
            const bmiValue = parseFloat(document.getElementById('bmi').value); 
            getBMICategory(bmiValue);
        }, 100); 
    });
</script>
<script>
    // Function to calculate BMI
    function calculateBMI(weightKg, heightM) {
        if (weightKg && heightM) {
            var bmi = weightKg / (heightM * heightM);
            return bmi.toFixed(1); // Round BMI to one decimal point
        } else {
            return ""; // Return empty string if either value is missing
        }
    }
    
    // Convert height from centimeters to feet and inches
    function convertHeight() {
        var cm = parseFloat(document.getElementById('height_cm').value);
        if (!isNaN(cm)) {
            var totalInches = cm / 2.54;
            var feet = Math.floor(totalInches / 12);
            var inches = Math.round(totalInches % 12); // Round inches to nearest whole number
            var formattedHeight = feet + "'" + inches + '"';
            document.getElementById('height_ft').value = formattedHeight;

            // Calculate BMI
            var weightKg = parseFloat(document.getElementById('weight_kg').value);
            var heightM = cm / 100; // Convert cm to meters for BMI calculation
            var bmi = calculateBMI(weightKg, heightM);
            document.getElementById('bmi').value = bmi; // Display BMI
        } else {
            document.getElementById('height_ft').value = '';
            document.getElementById('bmi').value = ''; // Clear BMI if height is N/A
        }
    }

    // Convert height from feet and inches to centimeters
    function convertHeightToFtIn() {
        var heightFt = document.getElementById('height_ft').value;
        if (heightFt) {
            var feet = parseFloat(heightFt.split("'")[0]);
            var inches = parseFloat(heightFt.split("'")[1].replace('"', ''));
            var totalInches = feet * 12 + inches;
            var cm = totalInches * 2.54;
            document.getElementById('height_cm').value = Math.round(cm); // Round cm to nearest whole number

            // Calculate BMI
            var weightKg = parseFloat(document.getElementById('weight_kg').value);
            var heightM = cm / 100; // Convert cm to meters for BMI calculation
            var bmi = calculateBMI(weightKg, heightM);
            document.getElementById('bmi').value = bmi; // Display BMI
        } else {
            document.getElementById('height_cm').value = '';
            document.getElementById('bmi').value = ''; // Clear BMI if height is N/A
        }
    }

    // Event listener for height in centimeters
    document.getElementById('height_cm').addEventListener('input', function() {
        convertHeight();
    });

    // Event listener for height in feet and inches
    document.getElementById('height_ft').addEventListener('input', function() {
        convertHeightToFtIn();
    });

    // Event listener for weight in kilograms
    document.getElementById('weight_kg').addEventListener('input', function() {
        var weightKg = parseFloat(this.value);
        if (!isNaN(weightKg)) {
            var weightLb = weightKg * 2.20462;
            document.getElementById('weight_lb').value = Math.round(weightLb); // Round weight in pounds
        } else {
            document.getElementById('weight_lb').value = '';
        }

        // Calculate BMI
        var heightCm = parseFloat(document.getElementById('height_cm').value);
        var bmi = calculateBMI(weightKg, heightCm / 100); // Convert cm to meters for BMI calculation
        document.getElementById('bmi').value = bmi; // Display BMI
    });

    // Event listener for weight in pounds
    document.getElementById('weight_lb').addEventListener('input', function() {
        var weightLb = parseFloat(this.value);
        if (!isNaN(weightLb)) {
            var weightKg = weightLb / 2.20462;
            document.getElementById('weight_kg').value = Math.round(weightKg); // Round weight in kilograms
        } else {
            document.getElementById('weight_kg').value = '';
        }

        // Calculate BMI
        var heightCm = parseFloat(document.getElementById('height_cm').value);
        var bmi = calculateBMI(weightKg, heightCm / 100); // Convert cm to meters for BMI calculation
        document.getElementById('bmi').value = bmi; // Display BMI
    });

    // Initial conversion on page load
    convertHeight();
</script>

<script>
    $(document).ready(function() {
        $('.medicine-delete').on('click', function() {
            var medicineId = $(this).data('id');

            var row = $('#tr-' + medicineId);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = '{{ route("medicineDelete", ":id") }}'.replace(':id', medicineId);

                    $.ajax({
                        url: url,
                        type: 'delete',
                        success: function(response) {
                            console.log("Server response:", response);
                            if(response.status == 200) {
                                row.fadeOut(500, function() {
                                    $(this).remove();
                                });
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'The record has been deleted.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            } 
                        }
                    });
                }
            });
        });
    });
</script>
<script>
$(document).ready(function() {
    $('.file-delete').on('click', function() {
        var fileId = $(this).data('id');
        var row = $('#tr-file-' + fileId);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = '{{ route("deleteFile", ":id") }}'.replace(':id', fileId);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        console.log("Server response:", response);
                        if(response.status === 200) {
                            // Fade out and remove the row
                            row.fadeOut(500, function() {
                                $(this).remove();
                            });
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'The file has been deleted.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete the file. Please try again.',
                                icon: 'error'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Could not reach the server. Please check your connection and try again.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $('.complaint-delete').on('click', function() {
        var complaintId = $(this).data('id');
        var row = $('#tr-' + complaintId);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = '{{ route("complaintDelete", ":id") }}'.replace(':id', complaintId);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        console.log("Server response:", response);
                        if(response.status === 200) {
                            // Fade out and remove the row from the interface
                            row.fadeOut(500, function() {
                                $(this).remove();
                            });
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'The record has been deleted.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete the record. Please try again.',
                                icon: 'error'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Could not reach the server. Please check your connection and try again.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
});

</script>
<script>
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = '{{ asset('transac/transaction1.css') }}'; 
    document.head.appendChild(link);
</script>
<script>
$(document).ready(function() {
    $.ajax({
        url: "{{ route('patientListOption') }}", 
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#mySelect').empty();
            $('#mySelect').append('<option value="">Select Patient</option>');
            $.each(response.data, function(index, patient) {
              
                let isSelected = '';
                @if(isset($patientSearch))
                    if ({{ $patientSearch->id }} === patient.id) {
                        isSelected = 'selected';
                    }
                @endif
                $('#mySelect').append('<option value="' + patient.id + '" ' + isSelected + '>' + patient.fname + ' ' + patient.lname + ' ' + patient.mname + '</option>');
            });
        },
        error: function() {
            alert('Error loading patients');
        }
    });
});
</script>
<script>
function add() {
    const addpatient = document.getElementById('addpatientId');

    
    if (addpatient.style.display === 'none' || addpatient.style.display === '') {
        addpatient.style.display = 'block'; 
    } else {
        addpatient.style.display = 'none'; 
    }
}
</script>
 <script>
    function closeDiv() {
        document.getElementById("addpatientId").style.display = "none";
    }
</script>
@isset($id)
<script>
$(document).ready(function() {
    $('.patients-data').DataTable({
        "ajax": "{{ route('patients.data', ['id' => $id]) }}",
        responsive: true,
        lengthChange: true,
        searching: true,
        paging: true,
        "columns": [
            { data: 'id'},
            { data: 'full_name'},
            { data: 'age' },
            { data: 'sex' },
            { data: 'c_status' },   
            @if($id == 1)
            { 
                data: 'pexam_remarks', 
                render: function(data, type, row) {
                    if (data === 1) {
                        return '<span class="badge badge-success">Fit for enrollment</span>';
                    } else if (data === 2) {
                        return '<span class="badge badge-danger">Not fit for enrollment</span>';
                    } else if (data === 3) {
                        return `<span class="badge badge-warning" data-toggle="tooltip" title="${row.pend_reason}">Pending</span>`;
                    } else {
                        return '';
                    }
                }
            },
            @endif
            {
                data: 'id',
                render: function(data, type, row) {
                    var moreInfoUrl = "{{ route('moreInfo', ['id' => ':category', 'mid' => ':id']) }}".replace(':category', row.category).replace(':id', data);
                    var fileReadUrl = "{{ route('fileRead', ['cat' => ':category', 'id' => ':id']) }}".replace(':category', row.category).replace(':id', data);
                    var reportsReadUrl = "{{ route('reportsRead', ':id') }}".replace(':id', data);

                    return `
                        <div class="btn-group">
                            <a href="${moreInfoUrl}" class="mr-1 btn btn-info btn-sm text-light" title="More Info">
                                <i class="fas fa-exclamation-circle"></i> 
                            </a>
                            <a href="${fileReadUrl}" class="mr-1 btn btn-success btn-sm" title="File Info">
                                <i class="fas fa-file"></i> 
                            </a>
                            <a href="${reportsReadUrl}" class="mr-1 btn btn-warning btn-sm" title="Pre-Entrance Health Examination Report">
                                <i class="fas fa-file-pdf"></i> 
                            </a>
                            <button class="mr-1 btn btn-danger btn-sm patient-delete" data-id="${data}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ],
        initComplete: function(settings, json) {
            var api = this.api();
            api.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        },
        "createdRow": function (row, data, dataIndex) {
            $(row).attr('id', 'tr-' + data.id);
        }
    });
});
</script>
@endisset
@include('script.patientVisitScript')
</body>
</html>
