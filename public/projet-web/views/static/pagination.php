<?php
$previous_page = $actual_page - 1;
$next_page = $actual_page + 1;
?>

<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <?php
            unset($pre_pagination_action);
            foreach($_GET as $key => $value) if($key != 'page') $pre_pagination_action .= $key . "=" . $value . "&";

            if ($actual_page > 1) {
            ?>
                <li class='page-item'><a class='page-link' href='index.php?<?= $pre_pagination_action; ?>page=1'>Première page</a></li>

                <li class='page-item'><a class='page-link' href='index.php?<?= $pre_pagination_action; ?>page=<?= $previous_page; ?>'>Page précédente</a></li>
            <?php } ?>

            <li class="page-item active" aria-current="page">
                <span class="page-link">Page <?= $actual_page; ?> sur <?= $total_pages; ?><span class="sr-only">(current)</span>
                </span>
            </li>

            <?php if ($actual_page < $total_pages) { ?>
                <li class='page-item'><a class='page-link' href='index.php?<?= $pre_pagination_action; ?>page=<?= $next_page; ?>'>Page suivante</a></li>

                <li class='page-item'><a class='page-link' href='index.php?<?= $pre_pagination_action; ?>page=<?= $total_pages; ?>'>Dernière page</a></li>
            <?php } ?>

        </ul>
    </nav>
</div>
