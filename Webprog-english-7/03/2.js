const matrix = [
    [4, 6, 7, 8],
    [10, 15, 20, 25],
    [1, 2, 3, 4]
];

// Task 1: when the page loads, display the 
// matrix as a table

const table = document.querySelector("table");

table.innerHTML = 
    matrix.map(row => `<tr>${
        row.map(cell => `<td>${cell}</td>`).join('')
    }</tr>`).join('');

// Task 2: using event delegation (adding 1 event
// listener) double the number in the cell that is clicked

table.addEventListener("click", function(e){
    if (e.target.matches("td"))
        e.target.innerText *= 2;
});

// Task 3: when I move my mouse over a row,
// change the background color of that row

// code from: Lecture 3, Slide 43
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
