tinymce.init({ selector:'textarea' });


//var div_box = "<div id='load-screen'><div id='loading'></div></div>";
// $("body").prepend(div_box);

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


    $('#delete-link').on('click', function(e){
//        var id = this.atrr("rel");
//        $("#delete-btn").atrr("href","posts.php?post_delete="+ id +"");
//        $("#myModal").modal("show");
            alert("hallo");
    })



})

//    $('#load-screen').delay(500).fadeOut(600,function(e){
//        this.remove;
//    })


})
function onlineusers(){
$.get("include/function.php?onlineusers=result", function(data){
    $(".onlineusers").text(data);
})
}
//setInterval(function(){
//    onlineusers();
//},500)

//function activeUsers(){
//    $.get("include/function.php?activeusers=result")
//
//}
//setInterval(function(){
//    activeUsers();
//},5000)

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
