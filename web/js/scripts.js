//Выбрать все чекбоксы
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

//Снять все чекбоксы
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

//Проверка выбранных чекбоксов
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

//Фильтрация
jQuery(function ($){
    $('#filter').on('input', function (){
        var value = this.value;
        if( /\d{2,}/.test(value) ){
            var between = value.split('-');
            between && filter('date', $.trim(between[0]), $.trim(between[1]));
        } else {
            filter('email', value);
        }
    });


    function filter(field, min, max){
        $('.mail-msglist').find('.'+field).each(function (){
            var match, value = this.innerHTML.toLowerCase();
            if( min > 0 ){
                match = max ? (value >= min && value <= max) : (min === value);
            }
            else {
                match = value.indexOf(min.toLowerCase()) > -1;
            }
            this.parentNode.style.display = match ? '' : 'none';
        });
    }
});



