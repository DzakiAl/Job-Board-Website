<x-app-layout>
    <div class="content">
        <h1 class="title">Create new job</h1>
        <center>
            <form action="{{ route('dashboard.update', $job) }}" method="POST" class="job-form">
                @csrf
                @method('PUT')
                <input name="title" type="text" class="input" placeholder="Job title here" value="{{ $job->title}}">
                <textarea name="description" class="job-body" rows="5" placeholder="Description here">{{ $job->description }}</textarea>
                <input name="location" type="text" class="input" placeholder="Location here" value="{{ $job->location }}"><br>
                <input name="company" type="text" class="input" placeholder="Company here" value="{{ $job->company }}">
                <div class="option">
                    <a href="{{ route('dashboard.index')}}" class="cancel-button">Cancel</a>
                    <button class="submit-button">Submit</button>
                </div>
            </form>
        </center>
    </div>
</x-app-layout>
