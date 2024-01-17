const express = require('express');
const app = express();
const ejs = require('ejs');
const bodyParser = require('body-parser');

app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({ extended: false })); // Parse form data

app.get('/', (req, res) => {
  res.render('form');
});

app.post('/process-form', (req, res) => {
  const data = req.body; // Access submitted form data
  // Process the data as needed (e.g., store in a database, send emails)
  console.log(data);
  res.redirect('/'); // Redirect to the form page or a success page
});

app.listen(3000, () => {
  console.log('Server listening on port 3000');
});
