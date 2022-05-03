document.addEventListener("DOMContentLoaded", function () {
  // Les variables
  let input = document.querySelector("input");
  let searchResult = document.querySelector("#searchResult");
  let form = document.querySelector("form");

  input.addEventListener("keyup", function () {
    if (input.value.length > 2) {
      let data = new FormData(form);
      let ul = document.createElement("ul");
      //fetcher les données
      fetch("Models/StateModel.php", {
        method: "POST",
        body: data,
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (responseData) {
        

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
        });
    } else {
      ulbreak = searchResult.querySelector("ul");
      ulbreak !== null ? ulbreak.remove() : null;
    }
  });


});
