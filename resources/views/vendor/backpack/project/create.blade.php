@extends('vendor.backpack.crud.create')
@push('after_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        // Disable end_date by default
        endDate.disabled = true;

        startDate.addEventListener('change', function () {
            if (startDate.value) {
                endDate.disabled = false;
                endDate.min = startDate.value;
            } else {
                endDate.disabled = true;
                endDate.value = '';
            }
        });

        endDate.addEventListener('change', function () {
            if (endDate.value < startDate.value) {
                alert("End date cannot be before start date.");
                endDate.value = '';
            }
        });
    });
</script>
<script>
    function calculateDuration() {
        const start = document.getElementById('start_date').value;
        const end = document.getElementById('end_date').value;

        if (!start || !end) return;

        const startDate = new Date(start);
        const endDate = new Date(end);

        if (endDate < startDate) return;

        const timeDiff = endDate.getTime() - startDate.getTime();
        const daysDiff = Math.floor(timeDiff / (1000 * 3600 * 24));

        // Calculate months and days
        let months = endDate.getMonth() - startDate.getMonth() + 
                     (12 * (endDate.getFullYear() - startDate.getFullYear()));
        let days = endDate.getDate() - startDate.getDate();

        if (days < 0) {
            months -= 1;
            const tempDate = new Date(endDate.getFullYear(), endDate.getMonth(), 0);
            days += tempDate.getDate(); // days in previous month
        }

        // Fill the fields
        document.getElementById('duration').value = daysDiff;
        document.getElementById('duration_details').value = `${months} month(s) ${days} day(s)`;
    }

    document.getElementById('start_date').addEventListener('change', calculateDuration);
    document.getElementById('end_date').addEventListener('change', calculateDuration);
</script>
@endpush