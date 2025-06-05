<script>

    function ventilationUpdateScore() {
        const totalQuestions = 1;
        let ventilation_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`ventilation_question_${i}`);
            if (question && question.value === '2') {
                ventilation_count++;
            }
        }

        // Update score field
        const ventilation_score = document.getElementById('ventilation_score');
        if (ventilation_score) {
            ventilation_score.value = ventilation_count;
        }
    }

    function ventilationEventListeners() {
        const totalQuestions = 1;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`ventilation_question_${i}`);
            if (question) {
                question.addEventListener('change', ventilationUpdateScore);
            }
        }
    }

    function ventilationInitialize() {
        // Add event listeners
        ventilationEventListeners();

        // Initialize state
        setTimeout(() => {
            ventilationUpdateScore();
        }, 100);
    }
</script>
