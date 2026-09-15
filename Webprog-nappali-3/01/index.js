// ennek az órának a kódja eltűnt a tanári gépről
// ez itt a 9-es csoport maradványa
// sorry :c

console.log("Helló Világ");

let x = 3; // normális, blokkszintű változó! TEHÁT JÓ! :)
var y = 5; // felejtsük el! NE! :)

const GRAVITY = 9.81;

console.log(typeof(x));
console.log(typeof(GRAVITY));

console.log(typeof('a'));
console.log(typeof("a"));
console.log(typeof(`a`));

console.log("Az x értéke ${x}");
console.log(`Az x értéke ${x}`);

let numbers = [3, -2, 6, 0, 7, -3]; // tömb / array

let car = {
    model: "Tesla M",
    year: 2025,
    broken: true
};  // object

// tömb hossza numbers.length
// elem a tömb végére: tomb.push(el)

// T1: egy új tömbbe emeld négyzetre a numbers tömböt

let t1 = [];
for (let i = 0; i < numbers.length; i++)
    t1.push(numbers[i] * numbers[i]);
console.log(t1);

// T2: egy új tömbbe válogasd ki a numbers tömb páros számait
let t2 = [];
for (let i = 0; i < numbers.length; i++)
    if (numbers[i] % 2 === 0)
        t2.push(numbers[i]);
console.log(t2);

// T3: mennyi a numbers tömb összege?
let t3 = 0;
for (let i = 0; i < numbers.length; i++)
    t3 += numbers[i];
console.log(t3);