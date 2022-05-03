document.addEventListener("DOMContentLoaded", function () {

  // Les variables
  let input = document.querySelector("input");
  let searchResult = document.querySelector("#searchResult");

  let form = document.querySelector("form");


  input.addEventListener("keyup", function () {


    let data = new FormData(form);
    //fetcher les données
    fetch("Models/StateModel.php", {
      method: "POST",
      body: data
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (responseData) {

        if (input.value.length > 1) {
          
          responseData.forEach(element => {
            console.log(element.name);
            searchResult.innerHTML= element.name;
          });
          

        }

      });


  })

  //   function load_data(querry) {
  //     if (querry.length > 2) {
  //     } else {
  //       searchResult.innerHTML = "Votre recherche n'a pas abouti";
  //     }
  //   }
});
