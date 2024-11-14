<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
@php
$route = request()->route()->getName();
@endphp
        <div class="">
        <div class="mt-3" style="font-size: 13pt;">
        <div class=" d-flex align-items-center mt-2">
        <div class="file-thumbnail text-center">
        
            </div>
            <div class="page-header" style="border-bottom: 1px solid #04401f;">
             <h4 class="file-name ml-2 mb-0">Attachment</h4>
             </div>
                 </div>    
                    <div class="nav flex-column nav-pills nav-stacked nav-tabs-right h-100" aria-orientation="vertical">
                        <div class="table-responsive p-0" id="myDiv">
                             @if(isset($patientVisit) && count($patientVisit) > 0)
                                @php $patient = $patientVisit[0]; @endphp <!-- Get the first patient -->
                                <a href="{{ route('reportsRead', $patient->stid) }}" target="_blank" style="text-decoration:none">
                                 <div class="d-flex align-items-center mt-2">
                                <div class="file-thumbnail text-center">
                                <i class="fas fa-file-pdf text-danger ml-2 fa-1x"></i>
                                </div>
                                <p class="file-name ml-2 mb-0">Pre-entrance health examination</p>
                                </div>
                                </a>
                                @endif
                            @if(isset($files))
                            @foreach($files as $file)
                                <a href="{{ asset('Uploads/'. $file->file) }}" target="_blank" style="text-decoration:none">
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="file-thumbnail text-center">
                                            <i class="fas fa-file-pdf text-danger ml-2 fa-1x"></i>
                                        </div>
                                        <p class="file-name ml-2 mb-0">{{ $file->file }}</p>
                                    </div>
                                </a>
                        @endforeach
                        @else
   