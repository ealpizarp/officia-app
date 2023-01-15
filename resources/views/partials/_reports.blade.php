
<div class="mt-5 grid grid-cols-1 gap-2 space-y-2 mx-4">

    @unless(count($reports) == 0)
        @foreach ($reports as $report)
            <x-report-card :report="$report"/>
        @endforeach
    @else
    <h2 class="block text-lg text-center font-bold text-gray-700 ">No reports found</h2>
    @endunless
</div>

<div class="mt-6 p-4">
    {{$reports->links()}}
</div>