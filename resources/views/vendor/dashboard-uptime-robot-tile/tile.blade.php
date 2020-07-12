<x-dashboard-tile :position="$position" refresh-interval="60">
    <div>
        <h1 class="font-medium text-dimmed text-sm uppercase tracking-wide tabular-nums text-center">Uptime Robot</h1>
        <ul>
            @foreach($monitors as $monitor)
                <li class="p-1">
                    <div class="flex justify-center">
                        <span class="p-1 rounded-sm {{ $monitor['badge'] }}">
                            {{ $monitor['status'] }}
                        </span>
                        <span class="p-1">
                            {!! $monitor['friendly_name'] !!}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-dashboard-tile>
