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
    <h1 class="text-center fs-2 mb-3">Dodaj wpis na forum</h1>
    <form>
        <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Temat" id="floatingTextarea" style="height: 60px"></textarea>
            <label for="floatingTextarea">Temat</label>
        </div>
        <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Opis zagadnienia" id="floatingTextarea2"
                style="height: 100px"></textarea>
            <label for="floatingTextarea2">Opis zagadnienia</label>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>
<?php else:?>
<div class="card ">
    <div class="card-body">
        Aby korzystać z naszego forum, musisz być zalogowany
        <a href="/?action=login" class="card-link text-primary">Zaloguj się</a>
    </div>
</div>
<?php endif;
