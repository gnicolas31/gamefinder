/////
// les deux vars utilisées tout le temps dans toutes les requetes
var client_id_twitch = 'xdipluje1230tt0fh0nzs49w1slae3';
var client_secret = 'jj2a9l7h58kf464dtch46o1875h0c4';

/////
// le header utilisé dans toutes les requetes

var acces_twitch_app = '';
//////
// permet de recup le token twitch utilisé dans toutes les requetes vers igdb
jQuery.support.cors = true;
    $.ajax({
        type: "POST",
        url: "https://id.twitch.tv/oauth2/token?client_id="+client_id_twitch+"&client_secret="+client_secret+"&grant_type=client_credentials",    
        success:function( acces_twitch ) {
            acces_twitch_app = acces_twitch;
            return acces_twitch_app;
        },
        async: false // <- this turns it into synchronous
});

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
        data: "fields *; where id="+id_game+";",
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
function do_the_deus_magic(array_genres, array_themes, platform) {

    var deus_returned = "";
    $.ajax({
        method: "POST",
        url: "https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/games",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        //  where platform themes & genre, after 2002, rated more than 1 time, and not an expansion, au moins une note au totale, limit 3 order by note totale
        data: "fields *; where platforms = "+platform+" & themes = ("+array_themes+") & genres = ("+array_genres+") & first_release_date > 1009843200 & total_rating_count >= 1 & category != (2); limit 6; sort total_rating desc;",
        success:function( deus_results ) {
            deus_returned = deus_results;
            for (var i = 0; i < deus_results.length; i++) {
                var deus_result_game_id = deus_results[i].id;
                var deus_result_game_cover_id = deus_results[i].cover;
                $("#deus_result").append($('<div class="col-lg-4 col-md-6 col-sm-8 mb-30">').load('template_parts/bloc_single_game_search.php?id='+deus_result_game_id+'&cover='+deus_result_game_cover_id));
            }
        },          
        async: false // <- this turns it into synchronous
    });
    return deus_returned;
}