const themeToggle = document.querySelector('#theme-toggle');

function applyTheme(theme) {
    document.documentElement.classList.toggle('dark', theme === 'dark');

    if (themeToggle) {
        themeToggle.textContent =
            theme === 'dark' ? 'Modo claro' : 'Modo oscuro';

        themeToggle.setAttribute(
            'aria-pressed',
            String(theme === 'dark')
        );
    }
}

let savedTheme = 'light';

try {
    savedTheme = localStorage.getItem('wye-theme') || 'light';
} catch (error) {
    // Si el navegador bloquea localStorage, se utiliza el modo claro.
}

applyTheme(savedTheme);

if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const newTheme = document.documentElement.classList.contains('dark')
            ? 'light'
            : 'dark';

        applyTheme(newTheme);

        try {
            localStorage.setItem('wye-theme', newTheme);
        } catch (error) {
            // El cambio funciona durante la sesión actual.
        }
    });
}

document.querySelectorAll('[data-carousel-next]').forEach((button) => {
    button.addEventListener('click', () => {
        const categoryId = button.dataset.carouselNext;

        const carousel = document.getElementById(
            `carousel-category-${categoryId}`
        );

        if (carousel) {
            carousel.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        }
    });
});

document.querySelectorAll('[data-carousel-prev]').forEach((button) => {
    button.addEventListener('click', () => {
        const categoryId = button.dataset.carouselPrev;

        const carousel = document.getElementById(
            `carousel-category-${categoryId}`
        );

        if (carousel) {
            carousel.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        }
    });
});