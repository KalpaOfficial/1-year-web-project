<script>
    const avatar = document.querySelector('.icon');
    const dropdown = document.querySelector('.sub-menu-wrap');

    avatar.addEventListener('click', () => {
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Optional: Close dropdown when clicking outside
    window.addEventListener('click', (e) => {
        if (!avatar.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>