<script>
    function noiseUpdateScore() {
        const totalQuestions = 2;
        let noise_count = 0;

        // Count questions with value '2'
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`noise_question_${i}`);
            if (question && question.value === '2') {
                noise_count++;
            }
        }

        // Update score field
        const noise_score = document.getElementById('noise_score');
        if (noise_score) {
            noise_score.value = noise_count;
        }
    }

    function noiseEventListeners() {
        const totalQuestions = 2;

        // Add change event listeners to all questions
        for (let i = 1; i <= totalQuestions; i++) {
            const question = document.getElementById(`noise_question_${i}`);
            if (question) {
                question.addEventListener('change', noiseUpdateScore);
            }
        }
    }

    function noiseInitialize() {
        // Add event listeners
        noiseEventListeners();

        // Initialize state
        setTimeout(() => {
            noiseUpdateScore();
        }, 100);
    }
</script>
