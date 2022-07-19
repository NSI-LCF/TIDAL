fetchcall();
function fetchcall() {
  fetch("http://localhost/backoffice/api.php")
    .then((response) => response.json())
    .then((data) => {
      createTable(data["profs-abs"]);
      processDataInfo(data["annonceBis"]);
    })
    .catch((err) => {
      console.error(err);
    });

  return false;
}

function createTable(data) {
  // (C) CREATE HTML TABLE
  // (C1) HTML TABLE ELEMENT
  var myTable = document.createElement("table"),
    row = myTable.insertRow(),
    cell;

  // (C2) LOOP THROUGH ARRAY & GENERATE ROWS-CELLS
  var perrow = 6; // 2 CELLS PER ROW
  data.forEach((value, i) => {
    // ADD CELL
    cell = row.insertCell();
    cell.innerHTML = value;

    // BREAK INTO NEXT ROW
    var next = i + 1;
    if (next % perrow == 0 && next != data.length) {
      row = myTable.insertRow();
    }
  });

  // (D) ATTACH TABLE TO CONTAINER
  document.getElementById("absences").appendChild(myTable);
}

function processDataInfo(data) {
  data.forEach((item) => {
    document.getElementById("informations").innerHTML +=
      "<div class='annonce'>" +
      "<h1 class='titreAnnonce'>" +
      item.title +
      "</h1>" +
      "<p class='texteAnnonce'>" +
      item.annonce +
      "</p>" +
      "</div>";
  });
}
