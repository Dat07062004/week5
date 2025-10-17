<?php foreach ($jokes as $joke): ?>
    <blockquote class="joke-item">
        <div class="joke-content">
            <?php if (!empty($joke['image'])): ?>
                <img src="images/<?=htmlspecialchars($joke['image'], ENT_QUOTES, 'UTF-8')?>" alt="Joke Image" class="joke-image">
            <?php endif; ?>
            <p class="joke-text"><?=htmlspecialchars($joke['joketext'],ENT_QUOTES, 'UTF-8')?></p>
        </div>
        <form action="deletejoke.php" method="post">
            <input type="hidden" name ="id" value ="<?=htmlspecialchars($joke['id'], ENT_QUOTES, 'UTF-8')?>">
            <input type ="submit" value ="Delete">
        </form>
    </blockquote>
    <?php endforeach;?>