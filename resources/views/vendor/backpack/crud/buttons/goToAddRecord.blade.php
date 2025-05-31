<form action="{{ route('projectMore') }}" method="POST" style="display:inline;">
    @csrf
    <input type="hidden" name="project_id" value="{{ $entry->getKey() }}">
    <div class="dropdown" style="display:inline;">
        <button class="btn btn-sm btn-link text-primary dropdown-toggle" type="button" id="print-BTN"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="la la-plus"></i> Records
        </button>
        <ul class="dropdown-menu" aria-labelledby="print-BTN">
            @foreach ($goToAddRecord as $key => $value)
            <li>
                <a class="dropdown-item btn_list" onclick="submitForm('{{ $value['data1'] }}')">{{ $value['display'] }}</a>
            </li>
            @endforeach

        </ul>
    </div>
</form>


<script>
    function submitForm(data1) {
        // Create a hidden input to hold the selected value
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'selected_action'; // Change this to whatever you want to name the input
        input.value = data1;

        // Append the input to the form
        var form = document.querySelector('form[action="{{ route('projectMore') }}"]');
        form.appendChild(input);

        // Submit the form
        form.submit();
    }
</script>
{{-- <script>
    // Get all dropdown items
    let btn_list_input = document.querySelectorAll('.btn_list');

    // Add click event listener to each dropdown item
    btn_list_input.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link behavior
            // Get the value from data-value attribute
            const route = this.getAttribute('data-value');
            const title = this.getAttribute('data-value2');
            const entry_id = this.getAttribute('data-value3');

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = route;
            // form.target = '_blank';
            form.style.display = 'none';

            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            const entry_idInput = document.createElement('input');
            entry_idInput.type = 'hidden';
            entry_idInput.name = 'project_id';
            entry_idInput.value = entry_id;
            form.appendChild(entry_idInput);

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

            // Show confirmation dialog
            // Swal.fire({
            //     title: 'Check?',
            //     text: `You are about to go ${title} page`,
            //     icon: 'question',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, let\'s go!'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         // Create a form dynamically
            //         const form = document.createElement('form');
            //         form.method = 'POST';
            //         form.action = route;
            //         // form.target = '_blank';
            //         form.style.display = 'none';

            //         // Add CSRF token
            //         const csrfToken = document.createElement('input');
            //         csrfToken.type = 'hidden';
            //         csrfToken.name = '_token';
            //         csrfToken.value = '{{ csrf_token() }}';
            //         form.appendChild(csrfToken);

            //         // Add the selected value
            //         // const reportTypeInput = document.createElement('input');
            //         // reportTypeInput.type = 'hidden';
            //         // reportTypeInput.name = 'report_id';
            //         // reportTypeInput.value = report_id;
            //         // form.appendChild(reportTypeInput);

            //         const entry_idInput = document.createElement('input');
            //         entry_idInput.type = 'hidden';
            //         entry_idInput.name = 'project_id';
            //         entry_idInput.value = entry_id;
            //         form.appendChild(entry_idInput);

            //         const params = new URLSearchParams(window.location.search);
            //         let paramObject = {};
            //         // form.find('input.js-added').remove();
            //         // Add data dynamically
            //         params.forEach((value, key) => {
            //             paramObject[key] = value;
            //             // Dynamically create and append hidden inputs
            //             $('<input>').attr({
            //                 type: 'hidden',
            //                 name: key, // Use the key as the name
            //                 value: value, // Use the value as the value
            //                 class: 'js-added' // Add a class to identify this input
            //             }).appendTo(form);
            //         });

            //         // Append form to body and submit
            //         document.body.appendChild(form);
            //         form.submit();

            //         // Show success message
            //         Swal.fire(
            //             'Appendix 1!',
            //             'Your data has been updated.',
            //             'success'
            //         );
            //     }
            // });
        });
    });
    // $('#exportForm').submit(function(event) {
    //     event.preventDefault(); // Prevent default form submission
    //     const params = new URLSearchParams(window.location.search);
    //     let paramObject = {};
    //     const form = $(this);
    //     form.find('input.js-added').remove();
    //     // Add data dynamically
    //     params.forEach((value, key) => {
    //         paramObject[key] = value;
    //         // Dynamically create and append hidden inputs
    //         $('<input>').attr({
    //             type: 'hidden',
    //             name: key, // Use the key as the name
    //             value: value, // Use the value as the value
    //             class: 'js-added' // Add a class to identify this input
    //         }).appendTo(form);
    //     });

    //     // Set the action attribute of the form
    //     $(this).attr('target', '_blank');

    //     // Submit the form
    //     this.submit();

    //     Swal.fire({
    //         position: 'center',
    //         icon: 'success',
    //         title: 'Report has been exported',
    //         showConfirmButton: false,

    //     })
    //     document.getElementById('closeButton2').click();

    //     $(this).removeAttr('target');
    // });
</script> --}}

{{-- <form action="{{ route('assesseeList') }}" method="POST" style="display:inline;">
    @csrf
    <input type="hidden" name="project_id" value="{{ $entry->getKey() }}">
    <button class="btn btn-sm btn-link text-primary" title="Task">
        Assessee
    </button>
</form> --}}