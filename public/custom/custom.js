function previewFile()
{
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

$(document).ready(function (){
    $('#form1').keyup(function (){
        var query = $(this).val();
        console.log(query);
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"search",
                method: "POST",
                data:{query:query, _token:_token},
                success:function (data){
                    console.log(data);
                    var html = '';
                    data.users.forEach(user => {
                           html += `<tr><th scope="row">${user.id}</th>
                                     <td>${user.fullname}</td>
                                     <td>${user.username}</td>
                                     <td><img src=""></td>
                                     <td>${user.email}</td>
                                     <td>${user.address}</td>
                                     <td>(${user.gender} == 1) ? 'Nam' : 'Nữ'</td>
                                     <td>${user.birthdate}</td>
                                     <td style="padding: 15px 0px 0px 0px">
                                         <a href="" class="btn btn-success" style="width: 90px;">Edit</a>
                                         <a href="" class="btn btn-danger" style="width: 90px;">Delete</a>
                                     </td></tr>`;
                    });
                    // html += '</tr>';

                    $('#list').fadeIn();
                    $('#list').html(html);
                }
            });
        }
    });return false;
});


