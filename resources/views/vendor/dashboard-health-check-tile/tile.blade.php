<x-dashboard-tile 
    :position="$position"
    :refresh-interval="$refreshIntervalInSeconds"
>
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div class="flex justify-center items-center h-10">
            <div class="text-3xl leading-none w-10">🚑</div>
            <div class="text-base font-thin leading-none">Health Check</div>
        </div>
        <ul class="self-center | divide-y-2">
            @foreach($healthCheck as $checkName => $checkStatus)
                <li class="grid grid-cols-1-auto py-1">
                    <span class="truncate" title="{{ $checkName }}">
                        {{ $checkName }}
                    </span>
                    <span>
                        <span class="font-bold tabular-nums">
                            {{ $checkStatus['emoji'] }}
                        </span>
                    </span>
                    @if (config('dashboard.tiles.health_check.show_failures', true) && ($failures[$checkName] != []))
                        <ul class="self-center">
                            @foreach ($failures[$checkName] as $failureName => $failureMessage)
                                <li class="text-xs font-thin pt-1">
                                    <span class="uppercase" title="{{ $failureName }}">
                                        {{ substr($failureName, 0, 30) }}:
                                    </span>
                                    <span class="pl-1">
                                        {{ substr($failureMessage['message'], 0, 60) }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</x-dashboard-tile>
