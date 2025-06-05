<script>
    function apUpdateScore() {
        const totalQuestions = 13;
        let ap_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`ap_question_${i}`);
            if (question && question.value === '2') {
                ap_count++;
            }
        }

        // Update score field
        const ap_score = document.getElementById('ap_score');
        if (ap_score) {
            ap_score.value = ap_count;
        }
    }

    function apEventListeners() {
        const totalQuestions = 13;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`ap_question_${i}`);
            if (question) {
                question.addEventListener('change', apUpdateScore);
            }
        }
    }

    function apInitialize() {
        // Add event listeners
        apEventListeners();

        // Initialize state
        setTimeout(() => {
            apUpdateScore();
        }, 100);
    }
</script>
