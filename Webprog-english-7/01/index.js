console.log("Hello");

let x = 3; // Normal, block-spoked variable. USE THIS!
var y = 8; // DO NOT USE VAR! (Function-slope) USE LET!
const GRAVITY = 9.81; // const - cannot assign to this anymore

console.log(typeof(x));
console.log(typeof(GRAVITY));

// no ints or floats - just numbers!

console.log(typeof('a'));
console.log(typeof("a"));
console.log(typeof(`a`));

console.log(`The value of x is ${x}`);

for (let i = 0; i < 10; i++)
    console.log(i);

let numbers = [3, 6, -2, 0, 8, 7];

let sum = 0;
for (let i = 0; i < numbers.length; i++)
    sum += numbers[i];
console.log(sum);

// T1: using a loop, give me the even numbers as a new array
// all element to the end of an array: array.push(el)

let t1 = [];
for (let i = 0; i < numbers.length; i++){
    if (numbers[i] % 2 === 0){
        t1.push(numbers[i]);
    }
}
console.log(t1);

// T2: using a loop, give me the square of all numbers as a new array

let t2 = [];
for (let i = 0; i < numbers.length; i++){
    t2.push(numbers[i] ** 2);
}
console.log(t2);

// T3: T1, but use array functions
let t3 = numbers.filter(n => n % 2 === 0);

// T4: T2, but use array functions
let t4 = numbers.map(n => n**2);

// objects - more like struct / record
let o = {
    a: 2,
    b: 6
};
console.log(o.a);




let students = [
    { name: "John", grade: 5, gender: "male", glasses: false },
    { name: "Jane", grade: 4, gender: "female", glasses: true },
    { name: "Peter", grade: 2, gender: "male", glasses: true },
    { name: "Maya", grade: 3, gender: "female", glasses: false },
];

// T5: the average grade of all students
const t5 = students.reduce((sum, stud) => stud.grade + sum, 0) / students.length;
console.log(t5);

// T6: how many female students wear glasses?
const t6 = students.filter(stud => stud.gender == "female" && stud.glasses).length;
console.log(t6);

// T7: give me the name of a student who wears glasses
const t7 = students.find(stud => stud.glasses).name;
console.log(t7);

// T8: sort the list by the student's names alphabetically
const t8 = students.sort((a, b) => a.name.localeCompare(b.name));
console.log(t8);
