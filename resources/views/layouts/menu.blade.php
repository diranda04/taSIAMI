@if(auth()->user()->role->name == "Admin")
@include('layouts.menu.admin')
@endif

@if(auth()->user()->role->name == "Auditor")
@include('layouts.menu.auditor')
@endif

@if(auth()->user()->role->name == "Auditee")
@include('layouts.menu.auditee')
@endif