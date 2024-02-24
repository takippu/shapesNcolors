{{-- redirect to view page --}}
@php
    // Redirect to the specified URL
    header("Location: /view-all");
    exit; // Ensure that no further code is executed after the redirect
@endphp
