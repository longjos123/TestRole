function previewFile()
{
    console.log('aaaaa');
    const preFile = document.querySelector('#previewAvatar');
    const file = document.querySelector('#avatar').files[0];

    const reader = new FileReader();

    reader.addEventListener('load', function (){
        preFile.src = reader.result;
    },false);

    if(file){
        reader.readAsDataURL(file);
    }
}

