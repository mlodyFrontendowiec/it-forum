<?php  if (!isset($_SESSION['user'])): ?>
<div class="alert alert-success" role="alert">
    Załóż konto i dołącz do nas już dziś!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" onclick="$('.alert').alert('close')">&times;</span>
    </button>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">

        <h1 class="title">Rejstracja</h1>
        <?php if (isset($_GET['action']) && $_GET['action'] == 'failRegister'):?>
        <p class="text-danger">Nazwa użytkownika jest zajęta</p>
        <?php endif;?>
        <form method="POST" action="/?action=validateRegister">
            <input type="text" id="login" name="login" placeholder="login" required>
            <input type="text" id="login" name="mail" placeholder="Adres email" required>
            <input type="password" id="password" name="password" placeholder="hasło" required>
            <input type="submit" value="Załóż konto" class="submitButton m-2 ">
        </form>
        <a href="/?action=login">Zaloguj się</a>

    </div>
</div>
<?php else: header("Location: /")?>
<?php endif?>;