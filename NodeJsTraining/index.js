const express = require("express");
//const {newFunc}= require("./evenNumbers.js");
//const {testfunction}= require("./testController");
const app = express();
const db=require("./model/index");

// const { newFunc } = require("./controllers/even");

app.get("/", (req, res) => {
  res.json({
    message: "hello world from / route",
  });
});

db.sequelize.sync({force:false});//creates tables  if its true then it will create tables but dont save

// app.use("/about", newFunc);
//app.get("/test", testfunction);

app.use(express.json());
app.use(express.urlencoded({extended:true}));

const createRoutes=require("./routes/blogs.js");
app.use("/api",createRoutes);

// app.get("/even", newFunc);
let PORT = 5000;

app.listen(PORT, () => {
  console.log(`project started at port ${PORT}`)}
);
