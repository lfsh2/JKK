function toggle() {
    const dropdown = document.getElementById('responsive-dropdown');
    dropdown.classList.toggle('active');
}

function toggleService() {
    const dropdown = document.getElementById('service-dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

function toggleLoginModal() {
	const modal = document.getElementById('login-modal');
	modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
}

function toggleLoginModal() {
	const modal = document.getElementById('login-modal');
	modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
}

window.onclick = function(event) {
	const modal = document.getElementById('login-modal');
	if (event.target === modal) {
		modal.style.display = 'none';
	}
};

const submenuToggles = document.querySelectorAll('.submenu-toggle');

submenuToggles.forEach(toggle => {
    toggle.addEventListener('click', function() {
        const submenus = document.querySelectorAll('.submenu');

        submenus.forEach(submenu => {
            if (submenu.id !== toggle.dataset.submenu) {
                submenu.classList.remove('active');
            }
        });

        const submenu = document.getElementById(toggle.dataset.submenu);
        submenu.classList.toggle('active');
    });
});

window.addEventListener('click', function(event) {
    if (!event.target.matches('.dropbtn') && !event.target.closest('.dropdown-content')) {
        const submenus = document.querySelectorAll('.submenu');
        submenus.forEach(submenu => {
            submenu.classList.remove('active');
        });
    }
});


// responsive services in navbar
function toggleResponsiveDropdown() {
    window.location.href = 'PAGES/SERVICES/services.php';
}
function toggleResponsiveDropdowns() {
    window.location.href = '../PAGES/SERVICES/services.php';
}
function link() {
    window.location.href = '../PAGES/SERVICES/services.php';
}

function toggleResponsiveSubmenu(subMenuId) {
    const submenu = document.getElementById(subMenuId);
    submenu.classList.toggle('active');
}

document.addEventListener('click', function(e) {
    const dropdown = document.getElementById('responsiveDropdown');
    if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('active');
    }

    const submenus = document.querySelectorAll('.dropdown-subMenu');
    submenus.forEach(subMenu => {
        if (!subMenu.contains(e.target)) {
            subMenu.classList.remove('active');
        }
    });
});


// chatbot 
function toggleChatbot() {
    const chatBot = document.getElementById('chat-bot');
    chatBot.classList.toggle('active');
}


// carousel on home page
document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelector(".slides").children;
    const totalSlides = slides.length;
    let index = 0;

    function nextSlide() {
      if (index === totalSlides - 1) {
        index = 0;
      } else {
        index++;
      }
      updateSlide();
    }

    function updateSlide() {
      const slideWidth = slides[index].clientWidth;
      document.querySelector(".slides").style.transform = `translateX(-${index * slideWidth}px)`;
    }

    setInterval(nextSlide, 3000);
});


// testimonials on home page 
document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector(".reviews");
    const slides = document.querySelector(".card-block");
    const slideWidth = 600;
    const totalSlides = 4;

    let currentSlideIndex = 0;

    function showSlide(index) {
        if (index < 0 || index >= totalSlides) return;

        currentSlideIndex = index;
        carousel.style.transform = `translateX(-${currentSlideIndex * slideWidth}px)`;

        updateDots();
    }

    function moveSlide(direction) {
        currentSlideIndex += direction;
        if (currentSlideIndex < 0) {
            currentSlideIndex = totalSlides - 1;
        } else if (currentSlideIndex >= totalSlides) {
            currentSlideIndex = 0;
        }
        carousel.style.transform = `translateX(-${currentSlideIndex * slideWidth}px)`;

        updateDots();
    }

    function updateDots() {
        const dots = document.querySelectorAll(".dot");
        dots.forEach((dot, index) => {
            if (index === currentSlideIndex) {
                dot.classList.add("active");
            } else {
                dot.classList.remove("active");
            }
        });
    }

    function currentSlide(index) {
        showSlide(index - 1);
    }

    document.querySelector(".prev").addEventListener("click", () => moveSlide(-1));
    document.querySelector(".next").addEventListener("click", () => moveSlide(1));
});


// projects
function filterItems(category) {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        if (card.classList.contains(category)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
function showAll() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.style.display = 'block';
    });
    
    const consul = document.querySelector('.consultancy');
    if (consul.style.display === 'block') {
        consul.style.display = '';
    }
}


// appointment page
const selectField = document.getElementById('paymentField');
const selectText = document.getElementById('paymentText');
const lists = document.getElementById('list');
const options = document.getElementsByClassName('options');

selectField.onclick = function() {
    lists.classList.toggle('hide');
}

for(option of options) {
    option.onclick = function() {
        selectText.innerHTML = this.textContent;
        list.classList.toggle('active');
    }
}


// admin panel
function togglePages() {
    const dropdown = document.getElementById('myDropdown');
    dropdown.classList.toggle('show-dropdown');
}
function toggleSettings() {
    const dropdown = document.getElementById('dropdowns');
    dropdown.classList.toggle('show-dropdown');
}
function showContent(id, element) {
    // Hide all content divs
    var contents = document.querySelectorAll('.content-block > div');
    contents.forEach(function(content) {
        content.style.display = 'none';
    });

    // Show the selected content div
    var selectedContent = document.getElementById(id);
    if (selectedContent) {
        selectedContent.style.display = 'block';
    }

    // Remove 'active' class from all sidebar links
    var sidebarLinks = document.querySelectorAll('.sidebar button');
    sidebarLinks.forEach(function(link) {
        link.classList.remove('active');
    });

    // Add 'active' class to the clicked link
    element.classList.add('active');
}


// responsive sidebar
function toggleSidebar() {
    const sideBar = document.getElementById('sidebars');
    sideBar.classList.toggle('show-sidebar');
}
function togglePagess() {
    const dropdown = document.getElementById('myDropdowns');
    dropdown.classList.toggle('show-dropdown');
}
function toggleSettingss() {
    const dropdown = document.getElementById('dropdownss');
    dropdown.classList.toggle('show-dropdown');
}