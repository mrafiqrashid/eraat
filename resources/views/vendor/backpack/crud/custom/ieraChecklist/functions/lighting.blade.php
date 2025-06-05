<script>
    function lightingUpdateScore() {
        const totalQuestions = 1;
        let lighting_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`lighting_question_${i}`);
            if (question && question.value === '2') {
                lighting_count++;
            }
        }

        // Update score field
        const lighting_score = document.getElementById('lighting_score');
        if (lighting_score) {
            lighting_score.value = lighting_count;
        }
    }

    function lightingEventListeners() {
        const totalQuestions = 1;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`lighting_question_${i}`);
            if (question) {
                question.addEventListener('change', lightingUpdateScore);
            }
        }
    }

    function lightingInitialize() {
        // Add event listeners
        lightingEventListeners();

        // Initialize state
        setTimeout(() => {
            lightingUpdateScore();
        }, 100);
    }
</script>
