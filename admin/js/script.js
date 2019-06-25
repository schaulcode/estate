tinymce.init({ selector:'textarea' });

$('document').ready(function(){
    $('#selectAllCheckbox').on('click', function(event){
        if(this.checked){
            $('.checkBox').each(function(){
                this.checked = true;
            })
        }else{
             $('.checkBox').each(function(){
                this.checked = false;
        })
        }
})

function onlineusers(){
$.get("include/functions.php?onlineusers=result", function(data){
    $(".onlineusers").text(data);
})
}

setInterval(function(){
    onlineusers();
},500)
})



function delete_rows(){
     $('.delete-link').on('click', function(e){
        var id = $(this).attr("rel");
        $("#hidden-btn").attr("value", id);
        $("#myModal").modal("show");
        console.log( $("#delete-btn").attr("value"));

    })
}

function dont_delete(){
    $('.delete-link').on('click', function(e){
        var id = $(this).attr("rel");
        $(".modal-body>p").text("You have to be a Admin to be able to Delete this")
        $('#myModal input').hide();
        $("#myModal").modal("show");
    })
}
