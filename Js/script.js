document.addEventListener("DOMContentLoaded", function () {
  // Les variables
  let input = document.querySelector("input");
  let searchResult = document.querySelector("#searchResult");
  let form = document.querySelector("form");
  let searchSuggestion = document.querySelector("#searchSuggestion");

  input.addEventListener("keyup", function () {

    if (input.value.length > 0) {

      let data = new FormData(form);
      let dataSuggestion = new FormData(form);
      let ul = document.createElement("ul");

      //fetch des données pour la recherche
      fetch("Models/StateModel.php", {
        method: "POST",
        body: data,
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (responseData) {

          if (responseData[0]) {
            searchResult.innerHTML = "";
            ulbreak = searchResult.querySelector('ul')
            ulbreak !== null ? ulbreak.remove() : null

            responseData.forEach((element) => {
              console.log(element.name);

              let list = document.createElement("li");
              list.innerHTML = element.name;
              ul.appendChild(list);

              list.addEventListener("click", function () {
                input.value = element.name;
              });
            });
            searchResult.appendChild(ul);
          } else {
            searchResult.innerHTML = "Aucun résultat trouvé pour votre recherche";
          }
        });

      //fetch des données pour les suggestions de réponse
      fetch("Models/StateModel2.php", {
        method: "POST",
        body: dataSuggestion,
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (responseDataSuggestion) {

          searchSuggestion.innerHTML="bonjour";

        })







    } else {

      ulbreak = searchResult.querySelector("ul");
      ulbreak !== null ? ulbreak.remove() : null;

    }
  });


});
