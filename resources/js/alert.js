window.addEventListener('DOMContentLoaded', () => {
    ['error', 'success'].forEach(type => {
        const box = document.getElementById(`${type}-box`);
        if(box){
            box.classList.remove('opacity-0', '-translate-y-5');
            box.classList.add('opacity-100', 'translate-y-0');

            setTimeout(() => {
                if(type === 'error') closeErrorBox();
                else closeSuccessBox();
            }, 5000);
        }
    });
});

function closeErrorBox() {
    const box = document.getElementById('error-box');
    if(!box) return;

    box.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    box.style.opacity = '0';
    box.style.transform = 'translateX(20px)';

    setTimeout(() => {
        box.remove();
    }, 500);
}

function closeSuccessBox() {
    const box = document.getElementById('success-box');
    if(!box) return;

    box.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    box.style.opacity = '0';
    box.style.transform = 'translateX(20px)';

    setTimeout(() => {
        box.remove();
    }, 500);
}

window.closeErrorBox = closeErrorBox;
window.closeSuccessBox = closeSuccessBox;
