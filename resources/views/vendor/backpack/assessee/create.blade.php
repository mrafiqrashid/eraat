@extends('vendor.backpack.crud.create')
@push('after_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startInput = document.getElementById('work_start_time');
        const endInput = document.getElementById('work_end_time');
        const totalSecondsInput = document.getElementById('total_working_hours');
        const detailsInput = document.getElementById('total_working_hours_details');

        function calculateTime() {
            const start = startInput.value;
            const end = endInput.value;

            if (!start || !end) return;

            const [startHours, startMinutes] = start.split(':').map(Number);
            const [endHours, endMinutes] = end.split(':').map(Number);

            const now = new Date();
            const startDate = new Date(now);
            const endDate = new Date(now);

            startDate.setHours(startHours, startMinutes, 0, 0);
            endDate.setHours(endHours, endMinutes, 0, 0);

            // Handle time that crosses midnight
            if (endDate <= startDate) {
                endDate.setDate(endDate.getDate() + 1);
            }

            const diffInSeconds = Math.floor((endDate - startDate) / 1000);
            const hours = Math.floor(diffInSeconds / 3600);
            const minutes = Math.floor((diffInSeconds % 3600) / 60);

            totalSecondsInput.value = diffInSeconds;
            detailsInput.value = `${hours} hour(s) and ${minutes} minute(s)`;
        }

        startInput.addEventListener('change', () => {
            endInput.disabled = !startInput.value;
            calculateTime();
        });

        endInput.addEventListener('change', calculateTime);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dobInput = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('age');

        function calculateAge() {
            const dob = dobInput.value;
            if (!dob) return;

            const birthDate = new Date(dob);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            ageInput.value = age;
        }

        dobInput.addEventListener('change', calculateAge);
    });
</script>
@endpush