@extends('layouts.app')

@section('content')

    @component('components.panel',['title'=>$report->getName()])

        <p class="text-right"><a href="{{ url($baseRoute.'/export') }}" class="btn btn-primary"><span class="glyphicon glyphicon-export"></span> Export</a></p>

        @component('components.report.table',['report'=>$report])
        @endcomponent

    @endcomponent

@endsection
