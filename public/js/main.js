document.getElementById('dashboard-section')?.addEventListener('load', function() {
    console.log('Welcome to the Dashboard!');
});

function navigateToSection(sectionId) {
    window.location.hash = sectionId;
}

window.addEventListener('hashchange', function() {
    const sections = document.querySelectorAll('section');
    const currentSection = window.location.hash.replace('#', '');

    sections.forEach(function(section) {
        if (section.id === currentSection) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
});

window.addEventListener('load', function() {
    const defaultSection = window.location.hash ? window.location.hash : '#product-list';
    window.location.hash = defaultSection;
});
