<div class="alert alert-success" role="alert">
    <?php  if (isset($_SESSION['user'])) {
    echo $_SESSION['user'] .', ';
}?>Witamy w sekcji recenzje!<button type="button" class="close" data-dismiss="alert"
        aria-label="Close">
        <span aria-hidden="true" onclick="$('.alert').alert('close')">&times;</span>
    </button>
</div>
<h1 class="fs-2 text-center p-3">Recenzje</h1>

<div class="container" style="margin-top: 40px;">
    <?php foreach ($data as  $review):  ?>
    <div class="card t-3">
        <img src=<?php echo $review['image']?>
        class="card-img-top" alt="Obrazek">
        <div class="card-body">
            <h3 class="card-title"><?php echo $review['title']?>
            </h3>
            <p class="card-text"><?php echo $review['content']?>
            </p>
            <p><?php echo $review['author']?>
            </p>
        </div>
        <?php endforeach;?>


    </div>
</div>