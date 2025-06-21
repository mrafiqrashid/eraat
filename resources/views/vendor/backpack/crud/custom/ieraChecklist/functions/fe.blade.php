    @include('crud::custom.ieraChecklist.functions.fe.gender')
    <script>
        function feInitialize() {
            genderEventListeners();
            feLLEventListeners();
            setTimeout(() => {
                genderUpdate();
                feLLEventListeners();

            }, 100);
        }

        function feLLEventListeners() {
            const applicableCheckbox = document.getElementById('fe_ll_question_1a_applicable');
            const questionField = document.getElementById('fe_ll_question_1a');

            if (applicableCheckbox) {
                applicableCheckbox.addEventListener('change', function() {
                    // console.log('Checkbox value:', this.checked);
                    if (this.checked) {
                        questionField.disabled = false;
                    } else {
                        questionField.disabled = true;
                    }
                });
            }
        }

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
