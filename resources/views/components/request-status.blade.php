@props(['status' => 'pending'])

@php
    switch($status) {
        case 'approved':
            $classes = "text-green-600";
            break;
        case 'denied':
            $classes = "text-red-600";
            break;
        case 'pending':
        default:
            $classes = "text-gray-600";
            break;
    }
@endphp

<span style="text-transform:uppercase;" class="{{$classes}}">
    {{$slot}}
</span>
