fetchcall()
//Data2 = ["M.Jany","M.toto","M.tutu","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany"];
data3 = [{
    titre: 'test2',
    annonce: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultricies arcu sed ante cursus, et maximus tellus vulputate. Praesent aliquam et quam vel vestibulum. Cras feugiat nulla eget eros mollis tincidunt. Donec ac lorem quis erat sollicitudin pretium ac in ex. Vestibulum tempor lacus in sapien blandit tincidunt. Nulla quis auctor ipsum. Donec aliquet est ac massa accumsan rutrum. Sed fermentum nec dolor id hendrerit. Duis feugiat gravida tellus eu varius. Vestibulum finibus mi at massa malesuada rhoncus. Curabitur tincidunt, ex fermentum mollis ultricies, nibh sapien tincidunt sem, eget luctus nibh justo at urna. In mattis venenatis quam non mattis. Donec sit amet libero lorem. Vestibulum tempor lorem a quam ullamcorper, eu imperdiet ligula viverra. Donec eu sapien varius, suscipit ante in, ornare sem. Curabitur pretium quis justo et tristique. Nunc odio eros, commodo nec malesuada at, mollis eu nisl. Vestibulum dolor ante, mattis at nisi et, pharetra pretium sem. Cras commodo nulla turpis, a convallis purus condimentum at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer faucibus lectus sit amet arcu elementum, ut ornare ligula mattis.'
}, {
    titre: 'Where does it come from?',
    annonce: " Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham."
}]

//processDataInfo(data3)

function fetchcall() {
    fetch("http://localhost/tidal/backoffice/api.php")
        .then(response => response.json())
        .then(data => {
            createTable(data["profs-abs"])

            //console.log(data["annonce"])
            processDataInfo(data["annonceBis"])

            //createTable(Data2)
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
        document.getElementById("informations").innerHTML += "<div class='annonce'>" + "<h1 class='titreAnnonce'>" + item.title + "</h1>" + "<p class='texteAnnonce'>" + item.annonce + "</p>"+ "</div>"
      });
}