<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hash = window.location.hash.substring(1); // Current tab
        const tabOrder = [
            'awkward-posture',
            'static-sustained-work-posture',
            'forceful-exertion',
            'repetitive-motion',
            'vibration',
            'lighting',
            'temperature',
            'ventilation',
            'noise',
            'description'
        ];

        // 1. Auto-open the current tab on load
        const tabTrigger = document.querySelector(`[data-bs-target="#tab_${hash}"]`);
        if (tabTrigger) tabTrigger.click();

        // 2. Ensure a hidden input for tab exists
        const form = document.querySelector('form');
        if (form && hash) {
            let tabInput = document.querySelector('input[name="tab"]');
            if (!tabInput) {
                tabInput = document.createElement('input');
                tabInput.type = 'hidden';
                tabInput.name = 'tab';
                form.appendChild(tabInput);
            }
            tabInput.value = hash;
        }

        // 3. Modify "Next" button text to "Save" on last tab
        const interval = setInterval(() => {
            const nextSpan = document.querySelector('span[data-value="save_and_edit_redirect"]');
            if (nextSpan) {
                const nextButton = nextSpan.closest('button');
                if (nextButton) {
                    const isLastTab = hash === 'description';
                    nextButton.innerHTML = `
                        <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                        <span data-value="save_and_edit_redirect">${isLastTab ? 'Save' : 'Next'}</span>
                    `;
                }
                clearInterval(interval);
            }
        }, 100);
    });
</script>
