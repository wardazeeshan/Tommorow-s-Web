// API Module
const APIController = (function() {
    // Spotify API credentials
    const clientId = '5ce414b97c5a41d3aab319d8dc8ea3e8';
    const clientSecret = 'd46f69e66d53484d97f025a340c509f5';

    // private method to fetch access token
    const _getToken = async () => {
        // Request access token from Spotify API
        const result = await fetch('https://accounts.spotify.com/api/token', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded', 
                'Authorization' : 'Basic ' + btoa( clientId + ':' + clientSecret)
            },
            body: 'grant_type=client_credentials'
        });
        // Parse response and return access token
        const data = await result.json();
        return data.access_token;
    }

    // private method to fetch available genres
    const _getGenres = async (token) => {
        // Fetch available genres from Spotify API
        const result = await fetch(`https://api.spotify.com/v1/browse/categories?locale=sv_US`, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });
        // Parse response and return genre items
        const data = await result.json();
        return data.categories.items;
    }

    // private method to fetch playlists by genre
    const _getPlaylistByGenre = async (token, genreId) => {
        const limit = 10; // Limit the number of playlists to fetch
        // Fetch playlists by genre from Spotify API
        const result = await fetch(`https://api.spotify.com/v1/browse/categories/${genreId}/playlists?limit=${limit}`, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });
        // Parse response and return playlist items
        const data = await result.json();
        return data.playlists.items;
    }

    // private method to fetch tracks
    const _getTracks = async (token, tracksEndPoint) => {
        const limit = 10; // Limit the number of tracks to fetch
        // Fetch tracks from Spotify API
        const result = await fetch(`${tracksEndPoint}?limit=${limit}`, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });
        // Parse response and return track items
        const data = await result.json();
        return data.items;
    }

    // private method to fetch a single track
    const _getTrack = async (token, trackEndPoint) => {
        // Fetch track details from Spotify API
        const result = await fetch(`${trackEndPoint}`, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });
        // Parse response and return track details
        const data = await result.json();
        return data;
    }

    // Public methods
    return {
        getToken() {
            return _getToken();
        },
        getGenres(token) {
            return _getGenres(token);
        },
        getPlaylistByGenre(token, genreId) {
            return _getPlaylistByGenre(token, genreId);
        },
        getTracks(token, tracksEndPoint) {
            return _getTracks(token, tracksEndPoint);
        },
        getTrack(token, trackEndPoint) {
            return _getTrack(token, trackEndPoint);
        }
    }
})();


// UI Module
const UIController = (function() {
    // Object to hold references to HTML selectors
    const DOMElements = {
        selectGenre: '#select_genre',
        selectPlaylist: '#select_playlist',
        buttonSubmit: '#btn_submit',
        divSongDetail: '#song-detail',
        hfToken: '#hidden_token',
        divSonglist: '.song-list'
    }

    // Public methods
    return {
        // Method to get input fields
        inputField() {
            return {
                genre: document.querySelector(DOMElements.selectGenre),
                playlist: document.querySelector(DOMElements.selectPlaylist),
                tracks: document.querySelector(DOMElements.divSonglist),
                submit: document.querySelector(DOMElements.buttonSubmit),
                songDetail: document.querySelector(DOMElements.divSongDetail)
            }
        },
        // Method to create select list option for genre
        createGenre(text, value) {
            const html = `<option value="${value}">${text}</option>`;
            document.querySelector(DOMElements.selectGenre).insertAdjacentHTML('beforeend', html);
        }, 
        // Method to create select list option for playlist
        createPlaylist(text, value) {
            const html = `<option value="${value}">${text}</option>`;
            document.querySelector(DOMElements.selectPlaylist).insertAdjacentHTML('beforeend', html);
        },
        // Method to create a track list group item 
        createTrack(id, name) {
            const html = `<a href="#" class="list-group-item list-group-item-action list-group-item-light" id="${id}">${name}</a>`;
            document.querySelector(DOMElements.divSonglist).insertAdjacentHTML('beforeend', html);
        },
        // Method to create the song detail
        createTrackDetail(img, title, artist) {
            const detailDiv = document.querySelector(DOMElements.divSongDetail);
            // Clear out the song detail div
            detailDiv.innerHTML = '';
            const html = 
            `
            <div class="row col-sm-12 px-0">
                <img src="${img}" alt="">        
            </div>
            <div class="row col-sm-12 px-0">
                <label for="Genre" class="form-label col-sm-12">${title}:</label>
            </div>
            <div class="row col-sm-12 px-0">
                <label for="artist" class="form-label col-sm-12">By ${artist}:</label>
            </div> 
            `;
            detailDiv.insertAdjacentHTML('beforeend', html)
        },
        // Method to reset song detail
        resetTrackDetail() {
            this.inputField().songDetail.innerHTML = '';
        },
        // Method to reset tracks
        resetTracks() {
            this.inputField().tracks.innerHTML = '';
            this.resetTrackDetail();
        },
        // Method to reset playlist
        resetPlaylist() {
            this.inputField().playlist.innerHTML = '';
            this.resetTracks();
        },
        // Method to store access token
        storeToken(value) {
            document.querySelector(DOMElements.hfToken).value = value;
        },
        // Method to retrieve stored access token
        getStoredToken() {
            return {
                token: document.querySelector(DOMElements.hfToken).value
            }
        }
    }
})();

// App Controller
const APPController = (function(UICtrl, APICtrl) {
    // Get input field object ref
    const DOMInputs = UICtrl.inputField();

    // Method to load genres on page load
    const loadGenres = async () => {
        // Get the token
        const token = await APICtrl.getToken();           
        // Store the token onto the page
        UICtrl.storeToken(token);
        // Get the genres
        const genres = await APICtrl.getGenres(token);
        // Populate genres select element
        genres.forEach(element => UICtrl.createGenre(element.name, element.id));
    }

    // Create genre change event listener
    DOMInputs.genre.addEventListener('change', async () => {
        // Reset the playlist
        UICtrl.resetPlaylist();
        // Get the token that's stored on the page
        const token = UICtrl.getStoredToken().token;        
        // Get the genre select field
        const genreSelect = UICtrl.inputField().genre;       
        // Get the genre id associated with the selected genre
        const genreId = genreSelect.options[genreSelect.selectedIndex].value;             
        // Get the playlist based on a genre
        const playlist = await APICtrl.getPlaylistByGenre(token, genreId);       
        // Create a playlist list item for every playlist returned
        playlist.forEach(p => UICtrl.createPlaylist(p.name, p.tracks.href));
    });

    // Create submit button click event listener
    DOMInputs.submit.addEventListener('click', async (e) => {
        // Prevent page reset
        e.preventDefault();
        // Clear tracks
        UICtrl.resetTracks();
        // Get the token
        const token = UICtrl.getStoredToken().token;        
        // Get the playlist field
        const playlistSelect = UICtrl.inputField().playlist;
        // Get track endpoint based on the selected playlist
        const tracksEndPoint = playlistSelect.options[playlistSelect.selectedIndex].value;
        // Get the list of tracks
        const tracks = await APICtrl.getTracks(token, tracksEndPoint);
        // Create a track list item
        tracks.forEach(el => UICtrl.createTrack(el.track.href, el.track.name))
        
    });

    // Create song selection click event listener
    DOMInputs.tracks.addEventListener('click', async (e) => {
        // Prevent page reset
        e.preventDefault();
        UICtrl.resetTrackDetail();
        // Get the token
        const token = UICtrl.getStoredToken().token;
        // Get the track endpoint
        const trackEndpoint = e.target.id;
        // Get the track object
        const track = await APICtrl.getTrack(token, trackEndpoint);
        // Load the track details
        UICtrl.createTrackDetail(track.album.images[2].url, track.name, track.artists[0].name);
    });    

    return {
        init() {
            console.log('App is starting');
            loadGenres();
        }
    }

})(UIController, APIController);

// Call a method to load the genres on page load
APPController.init();
