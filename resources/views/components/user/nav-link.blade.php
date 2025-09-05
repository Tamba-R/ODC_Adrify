@props([
  'href' => '#',
  'active' => false,
])

@php
$classes = $active
  ? 'flex items-center gap-3 px-3 py-2 rounded-xl bg-blue-50 text-blue-700 font-medium'
  : 'flex items-center gap-3 px-3 py-2 rounded-xl text-gray-700 hover:bg-gray-50';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
  @isset($icon)
    <span class="shrink-0 text-current">@isset($icon) {{ $icon }} @endisset</span>
  @endisset
  <span class="truncate">{{ $slot }}</span>
</a>
