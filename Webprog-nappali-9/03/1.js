const fruits = [
    "alma",
    "banán",
    "citrom",
    "dinnye",
    "eper",
    "füge",
    "gránátalma"
];

const ul = document.querySelector("ul");

ul.innerHTML = 
    fruits.map(fruit => `<li>${fruit}</li>`).join('');

// eseménydelegálás
// N db listaelem figyelése helyett
// 1 db eseményfigyelővel figyeld a SZÜLŐT

function handleClick(e){
    if (e.target.matches("li"))
        e.target.style.backgroundColor = "red";
}

ul.addEventListener("click", handleClick);

// 3. előadás, 43. dia :)
function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(ul, "click", "li", function(){
    this.style.color = "white";
});