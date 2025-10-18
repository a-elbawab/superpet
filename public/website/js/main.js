function openNav() {
    var opennav = document.getElementById("mySidenav");
    if (opennav) {
        opennav.classList.toggle("active");
    }
    document.body.classList.toggle("stop");
    var element = document.getElementById("sidebody");
    if (element) {
        element.classList.toggle("active");
    }
}

function toggleDropdown(id, parentClass) {
    var parentElement = document.querySelector(parentClass);
    var allDropdowns = parentElement ? parentElement.querySelectorAll('.dropdown-menu') : [];

    allDropdowns.forEach(function (dropdown) {
        if (dropdown.id !== id) {
            dropdown.classList.remove('show');
        }
    });

    var element = document.getElementById(id);
    if (element) {
        element.classList.toggle('show');
    }

    if (element && element.classList.contains('show')) {
        var subDropdowns = element.querySelectorAll('.dropdown-menu');
        subDropdowns.forEach(function (subDropdown) {
            subDropdown.classList.remove('show');
        });
    }
}





document.addEventListener("keyup", function (event) {
    if (event.key === "Escape") {
        document.body.classList.remove("stop");
        var element = document.getElementById("sidebody");
        if (element) {
            element.classList.remove("active");
        }
        var opencart = document.getElementById("mySidenav");
        if (opencart) {
            opencart.classList.remove("active");
        }
    }
});

var countDownDate = new Date("August 6, 2024 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function () {
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the elements with id
    var daysElement = document.getElementById("days");
    var hoursElement = document.getElementById("hours");
    var minutesElement = document.getElementById("minutes");
    var secondsElement = document.getElementById("seconds");

    if (daysElement && hoursElement && minutesElement && secondsElement) {
        daysElement.innerHTML = days;
        hoursElement.innerHTML = hours;
        minutesElement.innerHTML = minutes;
        secondsElement.innerHTML = seconds;
    }

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        if (daysElement) daysElement.innerHTML = "0";
        if (hoursElement) hoursElement.innerHTML = "0";
        if (minutesElement) minutesElement.innerHTML = "0";
        if (secondsElement) secondsElement.innerHTML = "0";
    }
}, 1000);

function openDetails() {
    window.location.href = '/shop-details.html';
}

new WOW().init();

document?.addEventListener('DOMContentLoaded', function () {
    const lowerRange = document.getElementById('lower');
    const upperRange = document.getElementById('upper');
    const one = document.getElementById('one');
    const two = document.getElementById('two');

    // Set initial values if elements exist
    if (lowerRange && upperRange && one && two) {
        one.value = lowerRange.value;
        two.value = upperRange.value;

        // Update text fields when range inputs change
        lowerRange.addEventListener('input', function () {
            one.value = lowerRange.value;
        });

        upperRange.addEventListener('input', function () {
            two.value = upperRange.value;
        });
    }
});


let scrollBtn = document.getElementById('scrollTopBtn')

if (scrollBtn) {
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollBtn.style.display = "flex";
        } else {
            scrollBtn.style.display = "none";
        }
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function incrementValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('quantity').value = value;
}

function decrementValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('quantity').value = value;
}

$(document).ready(function () {
    // تحقق مما إذا كانت مكتبة Slick موجودة
    if (typeof $.fn.slick === 'function') {
        // تحقق من وجود العناصر وتطبيق Slick إذا كانت موجودة
        if ($('.product-carousel').length > 0) {
            $('.product-carousel').slick({
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 4,
                dots: true,
                arrows: true,
                nextArrow: '',
                prevArrow: '',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        }

        if ($('.client-slider').length > 0) {
            $('.client-slider').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                nextArrow: '',
                prevArrow: '',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
    }
});






// Function to increment quantity
// Function to increment value
function incrementValue(inputId) {
    var input = document.getElementById(inputId);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    input.value = value;
}

// Function to decrement value
function decrementValue(inputId) {
    var input = document.getElementById(inputId);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;
    if (value > 1) {
        value--;
        input.value = value;
    }
}


document.addEventListener('DOMContentLoaded', function () {
    var images = [];
    var currentIndex = 0;

    var imageModal = document.getElementById('imageModal');
    imageModal?.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var src = button.getAttribute('data-src');
        images = Array.from(document.querySelectorAll('.gallery-img')).map(el => el.getAttribute('data-src'));
        currentIndex = images.indexOf(src);
        var modalImage = imageModal.querySelector('.modal-body img');
        modalImage.src = src;
    });

    document.getElementById('prevBtn')?.addEventListener('click', function () {
        if (images.length > 0) {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            document.getElementById('modalImage').src = images[currentIndex];
        }
    });

    document.getElementById('nextBtn')?.addEventListener('click', function () {
        if (images.length > 0) {
            currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
            document.getElementById('modalImage').src = images[currentIndex];
        }
    });
});

// Add swipe support
document?.addEventListener('DOMContentLoaded', function () {
    var modalBody = document.querySelector('.modal-body');
    if (modalBody) {
        var hammertime = new Hammer(modalBody) || any

        hammertime.on('swipeleft', function () {
            document.getElementById('nextBtn').click();
        });

        hammertime.on('swiperight', function () {
            document.getElementById('prevBtn').click();
        });
    }
});

document?.addEventListener('DOMContentLoaded', function () {
    const imageContainer = document.querySelector('.pd-main-img');
    const lens = document.querySelector('.lens');
    const result = document.querySelector('.zoom-result');

    // Function to update the zoom effect
    function updateZoom(e) {
        const image = document.querySelector('.tab-pane.active .zoom-image');
        if (!image || window.innerWidth < 768) return;

        // Get dimensions of elements
        const containerRect = imageContainer.getBoundingClientRect();
        const imageRect = image.getBoundingClientRect();
        const lensRect = lens.getBoundingClientRect();
        const resultRect = result.getBoundingClientRect();

        // Get mouse position relative to container
        const { x, y } = getMousePos(e, containerRect, lensRect);

        // Position the lens
        lens.style.left = `${x}px`;
        lens.style.top = `${y}px`;
        lens.style.display = 'block';
        result.style.display = 'block';

        // Calculate zoom factors
        const zoomFactor = 0.5;
        const fx = (resultRect.width / lensRect.width) * zoomFactor;
        const fy = (resultRect.height / lensRect.height) * zoomFactor;

        // Set background image and size for the result
        result.style.backgroundImage = `url(${image.src})`;
        result.style.backgroundSize = `${imageRect.width * fx}px ${imageRect.height * fy}px`;
        result.style.backgroundPosition = `-${x * fx}px -${y * fy}px`;
    }

    // Function to get mouse position relative to the container
    function getMousePos(e, containerRect, lensRect) {
        let x = e.clientX - containerRect.left - lensRect.width / 0.8;
        let y = e.clientY - containerRect.top - lensRect.height / 3.5;

        // Constrain the lens position within the container
        x = Math.max(0, Math.min(containerRect.width - lensRect.width, x));
        y = Math.max(0, Math.min(containerRect.height - lensRect.height, y));

        return { x, y };
    }

    imageContainer?.addEventListener("mousemove", updateZoom);
    imageContainer?.addEventListener("mouseleave", function () {
        lens.style.display = 'none';
        result.style.display = 'none';
    });

    document?.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function () {
            document.querySelectorAll('.zoom-image').forEach(img => img.classList.remove('show'));
            const activeImg = document.querySelector(`${this.getAttribute('data-bs-target')} .zoom-image`);
            if (activeImg) activeImg.classList.add('show');
        });
    });
});
