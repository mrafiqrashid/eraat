<script>
    function applicableUpdate() {
        const checkboxInputPairs = [
            ['fe_ll_question_1a_applicable', 'fe_ll_question_1a', 'fe_rll_question_1a', 'fe_lltbp_question_1a',
                'fe_rlltbp_question_1a'
            ],
            ['fe_ll_question_1b_applicable', 'fe_ll_question_1b', 'fe_rll_question_1b', 'fe_lltbp_question_1b',
                'fe_rlltbp_question_1b'
            ],
            ['fe_ll_question_2a_applicable', 'fe_ll_question_2a', 'fe_rll_question_2a', 'fe_lltbp_question_2a',
                'fe_rlltbp_question_2a'
            ],
            ['fe_ll_question_2b_applicable', 'fe_ll_question_2b', 'fe_rll_question_2b', 'fe_lltbp_question_2b',
                'fe_rlltbp_question_2b'
            ],
            ['fe_ll_question_3a_applicable', 'fe_ll_question_3a', 'fe_rll_question_3a', 'fe_lltbp_question_3a',
                'fe_rlltbp_question_3a'
            ],
            ['fe_ll_question_3b_applicable', 'fe_ll_question_3b', 'fe_rll_question_3b', 'fe_lltbp_question_3b',
                'fe_rlltbp_question_3b'
            ],
            ['fe_ll_question_4a_applicable', 'fe_ll_question_4a', 'fe_rll_question_4a', 'fe_lltbp_question_4a',
                'fe_rlltbp_question_4a'
            ],
            ['fe_ll_question_4b_applicable', 'fe_ll_question_4b', 'fe_rll_question_4b', 'fe_lltbp_question_4b',
                'fe_rlltbp_question_4b'
            ],
            ['fe_ll_question_5a_applicable', 'fe_ll_question_5a', 'fe_rll_question_5a', 'fe_lltbp_question_5a',
                'fe_rlltbp_question_5a'
            ],
            ['fe_ll_question_5b_applicable', 'fe_ll_question_5b', 'fe_rll_question_5b', 'fe_lltbp_question_5b',
                'fe_rlltbp_question_5b'
            ],
        ];

        checkboxInputPairs.forEach(([checkboxId, llInputId, rllInputId, lltbpInputId, rlltbpInputId]) => {
            const checkbox = document.getElementById(checkboxId);
            const llInput = document.getElementById(llInputId);
            const rllInput = document.getElementById(rllInputId);
            const lltbpInput = document.getElementById(lltbpInputId);
            const rlltbpInput = document.getElementById(rlltbpInputId);

            if (checkbox && llInput && rllInput) {
                llInput.disabled = !checkbox.checked;
                rllInput.disabled = !checkbox.checked;
                lltbpInput.disabled = !checkbox.checked;
                rlltbpInput.disabled = !checkbox.checked;

                checkbox.addEventListener('change', () => {
                    llInput.disabled = !checkbox.checked;
                    rllInput.disabled = !checkbox.checked;
                    lltbpInput.disabled = !checkbox.checked;
                    rlltbpInput.disabled = !checkbox.checked;
                    if (!checkbox.checked) {
                        llInput.value = '0.000';
                        rllInput.value = '0';
                        lltbpInput.value = '0';
                        rlltbpInput.value = '0';
                    }
                });
            }
        });
    }
</script>