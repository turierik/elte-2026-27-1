const potato = document.querySelector("h1");
// autocomplete: doc (tab) .qs (tab)

// tag selector: h1, p, img
// ID selector: #id
// class selector: .class

potato.innerText = "Something <i>else</i>";
// this will NOT show in italics

potato.innerHTML = "Something <i>new</i>";
// this will be italics
// use innerHTML if you can, its better :)

const apple = document.querySelector("p");

// WHICH PARAGRAPH IS NOW SELECTED?
apple.innerHTML = "Hahahaha it was me";

// querySelector will ALWAYS find the FIRST match!!!
// if no match --> null

apple.style.color = "blue";
// CSS: background-color, JS: backgroundColor
apple.style.backgroundColor = "#ffffdd";

const sixseven = document.querySelector("img");
sixseven.src = "b.png";

const apples = document.querySelectorAll("p");
// autocomplete: doc (tab) .qsa (tab)
// select ALL matching elements
// if no match: empty NodeList

for (const a of apples) // don't forget to use a LOOP with qSA
    a.innerHTML = "Hello";