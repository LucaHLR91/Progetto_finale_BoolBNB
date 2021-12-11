


window.searchBox = function() {
    var options = {
        searchOptions: {
            key: 'yNgX4mXdpmkOXOoS76g8oRrlZcAmGUPm',
            language: 'it-IT',
        },
        autocompleteOptions: {
            key: 'yNgX4mXdpmkOXOoS76g8oRrlZcAmGUPm',
            language: 'it-IT'
        }
    }
    
    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    document.getElementById('search-field').append(searchBoxHTML);

    console.log("ttSearchBox");
    
    document.querySelector('input.tt-search-box-input').name = 'address';
    document.querySelector('input.tt-search-box-input').id = 'search-for-coordinates';
    document.querySelector('input.tt-search-box-input').placeholder = 'Indirizzo';
}