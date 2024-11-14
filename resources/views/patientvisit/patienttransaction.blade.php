
@extends('layout.master_layout')
@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="">
                    @include('patientvisit.side_menu_patientvisit') 
                        <div class="mt-3" style="font-size: 13pt;">
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9" >
            <div class="card">
                <div class="card-body">
                    @if(isset($patientVisit)) 
                        @foreach($patientVisit as $data)
                            <form method="post" action="{{ route('addItem', ['id' => $data->id]) }}">
                                @csrf
                                <div class="page-header" style="border-bottom: 1px solid #04401f;">
                                <h4>Personal Information</h4>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <div class="form-group mt-2">
                                            <div class="form-row">
                                                <div class="col-md-12" >
                                                    <label class="badge badge-secondary">Patient Name</label><br>
                                                    <input type="text"  readonly class="form-control form-control-sm" value="{{$data->fname}} {{$data->lname}} {{$data->mname}}">
                                                </div>                            
                                                <div class="col-md-4">
                                                    <label class="badge badge-secondary ">Date</label><br>
                                                    <input type="date" name="date" class="form-control form-control-sm" value="{{ \Carbon\Carbon::parse($data->date)->format('Y-m-d') }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="badge badge-secondary ">Time</label><br>
                                                    <input type="text" name="time"  class="form-control form-control-sm" value="{{$data->time}}">
                                                </div>
                                                <div class="col-md-4 mt-n1">
                                                    <label class="badge badge-secondary  mt-2">Chief Complaint</label><br>
                                                    <select  name="chief_complaint" class="form-select select2 form-control-sm update-field">
                                                    @foreach($complaints as $complaint)
                                                    <option value="{{ $complaint->id }}" {{ $data->chief_complaint == $complaint->id ? 'selected' : '' }}>
                                                    {{ $complaint->complaint }}
                                                     </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="badge badge-secondary mt-2">Treatment</label><br>
                                                    <textarea class="form-control smooth-gray-placeholder" name="treatment" rows="7">{{$data->treatment}}</textarea>
                                                </div>
                                            <div class="col-md-6 mt-2">
                                        <label class="badge badge-secondary">Certificate</label><br>
                                    <div class="d-flex">
                                        <div class="form-check me-6 radio">
                                            <input class="form-check-input" type="radio" name="certificate" id="withCertificate" value="1">
                                                 <label class="form-check-label" for="withCertificate">Yes</label>
                                                    </div>
                                                    <div class="form-check me-6 radio">
                                                    <input class="form-check-input" type="radio" name="certificate" id="withoutCertificate" value="0" checked>
                                                 <label class="form-check-label" for="withoutCertificate">No</label>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-row">
                                        <div class="col-md-6" >
                                        <label class="badge badge-secondary mt-2 ml-n2">Medicine</label>
                                        </div> 
                                        <div class="col-md-6 quantity mt-1 ">
                                       <label class="badge badge-secondary" style="position: relative;left:13%">Quantity</label>
                                        </div>   
                                        <div id="dynamic-fields" class="mb-3">
                                    @if($patientVisit && count($patientVisit) > 0)
                            @foreach($patientVisit as $data)
                            @php 
                                $medicineValues = explode(',', $data->medicine); 
                                $quantities = explode(',', $data->qty); 

                                $maxCount = max(count($medicineValues), count($quantities));
                                $medicineValues = array_pad($medicineValues, $maxCount, '');
                                $quantities = array_pad($quantities, $maxCount, ''); 
                            @endphp
                            @php $no = 1; @endphp
                            @foreach($medicineValues as $index => $medicineId)
                                <div class="row mb-3 align-items-end">
                                <div class="col-md-8">
                                <select id="mySelect{{ $no++ }}" name="medicine[]" class="form-select select2 form-control-sm update-field">
                                <option value="">{{ $medicineId ? ($meddata[$medicineId] ?? 'Select Medicine') : 'Select Medicine' }}</option>
                            @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}" {{ $medicine->id == $medicineId ? 'selected' : '' }}>
                                {{ $medicine->medicine }}-{{ $medicine->qty }}
                                </option>
                            @endforeach
                                </select>
                                </div>
                                    <div class="col-md-4 quantityinput">
                                    <input type="number" value="{{ isset($quantities[$index]) ? $quantities[$index] : '' }}" placeholder="Quantity" name="qty[]" class="form-control form-control-sm" style="font-size: 0.9rem;">
                            </div>
                            </div>
                                 @if(!isset($quantities[$index]))
                                <div class="alert alert-danger" role="alert">
                                Quantity for medicine ID {{ $medicineId }} is missing.
                            </div>
                                 @endif
                             @endforeach
                          @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
                             No patient visit data available. Please add some entries.
                                </div>
                                    @endif
                                    <div class=" col-md-11 wave-container " id="hr" style="display:none">
                                    <div class="wave  mt-n2" ></div><br><br>
                                    </div>
                                </div>        
                                <div class="col-md-12">
                                <button type="button" class="btn btn-success btn-sm add-button " onclick="openremove()">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                                <button type="button" id="myremove" class="btn btn-danger btn-sm remove-button btnremove" style="display:inline-block;">
                                    <i class="fa fa-minus "></i> Remove
                                </button>
                             </div>
                         </div>
                    </div> 
                        <div class="col-md-12">
                             <button type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-save"></i> Save
                                    </button>
                                        </div>
                                    </div>
                                 </form>
                                 @endforeach
                                 @endif         
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
        <script>
     document.addEventListener('DOMContentLoaded', () => {
    // Initialize Select2 for all select elements with the 'select2' class
    $('.select2').select2({
        width: '100%'  // Set Select2 width to 100% to ensure it matches the container
    });

    // Function to apply consistent width to all select elements with 'update-field' class
    function setSelectWidth() {
        const selects = document.querySelectorAll('.update-field');
        selects.forEach(select => {
            select.style.width = '100%';  // Ensures each select takes full width of its parent container
        });
    }

    // Call the function initially to set width for existing selects
    setSelectWidth();

    // Function to toggle visibility of the Remove button
    function toggleRemoveButton() {
        const rows = document.querySelectorAll('#dynamic-fields .row');
        const removeButton = document.getElementById('myremove');
        removeButton.style.display = rows.length > 1 ? 'inline-block' : 'none';
    }

    // Initial call to set the button visibility
    toggleRemoveButton();

    // Event listener for the Add button
    document.querySelector('.add-button').addEventListener('click', function () {
        const dynamicFieldsContainer = document.getElementById('dynamic-fields');
        const newRow = document.createElement('div');
        newRow.className = 'row mb-3 align-items-end';

        newRow.innerHTML = `
            <div class="col-md-8">
                <select name="medicine[]" class="form-select select2 form-control-sm update-field">
                    <option value="">Select Medicine</option>
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->id }}">
                            {{ $medicine->medicine }}-{{ $medicine->qty }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" placeholder="Quantity" name="qty[]" class="form-control form-control-sm">
            </div>
        `;

        // Append the new row to the container
        dynamicFieldsContainer.appendChild(newRow);

        // Reinitialize Select2 for the new select element
        $(newRow).find('.select2').select2({
            width: '100%'
        });

        // Apply consistent width to all select elements
        setSelectWidth();

        // Update Remove button visibility
        toggleRemoveButton();
    });

    // Event listener for the Remove button
    document.getElementById('myremove').addEventListener('click', function () {
        const dynamicFieldsContainer = document.getElementById('dynamic-fields');
        const rows = dynamicFieldsContainer.getElementsByClassName('row');

        // Only remove if there’s more than one row
        if (rows.length > 1) {
            dynamicFieldsContainer.removeChild(rows[rows.length - 1]);
        }

        // Update Remove button visibility after removing a row
        toggleRemoveButton();
    });
});
</script>
@endsection

