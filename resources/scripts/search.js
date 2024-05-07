const Search = () => {

    console.log('initiating search');
    // header search for influencers
    let headerSearch = document.getElementById("headerSearch");

    let mainSearch = document.getElementById("searchBarField");

    let mobileSearch = document.getElementById("searchBarFieldMobile");


    headerSearch.addEventListener("change", function ( event ) {
        let searchValue = event.target.value;
        
        fetch(window.wp63.ajaxurl, {
            method: 'POST',
            body: JSON.stringify({'action': 'search', 'search': searchValue, 'isHeaderSearch': true}),
        }).then( response => response.text() )
        .then( response => {
            document.getElementById("searchInfluencerResultContainer").innerHTML = response;
        })
    });

    mainSearch.addEventListener("change", function ( event ) {
        let searchValue = event.target.value;
        
        fetch(window.wp63.ajaxurl, {
            method: 'POST',
            body: JSON.stringify({'action': 'search', 'search': searchValue, 'isHeaderSearch': false}),
        }).then( response => response.text() )
        .then( response => {
            document.getElementById("searchBarResult").innerHTML = response;
        })
    });

    mobileSearch.addEventListener("change", function ( event ) {
        let searchValue = event.target.value;
        
        fetch(window.wp63.ajaxurl, {
            method: 'POST',
            body: JSON.stringify({'action': 'search', 'search': searchValue, 'isHeaderSearch': false}),
        }).then( response => response.text() )
        .then( response => {
            document.getElementById("searchBarResult").innerHTML = response;
        })
    });

}

export default Search;