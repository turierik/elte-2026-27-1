const matrix = [
    [ 3, 6, 7, 0 ],
    [ 4, 2, 1, 9 ],
    [ 6, 8, 0, 5 ]
];

// Task 1: generáld ki ezt a táblázatot :)

const table = document.querySelector("table");

table.innerHTML = 
    matrix.map(row => `<tr>${
        row.map(cell => `<td>${cell}</td>`).join('')
    }</tr>`).join('');

// Task 2: ha egy cellára kattintok, duplázd meg
// a benne lévő számot

table.addEventListener("click", function(e){
    if (e.target.matches("td"))
        e.target.innerText *= 2;
});

// Task 3: egy sorra rámutatva, legyen sárga a sor háttere,
// és álljon vissza fehérre, ha lejövök
// --> nehéz delegálás + milyen eseménytípus

function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(table, "mouseover", "tr", function(){
    this.style.backgroundColor = "yellow";
});

delegate(table, "mouseout", "tr", function(){
    this.style.backgroundColor = "";
});
