const matrix = [
    [4, 6, 8, 2],
    [0, 7, 9, 3],
    [1, 2, 3, 4]
];

// Task 1: generáld ki a táblázatot :)

const table = document.querySelector("table");

table.innerHTML =  
    matrix.map(row => `<tr>${
        row.map(cell => `<td>${cell}</td>`).join('')
    }</tr>`).join('');

// Task 2: egy cellára kattintáskor
// duplázd meg a benne lévő számot

table.addEventListener("click", function(e){
    if (e.target.matches("td"))
        e.target.innerText *= 2;
})

// Task 3: egy sorra rámutatva (mouseover) változzon meg
// a sor háttérszíne, utána lejövetelkor pedig
// változzon vissza fehérre (mouseout)

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
