<div class="alert alert-success" role="alert">
<?php  if (isset($_SESSION['user'])) {
    echo $_SESSION['user'] .', ';
}?>Witamy w sekcji recenzje!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" onclick="$('.alert').alert('close')">&times;</span>
    </button>
</div>
<h1 class="fs-2 text-center p-3">Recenzje</h1>