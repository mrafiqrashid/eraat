<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabLinks = document.querySelectorAll('.nav-tabs a[data-bs-toggle="tab"]');

        tabLinks.forEach(link => {
            link.addEventListener('click', event => {
                event.preventDefault(); // Prevent tab switch
                event.stopPropagation(); // Stop event bubbling
            });

            // Optional: visually disable the link (e.g. gray out)
            link.classList.add('disabled');
            link.style.pointerEvents = 'none';
            link.style.opacity = '0.6';
        });
    });
</script>