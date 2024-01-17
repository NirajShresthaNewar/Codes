// Import the Express.js library to create a web server
const express = require("express");


// Create a new Express.js application
const app = express();;

// Import database configuration and models from the `./model/index` file
const db = require("./model/index");


// Define a route for the root path ("/") that responds with a JSON message
app.get("/", (req, res) => {
  res.json({
    message: "hello world from / route",
  });
});

// Synchronize database tables (create them if they don't exist)
db.sequelize.sync({ force: false }); // Creates tables; if force=true, drops existing tables first

// Enable parsing of incoming JSON data
app.use(express.json());

// Enable parsing of URL-encoded data
app.use(express.urlencoded({ extended: true }));

// Import studentblog routes from the `./routes/blogs.js` file
const createRoutes = require("./routes/studentBlogs.js");

// Apply the studentblog routes to the "/api" path
app.use("/api", createRoutes);


// Set the port number for the server
let PORT = 5000;

// Start the server and listen on the specified port
app.listen(PORT, () => {
  console.log(`project started at port ${PORT}`);
});

