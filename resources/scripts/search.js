
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

    if (toggle) {
        toggle.addEventListener('focus', () => {
            // 
        });
    }

}

export default {ToggleSearch: toggleSearch, Search: search};
