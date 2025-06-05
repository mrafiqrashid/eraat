<script>
    function snswpUpdateScore() {
        const totalQuestions = 3;
        let snswp_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`snswp_question_${i}`);
            if (question && question.value === '2') {
                snswp_count++;
            }
        }

        // Update score field
        const snswp_score = document.getElementById('snswp_score');
        if (snswp_score) {
            snswp_score.value = snswp_count;
        }
    }

    function snswpEventListeners() {
        const totalQuestions = 3;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`snswp_question_${i}`);
            if (question) {
                question.addEventListener('change', snswpUpdateScore);
            }
        }
    }

    function snswpInitialize() {
        // Add event listeners
        snswpEventListeners();

        // Initialize state
        setTimeout(() => {
            snswpUpdateScore();
        }, 100);
    }
</script>
