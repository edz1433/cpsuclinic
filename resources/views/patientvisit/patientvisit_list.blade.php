
@extends('layout.master_layout')

@section('body')
<style>
    .mtop {
        margin-top: -15px;
    }
    .divmodal{
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        height: 700px;
        position: absolute;
        z-index: 1;
    }
    .divadd{
        position:relative;
        top:150px;
      
    }
   
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
               
                @include('patientvisit.side_menu_patientvisit')
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                        @csrf
                        <div class="page-header" style="border-bottom: 1px solid #04401f;" >
                        <h4>Patient Information</h4>
                        </div>
                        <div class="form-group mt-2">
                            <div class="form-row">
                            <div class="col-md-12">
                                <label class="badge badge-secondary">List of Patients</label><br>
                                <div style="display:flex">
                                <select id="mySelect" name="id" class="form-control mb-3 select2 form-control-sm update-field" onchange="visitSearch()" style="width:100%">
                                <option value="">Select Patient</option>
                                </select>
                                @if (!isset($patientSearch))
                            @else
                    <button type="button" class="btn btn-success btn-sm add-button ml-3" onclick="add()">
                        <i class="fa fa-plus"></i> 
                             </button>
                                @endif</div>
                                @if(isset($patientSearch))
                                <div class="mt-3" >
                                    <table id="example2" class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Medicine Quantity</th>
                                                <th>Chief Complaint</th>
                                                <th>Treatment</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($patientVisit as $data)
                                            @php 
                                                $medicineValues = explode(',', $data->medicine); 
                                                $quantities = explode(',', $data->qty); 
                                            @endphp 
                                            <tr> 
                                                <td>{{ $data->date }}</td> 
                                                <td>{{ $data->time }}</td>
                                                <td>
                                                @foreach($medicineValues as $index => $medicineId) 
                                                @if(isset($meddata[$medicineId]) && isset($quantities[$index])) 
                                                    {{ $meddata[$medicineId] }} <i class="bi bi-dash"></i>  {{ $quantities[$index] }}
                                                    @if(!$loop->last)<br>@endif 
                                                @endif
                                            @endforeach                                                                             
                                                </td>
                                                <td>{{ $data->chief_complaint }}</td> 
                                                <td>{{$data->treatment}}</td>            
                                                <td>
                                            <div class="d-flex align-items-center mt-2">
                                            <div class="btn-group">

                                            <button type="button" class="fas fa-file-pdf text-danger fa-1x pdfbtn1" style="border:1px red solid; border-top-left-radius:5px;border-bottom-left-radius:5px;">
                                                <i class=""></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle dropdown-icon pdfbtn2"data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <div class="dropdown-menu ml-n5" role="menu">
                                                 <a class="dropdown-item" href="#">Action</a>
                                                 <a class="dropdown-item" href="#">Another action</a>
                                                 <a class="dropdown-item" href="#">Something else here</a>
                                                 <a class="dropdown-item" href="#">Separated link</a>
                                            </div>

                                            <a class="btn btn-info btn-sm btninfo1 ml-1"
                                            href="{{ route('transaction', $data->id) }}" title="edit" style="border-radius: 0.25rem;">
                                            <i class="fas fa-exclamation-circle text-light fa-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    @endforeach   
                                </tr>                                     
                            </tbody>
                        </table>
                        @else
                    </div>
                 @endif 
                </div>
             </div>
         </div>                     
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="divmodal ml-n2 mt-n5 " style="display:none;top: 70px" onclick="closeDiv()"  id="addpatientId" > 
<div class="justify-content-center d-flex" >
<div class="col-md-5 mt-3 divadd"  onclick="event.stopPropagation();">
            <div class="card">
                <div class="card-body">
                    <form method="post"  action="{{route('addPatient')}}" class="form-horizontal" >
                        @csrf
                        <div class="divaddcontent">
                        <div class="page-header" style="border-bottom: 1px solid #04401f;">
                        <button type="button" class="btn  btn-sm add-button ml-2 times" style="position:relative;left:90%;background-color:white" onclick="add()">
                        <i class="fa fa-times" style="color:red;font-size:20px";></i> 
                        </button>
                        <h4>Add</h4>
                        </div>
                        </div>
                        <div class="form-group mt-2">
                            <div class="form-row"> 
                            @if(isset($patientSearch))
                            <input value="{{$patientSearch->id}}" type="hidden" name="stid">
                            @endif
                                <div class="col-md-6">
                                    <label class="badge badge-secondary">Date</label><br>
                                    <input type="date" name="date" class="form-control form-control-sm" value="{{$date}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="badge badge-secondary">Time</label><br>
                                   <input type="text" name="time" class="form-control form-control-sm" value="{{ date('h:i A') }}">
                                </div>
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <button type="button"  class="btn btn-danger btn-sm add-button " onclick="add()">
                                    <i class="fa fa-times "></i> Close
                                    </button>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                  </form>
                                </div>
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function closeDiv() {
        document.getElementById("addpatientId").style.display = "none";
    }
</script>

<style type="text/css">
    .times{
        border: none; 
        transition: 0.1s;
        color
    }
     .times:hover{
         transform: scale(1.1);
         border: none; 
     }
</style>

@endsection












































