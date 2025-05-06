<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="print-BTN" data-bs-toggle="dropdown"
        aria-expanded="false">
        Print
    </button>
    <ul class="dropdown-menu" aria-labelledby="print-BTN">
        @foreach ($print_BTN as $key => $value)
        <li><a class="dropdown-item report_id_list" href="#" data-value="{{ $value['data-value']}}"
                data-value2="{{ $value['data-value2']}}" assessment_id="{{ $value['assessment_id']}}">{{
                $value['display']}}</a></li>
        @endforeach

    </ul>
</div>

{{-- <a onclick="Swal.fire('Print Clicked!')" class="btn btn-sm btn-primary">Print</a> --}}
@push('after_scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
    // import Swal from 'sweetalert2/dist/sweetalert2.js'
    // import 'sweetalert2/src/sweetalert2.scss'
    document.addEventListener('DOMContentLoaded', function() {


            // Get all dropdown items
            const report_id_list_input = document.querySelectorAll('.report_id_list');

            // Add click event listener to each dropdown item
            report_id_list_input.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default link behavior
                    // Get the value from data-value attribute
                    const report_id = this.getAttribute('data-value');
                    const report_title = this.getAttribute('data-value2');
                    const assessment_id = this.getAttribute('assessment_id');

                    // Show confirmation dialog
                    Swal.fire({
                        title: 'Print?',
                        text: `You are about to print in ${report_title} format`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, print it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log('confirm');
                            // Create a form dynamically
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '{{ route($route) }}';
                            form.target = '_blank';
                            form.style.display = 'none';

                            // Add CSRF token
                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = '{{ csrf_token() }}';
                            form.appendChild(csrfToken);

                            // Add the selected value
                            const reportTypeInput = document.createElement('input');
                            reportTypeInput.type = 'hidden';
                            reportTypeInput.name = 'report_id';
                            reportTypeInput.value = report_id;
                            form.appendChild(reportTypeInput);

                            const assessment_idInput = document.createElement('input');
                            assessment_idInput.type = 'hidden';
                            assessment_idInput.name = 'assessment_id';
                            assessment_idInput.value = assessment_id;
                            form.appendChild(assessment_idInput);

                            const params = new URLSearchParams(window.location.search);
                            let paramObject = {};
                            // form.find('input.js-added').remove();
                            // Add data dynamically
                            params.forEach((value, key) => {
                                paramObject[key] = value;
                                // Dynamically create and append hidden inputs
                                $('<input>').attr({
                                    type: 'hidden',
                                    name: key, // Use the key as the name
                                    value: value, // Use the value as the value
                                    class: 'js-added' // Add a class to identify this input
                                }).appendTo(form);
                            });

                            // Append form to body and submit
                            document.body.appendChild(form);
                            form.submit();

                            // Show success message
                            Swal.fire(
                                'Exported!',
                                'Your data has been exported.',
                                'success'
                            );
                        }
                    });
                });
            });
        });
        $('#exportForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            const params = new URLSearchParams(window.location.search);
            let paramObject = {};
            const form = $(this);
            form.find('input.js-added').remove();
            // Add data dynamically
            params.forEach((value, key) => {
                paramObject[key] = value;
                // Dynamically create and append hidden inputs
                $('<input>').attr({
                    type: 'hidden',
                    name: key, // Use the key as the name
                    value: value, // Use the value as the value
                    class: 'js-added' // Add a class to identify this input
                }).appendTo(form);
            });

            // Set the action attribute of the form
            $(this).attr('target', '_blank');

            // Submit the form
            this.submit();

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Report has been exported',
                showConfirmButton: false,

            })
            document.getElementById('closeButton2').click();

            $(this).removeAttr('target');
        });
</script>
@endpush