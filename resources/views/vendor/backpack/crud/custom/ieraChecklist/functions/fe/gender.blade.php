<script>
    function genderEventListeners() {
        document.getElementById('employee_id').addEventListener('change', genderUpdate);
    }

    function genderUpdate() {
        const employeeSelect = document.getElementById('employee_id');
        const genderSelect = (
            document.getElementById('fe_bc_1_gender').value = '',
            document.getElementById('fe_bc_1_gender'));


        const fe_ll_question_1a_rw_input = (
            document.getElementById('fe_ll_question_1a_rw').value = '',
            document.getElementById('fe_ll_question_1a_rw'));
        const fe_ll_question_2a_rw_input = (
            document.getElementById('fe_ll_question_2a_rw').value = '',
            document.getElementById('fe_ll_question_2a_rw'));
        const fe_ll_question_3a_rw_input = (
            document.getElementById('fe_ll_question_3a_rw').value = '',
            document.getElementById('fe_ll_question_3a_rw'));
        const fe_ll_question_4a_rw_input = (
            document.getElementById('fe_ll_question_4a_rw').value = '',
            document.getElementById('fe_ll_question_4a_rw'));
        const fe_ll_question_5a_rw_input = (
            document.getElementById('fe_ll_question_5a_rw').value = '',
            document.getElementById('fe_ll_question_5a_rw'));
        const fe_ll_question_1b_rw_input = (
            document.getElementById('fe_ll_question_1b_rw').value = '',
            document.getElementById('fe_ll_question_1b_rw'));
        const fe_ll_question_2b_rw_input = (
            document.getElementById('fe_ll_question_2b_rw').value = '',
            document.getElementById('fe_ll_question_2b_rw'));
        const fe_ll_question_3b_rw_input = (
            document.getElementById('fe_ll_question_3b_rw').value = '',
            document.getElementById('fe_ll_question_3b_rw'));
        const fe_ll_question_4b_rw_input = (
            document.getElementById('fe_ll_question_4b_rw').value = '',
            document.getElementById('fe_ll_question_4b_rw'));
        const fe_ll_question_5b_rw_input = (
            document.getElementById('fe_ll_question_5b_rw').value = '',
            document.getElementById('fe_ll_question_5b_rw'));

        const fe_rll_question_1a_rw_input = (
            document.getElementById('fe_rll_question_1a_rw').value = '',
            document.getElementById('fe_rll_question_1a_rw'));
        const fe_rll_question_2a_rw_input = (
            document.getElementById('fe_rll_question_2a_rw').value = '',
            document.getElementById('fe_rll_question_2a_rw'));
        const fe_rll_question_3a_rw_input = (
            document.getElementById('fe_rll_question_3a_rw').value = '',
            document.getElementById('fe_rll_question_3a_rw'));
        const fe_rll_question_4a_rw_input = (
            document.getElementById('fe_rll_question_4a_rw').value = '',
            document.getElementById('fe_rll_question_4a_rw'));
        const fe_rll_question_5a_rw_input = (
            document.getElementById('fe_rll_question_5a_rw').value = '',
            document.getElementById('fe_rll_question_5a_rw'));
        const fe_rll_question_1b_rw_input = (
            document.getElementById('fe_rll_question_1b_rw').value = '',
            document.getElementById('fe_rll_question_1b_rw'));
        const fe_rll_question_2b_rw_input = (
            document.getElementById('fe_rll_question_2b_rw').value = '',
            document.getElementById('fe_rll_question_2b_rw'));
        const fe_rll_question_3b_rw_input = (
            document.getElementById('fe_rll_question_3b_rw').value = '',
            document.getElementById('fe_rll_question_3b_rw'));
        const fe_rll_question_4b_rw_input = (
            document.getElementById('fe_rll_question_4b_rw').value = '',
            document.getElementById('fe_rll_question_4b_rw'));
        const fe_rll_question_5b_rw_input = (
            document.getElementById('fe_rll_question_5b_rw').value = '',
            document.getElementById('fe_rll_question_5b_rw'));


        const fe_lltbp_question_1a_rw_input = (
            document.getElementById('fe_lltbp_question_1a_rw').value = '',
            document.getElementById('fe_lltbp_question_1a_rw'));
        const fe_lltbp_question_2a_rw_input = (
            document.getElementById('fe_lltbp_question_2a_rw').value = '',
            document.getElementById('fe_lltbp_question_2a_rw'));
        const fe_lltbp_question_3a_rw_input = (
            document.getElementById('fe_lltbp_question_3a_rw').value = '',
            document.getElementById('fe_lltbp_question_3a_rw'));
        const fe_lltbp_question_4a_rw_input = (
            document.getElementById('fe_lltbp_question_4a_rw').value = '',
            document.getElementById('fe_lltbp_question_4a_rw'));
        const fe_lltbp_question_5a_rw_input = (
            document.getElementById('fe_lltbp_question_5a_rw').value = '',
            document.getElementById('fe_lltbp_question_5a_rw'));
        const fe_lltbp_question_1b_rw_input = (
            document.getElementById('fe_lltbp_question_1b_rw').value = '',
            document.getElementById('fe_lltbp_question_1b_rw'));
        const fe_lltbp_question_2b_rw_input = (
            document.getElementById('fe_lltbp_question_2b_rw').value = '',
            document.getElementById('fe_lltbp_question_2b_rw'));
        const fe_lltbp_question_3b_rw_input = (
            document.getElementById('fe_lltbp_question_3b_rw').value = '',
            document.getElementById('fe_lltbp_question_3b_rw'));
        const fe_lltbp_question_4b_rw_input = (
            document.getElementById('fe_lltbp_question_4b_rw').value = '',
            document.getElementById('fe_lltbp_question_4b_rw'));
        const fe_lltbp_question_5b_rw_input = (
            document.getElementById('fe_lltbp_question_5b_rw').value = '',
            document.getElementById('fe_lltbp_question_5b_rw'));


        const fe_rlltbp_question_1a_rw_input = (
            document.getElementById('fe_rlltbp_question_1a_rw').value = '',
            document.getElementById('fe_rlltbp_question_1a_rw'));
        const fe_rlltbp_question_2a_rw_input = (
            document.getElementById('fe_rlltbp_question_2a_rw').value = '',
            document.getElementById('fe_rlltbp_question_2a_rw'));
        const fe_rlltbp_question_3a_rw_input = (
            document.getElementById('fe_rlltbp_question_3a_rw').value = '',
            document.getElementById('fe_rlltbp_question_3a_rw'));
        const fe_rlltbp_question_4a_rw_input = (
            document.getElementById('fe_rlltbp_question_4a_rw').value = '',
            document.getElementById('fe_rlltbp_question_4a_rw'));
        const fe_rlltbp_question_5a_rw_input = (
            document.getElementById('fe_rlltbp_question_5a_rw').value = '',
            document.getElementById('fe_rlltbp_question_5a_rw'));
        const fe_rlltbp_question_1b_rw_input = (
            document.getElementById('fe_rlltbp_question_1b_rw').value = '',
            document.getElementById('fe_rlltbp_question_1b_rw'));
        const fe_rlltbp_question_2b_rw_input = (
            document.getElementById('fe_rlltbp_question_2b_rw').value = '',
            document.getElementById('fe_rlltbp_question_2b_rw'));
        const fe_rlltbp_question_3b_rw_input = (
            document.getElementById('fe_rlltbp_question_3b_rw').value = '',
            document.getElementById('fe_rlltbp_question_3b_rw'));
        const fe_rlltbp_question_4b_rw_input = (
            document.getElementById('fe_rlltbp_question_4b_rw').value = '',
            document.getElementById('fe_rlltbp_question_4b_rw'));
        const fe_rlltbp_question_5b_rw_input = (
            document.getElementById('fe_rlltbp_question_5b_rw').value = '',
            document.getElementById('fe_rlltbp_question_5b_rw'));


        const fe_pp_question_6_sub_1_select = (
            document.getElementById('fe_pp_question_6_sub_1').value = '',
            document.getElementById('fe_pp_question_6_sub_1'));
        const fe_pp_question_7_sub_1_select = (
            document.getElementById('fe_pp_question_7_sub_1').value = "",
            document.getElementById('fe_pp_question_7_sub_1'));
        const fe_hsp_question_1_subQuestion_1_select = (
            document.getElementById('fe_hsp_question_1_subQuestion_1').value = '',
            document.getElementById('fe_hsp_question_1_subQuestion_1'));
        const fe_hsp_question_1_subQuestion_2_select = (
            document.getElementById('fe_hsp_question_1_subQuestion_2').value = '',
            document.getElementById('fe_hsp_question_1_subQuestion_2'));

        const selectedEmployeeText = employeeSelect.options[employeeSelect.selectedIndex].text.toLowerCase();

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


                'fe_rll_question_1a_rw_input': fe_rll_question_1a_rw_input,
                'fe_rll_question_2a_rw_input': fe_rll_question_2a_rw_input,
                'fe_rll_question_3a_rw_input': fe_rll_question_3a_rw_input,
                'fe_rll_question_4a_rw_input': fe_rll_question_4a_rw_input,
                'fe_rll_question_5a_rw_input': fe_rll_question_5a_rw_input,
                'fe_rll_question_1b_rw_input': fe_rll_question_1b_rw_input,
                'fe_rll_question_2b_rw_input': fe_rll_question_2b_rw_input,
                'fe_rll_question_3b_rw_input': fe_rll_question_3b_rw_input,
                'fe_rll_question_4b_rw_input': fe_rll_question_4b_rw_input,
                'fe_rll_question_5b_rw_input': fe_rll_question_5b_rw_input,


                'fe_lltbp_question_1a_rw_input': fe_lltbp_question_1a_rw_input,
                'fe_lltbp_question_2a_rw_input': fe_lltbp_question_2a_rw_input,
                'fe_lltbp_question_3a_rw_input': fe_lltbp_question_3a_rw_input,
                'fe_lltbp_question_4a_rw_input': fe_lltbp_question_4a_rw_input,
                'fe_lltbp_question_5a_rw_input': fe_lltbp_question_5a_rw_input,
                'fe_lltbp_question_1b_rw_input': fe_lltbp_question_1b_rw_input,
                'fe_lltbp_question_2b_rw_input': fe_lltbp_question_2b_rw_input,
                'fe_lltbp_question_3b_rw_input': fe_lltbp_question_3b_rw_input,
                'fe_lltbp_question_4b_rw_input': fe_lltbp_question_4b_rw_input,
                'fe_lltbp_question_5b_rw_input': fe_lltbp_question_5b_rw_input,


                'fe_rlltbp_question_1a_rw_input': fe_rlltbp_question_1a_rw_input,
                'fe_rlltbp_question_2a_rw_input': fe_rlltbp_question_2a_rw_input,
                'fe_rlltbp_question_3a_rw_input': fe_rlltbp_question_3a_rw_input,
                'fe_rlltbp_question_4a_rw_input': fe_rlltbp_question_4a_rw_input,
                'fe_rlltbp_question_5a_rw_input': fe_rlltbp_question_5a_rw_input,
                'fe_rlltbp_question_1b_rw_input': fe_rlltbp_question_1b_rw_input,
                'fe_rlltbp_question_2b_rw_input': fe_rlltbp_question_2b_rw_input,
                'fe_rlltbp_question_3b_rw_input': fe_rlltbp_question_3b_rw_input,
                'fe_rlltbp_question_4b_rw_input': fe_rlltbp_question_4b_rw_input,
                'fe_rlltbp_question_5b_rw_input': fe_rlltbp_question_5b_rw_input,


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

    function updateGenderField(employeeId, inputs) {
        if (!employeeId) return;
        // Reset gender field
        const genderSelect = inputs.genderSelect;
        genderSelect.value = '';
        genderSelect.disabled = true;

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

                    if (data.gender == 'Male') {
                        inputs.fe_ll_question_1a_rw_input.value = '10.000';
                        inputs.fe_ll_question_2a_rw_input.value = '20.000';
                        inputs.fe_ll_question_3a_rw_input.value = '25.000';
                        inputs.fe_ll_question_4a_rw_input.value = '20.000';
                        inputs.fe_ll_question_5a_rw_input.value = '10.000';
                        inputs.fe_ll_question_1b_rw_input.value = '5.000';
                        inputs.fe_ll_question_2b_rw_input.value = '10.000';
                        inputs.fe_ll_question_3b_rw_input.value = '15.000';
                        inputs.fe_ll_question_4b_rw_input.value = '10.000';
                        inputs.fe_ll_question_5b_rw_input.value = '5.000';


                        inputs.fe_rll_question_1a_rw_input.value = '10.000';
                        inputs.fe_rll_question_2a_rw_input.value = '20.000';
                        inputs.fe_rll_question_3a_rw_input.value = '25.000';
                        inputs.fe_rll_question_4a_rw_input.value = '20.000';
                        inputs.fe_rll_question_5a_rw_input.value = '10.000';
                        inputs.fe_rll_question_1b_rw_input.value = '5.000';
                        inputs.fe_rll_question_2b_rw_input.value = '10.000';
                        inputs.fe_rll_question_3b_rw_input.value = '15.000';
                        inputs.fe_rll_question_4b_rw_input.value = '10.000';
                        inputs.fe_rll_question_5b_rw_input.value = '5.000';


                        inputs.fe_lltbp_question_1a_rw_input.value = '10.000';
                        inputs.fe_lltbp_question_2a_rw_input.value = '20.000';
                        inputs.fe_lltbp_question_3a_rw_input.value = '25.000';
                        inputs.fe_lltbp_question_4a_rw_input.value = '20.000';
                        inputs.fe_lltbp_question_5a_rw_input.value = '10.000';
                        inputs.fe_lltbp_question_1b_rw_input.value = '5.000';
                        inputs.fe_lltbp_question_2b_rw_input.value = '10.000';
                        inputs.fe_lltbp_question_3b_rw_input.value = '15.000';
                        inputs.fe_lltbp_question_4b_rw_input.value = '10.000';
                        inputs.fe_lltbp_question_5b_rw_input.value = '5.000';


                        inputs.fe_rlltbp_question_1a_rw_input.value = '10.000';
                        inputs.fe_rlltbp_question_2a_rw_input.value = '20.000';
                        inputs.fe_rlltbp_question_3a_rw_input.value = '25.000';
                        inputs.fe_rlltbp_question_4a_rw_input.value = '20.000';
                        inputs.fe_rlltbp_question_5a_rw_input.value = '10.000';
                        inputs.fe_rlltbp_question_1b_rw_input.value = '5.000';
                        inputs.fe_rlltbp_question_2b_rw_input.value = '10.000';
                        inputs.fe_rlltbp_question_3b_rw_input.value = '15.000';
                        inputs.fe_rlltbp_question_4b_rw_input.value = '10.000';
                        inputs.fe_rlltbp_question_5b_rw_input.value = '5.000';


                        inputs.fe_pp_question_6_sub_1_select.value = 'male_more_than_1000kg';
                        inputs.fe_pp_question_7_sub_1_select.value = 'male_more_than_100kg';
                        inputs.fe_hsp_question_1_subQuestion_1_select.value = 'Male';
                        inputs.fe_hsp_question_1_subQuestion_2_select.value = '5kg';
                    } else if (data.gender == 'Female') {
                        inputs.fe_ll_question_1a_rw_input.value = '7.000';
                        inputs.fe_ll_question_2a_rw_input.value = '13.000';
                        inputs.fe_ll_question_3a_rw_input.value = '16.000';
                        inputs.fe_ll_question_4a_rw_input.value = '13.000';
                        inputs.fe_ll_question_5a_rw_input.value = '7.000';
                        inputs.fe_ll_question_1b_rw_input.value = '3.000';
                        inputs.fe_ll_question_2b_rw_input.value = '7.000';
                        inputs.fe_ll_question_3b_rw_input.value = '10.000';
                        inputs.fe_ll_question_4b_rw_input.value = '7.000';
                        inputs.fe_ll_question_5b_rw_input.value = '3.000';


                        inputs.fe_rll_question_1a_rw_input.value = '7.000';
                        inputs.fe_rll_question_2a_rw_input.value = '13.000';
                        inputs.fe_rll_question_3a_rw_input.value = '16.000';
                        inputs.fe_rll_question_4a_rw_input.value = '13.000';
                        inputs.fe_rll_question_5a_rw_input.value = '7.000';
                        inputs.fe_rll_question_1b_rw_input.value = '3.000';
                        inputs.fe_rll_question_2b_rw_input.value = '7.000';
                        inputs.fe_rll_question_3b_rw_input.value = '10.000';
                        inputs.fe_rll_question_4b_rw_input.value = '7.000';
                        inputs.fe_rll_question_5b_rw_input.value = '3.000';


                        inputs.fe_lltbp_question_1a_rw_input.value = '7.000';
                        inputs.fe_lltbp_question_2a_rw_input.value = '13.000';
                        inputs.fe_lltbp_question_3a_rw_input.value = '16.000';
                        inputs.fe_lltbp_question_4a_rw_input.value = '13.000';
                        inputs.fe_lltbp_question_5a_rw_input.value = '7.000';
                        inputs.fe_lltbp_question_1b_rw_input.value = '3.000';
                        inputs.fe_lltbp_question_2b_rw_input.value = '7.000';
                        inputs.fe_lltbp_question_3b_rw_input.value = '10.000';
                        inputs.fe_lltbp_question_4b_rw_input.value = '7.000';
                        inputs.fe_lltbp_question_5b_rw_input.value = '3.000';


                        inputs.fe_rlltbp_question_1a_rw_input.value = '7.000';
                        inputs.fe_rlltbp_question_2a_rw_input.value = '13.000';
                        inputs.fe_rlltbp_question_3a_rw_input.value = '16.000';
                        inputs.fe_rlltbp_question_4a_rw_input.value = '13.000';
                        inputs.fe_rlltbp_question_5a_rw_input.value = '7.000';
                        inputs.fe_rlltbp_question_1b_rw_input.value = '3.000';
                        inputs.fe_rlltbp_question_2b_rw_input.value = '7.000';
                        inputs.fe_rlltbp_question_3b_rw_input.value = '10.000';
                        inputs.fe_rlltbp_question_4b_rw_input.value = '7.000';
                        inputs.fe_rlltbp_question_5b_rw_input.value = '3.000';


                        inputs.fe_pp_question_6_sub_1_select.value = 'female_more_than_750kg';
                        inputs.fe_pp_question_7_sub_1_select.value = 'female_more_than_75kg';
                        inputs.fe_hsp_question_1_subQuestion_1_select.value = 'Female';
                        inputs.fe_hsp_question_1_subQuestion_2_select.value = '3kg';
                    }
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
</script>
