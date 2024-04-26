
const search = (inputSelector) => {
    const search = document.querySelectorAll(inputSelector);
    const resultContainers = document.querySelectorAll('.search-bar-result');
    // const searchForm = document.querySelector('.search-form');
    // const searchButton = document.querySelector('.search-button');
    
    // searchButton.addEventListener('click', () => {
    //     searchForm.submit();
    // });

    // input.addEventListener('focus', (evt) => {
    //     console.log('onfocus');
    //     // document.body.appendChild(searchBlank);
    // });
    const searchBlank = document.createElement('div');
    searchBlank.classList.add('tw-fixed');
    searchBlank.classList.add('tw-top-0');
    searchBlank.classList.add('tw-w-full');
    searchBlank.classList.add('tw-h-full');
    searchBlank.style.backgroundColor = '#000';
    searchBlank.style.opacity = '0.6';

    const showResult = () => {
        resultContainers.forEach((result) => {
            result.classList.remove('tw-hidden');
            result.classList.add('tw-block');
        });
    };

    const hideResult = () => {
        resultContainers.forEach((result) => {
            result.classList.add('tw-hidden');
            result.classList.remove('tw-block');
        });
    };

    search.forEach((input) => {
        input.addEventListener('focus', () => {
            document.body.appendChild(searchBlank);
            showResult();
        })
    });

    searchBlank.addEventListener('click', () => {
        searchBlank.remove();
        hideResult();
    });


};

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

export default {ToggleSearch: toggleSearch, Search: search};
