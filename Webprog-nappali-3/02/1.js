const krumpli = document.querySelector("h1");
// autocomplete: doc (tab) .qs (tab)

krumpli.innerText = "Valami <i>más</i>";
// nem fog dőlten megjelenni

krumpli.innerHTML = "Megint <i>más</i>";
// meg már jól jelenik meg

const retek = document.querySelector("p");
// mindig az ELSŐ illeszkedő element találja meg
// ha nincs ilyen: null
retek.style.color = "hotpink";
// CSS: background-color, JS: backgroundColor

const káposzták = document.querySelectorAll("p");
// NodeList-et ad vissza az összes illeszkedő elemmel
// ha nincs ilyen: üres NodeList :)
for (const káposzta of káposzták)
    káposzta.style.backgroundColor = "lightgreen";

// const semmi = document.querySelector("img");
// semmi.innerText = "valami"; // cannot set properties of null

const link = document.querySelector("a");
link.href = "https://telex.hu";