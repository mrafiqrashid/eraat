<script>
    function feInitialize() {
        genderEventListeners();
        feLLEventListeners();

        // Initialize state
        setTimeout(() => {
            genderUpdate();
            // feLLUpdate();
            feLLEventListeners();

        }, 100);
    }

    function updateGenderField(employeeId, inputs) {
        if (!employeeId) return;
        // Reset gender field
        const genderSelect = inputs.genderSelect;
        genderSelect.value = '';
        genderSelect.disabled = true;

        const fe_ll_question_1a_rw_input = inputs.fe_ll_question_1a_rw_input;
        const fe_ll_question_2a_rw_input = inputs.fe_ll_question_2a_rw_input;
        const fe_ll_question_3a_rw_input = inputs.fe_ll_question_3a_rw_input;
        const fe_ll_question_4a_rw_input = inputs.fe_ll_question_4a_rw_input;
        const fe_ll_question_5a_rw_input = inputs.fe_ll_question_5a_rw_input;
        const fe_ll_question_1b_rw_input = inputs.fe_ll_question_1b_rw_input;
        const fe_ll_question_2b_rw_input = inputs.fe_ll_question_2b_rw_input;
        const fe_ll_question_3b_rw_input = inputs.fe_ll_question_3b_rw_input;
        const fe_ll_question_4b_rw_input = inputs.fe_ll_question_4b_rw_input;
        const fe_ll_question_5b_rw_input = inputs.fe_ll_question_5b_rw_input;
        const fe_pp_question_6_sub_1_select = inputs.fe_pp_question_6_sub_1_select;
        const fe_pp_question_7_sub_1_select = inputs.fe_pp_question_7_sub_1_select;
        const fe_hsp_question_1_subQuestion_1_select = inputs.fe_hsp_question_1_subQuestion_1_select;
        const fe_hsp_question_1_subQuestion_2_select = inputs.fe_hsp_question_1_subQuestion_2_select;


        // Get CSRF token from meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Create minimal form data
        const formData = new FormData();
        formData.append('employee_id', employeeId);
        formData.append('_token', csrfToken);

        // Make AJAX request
        fetch("{{ route('getGender') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if (data.gender) {
                    genderSelect.value = data.gender;
                    genderSelect.disabled = true;

                    fe_ll_question_1a_rw_input.value = data.gender == 'Male' ? '10.000' : '7.000';
                    fe_ll_question_2a_rw_input.value = data.gender == 'Male' ? '20.000' : '13.000';
                    fe_ll_question_3a_rw_input.value = data.gender == 'Male' ? '25.000' : '16.000';
                    fe_ll_question_4a_rw_input.value = data.gender == 'Male' ? '20.000' : '13.000';
                    fe_ll_question_5a_rw_input.value = data.gender == 'Male' ? '10.000' : '7.000';
                    fe_ll_question_1b_rw_input.value = data.gender == 'Male' ? '5.000' : '3.000';
                    fe_ll_question_2b_rw_input.value = data.gender == 'Male' ? '10.000' : '7.000';
                    fe_ll_question_3b_rw_input.value = data.gender == 'Male' ? '15.000' : '10.000';
                    fe_ll_question_4b_rw_input.value = data.gender == 'Male' ? '10.000' : '7.000';
                    fe_ll_question_5b_rw_input.value = data.gender == 'Male' ? '5.000' : '3.000';

                    fe_pp_question_6_sub_1_select.value = data.gender == 'Male' ? 'male_more_than_1000kg' :
                        'female_more_than_750kg';

                    fe_pp_question_7_sub_1_select.value = data.gender == 'Male' ? 'male_more_than_100kg' :
                        'female_more_than_75kg';

                    fe_hsp_question_1_subQuestion_1_select.value = data.gender == 'Male' ? 'Male' :
                        'Female';

                    fe_hsp_question_1_subQuestion_2_select.value = data.gender == 'Male' ? '5kg' :
                        '3kg';
                }
            })
            .catch(error => {
                console.error('Error fetching gender:', error);
                // Optional: Show a Backpack-style alert
                new Noty({
                    type: 'error',
                    text: 'Failed to fetch gender data',
                    timeout: 3000
                }).show();
            });
    }


    function genderEventListeners() {
        // Listen for changes on the employee select field
        document.getElementById('employee_id').addEventListener('change', genderUpdate);
    }

    function genderUpdate() {
        const employeeSelect = document.getElementById('employee_id');
        const genderSelect = document.getElementById('fe_bc_1_gender');
        const fe_ll_question_1a_rw_input = document.getElementById('fe_ll_question_1a_rw');
        const fe_ll_question_2a_rw_input = document.getElementById('fe_ll_question_2a_rw');
        const fe_ll_question_3a_rw_input = document.getElementById('fe_ll_question_3a_rw');
        const fe_ll_question_4a_rw_input = document.getElementById('fe_ll_question_4a_rw');
        const fe_ll_question_5a_rw_input = document.getElementById('fe_ll_question_5a_rw');
        const fe_ll_question_1b_rw_input = document.getElementById('fe_ll_question_1b_rw');
        const fe_ll_question_2b_rw_input = document.getElementById('fe_ll_question_2b_rw');
        const fe_ll_question_3b_rw_input = document.getElementById('fe_ll_question_3b_rw');
        const fe_ll_question_4b_rw_input = document.getElementById('fe_ll_question_4b_rw');
        const fe_ll_question_5b_rw_input = document.getElementById('fe_ll_question_5b_rw');
        const fe_pp_question_6_sub_1_select = document.getElementById('fe_pp_question_6_sub_1');
        const fe_pp_question_7_sub_1_select = document.getElementById('fe_pp_question_7_sub_1');
        const fe_hsp_question_1_subQuestion_1_select = document.getElementById('fe_hsp_question_1_subQuestion_1');
        const fe_hsp_question_1_subQuestion_2_select = document.getElementById('fe_hsp_question_1_subQuestion_2');
        const selectedEmployeeText = employeeSelect.options[employeeSelect.selectedIndex].text.toLowerCase();

        // Reset gender selection
        genderSelect.value = '';
        fe_ll_question_1a_rw_input.value = '';
        fe_ll_question_2a_rw_input.value = '';
        fe_ll_question_3a_rw_input.value = '';
        fe_ll_question_4a_rw_input.value = '';
        fe_ll_question_5a_rw_input.value = '';
        fe_ll_question_1b_rw_input.value = '';
        fe_ll_question_2b_rw_input.value = '';
        fe_ll_question_3b_rw_input.value = '';
        fe_ll_question_4b_rw_input.value = '';
        fe_ll_question_5b_rw_input.value = '';
        fe_pp_question_6_sub_1_select.value = '';
        fe_pp_question_7_sub_1_select.value = '';
        fe_hsp_question_1_subQuestion_1_select.value = '';
        fe_hsp_question_1_subQuestion_2_select.value = '';

        // Enable the gender select if an employee is selected
        if (employeeSelect.value) {
            genderSelect.disabled = false;
            let inputs = {
                'genderSelect': genderSelect,
                'fe_ll_question_1a_rw_input': fe_ll_question_1a_rw_input,
                'fe_ll_question_2a_rw_input': fe_ll_question_2a_rw_input,
                'fe_ll_question_3a_rw_input': fe_ll_question_3a_rw_input,
                'fe_ll_question_4a_rw_input': fe_ll_question_4a_rw_input,
                'fe_ll_question_5a_rw_input': fe_ll_question_5a_rw_input,
                'fe_ll_question_1b_rw_input': fe_ll_question_1b_rw_input,
                'fe_ll_question_2b_rw_input': fe_ll_question_2b_rw_input,
                'fe_ll_question_3b_rw_input': fe_ll_question_3b_rw_input,
                'fe_ll_question_4b_rw_input': fe_ll_question_4b_rw_input,
                'fe_ll_question_5b_rw_input': fe_ll_question_5b_rw_input,
                'fe_pp_question_6_sub_1_select': fe_pp_question_6_sub_1_select,
                'fe_pp_question_7_sub_1_select': fe_pp_question_7_sub_1_select,
                'fe_hsp_question_1_subQuestion_1_select': fe_hsp_question_1_subQuestion_1_select,
                'fe_hsp_question_1_subQuestion_2_select': fe_hsp_question_1_subQuestion_2_select
            }
            let updatingGender = updateGenderField(employeeSelect.value, inputs) ?? '';
        } else {
            // No employee selected, keep disabled
            genderSelect.disabled = true;
        }
    }


    function feLLEventListeners() {
        const applicableCheckbox = document.getElementById('fe_ll_question_1a_applicable');
        const questionField = document.getElementById('fe_ll_question_1a');

        if (applicableCheckbox) {
            applicableCheckbox.addEventListener('change', function() {
                console.log('Checkbox value:', this.checked);
                if (this.checked) {
                    questionField.disabled = false;
                } else {
                    questionField.disabled = true;
                }
            });
        }
        // Add event listener to the applicable checkbox
        // const applicableCheckbox = document.getElementById('fe_ll_question_1a_applicable');
        // if (applicableCheckbox) {
        //     // applicableCheckbox.addEventListener('change', feLLUpdate);
        // }
    }
    // document.addEventListener('DOMContentLoaded', function() {
    //     const checkbox = document.getElementById('activeCheckbox');

    //     if (checkbox) {
    //         checkbox.addEventListener('change', function() {
    //             console.log('Checkbox value:', this.checked);
    //         });
    //     }
    // });

    function feLLUpdate() {

        const inputsWithIds = document.querySelectorAll(
            'input[id]'); // Selects all <input> elements with an 'id' attribute

        console.log("All Inputs with IDs:");
        inputsWithIds.forEach(input => {
            console.log({
                id: input.id,
                type: input.type,
                value: input.value,
                checked: input.checked || undefined // Only for checkboxes/radio
            });
        });

        const applicableCheckbox = document.getElementById('fe_ll_question_1a_applicable');
        const questionField = document.getElementById('fe_ll_question_1a');
        console.log(applicableCheckbox);
        console.log(questionField);

        if (applicableCheckbox && questionField) {

            // Enable the field if checkbox is checked, disable otherwise
            questionField.disabled = !applicableCheckbox.checked;

            // Optional: Reset value to 0 when disabled
            if (questionField.disabled) {
                questionField.value = '0.000';
            }
        }
    }
</script>
