<x-app-layout>
    <div class="body">
        @foreach ($jobs as $job)
            <a href="{{ route('home.show', $job) }}">
                <div class="job">
                    <div class="job-body">
                        <h1 class="job-title">{{ $job->title }}</h1>
                        <h1 class="companyAndLocation">{{ $job->company }} - {{ $job->location }}</h1>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
