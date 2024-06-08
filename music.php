<?php
// Include the file to establish database connection
include 'connect.php';
// Include navigation bar
include 'nav.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Spotify Web API Tutorial</title>
    <link rel='stylesheet' type='text/css' href='musics.css'>
</head>
<body>
    
    <div class='music-container'>  
        <h1>Song Recommendations.</h1>      
        <form action=''>
            
            <input type='hidden' id='hidden_token'>
            <div class='form-group row'>
                <label for='Genre' class='form-label'>Genre:</label>
                <select name='' id='select_genre' class='form-control form-control-sm'>
                    <option>Select...</option>                    
                </select>
            </div>
            <div class='form-group row'>
                <label for='Genre' class='form-label'>Playlists:</label>
                <select name='' id='select_playlist' class='form-control form-control-sm'>
                    <option>Select...</option>                    
                </select>
            </div>                  
            <div class='form-group row'>
                <button type='submit' id='btn_submit' class='btn btn-success'>Search</button>
            </div>          
        </form>        
        <div class='row1'>
            <div class='col1'>
                <div class='list-group song-list'>
                    
                </div>                                             
            </div>
            <div class='col' id='song-detail'>                
            </div>
        </div>   
    </div>

    <script src='app.js' type='text/javascript'></script>
</body>
</html>
