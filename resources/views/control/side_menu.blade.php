@php $route = request()->route()->getName(); @endphp
<div class="mt-3" style="font-size: 13pt;">
    <div class="nav flex-column nav-pills nav-stacked nav-tabs-right h-100" aria-orientation="vertical">
        <a class="nav-link {{ request()->is('patient/add*') ? 'active' : '' }}" href="{{ route('patientAdd') }}">Add</a>
        <a class="nav-link {{ request()->is('patient/list/1*') || request()->is('patient/moreinfo/1*') || request()->is('file/1*') ? 'active' : '' }}" href="{{ route('patientRead', 1) }}"> Students</a>
        <a class="nav-link {{ request()->is('patient/list/2*') || request()->is('patient/moreinfo/2*') || request()->is('file/2*') ? 'active' : '' }}" href="{{ route('patientRead', 2) }}">Employee</a>
        <a class="nav-link {{ request()->is('patient/list/3*') || request()->is('patient/moreinfo/3*') || request()->is('file/3*')? 'active' : '' }}" href="{{ route('patientRead', 3) }}">Guest</a>                                
    </div>
</div>
