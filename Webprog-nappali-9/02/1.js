const krumpli = document.querySelector("h1");
// autocomplete: doc (tab) .qs (tab)

krumpli.innerText = "Valami <i>más</i>";
// ez nem fog dőlten megjelenni :(

krumpli.innerHTML = "Megint <i>más</i>";
// ő már dőlt lesz

const karalábé = document.querySelector("p");
// mindig az első egyező elemet találja meg!
karalábé.style.color = "hotpink";
// CSS: background-color, JS: backgroundColor
karalábé.style.backgroundColor = "#ffffaa";

const retek = document.querySelector("button");
// ha nincs ilyen elem?
console.log(retek); // null
// retek.innerHTML = "Huh?"; // TypeError: cannot set properties of null

const kolbászok = document.querySelectorAll("p");
// NodeList minden egyező elemmel
// nincs egyezés? üres NodeList!
for (const kolbász of kolbászok)
    kolbász.innerHTML = "Hello";

const kép = document.querySelector("img");
kép.src = "b.png";