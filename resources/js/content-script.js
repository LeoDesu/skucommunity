window.updateSchedule = function(id){
    window.open('/schedule/'+id+'/edit', '_self');
}
window.showPreviewImage = function(event, target = 'previewImage', clearBtnId = 'clearImage', oldTarget = 'old_image_path'){
    event.preventDefault();
    let reader = new FileReader();
    reader.onload = function(){
        document.getElementById(target).src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    let clearBtn = document.getElementById(clearBtnId);
    clearBtn.style.display = 'block';
    document.getElementById(oldTarget).value = '';
}
window.clearPreviewImage = function(event, inputId = 'image_path', target = 'previewImage', clearBtnId = 'clearImage', oldTarget = 'old_image_path'){
    event.preventDefault();
    document.getElementById(inputId).value = '';
    document.getElementById(target).src = '';
    let clearBtn = document.getElementById(clearBtnId);
    clearBtn.style.display = 'none';
    document.getElementById(oldTarget).value = '';
}
window.submitDeleteForm = function(event, title = "ທ່ານແນ່ໃຈບໍວ່າຕ້ອງການດໍາເນີນການຕໍ່?", formId = 'delete-form'){
    event.preventDefault();
    swal({title: title, icon: 'warning', buttons: true, dangerMode: true})
        .then( res => {
            if(res){
                document.getElementById(formId).submit();
            }
        });
}
window.previewFile = function(event){
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