<?php 
    $id_game = $_GET['id']; 
    $id_cover = $_GET['cover']; 
?>
<script>

// les variables globales (id du jeu, selecteur du bloc du jeu, couverture, titre..)
var game = get_game_by_id(<?php echo $id_game; ?>);
var selector = 'div[game_id=<?php echo $id_game; ?>]';

// a partir d'ici je push les données dans le dom en dessous

// l'image de couverture si existante
$(selector+' .cover').attr('src', game[0].cover.url);
// le titre du jeu
$(selector+' .title').text(game[0].name);
$(selector+' .game_link').attr('href', game[0].url);


</script>

    <div class="game-item" game_id="<?php echo $id_game; ?>">
        <a target="_blank" class="game_link" href="" class="game_link">
            <div class="game-thumb">
                <img class="cover" src="assets/images/game/game-1.png" alt="game">
            </div>
            <div class="game-content">
                <div class="game-content-body">
                    <h3 class="title">
                        <script>
                        </script>
                    </h3>
                    <div class="game-meta-post d-flex flex-wrap">
                        <div class="game-verson">
                            <span>Ver.2.1.5</span>
                        </div>
                        <div class="game-ratings">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="game-content-footer">
                    <div class="game-content-footer-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="game-player">
                            <span>1356 Active Players</span>
                        </div>
                        <div class="game-footer-icon">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>