@extends('vendor.backpack.crud.update')

{{-- <script>
    function updateAPResult() {
            let ap_count = 0;

            const ap_question_1 = document.getElementById('ap_question_1');
            const ap_question_2 = document.getElementById('ap_question_2');
            const ap_question_3 = document.getElementById('ap_question_3');
            const ap_question_4 = document.getElementById('ap_question_4');
            const ap_question_5 = document.getElementById('ap_question_5');
            const ap_question_6 = document.getElementById('ap_question_6');
            const ap_question_7 = document.getElementById('ap_question_7');
            const ap_question_8 = document.getElementById('ap_question_8');
            const ap_question_9 = document.getElementById('ap_question_9');
            const ap_question_10 = document.getElementById('ap_question_10');
            const ap_question_11 = document.getElementById('ap_question_11');
            const ap_question_12 = document.getElementById('ap_question_12');
            const ap_question_13 = document.getElementById('ap_question_13');

            const ap_score = document.getElementById('ap_score');

            if (ap_question_1 && ap_question_1.value === '2') ap_count++;
            if (ap_question_2 && ap_question_2.value === '2') ap_count++;
            if (ap_question_3 && ap_question_3.value === '2') ap_count++;
            if (ap_question_4 && ap_question_4.value === '2') ap_count++;
            if (ap_question_5 && ap_question_5.value === '2') ap_count++;
            if (ap_question_6 && ap_question_6.value === '2') ap_count++;
            if (ap_question_7 && ap_question_7.value === '2') ap_count++;
            if (ap_question_8 && ap_question_8.value === '2') ap_count++;
            if (ap_question_9 && ap_question_9.value === '2') ap_count++;
            if (ap_question_10 && ap_question_10.value === '2') ap_count++;
            if (ap_question_11 && ap_question_11.value === '2') ap_count++;
            if (ap_question_12 && ap_question_12.value === '2') ap_count++;
            if (ap_question_13 && ap_question_13.value === '2') ap_count++;

            if (ap_score) ap_score.value = ap_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const ap_question_1 = document.getElementById('ap_question_1');
            const ap_question_2 = document.getElementById('ap_question_2');
            const ap_question_3 = document.getElementById('ap_question_3');
            const ap_question_4 = document.getElementById('ap_question_4');
            const ap_question_5 = document.getElementById('ap_question_5');
            const ap_question_6 = document.getElementById('ap_question_6');
            const ap_question_7 = document.getElementById('ap_question_7');
            const ap_question_8 = document.getElementById('ap_question_8');
            const ap_question_9 = document.getElementById('ap_question_9');
            const ap_question_10 = document.getElementById('ap_question_10');
            const ap_question_11 = document.getElementById('ap_question_11');
            const ap_question_12 = document.getElementById('ap_question_12');
            const ap_question_13 = document.getElementById('ap_question_13');

            if (ap_question_1) ap_question_1.addEventListener('change', updateAPResult);
            if (ap_question_2) ap_question_2.addEventListener('change', updateAPResult);
            if (ap_question_3) ap_question_3.addEventListener('change', updateAPResult);
            if (ap_question_4) ap_question_4.addEventListener('change', updateAPResult);
            if (ap_question_5) ap_question_5.addEventListener('change', updateAPResult);
            if (ap_question_6) ap_question_6.addEventListener('change', updateAPResult);
            if (ap_question_7) ap_question_7.addEventListener('change', updateAPResult);
            if (ap_question_8) ap_question_8.addEventListener('change', updateAPResult);
            if (ap_question_9) ap_question_9.addEventListener('change', updateAPResult);
            if (ap_question_10) ap_question_10.addEventListener('change', updateAPResult);
            if (ap_question_11) ap_question_11.addEventListener('change', updateAPResult);
            if (ap_question_12) ap_question_12.addEventListener('change', updateAPResult);
            if (ap_question_13) ap_question_13.addEventListener('change', updateAPResult);

            // Trigger once on load
            updateAPResult();
        });
</script>
<script>
    function updateSNSWPResult() {
            let snswp_count = 0;

            const snswp_question_1 = document.getElementById('snswp_question_1');
            const snswp_question_2 = document.getElementById('snswp_question_2');
            const snswp_question_3 = document.getElementById('snswp_question_3');
            const snswp_score = document.getElementById('snswp_score');

            if (snswp_question_1 && snswp_question_1.value === '2') snswp_count++;
            if (snswp_question_2 && snswp_question_2.value === '2') snswp_count++;
            if (snswp_question_3 && snswp_question_3.value === '2') snswp_count++;

            if (snswp_score) snswp_score.value = snswp_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const snswp_question_1 = document.getElementById('snswp_question_1');
            const snswp_question_2 = document.getElementById('snswp_question_2');
            const snswp_question_3 = document.getElementById('snswp_question_3');

            if (snswp_question_1) snswp_question_1.addEventListener('change', updateSNSWPResult);
            if (snswp_question_2) snswp_question_2.addEventListener('change', updateSNSWPResult);
            if (snswp_question_3) snswp_question_3.addEventListener('change', updateSNSWPResult);

            // Trigger once on load
            updateSNSWPResult();
        });
</script>

<script>
    function toggleFEQuestion() {
            const fe_ll_question_1a = document.getElementById('fe_ll_question_1a');
            const fe_ll_question_1b = document.getElementById('fe_ll_question_1b');
            const fe_ll_question_2a = document.getElementById('fe_ll_question_2a');
            const fe_ll_question_2b = document.getElementById('fe_ll_question_2b');
            const fe_ll_question_3a = document.getElementById('fe_ll_question_3a');
            const fe_ll_question_3b = document.getElementById('fe_ll_question_3b');
            const fe_ll_question_4a = document.getElementById('fe_ll_question_4a');
            const fe_ll_question_4b = document.getElementById('fe_ll_question_4b');
            const fe_ll_question_5a = document.getElementById('fe_ll_question_5a');
            const fe_ll_question_5b = document.getElementById('fe_ll_question_5b');

            if (fe_ll_question_1a && fe_ll_question_1b) {
                if (fe_ll_question_1a.value === '2') {
                    fe_ll_question_1b.removeAttribute('readonly');
                } else {
                    fe_ll_question_1b.setAttribute('readonly', true);
                    fe_ll_question_1b.value = 0; // Optional: Reset value when disabled
                }
            }
            if (fe_ll_question_2a && fe_ll_question_2b) {
                if (fe_ll_question_2a.value === '2') {
                    fe_ll_question_2b.removeAttribute('readonly');
                } else {
                    fe_ll_question_2b.setAttribute('readonly', true);
                    fe_ll_question_2b.value = 0; // Optional: Reset value when disabled
                }
            }
            if (fe_ll_question_3a && fe_ll_question_3b) {
                if (fe_ll_question_3a.value === '2') {
                    fe_ll_question_3b.removeAttribute('readonly');
                } else {
                    fe_ll_question_3b.setAttribute('readonly', true);
                    fe_ll_question_3b.value = 0; // Optional: Reset value when disabled
                }
            }
            if (fe_ll_question_4a && fe_ll_question_4b) {
                if (fe_ll_question_4a.value === '2') {
                    fe_ll_question_4b.removeAttribute('readonly');
                } else {
                    fe_ll_question_4b.setAttribute('readonly', true);
                    fe_ll_question_4b.value = 0; // Optional: Reset value when disabled
                }
            }
            if (fe_ll_question_5a && fe_ll_question_5b) {
                if (fe_ll_question_5a.value === '2') {
                    fe_ll_question_5b.removeAttribute('readonly');
                } else {
                    fe_ll_question_5b.setAttribute('readonly', true);
                    fe_ll_question_5b.value = 0; // Optional: Reset value when disabled
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const fe_ll_question_1a = document.getElementById('fe_ll_question_1a');
            const fe_ll_question_2a = document.getElementById('fe_ll_question_2a');
            const fe_ll_question_3a = document.getElementById('fe_ll_question_3a');
            const fe_ll_question_4a = document.getElementById('fe_ll_question_4a');
            const fe_ll_question_5a = document.getElementById('fe_ll_question_5a');

            if (fe_ll_question_1a) {
                fe_ll_question_1a.addEventListener('change', toggleFEQuestion);
                toggleFEQuestion();
            }
            if (fe_ll_question_2a) {
                fe_ll_question_2a.addEventListener('change', toggleFEQuestion);
                toggleFEQuestion();
            }
            if (fe_ll_question_3a) {
                fe_ll_question_3a.addEventListener('change', toggleFEQuestion);
                toggleFEQuestion();
            }
            if (fe_ll_question_4a) {
                fe_ll_question_4a.addEventListener('change', toggleFEQuestion);
                toggleFEQuestion();
            }
            if (fe_ll_question_5a) {
                fe_ll_question_5a.addEventListener('change', toggleFEQuestion);
                toggleFEQuestion();
            }
        });
</script>
<script>
    function updateRMResult() {
            let rm_count = 0;

            const rm_question_1 = document.getElementById('rm_question_1');
            const rm_question_2 = document.getElementById('rm_question_2');
            const rm_question_3 = document.getElementById('rm_question_3');
            const rm_question_4 = document.getElementById('rm_question_4');
            const rm_question_5 = document.getElementById('rm_question_5');
            const rm_score = document.getElementById('rm_score');

            if (rm_question_1 && rm_question_1.value === '2') rm_count++;
            if (rm_question_2 && rm_question_2.value === '2') rm_count++;
            if (rm_question_3 && rm_question_3.value === '2') rm_count++;
            if (rm_question_4 && rm_question_4.value === '2') rm_count++;
            if (rm_question_5 && rm_question_5.value === '2') rm_count++;

            if (rm_score) rm_score.value = rm_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const rm_question_1 = document.getElementById('rm_question_1');
            const rm_question_2 = document.getElementById('rm_question_2');
            const rm_question_3 = document.getElementById('rm_question_3');
            const rm_question_4 = document.getElementById('rm_question_4');
            const rm_question_5 = document.getElementById('rm_question_5');

            if (rm_question_1) rm_question_1.addEventListener('change', updateRMResult);
            if (rm_question_2) rm_question_2.addEventListener('change', updateRMResult);
            if (rm_question_3) rm_question_3.addEventListener('change', updateRMResult);
            if (rm_question_4) rm_question_4.addEventListener('change', updateRMResult);
            if (rm_question_5) rm_question_5.addEventListener('change', updateRMResult);

            // Trigger once on load
            updateRMResult();
        });
</script>
<script>
    function updateVibrationResult() {
            let vibration_count = 0;

            const vibration_question_1 = document.getElementById('vibration_question_1');
            const vibration_question_2 = document.getElementById('vibration_question_2');
            const vibration_question_3 = document.getElementById('vibration_question_3');
            const vibration_question_4 = document.getElementById('vibration_question_4');
            const vibration_score = document.getElementById('vibration_score');

            if (vibration_question_1 && vibration_question_1.value === '2') vibration_count++;
            if (vibration_question_2 && vibration_question_2.value === '2') vibration_count++;
            if (vibration_question_3 && vibration_question_3.value === '2') vibration_count++;
            if (vibration_question_4 && vibration_question_4.value === '2') vibration_count++;

            if (vibration_score) vibration_score.value = vibration_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const vibration_question_1 = document.getElementById('vibration_question_1');
            const vibration_question_2 = document.getElementById('vibration_question_2');
            const vibration_question_3 = document.getElementById('vibration_question_3');
            const vibration_question_4 = document.getElementById('vibration_question_4');

            if (vibration_question_1) vibration_question_1.addEventListener('change', updateVibrationResult);
            if (vibration_question_2) vibration_question_2.addEventListener('change', updateVibrationResult);
            if (vibration_question_3) vibration_question_3.addEventListener('change', updateVibrationResult);
            if (vibration_question_4) vibration_question_4.addEventListener('change', updateVibrationResult);

            // Trigger once on load
            updateVibrationResult();
        });
</script>
<script>
    function updateLightingResult() {
            let lighting_count = 0;

            const lighting_question_1 = document.getElementById('lighting_question_1');

            const lighting_score = document.getElementById('lighting_score');

            if (lighting_question_1 && lighting_question_1.value === '2') lighting_count++;

            if (lighting_score) lighting_score.value = lighting_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const lighting_question_1 = document.getElementById('lighting_question_1');

            if (lighting_question_1) lighting_question_1.addEventListener('change', updateLightingResult);

            // Trigger once on load
            updateLightingResult();
        });
</script>
<script>
    function updateTemperatureResult() {
            let temperature_count = 0;

            const temperature_question_1 = document.getElementById('temperature_question_1');
            const temperature_score = document.getElementById('temperature_score');

            if (temperature_question_1 && temperature_question_1.value === '2') temperature_count++;

            if (temperature_score) temperature_score.value = temperature_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const temperature_question_1 = document.getElementById('temperature_question_1');

            if (temperature_question_1) temperature_question_1.addEventListener('change', updateTemperatureResult);

            // Trigger once on load
            updateTemperatureResult();
        });
</script>
<script>
    function updateVentilationResult() {
            let ventilation_count = 0;

            const ventilation_question_1 = document.getElementById('ventilation_question_1');
            const ventilation_score = document.getElementById('ventilation_score');

            if (ventilation_question_1 && ventilation_question_1.value === '2') ventilation_count++;

            if (ventilation_score) ventilation_score.value = ventilation_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const ventilation_question_1 = document.getElementById('ventilation_question_1');

            if (ventilation_question_1) ventilation_question_1.addEventListener('change', updateVentilationResult);

            // Trigger once on load
            updateVentilationResult();
        });
</script>
<script>
    function updateNoiseResult() {
            let noise_count = 0;

            const noise_question_1 = document.getElementById('noise_question_1');
            const noise_question_2 = document.getElementById('noise_question_2');
            const noise_score = document.getElementById('noise_score');

            if (noise_question_1 && noise_question_1.value === '2') noise_count++;
            if (noise_question_2 && noise_question_2.value === '2') noise_count++;

            if (noise_score) noise_score.value = noise_count;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const noise_question_1 = document.getElementById('noise_question_1');
            const noise_question_2 = document.getElementById('noise_question_2');

            if (noise_question_1) noise_question_1.addEventListener('change', updateNoiseResult);
            if (noise_question_2) noise_question_2.addEventListener('change', updateNoiseResult);

            // Trigger once on load
            updateNoiseResult();
        });
</script> --}}
{{-- @endpush --}}
