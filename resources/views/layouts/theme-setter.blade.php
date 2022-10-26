<script>
    if ('theme' in localStorage) {
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else if (localStorage.theme === 'light') {
            document.documentElement.classList.add('light');
        } else {
            let theme = 'light';

            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                theme = 'dark';
            }

            document.documentElement.classList.add(theme);
        }
    } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.add('light');
    }
</script>
