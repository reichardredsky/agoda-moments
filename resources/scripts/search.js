function search() 
{
    // header search for influencers
    let headerSearch = document.getElementById("headerSearch");

    let mainSearch = document.getElementById("searchBarField");

    let mobileSearch = document.getElementById("searchBarFieldMobile");


    headerSearch.addEventListener("change", function ( event ) {
        let searchValue = event.target.value;
        
        fetch('/wp-admin/admin-ajax.php', {
            method: 'POST',
            body: JSON.stringify({'action': 'search', 'search': searchValue}),
        })
    })
}