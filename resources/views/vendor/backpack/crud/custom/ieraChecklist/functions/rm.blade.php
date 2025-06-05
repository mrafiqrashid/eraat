<script>
    function rmUpdateScore() {
        const totalQuestions = 5;
        let rm_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`rm_question_${i}`);
            if (question && question.value === '2') {
                rm_count++;
            }
        }

        // Update score field
        const rm_score = document.getElementById('rm_score');
        if (rm_score) {
            rm_score.value = rm_count;
        }
    }

    function rmEventListeners() {
        const totalQuestions = 5;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`rm_question_${i}`);
            if (question) {
                question.addEventListener('change', rmUpdateScore);
            }
        }
    }

    function rmInitialize() {
        // Add event listeners
        rmEventListeners();

        // Initialize state
        setTimeout(() => {
            rmUpdateScore();
        }, 100);
    }
</script>
