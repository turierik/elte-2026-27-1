// ESEMÉNYKEZELÉS TUTORIÁL

// 1. jelölj ki minden érintett elemet (bemenet, kimenet, kiváltó)
const numberSpan = document.querySelector("span");
const pushButton = document.querySelector("button");

// 2. írj meg az eseménykezelő függvényt!
function handlePushButtonClicked(){
    // numberSpan.innerHTML = Number(numberSpan.innerHTML) + 1;
    numberSpan.innerHTML = parseInt(numberSpan.innerHTML) + 1;
    // numberSpan.innerHTML = +numberSpan.innerHTML + 1;
}

// 3. regisztráld az eseményfigyelőt
pushButton.addEventListener("click", handlePushButtonClicked);
// nincs a fv neve után ()!!! nem meghivjuk, átadjuk!