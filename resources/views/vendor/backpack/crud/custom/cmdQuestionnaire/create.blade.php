@extends($crud->getCurrentOperation() == 'create' ? 'vendor.backpack.crud.create' : 'vendor.backpack.crud.edit')
@section('after_scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function updateTotalScore() {
                const neckScore = parseFloat(document.getElementById('neck_score')?.value || '0');
                const shoulderRightScore = parseFloat(document.getElementById('shoulder_right_score')?.value ||
                    '0');
                const shoulderLeftScore = parseFloat(document.getElementById('shoulder_left_score')?.value || '0');
                const upperBackScore = parseFloat(document.getElementById('upper_back_score')?.value || '0');
                const upperArmRightScore = parseFloat(document.getElementById('upper_arm_right_score')?.value ||
                    '0');
                const upperArmLeftScore = parseFloat(document.getElementById('upper_arm_left_score')?.value || '0');
                const lowerBackScore = parseFloat(document.getElementById('lower_back_score')?.value || '0');
                const forearmRightScore = parseFloat(document.getElementById('forearm_right_score')?.value || '0');
                const forearmLeftScore = parseFloat(document.getElementById('forearm_left_score')?.value || '0');
                const wristRightScore = parseFloat(document.getElementById('wrist_right_score')?.value || '0');
                const wristLeftScore = parseFloat(document.getElementById('wrist_left_score')?.value || '0');
                const hipOrButtocksScore = parseFloat(document.getElementById('hip_or_buttocks_score')?.value ||
                    '0');
                const thighRightScore = parseFloat(document.getElementById('thigh_right_score')?.value || '0');
                const thighLeftScore = parseFloat(document.getElementById('thigh_left_score')?.value || '0');
                const kneeRightScore = parseFloat(document.getElementById('knee_right_score')?.value || '0');
                const kneeLeftScore = parseFloat(document.getElementById('knee_left_score')?.value || '0');
                const lowerLegRightScore = parseFloat(document.getElementById('lower_leg_right_score')?.value ||
                    '0');
                const lowerLegLeftScore = parseFloat(document.getElementById('lower_leg_left_score')?.value || '0');
                const footRightScore = parseFloat(document.getElementById('foot_right_score')?.value || '0');
                const footLeftScore = parseFloat(document.getElementById('foot_left_score')?.value || '0');

                const total = neckScore + shoulderLeftScore + shoulderRightScore + upperBackScore +
                    upperArmRightScore + upperArmLeftScore + lowerBackScore + forearmRightScore +
                    forearmLeftScore +
                    wristRightScore +
                    wristLeftScore +
                    hipOrButtocksScore +
                    thighRightScore +
                    thighLeftScore +
                    kneeRightScore +
                    kneeLeftScore +
                    lowerLegRightScore +
                    lowerLegLeftScore +
                    footRightScore +
                    footLeftScore;
                const totalField = document.getElementById('cmdQuestionnaire_totalScore');
                if (totalField) {
                    totalField.value = total.toFixed(1);

                    // Dispatch change event for Backpack
                    const event = new Event('change', {
                        bubbles: true
                    });
                    totalField.dispatchEvent(event);
                }
            }

            // function setupMusculoskeletalLogic(prefix) {
            //     const aInputs = document.querySelectorAll(`input[name="${prefix}_a"]`);
            //     const bInputs = document.querySelectorAll(`input[name="${prefix}_b"]`);
            //     const cInputs = document.querySelectorAll(`input[name="${prefix}_c"]`);
            //     const scoreInput = document.getElementById(`${prefix}_score`);

            //     function handleASelection() {
            //         const selectedAValue = document.querySelector(`input[name="${prefix}_a"]:checked`)?.value;
            //         const selectedBValue = document.querySelector(`input[name="${prefix}_b"]:checked`)?.value;
            //         const selectedCValue = document.querySelector(`input[name="${prefix}_c"]:checked`)?.value;


            //         const isDisabled = selectedAValue === '0.0';
            //         const isNotZero = selectedAValue !== '0.0';

            //         bInputs.forEach(radio => {
            //             radio.disabled = isDisabled;
            //             if (isDisabled) {
            //                 radio.checked = false;
            //             } else if (!selectedBValue && radio.value === '1') {
            //                 radio.checked = true;
            //             }
            //         });

            //         if (isDisabled) {
            //             let hiddenInput = document.querySelector(`input[type="hidden"][name="${prefix}_b"]`);
            //             if (!hiddenInput) {
            //             hiddenInput = document.createElement('input');
            //             hiddenInput.type = 'hidden';
            //             hiddenInput.name = fieldName;
            //             document.querySelector('form').appendChild(hiddenInput);
            //             }
            //             hiddenInput.value = '';
            //         }
            //         cInputs.forEach(radio => {
            //             radio.disabled = isDisabled;
            //             if (isDisabled) {
            //                 radio.checked = false;
            //             } else if (!selectedCValue && radio.value === '1') {
            //                 radio.checked = true;
            //             }
            //         });

            //         if (isDisabled) {
            //             scoreInput.value = '0.0';
            //             updateTotalScore();
            //         } else {
            //             calculateScore();
            //         }
            //     }

            //     function calculateScore() {
            //         const a = parseFloat(document.querySelector(`input[name="${prefix}_a"]:checked`)?.value || '0');
            //         const b = parseFloat(document.querySelector(`input[name="${prefix}_b"]:checked`)?.value || '0');
            //         const c = parseFloat(document.querySelector(`input[name="${prefix}_c"]:checked`)?.value || '0');

            //         const score = a * b * c;
            //         scoreInput.value = score.toFixed(1);

            //         // Notify Backpack of the change
            //         const event = new Event('change', {
            //             bubbles: true
            //         });
            //         scoreInput.dispatchEvent(event);

            //         // Update total score
            //         updateTotalScore();
            //     }

            //     aInputs.forEach(radio => radio.addEventListener('change', handleASelection));
            //     bInputs.forEach(radio => radio.addEventListener('change', calculateScore));
            //     cInputs.forEach(radio => radio.addEventListener('change', calculateScore));

            //     handleASelection(); // initialize on page load
            // }
            function setupMusculoskeletalLogic(prefix) {
                const aInputs = document.querySelectorAll(`input[name="${prefix}_a"]`);
                const bInputs = document.querySelectorAll(`input[name="${prefix}_b"]`);
                const cInputs = document.querySelectorAll(`input[name="${prefix}_c"]`);
                const scoreInput = document.getElementById(`${prefix}_score`);

                function handleASelection() {
                    const selectedAValue = document.querySelector(`input[name="${prefix}_a"]:checked`)?.value;
                    const selectedBValue = document.querySelector(`input[name="${prefix}_b"]:checked`)?.value;
                    const selectedCValue = document.querySelector(`input[name="${prefix}_c"]:checked`)?.value;

                    const isDisabled = selectedAValue === '0.0';

                    // Handle B inputs
                    bInputs.forEach(radio => {
                        radio.disabled = isDisabled;
                        if (isDisabled) {
                            radio.checked = false;
                        } else if (!selectedBValue && radio.value === '1') {
                            radio.checked = true;
                        }
                    });

                    // Handle hidden input for neck_b
                    if (isDisabled) {
                        let hiddenInputB = document.querySelector(`input[type="hidden"][name="${prefix}_b"]`);
                        if (!hiddenInputB) {
                            hiddenInputB = document.createElement('input');
                            hiddenInputB.type = 'hidden';
                            hiddenInputB.name = `${prefix}_b`; // Fixed: was using undefined fieldName
                            document.querySelector('form').appendChild(hiddenInputB);
                        }
                        hiddenInputB.value = ''; // Empty value will save as null
                    } else {
                        // Remove hidden input when field is enabled
                        const hiddenInputB = document.querySelector(`input[type="hidden"][name="${prefix}_b"]`);
                        if (hiddenInputB) {
                            hiddenInputB.remove();
                        }
                    }

                    // Handle C inputs
                    cInputs.forEach(radio => {
                        radio.disabled = isDisabled;
                        if (isDisabled) {
                            radio.checked = false;
                        } else if (!selectedCValue && radio.value === '1') {
                            radio.checked = true;
                        }
                    });

                    // Handle hidden input for neck_c
                    if (isDisabled) {
                        let hiddenInputC = document.querySelector(`input[type="hidden"][name="${prefix}_c"]`);
                        if (!hiddenInputC) {
                            hiddenInputC = document.createElement('input');
                            hiddenInputC.type = 'hidden';
                            hiddenInputC.name = `${prefix}_c`; // Added missing hidden input for C
                            document.querySelector('form').appendChild(hiddenInputC);
                        }
                        hiddenInputC.value = ''; // Empty value will save as null
                    } else {
                        // Remove hidden input when field is enabled
                        const hiddenInputC = document.querySelector(`input[type="hidden"][name="${prefix}_c"]`);
                        if (hiddenInputC) {
                            hiddenInputC.remove();
                        }
                    }

                    if (isDisabled) {
                        scoreInput.value = '0.0';
                        updateTotalScore();
                    } else {
                        calculateScore();
                    }
                }

                function calculateScore() {
                    const a = parseFloat(document.querySelector(`input[name="${prefix}_a"]:checked`)?.value || '0');
                    const b = parseFloat(document.querySelector(`input[name="${prefix}_b"]:checked`)?.value || '0');
                    const c = parseFloat(document.querySelector(`input[name="${prefix}_c"]:checked`)?.value || '0');

                    const score = a * b * c;
                    scoreInput.value = score.toFixed(1);

                    // Notify Backpack of the change
                    const event = new Event('change', {
                        bubbles: true
                    });
                    scoreInput.dispatchEvent(event);

                    // Update total score
                    updateTotalScore();
                }

                // Add form submission handler to ensure null values are sent
                const form = document.querySelector('form');
                if (form && !form.hasListener) {
                    form.hasListener = true; // Prevent duplicate listeners
                    form.addEventListener('submit', function() {
                        const selectedAValue = document.querySelector(`input[name="${prefix}_a"]:checked`)
                            ?.value;

                        if (selectedAValue === '0.0') {
                            // Ensure both B and C have hidden inputs with empty values
                            [`${prefix}_b`, `${prefix}_c`].forEach(fieldName => {
                                let hiddenInput = document.querySelector(
                                    `input[type="hidden"][name="${fieldName}"]`);
                                if (!hiddenInput) {
                                    hiddenInput = document.createElement('input');
                                    hiddenInput.type = 'hidden';
                                    hiddenInput.name = fieldName;
                                    hiddenInput.value = '';
                                    form.appendChild(hiddenInput);
                                }
                            });
                        }
                    });
                }

                aInputs.forEach(radio => radio.addEventListener('change', handleASelection));
                bInputs.forEach(radio => radio.addEventListener('change', calculateScore));
                cInputs.forEach(radio => radio.addEventListener('change', calculateScore));

                handleASelection(); // initialize on page load
            }
            setTimeout(() => {
                // Apply logic to each section
                setupMusculoskeletalLogic('neck');
                setupMusculoskeletalLogic('shoulder_left');
                setupMusculoskeletalLogic('shoulder_right');
                setupMusculoskeletalLogic('upper_back');
                setupMusculoskeletalLogic('upper_arm_right');
                setupMusculoskeletalLogic('upper_arm_left');
                setupMusculoskeletalLogic('lower_back');
                setupMusculoskeletalLogic('forearm_right');
                setupMusculoskeletalLogic('forearm_left');
                setupMusculoskeletalLogic('wrist_right');
                setupMusculoskeletalLogic('wrist_left');
                setupMusculoskeletalLogic('hip_or_buttocks');
                setupMusculoskeletalLogic('thigh_right');
                setupMusculoskeletalLogic('thigh_left');
                setupMusculoskeletalLogic('knee_right');
                setupMusculoskeletalLogic('knee_left');
                setupMusculoskeletalLogic('lower_leg_right');
                setupMusculoskeletalLogic('lower_leg_left');
                setupMusculoskeletalLogic('foot_right');
                setupMusculoskeletalLogic('foot_left');
            }, 100);
        });
    </script>
@endsection
