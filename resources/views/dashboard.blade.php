<x-dashboard>
    <livewire:time-weather-tile position="a1" />
    <livewire:calendar-tile position="a2" :calendar-id="config('dashboard.tiles.calendar.ids.0')"/>
    <livewire:twitter-tile position="b1"/>
    <livewire:spotify-tile position="b2" />
    <livewire:uptime-robot-tile position="c1:d2" />
    <livewire:packagist-tile position="e1:h2" />
    <livewire:npm-package-tile
        position="a3:b3"
        package="vue"
        type="last-week"
        cache-timeout="60"
        :force-refresh="false"
        :show-logo="true"
    />
    <livewire:npm-packages-table-tile
        position="c3:d3"
        packages="vue,react,jquery"
        type="last-week"
        cache-timeout="60"
        :force-refresh="false"
        :show-logo="false"
    />
    <livewire:reddit-tile position="e3:h4" configuration-name="default" title="r/Laravel"/>
    <livewire:health-check-tile position="a4:d4" />
</x-dashboard>
