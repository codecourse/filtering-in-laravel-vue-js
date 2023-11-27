@if (array_intersect(array_keys(request()->query()), array_keys($mappings)))
    <p>
        <a href="{{ route('courses.index') }}">Reset all filters</a>
    </p>
@endif

@foreach($mappings as $key => $map)
    @include('courses.partials._filter_list', compact('map', 'key'))
@endforeach

{{-- @include('courses.partials._filter_list', [
    'map' => ['free' => 'Free', 'premium' => 'Premium'],
    'key' => 'access'
])

@include('courses.partials._filter_list', [
    'map' => ['snippet' => 'Snippet', 'project' => 'Project', 'theory' => 'Theory'],
    'key' => 'type'
])

@include('courses.partials._filter_list', [
    'map' => $subjects->pluck('name', 'slug')->toArray(),
    'key' => 'subject'
])

@auth
    @include('courses.partials._filter_list', [
        'map' => ['true' => 'Started', 'false' => 'Not started'],
        'key' => 'started'
    ])
@endauth
 --}}