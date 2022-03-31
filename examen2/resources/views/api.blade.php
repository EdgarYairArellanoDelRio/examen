<html>
    <section class="hero hero-body is-dark container">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <h1 class="title">buscar Codigo Postal</h1>
  <h2 class="subtitle">ingresa un codigo postal para saber su información</h2> 
  <form id="zipForm">
    <div class="field">
      <div class="control has-icons-left has-icons-right">
        <input class="input zip is-large" type="text" placeholder="Enter Zipcode">
        <span class="icon is-small is-left">
            <i class="fa fa-map-pin"></i>
          </span>
        <span class="icon is-small is-right icon-check">
            <i class="fa fa-check"></i>
          </span>
        <span class="icon is-small is-right icon-remove">
            <i class="fa fa-remove"></i>
          </span>
      </div>
    </div>
  </form>
</section>

<br>
<div class="container">
  <div id="output"></div>
</div>
</html>
<script>
document.querySelector("#zipForm").addEventListener("submit", getLocationInfo);


document.querySelector("body").addEventListener("click", deleteLocation);

function getLocationInfo(e) {
  //obtener el valor de zip de la entrada
  const zip = document.querySelector(".zip").value;

  // Make request
  fetch(`https://api.zippopotam.us/mx/${zip}`)
    .then(response => {
      if (response.status != 200) {
        showIcon("remove");
        document.querySelector("#output").innerHTML = `
              <article class="message is-danger">
              <div class="message-body">Invalid Zipcode, please try again</div></article>
            `;
        throw Error(response.statusText);
      } else {
        showIcon("check");
        return response.json();
      }
    })
    .then(data => {
      // mostrar la informacion de la localizacion
      let output = "";
      data.places.forEach(place => {
        output += `
              <article class="message is-primary">
                <div class="message-header">
                  <p>Location Info</p>
                  <button class="delete"></button>
                </div>
                <div class="message-body">
                  <ul>
                    <li><strong>City: </strong>${place["place name"]}</li>
                    <li><strong>State: </strong>${place["state"]}</li>
                    <li><strong>Longitude: </strong>${place["longitude"]}</li>
                    <li><strong>Latitude: </strong>${place["latitude"]}</li>
                  </ul>
                </div>
              </article>
            `;
      });

      // insertar en el output
      document.querySelector("#output").innerHTML = output;
    })
    .catch(err => console.log(err));

  e.preventDefault();
}

// Mostrar icono de verificación o eliminación
function showIcon(icon) {
  // limpiar iconos
  document.querySelector(".icon-remove").style.display = "none";
  document.querySelector(".icon-check").style.display = "none";
  // mostrar icono correcto
  document.querySelector(`.icon-${icon}`).style.display = "inline-flex";
}

// eliminar el mensaje de la location
function deleteLocation(e) {
  if (e.target.className == "delete") {
    document.querySelector(".message").remove();
    document.querySelector(".zip").value = "";
    document.querySelector(".icon-check").remove();
  }
}


</script>
