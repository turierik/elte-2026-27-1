const fruits = [
    "apple",
    "banana",
    "coconut",
    "dragonfruit"
];

const ul = document.querySelector("ul");

ul.innerHTML = 
    fruits.map(fruit => `<li>${fruit}</li>`).join('');

// event delegation
// instead of adding N event listeners for N elements
// add 1 event listener to the parent element

function handleClick(e){
    if (e.target.matches("li"))
        e.target.style.color = "blue";
}

ul.addEventListener("click", handleClick);