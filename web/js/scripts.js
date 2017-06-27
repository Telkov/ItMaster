function check()
{
    var check=document.getElementsByTagName('input');
    for(var i=0;i<check.length;i++)
    {
        if(check[i].type==='checkbox')
        {
            check[i].checked=true;
        }
    }
}

function uncheck()
{
    var uncheck=document.getElementsByTagName('input');
    for(var i=0;i<uncheck.length;i++)
    {
        if(uncheck[i].type==='checkbox')
        {
            uncheck[i].checked=false;
        }
    }
}


$(function() {
    $( "#delete-msg-button" ).on( "click", function() {
        var selectedItems = new Array();
        $("input:checkbox:checked").each(function () {
            selectedItems.push($(this).attr('id'));
        });

        var data='jsonObj=' + JSON.stringify(selectedItems);
        // alert(data);
        $.ajax({
            url: 'index.php?r=mail/delete',
            type: 'POST',
            data: data,
            success: function (res) {
                console.log(res);
            }
        });
    });
});

