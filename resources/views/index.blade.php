@extends('layouts.master')
@section('content')
{{-- ============ HERO SECTION ==================== --}}
@include('inc.hero')

    <div class="mx-14 md:mx-24 mt-80 mb-40">
        @include('inc.search')

        @if (count($listings) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing"/>
                @endforeach
            </div>
        @else
            <p>No listings available yet!</p>
        @endif
        <div class="mt-6 p-3">
            {{$listings->links('pagination::tailwind')}}
        </div>
    </div>
    
    @include('inc.footer')
@endsection