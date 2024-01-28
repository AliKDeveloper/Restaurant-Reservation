@extends('table.parts._app')
@section('content')
    {{-- Navbar --}}
    @include('table.parts._navbar')

    <!-- Dropdown menu -->
    @include('table.parts._dropDownMenu')

    {{-- Message of Session --}}
    @include('table.parts._messageAlert', ['message'=>'added', 'color'=>'green'])
    @include('table.parts._messageAlert', ['message'=>'updated', 'color'=>'green'])
    @include('table.parts._messageAlert', ['message'=>'deleted', 'color'=>'red'])
    @include('table.parts._messageAlert', ['message'=>'cancelReservation', 'color'=>'red'])
    @include('table.parts._messageAlert', ['message'=>'cancelAllReservations', 'color'=>'red'])

    {{-- Table --}}
    @if(\App\Models\Table::count() > 0 )
        @include('table.parts._tables')
    @else
        @include('table.parts.addTables')
    @endif

    <!-- Bottom Navigation -->
    @include('table.parts._bottomNavigation')

    {{-- Theme Script --}}
    @include('table.scripts.__theme')

    {{-- Search Script --}}
    @include('table.scripts.__search')
@endsection
