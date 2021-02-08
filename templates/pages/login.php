<?php  if (!isset($_SESSION['user'])): ?>

<div class="alert alert-success" role="alert">
    Zaloguj się do serwisu!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" onclick="$('.alert').alert('close')">&times;</span>
    </button>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <h1 class="title">Logowanie</h1>
        <form method="POST" action="/?action=requestLogin">
            <input type="text" id="login" name="login" placeholder="login" required>
            <input type="password" id="password" name="password" placeholder="hasło" required>
            <input type="submit" value="Zaloguj" class="submitButton">
        </form>
        <a href="/?action=register">Załóż konto</a>
    </div>
</div>
<?php else: header("Location: /")?>
<?php endif?>;