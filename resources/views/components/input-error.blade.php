@props(['messages'])

@if ($messages)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </p>
@endif
