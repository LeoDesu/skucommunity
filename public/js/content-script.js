// $(document).ready(function(){
//     $(".content-body").toggle();
// });
// $.toggleContent = function(id){
//     $("#"+id).slideToggle(200);
// };

// $('#image').change(function(){
//     const file = this.files[0];

// });
function showPreviewImage(event){
    var reader = new FileReader();
    reader.onload = function(){
        document.getElementById("previewImage").src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function previewFile(event){
    var reader = new FileReader();
    reader.onload = function(){
        var isImage = /(\.png|\.jpg|\.jpeg|\.gif)$/i;
        var isVideo = /(\.mp4|\.webm)$/i;
        var isAudio = /(\.mp3|\.m4a)$/i;
        var input = document.getElementById("file").value;
        var output = document.getElementById("preview");
        var result = reader.result;
        if(isImage.exec(input)){
            output.innerHTML = "<img src='"+result+"' class='w-100'>";
        } else if(isVideo.exec(input)){
            output.innerHTML = "<video src='"+result+"' class='w-100' controls>";
        } else if(isAudio.exec(input)){
            output.innerHTML = "<audio src='"+result+"' class='w-100' controls>";
        } else{
            output.innerHTML = "<div class='col-3 text-center bg-success' style='border-radius: 5px; line-height: 3em;'>"+input.replace("C:\\fakepath\\", "")+"</div>";
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}