function myCheck(){
  var myInpout = document.querySelectorAll('input');
  var  test = true;
  for (var i = 0; i < myInpout.length; i++){
    if(myInpout[i].value == ""){
      test = false;
      switch (i) {
        case 0:
          document.getElementById("wrongName").innerHTML = "You need to fill that !";
          break;
        case 1:
          document.getElementById("wrongLastN").innerHTML = "You need to fill that !";
          break;
        case 2:
          document.getElementById("wrongTitle").innerHTML = "You need to fill that !";
          break;
        case 3:
        document.getElementById("wrongArticle").innerHTML = "You need to fill that !";
          break;
        case 4:
        document.getElementById("wrongCategorie").innerHTML = "You need to fill that !";
          break;
        default:
      }
    }
  }
  return test;
}
