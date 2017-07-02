<!--Вьюшка вывода письма-->
<div class="message-show">
    <table class="table table-message-view">
<?php

    echo '<tr><td><i>' . $date . '</i></td></tr>';
    echo '<tr><td><i>' . $email . '</i></td></tr>';
    echo '<tr><td><i>' . $subject . '</i></td></tr>';
    echo '<tr><td><i>' . $body . '</i></td></tr>';

?>
    </table>
</div>

