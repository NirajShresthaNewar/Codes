const {blogs} =require("../model/index.js");
//const blogs =require("../model/index.js").blogs;
exports.createBlog = async(req,res)=> {
  let data ={
        name:req.body.name,
        desc:req.body.desc,
    };
    let createdBlog = await blogs.create(data);
    if(createdBlog)
    {
        res.status(200).json({
            data:createdBlog,
            mesage:"create successfully"
        })
        
    }
    console.log(createdBlog);
};

exports.getBlogs=async (req,res)=>
{
    let result = await blogs.findAll();
    res.status(200).send(result);
};

exports.getBlogsById=async (req,res)=>
{
    let result = await blogs.findByPk(req.params.id);
    
    res.status(200).send(result);
};
exports.deleteBlogsById=async (req,res)=>
{
    let result = await blogs.findByPk(req.params.id);
    
    res.status(200).send(result);
};

