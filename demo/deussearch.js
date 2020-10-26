/////
// les deux vars utilisées tout le temps dans toutes les requetes
var client_id_twitch = 'xdipluje1230tt0fh0nzs49w1slae3';
var client_secret = 'jj2a9l7h58kf464dtch46o1875h0c4';

/////
// le header utilisé dans toutes les requetes

var acces_twitch_app = '';
//////
// permet de recup le token twitch utilisé dans toutes les requetes vers igdb
function connect_twitch() {
    jQuery.support.cors = true;
    $.ajax({
        type: "POST",
        url: "https://id.twitch.tv/oauth2/token?client_id="+client_id_twitch+"&client_secret="+client_secret+"&grant_type=client_credentials",    
        success:function( acces_twitch ) {
            acces_twitch_app = acces_twitch;
        },
        async: false // <- this turns it into synchronous
    });
    return acces_twitch_app;
}

///////////////
/// func to get 1 game data by his ID
///////////////
function get_game_by_id(id_game) {
    var gamereturned = "";
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/games",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: "fields *, cover.url ; where id="+id_game+";",
        success:function( data_one_game ) {
            gamereturned = data_one_game;
        },          
        async: false // <- this turns it into synchronous
    });
    return gamereturned;
}

///////////////
/// func to count games by filters (DEBUG ONLY)
///////////////
function count_game_by_filters() {
    var gamesreturned = "";
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/games/count",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: "fields *; where platforms = 130;",
        success:function( data_one_game ) {
            console.log(data_one_game);
        },          
        async: false // <- this turns it into synchronous
    });
    return gamesreturned;
}

///////////////
/// func to get release date by id
///////////////
function get_release_date_by_id(release_date_id) {
    
    var datereturned = "";
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/release_dates",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: "fields *; where id="+release_date_id+";",
        success:function( data_release_Date ) {
            datereturned = data_release_Date;
        },          
        async: false // <- this turns it into synchronous
    });
    return datereturned;
}


///////////////
/// func to get list of platforms
///////////////
function get_platform_list() {
    
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/platforms",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: "fields name,url;limit 50;",
        success:function( liste_platform ) {
            $('body').append('<span> platform </span>');
            for (var ig = 0; ig < liste_platform.length; ig++) {
                var name_platform = liste_platform[ig].name;
            
                $('body').append(name_platform+'<br />');
            }       
            $('body').append('<hr />'); 
        },          
        async: false // <- this turns it into synchronous
    });
}

///////////////
/// func to get list of genre
///////////////
function get_genre_list() {
    
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/genres",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: "fields name,url;limit 50;",
        success:function( liste_genres ) {
            $('body').append('<span> Genres </span>');
            for (var ig = 0; ig < liste_genres.length; ig++) {
                var name_genre = liste_genres[ig].name;
                var url_genre = liste_genres[ig].url;
                var id_genre = liste_genres[ig].id;
                $('body').append(id_genre+' - '+name_genre+'<br />');
            }       
            $('body').append('<hr />'); 
        },          
        async: false // <- this turns it into synchronous
    });
}

///////////////
/// func to get list of keywords
///////////////
function get_keywords_list() { 
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/keywords",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: 'fields name,url;limit 100;',
        success:function( liste_keywords ) {
            $('body').append('<span> Keywords </span><br />');
            for (var ig = 0; ig < liste_keywords.length; ig++) {
                var name_keyword = liste_keywords[ig].name;
                var url_keyword = liste_keywords[ig].url;
                var id_keyword = liste_keywords[ig].id;
                $('body').append(id_keyword+' - '+name_keyword+'<br />');
            }        
        },          
        async: false // <- this turns it into synchronous
    });
}

///////////////
/// func to get list of platforms
///////////////
function get_platform_list() {
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/platforms",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: 'fields name;limit 150; search "wii";',
        success:function( liste_plateforme ) {
            $('body').append('<span>plateforme </span>');
            for (var ig = 0; ig < liste_plateforme.length; ig++) {
                var name_plateforme = liste_plateforme[ig].name;
                var url_plateforme = liste_plateforme[ig].url;
                var id_plateforme = liste_plateforme[ig].id;
                $('body').append(id_plateforme+' - '+name_plateforme+'<br />');
            }       
            $('body').append('<hr />'); 
        },          
        async: false // <- this turns it into synchronous
    });
}


///////////////
/// func to get list of themes
///////////////
function get_themes_list() {
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/themes",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: 'fields name;limit 50;',
        success:function( liste_themes ) {
            $('body').append('<span>themes </span>');
            for (var ig = 0; ig < liste_themes.length; ig++) {
                var name_theme = liste_themes[ig].name;
                var url_theme = liste_themes[ig].url;
                var id_theme = liste_themes[ig].id;
                $('body').append(id_theme+' - '+name_theme+'<br />');
            }       
            $('body').append('<hr />'); 
        },          
        async: false // <- this turns it into synchronous
    });
}

///////////////
/// func to search a game and append result
///////////////
function search_games(search, selector) {
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/games",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },   
        data: 'fields id,cover; search "'+search+'";'
    })
    .done(function( search_res_array ) {
        for (var i = 0; i < search_res_array.length; i++) {
            var id = search_res_array[i].id;
            var cover = search_res_array[i].cover;
            $(selector).append($('<div class="col-lg-4 col-md-6 col-sm-8 mb-30">').load('template_parts/bloc_single_game_search.php?id='+id+'&cover='+cover));
        }
    });
}

///////////////
/// func to get cover for a game
///////////////
function get_game_cover(id_cover) {
    var coverreturned = "";
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/covers",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        data: "fields url; where id="+id_cover+";",
        success:function( cover ) {
            coverreturned = cover;
        },          
        async: false // <- this turns it into synchronous
    });
    return coverreturned;
}




////////
// the fucking magic
/////
function do_the_deus_magic(array_genres, array_themes, platform,today_timestamp, oldest_timestamp, dom_elem) {

    var param_added = '';
    var sort_by = 'total_rating';
    // rating min for pc 
    if (platform == 6) {
        param_added = '& total_rating > '+40;
        sort_by = 'total_rating_count';
    }

    var deus_returned = "";
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/games",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        //  ou platform, themes et genres correspondent, ou date est entre le filtre, un min rating adapté (sur pc trop de jeux) a la console, limit 3 et tri adapté (au nombre de vote sur pc, a la note sur les consoles)
        data: "fields name, url, id, cover.url; where platforms = "+platform+" & themes = ("+array_themes+") & genres = ("+array_genres+") & first_release_date <"+today_timestamp+" & first_release_date > "+oldest_timestamp+" "+param_added+"; limit 6; sort "+sort_by+" desc;",
        success:function( deus_results ) {
            deus_returned = deus_results;
            if(deus_results.length > 0) {
                for (var i = 0; i < deus_results.length; i++) {
                    var deus_result_game_id = deus_results[i].id;
                    $("#"+dom_elem).append('<div class="col-lg-4 col-md-6 col-sm-8 mb-30"> \
                    <div class="game-item" game_id="'+deus_results[i].id+'"> \
                    <a target="_blank" class="game_link" href="'+deus_results[i].url+'" class="game_link"> \
                        <div class="game-thumb"> \
                            <img class="cover" src="'+deus_results[i].cover.url+'" alt="game"> \
                        </div> \
                        <div class="game-content"> \
                            <div class="game-content-body"> \
                                <h3 class="title">'+deus_results[i].name+'</h3> \
                                <div class="game-meta-post d-flex flex-wrap"> \
                                    <div class="game-verson"> \
                                        <span>Ver.2.1.5</span> \
                                    </div> \
                                    <div class="game-ratings"> \
                                        <i class="fas fa-star"></i> \
                                        <i class="fas fa-star"></i> \
                                        <i class="fas fa-star"></i> \
                                        <i class="fas fa-star"></i> \
                                        <i class="fas fa-star"></i> \
                                    </div> \
                                </div> \
                            </div> \
                            <div class="game-content-footer"> \
                                <div class="game-content-footer-content d-flex flex-wrap align-items-center justify-content-between"> \
                                    <div class="game-player"> \
                                        <span>1356 Active Players</span> \
                                    </div> \
                                    <div class="game-footer-icon"> \
                                        <i class="fas fa-long-arrow-alt-right"></i> \
                                    </div> \
                                </div> \
                            </div> \
                        </div> \
                    </a> \
                </div></div>');
                }
            } else {
                $("#"+dom_elem).append('<p> Aucun résultat sur cette tranche temporelle. </p>');
            }
        },          
        async: false // <- this turns it into synchronous
    });
    return deus_returned;
}
