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




////////
// the fucking magic
/////
function do_the_deus_magic(array_genres, array_themes, platform,today_timestamp, oldest_timestamp, dom_elem, limit_tab, saveornot) {
    // get the steam url
    
    function get_steam_url(websites) {
        for (var i_steam = 0; i_steam < websites.length; i_steam++) {
            if(websites[i_steam].category == 13 ) {
                var steam_url = websites[i_steam].url;
                return steam_url;
            }
        }
    }

    function sortFunction(a, b) {
        if (a.rawg_rating === b.rawg_rating) {
            return 0;
        }
        if(a.rawg_rating < b.rawg_rating) {
            return 1;
        }
        if(a.rawg_rating > b.rawg_rating) {
            return -1;
        }
    }

    // remove erotic theme
        // & exclude  :
        // all over
        // broodstar 
        // xcom 2 deluxe edition 
        // noira
        // catherine classic
        // my grandfather's farm
        // domina
        // 4 last things
    // et sans le mot edition dans le nom
    // et pas hentai dans le nom
    var param_added = '& themes != (42) & id != 132234 & id != 140204 & id != 21427 & id !=52006 & id != 113905 & id != 98753 & id != 31173 & id != 27308 & name !~ *"edition"* & name !~ *"hentai"* & name !~ *"hentaï"*';
    var sort_by = 'total_rating';
    //  for pc 
    if (platform == 6) {
        // note min 
        param_added += '& total_rating > 5 ';
        sort_by = 'total_rating_count'
    }

    var deus_returned = "";
    $.ajax({
        method: "POST",
        url: cors_url+"/games",
        headers: {
            'Accept': 'application/json',
            'Client-ID': 'xdipluje1230tt0fh0nzs49w1slae3',
            'Authorization': 'Bearer '+acces_twitch_app.access_token,
        },
        //  ou platform, themes et genres correspondent, ou date est entre le filtre, un min rating adapté (sur pc trop de jeux) a la console, limit 3 et tri adapté (au nombre de vote sur pc, a la note sur les consoles) 
        // et est main game
        data: "fields name, total_rating, url, id, slug, genres.name, videos.video_id, cover.image_id, websites.url, websites.category ; where platforms = "+platform+" & themes = ("+array_themes+") & genres != ("+array_genres+") & category = 0 & first_release_date <"+today_timestamp+" & first_release_date > "+oldest_timestamp+" "+param_added+"; limit 200; sort "+sort_by+" desc;",
        success:function( deus_results ) {

            // je recupere, pour tous les jeux, les nots sur rawg, pour avoir un VRAI Classement par note
            for (var i = 0; i < deus_results.length; i++) {

                // la note de chaque jeu est initialisée à 0
                deus_results[i].rawg_rating = 0;
                deus_results[i].rawg_clip_url = '';
                // je recupere la note que j'ai pour ce jeu depuis la bdd d'e rawg SI je l'ai deja sinon ca reste a 0
                $.ajax({
                    method: "POST",
                    url: "getrawgrate.php",
                    data: { 'id_igdb' : deus_results[i].id },
                    success:function(rawg_inbdd_result) {
                        rawg_inbdd_result = JSON.parse(rawg_inbdd_result);
                        var note_from_rawg_in_my_bdd = rawg_inbdd_result.rating_rawg;
                        // si je l'ai en bdd la note du jeu prend cette note
                        if(note_from_rawg_in_my_bdd != 'inconnu') {
                            deus_results[i].rawg_rating = note_from_rawg_in_my_bdd;
                            deus_results[i].rawg_clip_url = rawg_inbdd_result.clip_url;
                        }
                        // sinon je vais la recuperer sur le site de rawg 
                        else {
                            // La je replace le nom de mon jeu pour essayer de coller avec un eventuel lien chez rawg et j'enregistre en bdd

                            var name_rawg = deus_results[i].slug.replace("digital deluxe", '');
                            var name_rawg = name_rawg.replace("for nintendo switch", '');
                            $.ajax({
                                method: "GET",
                                url: "https://api.rawg.io/api/games/"+name_rawg.toLowerCase()+"?key=1a07bf406da8478d952155742cde59ce",
                                success:function( rawg_result ) {
                                    deus_results[i].rawg_id = rawg_result.id;
                                    deus_results[i].rawg_rating = rawg_result.rating;
                                    if(rawg_result.clip) {
                                        deus_results[i].rawg_clip_url = rawg_result.clip.clip;
                                    }
                                    $.ajax({
                                        method: "POST",
                                        url: "savelink.php",
                                        data: { 'id_igdb' : deus_results[i].id, 'id_rawg' : deus_results[i].rawg_id, 'rawg_rating': deus_results[i].rawg_rating, 'clip_url' :  deus_results[i].rawg_clip_url},
                                        success:function(deus_save) {
                                        //    console.log(deus_save);
                                        },          
                                        async: false // <- this turns it into synchronous
                                    });
                                },
                                async: false // <- this turns it into synchronous
                            });
                        }
                    },          
                    async: false // <- this turns it into synchronous
                });
            }
            deus_results.sort(sortFunction);
        //    deus_sort_by_rawg_rating(deus_results);

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
           
            deus_returned = deus_results;
            if(deus_results.length > 0) {
                for (var i = 0; i < deus_results.length; i++) {
                    if(i < limit_tab && deus_results[i].rawg_rating >= 0) {
                        var steam_bloc = '';
                        if(deus_results[i].websites && platform == 6) {
                            steam_bloc = '<a target="_blank" class="deus_see_more steam" href="'+get_steam_url(deus_results[i].websites)+'"><img src="assets/images/steam_logo.png" alt="Lien steam" title="Lien Steam"></a>';
                        }
                        game_url = deus_results[i].url;
                        if(steam_bloc!= '') {
                            game_url = get_steam_url(deus_results[i].websites);
                        }
                        var rating = deus_results[i].total_rating;
                        var deus_result_game_id = deus_results[i].id;
                        var genre = '';
                        if(deus_results[i].genres) {
                            genre = deus_results[i].genres[0].name;
                        }
                        var cover = '';
                        if(deus_results[i].cover) {
                            cover = deus_results[i].cover.image_id;
                        }
                        var video_bloc = '';
                        // si rawg alors je prends
                        if(deus_results[i].rawg_clip_url) {
                            video_bloc = '<video class="deus_video" id="video_player" loop muted width="250"><source src="'+deus_results[i].rawg_clip_url+'" type="video/mp4"> Sorry, your browser doesn\'t support embedded videos.</video>';
                        }
                        // sinon si igdb video je prends
                        else if(deus_results[i].videos) {
                            var youtube_url = 'https://www.youtube.com/embed/'+deus_results[i].videos[0].video_id;
                            video_bloc = '<iframe class="deus_video yt" width="420"  allow="autoplay" height="315" src="'+youtube_url+'"></iframe>';
                        }
                        // sinon rien

                        $("#"+dom_elem).append('<div class="col-lg-4 col-md-6 col-sm-12 mb-30"> \
                        <div class="game-item deus_result" style=background-image:url('+'"https://images.igdb.com/igdb/image/upload/t_cover_big/'+cover+'.jpg"'+');" game_id="'+deus_results[i].id+'" id="game"> \
                            <a class="game_url" target="_blank" href="'+game_url+'">\
                                <div class="game_deus_bg"></div>\
                                <a href="'+deus_results[i].url+'" target="_blank" class="game_link"> \
                                    <div class="game-content"> \
                                        <div class="game-content-body"> \
                                            <h3 class="title">'+deus_results[i].name+'</h3><p>'+genre+'</p>\
                                            '+video_bloc+'\
                                        </div> \
                                    </div> \
                                    <i class="fas fa-long-arrow-alt-right deus_see_more" title="Plus d\'informations sur le jeu"></i>\
                                    '+steam_bloc+'\
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

