<div class="alert alert-success" role="alert">
    <?php  if (isset($_SESSION['user'])) {
    echo $_SESSION['user'] .', ';
}?>Witamy w sekcji forum! Możesz tutaj zgłaszać i rozwiązywać problemy z pomocą innych
    użytkowników.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" onclick="$('.alert').alert('close')">&times;</span>
    </button>
</div>

<h1 class="fs-2 text-center p-3">Forum</h1>

<?php if (isset($_SESSION['user'])):?>
<div class="card p-4">
    <p class="text-center fs-2 mb-3">Dodaj wpis na forum</p>
    <form method="POST" action="/?action=addPost">
        <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Temat" id="floatingTextarea" style="height: 60px"
                name="title"></textarea>
            <label for="floatingTextarea">Temat</label>
        </div>
        <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Opis zagadnienia" id="floatingTextarea2" name="content"
                style="height: 100px"></textarea>
            <label for="floatingTextarea2">Opis zagadnienia</label>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>
<div class="container">
    <p class="text-center fs-2 mb-3 mt-3">Wpisy użytkowników</p>
</div>
<div class="container" style="margin-top: 40px;">
    <?php foreach ($data['posts'] as  $post):  ?>
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title"><?php echo $post['title']?>
            </h3>
            <p class="card-text"><?php echo $post['content']?>
            </p>
            <p>Autor: <?php echo $post['author']?>
            </p>
            <p>Data publikacji: <?php echo  $post['date']?>
            </p>
            <p class="fs-2">Komentarze</p>
            <ul class="list-group">

                <?php foreach ($data['comments'] as  $comment):  ?>
                <?php if ($comment['articleId'] == $post['id']):?>
                <li class="list-group-item"><?php echo "<span class='text-primary'>" . $comment['author'] ."</span>" . ": " .   $comment['comment'] ?>
                </li>
                <?php endif; ?>
                <?php endforeach;?>
            </ul>
            <form method="POST" action="/?action=addComment">
                <div class="input-group pt-5"><textarea required class="form-control" placeholder="Napisz komentarz"
                        rows="1" name="comment"></textarea><span class="input-group-append"><button type="submit"
                            class="btn btn-secondary btn-icon"><i class="far fa-paper-plane"></i></button></span>
                </div>
                <input type="hidden" name="id"
                    value='<?php echo $post['id'] ?>'>
            </form>
        </div>
    </div>
    <?php endforeach;?>

</div>

</div>
<?php else:?>
<div class="card ">
    <div class="card-body">
        Aby korzystać z naszego forum, musisz być zalogowany
        <a href="/?action=login" class="card-link text-primary">Zaloguj się</a>
    </div>
</div>
<?php endif;
