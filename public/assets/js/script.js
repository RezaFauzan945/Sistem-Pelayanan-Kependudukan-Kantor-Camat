document.querySelector('.custom-file-input').addEventListener('change',function(e){
    document.getElementById("foto-label").innerHTML = document.querySelector('#foto').files[0].name;
  })
  