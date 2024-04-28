<x-app-layout>
    <div class="body">
        <center><a href="{{ route('dashboard.create') }}" class="button-addJob">Add Job</a></center>
        @foreach ($jobs as $job)
            <a href="{{ route('dashboard.show', $job)}}">
                <div class="job">
                    <div class="job-body">
                        <h1 class="job-title">{{ $job->title }}</h1>
                        <h1 class="companyAndLocation">{{ $job->company }} - {{ $job->location }}</h1>
                    </div>
                    <div class="option">
                        <a href="{{ route('dashboard.edit', $job)}}" class="button-edit">Edit</a>
                        <form action="{{ route('dashboard.destroy', $job)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button-delete">Delete</button>
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
