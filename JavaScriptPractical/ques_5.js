/* isNaN is a JavaScript function that checks if a value is not a number.
 It returns true if the value is not a number and false otherwise.*/
 function calculateBMI(weight, height) {
    if (isNaN(weight) || isNaN(height)) {
      return "Error: Please enter valid weight and height values.";
    }
  
    if (weight <= 0 || height <= 0) {
      return "Error: Please enter positive weight and height values.";
    }
  
    const bmi = weight / Math.pow(height, 2);
    return `Your BMI is ${bmi.toFixed(2)}`;
  }
  
  console.log(calculateBMI(70, 1.75)); // Your BMI is 22.86
  console.log(calculateBMI(70, 0)); // Error: Please enter positive weight and height values.