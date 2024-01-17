const {createItems,getItems,getItemsById,deleteItemsById}=require("../controllers/studentController");
const router = require('express').Router();


router.post("/items",createItems);
router.get("/get/items",getItems);
router.get("/get/items/:id",getItemsById);
router.delete("/delete/items/:id",deleteItemsById);
module.exports=router;
                                         