const navLinks = document.querySelectorAll('header nav a')
const logoLinks = document.querySelector('.logo');
const sections = document.querySelectorAll('section');
const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('header nav');

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
});

const activePage = () => {
    const header = document.querySelector('header');
    const barsBox = document.querySelector('.bars-box');

    header.classList.remove('active');
    setTimeout(() => {
        header.classList.add('active');
    }, 1100);

    navLinks.forEach(link => {
        link.classList.remove('active');
    });

    barsBox.classList.remove('active');
    setTimeout(() => {
        barsBox.classList.add('active');
    }, 1100);

    sections.forEach(section => {
        section.classList.remove('active');
    });

    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');
}

navLinks.forEach((link, idx) => {
    link.addEventListener('click', () => {
        if (!link.classList.contains('active')) {
             activePage();

             link.classList.add('active');

             setTimeout(() => {
                sections[idx].classList.add('active');
             }, 1100);
        }
    });
});

logoLinks.addEventListener('click', () => {
    if (!navLinks[0].classList.contains('active')) {
        activePage();

        navLinks[0].classList.add('active');

        setTimeout(() => {
            sections[0].classList.add('active');
        }, 1100);
    }
});

const resumeBtns = document.querySelectorAll('.resume-btn')

resumeBtns.forEach((btn, idx) => {
    btn.addEventListener('click', () => {
        const resumeDetails = document.querySelectorAll('.resume-detail');

        resumeBtns.forEach(btn => {
            btn.classList.remove('active');
        });
        btn.classList.add('active');

        resumeDetails.forEach(detail => {
            detail.classList.remove('active');
        });
        resumeDetails[idx].classList.add('active');
    });
});

const arrowRight = document.querySelector('.portofolio-box .navigation .arrow-right');
const arrowLeft = document.querySelector('.portofolio-box .navigation .arrow-left');

let index = 0

const activePortofolio = () => {
    const imgSlide = document.querySelector('.portofolio-carousel .img-slide');
    const portofolioDetails = document.querySelectorAll('.portofolio-detail')

    imgSlide.style.transform = `translateX(calc(${index * -100}% - ${index * 2}rem))`;

    portofolioDetails.forEach(detail => {
        detail.classList.remove('active');
    });
    portofolioDetails[index].classList.add('active');
}

arrowRight.addEventListener('click', () => {
    if (index < 5) {
        index++;
    }

    if (index === 5) {
        arrowRight.classList.add('disabled');
    }

    arrowLeft.classList.remove('disabled');

    activePortofolio();
});

arrowLeft.addEventListener('click', () => {
    if (index > 0) {
        index--;
    }

    if (index === 0) {
        arrowLeft.classList.add('disabled');
    }

    arrowRight.classList.remove('disabled');

    activePortofolio();
});

const adminBtn = document.querySelector('#admin-btn');
const adminModal = document.querySelector('#admin-modal');
const closeModal = document.querySelector('#close-modal');
const cancelBtn = document.querySelector('#cancel-btn');

adminBtn.addEventListener('click', () => {
    adminModal.classList.add('active');
});

closeModal.addEventListener('click', () => {
    adminModal.classList.remove('active');
});

cancelBtn.addEventListener('click', () => {
    adminModal.classList.remove('active');
});