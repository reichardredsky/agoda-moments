const toggleSearch = (toggleSelector) => {
    const toggle = document.querySelector(toggleSelector);
    const toggleMenu = document.querySelector('.toggle-serarch-hide');
    const closeBtn = document.querySelector('.toggle-close-btn');
    const searchResult = document.querySelector('.toggle-search-result');
    const closeSearch = () => {
        toggleMenu.parentElement.classList.add('lg:tw-block');
        toggleMenu.parentElement.nextElementSibling.classList.remove('tw-mr-auto');
        toggleMenu.parentElement.nextElementSibling.classList.remove('tw-w-[80%]');
        closeBtn.classList.add('tw-hidden');
        searchResult.classList.add('tw-hidden');
    };

    console.log(toggle);

    if (toggle) {
        toggle.addEventListener('focus', () => {
            console.log(toggleMenu);
            toggleMenu.parentElement.classList.remove('lg:tw-block');
            toggleMenu.parentElement.nextElementSibling.classList.add('tw-w-[80%]');
            toggleMenu.parentElement.nextElementSibling.classList.add('tw-mr-auto');
            // toggle.parentElement.nextElementSibling.classList.remove('tw-ml-auto');
            searchResult.classList.remove('tw-hidden');
            
            closeBtn.classList.remove('tw-hidden');
            closeBtn.addEventListener('click', closeSearch);
        });

        toggle.addEventListener('blur', closeSearch);
    }

}

export default toggleSearch;