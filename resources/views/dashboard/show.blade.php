<x-app-layout>
    <div class="content">
        <div class="JobBoard">
            <h1 class="job-title-2">{{ $job->title }}</h1>
            <p class="LocationAndCompany">{{ $job->company }} - {{ $job->location }}</p>
            <h1 class="job-desc">
                {!! nl2br(e($job->description)) !!}
            </h1>
        </div>
    </div>
</x-app-layout>