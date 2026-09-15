// JAVASCRIPT EVENT HANDLING TUTORIAL

// 1. find all the elements that are involved
// (inputs, outputs, trigger)
const numberSpan = document.querySelector("span");
const clickButton = document.querySelector("button");

// 2. write the event handling function
function handleClickButton(){
    let n = parseInt(numberSpan.innerHTML);
    // remember! innerHTML is a STRING!
    // use parseInt, parseFloat, etc.
    n++;
    numberSpan.innerHTML = n;
}

// 3. add an event listener
clickButton.addEventListener("click", handleClickButton);
// DO NOT PUT () AFTER THE FUNCTION NAME!!!
// we are passing the function as parameter
