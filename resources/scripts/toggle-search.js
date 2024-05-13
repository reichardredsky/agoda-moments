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
        toggle.style.width = '';
    };
    let timeout = null;

    const debounce = (func, delay) => {
        let timeout;
        return function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                func.apply(this, arguments);
            }, delay);
        };
    };



    if (toggle) {
        toggle.addEventListener('focus', () => {
            toggle.style.width = '100%';
            toggleMenu.parentElement.classList.remove('lg:tw-block');
            toggleMenu.parentElement.nextElementSibling.classList.add('tw-w-[80%]');
            toggleMenu.parentElement.nextElementSibling.classList.add('tw-mr-auto');
            if (toggle.value) {
                searchResult.classList.remove('tw-hidden');
            }
            
            closeBtn.classList.remove('tw-hidden');
            closeBtn.addEventListener('click', closeSearch);
        });

        toggle.addEventListener('input', debounce(() => {
            if (toggle.value) {
                searchResult.classList.remove('tw-hidden');
            } else {
                searchResult.classList.add('tw-hidden');
            }
        }, 500));

        // toggle.addEventListener('blur', closeSearch);
    }

}

export default toggleSearch;