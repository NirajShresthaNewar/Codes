// 1. Select h4 element with text "Red"
const redH4 = document.getElementsByTagName('h4');

for (let i = 0; i < redH4.length; i++) {
  if (redH4[i].textContent === 'Red') {
    console.log(redH4[i]); // Access selected element here
    break; // Exit loop after finding the first match
  }
}

// 2. Select div with class "green" and text "(Green)"
const greenDiv = document.getElementsByTagName('div');

for (let i = 0; i < greenDiv.length; i++) {
  if (greenDiv[i].classList.contains('green') && greenDiv[i].textContent === '(Green)') {
    console.log(greenDiv[i]); // Access selected element here
    break; // Exit loop after finding the first match
  }
}

// 3. Select div with ID "blue" and text "Blue"
const blueDiv = document.getElementById('blue');

if (blueDiv && blueDiv.textContent === 'Blue') {
  console.log(blueDiv); // Access selected element here
}

// 4. Select div with class and ID "yello"
const yellowDiv = document.querySelector('div#yello.yello');

if (yellowDiv) {
  console.log(yellowDiv); // Access selected element here
}

// 5. Select all elements with class "teal"
const tealElements = document.querySelectorAll('.teal');

for (const element of tealElements) {
  console.log(element); // Access each element in the NodeList
}
