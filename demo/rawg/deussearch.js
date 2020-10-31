/////
// les deux vars utilisées tout le temps dans toutes les requetes
var client_id_twitch = 'xdipluje1230tt0fh0nzs49w1slae3';
var client_secret = 'jj2a9l7h58kf464dtch46o1875h0c4';

var cors_url = "https://pure-oasis-61437.herokuapp.com"

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
        url: cors_url+"/games",
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
        url: cors_url+"/games/count",
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
        url: cors_url+"/release_dates",
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
        url: cors_url+"/platforms",
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
        url: cors_url+"/genres",
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
        url: cors_url+"/keywords",
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
        url: cors_url+"/platforms",
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
        url: cors_url+"/themes",
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
        url: cors_url+"/games",
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
        url: cors_url+"/covers",
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

/////////
//  get a list of the most popular tags
//////
function get_most_popular_tags(dom_element) {
    $.ajax({
        method: "GET",
        url: "https://api.rawg.io/api/tags&page_size=100&language=fr&key=1a07bf406da8478d952155742cde59ce",
        success:function( popular_tags ) {
            console.log(popular_tags);
            popular_tags = popular_tags['results'];
            for (var i = 0; i < popular_tags.length; i++) {
                $(dom_element+' ul').append('  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s" tag_id="'+popular_tags[i].id+'"></span>'+i+'-'+popular_tags[i].name+'</li>');
            }
        }
    });
}

// opposition
// single - multiplayer (cooperative)
// 


////////
// the fucking magic
/////
function do_the_deus_magic(array_genres, array_themes, platform,today_timestamp, oldest_timestamp, dom_elem, limit_tab, saveornot) {
    // get the steam url
    var deus_returned = "";
    $.ajax({
        method: "GET",
        url: "https://api.rawg.io/api/games?ordering=-rating&genres="+array_genres+"&platforms="+platform+"&key=1a07bf406da8478d952155742cde59ce",
        success:function( deus_results ) {
        //    deus_results.sort(sortFunction)
            /// IF I WANT TO SAVE THE RESULTS I CAN WITH THE SAVEORNOT VARIABLE
            if(saveornot == 1) {
                $.ajax({
                    method: "POST",
                    url: "saveresults.php",
                    data: { 'results' : deus_results },
                    success:function(deus_save) {
                    //    console.log(deus_save);
                    },          
                    async: false // <- this turns it into synchronous
                });
            }
           
            deus_results = deus_results['results'];
            if(deus_results.length > 0) {
                for (var i = 0; i < deus_results.length; i++) {
                    if(i < limit_tab) {
                        var deus_result_game_id = deus_results[i].id;
                        $("#"+dom_elem).append('<div class="col-lg-4 col-md-6 col-sm-12 mb-30"> \
                            <div class="game-item deus_result" style=background-image:url('+'"'+deus_results[i].background_image+'"'+');" game_id="'+deus_results[i].id+'"> \
                            <a class="game_url" target="_blank" href="#">\
                                <div class="game_deus_bg"></div>\
                                <a href="#" target="_blank" class="game_link"> \
                                    <div class="game-content"> \
                                        <div class="game-content-body"> \
                                            <h3 class="title">'+deus_results[i].name+'</h3><p>'+deus_results[i].genres[0].name+'</p>\
                                        </div> \
                                    </div> \
                                    <i class="fas fa-long-arrow-alt-right deus_see_more" title="Plus d\'informations sur le jeu"></i>\
                                </a> \
                            </a>\
                            </div>\
                        </div>');
                    }
                }

            } else {
                $("#"+dom_elem).append('<p> Aucun résultat sur cette tranche temporelle. </p>');
            }
        },          
        async: false // <- this turns it into synchronous
    });
    return deus_returned;
}
