<x-dashboard-tile
    :position="$position"
    :show="$showTile"
    :fade="false"
    :refresh-interval="$refreshIntervalInSeconds"
>
    <div class="absolute inset-0 bg-warning p-4">
        <div class="grid grid-rows-auto-1 gap-2 h-full">
            <h1 class="uppercase font-bold">Downtime</h1>
            <ul class="self-center divide-y-2">

                @foreach($downSites as $downSite)
                    <li
                        class="py-1 font-semibold truncate"
                        style="border-color: rgba(0, 0, 0, 0.1);"
                    >
                        {{ $downSite }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-dashboard-tile>
