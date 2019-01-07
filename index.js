function fetchProblems(id) {
    var result;
    fetch("jsonuser.php?id="+id)
    .then( (resp) => resp.json())
    .then( (r) => {imprimir( r) } );     
}

function imprimir(r) {
    for(i of r) {
        let row = document.getElementById('r'+i);
        if (row) {
            row.classList.add("table-success");
        }
    }
}