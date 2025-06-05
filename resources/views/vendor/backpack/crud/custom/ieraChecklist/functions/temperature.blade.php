<script>
    function temperatureUpdateScore() {
        const totalQuestions = 1;
        let temperature_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`temperature_question_${i}`);
            if (question && question.value === '2') {
                temperature_count++;
            }
        }

        // Update score field
        const temperature_score = document.getElementById('temperature_score');
        if (temperature_score) {
            temperature_score.value = temperature_count;
        }
    }

    function temperatureEventListeners() {
        const totalQuestions = 1;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`temperature_question_${i}`);
            if (question) {
                question.addEventListener('change', temperatureUpdateScore);
            }
        }
    }

    function temperatureInitialize() {
        // Add event listeners
        temperatureEventListeners();

        // Initialize state
        setTimeout(() => {
            temperatureUpdateScore();
        }, 100);
    }
</script>
