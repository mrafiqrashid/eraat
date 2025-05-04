<form action="{{ route('taskList') }}" method="POST" style="display:inline;">
    @csrf
    <input type="hidden" name="project_id" value="{{ $entry->getKey() }}">
    <button class="btn btn-sm btn-link text-primary" title="Task">
        Task
    </button>
</form>