const {createBlog,getBlogs,getBlogsById,deleteBlogsById}=require("../controllers/blogController.js");
const router = require('express').Router();

router

router.post("/create",createBlog);
router.get("/get",getBlogs);
router.get("/get/:id",getBlogsById);
router.delete("/delete/:id",deleteBlogsById);
module.exports=router;
