<div class="mail-msg-block">

<?php
// if(isset($_POST['getcity']))
// {
//     $ciid=$_POST['ciid'];
//     $sel='select*from hotels where cityid='.$ciid;
//     $res2=mysql_query($sel);
    echo '<table class="table table-striped mail-msglist" style="margin-top: 20px">';
    echo '<tr>';
    echo '<th> <input type="checkbox" name="allmsg" id="check"></th>';
    echo '<th>Получатель</th>';
    echo '<th>Тема письма</th>';
    echo '<th>Дата отправления</th>';
    echo '</tr>';


        echo '<tr>';
        echo '<td> <input type="checkbox" name="test1"</td>';
        echo '<td>TEST1</td>';
        echo '<td>TEST1</td>';
        echo '<td>TEST1</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td> <input type="checkbox" name="test2"</td>';
        echo '<td>TEST2</td>';
        echo '<td>TEST2</td>';
        echo '<td>TEST2</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td> <input type="checkbox" name="test3"</td>';
        echo '<td>TEST3</td>';
        echo '<td>TEST3</td>';
        echo '<td>TEST3</td>';
        echo '</tr>';


    // while ($row2=mysql_fetch_array($res2, MYSQL_ASSOC))
    // {
    //     echo '<tr>';
    //     echo '<td>'.$row2['hotel'].'</td>';
    //     echo '<td>'.$row2['stars'].'</td>';
    //     echo '<td>'.$row2['cost'].'</td>';
    //     echo '<td><a href="hotelinfo.php?hid='.$row2['id'].'" target="_blank">Click for details</a></td>';
    //     echo '</tr>';

    // }
    echo '</table>';
// }

?>
    <script>
        $(function() {
            $( "#check" ).on( "click", function() {
                if($(this).is(":checked")) {alert("Вы активировали переключатель"); }
                else {alert("Вы деактивировали переключатель");}
            })
        });

        //    $("#myCheckbox").prop("checked");
    </script>
</div>
