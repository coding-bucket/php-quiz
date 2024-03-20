export default function addDarkModeToggle () {
    const storedTheme = localStorage.getItem('theme') ||
        (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    if (storedTheme) {
        document.documentElement.setAttribute('data-theme', storedTheme);
    }

    const toggle = document.getElementById('theme-toggle');
    toggle.onclick = function () {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const targetTheme = currentTheme === 'light' ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', targetTheme);
        localStorage.setItem('theme', targetTheme);
    };
}
