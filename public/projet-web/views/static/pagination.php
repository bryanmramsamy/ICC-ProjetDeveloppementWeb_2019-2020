<div id="pagination">
    <?php
        $pre_pagination_action = $_GET['action'];

        if ($actual_page > 1) echo("<a href='index.php?action=" . $pre_pagination_action . "&page=1'>&lt;&lt;&lt; PREMIÈRE PAGE</a> | <a href='index.php?action=" . $pre_pagination_action . "&page=" . $previous_page . "'>&lt; PAGE PRÉCÉDENTE</a> | ");
        echo ("PAGE " . $actual_page . " SUR " . $total_pages);
        if ($actual_page < $total_pages) echo(" | <a href='index.php?action=" . $pre_pagination_action . "&page=" . $next_page . "'>PAGE SUIVANTE &gt;</a> | <a href='index.php?action=" . $pre_pagination_action . "&page=" . $total_pages . "'>DERNIÈRE PAGE &gt;&gt;&gt; </a>");
    ?>
</div>
