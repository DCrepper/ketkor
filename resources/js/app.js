import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'
import '../css/app.css';
import.meta.glob([
    '../img/**',
]);
import TomSelect from "tom-select";
window.TomSelect = TomSelect;


const menuButton = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
// Add a click event listener to the button
menuButton.addEventListener('click', () => {
    // Toggle the 'hidden' class on the mobile menu
    mobileMenu.classList.toggle('hidden');
});


const profileButton = document.getElementById('user-menu-button');
const profileDropdown = document.getElementById('profile-dropdown');
profileButton.addEventListener('click', () => {
    // Toggle the 'hidden' class on the profile dropdown
    profileDropdown.classList.toggle('hidden');

    // Toggle the 'aria-expanded' attribute
    const isProfileExpanded = profileDropdown.classList.contains('hidden') ? 'false' : 'true';
    profileButton.setAttribute('aria-expanded', isProfileExpanded);
});

menuButton.addEventListener("focusout", clickBody);
profileButton.addEventListener("focusout", clickBody);

function clickBody() {
    console.log('trigered');
    const isProfileExpanded = profileDropdown.classList.contains('hidden') ? 'false' : 'true';
    const isProfilemenu = mobileMenu.classList.contains('hidden') ? 'false' : 'true';
    if (isProfileExpanded)
        mobileMenu.classList.add('hidden');
    if (isProfilemenu)
        profileDropdown.classList.add('hidden');
}

// Add a click event listener to the profile button
document.addEventListener('livewire:navigated', () => {
    const menuButton = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    // Add a click event listener to the button
    menuButton.addEventListener('click', () => {
        // Toggle the 'hidden' class on the mobile menu
        mobileMenu.classList.toggle('hidden');
    });


    const profileButton = document.getElementById('user-menu-button');
    const profileDropdown = document.getElementById('profile-dropdown');
    profileButton.addEventListener('click', () => {
        // Toggle the 'hidden' class on the profile dropdown
        profileDropdown.classList.toggle('hidden');

        // Toggle the 'aria-expanded' attribute
        const isProfileExpanded = profileDropdown.classList.contains('hidden') ? 'false' : 'true';
        profileButton.setAttribute('aria-expanded', isProfileExpanded);
    });

    menuButton.addEventListener("focusout", clickBody);
    profileButton.addEventListener("focusout", clickBody);
    function clickBody() {
        console.log('trigered');
        const isProfileExpanded = profileDropdown.classList.contains('hidden') ? 'false' : 'true';
        const isProfilemenu = mobileMenu.classList.contains('hidden') ? 'false' : 'true';
        if (isProfileExpanded)
            mobileMenu.classList.add('hidden');
        if (isProfilemenu)
            profileDropdown.classList.add('hidden');
    }

});
