$(function() {
    $( "#check" ).on( "click", function() {
        if($(this).is(":checked")) {alert("Вы активировали переключатель");
        } else {alert("Вы деактивировали переключатель");
        }
    })
});


$(function() {
    $( "#delbtn" ).on( "click", function() {
        var selectedItems = new Array();
        $("input:checkbox:checked").each(function () {
            selectedItems.push($(this).attr('id'));
        });

        var data='jsonObj=' + JSON.stringify(selectedItems);
        // alert(data);
        $.ajax({
            url: 'index.php?r=mail/delete',
               type:'POST',
               data: data,
                success: function(res) {
                console.log(res);
            },
            error:function () {
                alert('Error!');
            }
        });
    });
});
