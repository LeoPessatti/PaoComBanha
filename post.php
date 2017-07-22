<?php
/**
 * Código criado e pertencente exclusivamente a Leonardo Pessatti.
 * www.facebook.com/leopessatti
 * Created on : 29/03/2017, 20:48:08
 * Author     : Leonardo Pessatti <lpessatti@gmail.com>
 */
include 'server.php';

$con = 'SELECT * FROM vw_posts WHERE id= \'' . $post . '\'';
$query = mysqli_query($link, $con);
$linha = mysqli_fetch_array($query);
mysqli_set_charset($link, "utf8");

// Inacabado
?>

<div class="col s10 m8 l6 ">
    <article>
        <header>
            <h1><a href="#"><?php echo $linha[titulo]; ?></a></h1>
            <p>Postado por <?php echo $linha[nome]; ?> ás <?php echo date('H:i:s', strtotime($linha[data])); ?> do dia <?php echo date('d-m-y', strtotime($linha[data])); ?></p>
            <img src="<?php echo urldecode($linha[preview]); ?>" alt="" /></a>
            <h5><?php echo $linha[descricao]; ?></h5>
        </header>
        <p><?php echo urldecode($linha[conteudo]); ?></p>
        <ul class="actions">

            tags:
            <?php
            $conTag = 'SELECT nome FROM vw_tags where id_post=\'' . $linha[id] . '\'';
            $queryTags = mysqli_query($link, $conTag);
            $numTags = mysqli_num_rows($queryTags);
            for ($i = 1; $tags = mysqli_fetch_array($queryTags); $i++) {
                ?>
                <a href="index.php?tag=<?php echo $tags[nome]; ?>"><?php echo $tags[nome]; ?></a>    
                <?php
                if ($numTags > $i) {
                    echo ', ';
                }
            }

            $conAutor = 'SELECT * FROM vw_autor WHERE id= \'' . $linha[autor_id] . '\'';
            $queryAutor = mysqli_query($link, $conAutor);
            $linhaAutor = mysqli_fetch_array($queryAutor);
            ?>

            <div class="row">

                <div class="card blue-grey darken-1">
                    <div class="card-content white-text" style="background-color: <?php echo $linhaAutor[cor]; ?>">
                        <span class="card-title"><a href="index.php?autor=<?php echo $linhaAutor[autor_id]; ?>"><?php echo $linhaAutor[nome]; ?></a></span>
                        <p><?php echo $linha[descricao_autor]; ?></p>
                    </div>
                    <div class="card-action">
                        <a href="HTTPS://<?php echo $linhaAutor[facebook]; ?>">Facebook</a>
                        <a href="<?php echo $linhaAutor[twitter]; ?>">Twitter</a>
                        <a href="<?php echo $linhaAutor[instagram]; ?>">Instagram</a>
                        <a href="<?php echo $linhaAutor[linkedin]; ?>">LinkedIn</a>
                        <a href="<?php echo $linhaAutor[site]; ?>">Site</a>
                        <a href="<?php echo $linhaAutor[telegram]; ?>">Telegram</a>

                    </div>
                </div>

            </div>
        </ul>
    </article>
</div>
