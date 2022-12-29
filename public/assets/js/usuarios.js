$(function(){
    $("#formAgencia").submit(function(e){
        e.preventDefault();
        var nome = $("#formAgencia input").val()
        console.log($('.tbody').parent())
        $('.tbody').append('<tr><th scope="row">1</th><td>'+nome+'</td></tr>')

    })
})
