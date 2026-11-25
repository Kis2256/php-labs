@php
    $current = request('sort');
    $next = $current === $field ? '-'.$field : $field;
@endphp
<a href="{{ route($route, array_merge(request()->except('sort', 'page'), ['sort' => $next])) }}">
    {{ $label }}
    @if ($current === $field) ↑ @elseif ($current === '-'.$field) ↓ @endif
</a>