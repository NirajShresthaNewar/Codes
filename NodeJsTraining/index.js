// Import the Express.js library to create a web server
const express = require("express");

// Import a function named `newFunc` from the file `./evenNumbers`
//const { newFunc } = require("./evenNumbers");

// Import a function named `testfunction` from the file `./testController`
const { testfunction } = require("./testController");

// Create a new Express.js application
const app = express();

// Import database configuration and models from the `./model/index` file
const db = require("./model/index");

// Import a function named `newFunc` from the file `./controllers/even` (overrides the previous import)
//const { newFunc } = require("./controllers/even");

// Define a route for the root path ("/") that responds with a JSON message
app.get("/", (req, res) => {
  res.json({
    message: "hello world from / route",
  });
});

// Synchronize database tables (create them if they don't exist)
db.sequelize.sync({ force: false }); // Creates tables; if force=true, drops existing tables first

// Use the `newFunc` function as middleware for the "/about" route
//app.use("/about", newFunc);

// Define a route for the "/test" path that calls the `testfunction`
app.get("/test", testfunction);

// Enable parsing of incoming JSON data
app.use(express.json());

// Enable parsing of URL-encoded data
app.use(express.urlencoded({ extended: true }));

// Import blog routes from the `./routes/blogs.js` file
const createRoutes = require("./routes/blogs.js");

// Apply the blog routes to the "/api" path
app.use("/api", createRoutes);

// Define a route for the "/even" path that calls the `newFunc` function (now uncommented)
//app.get("/even", newFunc);

// Set the port number for the server
let PORT = 5000;

// Start the server and listen on the specified port
app.listen(PORT, () => {
  console.log(`project started at port ${PORT}`);
});


/*const express = require("express");
const {newFunc}= require("./evenNumbers");
const {testfunction}= require("./testController");
const app = express();
const db=require("./model/index");

const { newFunc } = require("./controllers/even");

app.get("/", (req, res) => {
  res.json({
    message: "hello world from / route",
  });
});

db.sequelize.sync({force:false});//creates tables  if its true then it will create tables but dont save

app.use("/about", newFunc);
app.get("/test", testfunction);

app.use(express.json());
app.use(express.urlencoded({extended:true}));

const createRoutes=require("./routes/blogs.js");
app.use("/api",createRoutes);

 app.get("/even", newFunc);
let PORT = 5000;

app.listen(PORT, () => {
  console.log(`project started at port ${PORT}`)}
);
*/