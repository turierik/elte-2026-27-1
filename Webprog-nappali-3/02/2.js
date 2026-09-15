// ESEMÉNYKEZELÉS 3 LÉPÉSBEN TUTORIÁL

// 1. jelöld ki az összes elemet, ami
// akárhogyan részt vesz (be, ki, trigger)
const numberSpan = document.querySelector("span");
const pushButton = document.querySelector("button");

// 2. írd meg az eseménykezelő függvényt
function handlePushButtonClicked(){
    numberSpan.innerText = Number(numberSpan.innerText) + 1;
    numberSpan.innerText = parseInt(numberSpan.innerText) + 1;
    numberSpan.innerText = +numberSpan.innerText + 1;
}

// 3. regisztrálj be egy eseményfigyelőt
pushButton.addEventListener("click", handlePushButtonClicked);
// NINCS () a fv név után, nem meghívni akarjuk!!!