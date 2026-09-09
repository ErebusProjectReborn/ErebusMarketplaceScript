@extends('layouts.app')

@section('content')



<div class="vendors-container">
    <div class="vendors-card">
        <h1 class="vendors-title">Vendor List</h1>
        @if($vendors->isEmpty())
            <p class="vendors-empty">No vendors found.</p>
        @else
            <div class="vendors-grid">
                @foreach($vendors as $vendor)
                    <a href="{{ route('vendors.show', $vendor->username) }}" class="vendors-item">
                        <div class="vendors-avatar">
                            <img src="{{ $vendor->profile ? $vendor->profile->profile_picture_url : asset('images/default-profile-picture.png') }}" 
                                 alt="{{ $vendor->username }}'s Profile Picture">
                        </div>
                        <span class="vendors-username">{{ $vendor->username }}</span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
