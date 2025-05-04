<form action="{{ route('assessmentPrint') }}" method="POST" style="display:inline;">
    @csrf
    <input type="hidden" name="assessment_id" value="{{ $entry->getKey() }}">
    <button class="btn btn-sm btn-link text-primary" title="assessment">
        <i class="las la-print"></i> Print
    </button>
</form>