@props(['breadcrumbs' => [], 'title' => null])

@if (count($breadcrumbs))
    <nav class="mb-4">
        <ol class="flex flex-wrap text-sm text-gray-700 dark:text-gray-400 space-x-2">
            @foreach ($breadcrumbs as $index => $item)
                @if ($loop->last)
                    <li aria-current="page" class="text-gray-500 dark:text-gray-300">
                        {{ $item['name'] }}
                    </li>
                @else
                    <li>
                        <a href="{{ $item['route'] ?? '#' }}" class="hover:underline hover:text-blue-600 dark:hover:text-white">
                            {{ $item['name'] }}
                        </a>
                        <span class="mx-1 text-gray-400"> / </span>
                    </li>
                @endif
            @endforeach
        </ol>

        @if ($title)
            @if (count($breadcrumbs) > 1)
            <h6 class="mt-2 text-base font-bold text-gray-800 dark:text-white">
                {{ $title }}
            </h6>
            @endif

        @endif
    </nav>
@endif
