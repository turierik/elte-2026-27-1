const animals = [
    "kutya",
    "macska",
    "róka",
    "farkas",
    "hörcsög",
    "nyuszi"
];

const ul = document.querySelector("ul");

ul.innerHTML = 
    animals.map(animal => `<li>${animal}</li>`).join('');

// ESEMÉNYDELEGÁLÁS
// N db listaelem figyelése helyett, 1 db eseményt figyelek a szülőn

function handleClick(e){
    if (e.target.matches("li"))
        e.target.style.color = "blue";
}

ul.addEventListener("click", handleClick);

// 3. előadás, 43. dia
function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(ul, "click", "li", function(){
    this.style.backgroundColor = "yellow";
});
