<script>
    function vibrationUpdateScore() {
        const totalQuestions = 4;
        let vibration_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`vibration_question_${i}`);
            if (question && question.value === '2') {
                vibration_count++;
            }
        }

        // Update score field
        const vibration_score = document.getElementById('vibration_score');
        if (vibration_score) {
            vibration_score.value = vibration_count;
        }
    }

    function vibrationEventListeners() {
        const totalQuestions = 4;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`vibration_question_${i}`);
            if (question) {
                question.addEventListener('change', vibrationUpdateScore);
            }
        }
    }

    function vibrationInitialize() {
        // Add event listeners
        vibrationEventListeners();

        // Initialize state
        setTimeout(() => {
            vibrationUpdateScore();
        }, 100);
    }
</script>
