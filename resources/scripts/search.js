const Search = () => {
    const debounce = (func, delay) => {
        let debounceTimer
        return function () {
            const context = this
            const args = arguments
            clearTimeout(debounceTimer)
            debounceTimer
                = setTimeout(() => func.apply(context, args), delay)
        }
    }

    // header search for influencers
    let headerSearch = document.getElementById("headerSearch");

    let mainSearches = document.querySelectorAll('.search-input');

    let mobileSearch = document.getElementById("searchBarFieldMobile");

    const searchBlank = document.createElement('div');
    searchBlank.classList.add('tw-fixed');
    searchBlank.classList.add('tw-top-0');
    searchBlank.classList.add('tw-w-full');
    searchBlank.classList.add('tw-h-full');
    searchBlank.style.backgroundColor = '#000';
    searchBlank.style.opacity = '0.6';

    const searchFetcher = (searchValue, element) => {
        jQuery.ajax({
            url: window.wp63.ajaxurl,
            type: 'POST',
            data: {
                action: 'search',
                search: searchValue,
                isHeaderSearch: false
            },
            success: function( response ) {
                if ( response !== '' ) {
                    element.querySelector("#searchBarResult").innerHTML = response;
                } else {
                    element.querySelector("#searchBarResult").innerHTML = '<p>No results found</p>';
                };
            },
            error: function( response ) {
                console.error('error', response);
            }
        });
    }

    searchBlank.addEventListener('click', () => {
        mainSearches.forEach((mainSearch) => {
            mainSearch.querySelector('.search-result-wrapper').classList.add('tw-hidden');
        });
        document.body.removeChild(searchBlank);
    });

    if ( headerSearch !== null) {

        headerSearch.addEventListener("input", debounce(function ( event ) {
            let searchValue = event.target.value;
            
            jQuery.ajax({
                url: window.wp63.ajaxurl,
                type: 'POST',
                data: {
                    action: 'search',
                    search: searchValue,
                    isHeaderSearch: true
                },
                success: function( response ) {
                    if ( response !== '' ) {
                        
                        document.getElementById("searchInfluencerResultContainer").innerHTML = response;
                    } else {
                        document.getElementById("searchInfluencerResultContainer").innerHTML = '<p>No results found</p>';
                    }
                    
                },
                error: function( response ) {
                    console.error('error', response);
                }
            });

        }), 500);

    }

    mainSearches.forEach((mainSearch) => {

        mainSearch.querySelector('#searchBarField').addEventListener("focus", () => {
            document.body.appendChild(searchBlank);
        });
    
            mainSearch.querySelector('#searchBarField').addEventListener("input", debounce(function ( event ) {
                console.log('mainSearch Fired')
                let searchValue = event.target.value;

                if ( searchValue) {
                    mainSearch.querySelector('.search-result-wrapper').classList.remove('tw-hidden');
                } else {
                    mainSearch.querySelector('.search-result-wrapper').classList.add('tw-hidden');
                }

                mainSearch.querySelector("#searchBarResult").innerHTML = '<p>Searching Result...</p>';
                
                searchFetcher(searchValue, mainSearch);

            }), 500);
    
    });

    mobileSearch.addEventListener("input", debounce(function ( event ) {
        console.log('mobileSearch Fired');
        let searchValue = event.target.value;
        
        jQuery.ajax({
            url: window.wp63.ajaxurl,
            type: 'POST',
            data: {
                action: 'search',
                search: searchValue,
                isHeaderSearch: false
            },
            success: function( response ) {
                if ( response !== '' ) {
                    document.getElementById("searchBarResult").innerHTML = response;
                } else {
                    document.getElementById("searchBarResult").innerHTML = '<p>No results found</p>';
                }
            },
            error: function( response ) {
                console.error('error', response);
            }
        });
    }), 500);
}

export default Search;