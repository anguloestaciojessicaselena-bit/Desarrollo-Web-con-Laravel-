/**
 * Theme Toggle Logic
 * Handles switching between light and dark modes and persists preference.
 */

document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtns = document.querySelectorAll('.theme-toggle');
    const htmlElement = document.documentElement;

    // Initialize theme based on localStorage or system preference
    const savedTheme = localStorage.getItem('theme');
    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    const initialTheme = savedTheme || 'dark'; // Default to dark as requested

    applyTheme(initialTheme);

    themeToggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-theme') || 'dark';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            applyTheme(newTheme);
            localStorage.setItem('theme', newTheme);
        });
    });

    function applyTheme(theme) {
        htmlElement.setAttribute('data-theme', theme);
        updateToggleIcons(theme);
    }

    function updateToggleIcons(theme) {
        themeToggleBtns.forEach(btn => {
            const icon = btn.querySelector('i');
            if (icon) {
                if (theme === 'dark') {
                    icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                    btn.setAttribute('title', 'Cambiar a modo claro');
                } else {
                    icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                    btn.setAttribute('title', 'Cambiar a modo oscuro');
                }
            }
        });
    }
});
